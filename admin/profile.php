<?php include "layout/top_all.php"; ?>

<?php
if (!isset($_SESSION['admin'])) {
    header('location: ' . ADMIN_URL . 'login.php');
    exit;
}
?>

<?php
if (isset($_POST['form1'])) {

    try {
        if ($_POST['firstname'] == '') {
            throw new Exception("First Name can not be empty");
        }
        if ($_POST['lastname'] == '') {
            throw new Exception("Last Name can not be empty");
        }
        if ($_POST['email'] == '') {
            throw new Exception("Email can not be empty");
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is invalid");
        }
        if ($_POST['phone'] == '') {
            throw new Exception("Phone can not be empty");
        }
        if ($_POST['password'] != '' || $_POST['retype_password'] != '') {
            if ($_POST['password'] != $_POST['retype_password']) {
                throw new Exception("Passwords must match");
            }
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $password = $_SESSION['admin']['password'];
        }

        $path = $_FILES['photo']['name'];
        $path_tmp = $_FILES['photo']['tmp_name'];

        if ($path) {

            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename = "admin" . "." . $extension;

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $path_tmp);
            if ($mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif') {
                throw new Exception("Photo extension is invalid");
            }
            unlink('../uploads/' . $_SESSION['admin']['photo']);
            move_uploaded_file($path_tmp, '../uploads/' . $filename);
        } else {
            $filename = $_SESSION['admin']['photo'];
        }

        $statement = $pdo->prepare("UPDATE admins SET 
                            firstname=?,
                            lastname=?,
                            email=?,
                            phone=?,
                            photo=?,
                            password=?
                            WHERE id=?
                            ");
        $statement->execute([
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['phone'],
            $filename,
            $password,
            1
        ]);

        $_SESSION['admin']['firstname'] = $_POST['firstname'];
        $_SESSION['admin']['lastname'] = $_POST['lastname'];
        $_SESSION['admin']['email'] = $_POST['email'];
        $_SESSION['admin']['phone'] = $_POST['phone'];
        $_SESSION['admin']['photo'] = $filename;
        $_SESSION['admin']['password'] = $password;

        $success_message = 'Data is updated successfully!';
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>

<h1 class="page-heading">Edit Profile</h1>

<?php
if (isset($error_message)) {
    echo '<div class="error" style =" padding: 10px;
    background: #f7acac;
    color: #ae1717;
    font-weight: 700;
    margin-bottom: 10px;">';
    echo $error_message;
    echo '</div>';
}
if (isset($success_message)) {
    echo '<div class="success" style="padding: 20px;
    background: #c5f8c5;
    color: #115e15;
    font-weight: 700;
    margin-bottom: 10px;">';
    echo $success_message;
    echo '</div>';
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo BASE_URL; ?>uploads/<?php echo $_SESSION['admin']['photo']; ?>" class="img-thumbnail mb_10" alt="">
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $_SESSION['admin']['firstname']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $_SESSION['admin']['lastname']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['admin']['email']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $_SESSION['admin']['phone']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Retype Password</label>
                    <input type="password" class="form-control" name="retype_password">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="submit" value="Update" name="form1" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include "layout/footer.php"; ?>