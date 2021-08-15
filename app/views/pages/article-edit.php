<form action="/article/update" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" id="title" class="form-control" value="<?= $data['title'] ?>">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="4"><?= $data['content'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input name="status" id="status" class="form-control" value="<?= $data['status'] ?>">
    </div>
    <input name="id" type="hidden" value="<?= $data['id'] ?>">
    <input class="btn btn-outline-dark mt-3" type="submit" value="Update">
</form>
