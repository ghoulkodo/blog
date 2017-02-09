<?php
namespace Model;
use Framework\Model;
use Framework\Parsedown;

class TopicModel extends Model
{
	//分页查询文章内容
	public function getTopic($page , $offset){
		$start = ($page-1)*$offset;
		$result = $this->limit("$start,$offset")->select();
		return $result;
	}

	//查看文章详情
	public function viewTopic($id){
		$result = $this->where("aid = $id")->select();
		return $result;
	}

	//站点文章统计
	public function getCount(){
		$result = $this->count();
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

	//获取回复内容
	public function getRec(){

	}

	//添加回复
	public  function addRec(){

	}

	//删除回复
	public function delRec(){

	}

	
}