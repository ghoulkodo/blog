<?php
namespace Model;
use Framework\Model;
use Framework\Parsedown;

#	文章模块类

class TopicModel extends Model
{
	//分页查询文章索引
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

	//编辑管理文章/
	public function edtTopic($id , $isdel = 1 , $data){
		//删除
		if ($isdel == 1) {
			$result = $this->set('display = 0')->where("aid = $id")->update();
			return $result;
		}
		//修改
		$result = $this->set($data)->where("aid = $id")->update();

		return $result;

	}

	//添加文章
	public function newTopic($data){
		$result = $this->add($data);

		return $result;
	}

	
}