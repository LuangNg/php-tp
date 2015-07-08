<?php
namespace Install\Controller;
use Think\Controller;
use Think\Storage;

class IndexController extends Controller {
    public function index(){
        $this ->startInstall();
        $this ->completeInstall();
    }
    
    public function startInstall(){
        if(Storage::has(__APP__.'/install.lock')){
            $msg = 'You have already installed this program!';
            $this ->error($msg);
        }
        $this->display();
    }
    
    public function completeInstall(){
        //put lock file
        Storage::put(__APP__.'/install.lock', 'lock');
        $this->redirect();
    }
}