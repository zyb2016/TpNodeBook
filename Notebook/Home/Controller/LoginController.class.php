<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
    	//var_dump($_COOKIE);
        $this->display();
    }
    public function login(){
		$mod = M('users');
		$where = array(
		    'username' => I('post.username'),
		    'password' => I('post.password','','md5'),
		    'state' => 1,
		);
		$res=$mod->where($where)->find();
		if($res){
			$cookie_data=array();
			$cookie_data['username']=$res['username'];
			$cookie_data['phone']=$res['phone'];
			$cookie_data['email']=$res['email'];
			$cookie_data['addtime']=$res['addtime'];
			$cookie_data['uid']=$res['uid'];
			setcookie("notebook_user",serialize($cookie_data), time()+3600*24,'/');
			
			//记录登录日志
			$ip=$_SERVER["REMOTE_ADDR"];
			$mod = M('login');
			$data=array(
				'ip' => $ip,
				'uid' => $res['uid'],
				'username' => $res['username'],
				'time' => time(),
				'datetime' => date('Y-m-d H:i:s',time())
			);
			$res=$mod->data($data)->add();

			$this->success('登陆成功',U('index/index'),0);
		}else{
			$this->success('登陆失败',U('index'),1);
		}

    }
	public function signout(){	//退出
    	setcookie('notebook_user','',time()-1,'/');
    	$this->redirect('login/index');
    }
}