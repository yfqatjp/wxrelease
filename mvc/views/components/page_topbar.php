        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url('dashboard/index'); ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <?php //if(count($siteinfos)) { echo $siteinfos->sname; } ?>
            <?php
            if(count($siteinfos->photo)) {
                echo "<center><img width='140' height='42' src=".base_url('uploads/images/'.$siteinfos->photo)." /></center>";
            }
           ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="language-img" src="<?php 
                                $image = $this->session->userdata('lang'); 
                                echo base_url('uploads/language_image/'.$image.'.png'); ?>" 
                                /> 
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url("uploads/images/".$this->session->userdata('photo')); 
                                ?>" class="user-logo" alt="" />
                                
                                <span>
                                    <?php
                                        $name = $this->session->userdata('name');
                                        if(iconv_strlen($name) > 4) {
                                           echo iconv_substr($name, 0,4). ".."; 
                                        } else {
                                            echo $name;
                                        }
                                    ?>
                                    <i class="caret"></i>
                                </span>   
                            </a>

                            <ul class="dropdown-menu">

                                <!-- Menu Body -->

                                <li class="user-body">
                                    <div class="col-xs-6 text-center">
                                   <?php 
                                    $usertype = $this->session->userdata('usertype');
                                    if($usertype == "Admin" ){?>                                    	
                                         <a href="<?=base_url("profile/index")?>">
                                    <?php } elseif ($usertype == "Teacher" || $usertype == "Salesman"|| $usertype == "Receptionist"|| $usertype == "TeacherManager"){?>
                                              <a href="<?=base_url("teacher/view/".$this->session->userdata('loginuserID'))?>">
                                    <?php } elseif($usertype == "Student") { ?>
                                         <a href="<?=base_url("/student/view/".$this->session->userdata('loginuserID')."/3")?>">
                                    <?php } ?>                                                                            
                                            <div><i class="fa fa-briefcase"></i></div>
                                            <?=$this->lang->line("profile")?> 
                                        </a>

                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="<?=base_url("signin/cpassword")?>">
                                            <div><i class="fa fa-lock"></i></div>
                                            <?=$this->lang->line("change_password")?> 
                                        </a>
                                    </div>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">

                                    <div class="text-center">
                                        <a href="<?=base_url("signin/signout")?>">
                                            <div><i class="fa fa-power-off"></i></div>
                                            <?=$this->lang->line("logout")?> 
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>