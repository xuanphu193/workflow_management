<?php
    $action = isset($action) ? $action : '/home';
    use App\Helpers\Helper;
?>

<div class="container mt-5 mb-2">
    <?php
        if (isset($errors)) {
            foreach($errors as $message) {
    ?>
        <div class="row">
                <div class="col-sm alert alert-danger" role="alert">
                    <?php echo $message; ?>
                </div>        
        </div>
    <?php }}?>
    <form action="<?php echo $action;?>" method="POST" id="form_work">
        <div class="form-group">
            <label for="work_name">Work name</label>
            <input type="text" name="work_name" class="form-control" id="work_name" value="<?php echo isset($works) ? $works['work_name'] : '';?>" placeholder="Please enter work name">
        </div>
        <div class="form-group">
            <label for="start_date">Start date</label>
            <input type="date" name="start_date" class="form-control" id="start_date" value="<?php echo isset($works) && !empty($works['start_date']) ? Helper::formatDate($works['start_date'], 'Y-m-d') : '';?>" placeholder="Please enter work name">
        </div>
        <div class="form-group">
            <label for="end_date">End date</label>
            <input type="date" name="end_date" class="form-control" id="end_date" value="<?php echo isset($works) && !empty($works['end_date']) ? Helper::formatDate($works['end_date'], 'Y-m-d') : '';?>" placeholder="Please enter work name">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status">
                <?php foreach($options as $key => $value) {?>
                    <option value="<?php echo $value; ?>" <?php echo isset($works) && $works['status'] === $value ? 'selected' : ''; ?>>
                        <?php echo $key; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </form>
    <div class="row justify-content-between">
        <div class="col-4 mt-2 mb-2">
            <button type="submit" class="btn btn-primary" form="form_work"><?php echo strpos($action, 'create') ? 'Create' : 'Update'; ?></button>
        </div>
        <div class="col-4 mt-2 mb-2 text-right">
            <a href="/home" class="btn btn-primary">Home</a>
        </div>
    </div>
</div>