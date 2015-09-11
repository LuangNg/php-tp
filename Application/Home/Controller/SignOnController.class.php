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
//        $this -> think_send_mail("luangng@163.com", "Luang", $subject = 'Send mail test', $body = 'hello, how are you!', $attachment = null);
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


    /**
     * 系统邮件发送函数
     * @param string $to    接收邮件者邮箱
     * @param string $name  接收邮件者名称
     * @param string $subject 邮件主题 
     * @param string $body    邮件内容
     * @param string $attachment 附件列表
     * @return boolean 
     */
     function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null){
        $config = C('THINK_EMAIL');
        vendor('PHPMailer.class#phpmailer'); //从PHPMailer目录导class.phpmailer.php类文件
        $mail             = new PHPMailer(); //PHPMailer对象
        $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
        $mail->IsSMTP();  // 设定使用SMTP服务
        $mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
        $mail->SMTPSecure = 'ssl';                 // 使用安全协议
        $mail->Host       = $config['SMTP_HOST'];  // SMTP 服务器
        $mail->Port       = $config['SMTP_PORT'];  // SMTP服务器的端口号
        $mail->Username   = $config['SMTP_USER'];  // SMTP服务器用户名
        $mail->Password   = $config['SMTP_PASS'];  // SMTP服务器密码
        $mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
        $replyEmail       = $config['REPLY_EMAIL']?$config['REPLY_EMAIL']:$config['FROM_EMAIL'];
        $replyName        = $config['REPLY_NAME']?$config['REPLY_NAME']:$config['FROM_NAME'];
        $mail->AddReplyTo($replyEmail, $replyName);
        $mail->Subject    = $subject;
        $mail->MsgHTML($body);
        $mail->AddAddress($to, $name);
        if(is_array($attachment)){ // 添加附件
            foreach ($attachment as $file){
                is_file($file) && $mail->AddAttachment($file);
            }
        }
        return $mail->Send() ? true : $mail->ErrorInfo;
     }
}
