<?php
namespace Controller;

use Controller\Controller;
use Controller\TopicController;
use Controller\UserController;
use Model\TopicModel;

#
#	后台控制器
#
class SettingsController extends Controller
{

	public function __construct(){
		parent::__construct();
		$this->topic = new TopicModel();
	}


	//后台入口
	public function me(){

		$data = $this->topic->getTopic();
		$this->assign('title' , 'Sung Chiang');
		$this->assign('topic' , $data);
		$this->display('admin/index.html');
	}

}