<?php
namespace Framework;
#
#	无限级评论样式处理
#
class Comment
{
	public function __constract(){

	}

	private function html(){
		$string =  "<div id="comments" class="comments-area">

	<h2 class="comments-title">
		{$title}的相关评论		
	</h2>
		<ol class="comment-list">
			<li class="comment odd alt thread-odd thread-alt depth-1 parent">
				<article class="comment-body">
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<img alt='' src='#' srcset='#' class='avatar avatar-50 photo' height='50' width='50' />						
							<b class="fn">
								{username}
							</b>
							<span class="says">
								说道：
							</span>					
						</div><!-- .comment-author -->

						<div class="comment-metadata">
							<a href="#">
								<time datetime="2017-02-02T16:32:35+00:00">
									{date}							
								</time>
							</a>				
						</div><!-- .comment-metadata -->
					</footer><!-- .comment-meta -->
					<div class="comment-content">
						<p>{$comm}</p>
					</div><!-- .comment-content -->

					<div class="reply">
						<a rel='nofollow' class='comment-reply-link' href='#'>
							回复
						</a>
					</div>			
				</article><!-- .comment-body -->
			</li>"";

		return $string 
	}


	//创建父级树
	protected function find_parent($ar, $id='id', $pid='pid') { 
	  foreach($ar as $v) {
	    $t[$v[$id]] = $v;
	  }

	  foreach ($t as $k => $item){
	    if( $item[$pid] ){
	      if( ! isset($t[$item[$pid]]['parent'][$item[$pid]]) )
	         $t[$item[$id]]['parent'][$item[$pid]] =& $t[$item[$pid]];
	    }
	  } 
	  return $t;
	}
	 
	//创建孩子树
	protected function find_child($ar, $id='id', $pid='pid') {
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


}