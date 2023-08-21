<?php
$servername = "localhost";
$dbname = "php_practice";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error Connection " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a.links {
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            background: lightblue;
            color: black;
            font-size: 20px;
            margin-right: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div style="width: 400px; margin: 0 auto;">
        <h3>Student List</h3>

        <?php
        $per_page = 2;
        $statement = $pdo->prepare("SELECT * FROM students");
        $statement->execute();
        $total = $statement->rowCount();
        $total_pages =  ceil($total / $per_page);

        if (!isset($_REQUEST['p'])) {
            $start = 1;
        } else {
            $start = $per_page * ($_REQUEST['p'] - 1) + 1;
        }

        $j = 0;
        $k = 0;
        $arr1 = [];
        $result =  $statement->fetchAll();
        foreach ($result as $row) {
            $j++;
            if ($j >= $start) {
                $k++;
                if ($k > $per_page) {
                    break;
                }
                // echo $row['id']. ' ';
                $arr1[] = $row['id'];
            }
        }

        ?>
        <?php
        $statement = $pdo->prepare("SELECT * FROM students");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            if (!in_array($row['id'], $arr1)) {
                continue;
            }
            echo "<div style = 'padding: 10px; margin-bottom: 10px; background: #ddd;'>";
            echo "Name: " . $row['firstname'] . ' ' . $row['lastname'] . '<br>';
            echo "Email: " . $row['email'];
            echo "</div>";
        }


        if (isset($_REQUEST['p'])) {
            if ($_REQUEST['p'] == 1) {
                echo '<a class="links" href="javascript:void;" style="background:#ddd;"> << </a>';
            } else {
                echo '<a class="links" href="http://localhost/php_practice/index.php?p=' . ($_REQUEST['p'] - 1) . '"> << </a>';
            }
        } else {
            echo '<a class="links" href="javascript:void;" style="background:#ddd;"> << </a>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<a class="links" href="http://localhost/php_practice/index.php?p=' . $i . '">' . $i . '</a>';
        }
        if (isset($_REQUEST['p'])) {
            if ($_REQUEST['p'] == $total_pages) {
                echo '<a class="links" href="javascript:void;" style="background:#ddd;"> >> </a>';
            } else {
                echo '<a class="links" href="http://localhost/php_practice/index.php?p=' . ($_REQUEST['p'] + 1) . '"> >> </a>';
            }
        } else {
            echo '<a class="links" href="http://localhost/php_practice/index.php?p=2"> >> </a>';
        }
        ?>
    </div>
</body>

</html>