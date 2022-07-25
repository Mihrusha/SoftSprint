     //   ****************Insert and Edit*******************


     $(document).ready(function() {
        

        $(document).on('click', 'button#edit', function() {
            
            var id = [];
            $(".delete-id:checked").each(function() {
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
                            success: function(data) {

                                if (data.includes('message')) {
                                    $("#msg").html(data);
                                } else
                                    $("#msg").html(''),
                                    $('#result').load(Pass);
                                //alert('Send')
                            }

                        }).done(function(msg) {
                            $("#msg").html(msg);
                            
                        });
                        
                        $("input#name").val('');
                        $("input#surname").val('');

                    })

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
                        let Pass = 'App/Core/handler.php'
                        //var status = $("#status").val();
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
                            success: function(data) {

                                if (data.includes('message')) {
                                    $("#msg").html(data);
                                } else
                                    $("#msg").html(''),
                                    $('#result').load(Pass);

                            }

                        }).done(function(msg) {
                            $("#msg").html(msg);
                        });

                        $("input#name").val('');
                        $("input#surname").val('');
                    })
                    break;

            }

        }

    });

    //   ****************Edit Status*******************
    $(document).ready(function() {

        let status;
        $("[name='choose']").change(function() {
            status = $(this).val();
        });

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


            $('#userId').val(id);
            $('#deleteId').val(id);
            $("#Editstatus").val(status);

           
            if (status == '3') {
                $("#MassDeleteModal").modal('show');
                die;
            } 
            
            if (status<1||status==null||status==undefined)
            {
                $("#edit_Mod").modal('show');
                die;
            }
            
            else
                $("#statusModal").modal('show');
        })

    });

    $(function() {
        $('#statusForm').submit(function(e) {
            e.preventDefault();
            let id = [];
            id = $('#userId').val();

            var status = $("#Editstatus").val();
            let url = 'App/View/edit.php'
            let url2 = 'App/View/insert.php'
            let Pass = 'App/Core/handler.php'

            $.ajax({
                url: Pass,
                method: 'post',
                data: {
                    edit_status: 'edit',
                    status: status,
                    id: id
                },
                success: function(response) {
                    //$("#response").html(response);
                    $('#result').load(Pass);
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
            let Pass = 'App/Core/handler.php'

          
            $.ajax({
                url: Pass,
                type: 'post',
                data: {
                    mass_delete: 'mass',
                    mass_id: id
                },
                success: function(response) {

                    $('#result').load(Pass);
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

                let Pass = 'App/Core/handler.php'
                modalConfirm(function(confirm) {
                    if (confirm) {

                        $.ajax({
                            type: 'post',
                            url: Pass,
                            data: {
                                delete: 'delete',
                                deleteId: id
                            },
                            success: function(result) {
                                $("#result").load(Pass);

                            }
                        })
                    } else {

                        die;
                    }
                });
            }
            return false;

        });

    });

    
   
    //Choose all checkboxes
    $(document).ready(function() {

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

        
        if(lenghtOfUnchecked==0)
        {
            $('#main_checkbox').not(this).prop('checked', true)
        }
        });
   
    });