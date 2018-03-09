<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= lib\Config::get('site_name')?></title>
</head>
<body>
    <div>header</div>
    <div><?=$data['content']?></div>
    <div>footer</div>
</body>
</html>