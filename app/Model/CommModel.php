<?php
namespace Model;
use Framework\Model;
use Framework\Disqus;

#	留言模块

class CommModel extends Model
{

	public function __construct(){
		parent::__construct();
		$this->comm = new Disqus();
	}

	//查看指定id的所有回复
	public function getComm($id){

		$arr = $this->where("aid = $id")->order('ctime desc')->limit('5')->select();
		if ($arr) {
			$data = $this->comm->find_parent($arr);
			return $data;
		}

		return false;
		
		
	}

	//查看引用回复
	public function reComm($parentid){

	}

	//创建新回复
	public function newComm($data){
		$result = $this->add($data);
		return $result;
	}

	//删除回复（审核回复）
	public function chkComm($id){
		$result = $this->set("display = 0")->update($id);

		return $result;
	}

}
