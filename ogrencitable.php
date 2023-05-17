<?php

include 'baglan.php';
include 'functions.php';

$lineStudentList = StudentList();

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Öğrenci Tablosu</title>
</head>

<body>

    <div class="container table-responsive">
        <header class="header">
            <h1 id="title" class="text-center">Öğrenci Tablosu</h1>
        </header>
        <table class="table table-bordered table-hover table-striped" style="text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                </tr>
            </thead>
            <tfoot class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                </tr>
            </tfoot>
            <tbody>

                <?php foreach ($lineStudentList as $key => $student) { ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1; ?></th>
                        <td><?php echo $student['full_name']; ?></td>
                        <td><?php echo $student['email']; ?></td>
                        <td><?php echo ($student['gender'] == 0) ? "<span class='badge text-bg-primary'>Male</span>" : "<span class='badge text-bg-danger'>Female</span>"; ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>