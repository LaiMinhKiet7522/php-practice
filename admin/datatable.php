<?php
include_once("layout/top_all.php");
?>

<h1 class="page-heading">
    View All
    <a href="<?php echo ADMIN_URL; ?>form.php" class="btn btn-primary btn-sm right"><i class="fas fa-plus"></i> Add New</a>
</h1>

<div class="table-responsive">
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Property Name</th>
                <th scope="col">Property Price</th>
                <th scope="col">Location</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>207 AB Villa</td>
                <td>$10,000</td>
                <td>NewYork</td>
                <td>Villa</td>
            </tr>
            <tr>
                <td>2</td>
                <td>207 AB Villa</td>
                <td>$10,000</td>
                <td>NewYork</td>
                <td>Villa</td>
            </tr>
            <tr>
                <td>3</td>
                <td>207 AB Villa</td>
                <td>$10,000</td>
                <td>NewYork</td>
                <td>Villa</td>
            </tr>
            <tr>
                <td>4</td>
                <td>207 AB Villa</td>
                <td>$10,000</td>
                <td>NewYork</td>
                <td>Villa</td>
            </tr>
        </tbody>
    </table>
</div>

<?php
include_once("layout/footer.php");
?>