<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!

// MySQL 데이터베이스 연걸
$connect = mysql_connect("localhost", "hsy", "1111");
// DB 선택
mysql_select_db("hsy_db", $connect);

// 구매 정보를 mysql tableboard_shop 테이블에 입력하기 위한 insert 쿼리 스트링 생성
$sql = "insert into tableboard_shop(date, order_id, name, price, quantity)";
$sql .= " values ('$_POST[date]', '$_POST[order_id]', '$_POST[name]', '$_POST[price]', '$_POST[quantity]')";

$result = mysql_query($sql);

if (!$result) {
    echo "<script> alert('insert - error message') </script>";
}
mysql_close($connect);

?>

<script>
    location.replace('../index.php');
</script>
