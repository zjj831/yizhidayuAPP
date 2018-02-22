<?php
namespace Activity\Controller;

use Think\Controller;
class GameController extends MobileListController{
    //判断是否是第一次登陆（有没有设置游戏性别）
    //接收参数uid   返回参数json.status 1首次登陆  2非首次登陆
    public function iffirstlogin()
    {
        $where['id']=$_POST['uid'];
        //$where['id']=37;
        $result=2;
        $info=M('coupon_user')->where($where)->field('gamesex,score')->find();
        if($info['gamesex']!='1'&&$info['gamesex']!='2')
        {
            $result=1;
        }
       echo json_encode(array('status'=>$result,'score'=>$info['score']));exit();
    }
    //设置游戏性别
    //接收参数 uid   sex（1男 2女）
    //返回参数  json.status 1成功 2 失败
    public function setsex()
    {
        $where['id']=$_POST['uid'];
        $data['gamesex']=$_POST['sex']; //1男 2女
        $info=M('coupon_user')->where($where)->save($data);
        if($info)
        {
            $result=1;//
        }else{$result=2;}
        echo json_encode(array('status'=>$result));exit();
    }
/*
 * //获取用户信息
 *传输方式 POST
 *接收参数 uid   用户ID
 *返回参数
 * json.status  2当日首次登陆  1当日非首次登陆  3昨日升级
 * json.info(nickname 昵称 level 等级   sex 性别     score 升级需要分数     experience  当前经验 schedule进度  id)
 *
 * */

