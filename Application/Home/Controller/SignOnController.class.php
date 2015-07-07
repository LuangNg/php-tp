<?php
namespace Home\Controller;
use Think\Controller;
class SignOnController extends Controller {
    public function index()
	{
		$this->display('signon');
	}

	public function _validateUserInfo($username, $password)
	{
		$modelUsers = M('users');
		$password = sha1($password);
		$where = "username = '{$username}' AND password = '{$password}' AND status=1";
		$userInfo = $modelUsers->where($where)->find();
		print_r($userInfo);
		return empty($userInfo)?null:$userInfo;
	}

	/**
	 *注册动作处理
	 *return void
	 */
	public function doReg()
	{
		//获取页面输入信息
		$username = trim(I('post.account'));
		$password = trim(I('post.password'));
		$confpassword = trim(I('post.confpassword'));
		$email = trim(I('post.email'));
		$agreement = trim(I('post.agreement',0));

		//是否同意服务协议
		if(!$agreement)
		{
			$this->error('请先确认注册协议!');
			exit;
		}

		//验证输入的值是否为空
		if(empty($username) || empty($password) || empty($confpassword) || empty($email))
		{
			$this->error('必填信息不得为空!');
			exit;
		}

		//用户名验证，不得包含特殊字符以及以数字开头，只能包含字母数字和下划线

		//密码验证，不能包含空格
		if(strcmp($password, $confpassword) != 0){
			$this->error('两次输入的密码不一致！');
			exit();
		}

		//验证邮箱地址是否正确

		//验证用户名是否已经被注册
		$entityUser = M('users');
		$getUsername = $entityUser -> field('account,status')
								   -> where("account = '{$account}'")
								   -> find();
		if(!empty($getUsername)){
			$this->error('用户名已被注册,换一个试试...');
			exit;
		}

		//验证邮箱地址是否已经被注册
		$getUserEmail = $entityUser -> field('uid, email')
								    -> where("email = '{$email}'")
								    -> find();
		if(!empty($getUserEmail) && $getUserEmail['email_state'] != 0)
		{
			$this->error('邮箱地址已经被注册!');
			exit;
		}else{
			$curTime = time();
			$userData['username'] = $username;
			$userData['password'] = hash('sha1', $password);
			$userData['email'] 	  = $email;
			$userData['create_time'] = $curTime;

			if($entityUser->create($userData))
			{
				if($entityUser->add())
				{
					$jumpURL = U('LogIn/login');
					$this->success('恭喜,注册成功!', $jumpURL);
				}else{
					$this->error('注册失败,请重试!');
					exit();
				}
			}
		}
	}
}