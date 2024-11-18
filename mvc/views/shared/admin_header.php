<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">OG!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="<?php echo Utils\BASE_URL ?>/Category/index"
                       class="nav-link">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo Utils\BASE_URL ?>/Product/index"
                       class="nav-link"
                    >
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo Utils\BASE_URL ?>/Customer/index" class="nav-link">
                        Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo Utils\BASE_URL ?>/Order/index"
                       class="nav-link">
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo Utils\BASE_URL ?>/Comment/index"
                       class="nav-link"
                    >
                        Comments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo Utils\BASE_URL ?>/User/log_out"
                       class="nav-link text-danger"
                    >
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>