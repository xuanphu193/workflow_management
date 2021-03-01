<?php 
include_once('views/layouts/header.php'); 
use App\Helpers\Helper;
?>

<div class="container">
    <div class="container mt-5 mb-2">
        <h1 class="header">List Work</h1>
    </div>
    </br>
    <div class="row justify-content-between">
        <div class="col-6 mt-2 mb-2">
            <a href="/work/create" class="btn btn-primary">Create new work</a>
        </div>
        <div class="col-6 mt-2 mb-2 text-right">
            <a href="/home" class="btn btn-primary">Home</a>
        </div>
    </div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Work Name</th>
                <th>Star date</th>
                <th>End date</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($works as $work) {?>
                <tr>
                    <td><?php echo $work['work_name'];?></td>
                    <td><?php echo !empty($work['start_date']) ? Helper::formatDate($work['start_date'], 'd-m-Y') : '-';?></td>
                    <td><?php echo !empty($work['end_date']) ? Helper::formatDate($work['end_date'], 'd-m-Y') : '-';?></td>
                    <td>
                        <?php
                            if ($work['status'] === '0') {
                                echo '<span class="badge badge-pill badge-info">Planning</span>';
                            } elseif ($work['status'] === '1') {
                                echo '<span class="badge badge-pill badge-warning">Doing</span>';
                            } elseif ($work['status'] === '2') {
                                echo '<span class="badge badge-pill badge-success">Complete</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <a href="/work/edit/<?php echo $work['id'];?>" class="badge badge-primary">Edit</a>
                        <a href="/work/delete/<?php echo $work['id'];?>" class="badge badge-danger">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php include_once('views/layouts/footer.php'); ?>