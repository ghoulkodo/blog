<?php
namespace Controller
use Controller\Controller;
use Controller\TopicController;
use Framework\Paginate;

#
#搜索控制器
#
class SController extends Controller
{
	public function __construct(){
		parent::__construct();
		$this->topic = new TopicController();
	}

	public function s(){
		$key = $_POST['key'];
	}

	if (!empty($_REQUEST['q'])) {
	$key = $_REQUEST['q'];
	//分页判断
	if (!empty($_GET['nowPage'])) {
		$nowPage = $_GET['nowPage'];
		$offset = ($nowPage-1)*10;
	} else {
		$nowPage = 0;
		$offset = 0;
	}
	//搜索关键字
	$sql = "SELECT * FROM tt_post INNER JOIN tt_user  WHERE CONCAT(IFNULL(`title`,''),IFNULL(`content`,'')) LIKE '%$key%' AND authorid = uid ORDER BY ctime DESC LIMIT $offset,10";
	$result = mysqli_query($link , $sql);

	//输出到数组
	while($row = mysqli_fetch_assoc($result))
	{
		$data[]=$row;
	}

//模版变量准备
	$title = '搜索：'.$key;
	$baseUrl = WEB_SITE.'/S.php';
	$search = [];
	$search['q'] = $key;
	$count = mysqli_num_rows($result);
	$totalPage = ceil($count/10);

//显示页面
	display('S.html' , compact('data' , 'title' , 'nowPage' , 'totalPage' , 'baseUrl' , 'search' , 'count'));
} else {
//显示页面
	$title = '搜索';
	$count = -1;
	display('S.html' , compact('title' , 'count'));
}





}