<?php require "includes/header.php" ?>

<h1 class="text-center mx-auto col-3">Create New <?php echo ucfirst($type) ?></h1>

<?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
<?php endif; ?>


<form method="post" id="create-user">

    <div class="form-group container container-fluid">
        <input class="form-control" type="hidden" name="id" value=""/>

        <?php if ($type !== "class"): ?>

            <label for="first_name" class="form-label">First name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required/>

            <label for="last_name" class="form-label">Last name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required/>

            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" id="email" class="form-control" required/>

            <?php if ($type === "student"): ?>
                <label for="class" class="form-label d-block">Class:</label>
                <select name="class" id="class">
                    <option value="">none</option>
                    <?php foreach ($group as $member): ?>
                        <option value="<?php echo $member->getId() ?>"><?php echo $member->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

        <?php else: ?>

            <label class="form-label" for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name"  required/>

            <label class="form-label" for="location">Location:</label>
            <input class="form-control" type="text" name="location" id="location" value="" required/>

            <label class="form-label d-block" for="teacher">Teacher:</label>
            <select name="teacher" id="teacher">
                <option value="">none</option>
                <?php foreach ($teachers as $teacher): ?>
                    <option value="<?php echo $teacher->getId() ?>"><?php echo $teacher->getFullName() ?></option>
                <?php endforeach; ?>
            </select>

        <?php endif; ?>

        <button type="submit" class="d-block btn btn-primary mt-4">Create <?php echo ucfirst($type) ?></button>
    </div>
</form>


<?php require "includes/footer.php" ?>

