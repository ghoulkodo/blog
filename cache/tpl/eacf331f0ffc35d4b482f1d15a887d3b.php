<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>博客-首页</title>
    <link rel="stylesheet" href="public/css/primer.css">
    <link rel="stylesheet" href="public/css/user-content.min.css">
    <link rel="stylesheet" href="public/css/octicons.css">
    <link rel="stylesheet" href="public/css/collection.css">
    <link rel="stylesheet" href="public/css/repo-card.css">
    <link rel="stylesheet" href="public/css/repo-list.css">
    <link rel="stylesheet" href="public/css/mini-repo-list.css">
    <link rel="stylesheet" href="public/css/boxed-group.css">
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/share.min.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/prism.css">
</head>
<body class="home">
    <header class="site-header">
        <div class="container">
            <h1><a href="javascript:;"></a></h1>
            <nav class="site-header-nav" role="navigation">
                
                <a href="javascript:;"></a>
                
                <a href="javascript:;"></a>
                
                <a href="javascript:;"></a>
                
                <a href="javascript:;"></a>
                
                <a href="javascript:;"></a>
                
                <a href="javascript:;"></a>
                
            </nav>
        </div>
    </header>
    <!-- / header -->
    <section class="banner">
    <div class="collection-head">
        <div class="container">
            <div class="collection-title">
                <h1 class="collection-header">Code Artisan</h1>
                <div class="collection-info">
                    <span class="meta-info">
                        <span class="octicon octicon-location"></span>
                        China Beijing
                    </span>
                    <span class="tooltipped tooltipped-s tooltipped-multiline meta-info" aria-label="PHP, JavaScript, HTML+CSS, C/C++">
                        <span class="octicon octicon-code"></span>
                        Web development
                    </span>
                    <span class="meta-info">
                        <span class="octicon octicon-organization"></span>
                        <a href="javascript:;"></a>
                    </span>
                    <span class="meta-info last-updated">
                        <span class="octicon octicon-mark-github"></span>
                        <a href="javascript:;"></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.banner -->
<section class="container content">
    <div class="columns">
        <div class="column two-thirds">
            <ol class="repo-list">

                <?php foreach($topic as $topic_item) :?>
                <li class="repo-list-item">
                    <h3 class="repo-list-name">
                        <a href=""></a>
                    </h3>
                    <p class="repo-list-description">
                        <?=$topic_item['topic'];?>
                    </p>
                    <p class="repo-list-meta">
                        <span class="octicon octicon-calendar"><?=$topic_item['article'];?></span> 2016/04/16
                    </p>
                </li>
                <?php endforeach;?>
                
            </ol>
        </div>
        <div class="column one-third">
            <h3>Popular Repositories</h3>
            <div class="boxed-group flush" role="navigation">
                <h3>Repositories contribute to</h3>
                <ul class="boxed-group-inner mini-repo-list">
                    
                    <li class="public source ">
                        <a href="javascript:;" target="_blank" title="overtrue/wechat" class="mini-repo-list-item css-truncate">
                            <span class="repo-icon octicon octicon-repo"></span>
                            <span class="repo-and-owner css-truncate-target">
                                overtrue/wechat
                            </span>
                        </a>
                    </li>
                    
                    <li class="public source ">
                        <a href="javascript:;" target="_blank" title="EasyWeChat/site" class="mini-repo-list-item css-truncate">
                            <span class="repo-icon octicon octicon-repo"></span>
                            <span class="repo-and-owner css-truncate-target">
                                EasyWeChat/site
                            </span>
                        </a>
                    </li>
                    
                    <li class="public source ">
                        <a href="javascript:;" target="_blank" title="laravel/framework" class="mini-repo-list-item css-truncate">
                            <span class="repo-icon octicon octicon-repo"></span>
                            <span class="repo-and-owner css-truncate-target">
                                laravel/framework
                            </span>
                        </a>
                    </li>
                    
                    <li class="public source ">
                        <a href="javascript:;" target="_blank" title="caouecs/Laravel-lang" class="mini-repo-list-item css-truncate">
                            <span class="repo-icon octicon octicon-repo"></span>
                            <span class="repo-and-owner css-truncate-target">
                                caouecs/Laravel-lang
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </div>

        </div>
    </div>
    <div class="pagination text-align">
      <div class="btn-group">
        
            <button disabled="disabled" href="javascript:;" class="btn btn-outline">«</button>
        
        
            <a href="javascript:;" class="active btn btn-outline">1</a>
        
        
          
              <a href="javascript:;" class="btn btn-outline">2</a>
          
        
          
              <a href="javascript:;" class="btn btn-outline">3</a>
          
        
        
            <a href="javascript:;" class="btn btn-outline">»</a>
        
        </div>
    </div>
    <!-- /pagination -->
</section>
<!-- /section.content -->
    <footer class="container">
        <div class="site-footer" role="contentinfo">
            <div class="copyright left mobile-block">
                    © 2015
                    <span title="overtrue.me">overtrue.me</span>
                    <a href="javascript:;"></a>
            </div>

            <ul class="site-footer-links right mobile-hidden">
                <li>
                    <a href="javascript:;"></a>
                </li>
            </ul>
            <a href="javascript:;" target="_blank" aria-label="view source code">
                <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
            </a>
            <ul class="site-footer-links mobile-hidden">
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
            </ul>

        </div>
    </footer>
    <!-- / footer -->




</body></html>