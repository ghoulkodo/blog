<?php
namespace Controller;
use Controller\Controller;
use Controller\TopicController;
class IndexController extends Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if (empty($_GET['page'])) {
			$page = 1;
		} else {
			$page = $_GET['page'];
		}

		$articles = new TopicController();
		$data= $articles->articles($page);
		$this->assign('title' , 'Sung Chiang');
		$this->assign('topic' , $data);
		$this->display('index.html');
	}
}