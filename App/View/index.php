<?php

use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';

// echo $_POST['check'];


// $user = new User;

// $data = $user->GetAll();
if (isset($_GET['msg'])) {
    $message = "Some error occured please try after some time";
    echo $message;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="App\View\styles.css?v=5">
    <title>Document</title>
</head>




<body>
    <form action="" method="post" id="form">

        <div class=' container d-flex justify-content-center mt-2 mb-2'>

            <div class='row '>
                <div class='col-2'>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal">
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

        <!-- Central rable -->

        <div id='result' class="container mt-3">
            <table class="table table-bordered  table-responsive-sm ">

                <tr>

                    <th style="text-align:center"><label for="">Main Checkbox</label><input type="checkbox" name="main_checkbox" id="main_checkbox" onclick='selects()'></th>
                    <th style="text-align:center"> full name</th>
                    <th style="text-align:center">surname</th>
                    <th style="text-align:center">status</th>
                    <th style="text-align:center">role</th>
                    <th style="text-align:center">action</th>
                </tr>

                <?php foreach ($data as $row) { ?>

                    <tr>
                        <td style="text-align:center; width:100px"><input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                        </td> <!-- id='<?= $row['id']; ?>' -->
                        <td style="text-align:center"><?= $row['name'] ?></td>
                        <td style="text-align:center"><?= $row['surname'] ?></td>

                        <?php if ($row["status"] == 1) { ?>
                            <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
                        <?php } elseif ($row["status"] == 2) { ?>
                            <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x" style="color:red"></i></td>
                        <?php } else  echo '<td></td>'; ?>
                        <td style="text-align:center"><?= $row['role'] ?></td>
                        <td style="text-align:center">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit'>Edit</button>
                            <span style="font-size: 22px">
                                <!-- <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash fa-lg "></i></button> -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                            </span>

                        </td>
                    </tr>

                <?php  } ?>
            </table>
        </div>

        <!-- buttons 2 -->
        <div class=' container d-flex justify-content-center mt-2 mb-2'>

            <div class='row '>
                <div class='col-2'>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal">
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

    </form>
    <!-- Button trigger modal -->

    <!-- Modal 1-->
    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                            <p id="msg" style="background-color:lightcoral"></p>

                            <span id="error" style="display: none"></span>
                            <form action="javascript:void(0)" method="post" id="ajax-form">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" name="userId" id="userId" class="form-control" value="" maxlength="50">
                                    <input type="text" name="name" id="name" class="form-control" value="" maxlength="50">
                                </div>
                                <div class="form-group ">
                                    <label>Surname</label>
                                    <input type="text" name="surname" id="surname" class="form-control" value="" maxlength="30">
                                </div>
                                <div class='row mt-2 mb-2'>
                                    <div class='col-5'>
                                        <select class="form-select" aria-label="Default select example" id="role" name='role'>
                                            <option selected value="no">Set Role</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>

                                        </select>
                                    </div>
                                    <div class='col-5'>
                                        <label class="switch">
                                            <input type="checkbox" id="status" name='status'>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>


                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
                                <button type="submit" class="btn btn-danger" name="save" value="save">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>


    <!-- Modal Edit Status-->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Check</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>Do you realy want this action?</p>

                            <form action="javascript:void(0)" method="post" id="statusForm">
                                <div class="form-group">

                                    <input type="hidden" name="userId" id="userId" class="form-control" value="" maxlength="50">
                                </div>
                                <div class="form-group ">

                                    <input type="hidden" name="Editstatus" id="Editstatus" class="form-control" value="" maxlength="30">
                                </div>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit" value="Edit" id="action">Action</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!-- **********Modals for edit********  -->
    <div class="modal fade" id="editMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>You click Ok but not click checbox</p>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>


    <div class="modal fade" id="edit_Mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>You must choose status</p>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!-- ******************************* -->

    <!-- **********Modals for delete********  -->

    <div class="modal fade" id="DeleteMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete check 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>You must choose checkbox</p>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="Delete_Mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete check 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>Do you want delete person?</p>

                            <button type="button" class="btn btn-primary" id="modal-btn-yes">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-btn-no">Close</button>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!-- **************Mass Delet Modal************** -->

    <div class="modal fade" id="MassDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Check</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-offset-2">

                            <p>Do you realy want delete ?</p>

                            <form action="javascript:void(0)" method="post" id="MassDeleteForm">
                                <div class="form-group">

                                    <input type="hidden" name="deleteId" id="deleteId" class="form-control" value="" maxlength="50">
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit" value="Edit" id="action">Action</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!-- ******************************* -->



    <div id='response'></div>

    <script>
        //   ****************Insert and Edit*******************


        $(document).ready(function() {
            $(document).on('click', 'button#edit', function() {
                var id = [];
                $(".delete-id:checked").each(function() {
                    id.push($(this).val());
                    element = this;
                });


                var currentRow = $(this).closest("tr")
                var name = currentRow.find("td:eq(1)").text();


                var surname = currentRow.find("td:eq(2)").text();;
                var role = $("input#userRole").val();
                $('#userId').val(id);
                $("#name").val(name);
                $("#surname").val(surname);

            })


            let form = document.getElementById("ajax-form");
            form.addEventListener("submit", handleSubmit);

            function handleSubmit(event) {
                event.preventDefault()

                submitter = event.submitter.value
                switch (submitter) {
                    case "submit":

                        $('.btn-primary').click(function(e) {
                            e.preventDefault();
                            var name = $("#name").val();
                            var surname = $("#surname").val();
                            var role = $("#role").val();
                            let status;
                            //var status = $("#status").val();
                            if (jQuery('input[name=status]').is(':checked')) {
                                status = 1;
                            } else status = 2;

                            let url = 'App/View/insert.php'
                            let conUrl='App/Controller/Insert'
                            $.ajax({
                                method: "POST",
                                url: url,
                                data: {
                                    name: name,
                                    surname: surname,
                                    role: role,
                                    status: status
                                },
                                success: function(data) {

                                    if (data.includes('message')) {
                                        $("#msg").html(data);
                                    } else
                                        $("#msg").html(''),
                                        $('#result').load(url);

                                }

                            }).done(function(msg) {
                                $("#msg").html(msg);
                            });

                            $("input#name").val('');
                            $("input#surname").val('');

                        });

                        break;
                    case "save":

                        $(document).on('submit', '#ajax-form', function(e) {
                            e.preventDefault();
                            var id = $("input[name='userId']").val();
                            var name = $("input[name='name']").val();
                            var surname = $("input[name='surname']").val();
                            var role = $('#role').val();
                            let status;
                            let url = 'App/View/edit.php'

                            //var status = $("#status").val();
                            if (jQuery('input[name=status]').is(':checked')) {
                                status = 1;
                            } else status = 2;
                            $.ajax({
                                method: "POST",
                                url: url,
                                data: {
                                    id: id,
                                    name: name,
                                    role: role,
                                    surname: surname,
                                    status: status
                                },
                                success: function(data) {

                                    if (data.includes('message')) {
                                        $("#msg").html(data);
                                    } else
                                        $("#msg").html(''),
                                        $('#result').load(url);

                                }

                            }).done(function(msg) {
                                $("#msg").html(msg);
                            });



                        });
                        break;

                }

            }


        })

        //   ****************Edit Status*******************
        $(document).ready(function() {
            $(document).on('click', 'button#Ok', function() {

                let id = [];
                $(".delete-id:checked").each(function() {
                    id.push($(this).val());
                    element = this;
                });

                if (id == 0) {
                    $("#editMod").modal('show');
                    die;
                }

                let status = [];

                $("#choose").each(function() {
                    status.push($(this).val());
                    element = this;
                });


                if (status[0] == '0') {
                    $("#edit_Mod").modal('show');
                    die;
                }

                $('#userId').val(id);
                $('#deleteId').val(id);
                $("#Editstatus").val(status);


                if (status[0] == '3') {
                    $("#MassDeleteModal").modal('show');
                    die;
                } else
                    $("#statusModal").modal('show');
            })

        })

        $(function() {
            $('#statusForm').submit(function(e) {
                e.preventDefault();
                let id = [];
                id = $('#userId').val();

                var status = $("#Editstatus").val();
                let url = 'App/View/edit.php'
                let url2 = 'App/View/insert.php'


                $.ajax({
                    url: url,
                    method: 'post',
                    data: {

                        status: status,
                        id: id
                    },
                    success: function(response) {
                        //$("#response").html(response);
                        $('#result').load(url2);
                    }
                })
            })
        });

        //   ****************Mass Delete*******************

        $(function() {
            $('#MassDeleteForm').submit(function() {

                var id = [];
                id = $('#deleteId').val();
                var url = 'App/View/massDelete.php'
                //alert(id);
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {

                        mass_id: id
                    },
                    success: function(response) {

                        $('#result').load(url);
                        // alert('id')

                    },
                    error: function(response) {
                        alert('Not send');
                    }
                })
            })
        });



        // ************************************************



        //   ****************One Delete*******************
        $(document).ready(function() {

            $(document).on('click', 'button#delete', function() {
                let url = 'App/View/delete.php'
                var id = [];
                $(".delete-id:checked").each(function() {
                    id.push($(this).val());
                    element = this;
                });

                if (id == 0) {
                    $("#DeleteMod").modal('show');
                    die;
                }


                if (id.length > 0) {
                    $("#Delete_Mod").modal('show');

                    var modalConfirm = function(callback) {

                        $("#btn-confirm").on("click", function() {
                            $("#mi-modal").modal('show');
                        });

                        $("#modal-btn-yes").on("click", function() {
                            callback(true);
                            $("#mi-modal").modal('hide');
                        });

                        $("#modal-btn-no").on("click", function() {
                            callback(false);
                            $("#mi-modal").modal('hide');
                        });
                    };


                    modalConfirm(function(confirm) {
                        if (confirm) {

                            $.ajax({
                                type: 'post',
                                url: url,
                                data: {
                                    deleteId: id
                                },
                                success: function(result) {
                                    $("#result").load(url);

                                }
                            })
                        } else {

                            die;
                        }
                    });
                }
                return false;

            });

        })


        //Choose all checkboxes
        $(document).ready(function() {

            $('#main_checkbox').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
            $('#check').on('change', function() {
                $('#main_checkbox').not(this).prop('checked', false);
            });
            return false;
        });
    </script>

</body>

</html>