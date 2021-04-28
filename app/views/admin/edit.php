<div class="container-80 ">
    <div class="container">
        <h1>Edit post</h1>

        <form action="/edit" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php if(!empty($id)) { echo $id; } ?>">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="<?php if(!empty($title)) { echo $title;}?>" class="form-control"  id="">

                <span class="invalidFeedback">
                    <?php  if (!empty($errors['title'])) { echo $errors['title'];}?>
                </span>
            </div>

            <div class="form-group">
                <label for="">Body</label>
                <textarea id="textarea" name="body" class="form-control" rows="20"><?php if(!empty($body)) { echo $body; }?></textarea>
                <span class="invalidFeedback">
                    <?php  if (!empty($errors['body'])) { echo $errors['body'];}?>
                </span>
            </div>

            <div class="form-group">
                Select post image :
                <input type="file" name="image" class="form-control" ><br/>
                <input type="hidden" name="oldImage" value="<?php if(!empty($image)) { echo $image; }?>">

                <span class="invalidFeedback">
                        <?php  if (!empty($errors['image'])) { echo $errors['image'];}?>
                    </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
