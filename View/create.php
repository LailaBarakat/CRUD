<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php'?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>
        <h4>Create New</h4>

        <p><a href="index.php?page=<?php echo $handler?>&run=create">To info page</a></p>
        <p><a href="index.php?page=<?php echo $handler?>&run=delete">To info page</a></p>
        <p><a href="index.php?page=<?php echo $handler?>&run=edit">To info page</a></p>
        <p><a href="index.php?page=<?php echo $handler?>&run=general">To info page</a></p>

        <p><a href="index.php?page=teacher">Teachers</a></p>
        <p><a href="index.php?page=class">Classes</a></p>
        <p><a href="index.php?page=student">Students</a></p>

        <p>Put your content here.</p>
    </section>
<?php require 'includes/footer.php'?>