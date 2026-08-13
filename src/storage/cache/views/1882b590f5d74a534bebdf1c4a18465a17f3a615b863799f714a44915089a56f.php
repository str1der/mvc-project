<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <main>
        <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>

<?php if ($isAdmin): ?>
    <p>Admin kullanıcısı</p>
<?php else: ?>
    <p>Normal kullanıcı</p>
<?php endif; ?>
    </main>
</body>
</html>