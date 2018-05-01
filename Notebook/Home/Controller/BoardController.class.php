<?php
namespace Home\Controller;
use Think\Controller;
class BoardController extends CommonController{	//底部的公告
    public function AboutUs(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];
		
		$this->assign('username',$notebook_user['username']);
        $this->assign('logo',$logo);
    	$this->assign('content','AboutUs');
        $this->display('index');
    }
    public function Advertisement(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];
		
		$this->assign('username',$notebook_user['username']);
        $this->assign('logo',$logo);
    	$this->assign('content','Advertisement');
        $this->display('index');
    }
    public function Problem(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];

		$this->assign('username',$notebook_user['username']);
        $this->assign('logo',$logo);
    	$this->assign('content','Problem');
        $this->display('index');
    }
    public function Contact(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];

		$this->assign('username',$notebook_user['username']);
        $this->assign('logo',$logo);
    	$this->assign('content','Contact');
        $this->display('index');
    }
}