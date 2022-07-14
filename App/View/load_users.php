<?php

use App\Model\User;

error_log(E_USER_NOTICE);
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
        <td><i class="fa fa-circle active-circle"></td>
        <?php }
        elseif ($row["status"]==2) {?>
        <td><i class="fa fa-circle not-active-circle"></td>
        <?php }else  echo'<td></td>';?>
    <td><?= $row['role'] ?></td>
    <td></td>
</tr>

<?php  } ?>
       </table>