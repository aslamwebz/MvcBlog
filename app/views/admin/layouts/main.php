<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/adminStyle.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/ga36hec3gypg9am81j3j5rvhv90lw689ox9elr7cdos25mgd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<div class="container-fluid m-0 p-0">
    <div class="wrapper">
        <?php
        use app\core\Application;
        include_once Application::$ROOT_DIR. '/views/admin/includes/sidebar.php';
        ?>
        <div class="main">
            <?php include_once Application::$ROOT_DIR. '/views/admin/includes/navbar.php';?>

            <div class="container m-4">
                <?php if (Application::$app->session->getFlash('success')): ?>
                    <div class="alert alert-success">
                        <p><?php echo Application::$app->session->getFlash('success') ?></p>
                    </div>
                <?php  elseif (Application::$app->session->getFlash('error')): ?>
                    <div class="alert alert-danger">
                        <p><?php echo Application::$app->session->getFlash('error') ?></p>
                    </div>

                <?php endif; Application::$app->session->removeFlashMessages(); ?>
            </div>

            {{content}}
        </div>
    </div>
    <script>
        tinymce.init({
            selector: '#textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
</body>
</html>