<?php

use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App\View\styles.css?v=5">
    <!-- CSS only -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>



    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <form action="" method="post" id="form">
                                    <ul class="nav justify-content-center mt-2">
                                        <li class="nav-item m-2">
                                            <button type="submit" class="btn btn-success" data-bs-toggle="" data-bs-target="" id="AddMain" name='insert' id='insert'>
                                                ADD
                                            </button>
                                        </li>
                                        <li class="nav-item m-2">
                                            <select class="form-select" aria-label="Default select example" name='choose' id='choose'>
                                                <option selected value="0">Select Status</option>
                                                <option value="1">Set Active</option>
                                                <option value="2">Set Not Active</option>
                                                <option value="3">Delete</option>
                                            </select>
                                        </li>
                                        <li class="nav-item m-2">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target=""  name="OK" value="OK" id="OK">OK</button>
                                        </li>
                                    </ul>
                                    <div class=' container d-flex justify-content-center mt-2 mb-2'>

                                        <!-- Central rable -->

                                        <div id='result' class="container mt-3">
                                            <table class="table table-bordered  table-responsive-sm ">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-top">
                                                            <input type="checkbox" name="main_checkbox" id="main_checkbox">
                                                        </th>
                                                        <th class=" text-center max-width"> full name</th>
                                                        <td class="text-center align-middle">status</th>
                                                        <td class="text-center align-middle">role</th>
                                                        <td class="text-center align-middle">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $row) { ?>
                                                        <tr>
                                                            <td class="text-center align-middle">
                                                                <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                    <input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                                                                </div>

                                                            </td>
                                                            <td class="text-center align-middle"><?= $row['name'] ?> <?= $row['surname'] ?></td>

                                                            <?php if ($row["status"] == 1) { ?>
                                                                <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
                                                            <?php } elseif ($row["status"] == 2) { ?>
                                                                <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x" style="color:grey"></i></td>
                                                            <?php } else  echo '<td></td>'; ?>
                                                            <td class="text-center align-middle"><?= $row['role'] ?></td>
                                                            <td class="text-center align-middle">
                                                                <div class="btn-group align-top">
                                                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit' name='update'>Edit</button>
                                                                    <!-- <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash fa-lg "></i></button> -->
                                                                    <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target="" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php  } ?>
                                                <tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- buttons 2 -->
                                    <ul class="nav justify-content-center mt-2">
                                        <li class="nav-item m-2">
                                            <button type="submit" class="btn btn-success" data-bs-toggle="" data-bs-target="" id="AddMain" name='insert' id='insert'>
                                                ADD
                                            </button>
                                        </li>
                                        <li class="nav-item m-2">
                                            <select class="form-select" aria-label="Default select example" name='choose' id='choose'>
                                                <option selected value="0">Select Status</option>
                                                <option value="1">Set Active</option>
                                                <option value="2">Set Not Active</option>
                                                <option value="3">Delete</option>
                                            </select>
                                        </li>
                                        <li class="nav-item m-2">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target=""  name="OK" value="OK" id="OK">OK</button>
                                        </li>
                                    </ul>
                                </form>
                                <!-- Modals -->

                                <?php
                                include_once "App\View\modals.php";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="App\View\ajax.js"></script>
    

</body>

</html>