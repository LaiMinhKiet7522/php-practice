<?php
if (isset($_POST['form1'])) {
    $path = $_FILES['my_file']['name'];
    $path_tmp = $_FILES['my_file']['tmp_name'];
    echo $path;
    echo '<br>';
    echo $path_tmp;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Select file: </td>
                <td><input type="file" name="my_file"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" name="form1"></td>
            </tr>
        </table>
    </form>
</body>

</html>