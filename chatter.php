<?php
require_once 'connect.php';
session_start();




// セッションから結果メッセージを取得し、セッションから削除
$resultMessage = isset($_SESSION['resultMessage']) ? $_SESSION['resultMessage'] : '';
unset($_SESSION['resultMessage']);




// $id = $_SESSION['id'];
// $name = $_SESSION['name'];
// $depart = $_SESSION['depart'];
// $gender = $_SESSION['gender'];
// $phone = $_SESSION['phone'];
// $password = $_SESSION['password'];
// $admin = $_SESSION['admin'];


$sql = "SELECT name, id, message, c_date, fileName FROM chatlist";
$result = $mysqli->query($sql);


// クエリー失敗
if (!$result) {
    echo $mysqli->error;
    exit();
}


// レコード件数
$row_count = $result->num_rows;


// 連想配列で取得
$rows = [];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
}


// 結果セットを解放
$result->free();


// データベース切断
$mysqli->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Chatter</title>
    <meta charset="UTF-8">
        <style type="text/css">
    p, form {
        background-color: white;
        width: 400px;
        margin: auto;
        padding: 2em;
    }

    body {
        background-image: url('aaa.jpg'); /* 背景画像のURLを指定 */
        background-repeat: repeat; /* 背景画像の繰り返しを指定 */
        background-size: 800px; /* 背景画像のサイズを指定 */
    }
</style>



<p>
<?php
foreach ($rows as $row) {
?>
    <font face="serif">
    <b><?php echo htmlspecialchars($row['name']); ?></b>
    <span style="color: silver; font-size: small;">
</style>
</style>
        @<?php echo htmlspecialchars($row['id']); ?>
        [<?php echo htmlspecialchars($row['c_date']); ?>]
    </span>
    <br>
    <?php 
    if($row['fileName']==NULL){
        echo htmlspecialchars($row['message']); 
    }else{
        echo "<a href='" . $row['message'] . "' download>" . htmlspecialchars($row['fileName'], ENT_QUOTES, 'UTF-8') . "</a>";
    }

    ?>
    
    <br><br>
<?php
}
?>
</p>
<hr>


<!-- 顔文字プルダウンメニュー -->
<form id="faceForm">
    <select onchange="addFace()">
        <option value="">顔文字はこちら</option>
        <option value="(～￣▽￣)～">(～￣▽￣)～</option>
        <option value="(☝ ՞ਊ ՞)☝">(☝ ՞ਊ ՞)☝</option>
    </select>
</form>

<form action="put.php" method="post" enctype="multipart/form-data">
        <label for="file">Select file to upload:</label>
        <input type="file" name="file" id="file"><br>
        <input type="hidden" name="filename" id="filename">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <script>
    // Get the file input element
    var fileInput = document.getElementById('file');

    // Add event listener for change event
    fileInput.addEventListener('change', function() {
        // When a file is selected, set the value of the hidden input field to the filename
        var filenameInput = document.getElementById('filename');
        filenameInput.value = fileInput.files[0].name;
    });
</script>

<script>
function addFace() {
    var faceSelect = document.getElementById("faceForm").getElementsByTagName("select")[0];
    var selectedFace = faceSelect.options[faceSelect.selectedIndex].value;
    var textarea = document.getElementsByName("chat")[0];
    textarea.value += selectedFace;
}


</script>

<script>
        window.onload = function() {
            // Focus on the textarea when the page loads
            console.log("Script executed!");
            document.querySelector('textarea[name="chat"]').focus();
        };
</script>

<?php
if (isset($_SESSION['userid'])) {
?>
<form method="post" action="put.php">
<textarea rows="5" cols="30" name="chat"></textarea>
    <input type="submit" value="おしゃべりする">
</form>

<!-- Hidden form with the link -->
<form id="hiddenForm" action="login.php" method="post">
  <input type="hidden" name="afterLogin" value="true">
</form>

<!-- Link to trigger the form submission -->
<p><a href="#" onclick="submitForm()">戻る</a></p>

<script>
function submitForm() {
  // Submit the form
  document.getElementById("hiddenForm").submit();
}
</script>
#this is a test for git merge process
<?php
} else {
?>
<p style="text-align: center;">[<a href="start.php">ログイン</a>]</p>
</font>

</body>
<?php
}
?>


</body>
</html>


