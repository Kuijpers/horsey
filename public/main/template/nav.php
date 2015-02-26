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
                                    <li class="active"><a href="<?php URL  ?>index" class="make-round">Home</a></li>
                                    <li><a href="<?php URL  ?>about">About us</a></li>
                                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Horses<i class="icon-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Stallions</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php URL  ?>horse">No stallions available</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Mares</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php URL  ?>horse">No mares available</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Foals</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php URL  ?>horse">No foals available</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Media<i class="icon-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php URL  ?>picture">Pictures</a></li>
                                            <li><a href="<?php URL  ?>video">Videos</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">For sale<i class="icon-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Horses</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php URL  ?>sale">No horses for sale at the moment</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Equipment</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php URL  ?>sale">No equipment for sale at the moment</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php URL  ?>friends">Friends</a></li>
                                    <li><a href="<?php URL  ?>contact">Contact</a></li>
<?php
                                        if(Logged::status_logged()){
?>
                                        <li><a href="<?php URL  ?>dashboard">Dashboard</a></li>  
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