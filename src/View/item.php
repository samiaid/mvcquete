<!DOCTYPE html>
<html>
<head> ... </head>
<body>
    <section>
        <h1>Items</h1>
            <ul>
            <?php foreach ($items as $item) : ?>
                <a href="item/<?= $item['id']?>"><li><?= $item['title'] ?></li></a>
            <?php endforeach ?>
            </ul>
        <a href="categories">View all the categories</a>
        </section>
</body>
</html>