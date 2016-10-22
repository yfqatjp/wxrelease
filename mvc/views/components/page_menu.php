        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img style="display:block" src="<?=base_url("uploads/images/".$this->session->userdata('photo'));
                                ?>" class="img-circle" alt="" />
                        </div>

                        <div class="pull-left info">
                            <?php
                                $name = $this->session->userdata("name");
                                if(iconv_strlen($name) > 4) {
                                   $name = iconv_substr($name, 0,4). "..";
                                }
                                echo "<p>".$name."</p>";
                            ?>
                           <?php 
                                    $usertype = $this->session->userdata('usertype');
                                    if($usertype == "Admin" ){?>                                    	
                                         <a href="<?=base_url("profile/index")?>">
                                    <?php } elseif ($usertype == "Teacher" || $usertype == "Salesman"|| $usertype == "Receptionist"|| $usertype == "TeacherManager"){?>
                                              <a href="<?=base_url("teacher/view/".$this->session->userdata('loginuserID'))?>">
                                    <?php } elseif($usertype == "Student") { ?>
                                         <a href="<?=base_url("/student/view/".$this->session->userdata('loginuserID')."/3")?>">
                                    <?php } ?>   
                                <i class="fa fa-hand-o-right color-green"></i>
                                <?=$this->lang->line($this->session->userdata("usertype"))?>
                            </a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $usertype = $this->session->userdata("usertype"); 
                         $userID = $this->session->userdata("loginuserID"); ?>
                    <ul class="sidebar-menu">
                        <li>
                            <?php
                                echo anchor('dashboard/index', '<i class="fa fa-laptop"></i><span>'.$this->lang->line('menu_dashboard').'</span>');
                            ?>
                        </li>

                        <?php
                            if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman" || $usertype == "Receptionist") {
                                echo '<li>';
                                    echo anchor('student/index', '<i class="fa icon-student  fa-lg"></i><span>'.$this->lang->line('menu_student').'</span>');
                                echo '</li>';
                            }
                        ?>

                        <?php
                            if($usertype == "Admin" || $usertype == "TeacherManager") {
                                echo '<li>';
                                    echo anchor('teacher/index', '<i class="fa icon-teacher"></i><span>'.$this->lang->line('menu_teacher').'</span>');
                                echo '</li>';
                            }
                        ?>


                        <?php
                             if($usertype == "Admin" || $usertype == "TeacherManager") {
                                echo '<li>';
                                    echo anchor('classes/index', '<i class="fa fa-sitemap"></i><span>'.$this->lang->line('menu_classes').'</span>');
                                echo '</li>';
                            }
                        ?>


                        <?php
                            if($usertype == "Admin" || $usertype == "TeacherManager")  {
                                echo '<li>';
                                echo anchor('subject/index', '<i class="fa icon-subject"></i><span>'.$this->lang->line('menu_subject').'</span>');
                                echo '</li>';
                            }
                        ?>

                        <?php
                             if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman" || $usertype == "Receptionist") {
                                echo '<li>';
                                    echo anchor('routine/index', '<i class="fa icon-routine"></i><span>'.$this->lang->line('menu_routine').'</span>');
                                echo '</li>';
                            }
                        ?>

                        <?php if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Teacher" || $usertype == "Salesman"|| $usertype == "Receptionist") { ?>
                            <li class="treeview" id="tattendance">
                                <a href="#">
                                    <i class="fa icon-attendance"></i>
                                    <span><?=$this->lang->line('menu_attendance');?> </span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu" >
                                    <li>
                                        <?php echo anchor('sattendance/index', '<i class="fa icon-sattendance"></i><span>'.$this->lang->line('menu_student_attendance_view').'</span>'); ?>
                                    </li>   
                                    <li>
                                        <?php echo anchor('sattendance/add', '<i class="fa icon-sattendance"></i><span>'.$this->lang->line('menu_student_attendance_input').'</span>'); ?>
                                    </li> 
                                    <!--  
                                    <li>
                                        <?php echo anchor('tattendance/index', '<i class="fa icon-tattendance"></i><span>'.$this->lang->line('menu_tattendance').'</span>'); ?>
                                    </li>
                                    -->
                                </ul>
                            </li>
                        <?php } ?>
                        
                        <?php if($usertype == "Admin" ||  $usertype == "TeacherManager" || $usertype == "Teacher"|| $usertype == "Salesman" || $usertype == "Receptionist") { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-money"></i>
                                    <span><?=$this->lang->line('menu_tattendance');?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php
                                        if($usertype == "Admin" ||  $usertype == "TeacherManager" ) {
                                            echo '<li>';
                                                echo anchor('tattendance/index', '<i class="fa fa-money"></i><span>'.$this->lang->line('menu_tattendance_view').'</span>');
                                            echo '</li>';
                                        }
                                        
                            
                                        if( $usertype == "Teacher"|| $usertype == "Salesman" || $usertype == "Receptionist") {
                                            echo '<li>';
                                            echo anchor('tattendance/detaile/'.$userID, '<i class="fa fa-money"></i><span>'.$this->lang->line('menu_tattendance_view').'</span>');
                                            echo '</li>';
                                        }
                                    ?>
                                    <li>
                                        <?php echo anchor('tattendance/add', '<i class="fa fa-money"></i><span>'.$this->lang->line('menu_tattendance').'</span>'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        
                        <?php if($usertype == "Admin") { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa icon-account"></i>
                                    <span><?=$this->lang->line('menu_account');?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <?php echo anchor('invoice/index', '<i class="fa icon-invoice"></i><span>'.$this->lang->line('menu_invoice').'</span>'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if($usertype == "Admin") { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-money"></i>
                                    <span><?=$this->lang->line('menu_wage');?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <?php echo anchor('wage/', '<i class="fa fa-calculator"></i><span>'.$this->lang->line('menu_wage_calculator').'</span>'); ?>
                                    </li>
                                    <li>
                                        <?php echo anchor('wage/view', '<i class="fa fa-credit-card"></i><span>'.$this->lang->line('menu_wage_view').'</span>'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>


                        
                        <?php if($usertype == "Admin") { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-gears"></i>
                                    <span><?=$this->lang->line('menu_setting');?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <?php echo anchor('setting/', '<i class="fa fa-gears"></i><span>'.$this->lang->line('menu_setting').'</span>'); ?>
                                    </li>
                                    <li>
                                        <?php echo anchor('setting/parameterset', '<i class="fa fa-credit-card"></i><span>'.$this->lang->line('menu_subject_group').'</span>'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        
                        
                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>
