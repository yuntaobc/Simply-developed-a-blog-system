<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <title>文章修改</title>
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
            <p>要修改什么嘛???</p>
        </div>
        <form method="post" action="updatePost.php">
            <div class="post-meta post-info">
                <?php
                require_once "rootConn.php";
                $id = $_GET['id'];
                $queryShowAlter = "SELECT id,title,intro,tag,content FROM post WHERE id = $id";
                $resultShowAlter = mysqli_query($conn, $queryShowAlter);
                $showAlter = mysqli_fetch_array($resultShowAlter);
                ?>
                <input class="post-meta-title" type="text" name="title"
                       value="<?php echo $showAlter['title']; ?>">
                <input class="post-meta-tag" type="text" name="tag" value="<?php echo $showAlter['tag']; ?>">
                <input class="post-mata-id" type="text" name="id" value="<?php echo $showAlter['id']; ?>" size="1"
                       readonly="readonly">
                <input class="post-meta-submit" type="submit" name="submit" value=" 发 布 "><br>
                <input class="post-meta-intro" type="text" name="intro"
                       value="<?php echo $showAlter['intro']; ?>" size="53">
            </div>
            <div class="editormd" id="test-editormd">
                <textarea class="editormd-markdown-textarea"
                          name="id-markdown-doc"><?php echo $showAlter['content']; ?></textarea>
            </div>
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
            placeholder: "",
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
