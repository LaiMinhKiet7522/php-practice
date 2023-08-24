<?php
include_once("layout/top_all.php");
?>

<h1 class="page-heading">Edit Profile</h1>

<div class="row">
    <div class="col-md-3">
        <img src="<?php echo BASE_URL; ?>uploads/admin.jpg" class="img-thumbnail mb_10" alt="">
        <input type="file" name="photo" class="form-control">
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">First Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Country</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">State</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">City</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Zip</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Retype Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <input type="submit" value="Update" name="form1" class="btn btn-primary">
            </div>
        </div>
    </div>
</div>

<?php
include_once("layout/footer.php");
?>