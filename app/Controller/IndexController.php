<?php
namespace Controller;
use Controller\Controller;
use Controller\TopicController;
use Framework\Paginate;
class IndexController extends Controller
{
	
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		
		$articles = new TopicController();
		$data= $articles->articles();

	}
}