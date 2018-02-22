<?php
/**
 * Created by PhpStorm.
 * User: tinkle
 * Date: 2017/9/18
 * Time: 14:36
 */
namespace Admin\Controller;
//活动管理
class ActiveController extends CommonController
{
    //活动列表
    public function active()
    {
        if(I('get.Page')){
            $Page=I('get.Page');
        }else{
            $Page=1;
        }
        if(I('get.name')){
            $name='%'.I('get.name').'%';
        }else{
            $name='%';
        }
        if(I('get.starttime')){
            $starttime=strtotime(I('get.starttime'));
        }else{
            $starttime=mktime(0,0,0,date("m"),date("d"),date("Y"));
        }
        if(I('get.overtime')){
            $overtime=strtotime(I('get.overtime'));
        }else{
            $overtime=mktime(0,0,0,date("m"),date("d"),date("Y"))+86399;
        }
        $offnum=8;
        $dataCount=M("ActiveTempItem")->where(array('title'=>array('like',$name)))->field('id')->count();
        $activeList=M("ActiveTempItem")->where(array('title'=>array('like',$name)))->order('status ,create_time desc')->page($Page,$offnum)->select();

        foreach( $activeList as $key =>$value){
            $activeList[$key]['activeJoin']=M("ActiveUser")->where(array('active_id'=>$value['id'],'join_times'=>array('gt',0),'create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->count();
            $activeList[$key]['activeTotal']=M("ActiveUser")->where(array('active_id'=>$value['id'],'join_times'=>array('egt',0),'create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->count();
        //    $activeList[$key]['url']=urlencode("https://www.yizhidayu.com/index.php/Active/Active/index/media_id/44/entry_id/1158/ative_id/".$value['id']."");
        }

        $total['uv']=M("ActiveUser")->where(array('create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->count('distinct(uid)');
        $total['join_uv']=M("ActiveUserRecord")->where(array('create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and'),'join_times'=>array('gt',0)))->count('distinct(uid)');

        $Pages=ceil($dataCount/$offnum);
        if($Pages>10){
            $startPage=$Page-5;
            if($startPage<1){
                $startPage=1;
            }
            $viewPages=$startPage+8;
            if($viewPages>$Pages){
                $viewPages=$Pages;
            }
        }else{
            $startPage=1;
            $viewPages=$Pages;
        }

        $assignData['offnum']=$offnum;
        $assignData['Page']=$Page;
        $assignData['Pages']=$Pages;
        $assignData['startPage']=$startPage;
        $assignData['viewPages']=$viewPages;

        $assignData['total']=$total;
        $assignData['starttime']=$starttime;
        $assignData['overtime']=$overtime;
        $assignData['activeList']=$activeList;
        $assignData['dataCount']=$dataCount;

        $this->assign($assignData);
        $this->display();
        /*print_r('<pre>');
        print_r($assignData);
        print_r('</pre>');*/
    }

    //删除优惠卷
    public function index_destroy()
    {
        $data['id']=$_GET['id'];
        $res= M('coupon_worthbuy')->where($data)->delete();
        if($res)
        {
            echo 'ok';
        }
        else
        {
            echo '删除失败';
        }
    }



    //修改权重
    public function active_sort(){
        $resActive=M("ActiveTempItem")->where(array('id'=>I('post.active_id')))->find();
        if($resActive){
            M("ActiveTempItem")->where(array('id'=>intval(I('post.active_id'))))->save(array('weight'=>intval(I('post.weight'))));
            $outArray=array('status'=>1,'tip'=>'操作成功');
        }else{
            $outArray=array('status'=>2,'tip'=>'活动不存在');
        }
        echo json_encode($outArray);exit();
    }

    public function active_addstore()
    {
        $data['weight']=I('post.weight');
        $data['title']=I('post.title');
        $data['temp']=I('post.temp');
        $data['times']=I('post.times');
        $data['icon']=I('post.imgurl');
        $data['pic']=I('post.imgurl2');
        $data['determine']=I('post.determine');
        $data['create_time']=time();
        $data['update_time']=time();
        $data['time_stamp']=date('Y-m-d H:i:s',time());
        $data['status']=I('post.status');
        $data['new_add']=1;
        $data['type']=1;
        /*print_r('<pre>');
        print_r($data);
        print_r('</pre>');*/
        $res=M("ActiveTempItem")->data($data)->add();
        if($res)
        {
            redirect(U('Active/active'));
        }

    }

    public function active_edit()
    {
        $activeInfo=M("ActiveTempItem")->where(array('id'=>I('get.id')))->find();
        //$assignData['activeInfo']=$activeInfo;
        $this->assign('activeInfo',$activeInfo);
        $this->display();
    }

    public function active_edit_save(){
        $data['weight']=I('post.weight');
        $data['title']=I('post.title');
        $data['temp']=I('post.temp');
        $data['times']=I('post.times');
        $data['icon']=I('post.imgurl');
        $data['pic']=I('post.imgurl2');
        $data['determine']=I('post.determine');
        $data['update_time']=time();
        $data['status']=I('post.status');
        /*print_r('<pre>');
        print_r($data);
        print_r('</pre>');*/
        $where['id']=I('post.id');
        $res=M("ActiveTempItem")->where($where)->save($data);
        if($res)
        {
            redirect(U('Active/active'));
        }
    }

    //
    public function coupon()
    {
        if(I('get.Page')){
            $Page=I('get.Page');
        }else{
            $Page=1;
        }
        if(I('get.title')){
            $name='%'.I('get.title').'%';
        }else{
            $name='%';
        }
        if(I('get.starttime')){
            $starttime=strtotime(I('get.starttime'));
        }else{
            $starttime=mktime(0,0,0,date("m"),date("d"),date("Y"));
        }
        if(I('get.overtime')){
            $overtime=strtotime(I('get.overtime'));
        }else{
            $overtime=mktime(0,0,0,date("m"),date("d"),date("Y"))+86399;
        }

        $offnum=5;
        //$dataCount=M("AdverCert")->alias('a')->join('dy_adver b ON a.uid = b.id')->where(array('a.title'=>array('like',$name)))->count();
        //$certList=M("AdverCert")->alias('a')->join('dy_adver b ON a.uid = b.id')->where(array('a.title'=>array('like',$name)))->order('a.status desc,a.weight desc,a.new_add desc,a.arpu desc,a.create_time asc')->page($Page,$offnum)->field('b.company,a.*')->select();

        $dataCount=M("AdverCert")->where(array('title'=>array('like',$name)))->count();
        $certList=M("AdverCert")->where(array('title'=>array('like',$name)))->order('status desc,weight desc,new_add desc,arpu desc,create_time asc')->page($Page,$offnum)->field('*')->select();


        foreach( $certList as $key =>$value){
            $certList[$key]['grant']=M("ActiveUserRecord")->where(array('cert_id'=>$value['id'],'create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->count();
            $certList[$key]['grant_uv']=M("ActiveUserRecord")->where(array('cert_id'=>$value['id'],'create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->count('distinct(uid)');
            //$certList[$key]['cost_money']=M("AdverCashPay")->where(array('cert_id'=>$value['id'],'create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and'),'status'=>1))->sum('money');
            $certList[$key]['grant_arpu']=  number_format(($certList[$key]['cost_money']/100)/$certList[$key]['grant'],3);
            $certList[$key]['catch']=M("ActiveUserRecord")->where(array('cert_id'=>$value['id'],'create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and'),'status'=>1))->count();
            $certList[$key]['catch_uv']=M("ActiveUserRecord")->where(array('cert_id'=>$value['id'],'create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and'),'status'=>1))->count('distinct(uid)');
            $certList[$key]['catch_arpu']=number_format(($certList[$key]['cost_money']/100)/$certList[$key]['catch'],3);
            $certList[$key]['rotate']= number_format(($certList[$key]['catch']/$certList[$key]['grant'])*100,2);
        }
        //echo json_encode($overtime);exit;
        /*    $total['grant']=M("ActiveUserRecord")->where(array('create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->count();
            $total['grant_uv']=M("ActiveUserRecord")->where(array('create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->count('distinct(uid)');
            $total['total']=M("AdverCashPay")->where(array('create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and')))->sum('money');
            $total['grant_arpu']= number_format(($total['total']/100)/$total['grant'],3);
            $total['catch']=M("ActiveUserRecord")->where(array('create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and'),'status'=>1))->count();
            $total['catch_uv']=M("ActiveUserRecord")->where(array('create_day'=>array(array('egt',$starttime),array('elt',$overtime),'and'),'status'=>1))->count('distinct(uid)');
            $total['catch_arpu']=number_format(($total['total']/100)/$total['catch'],3);
            $total['rotate']= number_format(($total['catch']/$total['grant'])*100,2);
            $total['cost']= M("AdverCert")->sum('cost');
            $total['balance']= M("AdverCert")->sum('total');
            $total['daily_limit']= M("AdverCert")->sum('daily_limit');
            $total['full_limit']= M("AdverCert")->sum('full_limit');
            $total['cert_load']= M("AdverCert")->where(array('status'=>1))->count();  */

        $Pages=ceil($dataCount/$offnum);
        if($Pages>10){
            $startPage=$Page-5;
            if($startPage<1){
                $startPage=1;
            }
            $viewPages=$startPage+8;
            if($viewPages>$Pages){
                $viewPages=$Pages;
            }
        }else{
            $startPage=1;
            $viewPages=$Pages;
        }

        $assignData['offnum']=$offnum;
        $assignData['Page']=$Page;
        $assignData['Pages']=$Pages;
        $assignData['startPage']=$startPage;
        $assignData['viewPages']=$viewPages;

        $assignData['starttime']=$starttime;
        $assignData['overtime']=$overtime;
        $assignData['certList']=$certList;
        $assignData['dataCount']=$dataCount;
        //$assignData['total']=$total;
        $this->assign($assignData);
        /*print_r('<pre>');
        print_r($assignData);
        print_r('</pre>');*/
        $this->display();
    }

    public function adver_cert_sort(){
        $resCert=M("AdverCert")->where(array('id'=>I('post.cert_id')))->find();
        if($resCert){
            M("AdverCert")->where(array('id'=>intval(I('post.cert_id'))))->save(array('weight'=>intval(I('post.weight'))));
            $outArray=array('status'=>1,'tip'=>'添加成功');
        }else{
            $outArray=array('status'=>2,'tip'=>'优惠券不存在');
        }
        echo json_encode($outArray);exit();
    }

    public function adver_cert_status(){
        $resCert=M("AdverCert")->where(array('id'=>I('post.cert_id')))->find();
        if($resCert['status']==1){
            M("AdverCert")->where(array('id'=>intval(I('post.cert_id'))))->save(array('status'=>0));
            $status=0;
        }else{
            M("AdverCert")->where(array('id'=>intval(I('post.cert_id'))))->save(array('status'=>1));
            $status=1;
        }
        $outArray=array('id'=>intval(I('post.cert_id')),'status'=>$status,'tip'=>'操作成功');
        echo json_encode($outArray);exit();
    }

    public function coupon_add(){
        $this->assign('today',time());
        $this->display();
    }

    public function coupon_add_store(){
       //echo json_encode($_POST);exit;
        $data['weight']=I('post.weight');
        $data['type']=I('post.type');
        $data['icon']=I('post.imgurl');
        $data['pic']=I('post.imgurl2');
        $data['icon']=I('post.imgurl');
        $data['title']=I('post.title');
        $data['name']=I('post.name');
        $data['href']=I('post.href');
        $data['price']=I('post.price');
        $data['total']=I('post.total');
        $data['system']=I('post.system');
        $data['expiry_time']=strtotime(I('post.expiry_time'));
        $data['daily_limit']=I('post.daily_limit');
        $data['full_limit']=I('post.full_limit');
        $data['catch_day_limit']=I('post.catch_day_limit');
        $data['catch_limit']=I('post.catch_limit');
        $data['status']=I('post.status');
        $data['isalone']=I('post.isalone');
        $data['create_time']=time();
        $data['new_add']=1;
        /*print_r('<pre>');
        print_r($data);
        print_r('</pre>');*/
        $res=M("AdverCert")->data($data)->add();
        if($res)
        {
            redirect(U('Active/coupon'));
        }
    }

    //单卷编辑
    public function coupon_edit()
    {
        $couponInfo=M("AdverCert")->where(array('id'=>I('get.id')))->find();
        //$assignData['activeInfo']=$activeInfo;

        $this->assign('couponInfo',$couponInfo['expiry_time']);
        $this->assign('couponInfo',$couponInfo);
        $this->display();
    }
    //单卷编辑保存
    public function coupon_edit_save(){
        $data['weight']=I('post.weight');
        $data['type']=I('post.type');
        $data['icon']=I('post.imgurl');
        $data['pic']=I('post.imgurl2');
        $data['icon']=I('post.imgurl');
        $data['title']=I('post.title');
        $data['name']=I('post.name');
        $data['href']=I('post.href');
        $data['price']=I('post.price');
        $data['total']=I('post.total');
        $data['system']=I('post.system');
        $data['expiry_time']=strtotime(I('post.expiry_time'));
        $data['daily_limit']=I('post.daily_limit');
        $data['full_limit']=I('post.full_limit');
        //$data['catch_day_limit']=I('post.catch_day_limit');
        $data['catch_limit']=I('post.catch_limit');
        $data['status']=I('post.status');
        $data['isalone']=I('post.isalone');
        /*print_r('<pre>');
        print_r($data);
        print_r('</pre>');*/
        $res=M("AdverCert")->where('id='.I('post.id'))->save($data);
        if($res)
        {
            redirect(U('Active/coupon'));
        }
    }

    //修改图片
    public function changepic()
    {
        if ($_FILES["file"]["type"])
        {
            if ($_FILES["file"]["error"] > 0) {
                $result = $_FILES["file"]["error"]; // 错误代码
            } else {
                $fillname = $_FILES['file']['name']; // 得到文件全名
                $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
                $type = end($dotArray); // 得到最后一个元素：文件后缀
                $headimg = md5(uniqid(rand())).'.'.$type;
                $path = substr(__DIR__,0,23)."Public/uploads/active/".$headimg; // 产生随机唯一的名字


                $res = move_uploaded_file( // 从临时目录复制到目标目录
                    $_FILES["file"]["tmp_name"], // 存储在服务器的文件的临时副本的名称
                    $path);

               //压缩图片
                $image = new \Think\Image();
                $image->open('./Public/uploads/active/'.$headimg);
                // 生成一个缩放后填充大小150*150的缩略图并保存为thumb.jpg
                $image->thumb(200, 120,\Think\Image::IMAGE_THUMB_FILLED)->save('./Public/uploads/active/thumb'.$headimg);
                $path =substr(__DIR__,0,23)."Public/uploads/active/thumb".$headimg;
                $result=5;
                //$result=$res;
                if ($res){
                    $result=1;
                   $path='http://www.adgame.ink/test/'.substr($path,23);
                    echo $path;
                }
            }
        } else {
            $result = 2;//没有上传图片
        }
       /* $returnArray=array("status"=>$result);
        echo json_encode($returnArray);exit();*/
    }



}