<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller
{
    public function _initialize()
    {
        header("Content-type: text/html; charset=utf-8");
        if (!session('aid')) redirect(U('Login/index'));
    }

    public function index()
    {
        $Model = D(CONTROLLER_NAME);
        $count = $Model->count();
        $Page =  new \Think\Page($count,5);
        $show = $Page->show();
        $list = $Model->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign(array(
            'count'=>$count,
            'data_list'=>$list,
            'page'     =>$show
        ));
        $this->display();
    }

    public function save()
    {
        $Model = D(CONTROLLER_NAME);
        if (IS_POST){
            $data = I('post.');
            !($Model->create($data))&&$this->error($Model->getError());
            $res = $Model->saveData($data);
            ($res !== false) ?$this->success():$this->error();
        }else{
            I('get.id')&&$this->assign('data_view',$Model->find(I('get.id')));
            $this->display();
        }
    }

    public function del()
    {
        I('post.id')&&D(CONTROLLER_NAME)->delete(I('post.id'))?$this->success():$this->error();
    }
}