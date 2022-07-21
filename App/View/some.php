<?php

use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';


$user = new User;

$data = $user->GetAll();

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $role = $_POST['role'];

    $status = $_POST['status'];
    $user->Insert($name, $surname, $status, $role);
}

if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];

    $deleteId = implode(',', $deleteId);
    $user->delete($deleteId);
}

?>

<table class="table table-bordered table">

    <tr>

        <th style="text-align:center"><label for="">Main Checkbox</label><input type="checkbox" name="main_checkbox" id="main_checkbox" onclick='selects()'></th>
        <th style="text-align:center">name</th>
        <th style="text-align:center">surname</th>
        <th style="text-align:center">status</th>
        <th style="text-align:center">role</th>
        <th style="text-align:center">action</th>
    </tr>

    <?php foreach ($data as $row) { ?>

        <tr>
            <td style="text-align:center; width:100px"><input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
            </td> <!-- id='<?= $row['id']; ?>' -->
            <td style="text-align:center"><?= $row['name'] ?></td>
            <td style="text-align:center"><?= $row['surname'] ?></td>

            <?php if ($row["status"] == 1) { ?>
                <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
            <?php } elseif ($row["status"] == 2) { ?>
                <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x" style="color:red"></i></td>
            <?php } else  echo '<td></td>'; ?>
            <td style="text-align:center"><?= $row['role'] ?></td>
            <td style="text-align:center">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit'>Edit</button>
                <span style="font-size: 22px">
                    <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash fa-lg "></i></button>
                </span>

            </td>
        </tr>

    <?php  } ?>
</table>