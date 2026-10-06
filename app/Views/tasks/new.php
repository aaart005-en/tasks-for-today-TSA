<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>
</head>
<body>
    <h1>New Task</h1>

    <form action="<?= base_url('tasks/create') ?>" method="post">
        <?= csrf_field() ?>

        <label>Title:</label><br>
        <input type="text" name="title" value="<?= old('title') ?>">
        <?php if (isset($errors['title'])): ?>
            <span style="color:red;"><?= esc($errors['title']) ?></span>
        <?php endif; ?>
        <br><br>

        <label>Date:</label><br>
        <input type="date" name="task_date" value="<?= old('task_date', date('Y-m-d')) ?>">
        <?php if (isset($errors['task_date'])): ?>
            <span style="color:red;"><?= esc($errors['task_date']) ?></span>
        <?php endif; ?>
        <br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="pending" <?= old('status') === 'completed' ? '' : 'selected' ?>>Pending</option>
            <option value="completed" <?= old('status') === 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>
        <br><br>

        <button type="submit">Save Task</button>
        <a href="<?= base_url('tasks') ?>">Cancel</a>
    </form>
</body>
</html>