<?php
namespace Model;
use Framework\Model;

#	留言模块

class CommModel
{


	//查看回复
	public function getComm($id , $parentid = 0 , &$result = array()){

		//查询父级评论
		$arr = $this->where("parentid = $parentid AND aid = $id")->order('ctime desc')->select();
		if (empty($arr)) {
			return array();
		}

		
		$result = $this->limit(5)->where("rid = $id")->select();

		return $result;
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
