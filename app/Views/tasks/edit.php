<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <form action="<?= base_url('tasks/update/' . $task['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label>Title:</label><br>
        <input type="text" name="title" value="<?= old('title', $task['title']) ?>">
        <?php if (isset($errors['title'])): ?>
            <span style="color:red;"><?= esc($errors['title']) ?></span>
        <?php endif; ?>
        <br><br>

        <label>Date:</label><br>
        <input type="date" name="task_date" value="<?= old('task_date', $task['task_date']) ?>">
        <?php if (isset($errors['task_date'])): ?>
            <span style="color:red;"><?= esc($errors['task_date']) ?></span>
        <?php endif; ?>
        <br><br>

        <?php $status = old('status', $task['status']); ?>
        <label>Status:</label><br>
        <select name="status">
            <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="completed" <?= $status === 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>
        <br><br>

        <button type="submit">Update Task</button>
        <a href="<?= base_url('tasks') ?>">Cancel</a>
    </form>
</body>
</html>