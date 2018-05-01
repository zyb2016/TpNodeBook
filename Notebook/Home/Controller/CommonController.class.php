<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    protected function _initialize(){
		//没有cookie就导向登录页面
		
		if(empty($_COOKIE['notebook_user'])){
    		$this->redirect('login/index');
    	}else{

    	}
	}
    
}