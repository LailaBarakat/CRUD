<?php

require "includes/header.php";

?>

    <h1>class Details</h1>

<?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
<?php endif; ?>

    <!--class table-->
    <table class="table table-striped table-wide">
    <thead>
    </thead>
    <tbody>

    <tr>
        <td>Class Name:</td>
        <td><?php echo htmlspecialchars($class->getclassname()) ?></td>
    </tr>
    <tr>
        <td>Class ID:</td>
        <td><?php echo htmlspecialchars((string)$class->getclassid()) ?></td>
    </tr>
    <tr>
        <td>Location:</td>
        <td><?php echo htmlspecialchars($class->getclasslocation()) ?></td>
    </tr>
    <tr>
        <td>Teacher:</td>
        <td>placeholder</td>
    </tr>
<tr>
    <td>Students:</td>
    <td>
<?php foreach ($class->getclassstudents() as $student):?>
    <a href="?page=student&run=detailed&id=<?php echo htmlspecialchars((string)$student['id']); ?>"><?php echo $student['name'];?></a>

    <?php endforeach; ?>
    </td>
    </td>
    </tr>
    </tbody>
    </table>

    <div class="col-2 mx-auto">

        <a href="?page=class&run=update&id=<?php echo $class->getclassid() ?>" class="btn btn-primary">Update</a>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $class->getclassid() ?>"/>
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