<?php

// DB接続 PDO

    const DB_HOST = 'mysql:dbname=wheatbobcat1_db;host=mysql57.wheatbobcat1.sakura.ne.jp;charset=utf8mb4';
    const DB_USER = 'wheatbobcat1';
    const DB_PASSWORD = 'towa0202';

function insertPost($request){
      // 例外処理 Exception
    try{
        $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [ 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        // echo 'connection successful';
    }catch(PDOException $e){
        echo $e -> getMessage() . "\n";
        exit();
    }

    // 入力 DB保存 prepare, execute(配列(全て文字列))

    // $params = [
    //     'id' => null,
    //     'your_name' => '田中',
    //     'email' => 'test@test.com',
    //     'url' => 'http://www.abc.com',
    //     'gender' => '1',
    //     'age' => '2',
    //     'contact' => 'いい',
    //     'created_at' => null
    // ];
    $params = [
        'id' => null,
        'your_name' => $request['your_name'],
        'email' => $request['email'],
        'url' => $request['url'],
        // 'gender' => $request['gender'],
        // 'age' => $request['age'],
        // 'contact' => $request['contact'],
        'created_at' => null
    ];

    $count = 0;
    $columns = '';
    $values = '';

    foreach(array_keys($params) as $key){
        if($count++>0){
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':'.$key;
    }

    var_dump($columns);
    //string(52) "id,your_name,email,url,gender,age,contact,created_at" 
    var_dump($values);
    //string(60) ":id,:your_name,:email,:url,:gender,:age,:contact,:created_at"

    $pdo->beginTransaction();

    try {
        //sql処理

        $sql = 'insert into contacts ('. $columns .')values('. $values .')';
        var_dump($sql);  
        //string(143) "insert into contacts (id,your_name,email,url,gender,age,contact,created_at)values(:id,:your_name,:email,:url,:gender,:age,:contact,:created_at)"
        $stmt = $pdo->prepare($sql);     //sql文を実行する準備を行う。戻り値はPDOStatement
        $stmt->execute($params); //実行

        $pdo->commit();
        $result = $stmt->fetchall();
        var_dump($result);
    } catch (PDOException $e) {
        $pdo->rollback();    //処理のキャンセル
        echo $e;
    }
}
?>