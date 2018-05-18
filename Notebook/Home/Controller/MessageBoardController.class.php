<?php
namespace Home\Controller;
use Think\Controller;
class MessageBoardController extends CommonController{
    public function index(){
    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$uid=$notebook_user['uid'];
    	$p=empty($_GET['p'])?1:$_GET['p'];	//分页参数

    	$mod = M('board');
		//获取总数据条数
		$total=$mod->count();
		//实例化分页类
		$page=new \Think\Page($total,10);
		//调整分页样式
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
		//执行分页查询(获取数据)
		$info=$mod->limit($page->firstRow,$page->listRows)->order("createtime desc")->select();

		for($i=0;$i<count($info);$i++){
			$info[$i]['num']=($i+1)+($p-1)*10;
			$info[$i]['createtime_show']=date('Y-m-d H:i:s',$info[$i]['createtime']);
			$info[$i]['data']=base64_decode($info[$i]['data']);
			$info[$i]['nickname']=base64_decode($info[$i]['nickname']);
		}

        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];

        $this->assign('logo',$logo);
		$this->assign("info",$info);
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板

    	$this->assign('username',$notebook_user['username']);
    	$this->assign('uid',$notebook_user['uid']);
    	$this->assign('type','helpus');
        $this->display();
    }

    public function save_message(){
        $uid=$_POST['uid'];
        $nickname=$_POST['nickname'];
        $content=$_POST['content'];
    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$respon=array();

    	$uid=$_POST['uid'];
    	$nickname=$_POST['nickname'];
    	$content=$_POST['content'];
    	if($uid != $notebook_user['uid']){	//uid身份信息不符
    		$respon['error']=1;
    		$respon['reason']='身份信息不符，保存失败';
    		echo json_encode($respon);
            exit;
    	}
    	if(mb_strlen($nickname,'utf8') > 10){
    		$respon['error']=2;
    		$respon['reason']='姓名大于10个字，保存失败';
    		echo json_encode($respon);
            exit;
    	}
    	if(mb_strlen($content,'utf8') > 500){
    		$respon['error']=3;
    		$respon['reason']='内容大于500个字，保存失败';
    		echo json_encode($respon);
            exit;
    	}

    	$mod = M('board');
		$data=array(
			'uid'=> $uid,
			'createtime' => time(),
			'nickname' => base64_encode($nickname),
			'data' => base64_encode($content)
		);

		$res=$mod->data($data)->add();
		if($res){
			$respon['error']=0;
    		echo json_encode($respon);
		}else{
			$respon['error']=4;
			$respon['reason']='保存失败';
    		echo json_encode($respon);
		}

    }

}