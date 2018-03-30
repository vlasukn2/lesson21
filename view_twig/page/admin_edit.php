
<div class="page-form">
    <h3>Page:</h3>
    <form action="" method="post">
        <input type="text" class="form-control" name="alias" placeholder="Alias" value="<?=$data['page']['alias']?>"/><br/>
        <input type="text" class="form-control" name="title" placeholder="Title" value="<?=$data['page']['title']?>" /><br/>
        <textarea name="content" class="form-control" placeholder="Content"><?=$data['page']['content']?></textarea><br/>
        <input type="checkbox" class="form-control" name="is_published" <?=$data['page']['is_published'] ? 'checked' : ''?> /><br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="send" value="send">Save</button>
    </form>
</div>
