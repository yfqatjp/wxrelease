
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("subject/index")?>"><?=$this->lang->line('menu_subject')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_subject')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <form class="form-horizontal" role="form" method="post">
                    <!--<?php 
                        if(form_error('classesID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classesID" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_class_name")?>
                        </label>
                        <div class="col-sm-6">
                           <?php
                                $array = array();
                                $array[0] = $this->lang->line("subject_select_classes");
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div>-->

                    <?php 
                        if(form_error('subject')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subject" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_name")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject" name="subject" value="<?=set_value('subject')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('amount'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="amount" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_amount")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount" name="amount" value="<?=set_value('amount')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('amount'); ?>
                        </span>
                    </div>

                    <!--<?php 
                        if(form_error('subject_author')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subject_author" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_author")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject_author" name="subject_author" value="<?=set_value('subject_author')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_author'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('subject_code')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subject_code" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_code")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject_code" name="subject_code" value="<?=set_value('subject_code')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_code'); ?>
                        </span>
                    </div>-->

                    <?php 
                        if(form_error('subject_group')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subject_Group" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_group")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array("" => $this->lang->line("subjec_select_group"));
                                
                              //  $array =  array_merge($array,$subjectgroups);
                              foreach ($subjectgroups as $key=>$value){
                              	$array[$key] = $value;
                              }
                                
                                echo form_dropdown("subject_group", $array, set_value("subject_group"), "id='subject_group' class='form-control'");


                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_group'); ?>
                        </span>
                    </div>

                     <?php 
                        if(form_error('teacherID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacherID" class="col-sm-2 control-label">
                            <?=$this->lang->line("subject_teacher_name")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array();
                                $array[0] = $this->lang->line("subject_select_teacher");
                                foreach ($teachers as $teacher) {
                                    $array[$teacher->teacherID] = $teacher->name;
                                }
                                echo form_dropdown("teacherID", $array, set_value("teacherID"), "id='teacherID' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacherID'); ?>
                        </span>
                    </div>                   
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                        <div id="teacherIDs">
                            <?php
                                if(isset($teacherIDs)){
                                    if($teacherIDs){
                                        foreach($teacherIDs as $teacherID) { 
                                            $teacher = $this->teacher_m->get_teacher($teacherID);
                                            echo "<button type='button' class='btn btn-success btn-xs' onclick='removesubject(this)' style='margin: 5px'>".
                                                $teacher->name."<span class='glyphicon glyphicon-remove'></span></button>".
                                                "<input type='hidden' name='teacherIDs_input[]' value='".
                                                $teacherID."'/>"; 
                                        }
                                    }
                                }
                            ?>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-warning" value="<?=$this->lang->line("add_subject")?>" >
                        </div>
                    </div>

                </form>
            </div> <!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->


<script type="text/javascript">
var teacherIDs = [''];
$('#teacherID').change(function() {
     teacherIDs[$('#teacherID').val()] = $('#teacherID option:selected').text();
     $('#teacherIDs').empty();
     $('#teacherID').val(0);
     for (var index in teacherIDs) {
        if(!teacherIDs[index]){
            continue;
        }
        $('#teacherIDs').append("<button type='button' class='btn btn-success btn-xs' onclick='removesubject(this)' style='margin: 5px'>"
        + teacherIDs[index] + "<span class='glyphicon glyphicon-remove'></span></button>");
        $('#teacherIDs').append("<input type='hidden' name='teacherIDs_input[]' value='"
        + index + "'/>");
    }
});
function removesubject(obj){
    teacherIDs[$(obj).next().val()] = undefined;
    $(obj).next().remove();
    $(obj).remove();
}
</script>