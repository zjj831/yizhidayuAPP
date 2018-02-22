<?php
namespace Activity\Controller;

use Think\Controller;
class RegisterController extends MobileListController{
    public function index()
    {
        if(empty(I('param.uid')))
        {}
        else
        {
            $id=I('param.uid');
            $userinfo=M('coupon_user')->where('id='.$id)->field('invitation_code,nickname')->find();
            $assignData['code']=$userinfo['invitation_code'];
            if($assignData['code']=='')
            {
                $assignData['code']=$this->create_password(8);
                $data['invitation_code']=$assignData['code'];
                M('coupon_user')->where('id='.$id)->save($data);
            }
            $assignData['nickname']=$userinfo['nickname'];//活动信息


            $this->assign($assignData);
        }

        $this->display();
    }

    public function register()
    {
        $this->display();
    }


}