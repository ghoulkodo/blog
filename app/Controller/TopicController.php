<?php
namespace Controller;
use Controller\Controller;
use Model\TopicModel;
use Framework\Paginate;

class TopicController extends Controller
{
	public $topic;


	public function __construct(){
		parent::__construct();
		$this->topic = new TopicModel();

		//加载分页类
		$this->Paginate = new Paginate;
		
	}


	//查询指定页码的文章
	public function articles($page = null){

		$offset = 6;

		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}

		//查询数据
		$count = $this->topic->getCount();
		$data = $this->topic->getTopic($page , $offset);

		//输出分页标签
		$nowPage = $page;
		$totalPage =  ceil($count/$offset);
		$paginate = $this->Paginate->getSelfPageView($nowPage, $totalPage);

		//截取部分汉字 并 做时间戳处理
		foreach ($data as $key => $value) {
			if (strlen($value['article']) > 200) {
				$data[$key]['article'] = mb_substr($value['article'], 0 , 116);
			}
			$data[$key]['ctime'] = date('Y-m-d' , $data[$key]['ctime']);
		}

		//显示页面
		$this->assign('title' , 'Sung Chiang');
		$this->assign('topic' , $data);
		$this->assign('paginate' , $paginate);
		$this->display('index.html');

		return $data;
	}

	//查看指定id的文章详情
	public function view($id = null){

		if (is_null($_GET['id'])) {

			return $this->error();

		} else {

			$id = $_GET['id'];

			//获取数据
			$data = $this->topic->viewTopic($id);

			//时间戳处理
			$data[0]['ctime'] = date('Y-m-d' , $data[0]['ctime']);

			//显示页面
			$this->assign('title' , $data[0]['topic']);
			$this->assign('topic' , $data[0]);
			$this->display('main.html');
		}

	}

	//新建文章
	public function new(){
		
		
	}
}