    public function getuserinfo()
    {
      // $_POST['uid']=34;
        $result=1;//默认状态1
        $text1='  新活动来了，分享多送鱼币  ';
        $text2='  今日还有红包没领哦  ';
        //当日首次登陆需要信息  上次登陆到这次登陆的领卷UV
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        //当前时间
        $first=M('coupon_user')-> where(array(
            'last_login_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
            'id'=>array('eq',$_POST['uid'])
           ))->field('last_login_time')->find();
       //获取上次登陆时间 如果是当日首次登陆,增加一次
        if($first['last_login_time']=='')
        {
            $result=2;//首次登陆，状态为2
            //$this->addlotterytime($_POST['uid'],2);//增加次数
            //判断是否首次登陆
            $info=M('coupon_user')->where('id='.$_POST['uid'])->field('gamesex')->find();
            if($info['gamesex']!=1&&$info['gamesex']!=2)
            {
                $result=4;//用户第一次登陆
            }
            else{
                //判断昨天有没有升级
                $levelup=M("coupon_user_levelup")->
                where(array(
                    'uid'=>$_POST['uid'],
                    'create_time'=>array(array('egt',$nowday-86400),array('elt',($nowday-1)),'and')
                ))->order('new_level desc')->find();
                if(!empty($levelup))
                {
                    $result=3;//昨日升级
                }//获取用户前一天领卷UV
                $uv=M("active_user_record")->
                where(array(
                    'member_id'=>$_POST['uid'],
                    'get_time'=>array(array('egt',$nowday-86400),array('elt',($nowday-1)),'and'),
                    'status'=>1
                ))->count();
                }
            }



        $data['last_login_time']=time();
        if($_POST['uid']!='324100')
        {
            M('coupon_user')->where('id='.$_POST['uid'])->save($data);
        }
        $info=M('coupon_user')->alias('a')->
        join('dy_coupon_user_level b on a.level+1=b.level')->
        join('dy_coupon_user_level c on a.level=c.level')->
        where('a.id='.$_POST['uid'])->
        field('a.nickname,a.gamesex,a.headimg,a.level,a.id,a.experience,a.score as nowscore,b.score,b.share,c.uppic,c.uppic2')->find();
        $levelpic=M('coupon_user_level')->where('level='.$info['level'])->field('pic')->find();

        $info['levelpic']=$levelpic['pic'];

            $info['uv']=$uv;

        if($info['gamesex']=='1')
        {
            $info['sex']='男';
        }
        elseif($info['gamesex']=='2')
        {
            $info['sex']='女';
        }
        $info['level']='Lv.'.$info['level'];
        //获取该用户分享次数
        $sharetimes=M('active_share')->where('member_id='.$_POST['uid'])->count();
        $info['sharetimes']=$sharetimes;
        $info['schedule']=(float)($sharetimes/$info['share']);
        $activepic='http://www.adgame.ink/test/Public/img/huodong.png';
        echo json_encode(array('status'=>$result,'info'=>$info,'activepic'=>$activepic,'text1'=>$text1,'text2'=>$text2));exit();
    }
/*    //获取用户好友信息
*传输方式 POST
*接收参数 uid   用户ID
*返回参数  json.last_login_time 最后登陆时间
*json.text1 第一串字符串    您的好友
*json.text2 第二串字符串    XXX
*json.text3 第三串字符串    登陆了游戏
 * */
    public function getfriendinfo()
    {
        //测试
        //$_POST['uid']=37;
        //被邀请的
        $infoed=M('coupon_user')->where('referee_id='.$_POST['uid'])->field('id')->select();
        //邀请他的
        $info=M('coupon_user')->where('id='.$_POST['uid'])->field('referee_id')->find();
        $friendsid='';
        foreach ($infoed as &$item)
        {
            $friendsid.=','.$item['id'];
        }
        $friendsid.=','.$info['referee_id'];
        $friendsid.=','.$_POST['uid'];//加入自己
        $friendsid=substr($friendsid,1);
        //登陆过的好友
      $friendsinfo=M('coupon_user')->where(array('id'=>array('in',$friendsid)))
          ->field('id,nickname,last_login_time,phone')->order('last_login_time desc')
          ->limit(20)->select();
        foreach($friendsinfo as &$item)
        {
            $item['text1']='您的好友';
            $item['text2']=$item['nickname'];
            if(empty($item['nickname']))
            {
                $item['text2']='id'.$item['id'];
            }
            $item['text3']='登陆了游戏';
            $item['last_login_time']=date('m.d',$item['last_login_time']);
        }
      $friendsinfo2=M('coupon_user')->alias('a')->join('dy_coupon_user_levelup b on a.id=b.uid')->
      where(array('a.id'=>array('in',$friendsid)))
          ->field('a.id,a.nickname,a.phone,b.new_level,b.create_time as last_login_time')->order('b.create_time desc')
          ->limit(20)->select();
        foreach($friendsinfo2 as &$item)
        {
            $item['text1']='您的好友';
            $item['text2']=$item['nickname'];
            if(empty($item['nickname']))
            {
                $item['text2']='id'.$item['id'];
            }
            $item['text3']='升级到Lv'.$item['new_level'];
            $item['last_login_time']=date('Y-m-d ',$item['last_login_time']);
        }
        $friendsinfo=array_merge($friendsinfo,$friendsinfo2);

        $sort = array(
                'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
                 'field'     => 'last_login_time',       //排序字段
        );
         $arrSort = array();
            foreach($friendsinfo AS $uniqid => $row){
             foreach($row AS $key=>$value){
                     $arrSort[$key][$uniqid] = $value;
            }
         }
        if($sort['direction']){
                 array_multisort($arrSort[$sort['field']], constant($sort['direction']), $friendsinfo);
        }



        //判断是否当日首次进入好友页面
        $status=1;
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        $user1=M('coupon_user')-> where(array(
            'last_friend_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
            'id'=>array('eq',$_POST['uid'])
        ))->field('last_friend_time')->find();

        if($user1['last_friend_time']==''&&$_POST['uid']!='324100')
        {
            $status=2;
            M('coupon_user')->where('id='.$_POST['uid'])->data('last_friend_time='.time())->save();
        }
      echo json_encode(array('data'=>$friendsinfo,'link'=>'https://h5.adgame.ink/test/index.php/Activity/register/index?uid='.$_POST['uid'],'status'=>$status));exit;
    }
/*
 * 分享返回接口
 * 接收方式 POST
 * 接收参数 uid  用户ID
 *          type 分享渠道     分享渠道类别 0QQ 1微信 2朋友圈 3空间 4微博 5钉钉
 *          cate 分享种类     1.邀请   2.活动  3.单卷
 *返回参数 json.status  返回状态1 当日首次分享  2 2,3次分享  3超过10次分享
 *         json.score   增加积分
 *  */
    public function shareback()
    {
        $uid=$_POST['uid'];
        $type=$_POST['type'];
        $cate=$_POST['cate'];
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        //当前时间
        $where['member_id']=$uid;
        $where['create_day']=$nowday;
        $nowshare=M('active_share')->where($where)->count();
        if($nowshare==0)
        {
            //如果当日第一次
            $this->changescore($uid,'+',20,'当日首次分享');
            $result=1;
            $score=20;
           // $this->addlotterytime($_POST['uid'],2);//增加次数
        }
        elseif($nowshare<3&&$nowshare>0)
            {
                $this->changescore($uid,'+',20,'当日非首次分享');
                $result=2;
                $score=20;
            }
        else
        {
            $result=3;
            $score=0;
        }
        //判断有没有达到升级标准
        //获取用户等级关联升级需要经验和次数
        $levelup=2;//等级无提升
        $level=M('coupon_user_level')->alias('a')->join('dy_coupon_user b on b.level+1=a.level')
            ->where('b.id='.$uid)->field('b.level,a.score,a.share,b.experience')->find();
        //获取该用户分享次数
        $sharetimes=M('active_share')->where('id='.$uid)->count();
        if($level['experience']>=$level['score']&&$sharetimes>=$level['share'])
        {
            $data['new_level']=$level['level']+1;
            $data['create_time']=time();
            $data['uid']=$uid;
            M('coupon_user_levelup')->add($data);
            M('coupon_user')->where('id='.$uid)->setInc('level',1);
            $levelup=1;//等级提升
        }

        $data['member_id'] = $uid;
        $data['create_time']=time();
        $data['create_day']=$nowday;
        $data['type']=$type;
        $data['cate']=$cate;
        $data['day_stamp']=date('Y-m-d H:i:s',$data['create_time']);
        M("active_share")->data($data)->add();//创建新ID
        echo json_encode(array('status'=>$result,'score'=>$score,'levelup'=>$levelup));exit();
    }

    /*public function abc()
    {
       echo $this->addlotterytime(37,1);
    }*/
    public function lottery()
    {
        $uid=I('param.uid');
        if(!empty($uid))
        {
            $score=M('coupon_user')->where('id='.$uid)->field('score')->find();

            $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
            $where['uid']=$uid;
            $where['status']=0;            //状态为未抽取
            $where['create_day']=$nowday; //今日创建
            $lotterytimes=M('coupon_lottery_result')->where($where)->count();//今日可抽取次数
            $this->assign('times',$lotterytimes);
            $this->assign('score',$score['score']);
        }
        $this->assign('uid',$uid);
        $this->display();
    }

