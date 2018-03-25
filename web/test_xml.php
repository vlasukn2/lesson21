<?php
$url = 'https://planetakino.ua/showtimes/xml/';
    $xml = file_get_contents($url);

    $xml = simplexml_load_string($xml);

    $xpath = $xml->xpath('//show/@full-date');
foreach ($xpath as $i => $element) {
    $item = $element;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?// foreach ($xml as $key => $node) {
//    echo $key;
//}
echo '<ul>';
foreach ($xml->movies->movie as $movie) {

    $dtStart = 'dt-start';

    $id = (int)$movie['id'];
    $name = (string)$movie->title;
    $date = (string)$movie->$dtStart;
//    $date = '';
    echo "<li>$id. $name ($date)</li>";
}
echo '</ul>
===================';

$id1 = (int)$xml->xpath('//movie[1]/@id')[0];

echo '<ul>';
foreach ($xml->xpath("//show[@movie-id=$id1]") as $el) {

    $dtStart = 'dt-start';

    $date = $el['full-date'];
    $time = $el['time'];
    $id = $el['movie-id'];
//    $date = '';
    echo "<li>$id . $date - $time </li>";
}
echo '</ul>';

json_decode("{}");
json_encode();
?>

</body>
</html>
