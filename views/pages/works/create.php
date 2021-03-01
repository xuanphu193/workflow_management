<?php include_once('views/layouts/header.php'); ?>

<div class="container mt-3 mb-2">
    <h1 class="header">Create New Work</h1>
</div>
<?php
    $action = '/work/create';
    include_once('views/pages/works/form.php');
?>

<?php include_once('views/layouts/footer.php'); ?>