    /*抽奖
     *接收方式 post
     * 接收参数 uid 用户ID
     * 返回参数 json.status   1,消耗抽奖次数抽奖 2.消耗积分抽奖  3.积分不足，无法抽奖
     *          状态1和2时，抽奖成功
     *          json.prize_info  奖品信息数组   id奖品id   title奖品名 rate中奖比重
     *          json.new_score  新分数
     * */
    public function lotteryload()
    {
        //$_POST['uid']=37;//测试
        $uid=$_POST['uid'];
        //获取抽奖概率
        $lotteryrate=M('coupon_lottery_prize')->select();
        //组成抽奖数组
        $ratearr=array();
        foreach ($lotteryrate as &$item)
        {
            $ratearr[$item['id']]=$item['rate'];
        }
        //echo $this->getRand($ratearr);
        //获取用户可以抽奖次数
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        $where['uid']=$uid;
        $where['status']=0;            //状态为未抽取
        $where['create_day']=$nowday; //今日创建
        $lotterytimes=M('coupon_lottery_result')->where($where)->field('id')->select();//今日可抽取次数

       if(count($lotterytimes)>0)
       { //次数>0
           //用户表抽奖次数减1
           M('coupon_user')->where('id='.$uid)->setDec('lotterytimes');


           //调用抽奖函数
           $rs= $this->getRand($ratearr);
           $save['status']=1;//已使用
           $save['prize_id']=$rs;
           M('coupon_lottery_result')->where('id='.$lotterytimes[0]['id'])->save($save);
           $result=1;
       }
        else
        {//如果次数<1,
            $userscore=M('coupon_user')->where('id='.$uid)->find();
            if($userscore['score']>=50)
            {
                //积分消耗表添加一行数据
                $this->changescore($uid,'-',50,'抽奖');
                //调用抽奖函数
                $rs= $this->getRand($ratearr);
                //添加中奖信息
                $data['create_day']=$nowday;
                $data['create_time']=time();
                $data['prize_id']=$rs;
                $data['uid']=$uid;
                $data['type']=8;
                $data['status']=1;
                M('coupon_lottery_result')->add($data);
                $result=2;
            }
            else
            {//用户积分不足50
                $result=3;
            }
        }
        if(!empty($rs))
        {//获取奖品信息
            $prize_info=M('coupon_lottery_prize')->where('id='.$rs)->field('id,title')->find();
            //增加积分
            if($rs==1)
            {
                $this->changescore($uid,'+',5,'抽奖获取');
            }
            //增加积分
            elseif($rs==2)
            {
                $this->changescore($uid,'+',50,'抽奖获取');
            }
            elseif($rs==3)
            {
                $this->changescore($uid,'+',100,'抽奖获取');
            }

            $newscore=M('coupon_user')->where('id='.$uid)->field('score')->find();
            echo json_encode(array('status'=>$result,'prize_info'=>$prize_info,'new_score'=>$newscore['score']));exit;
        }
        else
        {
            echo json_encode(array('status'=>$result));exit;
        }
    }

    /*
     * 当日抽奖奖品
     *接收方式 post
     * 接收参数 uid 用户ID
     * */
    public function lotteryprize()
    {
        $uid=I('param.uid');
       //$uid=37;
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        $where['a.uid']=$uid;
        $where['a.create_day']=$nowday;
        $prizeinfo=M('coupon_lottery_result')->alias('a')->join('dy_coupon_lottery_prize b on a.prize_id=b.id')
            ->where($where)->field('b.title,b.pic,a.create_time')->order('a.create_time desc')->select();
        $this->assign('info',$prizeinfo);
        $this->display();
    }

/*   public function abc()
    {
        echo $this->_getFloatLength(0.001);
    }*/


    //排行榜
    public function rank()
    {
       $uid=I('param.uid');
        //  $uid=324100;
        $selfinfo=M('coupon_user')->alias('a')->join('dy_coupon_user_level b on a.level=b.level')
            ->where('a.id='.$uid)->order('a.experience desc')->field('a.headimg,a.nickname,a.experience,a.id,b.pic')->find();
        $where['experience']=array('gt',$selfinfo['experience']);

        $count=M('coupon_user')->where($where)->count();//获取自身排名
        $selfinfo['rank']=$count+1;
        if($selfinfo['rank']>20)
        {
            $selfinfo['rank']=($selfinfo['rank']-20)*($selfinfo['rank']-20)*($selfinfo['rank']-20)*($selfinfo['rank']-20)*($selfinfo['rank']-20)+20;
        }
        if(empty($selfinfo['nickname']))
        {
            $selfinfo['nickname']='ID'.$selfinfo['id'];
        }
        $rankinfo=M('coupon_user')->alias('a')->join('dy_coupon_user_level b on a.level=b.level')
            ->order('a.experience desc')->limit(20)->field('a.headimg,a.nickname,a.experience,a.id,b.pic')->select();
        $i=1;
        foreach ($rankinfo as &$item)
        {
            $item['rankpic']='https://h5.adgame.ink/test/Public/img/rankpic/'.$i.'.png';
            $i++;
            if(empty($item['nickname']))
            {
                $item['nickname']='ID'.$item['id'];
            }
        }
        if($uid==324100)
        {
            $selfinfo['rank']=99999;
        }
        echo json_encode(array('data'=>$rankinfo,'my'=>$selfinfo));exit;
    }

/*    //获取分享分类信息
    public function getsharetype()
    {
        $info=M('active_share_type')->order('id')->select();
        echo json_encode(array('data'=>$info));exit;
    }

    //获取类别对应活动  POST获取type
    public function getshareactive()
    {
        $uid=$_POST['uid'];
        $type=$_POST['type'];//分类
        $type2=$_POST['status'];//单卷集合卷
        //$type=1;
        $where['type']=$type;
        $where['status']=1;
        $where['type2']=$type2;
        $info=M('active_temp_item')->where($where)->field('id,title,pic,icon,content')->select();
        foreach ($info as &$item)
        {
            $item['link']='http://www.adgame.ink/test/index.php/Activity/Active/index?member_id='.$uid.'&active_id='.$item['id'];
        }
        echo json_encode(array('data'=>$info));exit;
    }*/

