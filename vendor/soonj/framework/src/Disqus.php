<?php
namespace Framework;
#
#	无限级评论样式处理
#
class Disqus
{
	//处理为html样式
	public function html($data , $depth = 0){

		$depth_html = $html = '';
		for ($i=0; $i < $depth ; $i++) { 
			$depth_html .= ''; 
		}
		foreach ($data as $value) {
			
			$html .= '<li class="comment odd alt thread-odd thread-alt depth-1 parent">
                			<article class="comment-body">
                    			<footer class="comment-meta">
                        			<div class="comment-author vcard">
                            		<img  src="http://2.gravatar.com/avatar/52a40f05d2af381d596942033846e068?s=100&d=mm&r=g 2x" srcset="http://2.gravatar.com/avatar/52a40f05d2af381d596942033846e068?s=100&d=mm&r=g 2x" class="avatar avatar-50 photo" height="50" width="50"/>                     
                            			<b class="fn">';
			$html .= "{$value['username']}</b>";
			$html .= '<span class="says">
                                说道：
                            </span>                 
                        </div>
                        <div class="comment-metadata">';
			$html .= date('Y-m-d' , $value['ctime']) . '</a>';
			$html .= '</div>
                    </footer>
                    <div class="comment-content">';
            $html .= '<p>'.$value['comment'].'</p></div>
            			<a><span  onclick="myFunc('.$value['oid'].')">回复/取消</span></a>
            			</article>';
            
           	$html .= '
           				<div  class="comment-respond" id="'.$value['oid'].'" style="display:none">
						<h3 id="reply-title" class="comment-reply-title">对《'.$value['username'].'》发表评论 
							<small>
								<a rel="nofollow" id="cancel-comment-reply-link" href="/articles/17680.html#respond" style="display:none;">取消回复</a>
							</small>
						</h3>			
						<form action="index.php?m=comm&a=new" method="post" id="commentform" class="comment-form" novalidate>
							<p class="comment-notes">
								<span id="email-notes">电子邮件地址不会被公开。</span> 必填项已用
								<span class="required">*</span>标注
							</p>
							<p class="comment-form-comment">
								<label for="comment">评论</label> 
								<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea>
							</p>
							<p class="comment-form-author">
								<label for="author">姓名 <span class="required">*</span></label> 
								<input id="author" name="author" type="text" value="" size="30" maxlength="245" aria-required="true" required="required" />
							</p>
							<p class="form-submit">
								<input name="submit" type="submit" id="submit" class="submit" value="发表评论" /> 
								<input type="hidden" name="comment_post_ID" value="'.$value['aid'].'" id="comment_post_ID" />
								<input type="hidden" name="comment_parent" id="comment_parent" value="'.$value['oid'].'" />
							</p>
							<p style="display: none;">
								<input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="64d1f32d7e" />
							</p>
							<p style="display: none;">
								<input type="hidden" id="ak_js" name="ak_js" value="137"/>
							</p>			
						</form>
						</div>';
			$html .= '';

			if (isset($value['parent'])) {
				$html .= '<ol class="children">';
				$html .= $this->html($value['parent'] , $depth+1);
				$html .= '</ol></li>';
			}
		}

		return $html;

	}


	//创建父级树
	public function find_parent($arr, $id = 'oid', $aid = 'aid') { 
	   	foreach($arr as $v) {
	    	$t[$v[$id]] = $v;
	  	}

	  	foreach ($t as $key => $item){
		    if( $parentid = $item['parentid']){
		
		      	$t[$key]['parent'][] = &$t[$parentid];

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