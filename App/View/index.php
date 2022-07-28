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


    <form action="" method="post" id="form">

        <ul class="nav justify-content-center mt-2">
            <li class="nav-item m-2">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" id="AddMain" name='insert' id='insert'>
                    ADD
                </button>
            </li>
            <li class="nav-item m-2">
                <select class="form-select" aria-label="Default select example" name='choose' id='choose'>
                    <option selected value="0">Select Activity Status</option>
                    <option value="1">Set Active</option>
                    <option value="2">Set Not Active</option>
                    <option value="3">Delete</option>
                </select>
            </li>
            <li class="nav-item m-2">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="OK" value="OK" id="Ok">OK</button>
            </li>

        </ul>


        <div class=' container d-flex justify-content-center mt-2 mb-2'>

            <!-- Central rable -->

            <div id='result' class="container mt-3">
                <table class="table table-bordered  table-responsive-sm ">

                    <tr>
                        <th style="text-align:center"><label for="">Main Checkbox</label><input type="checkbox" name="main_checkbox" id="main_checkbox"></th>
                        <th style="text-align:center"> full name</th>
                        <th style="text-align:center">status</th>
                        <th style="text-align:center">role</th>
                        <th style="text-align:center">action</th>
                    </tr>

                    <?php foreach ($data as $row) { ?>

                        <tr>
                            <td style="text-align:center; width:100px"><input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                            </td> <!-- id='<?= $row['id']; ?>' -->
                            <td style="text-align:center"><?= $row['name'] ?> <?= $row['surname'] ?></td>
                            <!-- <td style="text-align:center"></td> -->

                            <?php if ($row["status"] == 1) { ?>
                                <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
                            <?php } elseif ($row["status"] == 2) { ?>
                                <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x" style="color:grey"></i></td>
                            <?php } else  echo '<td></td>'; ?>
                            <td style="text-align:center"><?= $row['role'] ?></td>
                            <td style="text-align:center">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit' name='update'>Edit</button>
                                <span style="font-size: 22px">
                                    <!-- <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash fa-lg "></i></button> -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                                </span>

                            </td>
                        </tr>

                    <?php  } ?>
                </table>
            </div>
        </div>
        <!-- buttons 2 -->

        <ul class="nav justify-content-center mt-2">
            <li class="nav-item m-2">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" id="AddMain" name='insert' id='insert'>
                    ADD
                </button>
            </li>
            <li class="nav-item m-2">
                <select class="form-select" aria-label="Default select example" name='choose' id='choose'>
                    <option selected value="0">Select Activity Status</option>
                    <option value="1">Set Active</option>
                    <option value="2">Set Not Active</option>
                    <option value="3">Delete</option>
                </select>
            </li>
            <li class="nav-item m-2">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="OK" value="OK" id="Ok">OK</button>
            </li>

        </ul>
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
                $(".btn-primary").attr("value", "submit");
                // alert($(".btn-primary").val());
                e.preventDefault()
                $('#ModalName').text("Add User");
                $("#name").val('');
                $("#surname").val('');
            });

        });

        $(document).ready(function() {
            $("[name='update']").click(function() {

                $('#ModalName').text("Edit User");
            });
        })

        $(document).ready(function() {
            $("[name='Close']").click(function() {

                $('#ModalName').text("Edit User");
                $("#msg").empty();
            });
        })
    </script>

</body>

</html>