    //获取活动
    public function getactive(){
        $uid=$_POST['uid'];
        // $uid=37;
        $where['status']=1;
        $where['type2']=1;
        $info=M('active_temp_item')->where($where)->field('id,title,pic,icon,content')->select();
        foreach ($info as &$item)
        {
            $item['link']='https://h5.adgame.ink/test/index.php/Activity/Active/index?member_id='.$uid.'&active_id='.$item['id'];
        }
        echo json_encode(array('data'=>$info));exit;
    }

    /*    //获取用户好友当前经验
*传输方式 POST
*接收参数 uid   用户ID
*返回参数  json.data   （nickname 昵称 experience当前经验 ）
     *
     */
    public function getfriendscore()
    {
       // $_POST['uid']=34;
         $uid=$_POST['uid'];
        $invitetimes=M('coupon_user')->where('referee_id='.$uid)->count();
        $infoed=M('coupon_user')->where('referee_id='.$uid)->field('id')->select();
        //邀请他的
        $info=M('coupon_user')->where('id='.$uid)->field('referee_id')->find();
        $friendsid='';
        foreach ($infoed as &$item)
        {
            $friendsid.=','.$item['id'];
        }
        $friendsid.=','.$info['referee_id'];
        $friendsid=substr($friendsid,1);
        if(!empty($friendsid))
        {
            $status=1;
            $friendsinfo=M('coupon_user')->where(array('id'=>array('in',$friendsid)))
                ->field('id,nickname,experience')->order('experience desc')
                ->select();
            foreach ($friendsinfo as &$item1)
            {
                if(empty($item1['nickname']))
                {
                    $item1['nickname']='ID'.$item1['id'];
                }
            }
            echo json_encode(array('status'=>$status,'data'=>$friendsinfo,'times'=>$invitetimes));exit;
        }
        else
        {
            $status=2;
            echo json_encode(array('status'=>$status,'times'=>$invitetimes));exit;
        }



    }

    /*
     * 获取推广领取次数
     * 接收方式 post
     * 接收参数 uid
     * 返回三个参数
     * json.prize1   1未达到要求 2可以领取   3已经领取
     * json.prize3   1未达到要求 2可以领取   3已经领取
     * json.prize5   1未达到要求 2可以领取   3已经领取
     * */
    public function getinvitetimes(){
        $uid=$_POST['uid'];
        //$uid=13;
        $invitetimes=M('coupon_user')->where('referee_id='.$uid)->count();
        $where['uid']=$uid;
        $where['name']='邀请好友';
        $prize1=1;
        $prize3=1;
        $prize5=1;
        if($invitetimes>0&&$invitetimes<3)//3>推广次数>1  可以领取一档 50积分
        {
            $prize1=2;
            $where['num']=50;
            $ifprize1=M('coupon_coin_consume')->where($where)->count();
            if($ifprize1>0)
            {
                $prize1=3;
            }
        }
        elseif($invitetimes>2&&$invitetimes<5)//5>推广次数>2  可以领取二档 100积分
        {
            $prize1=2;
            $prize3=2;
            $where['num']=50;
            $ifprize1=M('coupon_coin_consume')->where($where)->count();
            if($ifprize1>0)
            {
                $prize1=3;
            }
            $where1['uid']=$uid;
            $where1['name']='邀请好友';
            $where1['num']=100;
            $ifprize3=M('coupon_coin_consume')->where($where1)->count();
            if($ifprize3>0)
            {
                $prize3=3;
            }
        }
        elseif($invitetimes>4)//5>推广次数>2  可以领取二档 100积分
        {
            $prize1=2;
            $prize3=2;
            $prize5=2;
            $where['num']=50;
            $ifprize1=M('coupon_coin_consume')->where($where)->count();
            if($ifprize1>0)
            {
                $prize1=3;
            }
            $where1['uid']=$uid;
            $where1['name']='邀请好友';
            $where1['num']=100;
            $ifprize3=M('coupon_coin_consume')->where($where1)->count();
            if($ifprize3>0)
            {
                $prize3=3;
            }
            $where2['uid']=$uid;
            $where2['name']='邀请好友';
            $where2['num']=150;
            $ifprize5=M('coupon_coin_consume')->where($where2)->count();
            if($ifprize5>0)
            {
                $prize5=3;
            }
        }
        echo json_encode(array('prize1'=>$prize1,'prize3'=>$prize3,'prize5'=>$prize5));exit;
    }

    /*
     * 领取推荐次数奖励
     * 接收方式 post
     * 接收参数 uid
     *          type 奖励1推荐一次奖励 2推荐三次 3推荐五次
     * 返回参数 json.status  1领取奖励1成功  2领取奖励2成功  3领取奖励3成功
     * */

