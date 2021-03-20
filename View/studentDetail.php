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

<table class="mx-auto col-7 table table-striped table-wide mt-2">
    <thead>
    </thead>
    <tbody>

    <tr>
        <td>First Name:</td>
        <td><?php echo htmlspecialchars($student->getFirstName()) ?></td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td><?php echo htmlspecialchars($student->getLastName()) ?></td>
    </tr>
    <tr>
        <td>Email Name:</td>
        <td><?php echo htmlspecialchars($student->getEmail()) ?></td>
    </tr>
    <tr>
        <td>Class Name:</td>
        <td>
            <?php if (!empty($class)): ?>
                <a href="?page=class&run=detailed&id=<?php echo $class->getId() ?>"> <?php echo $class->getName() ?></a>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>Teacher:</td>
        <td>
            <?php if (!empty($teacher)): ?>
            <a href="?page=teacher&run=detailed&id=<?php echo htmlspecialchars((string)$teacher->getId()) ?>"> <?php echo $teacher->getFullName() ?>
                <?php endif; ?>
        </td>
    </tr>

    </tbody>
</table>

<div class="col-2 mx-auto">

    <a href="?page=student&run=update&id=<?php echo $student->getId() ?>" class="btn btn-primary mt-4 mb-3">Update</a>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
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
