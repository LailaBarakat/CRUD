<?php

require "includes/header.php"

?>


    <h1>Classes</h1> <a href="?page=class&run=export" class="btn btn-primary mb-4 ml-4">Export</a>


<?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
<?php endif; ?>

    <!--classes table-->
    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="20%">Name</th>
            <th width="20%">Location</th>
<!--            <th width="20%">Teacher ID</th>-->
            <td colspan="2" width="20%"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?php echo htmlspecialchars($class->getclassname()) ?></td>
                <td><?php echo htmlspecialchars($class->getclasslocation()) ?></td>
<!--                <td>--><?php //echo htmlspecialchars($class->getclassid()) ?><!--</td>-->
                <td>
                    <a href="?page=class&run=update&id=<?php echo $class->getclassid() ?>"
                       class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $class->getclassid() ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <a href="?page=class&run=detailed&id=<?php echo $class->getclassid() ?>" class="btn btn-success">Info</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="col-2 mx-auto">
        <a href="?page=class&run=create" class="btn btn-primary ">Add New Class</a>
    </div>

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