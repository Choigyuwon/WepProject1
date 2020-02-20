<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body oncontextmenu='alert("z_z"); return false' ondragstart='return false' onselectstart='return false'>
        <h1 class="display">Board Delete</h1>
        <?php
            //board_list.php 페이지에서 넘어온 글 번호값 저장 및 출력
            $board_no = $_GET["board_no"];
            echo $board_no."`s Number Board<br><br>";
        ?>
        <!-- board_delete_action.php 페이지로 post방식을 이용하여 값 전송 -->
        <form action="board_delete_action.php" method="post">
            <table class="form-horizontal">
                <tr>
                    <td>Please your password</td>
                </tr>
                <tr>
                    <td><input type="text" name="board_pw">
                        <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
                    </td>
                </tr>
                <tr>
                    <td><button class="btn-style" type="submit">Delete</td>
                </tr>
            </table>
        </form>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>