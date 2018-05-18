<?php
namespace Home\Controller;
use Think\Controller;
class HomepageController extends Controller{
	public function getCity($ip=''){
		if($ip == ''){
	        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
	        $data=json_decode(file_get_contents($url),true);
			$address=$data['country'].$data['province'].$data['city'].$data['isp'];
	    }else{
	        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
	        $ip=json_decode(file_get_contents($url));   
	        if((string)$ip->code=='1'){
	           return false;
	        }
	        $data = (array)$ip->data;
	        $address=$data['country'].$data['region'].$data['city'].$data['isp'];
	    }    
	    return $address;
	}

    public function index(){
		/*	D方法定义多表联查
		$mod = D('Notepad');
        $info=$mod->relation(true)->find(7);
		var_dump($info);
		*/
		$_SERVER["REMOTE_ADDR"] = ($_SERVER["REMOTE_ADDR"]=="::1")?'':$_SERVER["REMOTE_ADDR"];
		$address=$this->getCity($_SERVER["REMOTE_ADDR"]);
		//来访者60分钟内登录记录
		if(empty($_COOKIE['notebook_visitor'])){	//记录IP，并留下20分钟的cookid
			$ip=$_SERVER["REMOTE_ADDR"];
			$mod = M('visitor');
			$cookie_data=array(
				'ip' => $ip,
				'time' => time(),
				'datetime' => date('Y-m-d H:i:s',time()),
				'ua' => $_SERVER['HTTP_USER_AGENT'],
				'address'=>$address
			);
			$res=$mod->data($cookie_data)->add();
			setcookie("notebook_visitor",serialize($cookie_data), time()+2*60*60,'/');
    	}else{

    	}
		
		$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$uid=$notebook_user['uid'];
    	$p=empty($_GET['p'])?1:$_GET['p'];	//分页参数
		
		$mod = D('Notepad');
		$where = array();
		$where['showtag']=1;
		//获取总数据条数
		$total=$mod->where($where)->count();
		//实例化分页类
		$page=new \Think\Page($total,10);
		//调整分页样式
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
		//执行分页查询(获取数据)
		$info_find=$mod->relation(true)->where($where)->limit($page->firstRow,$page->listRows)->order("updatetime desc")->select();
		
		$n=count($info_find);
		for($i=0;$i<$n;$i++){
			$info[$i]['num']=($i+1)+($p-1)*10;
			$info[$i]['updatetime']=date('Y-m-d H:i:s',$info_find[$i]['updatetime']);
			$info[$i]['title']=$info_find[$i]['title'];
			$info[$i]['id']=$info_find[$i]['id'];
			$info[$i]['username']=$info_find[$i]['username'];
		}
		$logo='/home_uploads/meng.jpg';
		
		$this->assign("info",$info);
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板
    	$this->assign('username',$notebook_user['username']);
    	$this->assign('uid',$notebook_user['uid']);
    	$this->assign('logo',$logo);
    	$this->assign('type','homepage');
		
        $this->display();
    }
	public function view(){
        $id=$_GET['id'];
        $mod = M('notepad');
        $where=array();
        $where['id']=$id;
        $info=$mod->where($where)->find();
        $info['title']=($info['title']);
        $info['data']=($info['data']);
        $logo='/home_uploads/meng.jpg';

        $this->assign('logo',$logo);
        $this->assign('id',$id);
        $this->assign('title',$info['title']);
        $this->assign('content',$info['data']);
        $this->assign('type','homepage');
        $this->display();
    }
    public function signout(){	//退出
    	setcookie('notebook_user','',time()-1,'/');
    	$this->redirect('login/index');
    }

}