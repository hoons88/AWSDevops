<?php 
session_start();

if(! $_GET['userid'] ){
    echo("<script>window.alert('아이디를 입력하세요.');
             history.go(-1);</script>");exit;}  
		
include "dbconn.php";
			
$sql = "select * from member where id='".$_GET['userid']."'";
$result = mysql_query($sql, $connect);
$num_match = mysql_num_rows($result);
   
if(! $num_match){
    echo("<script>window.alert('입력 정보가 틀렸습니다.');
             history.go(-1);</script>");
}else{
    $row = mysql_fetch_array($result);
    mysql_close();
    $db_pass = $row[pass];
				
    if($_GET['passwd'] != $db_pass){
	echo("<script>window.alert('입력 정보가 틀렸습니다.');
                history.go(-1);</script>");exit;}
    $_SESSION['userid'] = $row[id];
    $_SESSION['username'] = $row[name];
    $_SESSION['usernick'] = $row[nick];
    $_SESSION['hp'] = $row[mphone];
    $_SESSION['e-mail'] = $row[email];
    $_SESSION['regist_day'] = $row[regist_day];
				
    echo("<script>window.alert('로그인 성공');
           location.href = '../index.php';</script>");
}
?>













