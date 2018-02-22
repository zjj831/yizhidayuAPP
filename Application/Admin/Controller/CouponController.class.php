<?php
/**
 * Created by PhpStorm.
 * User: tinkle
 * Date: 2017/9/18
 * Time: 14:36
 */
namespace Admin\Controller;
//优惠卷管理
class CouponController extends CommonController
{
    //优惠卷列表
    public function index()
    {
        $map=array();

        if(I("get.type")!=null&&I("get.type")!=0)
        {
            $where['pid']= I("get.type");
            $cateinfo=M('coupon_category')->where($where)->select();
            $cateidinfo=I("get.type");
            foreach ($cateinfo as &$v1)
            {
                $cateidinfo.=','.$v1['id'];
            }
            //$cateidinfo=substr($cateidinfo,1);
            $map['a.cateid'] = array('in',$cateidinfo);
            $map1['cateid'] = array('in',$cateidinfo);
        }

        if(I("get.keyword")!=null&&I("get.keyword")!="")
        {
            $map['a.title'] = array('like',"%".I("get.keyword")."%");
            $map1['title'] = array('like',"%".I("get.keyword")."%");
        }


        if(I("get.date")!=null&&I("get.date")!=""){
            $mytime = date_parse_from_format('Y年m月d日',I("get.date"));
            $starttime = mktime(0,0,0,$mytime['month'],$mytime['day'],$mytime['year']);

            $map['a.validate']=array(array('gt',$starttime),array('lt',$starttime+86400	));
            $map1['validate']=array(array('gt',$starttime),array('lt',$starttime+86400	));
        }
        $cate=M('coupon_category')->where('pid=0')->select();
        //分页
        $count = M('coupon_coupon')->where($map1)->count();
        $Page = new \Org\Bjy\Page($count,10);
        $show = $Page->show();
        $list = M('coupon_coupon')->alias('a')->join('dy_coupon_category b on a.cateid=b.id')
            ->field('a.id,a.title,a.validate,a.description,a.upvote,a.enddate,a.collect,b.title as catename')
            ->where($map)->order('a.id desc')->limit($Page->firstRow.','.$Page->listRows)->select();


        foreach($list as &$item){
            /*if($item['uid']!=null)
                $item['author']=M('member')->where('uid='.$item['uid'])->getField('description');*/
//dump($item['cateid']);die;
            $item['validate']=date('Y-m-d', $item['validate']);
            $item['enddate']=date('Y-m-d', $item['enddate']);
        }

        $this->assign('cate',$cate);//遍历出分类
        $this->assign('datas',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        session('myredirect_note',$_SERVER["REQUEST_URI"]);//此行代码用来，编辑帖子后跳转到原页面
        /*print_r('<pre>');
        print_r($cate);
        print_r('</pre>');*/
        $this->display();
    }
    //优惠卷添加
    public function couponcreate()
    {
        $pcate=M('coupon_category')->where('pid=0')->select();
        $cate2=M('coupon_category2')->select();
        $this->assign('pcate',$pcate);//遍历出分类
        $this->assign('cateid2',$cate2);//遍历出分类
        $this->display();
    }


    //优惠卷二级分类AJAX
    public function cateajax()
    {
       $id=$_POST['id'];
        //  $id=1;
        $cateinfo=M('coupon_category')->field('id,title')->where('pid='.$id)->select();
        if(count($cateinfo)==0)
        {
            echo json_encode(array('status'=>2));exit();
        }
        else
        {
            echo json_encode($cateinfo);exit();
        }
    }

    public function createstore()
    {
        $config = array(
            'maxSize'    =>    1048576,
            'rootPath'   =>    './Public/Activity/images/',
            'savePath'   =>    '',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传文件
        $info   =   $upload->upload();
        //echo json_encode($info);exit;
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else {// 上传成功
            //$info = $upload->getUploadFileInfo(); //取得成功上传的文件信息
            foreach($info as $key => $value){
                $data1[$key]['path'] = './Public/Activity/images/'.$value['savepath'].$value['savename'];//这里以获取在本地的保存路径为例
                //压缩图片
               /* $image = new \Think\Image();
                $image->open('./Public/Activity/images/' . $info['img']['savepath'] . $info['img']['savename']);
                // 生成一个缩放后填充大小150*150的缩略图并保存为thumb.jpg
                $image->thumb(502, 278)->save('./Public/Activity/images/' . $info['img']['savepath'] . 'thumb' . $info['img']['savename']);
                unlink('./Public/Activity/images/' . $info['img']['savepath'] . $info['img']['savename']);*/
                $image = new \Think\Image();
                $image->open($data1[$key]['path']);
                // 生成一个缩放后填充大小150*150的缩略图并保存为thumb.jpg
                $image->thumb(502, 278)->save('./Public/Activity/images/' . $value['savepath'] . 'thumb' . $value['savename']);
                //$value['savepath']
                unlink($data1[$key]['path']);
               // $data1[$key]['newpath']='images/'.$value['savepath'] . 'thumb' .$value['savename'];

            }
           // echo json_encode($info[1]['savename']);exit;

            $data['thumb'] = 'images/'.$info[0]['savepath'] . 'thumb' . $info[0]['savename'];
            $data['banner'] = 'images/'.$info[1]['savepath'] . 'thumb' . $info[1]['savename'];
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];//描述
            $data['link'] = $_POST['link'];//链接
            $data['style'] = $_POST['style'];//标签
            $data['useexp'] = $_POST['useexp'];//使用说明
            $data['introduce'] = $_POST['introduce'];//优惠介绍
            $data['receiveexp'] = $_POST['receiveexp'];//领取说明
            $data['useexp'] = $_POST['useexp'];//使用说明
            $data['cateid'] = $_POST['cate1'];
            $data['validate'] = time();

            $mytime = date_parse_from_format('Y年m月d日',$_POST['enddate']);
            $enddate = mktime(0,0,0,$mytime['month'],$mytime['day'],$mytime['year']);

            $data['enddate'] =$enddate;
            if ($_POST['cate2'] != '') {
                $data['cateid'] = $_POST['cate2'];
            }
            $data['cateid2'] = $_POST['catetwo'];
            $data['useexp'] = $_POST['useexp'];
            M('coupon_coupon')->data($data)->add();
            redirect(U('Coupon/index'));
        }
    }


    public function index_home()
    {
        $data['id']=$_GET['id'];
        $info=M('coupon_coupon')->where($data)->find();
        $where['id']=$info['cateid'];
        $cate=M('coupon_category')->where($where)->find();
        if($cate['pid']!=0)
        {//如果不是一级分类
            $info['cate1']=$cate['pid'];
            $info['cate2']=$cate['id'];
        }
        else
        {
            $info['cate1']=$cate['id'];
            $info['cate2']=0;
        }
        $cate11=M('coupon_category')->where('pid=0')->select();
        $cate2=M('coupon_category2')->select();
        $this->assign('cateid2',$cate2);//遍历出分类
        $this->assign('pcate',$cate11);
        $this->assign('couponinfo',$info);
        $this->display();
    }

    //删除优惠卷
    public function index_destroy()
    {
        $data['id']=$_GET['id'];
        $res= M('coupon_coupon')->where($data)->delete();
        if($res)
        {
            echo 'ok';
        }
        else
        {
            echo '删除失败';
        }
    }


    //优惠卷类别管理
    public function couponcate(){
        $where['pid']=0;
        $fcateInfo=M('coupon_category')->where($where)->select();
        foreach ($fcateInfo as &$item)
        {
            $where1['pid']=$item['id'];
            $sonInfo=M('coupon_category')->where($where1)->order('id desc')->select();
            $item['sonInfo']=$sonInfo;
        }
        $this->assign('info',$fcateInfo);
        $this->display();
    }
    //添加分类页面
    public function addcategory()
    {
        $cate=M('coupon_category')->where('pid=0')->select();
        $this->assign('pcate',$cate);
        $this->display();
    }
    //添加分类后台
    public function addcate()
    {
        $data['title']=$_POST['title'];
        $data['pid']=$_POST['pid'];
        M('coupon_category')->add($data);
        redirect(U('Coupon/couponcate'));
    }
    //添加分区
    public function addcate2()
    {
        $data['title']=$_POST['title'];
        M('coupon_category2')->add($data);
        redirect(U('Coupon/couponcate2'));
    }

    //删除种类
    public function deletecate()
    {
        $data['id']=$_POST['id'];
        //$data['id']=25;
        $cate=M('coupon_category')->where($data)->find();
        if($cate['pid']==0)
        {
            M('coupon_category')->where('pid='.$_POST['id'])->delete();
        }
        $res=M('coupon_category')->where($data)->delete();
        if($res)
        {
            $status=1;
        }
        echo json_encode(array('status'=>$status));exit();
    }
    //删除分区
    public function deletecate2()
    {
        $data['id']=$_POST['id'];
        $res=M('coupon_category2')->where($data)->delete();
        if($res)
        {
            $status=1;
        }
        echo json_encode(array('status'=>$status));exit();


    }


    //优惠卷分区管理
    public function couponcate2()
    {
        $info=M('coupon_category2')->select();
        $this->assign('info',$info);
        $this->display();
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
                $path = substr(__DIR__,0,23)."Public/Activity/images/".$headimg; // 产生随机唯一的名字


                $res = move_uploaded_file( // 从临时目录复制到目标目录
                    $_FILES["file"]["tmp_name"], // 存储在服务器的文件的临时副本的名称
                    $path);

                //压缩图片
                $image = new \Think\Image();
                $image->open('./Public/Activity/images/'.$headimg);
                // 生成一个缩放后填充大小150*150的缩略图并保存为thumb.jpg
                $image->thumb(400, 240,\Think\Image::IMAGE_THUMB_SCALE     )->save('./Public/Activity/images/thumb'.$headimg);
                $path =substr(__DIR__,0,23)."Public/Activity/images/thumb".$headimg;
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


    public function couponchange(){
        $data['thumb'] =substr($_POST['imgurl'],43);
        $data['banner'] =substr($_POST['imgurl2'],43);
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];//描述
        $data['link'] = $_POST['link'];//链接
        $data['style'] = $_POST['style'];//标签
        $data['useexp'] = $_POST['useexp'];//使用说明
        $data['introduce'] = $_POST['introduce'];//优惠介绍
        $data['receiveexp'] = $_POST['receiveexp'];//领取说明
        $data['useexp'] = $_POST['useexp'];//使用说明
        $data['cateid'] = $_POST['cate1'];
        if ($_POST['cate2'] != '') {
            $data['cateid'] = $_POST['cate2'];
        }
        $data['cateid2'] = $_POST['catetwo'];
        M('coupon_coupon')->where('id='.$_POST['id'])->data($data)->save();

    }
}