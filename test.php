<?php

use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';

// echo $_POST['check'];


 $user = new User;

// $data = $user->GetAll();
$name=$_POST['name'];
if(isset ($_POST['submit'])){
    $user->Insert($name,1,1,1,1);
}


?>

<html lang="en">

<form action="">

<input type="name" name="name">
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($_GET['error']); ?>
        </div>
    <?php } ?>

    <input type="submit" name='submit'>send

</form>


</body>

</html>