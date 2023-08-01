<?php
// READ FILE
// Way 1:
// if ($th = fopen('text.txt', 'r')) {
//     while (!feof($th)) {
//         $line = fgets($th);
//         echo $line . '<br>';
//     }
// }
// fclose($th);

// Way 2:
// $line = file_get_contents('text.txt');
// echo nl2br($line);

// Way 3:
// $file = file('text.txt');
// foreach ($file as $key => $line) {
//     echo $line . '<br>';
// }

// WRITE FILE
// $filename = 'test.txt';
// $file = fopen($filename, 'w');
// if (!$file) {
//     echo 'Error';
//     exit();
// }
// fwrite($file, "\n10\n9");
// fclose($file);

// APPEND TO FILE
// $filename = 'test.txt';
// $file = fopen($filename, 'a');
// if (!$file) {
//     echo 'Error';
//     exit();
// }
// fwrite($file, "\n8\n7");
// fclose($file);
