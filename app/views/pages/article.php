<div class="row">
    <div class="">
        <a href="/article/create" class="btn btn-outline-dark">Add</a>
        <a href="/article/reset" class="btn btn-outline-dark">Reset table</a>
    </div>
</div>
<div class="row mt-2">
    <div>
        <table class="table table-bordered dataTable" id="dataTable" role="grid" style="width: 100px;">
            <thead>
                <tr role="row">
                    <th style="width: 5%;">#</th>
                    <th style="width: 35%;">Title</th>
                    <th style="width: 40%;">Content</th>
                    <th style="width: 20%;">Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">#</th>
                    <th rowspan="1" colspan="1">Title</th>
                    <th rowspan="1" colspan="1">Content</th>
                    <th rowspan="1" colspan="1">Status</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr style="cursor: pointer">
                        <td><?= $article['id'] ?></td>
                        <td><?= $article['title'] ?></td>
                        <td class="items-text"><?= $article['content'] ?></td>
                        <td><?= $article['status'] ?></td>
                        <td width="20%" class="form-group">
                            <div class="d-inline-flex">
                                <button type="submit"
                                        title="Delete"
                                        class="btn btn-outline-light button-delete"
                                        onclick="deleteArticle('<?= $article['id'] ?>')">
                                    <img src="/app/assets/images/delete.png" style="vertical-align: middle" width="18" height="18">
                                </button>
                                <span class="border-btn"></span>
                                <form action="/article/edit" method="post">
                                    <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                    <button title="Edit"
                                       class="btn btn-outline-light button-edit"
                                       type="submit">
                                        <img src="/app/assets/images/edit.png" style="vertical-align: middle" width="18" height="18">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
