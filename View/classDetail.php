<?php

require "includes/header.php";

?>

    <div class="text-center mx-auto col-3">
        <h1><?php echo ucfirst($type) ?> Details</h1>
    </div>

<?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
<?php endif; ?>

    <!--class table-->
    <table class="mx-auto col-7 table table-striped table-wide mt-2">
        <thead>
        </thead>
        <tbody>

        <tr>
            <td>Class Name:</td>
            <td><?php echo htmlspecialchars($class->getName()) ?></td>
        </tr>
        <tr>
            <td>Class ID:</td>
            <td><?php echo htmlspecialchars((string)$class->getId()) ?></td>
        </tr>
        <tr>
            <td>Location:</td>
            <td><?php echo htmlspecialchars($class->getclasslocation()) ?></td>
        </tr>
        <tr>
            <td>Teacher:</td>
            <td>
                <a href="?page=teacher&run=detailed&id=<?php echo htmlspecialchars((string)$teacher->getId()); ?>"><?php echo $teacher->getFullName(); ?></a>
            </td>
        </tr>
        <tr>
            <td>Students:</td>
            <td>
                <?php foreach ($students as $student): ?>
                    <a href="?page=student&run=detailed&id=<?php echo htmlspecialchars((string)$student['id']); ?>"
                       class="d-block"><?php echo $student['name']; ?></a>

                <?php endforeach; ?>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="col-2 mx-auto">

        <a href="?page=class&run=update&id=<?php echo $class->getId() ?>" class="btn btn-primary mt-4 mb-3">Update</a>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $class->getId() ?>"/>
            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>

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