    public function inviteprize(){
        $uid=$_POST['uid'];
        $type=$_POST['type'];
        $invitetimes=M('coupon_user')->where('referee_id='.$uid)->count();//邀请次数

        $where['uid']=$uid;
        $where['name']='邀请好友';
        if($type==1)
        {
            $status=1;
            $where['num']=50;
            $ifprize3=M('coupon_coin_consume')->where($where)->count();
            if($ifprize3==0&&$invitetimes>0)
            {
                $this->changescore($uid,'+',50,'邀请好友');
                $status=50;
            }

        }elseif($type==2)
        {
            $where['num']=100;
            $status=1;
            $ifprize3=M('coupon_coin_consume')->where($where)->count();
            if($ifprize3==0&&$invitetimes>2)
            {
                $this->changescore($uid,'+',100,'邀请好友');
                $status=100;
            }
        }
        elseif($type==3)
        {
            $where['num']=150;
            $status=1;
            $ifprize3=M('coupon_coin_consume')->where($where)->count();
            if($ifprize3==0&&$invitetimes>4)
            {
                $this->changescore($uid,'+',150,'邀请好友');
                $status=150;
            }
        }
        echo json_encode(array('status'=>$status));exit;
    }



    //抽奖测试
    public function lotterytest()
    {
        $ratearr=array();
        $lotteryrate=array(
            array('id'=>1,'name'=>'1-50','rate'=>'6400'),
            array('id'=>2,'name'=>'51-100','rate'=>'3100'),
            array('id'=>3,'name'=>'101-200','rate'=>'450'),
            array('id'=>4,'name'=>'201-2000','rate'=>'40'),
            array('id'=>5,'name'=>'2001-4999','rate'=>'9'),
            array('id'=>6,'name'=>'5000','rate'=>'1')
        );
        foreach ($lotteryrate as &$item)
        {
            $ratearr[$item['id']]=$item['rate'];
        }
        $result=$this->getRand($ratearr);
        if($result==1){return mt_rand(1,100);}
        if($result==2){return mt_rand(101,200);}
        if($result==3){return mt_rand(201,1000);}
        if($result==4){return mt_rand(1001,5000);}
        if($result==5){return mt_rand(5001,9999);}
        if($result==5){return 10000;}
    }




    public function test1000()
    {
        $count=0;
        for($i=1;$i<1000;$i++)
        {
            // if($this->lotterytest()==1000)
            $count+=$this->test1();
            //$count++;
        }
        echo $count;
    }

    /*
     * 显示奖池金额
     *  0，1，2，3，4，5 对应 个，十，百，千，万，十万
     *   person  已参与人数字符串
     * */
    public function showmoneysum()
    {
        //当前奖金=每日注入合-所有消耗
        $sum=M('money_num')->field('SUM(addmoney) as sum')->find();
        //$num=$numinfo['todaynum']
        $where['type']='+';
        $consume=M('money_result')->where($where)->field('SUM(money) as consume')->find();
        $moneysum=$sum['sum']-$consume['consume'];
        $rollnum=intval(pow(log(intval(date('i',time()))*20+intval(date('s',time()))),7)/93.0215);
        $showsum=$moneysum*$moneysum/50-200+10000-$rollnum;

        $showsum=explode('.',$showsum);
        $arr = array_reverse(str_split($showsum[0]));
        $numarr=array();//0，1，2，3，4，5 对应 个，十，百，千，万，十万
        for($i=0;$i<6;$i++)
        {
            if(empty($arr[$i]))
            {
                $numarr[$i]=0;
            }else{
                $numarr[$i]=$arr[$i];
            }
        }
        $personnum=M('coupon_user')->field('id')->count();
        $personnum=(int)($personnum*$personnum/3-57);
        echo json_encode(array('data'=>array('ge'=>$numarr[0],'shi'=>$numarr[1],'bai'=>$numarr[2],'qian'=>$numarr[3],'wan'=>$numarr[4],'shiwan'=>$numarr[5],'person'=>'当前在线人数:'.$personnum.'人')));
        //print_r($numarr);
    }

    //  中奖信息跑马灯
    /*
     * 接收参数 uid
     * 返回参数 json.data 返回的中奖信息
     * */
    public function prizeinfo(){
        $info=M('money_result')->alias('a')->join('dy_coupon_user b on a.uid=b.id')->distinct(true)->order('a.create_time desc')->limit(15)->field('b.id as userid,a.*,b.nickname')->select();
        $arr=array();
        $i=0;
        foreach ($info as $item) {
            if($item['lottery_type']==1)
            {$type='十元奖池';}
            elseif($item['lottery_type']==2)
            {$type='五十奖池';}
            elseif($item['lottery_type']==3)
            {$type='百元奖池';}
            $arr[$i]['type']=$type;
            if(!empty($item['nickname']))
            {
               /* $head = substr($item['nickname'], 0,1);
                $end = substr($item['nickname'],-1);
               $nickname1 =$head.$end;*/
               // $arr[$i]['nickname'] =$item['nickname'];
                $strlen     = mb_strlen($item['nickname'], 'utf-8');
                $firstStr     = mb_substr($item['nickname'], 0, 1, 'utf-8');
                $lastStr     = mb_substr($item['nickname'], -1, 1, 'utf-8');
                $arr[$i]['nickname']= $strlen == 2 ? $firstStr . str_repeat('**', mb_strlen($item['nickname'], 'utf-8') - 1) : $firstStr . str_repeat("*", 2) . $lastStr;
               // print_r($arr) ;exit;
            }
            else {
                $strlen     = mb_strlen($item['userid'], 'utf-8');
                $firstStr     = mb_substr($item['userid'], 0, 1, 'utf-8');
                $lastStr     = mb_substr($item['userid'], -1, 1, 'utf-8');
                $item['userid']= $strlen == 2 ? $firstStr . str_repeat('**', mb_strlen($item['userid'], 'utf-8') - 1) : $firstStr . str_repeat("*", 2) . $lastStr;

                $arr[$i]['nickname']='ID'.$item['userid'];
            }
            $arr[$i]['money']=$item['money'];
            $type2=rand(1,3);
            if($type2==1) {$type2='十元奖池';}
            elseif($type2==2) {$type2='五十奖池';}
            elseif($type2==3) {$type2='百元奖池';}
            $arr[$i+1]['type']=$type2;
            $arr[$i+1]['nickname']=$this->rollwords();
            $arr[$i+1]['money']=sprintf("%.2f", mt_rand(1,1000)/100);
            $i+=2;
        }

       // print_r(json_encode($arr));
        echo json_encode(array('data'=>$arr));
    }


