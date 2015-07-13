<?php

namespace Install\Controller;

use Think\Controller;
use Think\Storage;

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
        //put installation lock file
        Storage::put($_SERVER['DOCUMENT_ROOT'] . __ROOT__ . '/install.lock', 'lock');
        //show the congratulations page
        $this->display();
    }

    //collect  required installing info
    public function collectInfo() {
        $info['host'] = I("dbHostIP");
        $info['dbUsername'] = I("dbUsername");
        $info['dbPassword'] = I("dbPassword");
        $info['dbName'] = I("dbName");
        if (empty($info['host']) || empty($info['dbUsername']) || empty($info['dbPassword']) || empty($info['dbName'])) {
            $this->error('required area is not alowed be empty!', U('Install/step2'));
        }
        $this ->redirect(U('Install/step3'));
    }

}
