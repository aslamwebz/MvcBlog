<div class="container p-0">
    <h1 class="h3 mb-3">Profile</h1>

    <div class="row">
        <div class="col-md-10 col-xl-10">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title mb-0"><?php echo ucfirst($user->username); ?></h3>
                    <br>
                    <h5 class="card-title mb-0"><?php echo $user->first_name; ?></h5>
                    <div class="text-muted mb-2"><?php echo $user->last_name; ?></div>

                    <div>
                        <a class="btn btn-primary btn-sm" href="#">Edit Profile</a>
                    </div>
                </div>

                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">About</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid cum debitis esse nemo rerum.</li>
                    </ul>
                </div>
            </div>
        </div>


        </div>
    </div>

