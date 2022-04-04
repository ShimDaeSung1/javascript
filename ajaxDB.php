<?php

header("Content-Type: text/xml"); 

$mysql_hostname = 'localhost';

// myadmin 아이디
$mysql_username = 'simdaesung';

$mysql_password = 'tlamshtmzp!2';

// myadmin 아이디
$mysql_database = 'simdaesung';

$mysql_port = '3306';

$mysql_charset = 'utf8';

 

//1. DB 연결

$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password); 

 

if(!$connect){

    echo '[연결실패] : '.mysql_error().'<br>'; 

    die('MySQL 서버에 연결할 수 없습니다.');

    

} 

//2. DB 선택

mysqli_select_db($connect,$mysql_database) or die('DB 선택 실패');

 

//3. 문자셋 지정

mysqli_query($connect,' SET NAMES '.$mysql_charset);

 

//4. 쿼리 생성

$query = 'select name,price from products;';

 

//5. 쿼리 실행

$result = mysqli_query($connect,$query);





//6. 결과 처리

$output='<?xml version="1.0" encoding="UTF-8"?>';

$output.='<products>';

while($row = mysqli_fetch_array($result))

{

    //echo $row['name'].'<br>';

    $output.='<product>';

    $output.='<name>'.$row['name'].'</name>';

    $output.='<price>'.$row['price'].'</price>';

    $output.='</product>';

}

$output.='</products>';

 

echo $output;

 

//6. 연결 종료

mysqli_close($connect);

 

?>