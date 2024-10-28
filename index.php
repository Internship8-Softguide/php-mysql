<?php

$mysqli = new mysqli("localhost", "root", "");


if ($mysqli->connect_errno) {
    echo "something is wrong in connecting to database";
} else {
    $sql = "CREATE DATABASE IF NOT EXISTS test_int";
    $status = $mysqli->query($sql);
    if ($status) {
        $selected = $mysqli->select_db("test_int");
        if ($selected) {
            // create_tables($mysqli);
            // add_student($mysqli, 3, "Zaw Zaw");
            get_all_student($mysqli);
        } else {
            echo "can not connect database";
        }
    } else {
        echo "can not create database";
    }
}

function create_tables($mysqli)
{
    $sql = "CREATE TABLE IF NOT EXISTS student(student_id INT,student_name VARCHAR(225))";
    $status = $mysqli->query($sql);
}


function add_student($mysqli, $id, $name)
{
    $sql = "INSERT INTO student(student_id,student_name) VALUES ($id,'$name')";
    $status = $mysqli->query($sql);
}


function get_all_student($mysqli)
{
    // $sql = "SELECT student_name FROM student";
    $sql = "SELECT student_name as name FROM student";
    $result = $mysqli->query($sql);

    // while ($student =  $result->fetch_assoc()) {
    //     echo "Student  name is $student[student_name]<br>";
    // }
    while ($student =  $result->fetch_assoc()) {
        echo "Student  name is $student[name]<br>";
    }
    // $students = $result->fetch_all();
    // foreach ($students as $value) {
    //     echo "Student  name is $value[1]<br>";
    // }
}

// [["id"=>1,"name"=>"Maung Maung"],["id"=>2,"name"=>"Aung Aung"]]
