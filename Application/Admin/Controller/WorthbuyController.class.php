<?php
/**
 * Created by PhpStorm.
 * User: tinkle
 * Date: 2017/9/18
 * Time: 14:36
 */
namespace Admin\Controller;
//值得买管理
class WorthbuyController extends CommonController
{
    //优惠卷列表
    public function index()
    {
        $map=array();

        if(I("get.type")!=null&&I("get.type")!=0)
        {
            $map['a.cateid'] = array('eq',I("get.type"));
            $map1['cateid'] = array('eq',I("get.type"));
        }

        if(I("get.keyword")!=null&&I("get.keyword")!="")
        {
            $map['a.title'] = array('like',"%".I("get.keyword")."%");
            $map1['title'] = array('like',"%".I("get.keyword")."%");
        }


        if(I("get.date")!=null&&I("get.date")!=""){
            $mytime = date_parse_from_format('Y年m月d日',I("get.date"));
            $starttime = mktime(0,0,0,$mytime['month'],$mytime['day'],$mytime['year']);

            $map['a.creatdate']=array(array('gt',$starttime),array('lt',$starttime+86400	));
            $map1['creatdate']=array(array('gt',$starttime),array('lt',$starttime+86400	));
        }
        $cate=M('coupon_buycategory')->select();
        //分页
        $count = M('coupon_worthbuy')->where($map1)->count();
        $Page = new \Org\Bjy\Page($count,10);
        $show = $Page->show();
        $list = M('coupon_worthbuy')->alias('a')->join('dy_coupon_buycategory b on a.cateid=b.id')
            ->field('a.id,a.title,a.creatdate,a.upvote,a.totle,a.startdate,a.enddate,a.collect,b.title as catename')
            ->where($map)->order('a.id desc')->limit($Page->firstRow.','.$Page->listRows)->select();


        foreach($list as &$item){
            /*if($item['uid']!=null)
                $item['author']=M('member')->where('uid='.$item['uid'])->getField('description');*/
//dump($item['cateid']);die;
            $item['startdate']=date('Y-m-d', $item['startdate']);
            $item['enddate']=date('Y-m-d', $item['enddate']);
        }

        $this->assign('cate',$cate);//遍历出分类
        $this->assign('datas',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        session('myredirect_note',$_SERVER["REQUEST_URI"]);//此行代码用来，编辑帖子后跳转到原页面
        /*print_r('<pre>');
        print_r($list);
        print_r('</pre>');*/
        $this->display();
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




    public function excel_handler(){
        $files = $_FILES['file'];
//    dump($files);die();

        // exl格式，否则重新上传
        if($files['type'] !='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
            $this->error('不是Excel文件，请重新上传');
        }

        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Public/uploads/',
            'savePath'   =>    '',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('xls','xlsx'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
            return;
        }
        $file_name =  $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];
        $model = M("coupon_worthbuy");

        $this->putin($file_name, $model);

    }


    private function putin($file_path,$Model)
    {
        header("Content-type:text/html;charset=utf-8");

        //导入数据到数        据库
        //引入PHPExcel 如果不是TP用require_once
        vendor("PHPExcel.PHPExcel");
        vendor("PHPExcel.IOFactory");
        $cacheMethod = \PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
        $cacheSettings = array( 'memoryCacheSize ' => '8MB');
        \PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

        // 实例化exel对象
        //文件路径


        if (!file_exists($file_path)){
            die('file not exists');
        }
//dump($file_path);die;
        //文件的扩展名
        $ext = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));

