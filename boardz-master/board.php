<?php
/**
 * Created by PhpStorm.
 * User: 한승연
 * Date: 2019-03-31
 * Time: 오후 11:00
 */
$connect = mysql_connect("localhost", "hsy", "1111");
mysql_select_db("hsy_db", $connect);

$sql = "select * from boardz where title like '%$_GET[search]%'";

$result = mysql_query($sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no"/>
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="seventyfive-percent  centered-block">
    <!-- Sample code block -->
    <div>
        <hr class="seperator">


        <!-- Example header and explanation -->
        <div class="text-center">
            <h2>Beautiful <strong>Boardz</strong></h2>
            <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                <form class="example" method=get action="<?= $PHP_SELF ?>">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <!--<hr class="seperator fifty-percent">-->

        <!-- Example Boardz element. -->
        <div class="boardz centered-block beautiful">
            <?php
            $num = mysql_num_rows($result);     //레코드 개수
            $a = floor($num / 3);        //몫
            $mod = $num % 3;                    //나머지
            $n = 0;

            while ($row = mysql_fetch_array($result)) {
                $n++;       //출력할 사진 순서

                if ($n == 1) echo "<ul> ";
                echo "<li>";
                if ($row[title] != NULL) echo "<h1> $row[title] </h1>";
                if ($row[contents] != NULL) echo "$row[contents]";
                echo "<img src= $row[image_url] > ";
                echo "</li>";
                if ($mod == 2) {       //출력할 사진 순서의 3으로 나눈 나머지가 2이면
                    if ($n == $a + 1 || $n == 2 * ($a + 1)) echo "</ul> <ul>";
                } else {               //출력할 사진 순서의 3으로 나눈 나머지가 0/1이면
                    if ($n == $a || $n == 2 * $a) echo "</ul> <ul>";
                }
                if ($n == $num) echo "</ul>";
            }
            ?>


        </div>
    </div>

    <hr class="seperator">

</div>
</body>
</html>


