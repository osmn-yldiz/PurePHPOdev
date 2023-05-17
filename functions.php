<?php

function StudentList()
{
    global $db;

    $result = $db->prepare("SELECT * FROM students ORDER BY id DESC");
    $result->execute();
    $line = $result->fetchAll(PDO::FETCH_ASSOC);
    return $line;
}

function StudentAdd($full_name, $email, $gender)
{

    global $db;

    $sorgu = $db->prepare("INSERT INTO students(full_name, email, gender) VALUES(?,?,?)");
    if ($sorgu->execute([$full_name, $email, $gender])) {
        return 1;
    } else {
        return  0;
    }
}

function generateRandomString($length = 10)
{
    $characters = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
