<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>会員登録</title>
    </head>
    <body>
        <?php
            $name=$_POST['name'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            $address=$_POST['address'];

            $name= htmlspecialchars($name);
            $pass= htmlspecialchars($pass);
            $email= htmlspecialchars($email);
            $address= htmlspecialchars($address);

            $dbh=new PDO('sqlite:kadai.db');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec('CREATE TABLE IF NOT EXISTS member(id INTEGER PRIMARY KEY,name TEXT,pass TEXT,email TEXT,address TEXT)');
            $sql='INSERT INTO member(name,pass,email,address)VALUES("'.$name.'","'.$pass.'","'.$email.'","'.$address.'")';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
            $dbh=null;

            print '下記の内容で登録しました。<br>';
            print '氏名：';
            print $name;
            print '<br>';
            print 'パスワード：';
            print $pass;
            print '<br>';
            print 'メールアドレス：';
            print $email;
            print '<br>';
            print '住所：';
            print $address;
        ?>
    </body>
</html>
