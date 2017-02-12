<?php
namespace Model;
use Framework\Model;
use Framework\Parsedown;

#	文章模块类

class TopicModel extends Model
{
	//分页查询文章索引
	public function getTopic($page = 1 , $offset = 10){
		$start = ($page-1)*$offset;
		$result = $this->limit("$start,$offset")->where('display = 1')->select();

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
	public function edtTopic($id , $isdel = 1 , $data = null){
		//删除
		if ($isdel == 1) {
			$data['display'] = 0;
			$result = $this->where("aid = $id")->update($data);
			return $result;
		}
		//修改
		$result = $this->where("aid = $id")->update($data);

		return $result;

	}

	//添加文章
	public function newTopic($data){
		$result = $this->add($data);

		return $result;
	}

	
}