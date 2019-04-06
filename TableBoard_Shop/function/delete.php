<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드 삭제하기!

// MySQL 데이터베이스 연걸
$connect = mysql_connect("localhost", "hsy", "1111");
// DB 선택
mysql_select_db("hsy_db", $connect);

// 선택한 구매 내역(num)에 해당하는 레코드 정보 삭제를 위한 delete 쿼리 스트링 생성
$sql = "delete from tableboard_shop where num = '$_GET[num]'";
$result = mysql_query($sql);

if (!$result) {
    echo "<script> alert('delete - error message') </script>";
}
mysql_close($connect);

?>

<script>
    location.replace('../index.php');
</script>
