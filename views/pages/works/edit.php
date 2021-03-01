<?php include_once('views/layouts/header.php'); ?>
<div class="container mt-3 mb-2">
    <h1 class="header">Edit Work</h1>
</div>

<?php
    $workId = isset($works) ? $works['id'] : '';
    $action = "/work/update/{$workId}";
    include_once('views/pages/works/form.php');
?>

<?php include_once('views/layouts/footer.php'); ?>