<?php
include './user.php';

$user = null;

if ($_COOKIE['user']) {
    $user = unserialize($_COOKIE['user']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>TopLang</title>
</head>
<body>
<div class="container">
    <div style="height: 40px"></div>
    <div style="width: 50%; margin: 0 auto; text-align: center;">
        <? if ($user && $user->isAdmin) { ?>
            <div class="form-text text-success"><? echo file_get_contents("/var/flag");?></div>
        <? } else if ($user) { ?>
            <div class="form-text text-warning">You are not admin 🛑</div>
        <? } else { ?>
            <div class="form-text text-danger">Please <a href="/login.php">login</a></div>
        <? } ?>
    </div>
</div>
<script>
</script>
</body>
</html>
