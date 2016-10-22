
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-routine"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("routine/index")?>"><?=$this->lang->line('menu_routine')?></a></li>
            <li><a href="<?=base_url("routine/routinesbyclass/$routine->subjectID/$routine->day")?>"><?=$this->lang->line('routine_list')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_routine')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <form class="form-horizontal" role="form" method="post">

                    <!-- <?php 
                        if(form_error('classesID'))
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classesID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_classes")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array();
                                $array[0] = $this->lang->line("routine_select_classes");
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $array, set_value("classesID", $routine->classesID), "id='classesID' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div> -->

<!--
                    <?php 
                        /*
                        if(form_error('sectionID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                        */
                    ?>
                        <label for="sectionID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_subject")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                /*
                                $array = array();
                                $array[0] = $this->lang->line("routine_subject_select");
                                foreach ($sections as $section) {
                                    $array[$section->sectionID] = $section->section;
                                }
                            
                                echo form_dropdown("sectionID", $array, set_value("sectionID", $routine->sectionID), "id='sectionID' class='form-control'");
                                */
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sectionID'); ?>
                        </span>
                    </div>
-->
                    <?php 
                        if(form_error('subjectID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subjectID" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_subject")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                            $array = array();
                             $array[0] = $this->lang->line("routine_subject_select");
                                foreach ($subjects as $subject) {
                                    $array[$subject->subjectID] = $subject->subject;
                                }
                            
                            echo form_dropdown("subjectID", $array, set_value("subjectID", $routine->subjectID), "id='subjectID' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subjectID'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('date')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="date" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_date")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                             <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date', $routine->date)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('date'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('start_time')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="start_time" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_start_time")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="start_time" name="start_time" value="<?=set_value('start_time', $routine->start_time)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('start_time'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('end_time')) 
                            echo "<div class='form-group has-error'>";
                        else     
                            echo "<div class='form-group'>";
                    ?>
                        <label for="end_time" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_end_time")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="end_time" name="end_time" value="<?=set_value('end_time', $routine->end_time)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('end_time'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('room')) 
                            echo "<div class='form-group has-error'>";
                        else     
                            echo "<div class='form-group'>";
                    ?>
                        <label for="room" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_room")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="room" name="room" value="<?=set_value('room', $routine->room)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('room'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_routine")?>" >
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('#classesID').change(function() {
    var classesID = $(this).val();
    if(classesID == 0) {
        $('#sectionID').val(0);
        $('#subjectID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('routine/subjectcall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#subjectID').html(data)
            }
        });

        $.ajax({
            type: 'POST',
            url: "<?=base_url('routine/sectioncall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#sectionID').html(data)
            }
        });
    }

});
$('#start_time').timepicker({ 'showMeridian': false });
$('#end_time').timepicker({ 'showMeridian': false });
$('#date').datepicker({
    format: "yyyy-mm-dd",
    startView: 3,
    language: "zh-CN",
    autoclose: true
});
</script>

