<?php

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
?>


<div id='result' class="container mt-3">
    <table class="table table-bordered  table-responsive-sm ">

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
                        <!-- <button type="submit" class="btn btn-sm btn-secondary badge" type="button" name="delete" id="delete"><i class="fa fa-trash fa-lg "></i></button> -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" type="button" name="delete" id="delete" value="delete"><i class="fa fa-trash fa-lg "></i></button>
                    </span>

                </td>
            </tr>

        <?php  } ?>
    </table>

    <script>
        $(document).ready(function() {

            $('#main_checkbox').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
            $("[name='check']").on('change', function() {
                $('#main_checkbox').not(this).prop('checked', false);
            });

        });
    </script>

</div>