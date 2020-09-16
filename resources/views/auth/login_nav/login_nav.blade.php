<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="ture" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a href="#" class="navbar-brand">
                    <img src="{{asset('')}}dist/img/avatar.png" alt="Logo" class="img-circle"
                         style="width: 50px;height: 50px;">
                    <span class="brand-text text-light" style="font-weight: bold;">GoldUSMLEReview</span>
                </a>
            </li>
        </ul>
        <a href="{{route('login')}}"><i class="fa fa-user" aria-hidden="true"
                       style="color: white;font-size: 22px; margin-right: 25px;"></i></a>
        <a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"
                       style="color: white;font-size: 22px; margin-right: 20px;"></i></a>
        <a class="nav-link my-2 my-lg-0" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars" style="color: white;font-size: 22px; margin-right: 20px;"></i>
        </a>
    </div>
</nav>
