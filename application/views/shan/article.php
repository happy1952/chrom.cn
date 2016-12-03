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
                
<article id="67" class="post tag-laravel-5 tag-getting-started-with-laravel tag-laravel-5-2">
    <header class="post-head">
        <h1 class="post-title">2016 版 Laravel 系列入门教程（一）</h1>
        <section class="post-meta">
            <span class="author">作者：<a href="/author/johnlui/">JohnLui</a></span> •
            <time class="post-date" datetime="2016年6月6日星期一下午3点31分" title="2016年6月6日星期一下午3点31分">2016年6月6日</time>
        </section>
    </header>

    <section class="featured-media">
        <img src="http://image.golaravel.com/d/51/11130f096dbec743756b69cbb22f9.jpg" alt="2016 版 Laravel 系列入门教程（一）">
    </section>

    <section class="post-content">
        <blockquote>
          <h6 id="httpsgithubcomjohnluilearnlaravel5">本教程示例代码见：<a href="https://github.com/johnlui/Learn-Laravel-5">https://github.com/johnlui/Learn-Laravel-5</a></h6>
          
          <p>在任何地方卡住，最快的办法就是去看示例代码。</p>
        </blockquote>

        <p>本文基于 Laravel 5.2 版本，无奈 5.2 的中文文档还没有跟上，大家勉强看一下 5.1 的吧：</p>

        <h5 id="laravel51">Laravel 5.1 中文文档：</h5>

        <ol>
        <li><a href="http://www.golaravel.com/laravel/docs/5.1/">http://www.golaravel.com/laravel/docs/5.1/</a>  </li>
        <li><a href="http://laravel-china.org/docs/5.1">http://laravel-china.org/docs/5.1</a></li>
        </ol>

        <h2 id="">默认条件</h2>

        <p>你应该懂得 PHP 网站运行的基础知识，并且有了一个完善的开发环境。跟随本教程走完一遍，你将会得到一个基础的包含登录、后台编辑、前台评论的简单 blog 系统。</p>

        <h3 id="tips">Tips</h3>

        <ol>
        <li>环境要求：PHP 5.5.9+，MySQL 5.1+  </li>
        <li>本教程不推荐完全不懂 PHP 与 MVC 编程的人学习，Laravel 的学习曲线不仅仅是陡峭，而且耗时很长，请先做好心理准备。  </li>
        <li>这不是 “一步一步跟我做” 教程。本教程需要你付出一定的心智去解决一些或大或小的隐藏任务，以达到真正理解 Laravel 运行逻辑的目的。  </li>
        <li>本宝宝使用 Safari 截图是为了好看，宝宝们在开发时请选择 Chrome 哦~</li>
        </ol>

        <h2 id="">开始学习</h2>

        <h3 id="1">1. 安装</h3>

        <p>许多人被拦在了学习 Laravel 的第一步：安装。并不是因为安装有多复杂，而是因为【众所周知的原因】。在此我推荐一个 composer 全量中国镜像：<a href="http://pkg.phpcomposer.com/">http://pkg.phpcomposer.com/</a> 。启用 Composer 镜像服务作为本教程的第一项小作业请自行完成哦。</p>

        <p>镜像配置完成后，在终端（Terminal 或 CMD）里切换到你想要放置该网站的目录下（如 C:\wwwroot、/Library/WebServer/Documents/、/var/www/html、/etc/nginx/html 等），运行命令：</p>

        <pre><code class="language-bash hljs">composer create-project laravel/laravel learnlaravel5  
        </code></pre>

        <p>然后，稍等片刻，当前目录下就会出现一个叫 learnlaravel5 的文件夹，安装完成啦~</p>

        <h3 id="2">2. 运行</h3>

        <p>为了尽可能地减缓学习曲线，推荐宝宝们使用 PHP 内置 web 服务器驱动我们的网站。运行以下命令：</p>

        <pre><code class="language-bash hljs"><span class="hljs-built_in">cd</span> learnlaravel5/public  
        php -S 0.0.0.0:1024  
        </code></pre>

        <p>这时候访问 <code>http://127.0.0.1:1024</code> 就是这个样子的：</p>

        <p><img src="http://7xlmi4.dl1.z0.glb.clouddn.com/2016-05-09-14622810192104.jpg" alt=""></p>

        <p>我在本地 hosts 中绑定了 fuck.io 到 127.0.0.1，所以截图中我的域名是 fuck.io 而不是 127.0.0.1，其实他们是完全等价的。</p>

        <p>这时候你可能要问了：为什么本宝宝的页面是一片空白？请使用开发者工具查看网络请求，只要是 200 状态就说明运行成功了，空白是因为这个页面引用了 Google Fonts，你懂的~</p>

        <p>至于为什么选择 1024 端口？因为他是 *UNIX 系统动态端口的开始，是我们不需要 root 权限就可以随意监听的数值最小的端口。</p>

        <p>另外，建议不熟悉 PHP 运行环境搭建的宝宝们不要轻易尝试使用 Apache 或 Nginx 驱动 Laravel，特别是在开启了 SELinux 的 Linux 系统上跑。关于 Laravel 在 Linux 上部署的大坑，本宝宝可能要单写一篇长文分享给宝宝们。</p>

        <p>原文：<a href="https://github.com/johnlui/Learn-Laravel-5/issues/4">https://github.com/johnlui/Learn-Laravel-5/issues/4</a></p>

    </section>

    <footer class="post-footer clearfix">
        <div class="pull-left tag-list">
            <i class="fa fa-folder-open-o"></i>
            <a href="/tag/laravel-5/">Laravel 5</a>, <a href="/tag/getting-started-with-laravel/">Laravel入门教程</a>, <a href="/tag/laravel-5-2/">Laravel 5.2</a>
        </div>

        <div class="pull-right share">
            <div class="bdsharebuttonbox share-icons">
                <a href="#" class="bds_more" data-cmd="more"></a>
                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
            </div>
        </div>
    </footer>
