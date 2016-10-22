
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-tattendance"></i> <?=$this->lang->line('panel_title')?></h3>
       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("routine/index")?>"><?=$this->lang->line('menu_routine')?></a></li>
            <li class="active"><?=$this->lang->line('routine_list')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php 
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('routine/add') ?>">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>
                

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('routine_date')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('routine_start_time')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('routine_end_time')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('routine_subject')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('routine_room')?></th>
                                <!-- <th class="col-sm-3"><?=$this->lang->line('routine_classes')?></th> -->
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($routines)) {$i = 1; foreach($routines as $routine) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('routine_date')?>">
                                        <?php echo $routine->date; ?>(<?php echo $us_days[$routine->day]; ?>)
                                    </td>
                                    <td data-title="<?=$this->lang->line('routine_start_time')?>">
                                        <?php echo $routine->start_time; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('routine_end_time')?>">
                                        <?php echo $routine->end_time; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('routine_subject')?>">
                                        <?php echo $routine->subject; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('routine_room')?>">
                                        <?php echo $routine->room; ?>
                                    </td>
                                    <!-- <td data-title="<?=$this->lang->line('routine_classes')?>">
                                        <?php 
                                            $classArray = array();
                                            $classes = $this->classes_m->get();
                                            if($classes){
                                                foreach ($classes as $class) {
                                                    $subjectID_data = unserialize($class->subjectID);
                                                    if($subjectID_data){
                                                        foreach ($subjectID_data as $subjectID) {
                                                            if($subjectID == $routine->subjectID){
                                                                $classArray[$class->classesID] =  $class->classes;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            foreach ($classArray as $className) {
                                                echo $className.'|';
                                            }
                                        ?>
                                    </td> -->
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php
                                            echo btn_edit('routine/edit/'.$routine->routineID, $this->lang->line('edit'));
                                            echo btn_delete('routine/delete/'.$routine->routineID, $this->lang->line('delete'));
                                        ?>
                                    </td>
                               </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>

            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('tattendance/student_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>