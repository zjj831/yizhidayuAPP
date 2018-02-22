<?php
namespace Admin\Controller;
//后台首页
class IndexController extends CommonController
{
		public function _initialize()
    {
    	if(session('aid')==null){
    		redirect(U('Login/index'));
    	}
    }
    public function index()
    {
        $this->display();
    }

    public function quit()
    {
        session('aid',null);
        $this->success();
    }

}