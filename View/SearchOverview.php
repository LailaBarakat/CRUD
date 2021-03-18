<?php
var_dump($targets);
require "includes/header.php";
?>
    <h1>Found who you're looking for?</h1>

    <!--search table-->
    <table class=" table table-striped table-wide">
        <thead>
        <tr>
            <th width="20%">Name</th>
            <th width="20%">Teacher/Student</th>
            <td colspan="2" width="20%"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($targets as $target): ?>
            <tr>
                <td>
                    <a href="?page=<?php echo $target->getFindType() ?>&run=detailed&id=<?php echo $target->getFindId() ?>"><?php echo htmlspecialchars($target->getFindname()) ?></a>
                </td>
                <td>
                    <?php echo htmlspecialchars($target->getFindType()) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <style>
        label {
            cursor: pointer;
        }

        label {
            display: block;
        }

        form#create-user {
            margin-left: 10px;
        }
    </style>

<?php require "includes/footer.php" ?>