<?php
namespace Activity\Controller;

use Think\Controller;

class ActiveController extends Controller{
    
    public function getUid($Mid){
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));         
        //当前时间
        $data['addr_ip']=I('server.REMOTE_ADDR');//获取IP
        $ipcount=M("active_member")->
        where(array('addr_ip'=>$data['addr_ip'],
            'member_id'=>$Mid,
            'create_time'=>array(array('egt',$nowday),
                array('elt',($nowday+86399)),'and')))->count();
        //$ipcount  获取该用户id当前IP当天创建的用户数量

        if($ipcount>5){//如果大于5个，倒叙获取最晚创建的用户IP
            $protect=M("active_member")->
            where(array(
                'addr_ip'=>$data['addr_ip'],
                'member_id'=>$Mid,
                'create_time'=>array(array('egt',$nowday),
                    array('elt',($nowday+86399)),'and')))
                ->order('create_time desc')->find();
            cookie('MemberToken',$protect['token'],60*60*24*365*20);     //保存token 时间20年
            //echo $protect['uid'];
            return $protect['uid'];//返回uid

        }
        $data['member_id'] = $Mid;
        $data['create_time']=time();  
        $data['create_day']=$nowday;     
        $data['day_stamp']=date('Y-m-d H:i:s',$data['create_time']);
        $memberID=M("active_member")->data($data)->add();//创建新ID

        $encodeStr="DY".$Mid.$memberID.$data['create_time'];
        //token生成    MD5（DY+媒体ID+用户ID+创建时间）
        $codePack=md5($encodeStr);       
        $updata['token']=$codePack;
        M("ActiveMember")->where(array('uid'=>$memberID))->save($updata);
        cookie('MemberToken',$codePack,60*60*24*365*20);
        return $memberID;
    }
