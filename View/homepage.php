<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"

?>
Hello <?php echo $user ?>

<p><a href="index.php?page=teacher">Teachers</a></p>
<p><a href="index.php?page=class">Classes</a></p>
<p><a href="index.php?page=student">Students</a></p>

<?php require "includes/footer.php"?>