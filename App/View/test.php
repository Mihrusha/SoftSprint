<?php

use App\Model\User;

session_start();

$var1 = $_POST['name'];
$var2 = $_POST['surname'];
$var3 = $_POST['select'];
echo $_SESSION['name'],$_SESSION['surname'],$var3;


 

$_SESSION['name']=$var1;
$_SESSION['surname']=$var2;

$user = new User;
$user->name=$_SESSION['name'];
$user->surname=$_SESSION['surname'];
$user->Insert();


?>
 <!-- <script>
$('#modal').on('submit', function() {

$.ajax({
    method: 'post',
    url: 'App/View/index.php',
    data: $(this).serialize(),
    dataType: 'html',
    success: function(data) {
        $('#msg').html(data);
    }
})
return false;
})


$('#form').on('submit', function() {

$.ajax({
    method: 'post',
    url: 'App/View/index.php',
    data: $(this).serialize(),
    dataType: 'html',
    success: function(data) {
        $('#msg').html(data);
    }
})
return false;
})
   </script> -->