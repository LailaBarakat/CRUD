<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"
?>

<h1>Students</h1>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>

<!--students table-->
<table class="table table-striped table-wide">
    <thead>
    <tr>
        <th width="20%">First Name</th>
        <th width="20%">Last Name</th>
        <th width="20%">Email</th>
        <td colspan="2" width="20%"></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($students AS $student):?>
        <tr>
            <td><?php echo htmlspecialchars($student->getfirst_name())?></td>
            <td><?php echo htmlspecialchars($student->getlast_name())?></td>
            <td><?php echo htmlspecialchars($student->getemail())?></td>
            <td>
                <a href="?page=students&run=update&id=<?php echo $student->getid()?>" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $student->getid()?>" />
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
            </td>
            <td>
                <a href="?page=students&run=detailed&id=<?php echo $student->getid()?>" class="btn btn-success">Info</a>
            </td>
        </tr>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<a href="?page=students&run=create" class="btn btn-primary">Create Student</a>

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

<?php require "includes/footer.php"?>
