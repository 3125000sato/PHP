<!DOCTYPE html> 

<html lang="ja"> 

<head> 

<meta charset="utf-8"> 

<title>会員管理</title> 

</head> 

<body> 

<?php 

$id=$_POST['id']; 

$dbh=new PDO('sqlite:kadai.db'); 

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$dbh->exec('CREATE TABLE IF NOT EXISTS member(id INTEGER PRIMARY KEY,name TEXT,pass TEXT,email TEXT,address TEXT)'); 

$sql='SELECT * FROM member WHERE id=?'; 

$stmt=$dbh->prepare($sql); 

$data[]=$id; 

$stmt->execute($data); 

 
 

while(1) 

{ 

$rec=$stmt->fetch(PDO::FETCH_ASSOC); 

if($rec==false) 

{ 

break; 

} 

print $rec['id']; 

print ' '; 

print $rec['name']; 

print ' '; 

print $rec['pass']; 

print ' '; 

print $rec['email']; 

print ' '; 

print $rec['address']; 

print '<br><br>'; 

} 

$dbh=null; 

?> 

<br/> 

<a href="member_select.html">検索画面に戻る</a> 

</body> 

</html> 

 