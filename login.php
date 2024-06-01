<?php
require_once 'connect.php';
session_start();
var_dump($_SESSION);
echo "\n";
echo isset($_POST['afterLogin'])."\n";
echo $_POST['afterLogin']."\n";
echo $_POST['id']."\n";
echo $_POST['password']."\n";

if (!isset($_POST['afterLogin'])) {
    $sql = "SELECT id,name,admin,chpass FROM user WHERE id = '"
    . $_POST['id']
    . "' and password = '"
    . $_POST['password']
    . "'";
}else{
    $sql = "SELECT id,name,admin,chpass FROM user WHERE id = '"
    . $_SESSION['userid']
    . "' and password = '"
    . $_SESSION['userpassword']
    . "'";
}

// $sql = "SELECT id,name,admin,chpass FROM user WHERE id = '"
//     . $_POST['id']
//     . "' and password = '"
//     . $_POST['password']
//     . "'";

$result = $mysqli -> query($sql);

//クエリー失敗
if(!$result) {
    echo $mysqli->error;
    exit();
}

$row = $result->fetch_assoc();

//結果セットを解放
$result->free();

// データベース切断
$mysqli->close();

?>
<!DOCTYPE html>
<html>
<head>
<title>Chatter</title>
<style type="text/css">
p,form {
background-color:rgba(255, 255, 255, 0);
width:400px;
margin:auto;
padding:2em;
}
</style>
</head>
<body>
<?php
if(!$row){
?>
         
           <style type="text/css">
             p,form {
            background-color:rgba(255, 255, 255, 0);
            width:400px;
            margin:auto;
            padding:2em;
            }

            .example{
            /*追加*/display: flex;
            /*追加*/justify-content: center;
            /*追加*/align-items: center;
            background: url('mmm.jpg')
        no-repeat center center / cover;
            height: 300px;
            /*color: #FFF;*/
            color:rgba(255,255,255,0.9);
            font-size: 930%;
            font-weight: bold;
            }
            </style>
            <div class="example"><font face="Century Gothic">M  e  g  a  T  o  w  n</font></div>

            <div style="position:absolute; top:360px; left:600px;">
            <h1 style="text-align:center"><font color="black" size="+3" face="serif">
                Sorry, please type again . . .
            </h1></font></div>

    <form style="text-align:right;" method="post" action="login.php">
    <font face="serif">
    <div style="position:absolute; top:500px; left:620px;">
    ID:
    <input type="text" name="id"><br>
    PASSWORD:
    <input type="password" name="password"><br>
    <br>
    <input type="submit" value="Login">
    </div>
    </form>
<?php
} else{
    if($_SESSION['afterlogin']!=true){
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['userpassword'] = $_POST['password'];
        $_SESSION['useradmin'] = $row['admin'];
        $_SESSION['afterlogin']=true;
    }

    if($row['chpass']==false){
?>
    <style type="text/css">
             p,form {
            background-color:rgba(255, 255, 255, 0);
            width:400px;
            margin:auto;
            padding:2em;
            }

            .example{
            /*追加*/display: flex;
            /*追加*/justify-content: center;
            /*追加*/align-items: center;
            background: url('mmm.jpg')
        no-repeat center center / cover;
            height: 300px;
            /*color: #FFF;*/
            color:rgba(255,255,255,0.9);
            font-size: 930%;
            font-weight: bold;
        }
        </style>
        <div class="example"><font face="Century Gothic">M  e  g  a  T  o  w  n</font></div>

        <div style="position:absolute; top:360px; left:380px;">
        <h1 style="text-align:center"><font color="red" size="+3" face="serif">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
            ※初回ログインです。パスワードを変更してください。</h1></font></div>

        
        <form name="passwordForm" method="post" action="password.php" onsubmit="return validateForm()">
        <font face="serif">
        <div style="position:absolute; top:500px; left:620px;">
        ENTER PASSWORD:
        <input type="password" name="password" required><br>
        <br>
        REENTER PASSWORD:
        <input type="password" name="password-re" required><br><br>
        <input type="submit">
        </div>
        </font>
        </form>

        <script>
            function validateForm() {
                var password = document.forms["passwordForm"]["password"].value;
                var passwordRe = document.forms["passwordForm"]["password-re"].value;
        
                if (password != passwordRe) {
                    alert("Passwords do not match. Please re-enter.");
                    return false;
                }
            }
        </script>

    <?php
    }else{
        // Set the timezone to Japan Standard Time (JST)
        date_default_timezone_set('Asia/Tokyo');
        $now = strtotime(date("H:i")); // Get the current hour in 24-hour format (00 to 23)
    ?>

<body style="background-image: url('hana.jpg');
width: 620px;
height: 620px;
background-align: right;
background-repeat: no-repeat;
background-position: right;
background-size: contain;>


        <p>
        <style="text-align:center"><font color="black" size="+8" face="serif">
        ようこそ<br>
        <?php echo $_SESSION['username']?>さん(@<?php echo $_SESSION['                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       userid']                                                                                                              ?>)<br>
        </style></font></p>
        <div style="position:absolute; top:494px; left:1px;">
        <p><style="text-align:center"><font color="black" face="serif">→　　<a href="chatter.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
            おしゃべりハウス</style></font></a>
        </p>
        <?php
        if(strtotime('9:00')<=$now && $now<=strtotime('15:00')){
        ?>
            <p><style="text-align:center"><font color="black" face="serif">→　　<a href="index.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                社員参照アプリ</div></font></a></p>
        <?php
        }else{
                if($_SESSION['useradmin']==true){
        ?>
                        <p><style="text-align:center"><font color="black" face="serif">→　　<a href="index.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                社員参照アプリ</style></font></a></p>
        <?php
                }else{
        ?>
                    <p><style="text-align:center"><font color="black" face="serif">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                        社員参照アプリのご利用は9:00~15:00の間となります。</style></font></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        <?php
                }
        }
        ?>
        <p><style="text-align:center"><font color="black" face="serif">→　　<a href="start.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                社員参照アプリ</style></font></a></p>
        <?php
    }
}
?>
</div>
</font>
</body>
</html>


