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
    <title>Tag</title>
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
            $queryShowTag = "SELECT DISTINCT tag FROM post WHERE visible = 1 ORDER BY tag ASC";
            $resultShowTag = mysqli_query($conn, $queryShowTag);
            ?>
            <?php while ($showTag = mysqli_fetch_assoc($resultShowTag)) {
                ?>
                <nav>
                    <?php
                    $queryShowPost = "SELECT title,id,date FROM post where visible = 1 AND tag ='" . $showTag['tag'] . "' ORDER BY id DESC";
                    $resultShowPost = mysqli_query($conn, $queryShowPost);
                    ?>
                    <ul class="tag">
                        <i class="fa fa-paper-plane-o"></i>
                        <h2 class="post-title" id="<?php echo $showTag['tag']; ?>">
                            <?php echo $showTag['tag']; ?></h2>
                        <?php while ($showPost = mysqli_fetch_assoc($resultShowPost)) { ?>
                            <li class="tag">
                                <a href="/post/<?php echo $showPost['id'] . '.html'; ?>"><?php echo $showPost['title']; ?></a>(<?php echo $showPost['date']; ?>
                                )
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            <?php } ?>
            <?php mysqli_close($conn); ?>
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
