<?php

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
?>

<body>
    <div id='result' class="container mt-3">
        <table class="table table-bordered  table-responsive-sm ">
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
                                <!-- <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash fa-lg "></i></button> -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="" data-bs-target="" type="button" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                            </div>
                        </td>
                    </tr>
                <?php  } ?>
            <tbody>
        </table>
    </div>
    <script src="App\View\ajax.js"></script>
    
</body>