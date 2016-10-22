
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-routine"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("routine/index")?>"><?=$this->lang->line('menu_routine')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_routine')?></li>
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
                                echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control'");
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
                            <?=$this->lang->line("routine_section")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                /*
                                $array = array();
                                $array[0] = $this->lang->line("routine_select_section");

                                if($sections != "empty") {
                                    foreach ($sections as $section) {
                                        $array[$section->sectionID] = $section->section;
                                    }
                                }

                                $secID = 0;
                                if($sectionID == 0) {
                                    $secID = 0;
                                } else {
                                    $secID = $sectionID;
                                }


                                echo form_dropdown("sectionID", $array, set_value("sectionID"), "id='sectionID' class='form-control'");
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

                                echo form_dropdown("subjectID", $array2, set_value("subjectID"), "id='subjectID' class='form-control'");
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
                            <input type="text" class="form-control" id="start_time" name="start_time" value="<?=set_value('start_time')?>" >
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
                            <input type="text" class="form-control" id="end_time" name="end_time" value="<?=set_value('end_time')?>" >
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
                            <input type="text" class="form-control" id="room" name="room" value="<?=set_value('room')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('room'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('start_day'))
                            echo "<div class='form-group has-error'>";
                        else
                            echo "<div class='form-group'>";
                    ?>
                        <label for="start_day" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_start_day")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="start_day" name="start_day" value="<?=set_value('start_day', $start_day)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('start_day'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('count'))
                            echo "<div class='form-group has-error'>";
                        else
                            echo "<div class='form-group'>";
                    ?>
                        <label for="count" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_count")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array();
                                for ($i=1; $i <= 36; $i++) {
                                    $array[$i] = $i;
                                }
                                echo form_dropdown("count", $array, set_value("count",$count), "id='count' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('count'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('cycle'))
                            echo "<div class='form-group has-error'>";
                        else
                            echo "<div class='form-group'>";
                    ?>
                        <label for="cycle" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_times_of_week")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array();
                                for ($i=1; $i <=7 ; $i++) { 
                                    $array[$i] = $i;
                                }
                                echo form_dropdown("cycle", $array, set_value("cycle",$cycle), "id='cycle' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('cycle'); ?>
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
                            <input type="text" id="color" name = "color" class="form-control" value="#00ffff">
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
                            <?=$this->lang->line("routine_day")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array_merge(array(
                                    '' => $this->lang->line("routine_day_select")
                                ),$us_days);
                                echo form_dropdown("day", $array, set_value("day",$cycle), "id='day' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('days_input'); ?>
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                        <div id="days">
                        </div>
                        </div>
                    </div>
                    <?php
                        if(form_error('holiday'))
                            echo "<div class='form-group has-error'>";
                        else
                            echo "<div class='form-group'>";
                    ?>
                        <label for="holiday" class="col-sm-2 control-label">
                            <?=$this->lang->line("routine_holiday")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = array(
                                );
                                echo form_dropdown("holiday", $array, set_value("holiday",""), "id='holiday' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('holiday'); ?>
                        </span>
                    </div>
                  <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                        <div id="holidays">
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_routine")?>" >
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
// 画面临时保存用的休日列表
var holidays = [''];
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
// 课程计划开始日的日期选择框追加
$('#start_day').datepicker({
    format: "yyyy-mm-dd",
    startView: 3,
    language: "zh-CN",
    autoclose: true
});
function get_holiday_list(){
    var dayArray = [];
    for (var index in days) {
        if(!days[index]){
            continue;
        }
        dayArray.push(index);
    }
    $.ajax({
        type: 'POST',
        url: "<?=base_url('routine/get_holiday_list')?>",
        data: {
            start_day:$('#start_day').val(),
            count:$('#count').val(),
            cycle:$('#cycle').val(),
            holiday:holidays,
            days:dayArray
        },
        dataType: "html",
        success: function(data) {
            $('#holiday').html(data);
            $('#holidays').empty();
            for (var index in holidays) {
                if(!holidays[index]){
                    continue;
                }
                $('#holidays').append("<button type='button' class='btn btn-success btn-xs' onclick='removeHoliday(this)' style='margin: 5px'>"
                + holidays[index] + "<span class='glyphicon glyphicon-remove'></span></button>");
                $('#holidays').append("<input type='hidden' name='holidays_input[]' value='"
                + holidays[index] + "'/>");
            }
        }
    });
}
// 课程开始日的变更事件绑定
$('#start_day').change(function() {
    clear_holiday();
    get_holiday_list();
});
$('#count').change(function() {
    clear_holiday();
    get_holiday_list();
});
$('#cycle').change(function() {
    checkDays();
    clear_holiday();
    get_holiday_list();
});
function clear_holiday(){
    $('#holiday').empty();
    holidays = [''];
}
// 休息日选择的时候触发的操作
$('#holiday').change(function() {
     if(holidays.toString().indexOf($('#holiday').val()) < 0){
         holidays.push($('#holiday').val());
     }else{
         var msg = $('#holiday').val();
         if(msg != ''){
            alert(msg + "已在休息日中，请选择其它日期！");
            return false;
         }
     }
     get_holiday_list();
});
// 画面初始化时，显示默认的待选休日
$().ready(
    function(){
        get_holiday_list();       
    }
);
function removeHoliday(obj){
    for (var i=0; i < holidays.length; i++) {
        if(holidays[i] == $(obj).text()){
            holidays.splice(i,1);
            $(obj).next().remove();
            $(obj).remove();
            $('#holiday').change();
            break;
        }
    }
}
var days = [''];
$('#day').change(function(){
    days[$('#day').val()] = $('#day option:selected').text();
    checkDays();
    $('#days').empty();
    $('#day').val('');
    for (var index in days) {
        if(!days[index]){
            continue;
        }
        $('#days').append("<button type='button' class='btn btn-success btn-xs' onclick='removeday(this)' style='margin: 5px'>"
            + days[index] + "<span class='glyphicon glyphicon-remove'></span></button>");
            $('#days').append("<input type='hidden' name='days_input[]' value='"
            + index + "'/>");
    }
    clear_holiday();
    get_holiday_list();
});
function removeday(obj){
    days[$(obj).next().val()] = undefined;
    $(obj).next().remove();
    $(obj).remove();
    checkDays();
}
function checkDays(){
    var cnt = 0;
    for (var index in days) {
        if(!days[index]){
            continue;
        }
        cnt++;
    }
    if(cnt == Number($('#cycle').val())){
        $('#day').prop('disabled', true);
    }else{
        $('#day').prop('disabled', false);
    }
}
</script>
