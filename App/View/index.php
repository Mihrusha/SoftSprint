<?php

use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="App\View\styles.css?v=5">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" id="form">


        <div class="container">
            <div class=' container d-flex justify-content-center mt-2 mb-2'>

                <div class='row '>
                    <div class='col-2'>
                        <button type="button" class="btn  btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='insert' id='AddMain' name='insert'>ADD</button>
                    </div>

                    <div class='col-5'>
                        <select class="form-select" aria-label="Default select example" name='choose' id='choose'>
                            <option selected value="0">Open this select menu</option>
                            <option value="1">Set Active</option>
                            <option value="2">Set Not Active</option>
                            <option value="3">Delete</option>
                        </select>
                    </div>
                    <div class='col'>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="OK" value="OK" id="Ok">OK</button>
                    </div>
                </div>
            </div>
            <!-- ********************************************************************* -->
            <div class="row flex-lg-nowrap">
                <div class="col">
                    <div class="row flex-lg-nowrap">
                        <div class="col mb-3">
                            <div class="e-panel card">
                                <div class="card-body" id='result'>
                                    <div class="card-title">
                                        <h6 class="mr-2"><span>Users</span></h6>
                                    </div>
                                    <div class="e-table">
                                        <div class="table-responsive table-lg mt-3">
                                            <table class="table table-bordered  table-responsive-sm ">
                                                <thead>
                                                    <tr>
                                                        <th class="align-top">
                                                            <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                                                                <input type="checkbox" name="main_checkbox" id="main_checkbox">
                                                                <label class="custom-control-label" for="all-items"></label>
                                                            </div>
                                                        </th>

                                                        <th style="text-align:center"> name</th>
                                                        <th style="text-align:center">surname</th>
                                                        <th style="text-align:center">role</th>
                                                        <th style="text-align:center">status</th>
                                                        <th style="text-align:center">action</th>
                                                    </tr>
                                                </thead>

                                                <?php foreach ($data as $row) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                    <input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                                                                    <label class="custom-control-label" for="item-2"></label>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap align-middle"><?= $row['name'] ?></td>
                                                            <td class="text-nowrap align-middle"><?= $row['surname'] ?></td>
                                                            <td class="text-nowrap align-middle"><?= $row['role'] ?></td>

                                                            <?php if ($row["status"] == 1) { ?>
                                                                <td class="text-center align-middle"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
                                                            <?php } elseif ($row["status"] == 2) { ?>
                                                                <td class="text-center align-middle"><i class="fa-solid fa fa-circle  fa-2x" style="color:grey"></i></td>
                                                            <?php } else  echo '<td></td>'; ?>

                                                            <td class="text-center align-middle">
                                                                <div class="btn-group align-top">
                                                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" id='edit' name='update'>Edit</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php  } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--*************************** buttons 2 -->
            <div class=' container d-flex justify-content-center mt-2 mb-2'>

                <div class='row '>
                    <div class='col-2'>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" name='insert' id="AddMain">
                            ADD
                        </button>

                    </div>

                    <div class='col-5'>
                        <select class="form-select" aria-label="Default select example" name='choose' id='choose'>
                            <option selected value="0">Open this select menu</option>
                            <option value="1">Set Active</option>
                            <option value="2">Set Not Active</option>
                            <option value="3">Delete</option>
                        </select>
                    </div>
                    <div class='col'>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="OK" value="OK" id="Ok">OK</button>
                    </div>

                </div>

            </div>
        </div>



    </form>
    <!-- Modals -->

    <?php
    include_once "App\View\modals.php";
    ?>

    <!-- ******************************* -->

    <div id='response'></div>


    <script src="App\View\ajax.js"></script>
    <script>
        $(document).ready(function() {
            $("[name='insert']").click(function(e) {
                e.preventDefault()
                $('#ModalName').text("Add Modal");
                $("#name").val('');
                $("#surname").val('');
            });

        });

        $(document).ready(function() {
            $("[name='update']").click(function() {

                $('#ModalName').text("Edit Modal");
            });
        })

        $(document).ready(function() {
            $("[name='Close']").click(function() {

                $('#ModalName').text("Edit Modal");
            });
        })
    </script>
</body>

</html>