<?php

use App\Model\User;

include_once 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
// $user = new User;
// $data = $user->GetAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="App\View\styles.css">
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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target="" name="OK" value="OK" id="OK">OK</button>
                                        </li>
                                    </ul>
                                    <div class=' container d-flex justify-content-center mt-2 mb-2'>

                                        <!-- Central rable -->

                                        <div id='result' class="container mt-3">
                                            <table class="table table-bordered  table-responsive-sm " id='someTable'>
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
                                                        <tr id='<?php echo $row['id']; ?>'>
                                                            <td class="text-center align-middle" data-id='<?php echo $row['id']; ?>'><?php echo $row['id']; ?>
                                                                <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                    <input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                                                                </div>
                                                            </td>
                                                            <td class="text-center align-middle" data-target="first_name"><?= $row['name'] ?> <?= $row['surname'] ?></td>

                                                            <?php if ($row["status"] == 1) { ?>

                                                                <td class="text-center align-middle" data-target="status"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
                                                            <?php } elseif ($row["status"] == 2) { ?>
                                                                <td class="text-center align-middle" data-target="status"><i class="fa-solid fa fa-circle  fa-2x" style="color:grey"></i></td>
                                                            <?php } else  echo '<td></td>'; ?>
                                                            <td class="text-center align-middle" data-target="role"><?= $row['role'] ?></td>
                                                            <td class="text-center align-middle">
                                                                <div class="btn-group align-top">
                                                                    <div></div><button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="" data-role='update' id='edit' name='update' data-id="<?= $row['id']; ?>">Edit</button>
                                                                    <!-- <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash fa-lg "></i></button> -->
                                                                    <button type="button" class="btn btn-warning" data-bs-toggle="" data-bs-target="" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php  } ?>
                                                </tbody>
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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target="" name="OK" value="OK" id="OK">OK</button>
                                        </li>
                                    </ul>
                                </form>
                                <!-- Modals -->

                                <?php
                                include_once "modals.php";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= include_once "modals.php" ?>


    <script>
        $(document).ready(function() {

            // $("#someTable td").on("click", function() {
            //     var dataId = $(this).attr("data-id");
            //     alert("The data-id of clicked item is: " + dataId);
            // });
            var new_id = 0;

            $("[name='insert']").click(function(e) {
                e.preventDefault();
                $('#save').attr('name', 'submit');
                $('#ModalName').text("Add User");
                $("#save").html("Add");
                $("#name").val('');
                $("#surname").val('');
                $("#AddModal").modal('show');
            })


            $("[name='update']").click(function(e) {
                e.preventDefault();
                var id = [];
                $(".delete-id:checked").each(function() {
                    id.push($(this).val());
                    element = this;
                });


                $("#msg").empty();
                // if (id == 0) {
                //     $("#CheckboxCheck").modal('show');
                // } else
                var currentRow = $(this).closest("tr")

                var surname = currentRow.find("td:eq(1)").text();
                let surArr = surname.split(" ");
                var role = $("input#userRole").val();
                $('#userId').val(id);
                $("#name").val(surArr[0]);
                $("#surname").val(surArr[1]);
                $('#save').attr('name', 'save');
                $("#AddModal").modal('show');

            })

            $("[name='Close']").click(function() {

                $('#ModalName').text("Edit User");
                $('#save').text("Edit");
                $("#msg").empty();

            });
            // ******************INSERT********************
            $(document).on('click', '#save', function(event) {

                if ($('#save').attr('name') == 'submit') {
                    var name = $("#name").val();
                    var surname = $("#surname").val();
                    var role = $("#role").val();
                    let status;
                    //var status = $("#status").val();
                    if (jQuery('input[name=status]').is(':checked')) {
                        status = 1;
                    } else status = 2;

                    var len = $('#someTable tr').length;
                    var lastRow = $('#someTable tr').eq(len - 1);

                    var last_id = lastRow.attr("id")
                    // console.log(last_id);

                    new_id = last_id

                    url = 'insert.php';
                    new_url = 'App/View/Connector.php';
                    let arr = [];
                    $.ajax({
                        method: "POST",
                        url: new_url,
                        data: {
                            insert: 'insert',
                            name: name,
                            surname: surname,
                            role: role,
                            status: status
                        },
                        success: function(data) {

                            if (data.includes('Must write a name')) {
                                $("#msg").html("Please Give Name");

                            }

                            if (data.includes('Must write a surname')) {
                                $("#msg").html("Please Give Surname");

                            }

                            if (data.includes('Must choose a role')) {
                                $("#msg").html("Please choose role");

                            }

                            if (data.includes('User already exist')) {
                                $("#msg").html("User already exist");

                            } else

                              

                            arr = JSON.parse(data);
                            if (arr['user']==undefined)  {
                                return;
                            }
                            $("#msg").html("User" + " " + arr['user']['name'] + " " + arr['user']['surname'] + " " + "added");
                            new_id = arr['user']['id'];

                            var name = (arr['user']['name']).toString();
                            var surname = arr['user']['surname'].toString();
                            var role = arr['user']['role'].toString();
                            var status = arr['user']['status'].toString();
                            var str = null;
                            if (status == 1) {
                                str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:green">'
                            } else if (status == 2) {
                                str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:grey">'
                            }
                            
                            const rowContent = 
                 '<tr id="' + new_id[0]["id"] + '">'
                +'<td class="text-center align-middle" data-id="' + new_id[0]["id"] + '"><div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">'
                +'     <input type="checkbox" name="check" id="check" class="delete-id" value="">'
                +'</div></td>'
                +'<td class="text-center align-middle">'+ name + ' ' + surname +'</td>'
                +'<td class="text-center align-middle">'+str+'</td>'
                +'<td class="text-center align-middle">'+role+'</td>'
                +'<td class="text-center align-middle"><div class="btn-group align-top">'
                    +'<button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role="update" id="edit" name="update" data-id="'+new_id[0]["id"]+'">Edit</button>'
                    +'<button type="button" class="btn btn-warning" data-bs-toggle="" data-bs-target="" name="delete" id="delete" value="delete" data-id="'+new_id[0]["id"]+'"><i class="fa fa-trash fa-lg "></i></button>'
                    +'</div></td>'
                    +'</tr>';
                    
                    var change = $(rowContent).on('click', '#edit', function() {


                                var currentRow = $(this).closest("tr")

                                var surname = currentRow.find("td:eq(1)").text();
                                let surArr = surname.split(" ");
                                var role = $("input#userRole").val();
                                $('#userId').val(new_id[0]['id']);
                                $("#name").val(surArr[0]);
                                $("#surname").val(surArr[1]);
                                $('#' + id).children('td[data-target=first_name]').text(name + " " + surname);
                                $('#' + id).children('td[data-target=status]').replaceWith(`<td class="text-center align-middle">${str}</td>`);
                                $('#' + id).children('td[data-target=role]').text(role);
                                $('#save').attr('name', 'save');
                                $("#AddModal").modal('show');
                                
                            })
                            $("#someTable tbody").append(change);
                          
                        }

                    })

                    $("input#name").val('');
                    $("input#surname").val('');

                }



                // *************EDIT***************
                else if ($('#save').attr('name') == 'save') {
                    
                    var id = $('#userId').val();
                    var name = $("#name").val();
                    var surname = $("#surname").val();
                    var role = $("#role").val();
                    let status;
                    //var status = $("#status").val();
                    if (jQuery('input[name=status]').is(':checked')) {
                        status = 1;
                    } else status = 2;


                    if (id == 0 || undefined) {
                        id = $(this).attr('data-id');
                    }
                    // console.log(last_id);
                    currentRow = $(this).closest("tr")
                    var t_id = $('#' + id);
                    url = 'insert.php';
                    new_url = 'App/View/Connector.php';
                    let arr = [];
                    $.ajax({
                        method: "POST",
                        url: new_url,
                        data: {
                            edit: 'edit',
                            id: id,
                            name: name,
                            role: role,
                            surname: surname,
                            status: status
                        },
                        success: function(data) {

                            if (data.includes('Must write a name')) {
                                $("#msg").html("Please Give Name");

                            }

                            if (data.includes('Must write a surname')) {
                                $("#msg").html("Please Give Surname");

                            }

                            if (data.includes('Must choose a role')) {
                                $("#msg").html("Please choose role");

                            } else

                                arr = JSON.parse(data);
                            $("#msg").html("User" + " " + arr['user']['name'] + " " + arr['user']['surname'] + " " + "added");
                            new_id = arr['user']['id'];

                            var name = arr['user']['name'];
                            var surname = arr['user']['surname'];
                            var role = arr['user']['role'];
                            var status = arr['user']['status']
                            var str = null;
                            if (status == 1) {
                                str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:green">'
                            } else if (status == 2) {
                                str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:grey">'
                            }

                            $('#' + id).children('td[data-target=first_name]').text(name + " " + surname);
                            $('#' + id).children('td[data-target=status]').replaceWith(`<td class="text-center align-middle">${str}</td>`);
                            $('#' + id).children('td[data-target=role]').text(role);
                            
                        }

                    })

                    $("input#name").val('');
                    $("input#surname").val('');

                }



            })

            // *****************DELETE*********************


            $(document).on('click', ".btn-warning", function(event) {
                event.preventDefault()
                // jQuery(this).parent().parent().parent().remove();
                // return false;

                var id = [];
                $(".delete-id:checked").each(function() {
                    id.push($(this).val());
                    element = this;
                });
                currentRow = $(this).closest("tr")
                // len = $('#someTable tr').length;
                // lastRow = $('#someTable tr').eq(len - 1);
                // last_id = $(lastRow).attr("id")
                //     ++last_id;

                $('body').on('click', '.checkbox', function(e) {

                    if (!$(this).is(':checked')) {
                        $("#DeleteMod").modal('show');
                    }
                })

                // if ((id == 0)) {
                //     $("#DeleteMod").modal('show');
                //     return false;
                // }

                id = $(this).attr('data-id');

                $('#oneDel').val(id);
                if (id > 0) {
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

                    let Pass = 'App/View/Connector.php'
                    modalConfirm(function(confirm) {
                        if (confirm) {
                            id = parseInt(id);
                            console.log(id);
                            $.ajax({
                                type: 'post',
                                url: Pass,
                                data: {
                                    delete: 'delete',
                                    deleteId: id
                                },
                                success: function(result) {
                                    currentRow.remove();

                                }
                            })


                        }

                    });

                    // jQuery(this).parent().parent().parent().remove()
                    //                 return false
                }


            })

            //*****************/ EDIT STATUS****************

           

            var status = [];
            $("[name='choose']").click(function() {
                status[0] = ($(this).val());
            });




            // *******************************
            $("[name='OK']").click(function(e) {
                e.preventDefault();


                var table = []
                var id = [];

                $(".delete-id:checked").each(function() {

                    id.push($(this).val());
                    table.push($(this).closest('tr'));
                    element = this;
                });

                alert(id);



                $('#msg2').html('');

                if (id == 0) {
                    $("#CheckboxCheck").modal('show');
                    return false;
                }

                // if(status==undefined){
                //     status=0;
                // }


                $('#userId').val(id);
                $('#deleteId').val(id);
                $("#Editstatus").val(status);

                if ((status < 1 || status == null || status == undefined)) {
                    $("#SelectCheck").modal('show');

                }

                // **********MASS DELETE************
                else if ((id != 0 && status == 3)) {

                    $("#MassDeleteModal").modal('show');

                    $("[name='massDel']").click(function() {
                        var id = [];
                        id = $('#deleteId').val();

                        let Pass = 'App/View/Connector.php'

                        $.ajax({
                            url: Pass,
                            type: 'post',
                            data: {
                                mass_delete: 'mass',
                                mass_id: id
                            },
                            success: function(response) {

                                $(table).each(function(key, value) {

                                    value.remove()
                                })

                            },
                            error: function(response) {
                                $('#msg2').html('Not send');
                            }
                        })
                    })
                }


                // **********STATUS EDIT************

                if ((status == 1 || status == 2)) {
                    $("#statusModal").modal('show');
                    $(document).on('click', "[name='StatusEdit']", function() {
                        let id = [];
                        id = $('#userId').val();

                        var status = $("#Editstatus").val();
                        let Pass = 'App/View/Connector.php'
                        t_id = $('#' + id);

                        if (status == 0 || status == undefined) {
                            $('#msg2').html("status' => false, 'error' => array('code' => '8', 'message' => 'please choose status'")
                        }

                        $.ajax({
                            url: Pass,
                            type: 'post',
                            data: {
                                edit_status: 'edit',
                                status: status,
                                id: id
                            },
                            success: function(data) {
                                console.log(id);
                                arr = JSON.parse(data);
                                t_id = $('#' + id);
                                var t_name = $('#' + id).children('td[data-target=first_name]').text();

                                var t_role = $('#' + id).children('td[data-target=role]').text();

                                var some_status = arr['user']['status'];
                                var str = null;
                                if (some_status == 1) {
                                    str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:green">'
                                } else if (some_status == 2) {
                                    str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:grey">'
                                }

                                var rowContent = `<td class="text-center align-middle">${str}</td>`


                                $(table).each(function(key, value) {

                                    value.children('td[data-target=status]').replaceWith(`<td class="text-center align-middle">${str}</td>`);
                                })
                                // $('#' + id).children('td[data-target=status]').replaceWith(`<td class="text-center align-middle">${str}</td>`);

                            }

                        })

                    })
                }



            })
            $('#main_checkbox').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
            $("[name='check']").on('change', function() {
                $('#main_checkbox').not(this).prop('checked', false);
            });


            $("[name='check']").on('change', function() {
                var lenghtOfUnchecked = $("[name='check']:not(:checked)").length;


                if (lenghtOfUnchecked == 0) {
                    $('#main_checkbox').not(this).prop('checked', true)
                }
            });


        })
    </script>


</body>