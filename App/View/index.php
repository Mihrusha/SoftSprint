<?php

use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';

// echo $_POST['check'];


$user = new User;

$data = $user->GetAll();

// if (isset($_POST['OK'])) {
//     //$user->Delete($_POST['check']);
//     $user->EditStatus($_POST['check']);
// }

// if (isset($_POST['edit'])) {
//     //$user->Delete($_POST['check']);
//     $user->Edit();
// }

// if (isset($_POST['delete'])) {
//     //$user->Delete($_POST['check']);
//     $user->delete($_POST['check']);
// }
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

    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" id="form">

        <div class=' container d-flex justify-content-center mt-2 mb-2'>

            <div class='row '>
                <div class='col-2'>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ADD
                    </button>

                </div>

                <div class='col-5'>
                    <select class="form-select" aria-label="Default select example" name='choose' id='choose'>
                        <option selected>Open this select menu</option>
                        <option value="1">Set Active</option>
                        <option value="2">Set Not Active</option>
                        <option value="3">Delite</option>
                    </select>
                </div>
                <div class='col'>

                    <button type="submit" class="btn btn-danger" type="button" name="OK" value="OK" id="Ok">OK</button>
                </div>


            </div>

        </div>

        <!-- Central rable -->

        <div id='result'>
            <table class="table table-bordered table">

                <tr>

                    <th><input type="checkbox" name="main_checkbox" id="main_checkbox" onclick='selects()'>Main CheckBox</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>status</th>
                    <th>role</th>
                    <th>action</th>
                </tr>

                <?php foreach ($data as $row) { ?>

                    <tr>
                        <td><input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                            <?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['surname'] ?></td>
                        <?php if ($row["status"] == 1) { ?>
                            <td><img src="https://img.icons8.com/fluency/48/000000/toggle-on.png"></td>
                        <?php } elseif ($row["status"] == 2) { ?>
                            <td><img src="https://img.icons8.com/fluency/48/000000/toggle-off.png"></td>
                        <?php } else  echo '<td></td>'; ?>
                        <td><?= $row['role'] ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2">Edit</button>
                            <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                <?php  } ?>
            </table>
        </div>
    </form>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>Please fill all fields in the form</p>
                            <p id="show_message" style="display: none">Form data sent. Thanks for your comments. </p>
                            <span id="error" style="display: none"></span>
                            <form action="javascript:void(0)" method="post" id="ajax-form">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="" maxlength="50">
                                </div>
                                <div class="form-group ">
                                    <label>Surname</label>
                                    <input type="text" name="surname" id="surname" class="form-control" value="" maxlength="30">
                                </div>
                                <div class='col-6'>
                                    <select class="form-select" aria-label="Default select example" id="select" name='select'>
                                        <option selected>Open this select menu</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>

                                    </select>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>Please fill all fields in the form</p>
                            <p id="show_message" style="display: none">Form data sent. Thanks for your comments. </p>
                            <span id="error" style="display: none"></span>
                            <form action="javascript:void(0)" method="post" id="ajax-form">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="" maxlength="50">
                                </div>
                                <div class="form-group ">
                                    <label>Surname</label>
                                    <input type="text" name="surname" id="surname" class="form-control" value="" maxlength="30">
                                </div>
                                <div class='col-6'>
                                    <select class="form-select" aria-label="Default select example" id="select" name='select'>
                                        <option selected>Open this select menu</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>

                                    </select>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit" value="edit">EDIT</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <div id='response'></div>

    <script>
        //send and get function
        $(function() {
            $('#ajax-form').submit(function(e) {
                e.preventDefault();
                var name = $("input#name").val();
                var surname = $("input#surname").val();
                var role = $("input#select").val();
                var check = $("input#check").val();
                var OkBtn = $("input#OK").val();
                $.ajax({
                    type: 'post',
                    url: 'load_users.php',
                    data: $(this).serialize(),
                    success: function(result) {
                        //     $("#result").html(result);

                        $("#result").load("load_users.php"), {

                        }

                    }
                });
                $("input#surname").val('');
                $("input#name").val('');

            });
            return false;
        });

        //Choose all checkboxes
        $(document).ready(function() {
            $('#main_checkbox').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
        });


        // Edit Status function - work not right, must to find why
        $("button#Ok").click(function() {
            // alert('Hello');

            var id = [];
            var status;
            $(".delete-id:checked").each(function() {
                id.push($(this).val());
                element = this;
            });


            status = ($('#choose').val());


            if (id.length > 0) {

                $.ajax({
                    url: "edit.php",
                    type: "POST",
                    cache: false,
                    data: {
                        deleteId: id,
                        select: status
                    },
                    success: function(result) {
                        //     $("#result").html(result);

                        $("#result").load("load_users.php"), {

                        }

                    }
                });

            }
            return false;
        });
        // Delete function
        $("button#delete").click(function() {

            var id = [];
            $(".delete-id:checked").each(function() {
                id.push($(this).val());
                element = this;
            });

            if (id.length > 0) {
                $.ajax({
                    type: 'post',
                    url: 'load_users.php',
                    data: {
                        deleteId: id,

                    },
                    success: function(result) {
                        //     $("#result").html(result);

                        $("#result").load("load_users.php"), {

                        }

                    }
                });

                return false;
            };
            

        });
    </script>

</body>

</html>