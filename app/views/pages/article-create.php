<div class="mt-3">
    <form action="/article/store" method="post" id="validation-form" novalidate>
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" id="title" class="form-control" required>
            <div class="invalid-feedback">Field Title is required.</div>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
            <div class="invalid-feedback">Field Content is required.</div>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input name="status" id="status" class="form-control" required>
            <div class="invalid-feedback">Field Status is required.</div>
        </div>
        <input class="btn btn-outline-dark mt-3" type="submit" value="Add">
    </form>
</div>
