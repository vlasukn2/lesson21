<h1>Admin Pages</h1>
<ul>
    <? foreach ($data['pages'] as $page) { ?>
        <li>
            <a href="/21/web/page/view/<?=$page['alias']?>"><?=$page['title']?></a>
            <a href="/21/web/admin/page/edit/<?=$page['id']?>" class="btn btn-success btn-sm">Edit</a>
        </li>
    <? }?>

</ul>