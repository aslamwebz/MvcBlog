
<!-- Page Header -->
<header class="masthead" style="background-image: url('/images/<?php echo $post['image']; ?>')" style="background-size: contain">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h2 class="post-title">
                        <?php echo html_entity_decode(ucfirst($post['title'])); ?>
                    </h2>
                    <p class="post-meta">Posted by
                        <?php $user =  app\core\Application::$app->user->findUserById($post['user_id']);
                        echo(ucfirst($user->username));
                        ?>
                        on <?php echo $user->created_at; ?></p>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h3 class="post-subtitle">
                    <?php echo html_entity_decode(ucfirst(substr($post['body'], 0, 50))); ?>
                </h3>
                <p>Placeholder text by
                    <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by
                    <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>
            </div>
        </div>
    </div>
</article>

<hr>