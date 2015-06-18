<?php
    $this->logged = new DKW\Tracking\Logged();
?>
<div class="row-fluid">
        <div class="span12"> 

        <!-- -----------------------------------------
                Demo 1 -->
            <section id="skin1">
                <div class="navbar">
                    <div class="navbar-inner PL0 PT20">
                        <div class="container">
                            <div class="nav-collapse collapse navbar-responsive-collapse">
                                <ul class="nav">
                                    <li <?php if($this->firstactive == 'index'){echo 'class="active"';}  ?> ><a href="<?php echo URL  ?>index" class="make-round">Home</a></li>
                                    <li <?php if($this->firstactive == 'about'){echo 'class="active"';}  ?> ><a href="<?php echo URL  ?>about">About us</a></li>
                                    <li class="dropdown <?php if($this->firstactive == 'horses'){echo 'active';}  ?> "> <a href="<?php echo URL  ?>horses" class="dropdown-toggle" data-toggle="dropdown">Horses<i class="icon-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu  <?php if($this->secondactive == 'stallions'){echo 'active';}  ?> "> <a tabindex="-1" href="<?php echo URL  ?>horses/stallions">Stallions</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo URL  ?>horses/stallions">No stallions available</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu  <?php if($this->secondactive == 'mares'){echo 'active';}  ?> "> <a tabindex="-1" href="<?php echo URL  ?>horses/mares">Mares</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo URL  ?>horses/mares">No mares available</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu  <?php if($this->secondactive == 'foals'){echo 'active';}  ?> "> <a tabindex="-1" href="<?php echo URL  ?>horses/foals">Foals</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo URL  ?>horses/foals">No foals available</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown <?php if($this->firstactive == 'media'){echo 'active';}  ?> "> <a href="<?php echo URL  ?>media" class="dropdown-toggle" data-toggle="dropdown">Media<i class="icon-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li  <?php if($this->secondactive == 'pictures'){echo 'class="active"';}  ?> ><a href="<?php echo URL  ?>media/picture">Pictures</a></li>
                                            <li  <?php if($this->secondactive == 'videos'){echo 'class="active"';}  ?> ><a href="<?php echo URL  ?>media/video">Videos</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown <?php if($this->firstactive == 'sale'){echo 'active';}  ?> "> <a href="<?php echo URL  ?>sale" class="dropdown-toggle" data-toggle="dropdown">For sale<i class="icon-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu  <?php if($this->secondactive == 'horsesale'){echo 'active';}  ?>"> <a tabindex="-1" href="<?php echo URL  ?>sale/horses">Horses</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo URL  ?>sale/horses">No horses for sale at the moment</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu  <?php if($this->secondactive == 'equipmentsale'){echo 'active';}  ?>"> <a tabindex="-1" href="<?php echo URL  ?>sale/equipment">Equipment</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo URL  ?>sale/equipment">No equipment for sale at the moment</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li <?php if($this->firstactive == 'links'){echo 'class="active"';}  ?> ><a href="<?php echo URL  ?>links">Friends</a></li>
                                    <li <?php if($this->firstactive == 'contact'){echo 'class="active"';}  ?> ><a href="<?php echo URL  ?>contact">Contact</a></li>
<?php
                                        if($this->logged->status_logged()){
?>
                                        <li><a href="<?php echo URL  ?>dashboard">Dashboard</a></li>  
<?php
                                        }else{
?>                                      <li><a href="<?php echo URL  ?>login">Login</a></li>
                                    <?php
                                        }
                                        ?>
                                </ul>
                            </div>
                        <!-- /.nav-collapse --> 
                        </div>
                    </div>
                <!-- /navbar-inner --> 
                </div>
            <!-- /navbar --> 

            </section>
                
        </div>
    <!-- /span12 --> 
    </div>
<!-- /row-fluid --> 