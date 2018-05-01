<?php
namespace Home\Controller;
use Think\Controller;
class SetInfoController extends CommonController{
    public function index(){
    	$notebook_user=unserialize($_COOKIE['notebook_user']);
    	$uid=$notebook_user['uid'];
    	$mod=M('users');
    	$where=array();
    	$where['uid']=$uid;
    	$res=$mod->where($where)->find();
        $username=$res['username'];
        $sex=$res['sex'];
        $birthday=$res['birthday'];
    	$email=$res['email'];
        $logo=$res['logo'];

        $this->assign('logo',$logo);
        $this->assign('sex',$sex);
        $this->assign('birthday',$birthday);
        $this->assign('email',$email);
    	$this->assign('username',$username);
        $this->display();
    }

    public function save_info(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];

        $where=array();
        $where['uid']=$uid;
        $data=array();
        $data['username']=$_POST['username'];
        $data['sex']=$_POST['sex'];
        $data['birthday']=$_POST['birthday'];
        $data['email']=$_POST['email'];
        $mod=M('users');

        $where_name=array();    //修改姓名，不能重复
        $where_name['username']=$_POST['username'];
        $find_name=$mod->where($where_name)->find();
        if($find_name){
            if($find_name['uid'] != $uid){
                $this->error('姓名已存在，请重试','index',1);
                exit;
            }
        }
        
        if($mod->where($where)->save($data) !== false){
            $this->success('保存成功','index',1);
        }else{
            $this->error('保存失败，请稍后重试','index',1);
        }
    }

    public function logo(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod=M('users');
        $where=array();
        $where['uid']=$uid;
        $res=$mod->where($where)->find();
        $username=$res['username'];
        $logo=$res['logo'];

        $this->assign('logo',$logo);
        $this->assign('username',$username);
    	$this->display();
    }

    public function edit_logo(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod=M('users');
        $where=array();
        $where['uid']=$uid;
        $data=array();

        $old=$mod->where($where)->find();
        $old_pic=$old['logo'];

        //实例化上传类
        $upload = new \Think\Upload();
        //初始化上传信息
        $upload->maxSize=1048576;   //限制上传文件大小为1M
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');     // 设置附件上传类型
        $upload->rootPath="./Public";              //设置附件上传的根路径
        $upload->savePath ="/home_uploads/";                    //设置附件上传保存路径
        $upload->saveName="time";                               //采用时间戳命名
        
        //执行文件上传
        $info=$upload->upload();

        if(!$info){     //上传错误提示错误信息
            $this->error($upload->getError());
        }else{          //上传成功

            foreach($info as $file){
                $data['logo']=$file['savepath'].$file['savename'];//           
            }
            if($mod->where($where)->save($data)){   //保存成功后要删除原图片
                if($old_pic != '/home_uploads/meng.jpg'){
                    $old_pic="./Public".$old_pic;
                    unlink($old_pic);
                }

                $this->success("修改成功", 'logo',1);
            }else{
                $this->error('修改失败', 'logo',1);
            }
        }
    }


    public function password(){
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];
        $mod=M('users');
        $where=array();
        $where['uid']=$uid;
        $res=$mod->where($where)->find();
        $username=$res['username'];
        $logo=$res['logo'];

        $this->assign('logo',$logo);
        $this->assign('username',$username);
    	$this->display();
    }

    public function edit_password(){
        $password=$_POST['password'];
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];
        $notebook_user=unserialize($_COOKIE['notebook_user']);
        $uid=$notebook_user['uid'];

        $mod=M('users');
        $where=array();
        $where['uid']=$uid;
        $res=$mod->where($where)->find();
        $password_old=$res['password'];
        if($password_old != md5($password)){
            $this->error('原密码错误，请重试','password',1);
            exit;
        }
        $data=array();
        $data['password']=md5($password1);
        if($mod->where($where)->save($data) !== false){
            $this->success('修改成功','password',1);
        }else{
            $this->error('修改失败，请稍后重试','password',1);
        }
    }
}