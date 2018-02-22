<?php
namespace Admin\Controller;

class LoginController extends CommonController
{
		public function _initialize()
    {	
    }
    public function index()
    {
    	if(session('aid')!=null){
    		redirect(U('Index/index'));
    	}else{
//  		redirect(U('Login/index'));
    	}
        $this->display();
    }

	public function login(){
		if(IS_POST){
			$data = I('post.');
			$res = M('admin')->where(array('user_name'=>$data['username']))->find();
			if($res['password']==MD5($data['password'])){
				
				 session('aid',$res['id']);
                session('admin_nickname',$res['username']);
                
			$res = true;	
			}else{
				$res = false;
			}
			($res!=false)?$this->success():$this->error();
			
		}
		
		
	}


    public function logout()
    {
        session('aid',null);
        $this->success();
    }

}