<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>
<body>

    <h1>Tasks for Today</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <nav>
    <?php echo anchor('/', 'Home'); ?> |
    <?php echo anchor('tasks', 'Task List'); ?> |
    <?php echo anchor('profile', 'Profile'); ?> |
    <?php echo anchor('about', 'About'); ?>
</nav>

</body>
</html>