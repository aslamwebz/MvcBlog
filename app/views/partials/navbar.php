<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid m-1">
        <a class="navbar-brand" href="/">MVC BLOG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
            </ul>
                <ul class="navbar-nav d-flex">
                    <?php if(\app\core\Application::isGuest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>

                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Dashboard</a>
                        </li>

                    <?php endif; ?>

                </ul>
        </div>
    </div>
</nav>

