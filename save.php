<?php
$content = $_POST['content'];
$username = $_POST['username'];
//连接到数据库

if( trim($content) == '' or trim($username) == ''){
    echo '人と話したりすると 気付くんだ 伝えたい言葉が無いって事';
    echo '適当に合わせたりすると解るんだ 伝えたい気持ちだらけって事';
    exit;
}
//避免空（conditional execution if
if( $username == 'admin' or $username == 'root' or $username == '领导人'){
    echo '换个名字吧';
    exit;
}
//避免敏感词
include('../php123/db.php');
//将公共代码统一放在其他地方 保持清晰简洁

//编写sql
$sql = "INSERT INTO msg (username,content) VALUES ('{$username}','{$content}')";
/*注意：1.整体的sql结构 2.要将两个变量的内容存进来 3.双引号包围识别变量
        4.测试sql语句 要用echo 数据库与php的变量不同 */

write($pdo,$sql);



//跳转首页
header('location:index.php');

?>