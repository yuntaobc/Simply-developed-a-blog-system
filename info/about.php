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
    <link rel="stylesheet" href="/styles/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/img/icon.png">
    <script src="../styles/basic.js"></script>
    <script src="../styles/jquery-3.3.1.js"></script>
    <title>关于我</title>
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
            require_once '../post/tempConn.php';
            $queryShowAbout = "SELECT DISTINCT title FROM about WHERE visible=1";
            $resultShowAbout = mysqli_query($conn, $queryShowAbout);
            ?>
            <?php while ($showAbout = mysqli_fetch_assoc($resultShowAbout)) { ?>
                <nav class="about">
                    <h1 class="about post-title"><?php echo $showAbout['title']; ?></h1>
                    <hr class="about-divide">
                    <?php
                    $queryShowItem = "SELECT item,content FROM about WHERE visible=1 AND title='" . $showAbout['title'] . "'";
                    $resultShowItem = mysqli_query($conn, $queryShowItem);
                    ?>
                    <?php while ($showItem = mysqli_fetch_assoc($resultShowItem)) { ?>
                        <li class="about">
                            <h3 class="about post-title"><p class="about"><?php echo $showItem['item'] . ": " . $showItem['content']; ?></p>
                            </h3>
                        </li>
                    <?php } ?>
                </nav>
            <?php } ?>
        </div>
    </div>
    <div class="back-to-top back-to-top-on">
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
