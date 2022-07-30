//   ****************Insert and Edit*******************

$(document).ready(function () {

    

    $("[name='insert']").click(function (e) {
        e.preventDefault();
        $('#save').attr('name', 'submit');
        $('#ModalName').text("Add User");
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

            let url = 'App/View/insert.php';
            let Pass = 'App/Core/handler.php'

            $.ajax({
                method: "POST",
                url: Pass,
                data: {
                    insert: 'insert',
                    name: name,
                    surname: surname,
                    role: role,
                    status: status
                },
                success: function (data) {

                    if (data.includes('message')) {
                        $("#msg").html(data);
                    } else
                        $("#msg").html(''),
                            $('#result').load(Pass);

                }

            }).done(function (msg) {
                $("#msg").html(msg);

            });

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
            $.ajax({
                method: "POST",
                url: Pass,
                data: {
                    edit: 'edit',
                    id: id,
                    name: name,
                    role: role,
                    surname: surname,
                    status: status
                },
                success: function (data) {

                    if (data.includes('message')) {
                        $("#msg").html(data);
                    } else
                        $("#msg").html(''),
                            $('#result').load(Pass);

                }

            }).done(function (msg) {
                $("#msg").html(msg);
            });

            $("input#name").val('');
            $("input#surname").val('');

        }


    })
    var status=[];
    $("[name='choose']").click(function () {
        status[0]=( $(this).val());
    });
    // *******************************
    $("[name='OK']").click(function (e) {
        e.preventDefault();
        var id = [];
        $(".delete-id:checked").each(function () {
            id.push($(this).val());
            element = this;
        });
        

   

        $('#msg2').html('');

        if (id == 0)  {
            $("#CheckboxCheck").modal('show');
            return false;
        }

        // if(status==undefined){
        //     status=0;
        // }
        console.log(status)

        $('#userId').val(id);
        $('#deleteId').val(id);
        $("#Editstatus").val(status);

        if((status < 1 || status == null || status == undefined)) {
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
                    url: Pass,
                    type: 'post',
                    data: {
                        mass_delete: 'mass',
                        mass_id: id
                    },
                    success: function (response) {

                        $('#result').load(Pass);
                        // alert('id')

                    },
                    error: function (response) {
                        $('#msg2').html('Not send');
                    }
                })
            })
        }

        console.log(id);

        

        // **********STATUS EDIT************
         if((status == 1 || status == 2) ) {
            $("#statusModal").modal('show');
            $("[name='StatusEdit']").click(function () {
                let id = [];
                id = $('#userId').val();

                var status = $("#Editstatus").val();

                let Pass = 'App/Core/handler.php'

                if(status==0||status==undefined){
                    $('#msg2').html("status' => false, 'error' => array('code' => '8', 'message' => 'please choose status'")
                }

                $.ajax({
                    url: Pass,
                    method: 'post',
                    data: {
                        edit_status: 'edit',
                        status: status,
                        id: id
                    },
                    success: function (response) {
                        //$("#response").html(response);
                        $('#result').load(Pass);
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

            let Pass = 'App/Core/handler.php'
            modalConfirm(function (confirm) {
                if (confirm) {

                    $.ajax({
                        type: 'post',
                        url: Pass,
                        data: {
                            delete: 'delete',
                            deleteId: id
                        },
                        success: function (result) {
                            $("#result").load(Pass);

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


