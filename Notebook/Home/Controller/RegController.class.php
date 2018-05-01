<?php
namespace Home\Controller;
use Think\Controller;
class RegController extends Controller{
    public function index(){
        $this->display();
    }

    //ajax进行用户名验证
    public function regajaxuser(){
		$username=$_GET['username'];
		
		$mod=M('users');
		$where['username'] = $username;
		$res_num=$mod->where($where)->count();

		if($res_num != 0){	//有相同姓名的账号
			$this->ajaxReturn(true);
		}else{
			$this->ajaxReturn(false);
		}
    }

    public function regist($verifi_code, $id = ''){
    	$verify = new \Think\Verify();
		$verifyCheck = $verify->check($verifi_code,$id);
		if( !$verifyCheck){	//校验验证码
			$this->redirect('index','',2,'验证码错误，页面跳转中');
			exit;
		}

		$data['username']=$_POST['username'];
		$data['phone']=$_POST['telephone'];
		$data['email']=$_POST['email'];
		$data['logo']='/home_uploads/meng.jpg';
		$data['password']=md5($_POST['password']);
		$data['addtime']=time();

		//判断姓名是否重复
		$mod=M('users');
		$where['username'] = $data['username'];
		$res_num=$mod->where($where)->count();
		if($res_num != 0){
			$this->error('注册姓名重复，请重新输入...','index',2);
		}

		if($mod->add($data)){
			$cookie_data['username']=$data['username'];
			$cookie_data['phone']=$data['phone'];
			$cookie_data['email']=$data['email'];
			$cookie_data['addtime']=$data['addtime'];
			setcookie('notebook_user',$cookie_data,time()+3600*24*7);

			$this->success('注册成功', U('Index/index'));
		}else{
			$this->error('注册失败','index',2);
		}
    }

    //生成验证码
    public function showVerify(){
		//配置验证码生成
		$data = array(
		    'fontSize' => 40,
		    'length' => 4,
		    'useNoise' => false
		);
		$Verify = new \Think\Verify($data);
		$Verify->entry();
    }
}