<?php
namespace Controller;
use Controller\TopicController;
use Controller\UserController;
use Model\CommModel;
use Framework\Model;
use Framework\Parsedown;
use Framework\Disqus;

#
#	评论操作类
#
class CommController extends Controller
{

	public function __construct(){

		parent::__construct();
		$this->comm = new CommModel();

	}
	//新建回复
	public function new(){
		$data['aid'] = $_POST['comment_post_ID'];
		$data['parentid'] = $_POST['comment_parent'];
		$data['comment'] = $_POST['comment'];
		$data['username'] = $_POST['author'];
		$data['ctime'] = time();


		$result = $this->comm->newComm($data);
		if ($result) {
			$this->success();
		} else {
			$this->error();
		}

	}

	//列出回复
	public function list($id){

		$result = $this->comm->getComm($id);

		if ($result) {
			$result = $this->Disqus->html($result);
			return $result;
		} else {
			return false;
		}
		
		

		
		
	}

	//审核回复

}
