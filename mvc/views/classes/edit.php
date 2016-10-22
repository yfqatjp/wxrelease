
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sitemap"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("classes/index")?>"></i> <?=$this->lang->line('menu_classes')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_classes')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <form class="form-horizontal" role="form" method="post">

                    <?php
                        if(form_error('classes'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>

                        <label for="classes" class="col-sm-2 control-label">
                            <?=$this->lang->line("classes_name")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="classes" name="classes" value="<?=set_value('classes', $classes->classes);?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classes'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('amount'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                        ?>
                        <label for="amount" class="col-sm-2 control-label">
                            <?=$this->lang->line("classes_amount")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount" name="amount" value="<?=set_value('amount', $classes->amount)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('amount'); ?>
                        </span>
                    </div>
                    <?php
                        if(form_error('note'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="note" class="col-sm-2 control-label">
                            <?=$this->lang->line("classes_note")?>
                        </label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;" class="form-control" id="note" name="note"><?=set_value('note', $classes->note);?></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('note'); ?>
                        </span>
                    </div>
                    <!-- <?php
                           if(form_error('category'))
                               echo "<div class='form-group has-error' >";
                           else
                               echo "<div class='form-group' >";
                     ?>
                    <label class="col-sm-2 control-label"><?=$this->lang->line("classes_category")?></label>
                        <div class="col-sm-6">
                        <?php
                            $studentCategory = $this->session->userdata("studentCategory");
                            if (isset($classes)){
                                echo form_dropdown("category", $studentCategory, set_value("category",$classes->category), "id='category' class='form-control'");
                            }else{
                                echo form_dropdown("category", $studentCategory, set_value("category"), "id='category' class='form-control'");
                            }
                        ?>

                        </div>
                    </div> -->
                    
                    <?php
                        if(form_error('subject'))
                            echo "<div class='form-group has-error'>";
                        else
                            echo "<div class='form-group'>";
                    ?>
                        <label for="subject" class="col-sm-2 control-label">
                            <?=$this->lang->line("classes_subject")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array();
                                $array[0] = $this->lang->line("classes_select_subject");
                                foreach ($subjects as $subject) {
                                    $array[$subject->subjectID] = $subject->subject;
                                }
                                echo form_dropdown("subject", $array, set_value("subject"), "id='subject' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                        <div id="subjects">
                            <?php
                                if(isset($subjectIDs)){
                                    if($subjectIDs){
                                        foreach($subjectIDs as $subjectID) { 
                                            $subject = $this->subject_m->get($subjectID);
                                            echo "<button type='button' class='btn btn-success btn-xs' onclick='removesubject(this)' style='margin: 5px'>".
                                                $subject->subject."<span class='glyphicon glyphicon-remove'></span></button>".
                                                "<input type='hidden' name='subjects_input[]' value='".
                                                $subjectID."'/>"; 
                                        }
                                    }
                                }else{
                                    $course_details = $this->course_details_m->get_by_classID($classes->classesID);
                                    foreach($course_details as $item) { 
                                        $subject = $this->subject_m->get($item->subjectID);
                                        if($subject){
                                            $subject_name = $subject->subject;
                                        }else{
                                            $subject_name = $item->subject_name;
                                        }
                                        echo "<button type='button' class='btn btn-success btn-xs' onclick='removesubject(this)' style='margin: 5px'>".
                                            $subject_name."<span class='glyphicon glyphicon-remove'></span></button>".
                                            "<input type='hidden' name='subjects_input[]' value='".
                                            $item->subjectID."'/>"; 
                                    }
                                }
                            ?>
                        <div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-warning" value="<?=$this->lang->line("update_class")?>" >
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var subjects = [''];
$('#subject').change(function() {
     subjects[$('#subject').val()] = $('#subject option:selected').text();
     $('#subjects').empty();
     $('#subject').val(0);
     for (var index in subjects) {
        if(!subjects[index]){
            continue;
        }
        $('#subjects').append("<button type='button' class='btn btn-success btn-xs' onclick='removesubject(this)' style='margin: 5px'>"
        + subjects[index] + "<span class='glyphicon glyphicon-remove'></span></button>");
        $('#subjects').append("<input type='hidden' name='subjects_input[]' value='"
        + index + "'/>");
    }
});
function removesubject(obj){
    subjects[$(obj).next().val()] = undefined;
    $(obj).next().remove();
    $(obj).remove();
}
$().ready(
    function(){
        for(var i=0; i < $('input[name^=subjects_input]').length; i++){
            var item = $('input[name^=subjects_input]').get(i);
            subjects[$(item).val()] = $(item).prev().text();
        }
        
    }
);
</script>