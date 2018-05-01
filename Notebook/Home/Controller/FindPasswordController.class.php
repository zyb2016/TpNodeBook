<?php
namespace Home\Controller;
use Think\Controller;
import('Org.Email.email');
class FindPasswordController extends Controller{
    public function index(){
        $this->display();
    }

    public function find($checkcode, $id = ''){
    	$verify = new \Think\Verify();
		$verifyCheck = $verify->check($checkcode,$id);
		if( !$verifyCheck){	//校验验证码
			$this->redirect('index','',2,'验证码错误，页面跳转中');
			exit;
		}
		$mod=M('users');
		$where=array();
		$where['username']=$_POST['username'];
		$res=$mod->where($where)->find();
		if($res){
			if($res['email'] != $_POST['email']){
				$this->error('邮箱错误，请重新填写','index',3);
			}else{
				$data['password']=md5('123456');
				$res1=$mod->where($where)->save($data);
				if($res1 !== false){
					$smtpserver = "smtp.163.com";	//SMTP服务器
					$smtpserverport =25;			//SMTP服务器端口
					$smtpusermail = "13581964427@163.com";//SMTP服务器的用户邮箱
					$smtpemailto = $_POST['email'];	//发送给谁
					$smtpuser = "13581964427";		//SMTP服务器的用户帐号
					$smtppass = "13569693555zyb";	//SMTP服务器的用户密码
					$mailtitle = 'Notebook密码修改';//邮件主题
					$mailcontent = "<h1>您的Notebook的新密码为123456，请尽快修改！</h1>";//邮件内容
					$mailtype = "HTML";				//邮件格式（HTML/TXT）,TXT为文本邮件
					//************************ 配置信息 ****************************
					$smtp = new \smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
					//这里面的一个true是表示使用身份验证,否则不使用身份验证
					$smtp->debug = false;//是否显示发送的调试信息
					$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

					if($state ){
						$this->success('修改成功，请查看邮箱','index',3);
					}else{
						$this->error('邮件发送失败，请稍后再试！','index',3);
					}
				}else{
					$this->error('修改失败','index',3);
				}
			}
		}else{
			$this->error('无效账号','index',3);
		}
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