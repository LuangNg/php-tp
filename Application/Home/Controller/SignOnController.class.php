<?php

namespace Home\Controller;

use Think\Controller;

/**
 * Sign on controller
 * @author Luang.Ng<luangng@163.com>
 * @copyright (c) 2015, Luang.Ng
 * @license 
 */
class SignOnController extends Controller {

    public function index() {
        $this->display('signon');
    }

    /**
     * verify user's input info
     * @param type $username
     * @param type $password
     * @return type
     */
    private function _verifyRegInfo($account, $password) {
        $modelUsers = M('users');
        $password = hash('sha256', $password);
        $where = "username = '{$username}' AND password = '{$password}' AND status=1";
        $userInfo = $modelUsers->where($where)->find();
        print_r($userInfo);
        return empty($userInfo) ? null : $userInfo;
    }

    /**
     * 
     */
    public function doReg() {
        //获取页面输入信息
        $acct_name = trim(I('post.account'));
        $password = trim(I('post.password'));
        $confpassword = trim(I('post.confpassword'));
        $email = trim(I('post.email'));
        $agreement = trim(I('post.agreement', 0));

        //是否同意服务协议
        if (!$agreement) {
            $this->error('You must agree with the protocol!');
            exit;
        }

        //验证输入的值是否为空
        if (empty($acct_name) || empty($password) || empty($confpassword) || empty($email)) {
            $this->error('必填信息不得为空!');
            exit;
        }

        //用户名验证，不得包含特殊字符以及以数字开头，只能包含字母数字和下划线
        //密码验证，不能包含空格
        if (strcmp($password, $confpassword) != 0) {
            $this->error('两次输入的密码不一致！');
            exit();
        }

        //验证邮箱地址是否正确
        //验证用户名是否已经被注册
        $account = M('account');
        $getAccount = $account->field('acct_name')
                ->where("acct_name = '{$acct_name}'")
                ->find();
        if (!empty($getAccount)) {
            $this->error('用户名已被注册,换一个试试...');
            exit;
        } else {
            $curTime = time();
            $acctData['acct_no'] = hash(sha1, $curTime);
            $acctData['acct_name'] = $acct_name;
            $acctData['password'] = hash('sha256', $password);
            $acctData['email'] = $email;
            $acctData['create_time'] = $curTime;

            if ($account->create($acctData)) {
                if ($account->add()) {
                    $jumpURL = U('LogIn/login');
                    $this->success('恭喜,注册成功!', $jumpURL);
                } else {
                    $this->error('注册失败,请重试!');
                    exit();
                }
            }
        }
    }

}
