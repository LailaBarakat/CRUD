<?php

require "includes/header.php";
?>

<h1>Teacher Details</h1>

<?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
<?php endif; ?>

<!--students table-->
<table class="table table-striped table-wide">
    <thead>
    </thead>
    <tbody>

    <tr>
        <td>First Name:</td>
        <td><?php echo htmlspecialchars($teacher->getfirst_name()) ?></td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td><?php echo htmlspecialchars($teacher->getlast_name()) ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo htmlspecialchars($teacher->getemail()) ?></td>
    </tr>

    <tr>
        <td>Students:</td>
        <td>
            <?php foreach ($students as $student): ?>
                <a href="?page=student&run=detailed&id=<?php echo htmlspecialchars((string)$student['id']); ?>"><?php echo $student['fullname']; ?></a>
            <?php endforeach; ?>
        </td>
    </tr>

    </tbody>
</table>

<div class="col-2 mx-auto">
    <a href="?page=teacher&run=update&id=<?php echo $teacher->getid() ?>" class=" btn btn-primary mt-4 mb-3">Update</a>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $teacher->getid() ?>"/>
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
