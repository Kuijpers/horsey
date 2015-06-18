<?php
use DKW\Tracking\Session as Session;
?>

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
                <li <?php if($this->firstactive == 'dashboard'){echo 'class="active"';}  ?> ><a href="<?php echo URL  ?>dashboard/"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
                <li class="dropdown <?php if($this->firstactive == 'widgets'){echo 'active';}  ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-list-alt"></span>Widgets <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li class="<?php if($this->secondactive == 'homepage'){echo 'active';}  ?>" ><a href="<?php echo URL  ?>dashboard/homepage">Homepage</a></li>
                        <li class="<?php if($this->secondactive == 'about_us'){echo 'active';}  ?>" ><a href="<?php echo URL  ?>dashboard/about">About us</a></li>
                        <li class="dropdown-submenu <?php if($this->secondactive == 'horses_overview'){echo 'active';}  ?>">
                            <a tabindex="-1" href="<?php echo URL  ?>dashboard/horses">Horses</a>
                                <ul class="dropdown-menu">
                                  <li class="<?php if($this->thirdactive == 'horses_overview'){echo 'active';}  ?>" ><a tabindex="-1" href="<?php echo URL  ?>dashboard/horses">Overview horses</a></li>
                                  <li class="<?php if($this->thirdactive == 'horses_owned'){echo 'active';}  ?>" ><a href="<?php echo URL  ?>dashboard/horses/owned">Owned horses</a></li>
                                  <li class="<?php if($this->thirdactive == 'horses_friend'){echo 'active';}  ?>" ><a href="<?php echo URL  ?>dashboard/horses/friend">Friend horses</a></li>
                                </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu <?php if($this->secondactive == 'sale'){echo 'active';}  ?>">
                            <a tabindex="-1" href="<?php echo URL  ?>dashboard/sale">For sale</a>
                                <ul class="dropdown-menu">
                                  <li <?php if($this->thirdactive == 'sale'){echo 'class="active"';}  ?>><a tabindex="-1" href="<?php echo URL  ?>dashboard/sale">Overview</a></li>
                                  <li <?php if($this->thirdactive == 'horses_sale'){echo 'class="active"';}  ?>><a href="<?php echo URL  ?>dashboard/sale/horses">Horses</a></li>
                                  <li <?php if($this->thirdactive == 'equipment_sale'){echo 'class="active"';}  ?>><a href="<?php echo URL  ?>dashboard/sale//equipment">Equipment</a></li>
                                </ul>
                        </li>
                        <li class="divider"></li>
                        <li  <?php if($this->secondactive == 'links'){echo 'class="active"';}  ?>><a href="<?php echo URL  ?>dashboard/links">Links</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php if($this->firstactive == 'settings'){echo 'active';}  ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-cog"></span>Settings <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li <?php if($this->secondactive == 'contact'){echo 'class="active"';}  ?>><a href="<?php echo URL  ?>dashboard/contact">Contact</a></li>
                        <li class="divider"></li>
                        <li <?php if($this->secondactive == 'breeding'){echo 'class="active"';}  ?>><a href="<?php echo URL  ?>dashboard/breeding">Breeding</a></li>
                        <li><a href="<?php echo URL  ?>dashboard/sale/settings">For Sale</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu <?php if($this->secondactive == 'admin'){echo 'active';}  ?>">
                            <a tabindex="-1" href="<?php echo URL  ?>dashboard/admin/">Admin</a>
                                <ul class="dropdown-menu">
                                  <li class="<?php if($this->thirdactive == 'users'){echo 'active';}  ?>"><a tabindex="-1" href="<?php echo URL  ?>dashboard/users">Users</a></li>
                                  <li><a href="<?php echo URL  ?>dashboard/#">Empty for now</a></li>
                                </ul>
                        </li>
                    </ul>
                </li>
                <li class=<?php if($this->firstactive == 'calendar'){echo 'active';}  ?>><a href="#"><span class="glyphicon glyphicon-calendar"></span>Calendar</a></li>
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
                <li class="dropdown <?php if($this->firstactive == 'userarea'){echo 'active';}  ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span><?php echo Session::get('user_firstname')." ".Session::get('user_lastname'). " <b>[</b> " . ucfirst(Session::get('login_usertype')). " <b>]</b> " ; ?> <b class="caret"></b></a>
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