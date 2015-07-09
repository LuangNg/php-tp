<?php

namespace Install\Controller;

use Think\Controller;
use Think\Storage;

class IndexController extends Controller {

    public function index() {
        $this->startInstall();
    }

    /**
     * start install action
     */
    public function startInstall() {
        //check if this application has been installed
        if (Storage::has($_SERVER['DOCUMENT_ROOT'] . __ROOT__ . '/install.lock')) {
            $msg = 'You have already installed this program!';
            $this->error($msg, __ROOT__ . '/index.php');
        }
        $this->display();
    }

    public function completeInstall() {
        //delete install module
        //put lock file
        Storage::put($_SERVER['DOCUMENT_ROOT'] . __ROOT__ . '/install.lock', 'lock');
        header('Location:' . __ROOT__ . '/index.php');
    }

}
