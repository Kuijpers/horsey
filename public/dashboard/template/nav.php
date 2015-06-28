<?php
use DKW\Tracking\Session as Session;
?>

<nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">
                    <?php  echo $lang['NAV_TOGGLE']; ?>
                </span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL  ?>index">
               <?php  echo $lang['NAV_WEBSITE']; ?>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!-- START LEFT NAV -->
            <ul class="nav navbar-nav">
<!-- START DASHBOARD -->
                <li <?php if($this->firstactive == 'dashboard'){echo 'class="active"';}  ?> >
                    <a href="<?php echo URL  ?>dashboard/">
                        <span class="glyphicon glyphicon-home"></span>
                        <?php  echo $lang['NAV_DASHBOARD']; ?>
                    </a>
                </li>
<!-- END DASHBOARD -->

<!-- START PAGES -->
                <li class="dropdown <?php if($this->firstactive == 'widgets'){echo 'active';}  ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <?php  echo $lang['NAV_PAGES']; ?> 
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
        <!-- MAIN PAGE -->
                        <li class="<?php if($this->secondactive == 'homepage'){echo 'active';}  ?>" >
                            <a href="<?php echo URL  ?>dashboard/homepage">
                                <?php  echo $lang['NAV_PAGES_HOME']; ?> 
                            </a>
                        </li>
        <!-- ABOUT PAGE -->
                        <li class="<?php if($this->secondactive == 'about_us'){echo 'active';}  ?>" >
                            <a href="<?php echo URL  ?>dashboard/about">
                                <?php  echo $lang['NAV_PAGES_ABOUT']; ?>
                            </a>
                        </li>
        <!-- HORSE PAGE -->
                        <li class="dropdown-submenu <?php if($this->secondactive == 'horses_overview'){echo 'active';}  ?>">
                            <a tabindex="-1" href="<?php echo URL  ?>dashboard/horses">
                                <?php  echo $lang['NAV_PAGES_HORSES']; ?>
                            </a>
                                <ul class="dropdown-menu">
                                  <li class="<?php if($this->thirdactive == 'horses_overview'){echo 'active';}  ?>" >
                                      <a tabindex="-1" href="<?php echo URL  ?>dashboard/horses">
                                          <?php  echo $lang['NAV_PAGES_HORSES_OVERVIEW']; ?>
                                      </a>
                                  </li>
                                  <li class="<?php if($this->thirdactive == 'horses_owned'){echo 'active';}  ?>" >
                                      <a href="<?php echo URL  ?>dashboard/horses/owned">
                                          <?php  echo $lang['NAV_PAGES_HORSES_OWNED']; ?>
                                      </a>
                                  </li>
                                  <li class="<?php if($this->thirdactive == 'horses_friend'){echo 'active';}  ?>" >
                                      <a href="<?php echo URL  ?>dashboard/horses/friend">
                                          <?php  echo $lang['NAV_PAGES_HORSES_FRIENDS']; ?>
                                      </a>
                                  </li>
                                </ul>
                        </li>
                        <li class="divider">
                        </li>
        <!-- FOR SALE -->
                        <li class="dropdown-submenu <?php if($this->secondactive == 'sale'){echo 'active';}  ?>">
                            <a tabindex="-1" href="<?php echo URL  ?>dashboard/sale">
                                <?php  echo $lang['NAV_PAGES_FORSALE']; ?>
                            </a>
                                <ul class="dropdown-menu">
                                  <li <?php if($this->thirdactive == 'sale'){echo 'class="active"';}  ?>>
                                      <a tabindex="-1" href="<?php echo URL  ?>dashboard/sale">
                                          <?php  echo $lang['NAV_PAGES_FORSALE_OVERVIEW']; ?>
                                      </a>
                                  </li>
                                  <li <?php if($this->thirdactive == 'horses_sale'){echo 'class="active"';}  ?>>
                                      <a href="<?php echo URL  ?>dashboard/sale/horses">
                                          <?php  echo $lang['NAV_PAGES_FORSALE_HORSES']; ?>
                                      </a>
                                  </li>
                                  <li <?php if($this->thirdactive == 'equipment_sale'){echo 'class="active"';}  ?>>
                                      <a href="<?php echo URL  ?>dashboard/sale/equipment">
                                          <?php  echo $lang['NAV_PAGES_FORSALE_EQUIPMENT']; ?>
                                      </a>
                                  </li>
                                </ul>
                        </li>
                        <li class="divider"></li>
                        <li  <?php if($this->secondactive == 'links'){echo 'class="active"';}  ?>>
                            <a href="<?php echo URL  ?>dashboard/links">
                                <?php  echo $lang['NAV_PAGES_LINKS']; ?>
                            </a>
                        </li>
                    </ul>
                </li>
