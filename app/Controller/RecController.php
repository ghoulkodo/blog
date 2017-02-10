<?php
namespace Controller;
use Controller\TopicController;
use Controller\UserController;
use Framework\Model;
use Framework\Parsedown;

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

	//列出回复
	public function list($id){

		$result = $this->Comm->getComm($id);

		$data = self::parseComm($data);

		return $data;
		
	}
	public static function parseComm($data){

		//

		foreach ($data as $key => $value) {
			if (!empty($value['rere'])) {
				
			}
		}
	}
	//审核回复

}
