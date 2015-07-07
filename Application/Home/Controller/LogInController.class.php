<?php
namespace Home\Controller;
use Think\Controller;
class LogInController extends Controller {
    public function index()
	{
		$this->display('login');
	}


	/**
	 *生成验证码
	 *@return [source]
	 *
	 */
	public function verify()
	{
		$config = array(
			'imageW'	=>		150,
			'imageH'	=>		48,
			'length'	=>		4,
			'fontSize'	=>		22,
			'useImgBg' 	=> 		true
		);
		$verify = new \Think\Verify($config);
		$verify->entry();
	}

	/**
	 *登录动作处理
	 *return void
	 */
	public function doLogin()
	{
		$username = trim(I('post.username'));
		$password = trim(I('post.password'));
		$captcha = trim(I('post.captcha'));

		//非空验证
		if(empty($username) && empty($password) && empty($captcha))
		{
			$this->error('请输入用户名和密码');
			exit();
		}
		//判断验证码是否正确
		
		//验证是否为合法用户
		if($this -> _validateUserInfo($username, $password))
		{
			$this -> redirect('Index/index');
		}else{
			$this -> error('登录失败');
			exit();
		}

		//将用户信息保存在session中

	}


	//登出系统
	public function logout()
	{	
		session('user', NULL);
		$this -> redirect('Index/index');
	}

	public function _validateUserInfo($username, $password)
	{
		$modelUsers = M('users');
		$password = sha1($password);
		$where = "username = '{$username}' AND password = '{$password}' AND status=1";
		$userInfo = $modelUsers->where($where)->find();
		return empty($userInfo)?null:$userInfo;
	}
}