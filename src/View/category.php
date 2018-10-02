<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<section>
    <h1>Categories</h1>
    <ul>
        <?php foreach ($cats as $cat) : ?>
            <a href="category/<?= $cat['id']?>"><li><?= $cat['name'] ?></li></a>
        <?php endforeach ?>
    </ul>
    <a href='/'>Back to items list</a>
</section>
</body>
</html>

