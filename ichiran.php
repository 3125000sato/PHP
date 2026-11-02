<!DOCTYPE html> 

<html lang="ja"> 

<head> 

<meta charset="utf-8"> 

<title>ＰＨＰ基礎</title> 

</head> 

<body> 

<?php 

$dbh=new PDO('sqlite:phpkiso.db'); 

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$dbh->exec('CREATE TABLE IF NOT EXISTS anketo(id INTEGER PRIMARY KEY,nickname TEXT,email TEXT,goiken TEXT)'); 

$sql='SELECT * FROM anketo'; 

$stmt=$dbh->prepare($sql); 

$stmt->execute(); 

while(1) 

{ 

$rec=$stmt->fetch(PDO::FETCH_ASSOC); 

if($rec==false) 

{ 

break; 

} 

print $rec['id']; 

print ' '; 

print $rec['nickname']; 

print ' '; 

print $rec['email']; 

print ' '; 

print $rec['goiken']; 

print '<br><br>'; 

} 

$dbh=null; 

?> 

<br/> 

<a href="index.php">メニューに戻る</a> 

</body> 

</body> 

</html> 
