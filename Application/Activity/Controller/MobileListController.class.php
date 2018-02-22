<?php
/**
 * Created by PhpStorm.
 * User: tinkle
 * Date: 2017/9/7
 * Time: 15:43
 */
namespace Activity\Controller;

    use Think\Controller;

class MobileListController extends Controller
{

    private $now;
    public function _initialize()
    {
        header('Access-Control-Allow-Origin:*');
        //header("Access-AllControl-ow-Origin: *");
        $this->now = date('Y-m-d');
    }

    //获取分类列表
    public function getcategorylist(){
        $list=M('coupon_category')->order('displayor asc')->where('pid=0')->select();
        $returnArray=array("data"=>$list);
        echo json_encode($returnArray);exit();
    }

    //获取出行分类列表
    public function getcategorylist2(){
        $list=M('coupon_category')->order('displayor asc')->where('pid=5')->select();
        $returnArray=array("data"=>$list);
        echo json_encode($returnArray);exit();
    }

    //根据点赞数量排行（热门推荐）
    public function gethotcoupon()
    {
        $couponlist=M('coupon_coupon')->order('upvote desc')->limit(20)->select();
        foreach($couponlist as &$coupon){
            $coupon['validate']=date('Y-m-d ',$coupon['validate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
            if($coupon['id']==1)
            {
                $coupon['thumb']='https://www.yizhidayu.com/Public/Uploads/Core/yizhidayu/20171206/201712061020167206.jpg';
            }
        }
        $returnArray=array('data'=>$couponlist);
        echo json_encode($returnArray);exit;
    }


    //根据分类id获取优惠券列表
    public function getcouponbycate(){
        $id=I('post.id',0,'intval');
        $order=I('post.order',0,'intval');//排序方式 默认热度排序，返回1则时间排序

        //$id=11;//测试用
        //判断是一级分类还是二级分类
        $isone['id']=$id;
        $isoneInfo=M('coupon_category')->where($isone)->find();
        $Model = M();
        $issonInfo=$Model->query('select count(id) as isson  from dy_coupon_category where pid='.$id);//判断是否有子分类
	    if($id==10)//如果是热门推荐，则根据点赞数量排行
        {
            $couponlist=M('coupon_coupon')->order('upvote desc')->limit(20)->select();
        }
        else
        {
            if($isoneInfo['pid']!=0 || $issonInfo[0]['isson']==0)
            {//如果是二级分类，直接调取二级分类优惠卷
                $where['cateid'] = $id;
                if($order==1)
                {
                    $couponlist=M('coupon_coupon')->order('validate desc')->where($where)->select();
                }
                else
                {
                    $couponlist=M('coupon_coupon')->order('readno desc')->where($where)->select();
                }
            }
            else
            {//如果是一级分类，调取所有一级分类下二级分类的优惠卷
                $Model = M();
                if($order==1)
                {
                    if($id==11)//淘流量只取十条数据
                    {
                        $couponlist = $Model->query('select a.*,b.pid as pcateid from dy_coupon_coupon a join dy_coupon_category b on a.cateid=b.id and b.pid=' . $id.' order by a.validate limit 0,10');
                    }
                    else
                    {
                        $couponlist = $Model->query('select a.*,b.pid as pcateid from dy_coupon_coupon a join dy_coupon_category b on a.cateid=b.id and b.pid=' . $id.' order by a.validate ');
                    }
                }
                else
                {
                    //$a='select a.*,b.pid as pcateid from dy_coupon_coupon a join dy_coupon_category b on a.cateid=b.id and b.pid=' . $id.'order by a.readno desc';
                    $couponlist = $Model->query('select a.*,b.pid as pcateid from dy_coupon_coupon a join dy_coupon_category b on a.cateid=b.id and b.pid=' . $id.' order by a.readno desc');
                }
            }
        }

        foreach($couponlist as &$coupon){
            $coupon['validate']=date('Y-m-d ',$coupon['validate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
        }
        $returnArray=array("data"=>$couponlist);
        echo json_encode($returnArray);exit();
        //print_r($a);
    }


/*registergetcode   //注册获取手机验证码
接收参数tel：手机号
返回参数 json.status   1成功  2 手机号码为空，3手机号码已经存在*/
    public function registergetcode(){
        $tel=I('post.tel',0,'intval');
        $where['phone'] = $tel;
        $userInfo=M('coupon_user')->field('id')->where($where)->find();
        if($userInfo!='')
        {
            $result=3;//手机号码已经存在，不可重复注册
        }
        else
        {
            if($tel==""||empty($tel)){
                $result=2;//手机号码为空，请重新操作获取验证码
            }else{
                $code=rand(pow(10,5), pow(10,6)-1);
                //发送验证码到用户
                $content="您好，您的验证码是：".$code."。有效时间3分钟";
                $result1=$this->sendSMS($tel, $content,'true');
                //生成随机验证码 ，插入数据库
                $data['code']=$code;
                $data['phone']=$tel;
                $data['createtime']=time();
                $data['endtime']=strtotime ("+3  minutes");
                //$result=pdo_insert("lwxcoupon_code",$data);
                $add=M('coupon_code')->data($data)->add();
                if($add)
                {
                    $result=1;
                }
            }
        }
        //echo json_encode(array('status'=>$result1));
        echo json_encode(array('status'=>$result));exit();
    }

/*findpwdgetcode   //找回密码获取手机验证码
接收参数tel：手机号
返回参数 json.status   1成功  2;//号码为空，不可发送验证码3; //号码未注册，不可找回密码*/
    public function findpwdgetcode(){
        $tel=I('post.tel',0,'intval');
        //验证手机号码是否已存在
        $where['phone'] = $tel;
        $userInfo=M('coupon_user')->field('id')->where($where)->find();
        if(empty($userInfo)){
            $result=3; //号码未注册，不可找回密码
        }else{
            if($tel==""||empty($tel)){
                $result=2;//号码为空，不可发送验证码
            }else{
                $code=rand(pow(10,5), pow(10,6)-1);
                //发送验证码到用户
                $content="您好，您的验证码是：".$code."。有效时间3分钟";
                $result=$this->sendSMS($tel, $content,'true');
                //生成随机验证码 ，修改数据库
                $data['code']=$code;
                $data['phone']=$tel;
                $data['createtime']=time();
                $data['endtime']=strtotime ("+3  minutes");
                $add=M('coupon_code')->data($data)->add();
                if($add)
                {
                    $result=1;
                }
            }
        }
        echo json_encode(array('status'=>$result));exit();
    }

    /*
     * 注册用户
     * 请求参数  tel 手机号
     *           code 验证码
     *           password 密码
     *           invitation_code邀请码（选填）
     *           system   1IOS  2安卓
     * 返回参数 json.status
     *      1成功    2; //数据为空，不可注册  3; //验证码错误   4;//验证码过期   5;//手机号码已注册，不可重复注册
     * */
    public function register(){
        $tel=I('post.tel',0,'intval');
        $code=I('post.code',0,'intval');
        $system=I('post.system');
        $password=I('post.password');
        if($tel==""||empty($tel)||$code==""||empty($code)||$password==""){
            $result=2; //数据为空，不可注册
        }
        else
        {
            $restime=time();
            //查询当前用户最新的消息记录 判断手机号码与验证码是否一致  时间是否在有效期内
            $where['phone'] = $tel;
            $where['code'] = $code;
            $message=M('coupon_code')->where($where)->find();
            if($message){
                $endtime=intval($message['endtime']);
                if($restime>$endtime){
                    $result=4;//验证码过期
                }else{
                    //注册用户
                    //$userInfo=pdo_fetch("select id from ".tablename("lwxcoupon_user")." where phone=:tel",array(":tel"=>$tel));
                    $where1['phone'] = $tel;
                    $userInfo=M('coupon_user')->where($where1)->find();
                    if($userInfo){
                        $result=5;//手机号码已注册，不可重复注册
                    }else{

                        //通过邀请码判断
                        // $invitation_code='VFjX4v8j';
                        $data=array();
                        if(empty($_POST['invitation_code']))
                        {
                            $data['referee_id']='';
                        }else
                        {
                            $invitation_code=$_POST['invitation_code'];
                            $referee=M('coupon_user')->where("invitation_code='".$invitation_code."'")->field('id')->find();
                            if(!empty($referee))
                            {
                                $data['referee_id']=$referee['id'];
                                $this->changescore($referee['id'],'+',50,'邀请好友');
                               // $this->addlotterytime($referee['id'],1);//增加次数
                            }
                        }

                        $data['phone']=$tel;
                        $data['password']=md5($password);
                        $data['createtime']=time();
                        $data['invitation_code']=$this->create_password(8);//八位数随机邀请码
                        if(!empty($system))
                        {
                            $data['system']=$system;
                        }
                        //$result=pdo_insert("lwxcoupon_user",$data);
                        $add=M('coupon_user')->data($data)->add();
                        $this->changescore($add,'+',50,'创建账号');
                        if($add)
                        {
                            if(!empty($data['referee_id']))
                            {//如果填了有效邀请码
                             //   $this->addlotterytime($add,4);//增加次数
                                $this->changescore($add,'+',50,'填写邀请码');
                            }
                            $result=1;
                        }
                    }
                }
            }else{
                $result=3; //验证码错误
            }
        }
        echo json_encode(array('status'=>$result));exit();
    }


    /*修改密码
     *请求参数  tel 手机号
     *           code 验证码
     *           password 密码
     * 返回参数 json.status
     *          1成功 2数据为空，不可找回 3没有验证码  4验证码过期 5; //用户不存在，不可修改密码  //修改的密码和原密码相同
     *
     * */

    public function resetpwd(){
        $tel=I('post.tel',0,'intval');
        $code=I('post.code',0,'intval');
        $password=I('post.password');
        if($tel==""||empty($tel)||$code==""||empty($code)||$password=="")
        {
            $result = 2;//数据为空，不可找回
        }
        else
        {
            $restime=time();
            //查询当前用户最新的消息记录 判断手机号码与验证码是否一致  时间是否在有效期内
            //$sql="SELECT * FROM ims_lwxcoupon_code WHERE  phone=:tel AND `code`=:code ";
            $where['phone'] = $tel;
            $where['code'] = $code;
            $message=M('coupon_code')->where($where)->find();
            if($message){
                $endtime=intval($message['endtime']);
                if($restime>$endtime){
                    $result=4; //验证码过期
                }else{
                    //修改密码
                    //$userInfo=pdo_fetch("select id from ".tablename("lwxcoupon_user")." where phone=:tel",array(":tel"=>$tel));
                    $where1['phone'] = $tel;
                    $userInfo=M('coupon_user')->where($where1)->find();
                    if(!$userInfo){
                        $result=5; //用户不存在，不可修改密码
                    }else{
                        $data=array();
                        $data['password']=md5($password);
                        $where2['phone']=$tel;
                        if($userInfo['password']==$data['password'])
                        {
                            //修改的密码和原密码相同
                            $result=6;
                        }
                        //$result=pdo_update("lwxcoupon_user",$data,$where);
                        //$result=1;
                        else{
                            $save=M('coupon_user')->where($where2)->save($data);
                            if($save)
                            {
                                $result=1;//修改密码成功
                            }
                        }
                    }
                }
            }else{
                $result=3;exit();//没有验证码
            }
        }
        echo json_encode(array('status'=>$result));exit();
    }

    //登陆login
    /*  *接收参数  tel 手机号
     *           password 密码
     * 返回参数 json.status  -1数据为空  0失败  成功为ID
     *          json.msg     success 成功  fail失败
     *
     * */
    public function login(){
        $tel=I('post.tel',0,'intval');
        $password=I('post.password');
       // echo json_encode(array('tel'=>$tel,'password'=>$password));
        if($tel==""||empty($tel)||$password==""){
            $result=array("msg"=>"fail","status"=>-1);//数据为空
        }else{
            //$userInfo=pdo_fetch("select id from ".tablename("lwxcoupon_user")." where phone=:tel and password=:pwd",array(":tel"=>$tel,":pwd"=>$password));
            $where['phone'] = $tel;
            $where['password'] = $password;
            $userInfo=M('coupon_user')->where($where)->find();
          //  echo json_encode($userInfo);exit;
            if($userInfo){
                $result=array("msg"=>"success","status"=>$userInfo['id']);
                $_SESSION['user_id']=$userInfo['id'];
            }else{
                $result=array("msg"=>"fail","status"=>0);
            }
        }
        echo json_encode($result);exit();
    }

        //修改用户信息
    /*
     * 接收参数
     *  status 0昵称1是性别2年龄3个性签名4头像
     *  title  修改值
     *
     * */
    public function changeInfo(){
        //status   0昵称1是性别2年龄3个性签名4头像
        $data=array();
        $status=I('post.status');
        $value=I('post.title');
        $name = '';
        //echo json_encode($value);exit;
        switch ($status){
            case 0:
                $name = 'nickname';
                break;
            case 1:
                $name = 'sex';
                break;
            case 2:
                $name = 'age';
                break;
            case 3:
                $name = 'personal';
                break;
        }
        $data[$name] = $value;
        $where['id'] = I('post.uid');
        //$result      = pdo_update("lwxcoupon_user",$data,$where);
        //($result != false)?$res = 1:$res = 0;
        $result=M('coupon_user')->where($where)->save($data);
        ($result != false)?$res = 1:$res = 0;

        echo json_encode(array('status'=>$result));exit();
    }

    //获取用户信息
    public function userInfo(){
        $where['id'] = I('post.uid');
        //$userInfo=pdo_fetch("select * from ".tablename("lwxcoupon_user")." where id=:id",array(":id"=>$uid));
        $userInfo=M('coupon_user')->where($where)->find();
        $returnArray=array("data"=>$userInfo);
        echo json_encode($returnArray);exit();
    }
    public function dir()
    {
        $path = substr(__DIR__,0,23)."Public/Activity/images/ios_img/";
        echo $path ;
    }

    //修改用户头像（IOS）
    public function headimg(){
        // 文件类型限制
        // "file"名字必须和iOS客户端上传的name一致
        if ($_FILES["file"]["type"])
        {
            if ($_FILES["file"]["error"] > 0) {
                $result = $_FILES["file"]["error"]; // 错误代码
            } else {
                $fillname = $_FILES['file']['name']; // 得到文件全名
                $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
                $type = end($dotArray); // 得到最后一个元素：文件后缀
                $headimg = md5(uniqid(rand())).'.'.$type;
                //$path = getcwd().'/Public/Activity/images/ios_img/'.$headimg;
                $path = substr(__DIR__,0,23)."Public/Activity/images/ios_img/".$headimg; // 产生随机唯一的名字
               //                                  /var/www/html/test/Public/Activity/images/ios_img/

                $res = move_uploaded_file( // 从临时目录复制到目标目录
                    $_FILES["file"]["tmp_name"], // 存储在服务器的文件的临时副本的名称
                    $path);
                $result=5;
                //$result=$res;
                if ($res){
                    //$data['headimg'] = "http://120.27.221.108/we7/attachment/ios_img/".$headimg;
                    $data['headimg'] = "http://120.27.221.108/test/Public/Activity/images/ios_img/".$headimg;
                    $where['id'] = I('post.uid');
                    $save=M('coupon_user')->where($where)->save($data);
                    if($save) {
                        $result=1;
                    }
                    else
                    {$result=3;}
                }
            }
        } else {
            $result = "2";//没有上传图片
        }
        $returnArray=array("status"=>$result);
        echo json_encode($returnArray);exit();
    }


    //反馈
    public function feedback(){
        if ($_FILES["file"]["error"] > 0) {
            $result = $_FILES["file"]["error"]; // 错误代码
        } else {
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            $headimg = md5(uniqid(rand())).'.'.$type;
            $path = substr(__DIR__,0,19)."Public/Activity/images/ios_img/".$headimg; // 产生随机唯一的名字
            $res = move_uploaded_file( // 从临时目录复制到目标目录
                $_FILES["file"]["tmp_name"], // 存储在服务器的文件的临时副本的名称
                $path);
            if ($res){
                $data['headimg'] = "http://120.27.221.108/test/Public/Activity/images/ios_img/".$headimg;
            }
        }
        $data['uid'] = I('post.uid');
        $data['content'] = I('post.content');
        $data['create_time'] = date('Y-m-d H:i:s');
        //$result=pdo_insert("coupon_feedback",$data);
        $add=M('coupon_feedback')->data($data)->add();
        if($add)
        {
            $result=1;
        }
        $returnArray=array("status"=>$result);
        echo json_encode($returnArray);exit();
    }

    //获取轮播图信息
    public function rotationpic(){
        $where['type'] = I('post.type');
        $picInfo=M('coupon_rotationpic')->field('title,pic,link')->where($where)->select();
        $returnArray=array("data"=>$picInfo);
        echo json_encode($returnArray);exit();
    }


    //获取二种分类的类型
    public function getcategory2list(){
        $list=M('coupon_category2')->order('displayor asc')->select();
        $returnArray=array("data"=>$list);
        echo json_encode($returnArray);exit();
        /*print_r('<pre>');
        print_r($list);
        print_r('</pre>');*/
    }
    //根据另一种分类cate2id来获取优惠卷。
    public function getcouponbycate22()
    {
        $where['cateid2'] = I('post.id');
        // $where['cateid2']=2;
        $couponlist=M('coupon_coupon')->where($where)->order('validate desc')->select();
        foreach($couponlist as &$coupon){
            $coupon['validate']=date('Y-m-d ',$coupon['validate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
        }
        $returnArray=array("data"=>$couponlist);
        echo json_encode($returnArray);exit();
    }

    //根据另一种分类类型来获取优惠卷。只取四张
    public function getcouponbycate2(){
        $list=M('coupon_category2')->order('displayor asc')->select();
        $couponlistsum=array();
        for($i=0;$i<count($list);$i++)
        {
            $id=$list[$i]['id'];
            $where['cateid2'] = $id;
            //$couponlist=M('coupon_coupon')->where($where)->order('validate desc')->limit(4)->select();
            $Model = M();
            $couponlist=$Model->query('select a.*,b.title as catename from dy_coupon_coupon a join dy_coupon_category b on a.cateid=b.id and a.cateid2='.$id.' order by a.validate desc limit 0,4');
            foreach($couponlist as &$coupon){
                $coupon['validate']=date('Y-m-d ',$coupon['validate']);
                $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
                $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
                $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
            }
            $couponlist=array('data'.$couponlist[0]['cateid2']=>$couponlist);
            $couponlistsum=array_merge($couponlistsum,$couponlist);
        }
        $returnArray=array("data"=>$couponlistsum);
        echo json_encode($returnArray);exit();
     /*  print_r('<pre>');
        print_r($couponlistsum);
        print_r('</pre>');*/
    }

    //游戏大鱼   根据返回状态获取优惠卷信息
    public function getgamecoupon(){
        $status=I('post.id',0,'intval');
        $userid=I('post.uid');
        //$status=2;
        //$userid=1;
        if($status==1)//猜你喜欢（根据是否推荐字段判断）
        {
            $where['is_recom'] = 1;
            $couponlist=M('coupon_gamecoupon')->where($where)->order('startdate desc')->limit(20)->select();
        }
        else if($status==2)//今日首推（根据发布时间）
        {
            $couponlist=M('coupon_gamecoupon')->order('startdate desc')->limit(20)->select();
        }
        else if($status==3)//排行（根据领取数量）
        {
            $couponlist=M('coupon_gamecoupon')->order('useno desc')->limit(10)->select();
        }
        else if($status==4)//礼包
        {
            $couponlist=M('coupon_gamecoupon')->order('useno desc')->select();
        }

        $where1['user_id']=$userid;
        foreach($couponlist as &$coupon){
            $coupon['startdate']=date('Y-m-d ',$coupon['startdate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
            //$coupon['picture']=ACTIVITY_IMG_URL.$coupon['picture'];
            $coupon['useper']=floatval($coupon['useno']/$coupon['totle']);
            $coupon['odd']=$coupon['totle']-$coupon['useno'];
            $where1['coupon_id']=$coupon['id'];
            //判断该用户是否使用过该优惠卷
            $isuse=M('coupon_gamecode')->where($where1)->find();
            if($isuse!='')
            {
                $coupon['isuse']=1;
            }
            else{
                $coupon['isuse']=0;
            }
        }
        $returnArray=array("data"=>$couponlist);
        echo json_encode($returnArray);exit();
    }

    //游戏大鱼   根据游戏种类
    public function getgamecouponbytype(){
        $id=I('post.id',0,'intval');
        $where['cateid'] = $id;
        $couponlist=M('coupon_gamecoupon')->where($where)->order('startdate desc')->select();
        foreach($couponlist as &$coupon){
            $coupon['startdate']=date('Y-m-d ',$coupon['startdate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
            //$coupon['picture']=ACTIVITY_IMG_URL.$coupon['picture'];
        }
        $returnArray=array("data"=>$couponlist);
        echo json_encode($returnArray);exit();
    }

    //游戏大鱼 根据优惠卷ID获取兑换码ID
    public function getgamecode(){
        $id=I('post.id',0,'intval');
        $userid=I('post.uid');
        //$id=1;
        //$userid=1;
        $where['coupon_id']=$id;
        $where['is_use']=1;
        $codeinfo=M('coupon_gamecode')->where($where)-> field('coupon_code')->find();
        $returnArray=array("data"=>$codeinfo);
        $where1['coupon_code']=$codeinfo['coupon_code'];
        $where1['coupon_id']=$id;
        $data['is_use']=1;
        $data['user_id']=$userid;
        M('coupon_gamecode')->where($where1)->save($data);
        //优惠卷使用量+1
        $where2['id']=$id;
        M('coupon_gamecoupon')->where($where2)->setInc('useno');
        echo json_encode($returnArray);exit();
        //print_r($codeinfo);
    }


    //当日热门搜索，五个
    public function hotsearch()
    {
        strtotime(date('Y-m-d',time()));//当天0点时间
        //先清除之前时间的搜索数据
        $where['creattime']=array('LT',strtotime(date('Y-m-d',time())));
        M('coupon_searchkey')->where($where)->delete();
        //获取排行前5的搜索关键词
        $hotsearchInfo=M('coupon_searchkey')->field('keywords')->order('search desc')->limit(0,5)->select();
        $returnArray=array("data"=>$hotsearchInfo);
        echo json_encode($returnArray);exit();
    }

    public function search()
    {
        //$userid=I('post.uid');
        $keywords=I('post.key');
        //$keywords=25;
        //$keywords=urlencode($keywords);
        //print_r($keywords);
        //$keywords=mb_convert_encoding($keywords, 'GB2312', 'UTF-8');
        //添加进搜索库，先判断搜索库有没有这个关键词，有的话加一，没的话创建
        $where['keywords']=$keywords;
        $issearch=M('coupon_searchkey')->where($where)->find();
        //print_r($issearch);
        if($issearch!='')
        {
            M('coupon_searchkey')->where($where)->setInc('search');
        }
        else
        {
            $data['keywords']=$keywords;
            $data['search']=1;
            $data['creattime']=time();
            M('coupon_searchkey')->data($data)->add();
        }

       /* //优惠卷搜索
        $map['title'] = array('like','%'.$keywords.'%');
        //print_r($map);
        //搜索
        $couponlist= M('coupon_coupon')->where($map)->select();
        foreach($couponlist as &$coupon){
            $coupon['validate']=date('Y-m-d ',$coupon['validate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
        }

        //游戏优惠卷搜索
        $gamecouponlist= M('coupon_gamecoupon')->where($map)->select();
        $where1['user_id']=$userid;
        foreach($gamecouponlist as &$coupon){
            $coupon['startdate']=date('Y-m-d ',$coupon['startdate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            //$coupon['picture']=ACTIVITY_IMG_URL.$coupon['picture'];
            $coupon['useper']=floatval($coupon['useno']/$coupon['totle']);
            $coupon['odd']=$coupon['totle']-$coupon['useno'];
            $where1['coupon_id']=$coupon['id'];
            //判断该用户是否使用过该优惠卷
            $isuse=M('coupon_gamecode')->where($where1)->find();
            if($isuse!='')
            {
                $coupon['isuse']=1;
            }
            else{
                $coupon['isuse']=0;
            }
        }

        //值得买搜索
        $buycouponlist= M('coupon_worthbuy')->where($map)->select();
        foreach($buycouponlist as &$coupon){
            $coupon['startdate']=date('Y-m-d ',$coupon['startdate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['creatdate']=date('Y-m-d ',$coupon['creatdate']);
        }
        $returnArray=array("data"=>array("coupon"=>$couponlist,"gamecoupon"=>$gamecouponlist,'buycoupon'=>$buycouponlist));*/

        $map['title'] = array('like','%'.$keywords.'%');
        $couponlist= M('coupon_coupon')->field('title,link,thumb')->where($map)->select();
        foreach($couponlist as &$coupon){
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
        }
        $gamecouponlist= M('coupon_gamecoupon')->field('title,link,thumb')->where($map)->select();
        $buycouponlist= M('coupon_worthbuy')->field('title,link,thumb')->where($map)->select();
        $couponlistsum=array_merge($couponlist,$gamecouponlist);
        $couponlistsum=array_merge($couponlistsum,$buycouponlist);
        $returnArray=array("data"=>$couponlistsum);
        echo json_encode($returnArray);exit();
        /* print_r('<pre>');
        print_r($returnArray);
        print_r('</pre>');*/
    }

    //值得买根据状态调取数据
    public function getworthbystatus()
    {
        $status=I('post.id');
        //$status=1;
        //根据返回的状态对数据进行调用
        if($status==1)//猜你喜欢（根据点赞数量排序）
        {
            $couponlist=M('coupon_worthbuy')->order('upvote desc')->limit(20)->select();
        }
        else if($status==2)//最新（根据发布时间）
        {
            $couponlist=M('coupon_worthbuy')->order('creatdate desc')->limit(20)->select();
        }
        else if($status==3)//排行（根据领取数量10）
        {
            $couponlist=M('coupon_worthbuy')->order('collect desc')->limit(10)->select();
        }
        else if($status==4)//价格排行（由低到高）
        {
            $couponlist=M('coupon_worthbuy')->order('price asc')->limit(10)->select();
        }
        else if($status==5)//新品（根据发布时间，只取五条）
        {
            $couponlist=M('coupon_worthbuy')->order('creatdate desc')->limit(5)->select();
        }
        else if($status==6)//限量购（有数量限制）
        {
            $where['totle']=array('gt','0');
            $couponlist=M('coupon_worthbuy')->where($where)->order('creatdate desc')->limit(30)->select();
            foreach($couponlist as &$coupon){
                $coupon['useper']=floatval($coupon['receiveno']/$coupon['totle']);
            }
        }
        foreach($couponlist as &$coupon){
            $coupon['startdate']=date('Y-m-d ',$coupon['startdate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['creatdate']=date('Y-m-d ',$coupon['creatdate']);
        }
        /*foreach($couponlist as &$coupon){
            $coupon['startdate']=date('Y-m-d ',$coupon['startdate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['creatdate']=date('Y-m-d ',$coupon['creatdate']);
            $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
            //$coupon['picture']=ACTIVITY_IMG_URL.$coupon['picture'];
        }*/
        $returnArray=array("data"=>$couponlist);
        echo json_encode($returnArray);exit();
    }
    //值得买根据种类调取数据
    public function getworthbytype()
    {
        $cate=I('post.id');
        //$cate=4;
        $where['cateid']=$cate;
        $couponlist=M('coupon_worthbuy')->where($where)->order('upvote desc')->select();
        foreach($couponlist as &$coupon){
            $coupon['startdate']=date('Y-m-d ',$coupon['startdate']);
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
            $coupon['creatdate']=date('Y-m-d ',$coupon['creatdate']);
        }
        $returnArray=array("data"=>$couponlist);
        echo json_encode($returnArray);exit();
    }


    //优惠卷点赞
    public function couupvote()
    {
        $couponid=I('post.id');
        $userid=I('post.uid');
        //先判断有没有点过赞，如果点过则减一并删除该行数据，没点过则加一，创建该行数据
        $where['coupon_id']=$couponid;
        $where['user_id']=$userid;
        $isupvote=M('coupon_couupvote')->where($where)->find();
        if($isupvote['id']!='')//已经点赞过，则取消点赞
        {
            $where1['id']=$couponid;
            M('coupon_coupon')->where($where1)->setDec('upvote');
            $delupvote= M('coupon_couupvote')->where($where)->delete();
            if($delupvote)
            {
                $result=1;//取消点赞成功
            }
            else
            {
                $result=2;//取消点赞失败
            }
        }
        else//已经没有点赞过，则点赞
        {
            $where1['id']=$couponid;
            M('coupon_coupon')->where($where1)->setInc('upvote');
            $addupvote= M('coupon_couupvote')->data($where)->add();
            if($addupvote)
            {
                $result=3;//点赞成功
            }
            else
            {
                $result=4;//点赞失败
            }
        }
        echo json_encode(array('status'=>$result));exit();
    }

    //优惠卷收藏
    public function coucollect()
    {
        $couponid=I('post.id');
        $userid=I('post.uid');
        /*$couponid=35;
        $userid=13;*/
        //先判断有没有收藏过，如果收藏过则减一并删除该行数据，没点过则加一，创建该行数据
        $where['coupon_id']=$couponid;
        $where['user_id']=$userid;
        $iscollect=M('coupon_coucollect')->where($where)->find();
        if($iscollect['id']!='')//已经点赞过，则取消点赞
        {
            $where1['id']=$couponid;
            M('coupon_coupon')->where($where1)->setDec('collect');
            $delcollect= M('coupon_coucollect')->where($where)->delete();
            if($delcollect)
            {
                $result=1;//取消收藏成功
            }
            else
            {
                $result=2;//取消收藏失败
            }
        }
        else//已经没有点赞过，则点赞
        {
            $where1['id']=$couponid;
            M('coupon_coupon')->where($where1)->setInc('collect');
            $addcollect= M('coupon_coucollect')->data($where)->add();
            if($addcollect)
            {
                $result=3;//收藏成功
            }
            else
            {
                $result=4;//收藏失败
            }
        }
        echo json_encode(array('status'=>$result));exit();
    }
    //值得买点赞
    public function buyupvote()
    {
        $worthid=I('post.id');
        $userid=I('post.uid');
        //先判断有没有点赞过，如果点赞过则减一并删除该行数据，没点过则加一，创建该行数据
        $where['worthbuy_id']=$worthid;
        $where['user_id']=$userid;
        $isupvote=M('coupon_buyupvote')->where($where)->find();
        if($isupvote['id']!='')//已经点赞过，则取消点赞
        {
            $where1['id']=$worthid;
            M('coupon_worthbuy')->where($where1)->setDec('upvote');
            $delupvote= M('coupon_buyupvote')->where($where)->delete();
            if($delupvote)
            {
                $result=1;//取消点赞成功
            }
            else
            {
                $result=2;//取消点赞失败
            }
        }
        else//已经没有点赞过，则点赞
        {
            $where1['id']=$worthid;
            M('coupon_worthbuy')->where($where1)->setInc('upvote');
            $addupvote= M('coupon_buyupvote')->data($where)->add();
            if($addupvote)
            {
                $result=3;//点赞成功
            }
            else
            {
                $result=4;//点赞失败
            }
        }
        echo json_encode(array('status'=>$result));exit();
    }



    //值得买收藏
    public function buycollect()
    {
        $worthid=I('post.id');
        $userid=I('post.uid');
        //先判断有没有收藏过，如果收藏过则减一并删除该行数据，没点过则加一，创建该行数据
        $where['worthbuy_id']=$worthid;
        $where['user_id']=$userid;
        $iscollect=M('coupon_buycollect')->where($where)->find();
        if($iscollect['id']!='')//已经点赞过，则取消点赞
        {
            $where1['id']=$worthid;
            M('coupon_worthbuy')->where($where1)->setDec('collect');
            $delcollect= M('coupon_buycollect')->where($where)->delete();
            if($delcollect)
            {
                $result=1;//取消收藏成功
            }
            else
            {
                $result=2;//取消收藏失败
            }
        }
        else//已经没有收藏过，则收藏
        {
            $where1['id']=$worthid;
            M('coupon_worthbuy')->where($where1)->setInc('collect');
            $addcollect= M('coupon_buycollect')->data($where)->add();
            if($addcollect)
            {
                $result=3;//收藏成功
            }
            else
            {
                $result=4;//收藏失败
            }
        }
        echo json_encode(array('status'=>$result));exit();
    }

    //判断是否点赞收藏
    public function isuvtorcet()
    {
        $goodsid=I('post.id');
        $userid=I('post.uid');
        $status=I('post.status');//用于判断是优惠卷还是值得买
        /*$goodsid=35;
        $userid=13;
        $status=1;*/
        if($status==1)
        {//优惠卷
            $where['coupon_id']=$goodsid;
            $where['user_id']=$userid;
            $isupvote=M('coupon_couupvote')->where($where)->find();
            if($isupvote['id']!='')
            {//已经点赞
                $result1=1;
            }
            else
            {//没有点赞
                $result1=0;
            }
            $where1['coupon_id']=$goodsid;
            $where1['user_id']=$userid;
            $iscollect=M('coupon_coucollect')->where($where1)->find();
            if($iscollect['id']!='')
            {//已经收藏
                $result2=1;
            }
            else
            {//没有收藏
                $result2=0;
            }
        }
        else if($status==2)
        {//值得买
            $where2['worthbuy_id']=$goodsid;
            $where2['user_id']=$userid;
            $isupvote=M('coupon_buyupvote')->where($where2)->find();
            if($isupvote['id']!='')
            {//已经点赞
                $result1=1;
            }
            else
            {//没有点赞
                $result1=0;
            }
            $where3['worthbuy_id']=$goodsid;
            $where3['user_id']=$userid;
            $iscollect=M('coupon_buycollect')->where($where3)->find();
            if($iscollect['id']!='')
            {//已经收藏
                $result2=1;
            }
            else
            {//没有收藏
                $result2=0;
            }
        }
        //print_r($where1 );
        echo json_encode(array('status1'=>$result1,'status2'=>$result2));exit();
    }

    //获取用户点赞和收藏的优惠卷或值得买信息
    public function getinfobyuser()
    {
        $userid=I('post.uid');
        $status=I('post.status');//1优惠卷点赞  2优惠卷收藏   3值得买点赞  4值得买收藏
        //$userid=34;
        //$status=4;

        if($status==1)
        {//优惠卷点赞
            $Model = M();
            $couponinfo=$Model->query('select a.*  from dy_coupon_coupon a join dy_coupon_couupvote b on a.id=b.coupon_id and b.user_id='.$userid);
            foreach($couponinfo as &$coupon){
                $coupon['validate']=date('Y-m-d ',$coupon['validate']);
                $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
                $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
                $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
            }
        }
        else if($status==2)
        {//优惠卷收藏
            $Model = M();
            $couponinfo=$Model->query('select a.*  from dy_coupon_coupon a join dy_coupon_coucollect b on a.id=b.coupon_id and b.user_id='.$userid);
            foreach($couponinfo as &$coupon){
                $coupon['validate']=date('Y-m-d ',$coupon['validate']);
                $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
                $coupon['thumb']=ACTIVITY_IMG_URL.$coupon['thumb'];
                $coupon['banner']=ACTIVITY_IMG_URL.$coupon['banner'];
            }
        }
        else if($status==3)
        {//值得买点赞
            $Model = M();
            $couponinfo=$Model->query('select a.*  from dy_coupon_worthbuy a join dy_coupon_buyupvote b on a.id=b.worthbuy_id and b.user_id='.$userid);
        }
        else if($status==4)
        {//值得买收藏
            $Model = M();
            $couponinfo=$Model->query('select a.*  from dy_coupon_worthbuy a join dy_coupon_buycollect b on a.id=b.worthbuy_id and b.user_id='.$userid);
        }

        $returnArray=array("data"=>$couponinfo);
        echo json_encode($returnArray);exit();
    }

    //获取用户兑换码
    public function getusercode()
    {
        $userid=I('post.uid');
        //$userid=34;
        $Model = M();
        $codeinfo=$Model->query('select a.coupon_code,b.enddate,b.title  from dy_coupon_gamecode a join dy_coupon_gamecoupon b on b.id=a.coupon_id and a.user_id='.$userid);
        foreach($codeinfo as &$coupon){
            $coupon['enddate']=date('Y-m-d ',$coupon['enddate']);
        }
        $returnArray=array("data"=>$codeinfo);
        echo json_encode($returnArray);exit();
    }

    //点击量
    public function readno()
    {
       $where['id']=I('post.id');
        //$where['id']=31;
        M('coupon_coupon')->where($where)->setInc('readno');
    }

    public function php()
    {
        phpinfo();
    }

/*    //修改现在价格
    public function changenow()
    {
        $where['nowprice']=0;
        $codeinfo=M('coupon_worthbuy')->where($where)->select();
        foreach($codeinfo as &$coupon)
        {
            if(is_numeric(substr($coupon['general'],0,1)))//如果第一位是数字
            {
                $where1['id']=$coupon['id'];
                $data['nowprice']=$coupon['origprice']-substr($coupon['general'],0,3);
                M('coupon_worthbuy')->where($where1)->save($data);
            }
            else
            {
                $a=$coupon['general'];
                $b= (mb_strpos($a,"减",0,"UTF8"));
                $where1['id']=$coupon['id'];
                $data['nowprice']=$coupon['origprice']-substr(substr($a,$b+7),0,-3);
                M('coupon_worthbuy')->where($where1)->save($data);
            }

        }
        //print_r($codeinfo);
    }*/

    //获取临时替换链接
    public function getlink()
    {
        $link=M('coupon_link')->field('link')->find();
        $returnArray=array("data"=>$link);
        echo json_encode($returnArray);exit();
    }

   /* public function changetime()
    {
        $worthbuy=M('coupon_worthbuy')->select();
        foreach($worthbuy as &$coupon)
        {
            $data['startdate']=strtotime($coupon['startdate']);
            $data['enddate']=strtotime($coupon['enddate']);
            $data['creatdate']=strtotime($coupon['creatdate']);
            $where['id']=$coupon['id'];
            M('coupon_worthbuy')->where($where)->save($data);
        }
    }*/


    //获取贷款信息
    public function getloan()
    {
        $loan=M('coupon_loan')->alias('a')->join('dy_coupon_loancate b on a.cate=b.id')->select();
        foreach($loan as &$item)
        {
            $item['pic']=ACTIVITY_IMG_URL.$item['pic'];
        }
        $returnArray=array("data"=>$loan);
        echo json_encode($returnArray);exit();
    }
    //获取贷款信息h5
    public function getloanh5()
    {
        $loan=M('coupon_loan')->alias('a')->join('dy_coupon_loancate b on a.cate=b.id')->select();
        foreach($loan as &$item)
        {
            $item['pic']=ACTIVITY_IMG_URL.$item['pic'];
        }
        header('Content-type: application/json');
//获取回调函数名
        $jsoncallback = htmlspecialchars($_REQUEST ['jsoncallback']);
//json数据
        $json_data = json_encode($loan);
//输出jsonp格式的数据
        echo $jsoncallback . "(" . $json_data . ")";
    }
     //获取信用卡信息
    public function getcard()
    {
        $loan=M('coupon_card')->order('handlingtime desc')->limit(3)->select();
        foreach($loan as &$item)
        {
            $item['handlingtime']=date('Y-m-d',$item['handlingtime']);
            $item['pic']=ACTIVITY_IMG_URL.$item['pic'];
        }
        $returnArray=array("data"=>$loan);
        echo json_encode($returnArray);exit();
    }
    //获取信用卡信息h5
    public function getcardh5()
    {
        $loan=M('coupon_card')->order('handlingtime desc')->limit(3)->select();
        foreach($loan as &$item)
        {
            $item['handlingtime']=date('Y-m-d',$item['handlingtime']);
            $item['pic']=ACTIVITY_IMG_URL.$item['pic'];
        }

        header('Content-type: application/json');
//获取回调函数名
        $jsoncallback = htmlspecialchars($_REQUEST ['jsoncallback']);
//json数据
        $json_data = json_encode($loan);
//输出jsonp格式的数据
        echo $jsoncallback . "(" . $json_data . ")";
    }
    public function backnum()
    {
        if(session('num')!='')
        {
            $num=session('num');
            $num++;
            if($num==5) {session('num',null);}
            else {session('num',$num);}
            echo json_encode(array('status'=>2));
        }
        else
        {echo json_encode(array('status'=>1));
        session('num','1');}
    }
    public function geth5link()
    {
        $h5info=M('coupon_h5link')->order('createtime desc')->select();
        $returnArray=array("data"=>$h5info);
        echo json_encode($returnArray);exit();
    }
    //获取流量价格信息
    public function getflowinfo()
    {
        $where['cttype']=$_POST['cttype'];//cttype  运营商种类 1移动 2联通 3电信
        //$where['cttype']=1;
        $flowinfo=M('coupon_flow')->where($where)->order('id asc')->select();
        $returnArray=array("data"=>$flowinfo);
        echo json_encode($returnArray);exit();
    }

    //根据UID获取用户交易记录
    public function getbuyinfo()
    {
        $where['uid']=$_POST['uid'];
        //$where['uid']=2;
        $buyinfo=M('coupon_order')->where($where)->limit(0,10)->order('createtime DESC')->select();
        foreach ($buyinfo as &$item)
        {
            if($item['pay_status']==0){$item['pay_status']='交易取消';}
            elseif($item['pay_status']==1){$item['pay_status']='等待中';}
            elseif($item['pay_status']==3){$item['pay_status']='交易关闭';}
            elseif($item['pay_status']==4){$item['pay_status']='交易成功';}
            elseif($item['pay_status']==5){$item['pay_status']='充值失败';}
            $item['createtime']=date('Y-m-d H:i:s',$item['createtime']);
        }
        $returnArray=array("data"=>$buyinfo);
        echo json_encode($returnArray);exit();
    }


    //判断用户是不是当天第一次充值
    public function oncerecharge()
    {
        $where['uid'] = $_POST['uid'];
        //$where['uid']=34;
        $today = strtotime(date("Y-m-d"), time());
        $where['pay_status'] = array('GT', 0);
        $where['pay_time'] = array('GT', $today);
        $orderinfo = M('coupon_order')->where($where)->select();
        if (count($orderinfo) == 1) {
            $result= 1;
        } else
        {
            $result= 0;
        }
       echo  json_encode(array('status'=>$result));
    }

    //获取用户充值历史纪录号码
    public function gethistoryphone()
    {
        $where['uid'] = $_POST['uid'];
        // $where['uid']=34;
        $where['pay_status'] = array('GT', 0);
        $where['is_show']=0;
        $phoneinfo=M('coupon_order')->distinct(true)->field('phone')->where($where)->select();
        $returnArray=array("data"=>$phoneinfo);
        echo json_encode($returnArray);exit();
    }

    //一键清除历史记录
    public function clearphone()
    {
        $where['uid'] = $_POST['uid'];
        //$where['uid'] =35;
        $where['pay_status'] = array('GT', 0);
        $data['is_show']=1;
        $save=M('coupon_order')->where($where)->save($data);
        if($save)
        {
            $result=1;//修改密码成功
        }
        else{
            $result=2;
        }
        echo json_encode(array('status'=>$result));exit();

    }
    public function islastday()
    {
        $BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
        $mtime=strtotime("$BeginDate +1 month -2 day");
        if(time()>$mtime)
        {//月末2天不能充值
            $result=2;//不可充值
        }
        else
            {$result=1;}
        echo json_encode(array('status'=>$result));exit();
    }

    public function getInvitation()
    {
        $invitation_code=$this->create_password(8);
        echo $invitation_code;
    }

    ///////////////////////////公共函数////////////////////////////////////
     public function sendSMS($mobile, $msg, $needstatus = 'false', $product = '', $extno = '') {
        $chuanglan_config =array();//jiekou-clcs-15  密码 Poiuytrewq258    nmgyp88888    密码Nmgyp66666
        // 账户：nmgyp88888  密码：    Nmgyp6666      6
        $chuanglan_config['api_account']="nmgyp88888";
        $chuanglan_config['api_password']=" Nmgyp66666";
        $chuanglan_config['api_send_url']="http://222.73.117.158/msg/HttpBatchSendSM";


        //创蓝接口参数
        $postArr = array (
            'account' =>$chuanglan_config['api_account'],
            'pswd' =>$chuanglan_config['api_password'],
            'msg' => "【一只大鱼】".$msg,
            'mobile' => $mobile,
            'needstatus' => $needstatus,
            'product' => $product,
            'extno' => $extno
        );
        $result = $this->curlPost($chuanglan_config['api_send_url'], $postArr);
        return $result;
        /*     $result= simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA);
            $result=(array)$result;  ;
            foreach($result as $k=>$v){
                if($v instanceof SimpleXMLElement ||is_array($v)){
                    $result[$k]=xmlToArray($v);
                }
            }
            return $result;  */
    }

    /**
     * 通过CURL发送HTTP请求
     * @param string $url  //请求URL
     * @param array $postFields //请求参数
     * @return mixed
     */
    public function curlPost($url,$postFields){
        $postFields = http_build_query($postFields);
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postFields );
        $result = curl_exec ( $ch );
        curl_close ( $ch );
        return $result;
    }


    /**
     * 设置默认值
     */
    public function default_val($value = '',$val=''){
        return $value?$value:$val;
    }

    /**
     * 去重二维数组
     * @param unknown $array2D
     * @return multitype:
     */
    public function array_unique_fb($array2D)
    {
        foreach ($array2D as $v)
        {
            $v = join(",",$v); //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
            $temp[] = $v;
        }
        $temp = array_unique($temp); //去掉重复的字符串,也就是重复的一维数组
        foreach ($temp as $k => $v)
        {
            $temp[$k] = explode(",",$v); //再将拆开的数组重新组装
        }
        return $temp;
    }


    //生成邀请码
   public function create_password($pw_length)
{
    $randpwd = '';
    for ($i = 0; $i < $pw_length; $i++)
    {
        $x=mt_rand(1,3);
        if($x==1)
        {
            $randpwd .= chr(mt_rand(97, 122));
        }
        elseif($x==2)
        {
            $randpwd .= chr(mt_rand(65, 90));
        }
        elseif($x==3)
        {
            $randpwd .= chr(mt_rand(48, 57));
        }
    }
    $iscode=M('coupon_user')->where('invitation_code="'.$randpwd.'"')->find();
    if($iscode)
    {
        $randpwd=$this->create_password(8);
    }
    return $randpwd;
}

//修改分数封装函数
    /*
     * $uid 用户ID
     * $type +或者-
     * $num 操作的积分
     * $name 操作名
     * */
        public function changescore($uid,$type,$num,$name)
        {
            if($type=='+')
            {   //用户表经验增加
                M('coupon_user')->where('id='.$uid)->setInc('experience',$num);
                //用户表积分增加
                M('coupon_user')->where('id='.$uid)->setInc('score',$num);
                //判断有没有达到升级标准
                //获取用户等级关联升级需要经验和次数
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
                    $result=1;//等级提升
                }
                else
                {
                    $result=2;//等级无提升
                }
            }
            elseif($type=='-')
            {
                //用户表积分减少
                M('coupon_user')->where('id='.$uid)->setDec('score',$num);
                $result=3;//积分减少
            }
            //积分详情表创建
            $data['uid']=$uid;
            $data['type']=$type;
            $data['num']=$num;
            $data['name']=$name;
            $data['create_time']=time();
            M('coupon_coin_consume')->data($data)->add();
        }




        //封装抽奖函数
        //$proArr   [id]=>[概率]
        public function getRand($proArr) { //计算中奖概率
            $rs = ''; //z中奖结果
            $proSum = array_sum($proArr); //概率数组的总概率精度
            //概率数组循环
            foreach ($proArr as $key => $proCur) {
                $randNum = mt_rand(1, $proSum);
                if ($randNum <= $proCur) {
                    $rs = $key;
                    break;
                } else {
                    $proSum -= $proCur;
                }
            }
            unset($proArr);
            return $rs;
        }

       //封装判断小数是几位
        public function _getFloatLength($num) {
            $count = 0;
            $temp = explode ( '.', $num );
            if (sizeof ( $temp ) > 1) {
                $decimal = end ( $temp );
                $count = strlen ( $decimal );
            }
            return $count;
        }

        /*
         * 增加抽奖次数
         * $type   来源 1邀请好友  2首次登陆  3首次分享
         *
         *
         * */
        public function addlotterytime($uid,$type)
        {
            $result=2;
            $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
            $where['uid']=$uid;
            $where['create_day']=$nowday; //今日创建
            $where['type']=$type;
            if($type==1)
            {
                $lotterytimes1=M('coupon_lottery_result')->where($where)->count();//用户今日邀请创建的次数
                if($lotterytimes1>2)
                {
                    $result=1;
                }
            }elseif ($type==2)
            {
                $lotterytimes2=M('coupon_lottery_result')->where($where)->find();//用户今日首次登陆增加的次数
                if(!empty($lotterytimes2))
                {
                    $result=1;
                }
            }elseif ($type==3)
            {
                $lotterytimes3=M('coupon_lottery_result')->where($where)->find();//用户今日首次分享的次数
                if(!empty($lotterytimes3))
                {
                    $result=1;
                }
            }



            if( $result==1)
            {//邀请好友一天只能增加三次  首次登陆只能1次  首次分享只能一次
                return 1;
            }
            else
                {
                    $data['create_day']=$nowday;
                    $data['create_time']=time();
                    $data['uid']=$uid;
                    $data['type']=$type;
                    $data['status']=0;
                    $res=M('coupon_lottery_result')->add($data);
                    return 2;
                }
        }


    }