<!-- END PAGES -->

<!-- START SETTINGS -->
                <li class="dropdown <?php if($this->firstactive == 'settings'){echo 'active';}  ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-cog"></span>
                        <?php  echo $lang['NAV_SETTINGS']; ?> 
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li <?php if($this->secondactive == 'contact'){echo 'class="active"';}  ?>>
                            <a href="<?php echo URL  ?>dashboard/contact">
                                <?php  echo $lang['NAV_SETTINGS_CONTACT']; ?> 
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li <?php if($this->secondactive == 'breeding'){echo 'class="active"';}  ?>>
                            <a href="<?php echo URL  ?>dashboard/breeding">
                                <?php  echo $lang['NAV_SETTINGS_BREEDING']; ?> 
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo URL  ?>dashboard/sale/settings">
                                <?php  echo $lang['NAV_SETTINGS_FORSALE']; ?> 
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li class="dropdown-submenu <?php if($this->secondactive == 'admin'){echo 'active';}  ?>">
                            <a tabindex="-1" href="<?php echo URL  ?>dashboard/admin/">
                                <?php  echo $lang['NAV_SETTINGS_ADMIN']; ?> 
                            </a>
                                <ul class="dropdown-menu">
                                  <li class="<?php if($this->thirdactive == 'users'){echo 'active';}  ?>">
                                      <a tabindex="-1" href="<?php echo URL  ?>dashboard/users">
                                          <?php  echo $lang['NAV_SETTINGS_ADMIN_USERS']; ?>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?php echo URL  ?>dashboard/#">
                                          Empty for now
                                      </a>
                                  </li>
                                </ul>
                        </li>
                    </ul>
                </li>
<!-- END SETTINGS -->

<!-- START CALENDAR -->
                <li <?php if($this->firstactive == 'calendar'){echo 'class=active';}  ?> >
                    <a href="#">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <?php  echo $lang['NAV_CALENDAR']; ?>
                    </a>
                </li>
<!-- END CALENDAR -->

<!-- START SEARCH -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-search"></span>
                        <?php  echo $lang['NAV_SEARCH']; ?> 
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="min-width: 300px;">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="navbar-form navbar-left" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="<?php  echo $lang['NAV_SEARCH_PLACEHOLDER']; ?>" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                <?php  echo $lang['NAV_SEARCH_GO']; ?>
                                            </button>
                                        </span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
<!-- END SEARCH -->

            </ul>
<!-- END LEFT NAV -->

<!-- START RIGHT NAV -->
            <ul class="nav navbar-nav navbar-right">
<!-- START MESSAGE BOX -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <?php  echo $lang['NAV_MESSAGES']; ?>  
                        <span class="label label-info">32</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <span class="label label-warning">4:00 AM</span>
                                Favourites Snippet
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning">4:30 AM</span>
                                Email marketing
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning">5:00 AM</span>
                                Subscriber focused email design
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" class="text-center">
                                <?php  echo $lang['NAV_MESSAGES_VIEWALL']; ?> 
                            </a>
                        </li>
                    </ul>
                </li>
<!-- END MESSAGE BOX -->

<!-- START PERSONAL STUFF -->
                <li class="dropdown <?php if($this->firstactive == 'userarea'){echo 'active';}  ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                            <?php echo Session::get('user_firstname')." ".Session::get('user_lastname'). " <b>[</b> " . $lang['USERS_DEFAULT_USERTYPE_'.strtoupper (Session::get('login_usertype'))] . " <b>]</b> " ; ?> 
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-user"></span>
                                <?php  echo $lang['NAV_PERSONAL_PROFILE']; ?> 
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-cog"></span>
                                <?php  echo $lang['NAV_PERSONAL_SETTINGS']; ?> 
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo URL  ?>help">
                                <span class="glyphicon glyphicon-question-sign"></span>
                                <?php  echo $lang['NAV_PERSONAL_HELP']; ?> 
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-book"></span>
                                <?php  echo $lang['NAV_PERSONAL_USERGUIDE']; ?> 
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="<?php echo URL  ?>logout">
                                <span class="glyphicon glyphicon-off"></span>
                                <?php  echo $lang['NAV_PERSONAL_LOGOUT']; ?> 
                            </a>
                        </li>
                    </ul>
                </li>
<!-- END PERSONAL STUFF -->
            </ul>
<!-- END RIGHT NAV -->
        </div>
        <!-- /.navbar-collapse -->
    </nav>