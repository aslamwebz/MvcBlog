    <div class="container-80 ">
        <div class="container">
            <h1>Create new post</h1>
            <form action="/create" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" placeholder="Title..." id="" class="form-control" value="<?php if(!empty($title)) { echo $title; } ?>">
                    <span class="invalidFeedback">
                        <?php  if (!empty($errors['title'])) { echo $errors['title'];}?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="">Body</label>
                    <textarea id="textarea" name="body" class="form-control" rows="20"><?php if(!empty($body)) { echo $body; } ?></textarea>

                    <span class="invalidFeedback">
                        <?php  if (!empty($errors['body'])) { echo $errors['body'];}?>
                    </span>
                </div>

                <div class="form-group">
                    Select post image :
                    <input type="file" name="image" class="form-control" value="<?php if(!empty($image)) { echo $image; } ?>"><br/>
                    <span class="invalidFeedback">
                        <?php  if (!empty($errors['image'])) { echo $errors['image'];}?>
                    </span>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
