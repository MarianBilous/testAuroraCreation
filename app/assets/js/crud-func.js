function deleteArticle(id) {
    let data = 'id=' + id;

    var html = $.ajax({
        type: 'POST',
        url: '/article/delete',
        data: data,
        success: function () {
            window.location.reload(true);
        }
    }).responseText;
}