    /*
     * 查询分数
     *   json.status  小于50是2  大于等于50是1
     * */
    public function getnowscore(){
        $uid=$_POST['uid'];
        //$uid=37;
        $user=M('coupon_user')->where('id='.$uid)->field('score,remaining_sum')->find();
        $nowprice=$user['remaining_sum'];
        $status=1;
        if($uid!=324100)
        {
            if($user['score']<=50)
            {
                $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
                $user1=M('coupon_user')-> where(array(
                    'last_get_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and'),
                    'id'=>array('eq',$uid)
                ))->field('last_get_time')->find();

                if($user1['last_get_time']=='')
                {
                    $status=2;
                    M('coupon_user')->where('id='.$uid)->data('last_get_time='.time())->save();
                }
            }
        }

        echo json_encode(array('scroe'=>$user['score'],'nowprice'=>$nowprice,'status'=>$status));
    }

    /*抽奖判定函数
     * 接收参数 uid
     *          type  1.50积分抽奖  2.100积分抽奖  3.200积分抽奖
     * 返回参数 json.status 1.成功 2;//积分不足 3奖池奖金不足
     *
     * */
    public function lotteryjudge()
    {
        $uid=$_POST['uid'];
        $type=$_POST['type'];//1.50积分抽奖  2.100积分抽奖  3.200积分抽奖
        /*$uid=37;
        $type=1;*/
        if($type==1) {$costscore=50;}
        elseif ($type==2) {$costscore=100;}
        elseif($type==3){$costscore=200;}
        $value=0;
        //1.检验用户是否有那么多积分
        $score=M('coupon_user')->where('id='.$uid)->field('score')->find();
        if($score['score']>=$costscore)
        { //2.检验奖池奖金是否充足
            $sum=M('money_num')->field('SUM(addmoney) as sum')->find();
            $where1['type']='+';
            $consume=M('money_result')->where($where1)->field('SUM(money) as consume')->find();
            $moneysum=$sum['sum']-$consume['consume'];
            if($moneysum>=100)//设定奖池低于100元不能抽奖
            {//3.都满足则开始抽奖
                $result=1;
            }
            else
            {
                $result=3;//奖池奖金不足
            }
        }
        else
        {
            $result=2;//积分不足
        }
        echo json_encode(array('status'=>$result));
    }

    /*抽奖函数
     * 接收参数 uid
     *          type  1.50积分抽奖  2.100积分抽奖  3.200积分抽奖
     * 返回参数 json.status 1.成功 2;//积分不足 3奖池奖金不足
     *          json.money  抽到的金额
     * */
    public function moneylottery()
    {
        $uid=$_POST['uid'];
        $type=$_POST['type'];//1.50积分抽奖  2.100积分抽奖  3.200积分抽奖
        /*$uid=37;
        $type=1;*/
        if($type==1) {$costscore=50;}
        elseif ($type==2) {$costscore=100;}
        elseif($type==3){$costscore=200;}
        $value=0;
        //1.检验用户是否有那么多积分
        $score=M('coupon_user')->where('id='.$uid)->field('score')->find();
        if($score['score']>=$costscore)
        {
            //2.检验奖池奖金是否充足
            $sum=M('money_num')->field('SUM(addmoney) as sum')->find();
            $where1['type']='+';
            $consume=M('money_result')->where($where1)->field('SUM(money) as consume')->find();

            $moneysum=$sum['sum']-$consume['consume'];
            if($moneysum>=100)//设定奖池低于100元不能抽奖
            {
                //3.都满足则开始抽奖
                //echo $value;
                //      1.调用扣积分函数
                $this->changescore($uid,'-',$costscore,'现金抽奖');
                //      2.进行抽奖函数，返回中奖数据
                //新用户判定，新用户百分百抽到3元
                $isfirst=M('money_result')->where('uid='.$uid)->find();
                if(empty($isfirst))
                {
                    $value=sprintf("%.2f", 3);;
                }
                else
                {
                    $if1fen=$this->if1fen($uid);//防刷判定
                    if($if1fen==1)
                    {
                        $arrrate=M('money_lotteryrate')->where('type='.$type)->field('id,rate')->select();
                        $ratearr=array();
                        foreach ($arrrate as &$item)
                        {
                            $ratearr[$item['id']]=$item['rate'];
                        }
                        $prizeid=$this->getRand($ratearr);
                        $moneyqj=M('money_lotteryrate')->where('id='.$prizeid)->field('id,money_down,money_up')->find();
                        $value=mt_rand($moneyqj['money_down'],$moneyqj['money_up']);
                        $value=sprintf("%.2f", $value/100);;
                    }
                    else
                    {
                        $value=0.01;
                        $moneyqj['id']=0;
                    }
                }


                //      3.调用加钱函数
                $this->changemoney($uid,'+',$value,'现金抽奖',$type,$moneyqj['id']);
                $result=1;
            }
            else
            {
                $result=3;//奖池奖金不足
            }
        }
       else
       {
           $result=2;//积分不足
       }
       echo json_encode(array('status'=>$result,'money'=>$value));
    }

