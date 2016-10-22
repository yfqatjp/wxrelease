
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("subject/index")?>"><?=$this->lang->line('menu_subject')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_subject')?></li>
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
                                $array[0] = $this->lang->line("subject_select_teacher");
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $array, set_value("classesID", $subject->classesID), "id='classesID' class='form-control'");
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
                            <input type="text" class="form-control" id="subject" name="subject" value="<?=set_value('subject', $subject->subject)?>" >
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
                            <input type="text" class="form-control" id="amount" name="amount" value="<?=set_value('amount', $subject->amount)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('amount'); ?>
                        </span>
                    </div>

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
                              /*  $array = array("" => $this->lang->line("subjec_select_group"));
                                foreach ($subjectgroups as $subjectgroup) {
                                    $array[$subjectgroup->code] = $subjectgroup->codeValue;
                                }
                                echo form_dropdown("subject_group", $array, set_value("subject_group"), "id='subject_group' class='form-control'");
*/
                                $array = array("" => $this->lang->line("subjec_select_group"));
                                
	                              foreach ($subjectgroups as $key=>$value){
	                              	$array[$key] = $value;
	                              }
                                echo form_dropdown("subject_group", $array, set_value("subject_group",$subject->subjectGroup), "id='subject_group' class='form-control'");
                                
                                
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_group'); ?>
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
                            <input type="text" class="form-control" id="subject_author" name="subject_author" value="<?=set_value('subject_author', $subject->subject_author)?>" >
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
                            <input type="text" class="form-control" id="subject_code" name="subject_code" value="<?=set_value('subject_code', $subject->subject_code)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_code'); ?>
                        </span>
                    </div>-->
                    
                    <?php 
                        if(form_error('teacherIDs_input')) 
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
                            <?php echo form_error('teacherIDs_input'); ?>
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
                                }else{
                                    $subject_teacher_details = $this->subject_teacher_details_m->get_by_subjectID($subject->subjectID);
                                    foreach($subject_teacher_details as $item) {
                                        $teacher = $this->teacher_m->get_teacher($item->teacherID);
                                        if($teacher){
                                            $teacher_name = $teacher->name;
                                        }else{
                                            $teacher_name = $item->name;
                                        }
                                        echo "<button type='button' class='btn btn-success btn-xs' onclick='removesubject(this)' style='margin: 5px'>".
                                            $teacher_name."<span class='glyphicon glyphicon-remove'></span></button>".
                                            "<input type='hidden' name='teacherIDs_input[]' value='".
                                            $item->teacherID."'/>"; 
                                    }
                                }
                            ?>
                        <div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-warning" value="<?=$this->lang->line("update_subject")?>" >
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
$().ready(
    function(){
        for(var i=0; i < $('input[name^=teacherIDs_input]').length; i++){
            var item = $('input[name^=teacherIDs_input]').get(i);
            teacherIDs[$(item).val()] = $(item).prev().text();
        }
        
    }
);
</script>