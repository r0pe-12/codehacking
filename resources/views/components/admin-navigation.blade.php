<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Home</a>
    </div>
    <!-- /.navbar-header -->



    <ul class="nav navbar-top-links navbar-right">


        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ route('users.edit', Auth::user()) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('users.index') }}">All Users</a>
                        </li>

                        <li>
                            <a href="{{ route('users.create') }}">Create User</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('posts.index') }}">All Posts</a>
                        </li>

                        <li>
                            <a href="{{ route('posts.create') }}">Create Post</a>
                        </li>

                        <li>
                            <a href="{{ route('comments.index') }}">All Comments</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>


                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Categories<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('categories.index') }}">All Categories</a>
                        </li>

                        <li>
                            <a href="{{ route('categories.index') }}">Create Category</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('media.index') }}">All Media</a>
                        </li>

                        <li>
                            <a href="{{ route('media.create') }}">Upload Media</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="">All Posts</a>
                    </li>

                    <li>
                        <a href="">Create Post</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>





        </ul>

    </div>

</div>
