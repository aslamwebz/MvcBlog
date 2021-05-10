<?php
use app\core\Application;

include_once Application::$ROOT_DIR . '/views/partials/flashMessages.php'
;?>

<div class="container">
    <div class=" d-flex align-items-center justify-content-center p-6 m-2" style="height: 80vh;">
        <main class="d-flex w-100 ">
            <div class="container d-flex flex-column">
                <div class="row vh-80">
                    <div class="col-sm-8 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center mt-4">
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <form action="/login" method="post" >
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" id="" class="form-control form-control-lg" value="<?php if(!empty($email)) { echo $email; } ?>">
                                                <span class="invalidFeedback">
                <?php  if (!empty($errors['email'])) { echo $errors['email'];}?>
            </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" id="" class="form-control  form-control-lg">
                                                <span class="invalidFeedback">
                <?php if (!empty($errors['password'])) { echo $errors['password'];}?>
            </span>
                                            </div>
                                            <div>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                                    <span class="form-check-label">
              Remember me next time
            </span>
                                                </label>
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                                <a type="button" href="/register" class="btn btn-lg btn-info">Register</a>
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
</div>
