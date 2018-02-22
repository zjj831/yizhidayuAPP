<?php
namespace Activity\Controller;

use Think\Controller;

class AjaxController extends Controller{

    public function run(){       
        //验证媒体主与入口的合法性
        //http://120.27.221.108/test/index.php/Activity/Ajax/run?uid=41&member_id=1&active_id=61
        $uid = I('param.uid');
        $member_id = I('param.member_id');
        $active_id = I('param.active_id');
        //验证用户是否合法
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y")); 
        $MemberData=M("ActiveMember")->where(array('token'=>cookie('MemberToken'),'member_id'=>$member_id,'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and')))->find();
        if($uid!=$MemberData['uid']){
            $tips="非法用户参数";
            header("location:/test/index.php/Activity/Active/error.html?tips=".$tips."");die();
        }
       // print_r($active_id) ;
        //检验活动剩余次数
        $times=M("ActiveUserRecord")->
        where(
            array('uid'=>$uid,
                'media_id'=>$member_id,
                'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)), 'and'),
                'active_id'=>$active_id))->count();
        $activeData=M("ActiveTempItem")->where(array('id'=>$active_id))->find();     
        if($times>=$activeData['times']){
            //如果没有次数了，不出卷，搜索可以参与的活动，返回
            $ActiveArray=array();
            //查找活动
            $activeData=M('active_temp_item')->where(array('status'=>1))->order('weight desc,new_add desc,transform desc,create_time asc')->field('id,times')->select();
            if($activeData){
                foreach ($activeData as $key => $value) {
                  //$newTimes  用户今日该推广者该活动参与次数
                    $newTimes=M("ActiveUserRecord")
                        ->where(array('uid'=>$uid,'member_id'=>$member_id,'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),'active_id'=>$value['id']))->count();
                    if($newTimes<$value['times']){//未参与过的活动加入数组
                        $ActiveData=M("ActiveTempItem")->where(array('id'=>$value['id']))->find();
                        array_push($ActiveArray,$ActiveData);
                        if(count($ActiveArray)>1){break;}                                                    
                    }
                }
            }
            $outArray=array('tip'=>'活动次数已用完','status'=>0,'active'=>$ActiveArray);
            echo json_encode($outArray);exit();//返回
            // print_r($outArray);
        }
                
        //券主函数
        $resCertData=$this->res_cert($uid,$member_id,$active_id);

        $cert_id=$resCertData['cert_id'];
        $certData=$resCertData['cert_data'];
        $certExist=$resCertData['cert_exist'];
        if($certExist==false){
            $outArray=array('status'=>0,'tip'=>'今日优惠券已领完');
            echo json_encode($outArray);exit();
        }
           
        $data['uid'] = I('param.uid');
        $data['member_id'] = I('param.member_id');
        $data['active_id'] = $active_id;
        
        $data['company_id'] = $certData['uid'];
        $data['cert_id'] = $cert_id;
        $data['get_ip'] = I('server.REMOTE_ADDR');
        $data['create_time'] = time();
        $data['create_day'] = $nowday;        
        $data['time_stamp'] = date('Y-m-d H:i:s',$data['create_time']);   
        $data['rounds']=$resCertData['cert_rounds'];
        $recordID=M("ActiveUserRecord")->data($data)->add();
        

        
        $joinTime=M("ActiveUserRecord")->where(array('uid'=>$uid,'member_id'=>$member_id,'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),'active_id'=>$active_id))->count();
        M("ActiveUser")->where(array('uid'=>$uid,'member_id'=>$member_id,'active_id'=>$active_id,'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and')))->save(array('join_times'=>$joinTime));
        
        $lastTime=$activeData['times']-$joinTime;
        $outArray=array('recordID'=>$recordID,'status'=>1,'prize'=>$certData,'last'=>$lastTime);
        echo json_encode($outArray);exit();
    }
    
    public function res_cert($uid,$member_id,$active_id){
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));      
        $nowTime=time();           
        $certExist=false;
        $againCert=false;
        $firstProtect=false;
        //系统判断
        $user_agent = I('server.HTTP_USER_AGENT');//获取用户的相关信息的，包括用户使用的浏览器，操作系统等信息
        if (stripos($user_agent, "iPhone")!==false) {//stripos()  后面字符再字符串中第一次出线的
            $system = 'ios';
        }else {
            $system = 'android';
        }        
        //查找用户轮数
        $rounds=M("ActiveMember")->where(array('uid'=>$uid))->find(); 
        //查找优惠卷
        $white_cert=M('adver_white_cert')->where('active_id='.$active_id)->field('cert_id')->select();
        //如果大于8张 则不用到优惠卷列表抽取
        $white_cert_id='';
        foreach ($white_cert as &$item)
        {
            $white_cert_id=$white_cert_id.','.$item['cert_id'];
        }
        if( substr($white_cert_id,0,1)==',')
        {
            $white_cert_id=substr($white_cert_id,1);
        }
        if(count($white_cert)<8)
        {
            $cert_ID=M('AdverCert')-> where(array(
                    'status'=>1,
                    'expiry_time'=>array('gt',$nowTime),
                    'id'=>array('notin',$white_cert_id))
            )->
            order('weight desc,new_add desc,arpu desc,create_time asc')->
            Field('id')->limit(8-count($white_cert))->select();
            foreach ($cert_ID as &$item)
            {
                $white_cert_id=$white_cert_id.','.$item['id'];
            }
            if( substr($white_cert_id,0,1)==',')
            {
                $white_cert_id=substr($white_cert_id,1);
            }
        }
        //如果小于8张 到优惠卷列表抽取8-X张优惠卷

            $certData=M('AdverCert')->where(array(
                'status'=>1,
                'expiry_time'=>array('gt',$nowTime),
                'id'=>array('in',$white_cert_id)
            ))->
            order('weight desc,new_add desc,arpu desc,create_time asc')->
            Field('id,system,area,daily_limit,full_limit')->select();

        if($certData){
            foreach ($certData as $key => $value){
                //系统判断
                if($value['system']){//如果有操作系统要求
                    if($value['system']!=$system){//如果当前系统不是数据库规定限制系统，则继续
                        continue;
                    }
                }
                //判断发放数量   $daily_limit   该卷今日发卷量
                $daily_limit=M("ActiveUserRecord")->where(
                    array('cert_id'=>$value['id'],
                        'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and')))
                    ->field('id')->count();
                //如果发今日发卷量大于卷的日发卷量限制 ，继续执行
                if($daily_limit>=$value['daily_limit']&&$value['daily_limit']){
                    continue;
                }
                //判断发放总量   $full_limit   该卷今日发卷量
                $full_limit=M("ActiveUserRecord")->where(array('cert_id'=>$value['id']))->field('id')->count();
                //总发卷量大于卷规定总发卷量上线，继续执行判断
                if($full_limit>=$value['full_limit']&&$value['full_limit']){
                    continue;
                }         
                //判断领券数量  $catch_limit  领卷数量
                $catch_limit=M("ActiveUserRecord")->where(array('cert_id'=>$value['id'],'status'=>1))->field('id')->count();
                if($catch_limit>=$value['catch_limit']&&$value['catch_limit']){
                    continue;
                }
                //今日该用户是否在这轮 抽到过这张卷
                $resCert=M("ActiveUserRecord")->where(
                    array('uid'=>$uid,
                        'member_id'=>$member_id,
                        'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
                        'cert_id'=>$value['id'],
                        'rounds'=>$rounds['rounds']))->find();
                //如果没又抽到过这张卷，则使用这种卷，跳出循环
                if(empty($resCert)){               
                    $cert_id = $value['id'];
                    $certData=M("AdverCert")->where(array('id'=>$value['id']))->find(); 
                    $resRounds=$rounds['rounds'];
                    $certExist=true;      
                    break;
                }else{
                    //继续发下一张卷
                    $againCert=true;
                    if($firstProtect==false){
                        $firstCertId=$value['id'];
                        $firstProtect=true;
                    }                                        
                }
            }
            //继续发卷
            if($certExist==false&&$againCert==true){
                $resRounds=$rounds['rounds']+1;//轮数+1
                M("ActiveMember")->where(array('uid'=>$uid))->save(array('rounds'=>$resRounds)); 
                //第一个符合要求的                
                $cert_id = $firstCertId;
                $certData=M("AdverCert")->where(array('id'=>$firstCertId))->find();  
                $certExist=true;
            }    
        }
        $certData['href']=htmlspecialchars_decode($certData['href']);
        $outArray=array('cert_id'=>$cert_id,'cert_data'=>$certData,'cert_rounds'=>$resRounds,'cert_exist'=>$certExist);
        return $outArray;
    }       
    
    public function receive(){
        $uid = I('post.uid');
        $member_id = I('post.member_id');
        $active_id = I('post.active_id');
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        //券直发时 type=3时运行
        if(I('post.type')==3){
            $cert_id = I('post.cert_id');

            $certData=M("AdverCert")->where(array('id'=>$cert_id))->field('uid,xframe')->find();  
            $xframe=$certData['xframe'];
            $data['uid'] = $uid;    
            $data['member_id'] = $member_id;
            $data['active_id'] = $active_id;
            $data['company_id'] = $certData['uid'];
            $data['cert_id'] = $cert_id;
            $data['get_ip'] = I('server.REMOTE_ADDR');
            $data['create_time'] = time();
            $data['create_day'] = $nowday;        
            $data['time_stamp'] = date('Y-m-d H:i:s',$data['create_time']);   
            $data['rounds']=1;
            $data['get_time']=time();
            $data['status']=1;
            M("ActiveUserRecord")->data($data)->add();


            $UserData=M("ActiveUser")->where(array('uid'=>$uid,'member_id'=>$member_id,'active_id'=>$active_id))->find();
            if(empty($UserData)){
                $red['uid'] = $uid;
                $data['member_id'] = $member_id;
                $red['active_id'] = $active_id;          
                $red['create_time']=time();
                $red['create_day']=$nowday;
                $red['time_stamp']=date('Y-m-d H:i:s',$red['create_time']);   
                M("ActiveUser")->add($red); 
            }
            $recordCount=M("ActiveUserRecord")->where(array(
                'uid'=>$uid,
                'member_id'=>$member_id,
                'active_id'=>$active_id,
                'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
                'status'=>1))->count();

            M("ActiveUser")->where(array('uid'=>$uid,'member_id'=>$member_id,'active_id'=>$active_id))->save(array('join_times'=>$recordCount,'catch_times'=>$recordCount));
        }else{
            $recordCount=M("ActiveUserRecord")->where(array(
                'uid'=>$uid,
                'member_id'=>$member_id,
                'active_id'=>$active_id,
                'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
                'status'=>1))->count();
            $updata['get_time']=time();
            $updata['status']=1;
            M("ActiveUserRecord")->where(array('id'=>I("post.record_id"),'uid'=>$uid))->save($updata);   
            $record=M("ActiveUserRecord")->where(array('id'=>I("post.record_id")))->find();             
            $certData=M("AdverCert")->where(array('id'=>$record['cert_id']))->field('xframe')->find();  
            $xframe=$certData['xframe'];           
            $recordCount=M("ActiveUserRecord")->where(array('uid'=>$uid,'member_id'=>$member_id,'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),'active_id'=>$record['active_id'],'status'=>1))->count();
            M("ActiveUser")->where(array(
                'uid'=>$uid,
                'member_id'=>$member_id,
                'active_id'=>$record['active_id']))->save(array('catch_times'=>$recordCount));
        }
        if($recordCount==1&&$member_id!='324100')
        {//如果当日首次点击  加一
            $this->changescore1($member_id);
        }
        //$outArray=array('status'=>1,'xframe'=>$xframe);
        $outArray=array(
            'uid'=>$uid,
            'member_id'=>$member_id,
            'active_id'=>$active_id,
            'status'=>1);
        echo json_encode($outArray);exit();
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
        $this->banflash($uid,$time);
        $where['create_time']=strtotime(date('Y-m-d', $time));;
        $ishave=M('coupon_coin_consume')->where($where)->field('num,create_time')->find();
        if(empty($ishave))
        {//如果没有
            $data['create_time']=strtotime(date('Y-m-d', $time));;
            $data['uid']=$uid;
            $data['num']=10;
            $data['type']='+';
            $data['name']='分发';
            M('coupon_coin_consume')->add($data);
        }
        else{
            if($ishave['num']<1500)
            {
                M('coupon_coin_consume')->where('uid='.$ishave['uid'])->setInc('num');
            }
        }
        if($ishave['num']<1500) {
            M('coupon_user')->where('id=' . $uid)->setInc('experience', 10);
            //用户表积分增加
            M('coupon_user')->where('id=' . $uid)->setInc('score', 10);
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


    public function active_data(){
        $uid = I('post.uid');    
        $member_id = I('post.member_id');
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));         
        $totalArray=array();  


        $activeData=M('active_temp_item')->where(array(
            'status'=>1,
            'type'=>1))->order('weight desc,create_time desc')->field('id,times')->select();
          if($activeData){
            foreach ($activeData as $key => $value) {
                $newTimes=M("ActiveUserRecord")->where(array(
                    'uid'=>$uid,
                    'member_id'=>$member_id,
                    'create_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
                    'active_id'=>$value['id']))->field('id')->count();
                if($newTimes<$value['times']){
                    $ActiveData=M("ActiveTempItem")->where(array('id'=>$value['id']))->find();
                    array_push($totalArray, $ActiveData);
                    if(count($totalArray)>1&&empty(I('post.type'))){
                        break;
                    }elseif(count($totalArray)>4){
                        break;
                    }
                }
            }
        }
        $outArray=array('status'=>0,'active'=>$totalArray);
        echo json_encode($outArray);exit();      
    }
    
    public function prize_data(){
        $uid = I('post.uid');        
        $member_id = I('post.member_id');
        if(I('post.page')){
            $Page=I('post.page');      
        }else{
            $Page=1;
        }
        $offnum=I('post.offnum');      
        $prizeList=M("ActiveUserRecord")->alias('a')->join('dy_adver_cert b ON a.cert_id = b.id')->
        where(array('a.uid'=>$uid,'a.member_id'=>$member_id,))->order('a.create_time desc')->page($Page,$offnum)
                ->field('b.href,a.id,b.pic,b.name,b.expiry_time')->select();        
        foreach($prizeList as $key =>$value){
            $prizeList[$key]['expiry_time']=date('Y-m-d',$value['expiry_time']);
        }
        echo json_encode($prizeList); exit();
    }      
    
    public function check(){
        $uid = I('post.uid');       
        $check= M("ActiveMember")->where(array('uid'=>$uid,'load'=>0))->field('uid')->find();
        if($check){
            M("ActiveMember")->where(array('uid'=>$uid))->save(array('load'=>1));
        }        
        exit();
    }

    //封装防刷判定
    public function banflash($member_id,$time){
        //获取前第60次  六十次和本次时间戳间隔60秒以内
        $where['status']=1;
        $where['member_id']=$member_id;
        $if6=M('ActiveUserRecord')->where($where)->field('get_time')->limit(59,1)->select();
        $status=0;//三条判定符合2条则判定为刷UV
        if($time<$if6[0]['get_time']+60)
        {
            $status++;
        }
        //获取前第30次  三十次和本次时间戳间隔30秒以内
        $if3=M('ActiveUserRecord')->where($where)->field('get_time')->limit(29,1)->select();
        if($time<$if3[0]['get_time']+30)
        {
            $status++;
        }
        //获取前第10次  十次和本次时间间隔10秒以内
        $if1=M('ActiveUserRecord')->where($where)->field('get_time')->limit(9,1)->select();
        if($time<$if1[0]['get_time']+10)
        {
            $status++;
        }
        $if50=M('ActiveUserRecord')->where($where)->field('get_time')->limit(149,1)->select();
        if($time<$if50[0]['get_time']+300)
        {
            $status++;
        }
        if($status>=2)
        {//异常刷UV记录到异常表格中
            $data['member_id']=$member_id;
            $data['create_time']=$time;
            M("ActiveUserRecordAbnormal")->data($data)->add();
        }
        //echo json_encode($if1);
    }


    public function test(){
        $active_id=42;
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        $nowTime=time();
        $white_cert=M('adver_white_cert')->where('active_id='.$active_id)->field('cert_id')->select();
        //如果大于8张 则不用到优惠卷列表抽取
        $white_cert_id='';
        foreach ($white_cert as &$item)
        {
            $white_cert_id=$white_cert_id.','.$item['cert_id'];
        }
        if( substr($white_cert_id,0,1)==',')
        {
            $white_cert_id=substr($white_cert_id,1);
        }
        if(count($white_cert)<8)
        {
            $cert_ID=M('AdverCert')-> where(array(
                    'status'=>1,
                    'expiry_time'=>array('gt',$nowTime),
                    'id'=>array('notin',$white_cert_id))
            )->
            order('weight desc,new_add desc,arpu desc,create_time asc')->
            Field('id')->limit(8-count($white_cert))->select();
            foreach ($cert_ID as &$item)
            {
                $white_cert_id=$white_cert_id.','.$item['id'];
            }
            if( substr($white_cert_id,0,1)==',')
            {
                $white_cert_id=substr($white_cert_id,1);
            }
        }
        //如果小于8张 到优惠卷列表抽取8-X张优惠卷

        $certData=M('AdverCert')-> where(array(
            'status'=>1,
            'expiry_time'=>array('gt',$nowTime),
            'id'=>array('in',$white_cert_id)
            ))->
        order('weight desc,new_add desc,arpu desc,create_time asc')->
        Field('id,system,area,daily_limit,full_limit')->select();
       echo json_encode($certData);
    }

}








