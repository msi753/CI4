<h2><?= esc($title) ?></h2>

<?= service('validation')->listErrors() ?>

<form action="/news/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title"/><br/>

    <label for="body">Text</label>
    <textarea name="body" cols="45" rows="4"></textarea><br/>

    <input type="submit" name="submit" value="Create news item"/><br/>
</form>