<?php

namespace Home\Controller;

use Think\Controller;
use Think\Storage;

class IndexController extends Controller {

    public function index() {
        //if this application hasn't been installed, redirect ro installing page
        if (!Storage::has($_SERVER['DOCUMENT_ROOT'] . __ROOT__ . '/install.lock')) {
            header('Location:' . __ROOT__ . '/install.php');
        }
        $this->display();
    }

    public function detail() {
        $this->display();
    }

}
