<?php
session_start();
require('dbcon.php');

if (isset($_POST['save_student_btn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];


    // Câu truy vấn
    $query = "INSERT INTO students (fullname, email, phone, course) VALUES (:fullname, :email, :phone, :course)";

    // Chuẩn bị câu truy vấn
    $query_run = $conn->prepare($query);

    // Đưa vào mảng để tăng tính rõ ràng

    $data = [
        ":fullname" => $fullname,
        ":email" => $email,
        ":phone" => $phone,
        ":course" => $course
    ];

    $query_execute = $query_run->execute($data);

    /*
    $query = "INSERT INTO students (fullname, email, phone, course) VALUES ('$fullname', '$email', '$phone', '$course')";
    $query_run = $conn->prepare($query);
    $query_execute = $query_run->execute();
    */

    // Truy vấn thành công
    if ($query_execute) {
        $_SESSION['message'] = 'Inserted Successfully'; // Dùng để in ra bên fileIndex xem insert thành công hay không
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = 'Not Inserted';
        header('Location: index.php');
        exit(0);
    }
}
