<?php
include_once("layout/top_all.php");
?>

<h1 class="page-heading">
    Add Item
    <a href="<?php echo ADMIN_URL; ?>table.php" class="btn btn-primary btn-sm right"><i class="fas fa-eye"></i> Show All</a>
</h1>

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="" class="form-label">First Name</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label for="" class="form-label">Middle Name</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label for="" class="form-label">Last Name</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label for="" class="form-label">City</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label for="" class="form-label">State</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label for="" class="form-label">Country</label>
        <select name="" class="form-control select2">
            <option value="">Bangladesh</option>
            <option value="">USA</option>
            <option value="">Canada</option>
        </select>
    </div>
    <div class="col-md-12 mb-3">
        <label for="" class="form-label">Subject</label>
        <input type="text" class="form-control">
    </div>
    <div class="col-md-12 mb-3">
        <label for="" class="form-label">Map</label>
        <textarea name="" class="form-control h_200" cols="30" rows="10"></textarea>
    </div>
    <div class="col-md-12 mb-3">
        <label for="" class="form-label">Message</label>
        <textarea name="" class="form-control editor" cols="30" rows="10"></textarea>
    </div>
</div>

<?php
include_once("layout/footer.php");
?>