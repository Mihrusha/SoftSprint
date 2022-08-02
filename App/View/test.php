<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

</body>

</html>

<table class="table table-bordered  table-responsive-sm " id='someTable'>
    <thead>
        <tr>
            <th class="text-center align-top">
                <input type="checkbox" name="main_checkbox" id="main_checkbox">
            </th>
            <th class=" text-center max-width"> full name</th>
            <td class="text-center align-middle">status</th>
            <td class="text-center align-middle">role</th>
            <td class="text-center align-middle">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td class="text-center align-middle">
                    <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                        <input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                    </div>

                </td>
                <td class="text-center align-middle"><?= $row['name'] ?> <?= $row['surname'] ?></td>

                <?php if ($row["status"] == 1) { ?>
                    <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
                <?php } elseif ($row["status"] == 2) { ?>
                    <td style="text-align:center"><i class="fa-solid fa fa-circle  fa-2x" style="color:grey"></i></td>
                <?php } else  echo '<td></td>'; ?>
                <td class="text-center align-middle"><?= $row['role'] ?></td>
                <td class="text-center align-middle">
                    <div class="btn-group align-top">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit' name='update'>Edit</button>

                        <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target="" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                    </div>
                </td>
            </tr>
        <?php  } ?>
    <tbody>
</table>

<form method='post'>
    <input type="text" id="name" name="name">
    <input type="text" id="surname" name="surname">
    <input type="text" id="status" name="status">
    <input type="text" id="role" name="role">
    <button type='button' class='btn btn-success' id='send' name='send'>SEND</button>
</form>

<div id='msg'></div>

<script>
    $(document).ready(function() {
        $("[name='send']").click(function() {
            let name = $('#name').val();
            let surname = $('#surname').val();
            let status = $('#status').val();
            let role = $('#role').val();
            $.ajax({
                method: "POST",
                url: "insert.php",
                data: {
                    name: name,
                    surname: surname,
                    status: status,
                    role: role
                },
                success: function(msg) {
                    // console.log(typeof(msg)),
                    arr = JSON.parse(msg);
                    // console.log(typeof(arr)),
                    // console.log(arr['user']['name']);
                    var name = arr['user']['name'];
                    var surname = arr['user']['surname'];
                    $("#someTable tbody").append("<tr><td><div class='custom-control m-0 align-top'> <input type='checkbox' name='check' id='check' class='delete-id' value=''</div></td><td>" + name + " " + surname + "</td><td>" + role + "</td><td>" + status + "</td><td><div class='btn-group align-top'><button type='button' class='btn btn-sm btn-success' data-bs-toggle='modal' data-bs-target='#AddModal' data-role='update' id='edit' name='update'>Edit</button><button type='button' class='btn btn-danger' data-bs-toggle='' data-bs-target='' name='delete' id='delete' value='delete'><i class='fa fa-trash fa-lg '></i></buttton</div></td></tr>");
                }
            })

        })

    })
</script>