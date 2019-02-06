<!DOCTYPE HTML>
<html lang="zh">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="博客计算机信息安全">
    <meta name="description" content="学习感兴趣的知识再po一下学习笔记。">
    <meta name="author" content="yuntaobc">
    <link rel="stylesheet" href="/styles/basic.css">
    <link rel="stylesheet" href="/styles/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/img/icon.png">
    <script src="styles/basic.js"></script>
    <script src="styles/jquery-3.3.1.js"></script>
    <base target="_self"/>
    <title>ht's blog</title>
</head>
<body>
<div class="content">
    <header class="header">
        <div class="header-content">
            <!--<div class="nav-logo"><img class="nav-logo" src="/pic/logo-kitty.jpg"></div>-->
            <div class="nav-title"><a href="/">ht's blog</a></div>
            <div class="nav-intro">生活 人文 技能</div>
            <nav class="nav-list">
                <a class="nav-list-a" href="/" ><i class="fa fa-home"></i> 主页</a>
                <a class="nav-list-a" href="/tag" ><i class="fa fa-list"></i> 目录</a>
                <a class="nav-list-a" href="/about" ><i class="fa fa-user"></i> 关于</a>
                <a class="nav-list-a" href="/todo" ><i class="fa fa-star"></i> 动态</a>
            </nav>
        </div>
    </header>
    <hr class="hr-head">
    <div class="content-body">
        <div class="content-body-post-list">
            <?php
            header("Content-type: text/html; charset=utf-8");
            require_once 'post/tempConn.php';
            if (!empty($_GET['offset'])) {
                if (!is_numeric($_GET['offset'])) {
                    die('Bad request!');
                }
                $offset = $_GET['offset'];
            } else {
                $offset = 1;
            }
            $queryOffset = "SELECT id,title,tag,date,intro,views FROM post WHERE visible = 1 ORDER BY id DESC LIMIT " . ($offset - 1) * 7 . ",7";
            $resultOffset = mysqli_query($conn, $queryOffset);
            ?>
            <?php
            while ($showOffset = mysqli_fetch_assoc($resultOffset)) {
                ?>
                <div class="post">
                    <a class="post-title" href="/post/<?php echo $showOffset['id'] . '.html'; ?>">
                        <h2 class="index-post-title"><?php echo $showOffset['title']; ?></h2>
                    </a>
                    <div class="post-meta">
                            <span class="post-meta-text">
                                <i class="fa fa-calendar"></i> 发布于 <?php echo $showOffset['date']; ?>
                            </span>
                        <span class="post-meta-text">
                                <i class="fa fa-folder-o"></i> 分类 <a class="post-meta-tag"
                                                                    href="/<?php echo 'tag#' . $showOffset['tag']; ?>"><?php echo $showOffset['tag']; ?></a>
                            </span>
                        <span class="post-meta-text">
                                <i class="fa fa-eye"></i> 浏览 <?php echo $showOffset['views']; ?>
                            </span>
                    </div>
                    <p class="post-intro"><?php echo $showOffset['intro']; ?></p>
                    <div class="post-read">
                        <a class="post-read" href="/post/<?php echo $showOffset['id'] . '.html'; ?>">阅读全文 »</a>
                    </div>
                </div>
            <?php } ?>
            <div class="pagebox">
                <nav class="pagebox-list">
                    <?php
                    $resultsPages = mysqli_query($conn, "select id from post where visible = 1");
                    $pages = mysqli_num_rows($resultsPages);
                    $pages = ceil($pages / 7);
                    $page = 1;
                    while ($page <= $pages) {
                        ?>
                        <div class="pagebox-item <?php if ($page == $offset) {
                            echo "current";
                        } ?>">
                            <a class="pagebox-item" href="/page/<?php echo $page . '.html'; ?>"><?php echo $page; ?></a>
                        </div>
                        <?php
                        $page = $page + 1;
                    } 
                    include "info/commfun.php";
                    mysqli_close($conn);
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="back-to-top back-to-top-on" id="back-to-top" onclick="backToTop()">
        <i class="fa fa-angle-double-up fa-3x"></i>
    </div>
    <hr class="hr-footer">
    <div class="footer">
        <div class="footer-content">
            <div class="copyright">&copy
                <span class="time">2019</span>
                <span class="author">yuntaobc</span>
            </div>
            <div class="powered">Powered by
                <span class="powered">yuntaobc</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
