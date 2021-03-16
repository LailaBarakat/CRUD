<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student overview</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<?php require 'includes/header.php'?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>
        <h4>General Overview Page</h4>

        <p><a href="index.php?page=<?php echo $handler?>&run=create">create new</a></p>
        <p><a href="index.php?page=<?php echo $handler?>&run=delete" class="btn btn-danger">delete</a></p>
        <p><a href="index.php?page=<?php echo $handler?>&run=edit">edit existing</a></p>
        <p><a href="index.php?page=<?php echo $handler?>&run=general">to list</a></p>


        <p><a href="index.php?page=teacher">Back to homepage</a></p>
        <p><a href="index.php?page=class">Back to homepage</a></p>
        <p><a href="index.php?page=student">Back to homepage</a></p>

        <p>Put your content here.</p>
    </section>
<?php require 'includes/footer.php'?>