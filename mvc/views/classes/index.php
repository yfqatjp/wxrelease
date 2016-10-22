
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sitemap"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_classes')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin" || $usertype == "TeacherManager") {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('classes/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('classes_name')?></th>
                                <th><?=$this->lang->line('classes_amount')?></th>                                
                                <th><?=$this->lang->line('classes_note')?></th>
                                <!-- <th><?=$this->lang->line('classes_category')?></th> -->
                                <th><?=$this->lang->line('classes_subject')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($classes)) {
                                    $i = 1;
                                    foreach($classes as $class) {
                                        if($class->classesID <> "1") {
                            ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('classes_name')?>">
                                        <?php echo $class->classes; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('classes_amount')?>">
                                        <?php echo $class->amount; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('classes_note')?>">
                                        <?php echo $class->note; ?>
                                    </td>
                                    <!-- <td data-title="<?=$this->lang->line('classes_category')?>">
                                        <?php 
                                            $studentCategory = $this->session->userdata("studentCategory");
                                            if($class->category){
                                                echo $studentCategory[$class->category]; 
                                            }
                                        ?>
                                    </td> -->
                                    <td data-title="<?=$this->lang->line('classes_note')?>">
                                        <?php
                                        
                                            $count = 0;
                                            $course_details = $this->course_details_m->get_by_classID($class->classesID);
                                            foreach($course_details as $item) { 
                                                $subject = $this->subject_m->get($item->subjectID);
                                                if($subject){
                                                    echo $subject->subject.' |'; 
                                                }else{
                                                    echo $item->subject_name.' | '; 
                                                }
                                                $count++;
                                                
                                                if($count % 6 == 0) echo "</br>";
                                                
                                            }
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_edit('classes/edit/'.$class->classesID, $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('classes/delete/'.$class->classesID, $this->lang->line('delete')) ?>
                                    </td>
                                </tr>
                            <?php $i++;
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
