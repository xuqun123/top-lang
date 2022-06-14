<?php
include './user.php';

$user = null;
$err = false;

if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $user = User::login($_POST['login'], $_POST['password']);

    if ($user) {
        setcookie('user', serialize($user));
    } else {
        $err = true;
    }
} else if ($_COOKIE['user']) {
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
    <form style="width: 50%; margin: 0 auto;" action="/login.php" method="post">
        <? if ($user) { ?>
            <div class="form-text">Logged in as <?= $user->login; ?></div>
        <? } else { ?>
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <? if ($err) { ?>
                <div class="form-text text-danger" style="margin-bottom: 20px;">Wrong login or password!</div>
            <? } ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        <? } ?>
    </form>
</div>
<script>
</script>
</body>
</html>
