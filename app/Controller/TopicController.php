<?php
namespace Controller;
use Controller\Controller;
use Model\TopicModel;
use Framework\Page;

class TopicController extends Controller
{
	public $topic;


	public function __construct(){
		parent::__construct();
		$this->topic = new TopicModel();
	}


	//查询指定页码的文章
	public function articles($page){
		$data = $this->topic->getTopic($page);

		//截取内容部分汉字
		foreach ($data as $key => $value) {
			if (strlen($value['article']) > 200) {
				$data[$key]['article'] = mb_substr($value['article'], 0 , 116);
			}
		}

		return $data;
	}
}