<div class="container ">
    <main class="d-flex w-100 ">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Get started</h1>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="/register" method="post" class="form-group">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" name="username" id="" class="form-control" value="<?php if(!empty($username)) { echo $username; } ?>">
                                            <span class="invalidFeedback">
                                               <?php  if (!empty($errors['username'])) { echo $errors['username'];}?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="firstname" id="" class="form-control" value="<?php if(!empty($firstName)) { echo $firstName; } ?>">
                                            <span class="invalidFeedback">
                                               <?php  if (!empty($errors['firstname'])) { echo $errors['firstname'];}?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lastname" id="" class="form-control" value="<?php if(!empty($lastName)) { echo $lastName; } ?>">
                                            <span class="invalidFeedback">
                                               <?php  if (!empty($errors['lastname'])) { echo $errors['lastname'];}?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="" class="form-control" value="<?php if(!empty($email)) { echo $email; } ?>">
                                            <span class="invalidFeedback">
                                                <?php  if (!empty($errors['email'])) { echo $errors['email'];}?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="text" name="password" id="" class="form-control" >
                                            <span class="invalidFeedback">
                                                <?php  if (!empty($errors['password'])) { echo $errors['password'];}?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="text" name="confirmpassword" id="" class="form-control">
                                            <span class="invalidFeedback">
                                                <?php  if (!empty($errors['confirmpassword'])) { echo $errors['confirmpassword'];}?>
                                            </span>
                                        </div>
                                        <div class="text-center mt-3">
                                            <!--                                        <a href="index.html" class="btn btn-lg btn-primary">Sign up</a>-->
                                            <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                                            <a href="/" type="button" class="btn btn-lg btn-danger">Cancal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>