//http://120.27.221.108/test/index.php/Activity/Active/index?member_id=1
    public function index(){
        header("Content-type: text/html; charset=utf-8");
        $member_id = I('get.member_id');

        //配置进入用户的uid标识
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));      
        $nowTime=time();    
        $MemberData=M("active_member")->
        where(array(
            'token'=>cookie('MemberToken'),
            'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
            'member_id'=>$member_id))->field('uid')->find();
        if(empty($MemberData)){     
            $uid=$this->getUid($member_id);//如果没有token 则获取新的uid
        }else{                                                
            $uid=$MemberData['uid'];
        }



        //今日pv统计
        $entryPV=M("member_pv")->where(array('member_id'=>$member_id,'create_day'=>$nowday))->find();
        if(empty($entryPV)){
             M("member_pv")->data(array('member_id'=>$member_id,'create_day'=>$nowday,'pv'=>1))->add();
        }else{
             M("member_pv")->where(array('member_id'=>$member_id,'create_day'=>$nowday))->setInc('pv');
        }


        //配置活动函数
        $cur_active_array=M("active_temp_item")->where(array('id'=>I('get.active_id'),'status'=>1))->find();
        $cur_active_id=I('get.active_id');//get获取到的活动ID

        if(empty($cur_active_id)||empty($cur_active_array)){//如果活动ID不存在或者未开放，则用函数调取权重最高的活动
            $resActiveData=$this->res_active($uid,$member_id,0);
        }
        else{
            $ActiveData=M("active_temp_item")->where(array('id'=>$cur_active_id,'status'=>1))->find();
            $resActiveData['active_id']=$cur_active_id;
            $resActiveData['active_data']=$ActiveData;
            $resActiveData['active_exist']=true;
        }
        $active_id=$resActiveData['active_id'];
        $ActiveData=$resActiveData['active_data'];
        $activeExist=$resActiveData['active_exist'];


        //判断福利社是否初次进入
        $resFrist=M("ActiveUser")->where(array('uid'=>$uid,'member_id'=>$member_id,'active_id'=>52))->field('id')->find();
        if(empty($resFrist)){
            $intercept['frist']=1;
        }else{
            $intercept['frist']=0;
        }
        $intercept['active_id']=52;

        //重新获取活动次数
        //用户当天再这个活动参与次数
        $resTimes=M("ActiveUserRecord")->
        where(array('uid'=>$uid,
            'member_id'=>$member_id,
            'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
            'active_id'=>$active_id))->count();


                //无活动参与时
                if($activeExist!=true){
                    $tips="亲，活动参与完啦";
                    header("location:/test/index.php/Activity/Active/error.html?tips=".$tips."");die();

                }


               //检测用户user表今日 入口UV是否已经标识(此函数统计入口UV)
                $UserData=M("ActiveUser")->where(array('uid'=>$uid,'member_id'=>$member_id,'active_id'=>$active_id,'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and')))->find();
                if(empty($UserData)){
                    $data['uid'] = $uid;
                    $data['member_id'] = $member_id;
                    $data['active_id'] = $active_id;
                    $data['create_time']=time();
                    $data['create_day']=$nowday;
                    $data['time_stamp']=date('Y-m-d H:i:s',$data['create_time']);
                    M("ActiveUser")->add($data);
                }

                //更新活动数据,默认为5分钟触发一次
                if($nowTime-$ActiveData['update_time']>300){
                    //检测活动是否为新活动
                    if($ActiveData['new_add']==1){
                        $activeTimes=M("ActiveUser")->where(array('active_id'=>$active_id))->count();
                        M("ActiveTempItem")->where(array('id'=>$ActiveData['id']))->save(array('cur_deter'=>$activeTimes,'update_time'=>$nowTime));
                        if($activeTimes>=$ActiveData['determine']){
                            //如果超过限制转化点
                            $usedTimes=M("ActiveUser")->where(array('active_id'=>$ActiveData['id'],'join_times'=>array('gt',0)))->count();
                            $totalTimes=M("ActiveUser")->where(array('active_id'=>$ActiveData['id']))->count();
                            $activeTrans=number_format(($usedTimes/$totalTimes),4);//转化率,保留四位小数
                            M("ActiveTempItem")->where(array('id'=>$ActiveData['id']))->save(array('transform'=>$activeTrans,'new_add'=>0));
                        }
                    }else{
                        $usedTimes=M("ActiveUser")->where(array('active_id'=>$ActiveData['id'],'join_times'=>array('gt',0)))->count();
                        $totalTimes=M("ActiveUser")->where(array('active_id'=>$ActiveData['id']))->count();
                        $activeTrans=number_format(($usedTimes/$totalTimes),4);
                        M("ActiveTempItem")->where(array('id'=>$ActiveData['id']))->save(array('transform'=>$activeTrans,'update_time'=>$nowTime));
                    }
                }

                $assignData['uid']=$uid;
                $assignData['member_id'] = $member_id;
                $assignData['active_id'] = $active_id;
                $assignData['times']=$ActiveData['times']-$resTimes;
                $assignData['tempInfo']=$ActiveData;//活动信息

                $assignData['intercept']=$intercept['active_id'];
                $assignData['frist']=$intercept['frist'];

                $this->assign($assignData);
                $this->display($ActiveData['temp']);
        // print_r($assignData);
    }

    public function res_active($uid,$member_id,$reset){
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));      
        $activeExist=false;              
        //$allow;
        //查找目前活动
        $activeData=M('active_temp_item')->where(array('status'=>1))->order('weight desc,new_add desc,transform desc,create_time asc')->field('id,times')->select();
        if($activeData) {
            foreach ($activeData as $key=>$value) {
                $newTimes=M('active_user_record')->
                where(array('uid'=>$uid,
                    'member_id'=>$member_id,
                    'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
                    'active_id'=>$value['id']))->count();
                if($newTimes<$value['times']){//如果该活动还有次数，则根据权重使用这个活动
                    $active_id=$value['id'];
                    $ActiveData=M("active_temp_item")->where(array('id'=>$value['id']))->find();
                    $activeExist=true;
                    break;
                }
            }
        }
        else {

        }

        $outArray=array('active_id'=>$active_id,'active_data'=>$ActiveData,'active_exist'=>$activeExist);                
        return $outArray;  
    } 
        
    public function prize_list(){
        $member_id = I('get.member_id');
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));      
        $MemberData=M("ActiveMember")->where(array('token'=>cookie('MemberToken'),'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),'member_id'=>$member_id))->field('uid')->find();
        if(empty($MemberData)){     
            $uid=$this->getUid($member_id);
        }else{                                                
            $uid=$MemberData['uid']; 
        }                
        $assignData['uid']=$uid;  
        $assignData['member_id'] = $member_id;

        $this->assign($assignData);     
        $this->display();
    }
    
    public function error(){        
        $assignData['TipInfo']=I('get.tips');
        $this->assign($assignData);         
        $this->display();
    }


    public function onecart()
    {
        //验证媒体主与入口的合法性
        //http://120.27.221.108/test/index.php/Activity/Ajax/run?uid=41&member_id=1&active_id=61
        header("Content-type: text/html; charset=utf-8");

        $member_id = I('get.member_id');
        $cert_id = I('param.cert_id');
        //配置进入用户的uid标识
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        $nowTime=time();
        $MemberData=M("active_member")->
        where(array(
            'token'=>cookie('MemberToken'),
            'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
            'member_id'=>$member_id))->field('uid')->find();
        if(empty($MemberData)){
            $uid=$this->getUid($member_id);//如果没有token 则获取新的uid
        }else{
            $uid=$MemberData['uid'];
        }

       /* //验证用户是否合法
        $MemberData=M("ActiveMember")->where(array('token'=>cookie('MemberToken'),'member_id'=>$member_id,'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and')))->find();
        if($uid!=$MemberData['uid']){
            $tips="非法用户参数";
            header("location:/test/index.php/Activity/Active/error.html?tips=".$tips."");die();
        }*/
        //检验优惠卷是否还在



        $data['uid'] = $uid;
        $data['member_id'] = $member_id;
        $data['cert_id'] = $cert_id;
        $data['get_ip'] = I('server.REMOTE_ADDR');
        $data['get_time'] = time();
        $data['create_day'] = $nowday;
        $data['time_stamp'] = date('Y-m-d H:i:s',time());
        //$recordID=M("ActiveOnecertRecord")->data($data)->add();

        $certinfo=M('AdverCert')->where('id='.$cert_id)->find();
       if(!empty($certinfo))
        {
            //用户第一次点击增加点击UV
            $click=M("ActiveOnecertRecord")->where(array('uid'=>$uid,'member_id'=>$member_id,'create_day'=>$nowday))->field('id')->find();
            if(empty($click)&&$member_id!='324100'){
                $this->changescore1($member_id);//增加积分
                $recordID=M("ActiveOnecertRecord")->data($data)->add();
            }
            else
            {
                M("ActiveOnecertRecord")->where(array('id'=>$click['id']))->setInc('click');
            }
            $url=$certinfo['href'];
            header("Location:".$url);die();
        }
        else
        {
            $tips="该优惠卷已失效";
            header("location:/test/index.php/Activity/Active/error.html?tips=".$tips."");die();
        }
    }


    //修改分数封装函数
    /*
     * $uid 用户ID
     * */
    public function changescore1($uid)
    {
        $where['uid']=$uid;
        $time=time();
        //判定防刷
        $banstatus=$this->banflash($uid,$time);
        if($banstatus==2)
        {//如果是刷的不增加积分
            exit;
        }
        $where['create_time']=strtotime(date('Y-m-d', $time));;
        $ishave=M('coupon_coin_consume')->where($where)->field('num,create_time')->find();

        if(empty($ishave))
        {//如果没有
            $data['create_time']=strtotime(date('Y-m-d', $time));;
            $data['uid']=$uid;
            $data['num']=1;
            $data['type']='+';
            $data['name']='分发';
            M('coupon_coin_consume')->add($data);
        }
        else{
            if($ishave['num']<1000)
            {
                M('coupon_coin_consume')->where('uid='.$uid)->setInc('num');
            }

        }
        if($ishave['num']<1000) {
            M('coupon_user')->where('id=' . $uid)->setInc('experience', 1);
            //用户表积分增加
            M('coupon_user')->where('id=' . $uid)->setInc('score', 1);
            //判断有没有达到升级标准
            //获取用户等级关联升级需要经验和次数
            $level = M('coupon_user_level')->alias('a')->join('dy_coupon_user b on b.level+1=a.level')
                ->where('b.id=' . $uid)->field('b.level,a.score,a.share,b.experience')->find();
            //获取该用户分享次数
            $sharetimes = M('active_share')->where('id=' . $uid)->count();
            if ($level['experience'] >= $level['score'] && $sharetimes >= $level['share']) {
                $data['new_level'] = $level['level'] + 1;
                $data['create_time'] = $time;
                $data['uid'] = $uid;
                M('coupon_user_levelup')->add($data);
                M('coupon_user')->where('id=' . $uid)->setInc('level', 1);
                return 1;//等级提升
            } else {
                return 2;//等级无提升
            }
        }
    }


    //封装防刷判定
    public function banflash($member_id,$time){
        $where['member_id']=$member_id;
        $if6=M('ActiveOnecertRecord')->where($where)->field('get_time')->limit(59,1)->select();
        $status=0;//三条判定符合2条则判定为刷UV
        if($time<$if6[0]['get_time']+60)
        {
            $status++;
        }
        //获取前第30次  三十次和本次时间戳间隔30秒以内
        $if3=M('ActiveOnecertRecord')->where($where)->field('get_time')->limit(29,1)->select();
        if($time<$if3[0]['get_time']+30)
        {
            $status++;
        }
        //获取前第10次  十次和本次时间间隔10秒以内
        $if1=M('ActiveOnecertRecord')->where($where)->field('get_time')->limit(9,1)->select();
        if($time<$if1[0]['get_time']+10)
        {
            $status++;
        }
        $if50=M('ActiveOnecertRecord')->where($where)->field('get_time')->limit(149,1)->select();
        if($time<$if50[0]['get_time']+300)
        {
            $status++;
        }
        if($status>=2)
        {
            return 2;
        }
        return 1;
        //echo json_encode($if1);
    }

}