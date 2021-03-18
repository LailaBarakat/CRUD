<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php'?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->

    <h4 xmlns="http://www.w3.org/1999/html">Create New Student</h4>
<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>
    <form method="post" id="create-student">
        <div class="form-group container container-fluid">
            <input type="hidden" name="id" value="" class="form-control">
            <label for="first_name" class="form-label">First name:</label>
            <input type="text" name="first_name" id="first_name" required class="form-control" />



            <label for="last_name" class="form-label">Last name:</label>
            <input type="text" name="last_name" id="last_name"  required class="form-control" />



            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" id="email" class="form-control" required/>



            <label for="class" class="form-label">Class:</label>
            <input type="text" name="class" id="class"  class="form-control" required/>
            <button type="submit" class="btn btn-primary mt-4">Create Student</button>
        </div>

    </form>


<!---->
<!--    <style>-->
<!--        label {-->
<!--            cursor: pointer;-->
<!--        }-->
<!--        label {-->
<!--            display: block;-->
<!--        }-->
<!--        form#create-student {-->
<!--            margin-left: 10px;-->
<!--        }-->
<!--    </style>-->
<?php require 'includes/footer.php'?>