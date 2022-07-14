<?php

use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';


//echo $_SESSION['name'],$_SESSION['surname'],$var3;
$user = new User;
// $_SESSION['name'] = $var1;
// $_SESSION['surname'] = $var2;
$data = $user->GetAll();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>

</head>

<body>

<div class=' container d-flex justify-content-center'>
    
        <div class='row '>
            <div class='col-2'>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    ADD
                </button>

            </div>
            
                <div class='col-5'>
                    <select class="form-select" aria-label="Default select example" name='choose'>
                        <option selected>Open this select menu</option>
                        <option value="1">Set Active</option>
                        <option value="2">Set Not Active</option>
                        <option value="3">Delite</option>
                    </select>
                </div>
                <div class='col'>
                    <!-- <input type="hidden" name='check' value = '<?= $row['id'] ?>'> -->
                    <input type="submit" class="btn btn-danger" name="OK">
                </div>
           

        </div>

    </div>

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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

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
                    <td><input type="checkbox" name="check" id="check" value="<?= $row['id'] ?>">
                        <?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['surname'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td></td>
                </tr>

            <?php  } ?>
        </table>
    </div>


    <script>
        $(function() {
            $('#ajax-form').submit(function(e) {
                e.preventDefault();
                var name = $("input#name").val();
                var surname = $("input#surname").val();
                var role = $("input#select").val();
                
                $.ajax({
                    type: 'post',
                    url: 'load_users.php',
                    data:$(this).serialize(), 
                    success: function(result) {
                        //     $("#result").html(result);
                        
                            
                            $("#result").load("load_users.php"), {
                                
                            }
                        
                    }
                });
                $("input#surname").val('');
                $("input#name").val('');

            });
            // return false;
        });

        // $(document).ready(function() {
        //     var textCount = 2;
        //     $("submit").click(function() {
        //         textCount += 2;
        //         $("#result").load("load_users.php"), {
        //             NewText: textCount
        //         }
        //     })
        // })
    </script>
</body>

</html>