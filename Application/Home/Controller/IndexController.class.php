<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(!file_exists(__ROOT__.'/install.lock')){
            header('Location:'.__ROOT__.'/install.php');
        }
        $this->display();
    }
}