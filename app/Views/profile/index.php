<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

    <h1>User Profile</h1>

    <?php if ($user): ?>
        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
        <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Created At:</strong> <?= esc($user['created_at']) ?></p>
    <?php else: ?>
        <p>No user found.</p>
    <?php endif; ?>

    <br>

    <nav>
    <?php echo anchor('/', 'Home'); ?> |
    <?php echo anchor('tasks', 'Task List'); ?> |
    <?php echo anchor('profile', 'Profile'); ?> |
    <?php echo anchor('about', 'About'); ?>
</nav>

</body>
</html>