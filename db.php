
<?php
$dsn ='mysql:dbname=php123;host=127.0.0.1';
$pdo = new PDO($dsn,'root','');

function write($pdo,$sql){
    //$pdo本是局部变量 要以参数形式传递
    $sth=$pdo->prepare($sql);
    return $sth->execute();
}

function read($pdo,$sql){
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    return $rows;
}

?>
