<?php
namespace Home\Controller;
use Think\Controller;
class VisitorController extends CommonController{	//必须祖册才能看到visitor信息，且只有admin才能看到visitor信息

    public function index(){
		$notebook_user=unserialize($_COOKIE['notebook_user']);
		if($notebook_user['username'] != 'admin'){
			$this->redirect('Homepage/index');
		}
    	$p=empty($_GET['p'])?1:$_GET['p'];	//分页参数
		
		$mod = M('visitor');
		$where = array();
		//获取总数据条数
		$total=$mod->where($where)->count();
		$total=($total>100)?100:$total;
		//实例化分页类
		$page=new \Think\Page($total,10);
		//调整分页样式
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
		//执行分页查询(获取数据)
		$info_find=$mod->where($where)->limit($page->firstRow,$page->listRows)->order("datetime desc")->select();
		
		$n=count($info_find);
		for($i=0;$i<$n;$i++){
			$info[$i]['num']=($i+1)+($p-1)*10;
			$info[$i]['datetime']=$info_find[$i]['datetime'];
			$info[$i]['ip']=$info_find[$i]['ip'];
			$info[$i]['address']=$info_find[$i]['address'];
			$info[$i]['ua']=$info_find[$i]['ua'];
		}
		$logo='/home_uploads/meng.jpg';

		$this->assign("info",$info);
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板
    	$this->assign('username',$notebook_user['username']);
    	$this->assign('uid',$notebook_user['uid']);
    	$this->assign('logo',$logo);
		
        $this->display();

    }

}