/*
 * 获取当前用户余额
 * 接收参数 uid
 * 返回参数 json.status  1可以提现 2 不可体现
 *          json.nowprice 用户当前余额
 * */
    public function getnowprice()
    {
        $uid=$_POST['uid'];
        $sum=M('coupon_user')->where('id='.$uid)->field('remaining_sum')->find();
        $nowprice=$sum['remaining_sum'];
        if($nowprice>=20)
        {
            $result=1;
        }
        else
        {
            $result=2;
        }
        echo json_encode(array('status'=>$result,'nowprice'=>$nowprice));
    }

/*
 * 用户提现
 * 接收参数 uid
 *          num 提现金额
 *          zfbid 支付宝账号
 *          phone 手机号
 * 返回参数 json.status 1请求成功  2.输入的金额大于自己的余额        3;  //不能小于20         4;//提现金额大于余额   5.请求参数不完整
 * */
    public function getcash()
    {
        $uid=$_POST['uid'];
        $num=$_POST['num'];
        $zfbid=$_POST['zfbid'];
        $phone=$_POST['phone'];
        $sum=M('coupon_user')->where('id='.$uid)->field('remaining_sum')->find();
        $nowprice=$sum['remaining_sum'];
//        $g = "/^1[34578]\d{9}$/";


        if(empty($num)||empty($zfbid)||empty($phone))
        {
            $result=5;  //请求参数不完整
        }
        else
        {
            if($nowprice>=20)
            {//余额超过20 且提现金额小于余额可以提现
                if($nowprice>=$num)
                {
                    if($num>=20)
                    {
                        $result=1;
                        $data['uid']=$uid;
                        $data['num']=$num;
                        $data['zfbid']=$zfbid;
                        $data['phone']=$phone;
                        $data['status']=1;
                        $data['create_time']=time();
                        $data['create_day']=mktime(0,0,0,date("m"),date("d"),date("Y"));
                        M('money_getcash')->data($data)->add();
                        //减少金额
                        M('coupon_user')->where('id='.$uid)->setDec('remaining_sum',$num);
                    }
                    else
                    {
                        $result=3;  //不能小于20
                    }
                }
                else
                {
                    $result=4;//提现金额大于余额
                }
            }
            else
            {
                $result=2;//余额不足20
            }
        }

        echo json_encode(array('status'=>$result));
    }


    //修改账户余额封装函数
    /*
     * $uid 用户ID
     * $type +或者-
     * $num 操作的积分
     * $name 操作名
     * $letterytype 抽奖类型1.50积分 2.100积分 3.200积分
     * */
    public function changemoney($uid,$type,$num,$name,$lotterytype,$money_id)
    {
        if($type=='+')
        {
            //用户表余额增加
            M('coupon_user')->where('id='.$uid)->setInc('remaining_sum',$num);

        }
        elseif($type=='-')
        {
            //用户余额减少
            M('coupon_user')->where('id='.$uid)->setDec('remaining_sum',$num);
            //提现详情表创建
            /*$data['uid']=$uid;
            $data['type']=$type;
            $data['num']=$num;
            $data['name']=$name;
            $data['status']=1;
            $data['create_time']=time();
            $data['create_day']=mktime(0,0,0,date("m"),date("d"),date("Y"));
            M('money_getcash')->data($data)->add();*/
        }
        //余额详情表创建
        $data['uid']=$uid;
        $data['type']=$type;
        $data['money']=$num;
        $data['money_id']=$money_id;
        $data['lottery_type']=$lotterytype;
        $data['create_time']=time();
        $data['create_day']=mktime(0,0,0,date("m"),date("d"),date("Y"));
        M('money_result')->data($data)->add();
    }


    //封装判定分享是否正常
    public function if1fen($uid)
    {
        //1天前最近的五条如果没有领卷UV则判定他是非正常用户
        //先判定一天前是否有超过五条分享
        //$uid=37;
       $yesterday=strtotime(date("Y-m-d"));
        $where['member_id']=$uid;
        $where['create_time']=array('ELT',$yesterday);
        $num=M('active_share')->where($where)->count();//分享条数
        $result=1;
        if($num>4)
        {
            $num2=M('active_user_record')->where($where)->count();
            if($num2==0)
            {
                $result=2;
            }
            else{
                $record=M('active_user_record')->where('member_id='.$uid)->order('create_time desc')->limit('20')->field('status')->select();
                $getcart=0;
                foreach ($record as &$item)
                {
                    $getcart+=$item['status'];
                }
                if($getcart==0)
                {
                    $result=2;
                }
            }

        }
        return $result;
        // echo $result;
    }



    /*
 * 封装电话号码函数
 * 返回参数 1 是 2 否
 * */
    public function istel($tel)
    {
        if(strlen($tel) == "11")
        {
            //上面部分判断长度是不是11位
            $n = preg_match("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/",$tel,$array);
            /*接下来的正则表达式("/131,132,133,135,136,139开头随后跟着任意的8为数字 '|'(或者的意思)
            * 151,152,153,156,158.159开头的跟着任意的8为数字
            * 或者是188开头的再跟着任意的8为数字,匹配其中的任意一组就通过了
            * /")*/
            return count($array);
        }else
        {
            return 0;
        }
    }

    /*
     * 封装获取随机字
     * */
    public function rollwords()
    {
        $words='汤忙兴宇守宅字安讲军许论农讽设访寻那迅尽导异孙阵阳收阶阴防奸如妇好她妈戏羽观欢买红纤级约纪驰巡寿弄麦形进戒吞远违运扶抚坛技坏扰拒找批扯址走抄坝贡攻赤折抓扮抢孝均抛投坟抗坑坊抖护壳志扭块声把报却劫芽花芹芬苍芳严芦劳克苏杆杠杜材村杏极李杨求更束豆两丽医辰励否还歼来连步坚旱盯呈时吴助县里呆园旷围呀吨足邮男困吵串员听吩吹呜吧吼别岗帐财针钉告我乱利秃秀私每兵估体何但伸作伯伶佣低你住位伴身皂佛近彻役返余希坐谷妥含邻岔肝肚肠龟免狂犹角删条卵岛迎饭饮系言冻状亩况床库疗应冷这序辛弃冶忘闲间闷判灶灿弟汪沙汽沃泛沟没沈沉怀忧快完宋宏牢究穷灾良证启评补初社识诉诊词译君灵即层尿尾迟局改张忌际陆阿陈阻附妙妖妨努忍劲鸡驱纯纱纳纲驳纵纷纸纹纺驴纽奉玩环武青责现表规抹拢拔拣担坦押抽拐拖拍者顶拆拥抵拘势抱垃拉拦拌幸招坡披拨择抬其取苦若茂苹苗英范直茄茎茅林枝杯柜析板松枪构杰述枕丧或画卧事刺枣雨卖矿码厕奔奇奋态欧垄妻轰顷转斩轮软到非叔肯齿些虎虏肾贤尚旺具果味昆国昌畅明易昂典固忠咐呼鸣咏呢岸岩帖罗帜岭凯败贩购图钓制知垂牧物乖刮秆和季委佳侍供使例版侄侦侧凭侨佩货依的迫质欣征往爬彼径所舍金命斧爸采受乳贪念贫肤肺肢肿胀朋股肥服胁周昏
鱼兔狐忽狗备饰饱饲变京享店夜庙府底剂郊废净盲放刻育闸闹郑券卷单炒炊炕炎炉沫浅法泄河沾泪油泊沿泡注泻泳泥沸波泼泽治怖性怕怜怪学宝宗定宜审宙官空帘实试郎诗肩房诚衬衫视话诞询该详建肃录隶居届刷屈弦承孟孤陕降限妹姑姐姓始驾参艰线练组细驶织终驻驼绍经贯奏春帮珍玻毒型挂封持项垮挎城挠政赴赵挡挺括拴拾挑指垫挣挤拼挖按挥挪某甚革荐巷带草茧茶荒茫荡荣故胡南药标枯柄栋相查柏柳柱柿栏树要咸威歪研砖厘厚砌砍面耐耍牵残殃轻鸦皆背战点临览竖省削尝是盼眨哄显哑冒映星昨畏趴胃贵界虹虾蚁思蚂虽品咽骂哗咱响哈咬咳哪炭峡罚贱贴骨钞钟钢钥钩卸缸拜看矩怎牲选适秒香种秋科重复竿段便俩贷顺修保促侮俭俗俘信皇泉鬼侵追俊盾待律很须叙剑逃食盆胆胜胞胖脉勉狭狮独狡狱狠贸怨急饶蚀饺饼弯将奖哀亭亮度迹庭疮疯疫疤姿亲音帝施闻阀阁差养美姜叛送类迷前首逆总炼炸炮烂剃洁洪洒浇浊洞测洗活派洽染济洋洲浑浓津恒恢恰恼恨举觉宣室宫宪突穿窃客冠语扁袄祖神祝误诱说诵垦退既屋昼费陡眉孩除险院娃姥姨姻娇怒架贺盈勇怠柔垒绑绒结绕骄绘给络骆绝绞统耕耗艳泰珠班素蚕顽盏匪捞栽捕振载赶起盐捎捏埋捉捆捐损都哲逝捡换挽热恐壶挨耻耽恭莲莫荷获晋恶真框桂档桐株桥桃格校核样根索哥速逗栗';
        $a=mt_rand(0,1000);
        $b=mt_rand(0,1000);
        $as=mb_substr($words,$a,1);
        $bs=mb_substr($words,$b,1);
        return $as.'**'.$bs;
    }


    /*
     * 单卷分发列表遍历
     * 需求参数 uid
     * */
    public function cartlist()
    {
        $uid=$_POST['uid'];
        $where['isalone']=1;
        $where['status']=1;
        $cartlist=M('adver_cert')->where($where)->field('id,title,pic,icon,name')->order('weight desc')->select();
        foreach ($cartlist as &$item)
        {
            $item['link']='https://h5.adgame.ink/test/index.php/Activity/Active/onecart?member_id='.$uid.'&cert_id='.$item['id'];
        }
        echo json_encode(array('data'=>$cartlist));exit;
    }



    //账号首次登陆
    public function test111(){
        $data['gamesex']='';
        $data['last_login_time']=1;
        $data['last_get_time']=1;
        $data['last_friend_time']=1;
        M('coupon_user')->where('id=324179')->data($data)->save();
        M('coupon_coin_consume')->where('uid=324179')->delete();
        M('active_share')->where('member_id=324179')->delete();
    }
    //当日首次登陆
    public function test222(){
        M('coupon_user')->where('id=34')->data('last_login_time=0')->save();
    }
    //当日首次获取积分
    public function test333(){
        M('coupon_user')->where('id=34')->data('last_get_time=1')->save();
    }

    public function clickuv()
    {
        $data['ip']=I('server.REMOTE_ADDR');//获取IP
        $data['create_day']=mktime(0,0,0,date("m"),date("d"),date("Y"));
        $ishave=M('click_uv')->where($data)->field('id')->find();
        if(empty($ishave['id']))
        {
            M('click_uv')->data($data)->add();
            $status=1;
        }
        else
        {
            $status=2;
        }
        echo json_encode(array('status'=>$status));
    }
}