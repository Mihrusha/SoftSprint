//   ****************Insert and Edit*******************

$(document).ready(function () {

    $("[name='insert']").click(function (e) {
        e.preventDefault();
        $('#save').attr('name', 'submit');
        $('#ModalName').text("Add User");
        $("#save").html("Add");
        $("#name").val('');
        $("#surname").val('');
        $("#AddModal").modal('show');

    })


    $("[name='update']").click(function (e) {
        e.preventDefault();
        var id = [];
        $(".delete-id:checked").each(function () {
            id.push($(this).val());
            element = this;
        });

        $("#msg").empty();

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

    $("[name='Close']").click(function () {
        $('#ModalName').text("Edit User");
        $('#save').text("Edit");
        $("#msg").empty();

    });

    // *************INSERT***************
    $("#save").click(function (e) {
        if ($('#save').attr('name') == 'submit') {

            var name = $("#name").val();
            var surname = $("#surname").val();
            var role = $("#role").val();
            let status;
            //var status = $("#status").val();
            if (jQuery('input[name=status]').is(':checked')) {
                status = 1;
            } else status = 2;

            let url = 'insert.php';
            let Pass = 'App/Core/handler.php'
            let arr = [];
            $.ajax({
                method: "POST",
                url: url,
                data: {
                    insert: 'insert',
                    name: name,
                    surname: surname,
                    role: role,
                    status: status
                },
                success: function (data) {

                    if (data.includes('no name')) {
                        $("#msg").html("Please Give Name");

                    }
                    else if (data.includes('no surname')) {
                        $("#msg").html("Please Give Surname");

                    }
                    else if (data.includes('no users role')) {
                        $("#msg").html("Please Give Role");

                    }

                    else if (data.includes('user already exist')) {
                        $("#msg").html("This user already exist");

                    }
                    else
                    arr = JSON.parse(data);
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
                    const rowContent = `<tr>
        <td class="text-center align-middle"><div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
            <input type="checkbox" name="check" id="check" class="delete-id" value="">
        </div></td>
        <td class="text-center align-middle">${name} ${surname}</td>
        <td class="text-center align-middle">${str}</td>
        <td class="text-center align-middle">${role}</td>
        <td class="text-center align-middle"><div class="btn-group align-top">
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit' name='update'>Edit</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target="" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
        </div></td>
         </tr>`;
                    $("#someTable tbody").append(rowContent);

              
                
                        // $('#result').html(data);

                }

            })

            $("input#name").val('');
            $("input#surname").val('');

        }

        // *************EDIT***************
        else if ($('#save').attr('name') == 'save') {
            var id = $("input[name='userId']").val();
            var name = $("input[name='name']").val();
            var surname = $("input[name='surname']").val();
            var role = $('#role').val();
            let status;

            let Pass = 'App/Core/handler.php'

            if (jQuery('input[name=status]').is(':checked')) {
                status = 1;
            } else status = 2;
            t_id = $('#' + id);
            console.log(t_id);


            $.ajax({
                method: "POST",
                url: 'edit.php',
                data: {
                    edit: 'edit',
                    id: id,
                    name: name,
                    role: role,
                    surname: surname,
                    status: status
                },
                success: function (data) {

                    if (data.includes('no name')) {
                        $("#msg").html("Please Give Name");

                    }
                    else if (data.includes('no surname')) {
                        $("#msg").html("Please Give Surname");

                    }
                    else if (data.includes('no users role')) {
                        $("#msg").html("Please Give Role");

                    }

                    else if (data.includes('no id-new user')) {
                        $("#msg").html("This is new user cant change");

                    
                    } else
                    arr = JSON.parse(data);
                    var some_name = arr['user']['name'];
                    var some_surname = arr['user']['surname'];
                    var some_role = arr['user']['role'];
                    var some_status = arr['user']['status'];
                    var str = null;
                    if (some_status == 1) {
                        str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:green">'
                    } else if (some_status == 2) {
                        str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:grey">'
                    }
                    var rowContent = `<tr id='tr_info' >
            <td class="text-center align-middle"><div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                <input type="checkbox" name="check" id="check" class="delete-id" value="">
            </div></td>
            <td class="text-center align-middle">${some_name} ${some_surname}</td>
            <td class="text-center align-middle">${str}</td>
            <td class="text-center align-middle">${some_role}</td>
            <td class="text-center align-middle"><div class="btn-group align-top">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit' name='update'>Edit</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target="" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
            </div></td>
             </tr>`;
                    t_id = $('#' + id);

                    $(t_id).replaceWith(rowContent);
                }

            })

            $("input#name").val('');
            $("input#surname").val('');

        }


    })
    var status = [];
    $("[name='choose']").click(function () {
        status[0] = ($(this).val());
    });
    // *******************************
    $("[name='OK']").click(function (e) {
        e.preventDefault();
        var table = []
        var id = [];
        $(".delete-id:checked").each(function () {
            id.push($(this).val());
            table.push($(this).closest('tr'));
            element = this;
        });

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

            $("[name='massDel']").click(function () {
                var id = [];
                id = $('#deleteId').val();

                let Pass = 'App/Core/handler.php'

                $.ajax({
                    url:'delete.php',
                    type: 'post',
                    data: {
                        mass_delete: 'mass',
                        mass_id: id
                    },
                    success: function (response) {

                        $(table).each(function(key, value) {

                            value.remove()
                        })

                    },
                    error: function (response) {
                        $('#msg2').html('Not send');
                    }
                })
            })
        }

      
        // **********STATUS EDIT************
        if ((status == 1 || status == 2)) {
            $("#statusModal").modal('show');
            $("[name='StatusEdit']").click(function () {
                let id = [];
                id = $('#userId').val();

                var status = $("#Editstatus").val();

                let Pass = 'App/Core/handler.php'
                t_id = $('#' + id);

                if (status == 0 || status == undefined) {
                    $('#msg2').html("status' => false, 'error' => array('code' => '8', 'message' => 'please choose status'")
                }

                $.ajax({
                    url:'edit.php',
                    method: 'post',
                    data: {
                        edit_status: 'edit',
                        status: status,
                        id: id
                    },
                    success: function (data) {
                        arr = JSON.parse(data);
                        t_id = $('#' + id);
                        var t_name = $('#' + id).children('td[data-target=first_name]').text();
                        console.log(t_name);
                        var t_role = $('#' + id).children('td[data-target=role]').text();
                        console.log(t_role);
                        var some_status = arr['user']['status'];
                        var str = null;
                        if (some_status == 1) {
                            str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:green">'
                        } else if (some_status == 2) {
                            str = '<i class="fa-solid fa fa-circle  fa-2x " style="color:grey">'
                        }

                        var rowContent = `<td class="text-center align-middle">${str}</td>`

                        $(table).each(function(key, value) {

                            value.children('td:eq(2)').replaceWith(rowContent);
                        })
                    }
                })

            })
        }



    })

    $("[name='delete']").click(function () {

        var id = [];
        $(".delete-id:checked").each(function () {
            id.push($(this).val());
            element = this;
        });

        if (id == 0) {
            $("#DeleteMod").modal('show');
            return false;
        }


        if (id.length > 0) {
            $("#Delete_Mod").modal('show');

            var modalConfirm = function (callback) {

                $("#btn-confirm").on("click", function () {
                    $("#mi-modal").modal('show');
                });

                $("#modal-btn-yes").on("click", function () {
                    callback(true);
                    $("#mi-modal").modal('hide');
                });

                $("#modal-btn-no").on("click", function () {
                    callback(false);
                    $("#mi-modal").modal('hide');
                });
            };
            var currentRow = $(this).closest("tr")
            let Pass = 'App/Core/handler.php'
            modalConfirm(function (confirm) {
                if (confirm) {

                    $.ajax({
                        type: 'post',
                        url: 'delete.php',
                        data: {
                            delete: 'delete',
                            deleteId: id
                        },
                        success: function (result) {
                            currentRow.remove();

                        }
                    })
                } else {

                    return false;
                }
            });
        }
        return false;

    })

    $('#main_checkbox').click(function () {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function () {
            this.checked = checked;
        });
    })
    $("[name='check']").on('change', function () {
        $('#main_checkbox').not(this).prop('checked', false);
    });


    $("[name='check']").on('change', function () {
        var lenghtOfUnchecked = $("[name='check']:not(:checked)").length;


        if (lenghtOfUnchecked == 0) {
            $('#main_checkbox').not(this).prop('checked', true)
        }
    });

})


