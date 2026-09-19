<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today - About</title>
</head>
<body>

    <h1>About This System</h1>

    <p>
        The Tasks for Today Management System is a web application
        built using CodeIgniter 4. It allows users to view today's
        tasks, view the complete task list, and access a demo user profile.
    </p>

    <p>
        <strong>Developer:</strong> Artainian Abulencia
    </p>

    <br>

    <nav>
    <?php echo anchor('/', 'Home'); ?> |
    <?php echo anchor('tasks', 'Task List'); ?> |
    <?php echo anchor('profile', 'Profile'); ?> |
    <?php echo anchor('about', 'About'); ?>
</nav>

</body>
</html>