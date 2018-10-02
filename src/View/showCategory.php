<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<main>
    <h1>Category <?= $cat['name'] ?></h1>
    <ul>
        <li>Id : <?= $cat['id'] ?></li>
    </ul>
    <a href='/categories'>Back to list</a>
    <br/>
    <a href="/">Back to the items list</a>
</main>
</body>
</html>