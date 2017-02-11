<?php
namespace Controller;
use Controller\Controller;
use Controller\CommController;
use Model\TopicModel;
use Framework\Paginate;
use Framework\Parsedown;
use Framework\Comment;

class TopicController extends Controller
{
	//缓存变量
	public $topic;


	public function __construct(){
		parent::__construct();

		$this->topic = new TopicModel();

		$this->rec = new CommController();

		$this->comm = new Comment();
	}


	//查询指定页码的文章
	public function articles($page = null){

		//偏移量（每页显示条数）
		$offset = 6;

		//默认页码数
		$page = empty($_GET['page']) ? 1 : $_GET['page'];

		//查询数据
		$count = $this->topic->getCount();
		$data = $this->topic->getTopic($page , $offset);

		//截取部分汉字 并 做时间戳处理
		foreach ($data as $key => $value) {
			//截取汉字处理
			if (strlen($value['article']) > 200) {
				$data[$key]['article'] = mb_substr($value['article'], 0 , 116);
			}
			//时间戳处理
			$data[$key]['ctime'] = date('Y-m-d' , $data[$key]['ctime']);
		}

		//显示页面
		$this->assign('title' , 'Sung Chiang');
		$this->assign('topic' , $data);
		$this->assign('paginate' , $this->Paginate->getSelfPageView($page, ceil($count/$offset)));
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
			$comm = $this->rec->list($id);

			//时间戳处理
			$data[0]['ctime'] = date('Y-m-d' , $data[0]['ctime']);

			//显示页面
			$this->assign('title' , $data[0]['topic']);
			$this->assign('topic' , $data[0]);
			$this->assign('comm' , $comm);
			$this->display('main.html');
		}

	}

	//新建文章
	public function new(){

		//接受传值
		$data['title'] = $this->Parsedown->text($_POST['title']);
		$data['topic'] = $this->Parsedown->text($_POST['topic']);
		$data['ctime'] = time();
		
		$result = $this->Topic->newTopic($data);

		//执行插入成功
		if ($result) {
			return $this->success();
		}

		//失败
		return $this->error();

	}

	//编辑文章
	public function edit(){

		//接受传值
		$data['topic'] = $this->Parsedown->text($_POST['topic']);
		//新旧字符对比

		//旧字符添加删除线

		//拼接

		//执行数据库更改
		$result = $this->Topic->edtTopic($data , $isdel = 0);
		//返回结果
	}

	//删除文章
	public  function del(){
		//接受id

		//执行数据库更改
		$result = $this->Topic->edtTopic($data , $isdel = 1);

		//返回结构
	}
}