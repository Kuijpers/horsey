<nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL  ?>index">Website</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo URL  ?>dashboard/"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-list-alt"></span>Widgets <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="<?php echo URL  ?>homepage">Homepage</a></li>
                        <li><a href="<?php echo URL  ?>about_us">About us</a></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Horses</a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="<?php echo URL  ?>horses">Overview horses</a></li>
                                  <li><a href="<?php echo URL  ?>horses_owned">Owned horses</a></li>
                                  <li><a href="<?php echo URL  ?>horses_friend">Friend horses</a></li>
                                </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">For sale</a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="<?php echo URL  ?>for_sale">Overview</a></li>
                                  <li><a href="#">Horses</a></li>
                                  <li><a href="#">Equipment</a></li>
                                </ul>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL  ?>links">Links</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-cog"></span>Settings <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo URL  ?>contact_settings">Contact</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL  ?>breed_settings">Breeding</a></li>
                        <li><a href="#">For Sale</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL  ?>admin_settings/">Admin</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-calendar"></span>Calendar</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-search"></span>Search <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 300px;">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="navbar-form navbar-left" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                Go!</button>
                                        </span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-envelope"></span>Inbox <span class="label label-info">32</span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="label label-warning">4:00 AM</span>Favourites Snippet</a></li>
                        <li><a href="#"><span class="label label-warning">4:30 AM</span>Email marketing</a></li>
                        <li><a href="#"><span class="label label-warning">5:00 AM</span>Subscriber focused email
                            design</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="text-center">View All</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span>Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                        <li><a href="<?php echo URL  ?>help"><span class="glyphicon glyphicon-question-sign"></span>Help</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-book"></span>Userguide</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL  ?>logout"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>