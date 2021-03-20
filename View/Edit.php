<?php require "includes/header.php" ?>

    <div class="text-center mx-auto col-3">
        <h1>Edit <?php echo ucfirst($type) ?> Data</h1>
    </div>

<?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
<?php endif; ?>

    <form method="post" id="create-user">
        <div class="form-group container container-fluid">

            <input class="form-control" type="hidden" name="id" value="<?php echo $edit->getId(); ?>"/>

            <?php if ($type === "student" || $type === "teacher"): ?>

                <label class="form-label" for="first_name">First name:</label>
                <input class="form-control" type="text" name="first_name" id="first_name" required
                       value="<?php echo $edit->getFirstName(); ?>"/>

                <label class="form-label" for="last_name">Last name:</label>
                <input class="form-control" type="text" name="last_name" id="last_name" required
                       value="<?php echo $edit->getLastName(); ?>"/>

                <label for="email" class="form-label">Email:</label>
                <input class="form-control" type="text" name="email" id="email"
                       value="<?php echo $edit->getEmail(); ?>"/>

                <?php if ($type === 'student'): ?>

                    <label class="form-label d-block" for="class">Class:</label>
                    <select name="class" id="class">
                        <?php foreach ($group as $member): ?>
                            <option value="<?php echo $member->getId() ?>"><?php echo $member->getName() ?></option>
                        <?php endforeach; ?>
                    </select>

                <?php endif; ?>
            <?php else: ?>

                <label class="form-label" for="name">Name:</label>
                <input class="form-control" type="text" name="name" id="name" required
                       value="<?php echo $edit->getName(); ?>"/>

                <label class="form-label" for="location">Location:</label>
                <input class="form-control" type="text" name="location" id="location" required
                       value="<?php echo $edit->getclasslocation(); ?>"/>

                <label class="form-label d-block" for="teacher">Teacher:</label>
                <select name="teacher" id="teacher">
                    <?php foreach ($teachers as $teacher): ?>
                        <option value="<?php echo $teacher->getId() ?>"><?php echo $teacher->getFullName() ?></option>
                    <?php endforeach; ?>
                </select>

            <?php endif; ?>

            <input class="d-block btn btn-primary mt-4" type="submit" value="Update <?php echo ucfirst($type) ?>"/>

        </div>
    </form>

<?php require "includes/footer.php" ?>