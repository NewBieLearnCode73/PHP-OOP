<?php
require('dbcon.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>EDIT & UPDATE DATA TO DB USING PHP PDO</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>EDIT & UPDATE DATA TO DB USING PHP PDO <a href="index.php" class="btn btn-danger float-end">BACK</a></h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = $_GET['id'];

                            // Lấy ra sinh viên có id cụ thể đã được hiện trên thanh URl 

                            $query = "SELECT * FROM students WHERE id=:student_id LIMIT 1";
                            $statement = $conn->prepare($query); // Chuẩn bị câu lệnh truy vấn

                            // Truyền tham số vào bên trong
                            $statement->bindParam(":student_id", $student_id);

                            // Thực thi câu lệnh sau khi truyền tham số
                            $statement->execute();

                            // Lấy dữ liệu và lưu vào đối tượng $result
                            $result = $statement->fetch(PDO::FETCH_OBJ);
                        }
                        ?>

                        <form action="code.php" method="post">
                            <div class="mb-3">
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $result->id ?>">

                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <!-- Điền value nhận được vào bên trong -->
                                        <input type="text" name="fullname" class="form-control" value="<?= $result->fullname; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="<?= $result->email; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?= $result->phone; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Course</label>
                                        <input type="text" name="course" class="form-control" value="<?= $result->course; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student_btn" class="btn btn-primary">Update Student</button>
                                    </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>