        if ($ext == 'xlsx'){

            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');

            $objPHPExcel = $objReader->load($file_path);

        }elseif($ext == 'xls'){
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($file_path);
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();//获取总行数
        $highestColumn = $sheet->getHighestColumn();//获取总列数

//echo $highestRow;die;

        for ($i = 1;$i<=$highestRow;$i++){
            $record = array();//申明每条记录数组
            for ($j = 'A';$j<=$highestColumn;$j++){
                $record[] = $objPHPExcel->getActiveSheet()->getCell("$j$i")->getValue();//读取单元格
            }
            //1标题 2来源地（淘宝京东） 3开始时间 4结束时间 5发放总量 6.优惠介绍  7.使用说明  8.领取说明
            //9.图片地址  10.活动链接  11.原价  12.现价   13.简介  14.种类（准确填写） 15.标签
            $data['title'] = $record[0];//1标题
            $data['from'] = $record[1];//2来源地
            //$data['startdate'] = $record[2];//3开始时间
            $data['startdate']       = intval(($record[2]-25569)* 3600 * 24);//此处时间之所以这样处理，是因为excel表格日期导入数据库不是正确的时间戳

            $data['enddate'] = intval(($record[3]-25569)* 3600 * 24);//4结束时间
            $data['totle'] = $record[4];//5发放总量
            $data['introduce'] = $record[5];//6优惠介绍
            $data['useexp'] = $record[6];//7使用说明
            $data['receiveexp'] = $record[7];//8领取说明
            $data['thumb'] = $record[8];//9图片地址
            $data['link'] = $record[9];//10活动链接
            $data['origprice'] = $record[10];//11原价
            $data['nowprice'] = $record[11];//12现价
            $data['general'] = $record[12];//13简介

            $wherecate['title']=$record[13];
            $worthcate=M('coupon_buycategory')->where($wherecate)->find();
            $data['cateid'] = $worthcate['id'];//14种类（准确填写）


            $data['style'] = $record[14];//15标签
            $data['creatdate'] = time();
            //数据查询
//          if (!($Model->where(array('phone'=>$record[0]))->find())&&$record[0]){
            $res = $Model->add($data);
            if($res == false){
                echo '插入数据出错!数据格式为:';
                dump($record);
                die;
            }
//          }
        }
        echo '数据插入成功';


        unlink($file_path);
        redirect(U('Worthbuy/index'));


    }
    /*    public function expUser(){
            $data = M('member')->field('id,realname,manager,contact,manager_contact,createtime')->select();
            foreach ($data as $k => $v)
            {
                $data[$k]['createtime']=$v['createtime']=date('Y-m-d',$v['createtime']);
            }
            //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
            Vendor("PHPExcel");
            Vendor("PHPExcel.Writer.Excel5");
            Vendor("PHPExcel.IOFactory.php");
            $filename="test_excel";
            $headArr=array("编号","姓名","联系方式","负责人","负责人联系方式","创建日期");
            $this->getExcel($filename,$headArr,$data);
        }

        private    function getExcel($fileName,$headArr,$data){
            //对数据进行检验
            if(empty($data) || !is_array($data)){
                die("data must be a array");
            }
            //检查文件名
            if(empty($fileName)){
                exit;
            }
            import("Ventor.PHPExcel");
            import("Ventor.PHPExcel.Writer.Excel5");
            import("Ventor.PHPExcel.IOFactory.php");
            $date = date("Y_m_d",time());
            $fileName .= "_{$date}.xls";
            //创建PHPExcel对象，注意，不能少了\
            $objPHPExcel = new \PHPExcel();
            $objProps = $objPHPExcel->getProperties();

            //设置表头
            $key = ord("A");
            foreach($headArr as $v){
                $colum = chr($key);
                $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
                $key += 1;
            }
            $column = 2;
            $objActSheet = $objPHPExcel->getActiveSheet();
            foreach($data as $key => $rows){ //行写入
                $span = ord("A");
                foreach($rows as $keyName=>$value){// 列写入
                    $j = chr($span);
                    $objActSheet->setCellValue($j.$column, $value);
                    $span++;
                }
                $column++;
            }
            $fileName = iconv("utf-8", "gb2312", $fileName);
            //重命名表
            // $objPHPExcel->getActiveSheet()->setTitle('test');
            //设置活动单指数到第一个表,所以Excel打开这是第一个表
            $objPHPExcel->setActiveSheetIndex(0);
            ob_end_clean();
            ob_start();
            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=\"$fileName\"");
            header('Cache-Control: max-age=0');
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output'); //文件通过浏览器下载
            exit;
        }*/


    public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");

        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}