</article>

<div class="prev-next-wrap clearfix">
    <a class="btn btn-default" href="/post/2016-ban-laravel-xi-lie-ru-men-jiao-cheng-er/"><i class="fa fa-angle-left fa-fw"></i> 2016 版 Laravel 系列入门教程（二）</a>
    &nbsp;
    <a class="btn btn-default" href="/post/laravel-turns-five/">Laravel 五岁了 <i class="fa fa-angle-right fa-fw"></i></a>
</div>
<div class="about-author clearfix">
    <p class="comment-header author">评论</p>
    <div class="comment" id="comment-11458">
        <a name="11458"></a>
        <div class="avatar"><img src="https://cn.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&amp;d=mm&amp;r=g"></div>
        <div class="comment-info">
            <b>崇拜大神 </b><br>
            <span class="comment-time">2016-03-24 11:06</span>
            <div class="comment-content">
                <img src="https://lvwenhan.com/content/plugins/face/face/9.gif">
                <img src="https://lvwenhan.com/content/plugins/face/face/9.gif">
                <img src="https://lvwenhan.com/content/plugins/face/face/9.gif">好崇拜大神啊
            </div>
            <div class="comment-reply">
                <a href="#comment-11458" onclick="commentReply(11458,this)">回复</a>
            </div>
        </div>
    </div>
    <div class="comment" id="comment-11406">
        <a name="11406"></a>
        <div class="avatar">
            <img src="https://cn.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&amp;d=mm&amp;r=g">
        </div>
        <div class="comment-info">
            <b>几只少年</b><br><span class="comment-time">2016-02-25 21:06</span>
            <div class="comment-content">
                <img src="https://lvwenhan.com/content/plugins/face/face/13.gif">已收藏楼主博客，88年的吧~
            </div>
            <div class="comment-reply">
                <a href="#comment-11406" onclick="commentReply(11406,this)">回复</a>
            </div>
        </div>
        <div class="comment comment-children" id="comment-11407">
            <a name="11407"></a>
            <div class="avatar">
                <img src="https://cn.gravatar.com/avatar/70663f932b69304ce2283057d4a25c25?s=40&amp;d=mm&amp;r=g">
            </div>
            <div class="comment-info">
                <b>
                    <a href="https://lvwenhan.com/" target="_blank">JohnLui</a>
                </b><br>
                <span class="comment-time">2016-02-25 21:17</span>
                <div class="comment-content">@几只少年：93。。。</div>
                <div class="comment-reply">
                    <a href="#comment-11407" onclick="commentReply(11407,this)">回复</a>
                </div>
            </div>
            <div class="comment comment-children" id="comment-11439">
                <a name="11439"></a>
                <div class="avatar">
                    <img src="https://cn.gravatar.com/avatar/e8de53103b14ca0c791e8954f1d3371c?s=40&amp;d=mm&amp;r=g">
                </div>
                <div class="comment-info">
                    <b>jinhaoxu</b><br>
                    <span class="comment-time">2016-03-18 21:37</span>
                    <div class="comment-content">
                        @JohnLui：老师你好，我想请问一下：<br>
                        1.laravel5.0是不是自带记住登录状态，为什么我没勾选记住我，我重启浏览器后它还是记住我了？？<br>
                        2.laravel5.0是不是得自己写限制用户登录错误次数的方法？它原来的ThrottlesLogins在laravel5.0里面好像用不了......<br>
                        老师如果您有空的话就回复一下我，或者发邮箱给我，指点一下我这只迷途的“小羔羊”：）
                    </div>
                    <div class="comment-reply">
                        <a href="#comment-11439" onclick="commentReply(11439,this)">回复</a>
                    </div>
                </div>
                <div class="comment comment-children" id="comment-11803">
                    <a name="11803"></a>
                    <div class="avatar">
                        <img src="https://cn.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&amp;d=mm&amp;r=g">
                    </div>
                    <div class="comment-info">
                        <b>？</b><br>
                        <span class="comment-time">2016-09-13 01:30</span>
                        <div class="comment-content">@jinhaoxu：学习了</div>
                        <div class="comment-reply">
                            <a href="#comment-11803" onclick="commentReply(11803,this)">回复</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-author clearfix">
    <div id="comment-place">
        <div class="comment-post" id="comment-post">
            <p class="comment-header author">发表评论：</p>
            <form method="post" action="#" id="commentform">
                <input type="hidden" name="gid" value="26">
                <p>
                    <label for="author">昵称</label>
                    <input type="text" name="comname" maxlength="49" value="" size="22" tabindex="1">
                </p>
                <p>
                    <label for="email">邮件地址 (选填)</label>
                    <input type="text" name="commail" maxlength="128" value="" size="22" tabindex="2">
                </p>
                <p>
                    <label for="url">个人主页 (选填)</label>
                    <input type="text" name="comurl" maxlength="128" value="" size="22" tabindex="3">
                </p>
                <p>
                    <textarea name="comment" id="comment" rows="10" tabindex="4"></textarea>
                </p>
                <p>
                    <input type="submit" class="btn btn-default" id="comment_submit" value="发表评论" tabindex="6">
                </p>
            </form>
        </div>
    </div>
</div>
                </main>
                <?php include_once 'sidebar.inc.php'; ?>
            </div>
        </div>
    </section>
    <?php include_once 'footer.inc.php'; ?>
</body>
</html>