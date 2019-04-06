<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!

// MySQL 데이터베이스 연걸
$connect = mysql_connect("localhost", "hsy", "1111");
// DB 선택
mysql_select_db("hsy_db", $connect);

// 구매 정보를 수정하기 위한 update 쿼리 스트링 생성
$sql = "update tableboard_shop tableboard_shop set date = '$_POST[date]', order_id = '$_POST[order_id]', name = '$_POST[name]', price = '$_POST[price]', quantity = '$_POST[quantity]' where num = '$_GET[num]'";

$result = mysql_query($sql);

if (!$result) {
    echo "<script> alert('update - error message') </script>";
}
mysql_close($connect);

?>

<script>
    location.replace('../index.php');
</script>
