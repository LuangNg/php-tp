<?php
namespace Install\Controller;
use Think\Controller;
use Think\Storage;

class IndexController extends Controller {
    public function index(){
        $this ->startInstall();
//        $this ->completeInstall();
//        $this->display();
    }
    
    public function startInstall(){
        if(Storage::has(__ROOT__.'/install.lock')){
            $msg = 'You have already installed this program!';
            $this ->error($msg);
        }
        $this->display();
    }
    
    public function completeInstall(){
        //put lock file
        Storage::put(__ROOT__.'/install.lock', 'lock');
        $this->redirect();
    }
}