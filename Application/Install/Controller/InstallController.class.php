<?php

namespace Install\Controller;

use Think\Controller;

class InstallController extends Controller {

    public function step1() {
//        $data['status']  = 1;
//        $data['content'] = 'success';
//        $this->ajaxReturn($data);
        $this->display();
    }

    public function step2() {
        $this->display();
    }

    public function step3() {
        $this->display();
    }

    public function step4() {
        $this->display();
    }

}
