<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-routine"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("routine/index")?>"><?=$this->lang->line('menu_routine')?></a></li>
            <li class="active"><?=$this->lang->line('edit')?> <?=$this->lang->line('menu_routine')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <form class="form-horizontal" role="form" method="post">
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
                                $array2 = array('0' => $this->lang->line("routine_subject_select"));
                                if($subjects != "empty") {
                                    foreach ($subjects as $subject) {
                                        $array2[$subject->subjectID] = $subject->subject;
                                    }
                                }

                                $sID = 0;
                                if($subjectID == 0) {
                                    $sID = 0;
                                } else {
                                    $sID = $subjectID;
                                }

                                echo form_dropdown("subjectID", $array2, set_value("subjectID", $subjectID), "id='subjectID' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subjectID'); ?>
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
                            <input type="text" class="form-control" id="start_time" name="start_time" value="<?=set_value('start_time', $start_time)?>" >
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
                            <input type="text" class="form-control" id="end_time" name="end_time" value="<?=set_value('end_time', $end_time)?>" >
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
                            <input type="text" class="form-control" id="room" name="room" value="<?=set_value('room', $room)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('room'); ?>
                        </span>
                    </div>
                    <?php
                        if(form_error('color'))
                            echo "<div class='form-group has-error'>";
                        else
                            echo "<div class='form-group'>";
                    ?>
                        <label for="color" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_color")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="color" name = "color" class="form-control" value="<?=set_value('color', $color)?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('color'); ?>
                        </span>
                    </div>        
                   <?php
                        if(form_error('days_input'))
                            echo "<div class='form-group has-error'>";
                        else
                            echo "<div class='form-group'>";
                    ?>
                        <label for="day" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_day")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array_merge(array(
                                    '' => $this->lang->line("routine_day_select")
                                ),$us_days);
                                echo form_dropdown("day", $array, set_value("day", $day), "id='day' class='form-control' disabled");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('days_input'); ?>
                        </span>
                    </div>
                    <div class='form-group'>
                        <label for="day" class="col-sm-2 control-label">
                            对象日期
                        </label>
                        <div class="col-sm-6">
                            <?php
                                foreach ($routines as $value) {
                                    echo $value->date.' ('.$value->start_time.' - '.$value->end_time.') '.'<br>';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_batch_routine")?>" >
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

  <script>
        $(document).ready( function() {
                $('#color').minicolors({
                    control: $(this).attr('data-control') || 'wheel',
                    defaultValue: $(this).attr('data-defaultValue') || '',
                    format: $(this).attr('data-format') || 'hex',
                    keywords: $(this).attr('data-keywords') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    change: function(value, opacity) {
                        if( !value ) return;
                        if( opacity ) value += ', ' + opacity;
                        if( typeof console === 'object' ) {
                            console.log(value);
                        }
                    },
                    theme: 'bootstrap'
                });

        });
    </script>
</head>


<script type="text/javascript">
$('#start_time').timepicker({ 'showMeridian': false });
$('#end_time').timepicker({ 'showMeridian': false });
</script>