
   $(document).ready(function($) {
    // hide messages 
    $("#error").hide();
    $("#show_message").hide();
    // on submit...
    $('#ajax-form').submit(function(e) {
        e.preventDefault();
        $("#error").hide();
        //name required
        var name = $("input#name").val();
        if (name == "") {
            $("#error").fadeIn().text("Name required.");
            $("input#name").focus();
            return false;
        }
        // surname required
        var surname = $("input#surname").val();
        if (surname == "") {
            $("#error").fadeIn().text("Surname required");
            $("input#surname").focus();
            return false;
        }
        var role = $("input#select").val();
        if (role == "") {
            $("#error").fadeIn().text("role required");
            $("input#select").focus();
            return false;
        }

        // ajax
        $.ajax({
            type: "POST",
            url: "index.php",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(result) {
                $("#show_message").fadeIn();
                //$("#ajax-form").fadeOut();
                
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

$(document).ready(function() {
    $('#main_checkbox').click(function() {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function() {
        this.checked = checked;
    });
    })
});

$(document).ready(function(){

    var Count=2;
   
        $(button).click(function()
        {
             Count=Count+2
            $('#result').load("load_users.php",{
                newCount:Count
            });
        });
 
});
