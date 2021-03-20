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

<!--students table-->
<table class="mx-auto col-7 table table-striped table-wide mt-2">
    <thead>
    </thead>
    <tbody>

    <tr>
        <td>First Name:</td>
        <td><?php echo htmlspecialchars($teacher->getFirstName()) ?></td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td><?php echo htmlspecialchars($teacher->getLastName()) ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo htmlspecialchars($teacher->getEmail()) ?></td>
    </tr>

    <tr>
        <td>Students:</td>
        <td>
            <?php foreach ($students as $student): ?>
                <a href="?page=student&run=detailed&id=<?php echo htmlspecialchars((string)$student['id']); ?>" class="d-block"><?php echo $student['fullname']; ?></a>
            <?php endforeach; ?>
        </td>
    </tr>

    </tbody>
</table>

<div class="col-2 mx-auto">
    <a href="?page=<?php echo $type ?>&run=update&id=<?php echo $teacher->getId() ?>" class=" btn btn-primary mt-4 mb-3">Update</a>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
    </form>
</div>



<?php require "includes/footer.php" ?>
