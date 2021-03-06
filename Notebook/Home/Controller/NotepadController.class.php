<?php
namespace Home\Controller;
use Think\Controller;
class NotepadController extends CommonController{
	
	public function index(){
    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$uid=$notebook_user['uid'];
    	$p=empty($_GET['p'])?1:$_GET['p'];	//分页参数
		$search=$_REQUEST['search'];
		
    	$mod = M('notepad');
		$where = array();
		if(!empty($search)){
			$where['uid']=$uid;
			//搜索
			$where['title']=array('like',"%".$search."%");
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
		$info=$mod->where($where)->limit($page->firstRow,$page->listRows)->order("createtime desc")->select();

		for($i=0;$i<count($info);$i++){
			$info[$i]['num']=($i+1)+($p-1)*10;
			$info[$i]['createtime_show']=date('Y-m-d H:i:s',$info[$i]['createtime']);
			//$info[$i]['title']=base64_decode($info[$i]['title']);
			$info[$i]['title']=($info[$i]['title']);
			$info[$i]['view_num']=($info[$i]['view_num']);
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
    	$this->assign('type','jishiben');
        $this->display();
    }
	
	/*
	//原sphinx搜索版本
    public function index(){
    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$uid=$notebook_user['uid'];
    	$p=empty($_GET['p'])?1:$_GET['p'];	//分页参数
		$search=$_REQUEST['search'];
		
    	$mod = M('notepad');
		$where = array();
		$where['uid']=$uid;
		if(!empty($search)){	//有需要查找的内容，则去 coreseek 忠查出对应的id
			$coreseek = new \SphinxClient();
			$coreseek->setServer("127.0.0.1", 9312);
			//SPH_MATCH_ALL, 匹配所有查询词(默认模式); SPH_MATCH_ANY, 匹配查询词中的任意一个; SPH_MATCH_EXTENDED2, 支持特殊运算符查询
			$coreseek->setMatchMode(SPH_MATCH_ALL);
			$coreseek->setMaxQueryTime(30);						//设置最大搜索时间
			$coreseek->SetArrayResult(false);					//是否将Matches的key用ID代替
			$coreseek->SetSelect ( "*" );						//设置返回信息的内容,等同于SQL
			$coreseek->SetLimits ( 0, 30, 1000, 0 );			//设置结果集偏移量  SetLimits
			$res = $coreseek->query($search,'mysql','--single-0-query--');
			$key = array_keys($res['matches']);
			$where['id']=array('in',$key);
			$coreseek->close();
		}else{
			
		}
		//获取总数据条数
		$total=$mod->where($where)->count();
		//实例化分页类
		$page=new \Think\Page($total,10);

		//调整分页样式
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
		//执行分页查询(获取数据)
		$info=$mod->where($where)->limit($page->firstRow,$page->listRows)->order("createtime desc")->select();
		
		$n=count($info);
		for($i=0;$i<$n;$i++){
			$info[$i]['num']=($i+1)+($p-1)*10;
			$info[$i]['createtime_show']=date('Y-m-d H:i:s',$info[$i]['createtime']);
			$info[$i]['title']=($info[$i]['title']);
		}
        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];

		if(!empty($search)){
			$page->parameter['search']=$search;
			
			//代码高亮
			$opt = array("before_match"=>"<font style='font-weight:bold;color:#f00'>","after_match"=>"</font>");
			$coreseek1 = new \SphinxClient();
			$coreseek1->setServer("127.0.0.1", 9312);
			$coreseek1->SetMatchMode(SPH_MATCH_ALL);
			$i=0;
			$tags_title=array();
			foreach($info as $key=>$row){
				$tags_title[]=$row['title'];
			}
			$replace_title=$coreseek1->BuildExcerpts($tags_title,'mysql',$search,$opt);
			foreach($info as $key=>&$row){
				$info[$key]['title']=$replace_title[$key];
			}
			$coreseek1->close();
		}

        $this->assign('logo',$logo);
        $this->assign('search',$search);
		$this->assign("info",$info);
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板
    	$this->assign('username',$notebook_user['username']);
    	$this->assign('type','jishiben');
        $this->display();
    }
	*/
	
    public function view(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $id=$_GET['id'];
        $mod = M('notepad');
        $where=array();
        $where['id']=$id;
        $info=$mod->where($where)->find();
        $info['view_num']=($info['view_num']);
        $info['title']=($info['title']);
        $info['data']=($info['data']);
        $mod->where("id={$id}")->setInc('view_num',1);
        
        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];


        $this->assign('logo',$logo);
        $this->assign('id',$id);
        $this->assign('view_num',$info['view_num']);
        $this->assign('title',$info['title']);
        $this->assign('content',$info['data']);
        $this->assign('type','jishiben');
        $this->display();
    }

    public function edit(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
    	$id=$_GET['id'];
    	$mod = M('notepad');
    	$where=array();
    	$where['id']=$id;
    	$info=$mod->where($where)->find();
    	$info['title']=($info['title']);
    	$info['data']=($info['data']);
    	$info['showtag']=$info['showtag'];

        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];

        $this->assign('logo',$logo);
    	$this->assign('id',$id);
    	$this->assign('showtag',$info['showtag']);
    	$this->assign('title',$info['title']);
    	$this->assign('content',$info['data']);
    	$this->assign('type','jishiben');
    	$this->display();
    }

    public function update_info(){
    	$id=$_POST['id'];
    	$title=$_POST['title'];
    	$showtag=$_POST['showtag'];
    	$content=$_POST['content'];
    	if(mb_strlen($title,'utf8') > 25){
    		echo 2;
    		exit;
    	}
    	if(mb_strlen($content,'utf8') > 15000){
            echo 3;
    		exit;
    	}

    	$mod = M('notepad');
    	$data['data']=($content);
    	$data['title']=htmlspecialchars($title);
		$data['showtag']=$showtag;
		$data['updatetime']=time();
		
    	if($mod->where("id={$id}")->save($data) !== false){
			echo 1;
		}else{
			echo 4;
		}
    }

    public function add(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod_users=M('users');
        $where_users=array();
        $where_users['uid']=$uid;
        $res_users=$mod_users->where($where_users)->find();
        $logo=$res_users['logo'];

        $this->assign('logo',$logo);
        $this->assign('type','jishiben');
		
		$this->display();
    }

    public function add_info(){
    	$title=$_POST['title'];
    	$content=$_POST['content'];
    	$showtag=$_POST['showtag'];
    	if(mb_strlen($title,'utf8') > 25){
    		echo 2;
    		exit;
    	}
    	if(mb_strlen($content,'utf8') > 15000){
    		echo 3;
    		exit;
    	}

    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	if(!isset($notebook_user)){
    		echo 5;//请刷新页面，重新登录
    		exit;
    	}
    	$uid=$notebook_user['uid'];
    	$username=$notebook_user['username'];

    	$mod = M('notepad');
    	$data=array(
			'uid'=> $uid,
			'username'=> $username,
			'showtag'=> $showtag,
			'createtime' => time(),
			'updatetime' => time(),
			'title' => htmlspecialchars($title),
			'data' => ($content),
		);
    	$res=$mod->data($data)->add();
    	if($res){
			echo 1;
		}else{
			echo 4;
		}
    }

    public function del_info(){
    	$id=$_POST['id'];
    	$mod = M('notepad');
    	if($mod->delete($id)){
			echo 1;
		}else{
			echo 2;
		}
    }


}
