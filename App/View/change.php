<?php

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
?>

<body>
<div class="container">
    <div>
        <div class="card-title">
            <h6 class="mr-2"><span>Users</span></h6>
        </div>
        <div class="e-table" id='result'>
            <div class="table-responsive table-lg mt-3">
                <table class="table table-bordered  table-responsive-sm ">
                    <thead>
                        <tr>
                            <th class="align-top">
                                <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                                    <input type="checkbox" name="main_checkbox" id="main_checkbox" onclick='selects()'>
                                    <label class="custom-control-label" for="all-items"></label>
                                </div>
                            </th>

                            <th style="text-align:center">name</th>
                            <th style="text-align:center">surname</th>
                            <th style="text-align:center">role</th>
                            <th style="text-align:center">status</th>
                            <th style="text-align:center">action</th>
                        </tr>
                    </thead>

                    <?php foreach ($data as $row) { ?>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                        <input type="checkbox" name="check" id="check" class="delete-id" value="<?= $row['id']; ?>">
                                        <label class="custom-control-label" for="item-2"></label>
                                    </div>
                                </td>

                                <td class="text-nowrap align-middle"><?= $row['name'] ?></td>
                                <td class="text-nowrap align-middle"><?= $row['surname'] ?></td>
                                <td class="text-nowrap align-middle"><?= $row['role'] ?></td>

                                <?php if ($row["status"] == 1) { ?>
                                    <td class="text-center align-middle"><i class="fa-solid fa fa-circle  fa-2x " style="color:green"></i></td>
                                <?php } elseif ($row["status"] == 2) { ?>
                                    <td class="text-center align-middle"><i class="fa-solid fa fa-circle  fa-2x" style="color:grey"></i></td>
                                <?php } else  echo '<td></td>'; ?>

                                <td class="text-center align-middle">
                                    <div class="btn-group align-top">
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AddModal" data-role='update' id='edit'>Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php  } ?>
                </table>
            </div>
        </div>
    </div>
    
</div>

<script src="App\View\ajax.js"></script>


</body>







