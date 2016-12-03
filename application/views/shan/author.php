<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<?php include_once 'header.inc.php'; ?>

    <nav class="main-navigation"></nav>
    <section class="content-wrap">
        <div class="container">
            <div class="row">
                <main class="col-md-8 main-content">
                    <div class="cover author-cover">
                        <div class="avatar-wrap">
                            <img src="http://image.golaravel.com/3/69/2bb4ddae2b7330de0c4991761548a.jpg" alt="雨师" class="avatar">
                        </div>
                        <h3 class="author-name">作者：雨师</h3>
                        <div class="meta-info">
                            <span class="post-count"><i class="fa fa-pencil-square-o"></i>6 篇文章</span>
                            <span class="loaction"><i class="fa fa-map-marker"></i>广州</span>
                        </div>
                        <div class="bio">由于学艺不精，内容可能有误。如有错误欢迎联系邮箱312841925@qq.com指出。</div>
                    </div>
                    <article id=70 class="post">
                        <div class="post-head">
                            <h1 class="post-title"><a href="<?php echo site_url('articles'); ?>">文章标题</a></h1>
                            <div class="post-meta">
                                <span class="author">作者：<a href="<?php echo site_url('articles'); ?>">王赛</a></span> &bull;
                                <time class="post-date" datetime="2016年8月24日星期三凌晨2点04分" title="2016年8月24日星期三凌晨2点04分">2016年8月24日</time>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>Laravel 项目组自豪地宣布 Laravel 5.3 正式发布了 ！5.3 版本中的新增特性主要集中在提升开发速度，通过增强常见任务的开箱即用功能提升开发效率。 此版本是常规发布版本，提供六个月的 bug 修复补丁和一年的安全补丁。当前，Laravel 5.1 是最新的 LTS（长期支持） 版本，提供两年的 bug</p>
                        </div>
                        <div class="post-permalink">
                            <a href="<?php echo site_url('articles'); ?>" class="btn btn-default">阅读全文</a>
                        </div>
                        <footer class="post-footer clearfix">
                            <div class="pull-left tag-list">
                                <i class="fa fa-folder-open-o"></i>
                                <a href="<?php echo site_url('articles'); ?>">Laravel 5</a>, 
                                <a href="<?php echo site_url('articles'); ?>">Laravel入门教程</a>, 
                                <a href="<?php echo site_url('articles'); ?>">Laravel 5.2</a>
                            </div>
                        </footer>
                    </article>
                    <article id=69 class="post">
                        <div class="post-head">
                            <h1 class="post-title"><a href="<?php echo site_url('articles'); ?>">Laracon 开发者大会快报：听 Taylor Otwell  讲解 Laravel 5.3 的新特性</a></h1>
                            <div class="post-meta">
                                <span class="author">作者：<a href="<?php echo site_url('articles'); ?>">王赛</a></span> &bull;
                                <time class="post-date" datetime="2016年7月28日星期四晚上7点29分" title="2016年7月28日星期四晚上7点29分">2016年7月28日</time>
                            </div>
                        </div>
                        <div class="featured-media">
                            <a href="<?php echo site_url('articles'); ?>"><img src="http://image.golaravel.com/5/1a/d0b8c085dec30605e2c3e9e773d00.png" alt="Laracon 开发者大会快报：听 Taylor Otwell  讲解 Laravel 5.3 的新特性"></a>
                        </div>
                        <div class="post-content">
                            <p>今天， Taylor Otwell 在 Laracon US 开发者大会上就 Laravel 5.3 的新特性作了长时间的演讲，演讲内容主要概括为四个方面：Laravel Scout、Laravel Passport、Laravel Mailable  和 Laravel Notifications。 此次演讲预定是</p>
                        </div>
                        <div class="post-permalink">
                            <a href="<?php echo site_url('articles'); ?>" class="btn btn-default">阅读全文</a>
                        </div>
                        <footer class="post-footer clearfix">
                            <div class="pull-left tag-list">
                                <i class="fa fa-folder-open-o"></i>
                                <a href="<?php echo site_url('articles'); ?>">Laravel 5</a>, 
                                <a href="<?php echo site_url('articles'); ?>">Laravel入门教程</a>, 
                                <a href="<?php echo site_url('articles'); ?>">Laravel 5.2</a>
                            </div>
                        </footer>
                    </article>
                    <nav class="pagination" role="navigation">
                        <span class="page-number">第 1 页 &frasl; 共 5 页</span>
                        <a class="older-posts" href="/page/2/">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </nav>
                </main>
                <?php include_once 'sidebar.inc.php'; ?>
            </div>
        </div>
    </section>
    <?php include_once 'footer.inc.php'; ?>
</body>
</html>