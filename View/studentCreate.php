<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php'?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->

        <h4>Create New Student</h4>
    <form method="post" id="create-student">
        <input type="hidden" name="id" value="">
        <div>
        <label for="first_name">First name:</label>
        <input type="text" name="first_name" id="first_name" required />
        </div>

        <div>
        <label for="last_name">Last name:</label>
        <input type="text" name="last_name" id="last_name"  required />
        </div>

        <div>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email"/>
        </div>

        <div >
        <label for="class">Class:</label>
        <input type="text" name="class" id="class" />
        </div>
        <input type="submit" value="Crate Student" class="btn btn-primary mt-4 ml-4"/>
    </form>



    <style>
        label {
            cursor: pointer;
        }
        label {
            display: block;
        }
        form#create-student {
            margin-left: 10px;
        }
    </style>
<?php require 'includes/footer.php'?>