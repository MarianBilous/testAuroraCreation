<!DOCTYPE html>
<html>
    <head>
        <!-- CSS -->
        <link rel="stylesheet" href="/app/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/app/assets/css/custom-style.css">

        <!-- Library JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/app/assets/js/validation-forms.js"></script>
        <script src="/app/assets/js/bootstrap.min.js"></script>
        <script src="/app/assets/js/crud-func.js"></script>
    </head>
    <body style="background: #f3f3f3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <a href="/" class="navbar-brand">Admin panel</a>
        </nav>

        <div class="container" style="float: left">
            <div class="row">
                <div>
                    <div class="bg-light" style="min-width: 200px">
                        <div class="list-group">
                            <a href="/article" class="list-group-item list-group-item-action">Article</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="m-4">
                        <?php include $page ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>