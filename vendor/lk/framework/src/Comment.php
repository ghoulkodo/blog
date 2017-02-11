<?php
namespace Framework;
#
#	无限级评论样式处理
#
class Comment
{
	//处理为html样式
	public function html($data , $depth = 0){

		$depth_html = $html = '';
		for ($i=0; $i < $depth ; $i++) { 
			$depth_html .= '<ol class="comment-list">'; 
		}
		foreach ($data as $value) {
			$html .= '<ol class="comment-list">
            			<li class="comment odd alt thread-odd thread-alt depth-1 parent">
                			<article class="comment-body">
                    			<footer class="comment-meta">
                        			<div class="comment-author vcard">
                            		<img  src="" class="avatar avatar-50 photo" height="50" width="50"/>                     
                            			<b class="fn">';
			$html .= "{$value['username']}</b>";
			$html .= '<span class="says">
                                说道：
                            </span>                 
                        </div>
                        <div class="comment-metadata">
                            <a href="#">';
			$html .= "{$value['ctime']}</a>";
			$html .= '</div>
                    </footer>
                    <div class="comment-content">';
            $html .= "<p>{$value['comment']}</p></div>";
            $html .= '<div class="reply">
                        <a class="comment-reply-link" href="#"">
                            回复
                        </a>
                    	</div>          
           		 		</article>
       				 	</li>
     					</ol>';




			if ($value['parentid']) {
				$html .= $this->html($value['parentid'] , $depth+1);
			}
		}

		return $html;

	}


	//创建父级树
	public function find_parent($arr, $id = 'oid', $aid = 'aid') { 
		var_dump($arr);
	  foreach($arr as $v) {
	    $t[$v[$id]] = $v;
	  }

	  foreach ($t as $k => $item){
	    if( $item[$aid] ){
	      if( ! isset($t[$item[$aid]]['parent'][$item[$aid]]) )
	         $t[$item[$id]]['parent'][$item[$aid]] =& $t[$item[$aid]];
	    }
	  } 
	  return $t;
	}
	 
	//创建孩子树
	public function find_child($arr, $id='id', $pid='pid') {
	  foreach($ar as $v) {
	    $t[$v[$id]] = $v;
	  }
	  foreach ($t as $k => $item){
	    if( $item[$pid] ) {
	      $t[$item[$pid]]['child'][$item[$id]] =& $t[$k];
	    }
	  }
	  return $t;
	}

	//
	public function sortOut($cate,$parentid=0,$level=0){

        $tree = array();
        foreach($cate as $val){
            if($val['parentid'] == $parentid){
                $val['level'] = $level + 1;
                $val['html'] = str_repeat($this->html, $level);
                $tree[] = $val;
                $tree = array_merge($tree, self::sortOut($cate,$val['parentid'],$level+1));
            }
        }
        return $tree;
    }


}