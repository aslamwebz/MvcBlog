
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($posts as $post): ?>
                <div class="post-preview">
                    <a href="/post/<?php echo $post['id'] ?>">
                        <h2 class="post-title">
                            <?php echo html_entity_decode(ucfirst($post['title'])); ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo html_entity_decode(ucfirst(substr($post['body'], 0, 50))); ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <?php $user =  app\core\Application::$app->user->findUserById($post['user_id']);
                       echo(ucfirst($user->username));
                        ?>
                        on <?php echo $user->created_at; ?></p>
                </div>
            <hr>
            <?php endforeach; ?>
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>

<hr>

