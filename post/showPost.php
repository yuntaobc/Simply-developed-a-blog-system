<!DOCTYPE HTML>
<html lang='zh'>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="博客计算机信息安全">
    <meta name="description" content="学习感兴趣的知识再po一下学习笔记。">
    <meta name="author" content="yuntaobc">
    <link rel="stylesheet" href="/styles/basic.css">
    <link rel="stylesheet" href="/styles/prism.css">
    <link rel="stylesheet" href="/styles/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/img/icon.png">
    <script src="../styles/basic.js"></script>
    <script src="../styles/jquery-3.3.1.js"></script>
    <?php
        header("Content-type: text/html; charset=utf-8");
        require_once 'tempConn.php';
        require_once '../lib/Parsedown.php';
        if (!empty($_GET['id'])) {
            if (!is_numeric($_GET['id'])) {
                die('Bad request!');
            }
        }
        $id = $_GET['id'];
        $queryPost = "SELECT * FROM post WHERE id = $id AND visible = 1";
        $resultPost = mysqli_query($conn, $queryPost);
        $showPost = mysqli_fetch_assoc($resultPost);
    ?>
    <title><?php echo $showPost['title']; ?></title>
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
            <div class="post">
                <h1 class="post-title"><?php echo $showPost['title']; ?></h1>
                <div class="post-meta">
                    <span class="post-meta-text">
                        <i class="fa fa-calendar"></i> <?php echo $showPost['date']; ?>
                    </span>
                    <span class="post-meta-text">
                        <i class="fa fa-folder-o"></i> 分类:
                        <a class="post-meta-tag" href="/tag#<?php echo $showPost['tag'] ?>">
                            <?php echo $showPost['tag']; ?>
                        </a>
                    </span>
                    <span class="post-meta-text">
                        <i class="fa fa-eye"></i> View:
                        <?php echo $showPost['views'] + 1; ?>
                    </span>
                </div>
                <div>
                    <?php
                    $parsedown = new Parsedown();
                    echo $parsedown->text($showPost['content']);
                    $queryViews = "UPDATE post SET views = views+1 WHERE id = $id";
                    mysqli_query($conn, $queryViews);
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>

        <script src="/styles/prism.js"></script>
    </div>
    <div class="back-to-top back-to-top-on" style="display: none;">
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
