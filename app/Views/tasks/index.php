<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>
    <h1>All Tasks</h1>

    <?php $loggedIn = session()->get('isLoggedIn'); ?>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <?php if ($loggedIn): ?>
        <p><a href="<?= base_url('tasks/new') ?>">+ New Task</a></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Date</th>
            <?php if ($loggedIn): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= esc($task['title']) ?></td>
            <td><?= esc($task['status']) ?></td>
            <td><?= esc($task['task_date']) ?></td>
            <?php if ($loggedIn): ?>
            <td>
                <a href="<?= base_url('tasks/edit/' . $task['id']) ?>">Edit</a>
                <form action="<?= base_url('tasks/delete/' . $task['id']) ?>" method="post"
                      style="display:inline;" onsubmit="return confirm('Archive this task?');">
                    <?= csrf_field() ?>
                    <button type="submit">Delete</button>
                </form>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a> |
        <a href="<?= base_url('tasks') ?>">Task List</a> |
        <a href="<?= base_url('profile') ?>">Profile</a> |
        <a href="<?= base_url('about') ?>">About</a>
        <?php if ($loggedIn): ?>
            | <a href="<?= base_url('logout') ?>">Logout</a>
        <?php else: ?>
            | <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>
    </nav>
</body>
</html>