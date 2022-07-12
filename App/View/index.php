<?php

use App\Model\User;

// session_start();


$var1 = $_POST['name'];
$var2 = $_POST['surname'];
$var3 = $_POST['select'];
//echo $_SESSION['name'],$_SESSION['surname'],$var3;




// $_SESSION['name'] = $var1;
// $_SESSION['surname'] = $var2;

$user = new User;
$user->name = $var1;
$user->surname = $var2;
if (isset($_POST['name'])) {
    $user->Insert();
}
$data = $user->GetAll();
//var_dump($data);
// $user->surname=$_SESSION['surname'];
// if($_POST['name'])
// $user->Insert();


foreach ($data as $row) {
    echo $row['name'] . "<br>";
}

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div class=' container d-flex justify-content-center'>

        <div class='row '>
            <div class='col-3'>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    ADD
                </button>

            </div>
            <div class='col-6'>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">Set Active</option>
                    <option value="2">Set Not Active</option>
                    <option value="3">Delite</option>
                </select>
            </div>
            <div class='col'>
                <button type="button" class="btn btn-danger">OK</button>
            </div>
        </div>

    </div>

    <!-- Central rable -->

    <table class="table table-bordered table">
        
            <tr>
            
                <th><input type="checkbox" name="main_checkbox" id="main_checkbox"onclick='selects()'>Main CheckBox</th>
                <th>name</th>
                <th>surname</th>
                <th>status</th>
                <th>role</th>
            </tr>
            <?php foreach ($data as $row) { ?>
            <tr>
                <td><input type="checkbox" name="<?= $row['id']?>" id="check"></td>
                <td><?= $row['name']?></td>
                <td><?= $row['surname']?></td>
                <td></td>
                <td></td>
            </tr>


        <?php  } ?>
    </table>

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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="submit" value="submit">
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <script type="text/javascript" src="App\View\form.js">
    </script>
    

</body>

</html>