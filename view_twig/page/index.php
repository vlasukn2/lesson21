<h1>Pages</h1>
<ul>
    <? foreach ($data['pages'] as $page) { ?>
        <li><a href="/21/web/page/view/<?=$page['alias']?>"><?=$page['title']?></a></li>
    <? }?>

</ul>