<?php
namespace Admin\Controller;
	
class ApiController extends CommonController
{
    public function note_types()//获取帖子的类型
    {
    	$types=[
    	'1'=>'推荐 ',
    	'2'=>'po图 ',
    	'3'=>'时髦开箱 ',
    	'4'=>'颜究所-培训手册 ',
    	'5'=>'颜究所-培训视频 ',
    	'6'=>'直播间 ',
    	'7'=>'其他 ',
    	];
//echo($type);
$this->ajaxReturn ($types,'JSON');
  }

	public function getCommentsByNoteid(){//根据帖子id获取评论
	$map=array();
	$map['noteid'] = I("get.noteid");
	$Data = D('notecomment');
	$list = $Data->where($map)->order('createtime desc')->select();
		 
	foreach($list as &$item){

if($item['uid']!=null)
$item['author']=M('member')->where('uid='.$item['uid'])->getField('description');
//dump($item['cateid']);die;
$item['createtime']=date('Y-m-d H:i:s', $item['createtime']);
    }
	$this->ajaxReturn ($list,'JSON');
	}
	
	
public function comment_destroy(){//删除评论
   		$model = M("notecomment");
		$res = $model-> delete(I('get.cid'));
		if($res){
			
	$Note = M("Note");
		$Note->commentno = $model->where('noteid='.I('get.noteid'))->count();

		$Note->where('id='.I('get.noteid'))->save(); // 根据条件更新记录		
			
		echo "ok";
		}
		else
			"操作失败";
   	}
}