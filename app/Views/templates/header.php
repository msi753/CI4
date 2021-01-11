<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
</head>
<body>
    <!-- esc는 XSS 공격을 예방할 수 있다 -->
    <h1><?= esc($title); ?></h1>