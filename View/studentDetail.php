<?php

require "includes/header.php";
?>

<h1>Student Details</h1>

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
        <td><?php echo htmlspecialchars($student->getfirst_name()) ?></td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td><?php echo htmlspecialchars($student->getlast_name()) ?></td>
    </tr>
    <tr>
        <td>Email Name:</td>
        <td><?php echo htmlspecialchars($student->getemail()) ?></td>
    </tr>
    <tr>
        <td>Class Name:</td>
        <td>placeholder</td>
    </tr>
    <tr>
        <td>Class ID:</td>
        <td><?php echo htmlspecialchars((string) $student->getclassid()) ?></td>
    </tr>
    <tr>
        <td>Teacher:</td>
        <td>placeholder</td>

    </tr>

    </tbody>
</table>

<div class="col-2 mx-auto">

    <a href="?page=student&run=update&id=<?php echo $student->getid() ?>" class="btn btn-primary">Update</a>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $student->getid() ?>"/>
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
