<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <title>写一篇博文吧~</title>
    <link rel="stylesheet" href="../style/style.css"/>
    <link rel="stylesheet" href="../style/editormd.css"/>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon"/>
    <base target="_blank"/>
    <style>
        body {
            background-image: url(../images/bg.jpg);
        }
    </style>
</head>
<body>
<div class="content" id="layout">
    <div class="post-editor">
        <div class="post-meta post-nav" id="post-nav">
            <p>要写点什么嘛???</p>
        </div>
        <form method="post" action="createPost.php">
            <?php
            require_once "rootConn.php";
            $queryShowId = "SELECT id FROM post ORDER BY id DESC LIMIT 1";
            $resultShowId = mysqli_query($conn, $queryShowId);
            $showId = mysqli_fetch_array($resultShowId);
            ?>
            <div class="post-meta post-info">
                <input class="post-meta-title" type="text" name="title" placeholder="输入标题">
                <input class="post-meta-tag" type="text" name="tag" placeholder="标签">
                <input class="post-mata-id" type="text" name="id" value="<?php echo $showId['id'] + 1; ?>" size="1"
                       readonly="readonly">
                <input class="post-meta-submit" type="submit" name="submit" value=" 发 布 "><br>
                <input class="post-meta-intro" type="text" name="intro" placeholder="简介" size="53">
            </div>
            <div class="editormd" id="test-editormd">
                <textarea class="editormd-markdown-textarea" name="id-markdown-doc"></textarea>
            </div>
            <?php mysqli_close($conn); ?>
        </form>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/editormd.js"></script>
<script type="text/javascript">
    var testEditor;
    $(function () {
        testEditor = editormd("test-editormd", {
            width: "85%",
            height: 700,
            syncScrolling: "single",
            path: "../lib/",
            emoji: 0,
            placeholder: "Enjoy Markdown! coding now...",
            saveHTMLToTextarea: true
        });
    });
</script>
<script>
    window.onbeforeunload = function () {
        return '要离开此网站吗？';
    }
</script>
</body>
</html>
