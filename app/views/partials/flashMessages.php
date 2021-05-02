<?php
use app\core\Application;

if (Application::$app->session->getFlash('success')): ?>
    <div class="container p-4">
        <div class="alert alert-success">
            <p><?php echo Application::$app->session->getFlash('success') ?></p>
        </div>
    </div>
<?php elseif (Application::$app->session->getFlash('error')): ?>
<div class="container p-4">
    <div class="alert alert-danger">
        <p><?php echo Application::$app->session->getFlash('error') ?></p>
    </div>
</div>
<?php endif;
Application::$app->session->removeFlashMessages(); ?>
