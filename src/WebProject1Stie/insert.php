<?php 
	header("Content-Type: text/html; charset=UTF-8");
	$conn = new mysqli("localhost","gw2988","rbdnjs10588!","gw2988");
    mysql_select_db("mydb",$conn);

    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $REMOTE_ADDR = $_SERVER[REMOTE_ADDR];

    $sql = "INSERT INTO board
    (id, name, email, pass, title, content, wdate, ip, view)
    VALUES ('', '$name', '$email', '$pass', '$title',
    '$content', now(), '$REMOTE_ADDR', 0)";
    $res = $conn->query($sql);

    //데이터베이스와의 연결 종료
    mysql_close($conn);

    // 새 글 쓰기인 경우 리스트로..
    echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
    //1초후에 list.php로 이동함.
?>

<center>
<font size=2>정상적으로 저장되었습니다.</font>
