<?php

use App\Model\User;


include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';

$user=new User;
//$arr[]=($_POST);
//var_dump($arr);


if (isset($_POST['name'])) {
    $user->name = $_POST['name'];
$user->surname = $_POST['surname'];
$user->role = $_POST['select'];
    $user->Insert();
}
   $data = $user->GetAllLim();

   if (isset($_POST['OK'])) {
  
    $user->status = $_POST['choose'];
    //$user->Delete($_POST['check']);
    $user->EditStatus($_POST['check']);
}

//    if (isset($_POST['name'])) {
//     $user->name = $_POST['name'];
// $user->surname = $_POST['surname'];
// $user->role = $_POST['select'];
//     $user->Edit();
// }   
?>
<table class="table table-bordered table">

<tr>

    <th><input type="checkbox" name="main_checkbox" id="main_checkbox" onclick='selects()'>Main CheckBox</th>
    <th>name</th>
    <th>surname</th>
    <th>status</th>
    <th>role</th>
    <th>action</th>
</tr>
<?php foreach ($data as $row) { ?>

<tr>
    <td><input type="checkbox" name="check" id="check" value="<?= $row['id'] ?>">
        <?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['surname'] ?></td>
    <?php if ($row["status"]==1) {?>
        <td><img src="https://img.icons8.com/fluency/48/000000/toggle-on.png"></td>
        <?php }
        elseif ($row["status"]==2) {?>
        <td><img src="https://img.icons8.com/fluency/48/000000/toggle-off.png"></td>
        <?php }else  echo'<td></td>';?>
    <td><?= $row['role'] ?></td>
    <td>
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2">Edit</button>
            <button type="submit"class="btn btn-sm btn-secondary badge" type="button" name="delete"><i
                                  class="fa fa-trash"></i></button>
    </td>
</tr>

<?php  } ?>
       </table>