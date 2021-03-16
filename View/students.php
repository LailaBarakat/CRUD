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
            <td><?php echo htmlspecialchars($student['first_name'])?></td>
            <td><?php echo htmlspecialchars($student['last_name'])?></td>
            <td><?php echo htmlspecialchars($student['email'])?></td>
            <td>
                <a href="?id=<?php echo $student['id']?>" class="btn btn-primary">Update</a>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $student['id']?>" />
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
            </td>
            <td>
                <input type="submit" name="Info" value="info" class="btn btn-success">
            </td>
        </tr>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php $saveLabel = "Save Record" ?>
<!--Creating new Student-->
<form method="post" id="create-student">
    <h2><?php echo $saveLabel?></h2>

    <input type="hidden" name="id" value="<?php echo $selectedStudent['id']?>" />

    <label for="firstname">First name:</label>
    <input type="text" name="firstname" id="firstname" required value="<?php echo htmlspecialchars($selectedStudent['firstname']) ?>"/>

    <label for="lastname">Last name:</label>
    <input type="text" name="lastname" id="lastname" required value="<?php echo htmlspecialchars($selectedStudent['lastname']) ?>"/>

    <label for="lastname">Email:</label>
    <input type="email" name="email" id="email" required value="<?php echo htmlspecialchars($selectedStudent['email']) ?>"/>

    <input type="submit" value="<?php echo $saveLabel?>" />
</form>


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
