<?php include_once('views/layouts/header.php'); ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-sm">
            <h1 class="header">Calendar</h1>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-6 mt-2 mb-2">
            <a href="/work/create" class="btn btn-primary ml-3">Create new work</a>
        </div>
        <div class="col-6 mt-2 mb-2 text-right">
            <a href="/work" class="btn btn-primary">List work</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div id='calendar'></div>
        </div>
    </div>
</div>

<?php include_once('views/layouts/footer.php'); ?>