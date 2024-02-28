<?php
session_start();
require('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>PHP PDO</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <!-- Nhận session ở insert -->
                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                    <?php
                    // Xóa bỏ message
                    unset($_SESSION['message']);
                    ?>
                <?php endif; ?>


                <div class="card">
                    <div class="card-header">
                        <h3>PHP PDO CRUD<a href="student-add.php" class="btn btn-primary float-end">ADD STUDENT</a></h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $query = "SELECT * FROM students";
                                $statement = $conn->prepare($query);
                                $statement->execute();

                                // Nhận dữ liệu là 1 mảng (Fetch data từ db về)
                                $result = $statement->fetchAll(PDO::FETCH_OBJ);

                                /*
                                Nếu chỉ dùng fetchAll thì result nhận về 1 mảng
                                Nếu dùng fetchAll(PDO::FETCH_OBJ) thì resul là 1 object có các Properties
                                */

                                if ($result) {
                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row->id; ?></td>
                                            <td><?= $row->fullname; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->phone; ?></td>
                                            <td><?= $row->course; ?></td>
                                            <td>
                                                <a href="student-edit.php?id=<?= $row->id; ?>" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No record Found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>