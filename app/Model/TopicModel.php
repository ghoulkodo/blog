<?php
namespace Model;
use Framework\Model;

class TopicModel extends Model
{
	//分页查询文章内容
	public function getTopic($page){
		$start = ($page-1)*6;
		$result = $this->limit("$start,6")->select();
		return $result;
	}

	//删除文章
	public function delTopic($id){
		$result = $this->set('display = 0')->where("aid = $id")->update();
		return $result;
	}

	//添加文章
	public function addTopic($data){
		
	}


	//更改文章
	public function udtTopic($data){
		
	}
}