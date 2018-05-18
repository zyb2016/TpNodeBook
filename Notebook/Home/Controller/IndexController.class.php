<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController{
    public function index(){
    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$uid=$notebook_user['uid'];
    	$p=empty($_GET['p'])?1:$_GET['p'];	//分页参数

    	$mod = M('data');
		$where = array();
		if(!empty($_GET['search'])){
			$where['uid']=$uid;
			//搜索
		}else{
			$where['uid']=$uid;
		}
		//获取总数据条数
		$total=$mod->where($where)->count();
		//实例化分页类
		$page=new \Think\Page($total,10);
		//调整分页样式
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
		//执行分页查询(获取数据)
		$info=$mod->where($where)->limit($page->firstRow,$page->listRows)->order("addtime desc")->select();

		for($i=0;$i<count($info);$i++){
			$info[$i]['num']=($i+1)+($p-1)*10;
			$info[$i]['addtime_show']=date('Y-m-d H:i:s',$info[$i]['addtime']);
			$info[$i]['data']=base64_decode($info[$i]['data']);
		}
		$this->assign("info",$info);
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板

		$mod_users=M('users');
		$where_users=array();
		$where_users['uid']=$uid;
		$res_users=$mod_users->where($where_users)->find();
		$logo=$res_users['logo'];

    	$this->assign('username',$notebook_user['username']);
    	$this->assign('uid',$notebook_user['uid']);
    	$this->assign('logo',$logo);
    	$this->assign('type','shuibi');
        $this->display();
    }
    

    public function save_message(){
    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$respon=array();

    	$uid=$_POST['uid'];
    	$content=$_POST['content'];
    	if($uid != $notebook_user['uid']){	//uid身份信息不符
    		$respon['error']='身份信息不符，保存失败';
    		echo json_encode($respon);
    	}

    	$mod = M('data');
		$where = array(
		    'uid' => $uid
		);
		$data=array(
			'uid'=> $uid,
			'addtime' => time(),
			'data' => base64_encode(htmlspecialchars($content))
		);

		$res=$mod->data($data)->add();
		//$res=$mod->where($where)->data($data)->add();
		if($res){
			$respon['error']=0;
    		echo json_encode($respon);
		}else{
			$respon['error']='保存失败';
    		echo json_encode($respon);
		}
    }

    public function act_update(){
    	$id=$_POST['id'];
    	$content=$_POST['content'];
    	$mod = M('data');
    	$data['data']=base64_encode(htmlspecialchars($content));
    	if($mod->where("id={$id}")->save($data) !== false){
			echo 1;
		}
		else{
			echo 2;
		}
    }
    public function act_del(){
    	$id=$_POST['id'];
    	$mod = M('data');
    	if($mod->delete($id)){
			echo 1;
		}
		else{
			echo 2;
		}
    }

}