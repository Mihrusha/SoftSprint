
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

       

        // ajax
        $.ajax({
            type: "POST",
            url: "index.php",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function() {
                $("#show_message").fadeIn();
                //$("#ajax-form").fadeOut();
            }
        });
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