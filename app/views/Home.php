<!-- Page Header -->
<header class="masthead" style="background-image: url('images/hero.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>PHP MVC Blog</h1>
                    <span class="subheading">Enjoy the life</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
            <?php
                if(!empty($posts)):
                    foreach ($posts as $post): ?>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                    <img src="images/<?php echo $post['image']; ?>" alt="" class="post-image">
                            </div>
                            <div class="col-xs-10 col-md-8">
                                <div class="post-preview">
                                    <a href="/post/<?php echo $post['id'] ?>">
                                        <h3 class="post-title">
                                            <?php echo html_entity_decode(ucfirst($post['title'])); ?>
                                        </h3>
                                        <h4 class="post-subtitle">
                                            <?php echo html_entity_decode(ucfirst(substr($post['body'], 0, 50))); ?>
                                        </h4>
                                    </a>
                                    <p class="post-meta">Posted by
                                        <?php $user = app\core\Application::$app->user->findUserById($post['user_id']);
                                        echo(ucfirst($user->username));
                                        ?>
                                        on <?php echo$post['created_at']; ?></p>
                                </div>
                            </div>
                        <hr>
                        <?php
                    endforeach;
                else: ?>
                    <h4 class="text-center m-4">No posts to display, Please enter some posts</h4>
                <?php endif;?>
    </div>

    <hr>

