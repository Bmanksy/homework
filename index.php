<?php
include('db.php');//链接
$sql = "SELECT*from msg order by id desc";//编写
$rows = read($pdo,$sql);

?>

<html>
    <head>
        <title>A Bumper's Message Board</title>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <style>
            .add,.list{width:800px;
             margin:0 auto;
             }
             .link{text-align: center;}
                a:link {color: #FFFFFF} 
                a:visited {color: #FFFFFF} 
                a:hover {color: #FFFFFF} 
                a:active {color: #FFFFFF}
            textarea{width:100%;
             height:100px;
              margin-bottom:10px;
              border-radius:5px;
              background-color:rgba(244,251,251,0.47);}
              <--!透明用法-->
            .username{ float:left;
                width: 90px;
                height: 30px;
                border: solid;
                line-height: 30px;
                font-size: 15;
                text-align: center;
                border-radius: 50px;
                
                }
            .submit{float:right;
                width: 90px;
                height: 30px;
                border: none;
                line-height: 30px;
                font-size: 15;
                text-align: center;
                color: white;
                background-color:rgba(244,251,251,0.47);
                border-radius: 50px;
                
                transition: border ease-in-out 0.15s,box-shadow ease-in-out 0.15s;}
            .msg{position: relative;
                border:solid 1px #cccccc;
                margin-top:10px;
                padding:5px;
                color:#cccccc;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;}
            .msg-left:before{
                    content: '';
                    left:-9px;
                    top:10px;
                    position: absolute;
                    border-right: 8px solid #cccccc;
                    border-top: 8px solid transparent;
                    border-bottom: 10px solid transparent;
                    }
                    .msg-left:after{
                        content: '';
                        left:-7px;
                        top:10px;
                        position: absolute;
                        border-right: 8px solid transparent;
                        border-top: 8px solid transparent;
                        border-bottom: 10px solid transparent;
                        }
        </style>

    </head>
    <body background="bg2.jpg" style=" background-repeat:no-repeat ;background-size:100% 100%;
    background-attachment: fixed;">
        
        <h1 class="head"><center><dt>A Bumper's Message Board</dt></center></h1>
        <audio id="player">
        <source src="BUMP OF CHICKEN - 三ツ星カルテット.mp3"></source>
        </audio>
        <div title='music'><center><span style="cursor: pointer;" id="start">♪ 恒星を3つ目印に</span></center></div>
        <div title='stop'><center><span style="cursor: pointer;" id="stop">♪ 知らない内に知り合った</span></center></div>
        <p class="link"><a href="http://www.bumpofchicken.com/" title='click to support'>★★★★</a>
        <div class='add'>
                 <form action='save.php' method='POST'>
                    <textarea name='content' onfocus="if(value=='話がしたいよ') {value=' ' }" onblur="if(value==' ')
                     {value='話がしたいよ'}">話がしたいよ</textarea>
                    <input name='username' class='username' type='text' placeholder='花の名'  />
                    <input class='submit' type='submit' value='submit'/>
                    <div style='clear:both'></div>
                </form>
        </div>
       <div class='list'>
            <?php
            foreach($rows as $key=>$msg){
            ?>
                <div class='msg msg-left'>
                <p><?php echo $msg['username']; ?></p>
                <p><?php echo $msg['content'];?></p>
           
        </div>
            <?php
            }
            ?>

       </div>

    </body>
    <script type="text/javascript">
    document.getElementById('start').onclick = function(){
        player.play();
    }
    document.getElementById('stop').onclick = function(){
        player.pause();
    }
    </script>
    </html>