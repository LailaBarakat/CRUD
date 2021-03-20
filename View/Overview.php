<?php
require 'includes/header.php'
?>

<div class="text-center mx-auto col-3">
    <h1><?php echo ucfirst($type) ?> Overview</h1>
</div>


<?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
<?php endif; ?>

<!--overview table-->
<table class="mx-auto col-7 table table-striped table-wide mt-2">
    <thead>
    <tr>
        <th class="col-4" >Name</th>
        <th class="col-4" ><?php echo ucfirst($overviewTag) ?></th>
        <th class="col-4" ></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($group as $member): ?>
        <tr>
            <?php if ($type === "student" || $type === "teacher"): ?>

                <td><?php echo $member->getFullName(); ?></td>
                <td><?php echo $member->getEmail(); ?></td>

            <?php elseif ($type === "class"): ?>

                <td><?php echo $member->getName(); ?></td>
                <td><?php echo $member->getclasslocation(); ?></td>

            <?php elseif ($type === "search"): ?>

                <td>
                    <a href="?page=<?php echo $member->getFindType() ?>&run=detailed&id=<?php echo $member->getFindId() ?>"><?php echo htmlspecialchars($member->getFullname()) ?></a>
                </td>
                <td>
                    <?php echo htmlspecialchars($member->getFindType()) ?>
                </td>

            <?php endif; ?>
            <td>
                <?php if ($type !== "search"): ?>
                <a href="?page=<?php echo $type ?>&run=update&id=<?php echo $member->getId() ?>"
                   class="d-inline-block btn btn-primary">
                    Edit
                </a>

                <form method="post" class="d-inline-block ">
                    <input type="hidden" name="id" value="<?php echo $member->getId() ?>"/>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>

                <a href="?page=<?php echo $type ?>&run=detailed&id=<?php echo $member->getId() ?>"
                   class="d-inline-block btn btn-success">Info</a>
                   <?php endif;?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="col-2 mx-auto">
    <a href="?page=<?php echo $type ?>&run=create" class="btn btn-primary ">Add New <?php echo ucfirst($type) ?></a>
    <a href="?page=<?php echo $type ?>&run=export" class="btn btn-primary ml-4">Export</a>
</div>

<?php require "includes/footer.php" ?>

