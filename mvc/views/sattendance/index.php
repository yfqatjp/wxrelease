<?php
    function attendance($a,$lang,$routines) {
        $index = 0;
        foreach ($routines as $routine) {
            $routinedate_ex = explode('-', $routine->date);
            if(!is_array($a)){
                $a = array($a);
            }
            $mark = '';
            foreach ($a as $attendance) {
                $monthyear_ex = explode('-', $attendance->monthyear);
                if($monthyear_ex[1] == $routinedate_ex[0] && $monthyear_ex[0] == $routinedate_ex[1] ) {
                    foreach ($attendance as $key => $val) {
                        $day = "a".ltrim($routinedate_ex[2],'0');
                        if($key == $day){
                            if($val == 'P'){
                                $mark = '<div class="text-center"><i class="fa fa-diamond " aria-hidden="true"></i></div>';
                            // }else{
                            //     $mark = $val;
                            }
                        }
                    }
                }
            }
            echo "<td class='att-bg-color' data-title='' >".$mark."</td>";
            $index++;
        }
        for ($index; $index < 10; $index++) {
            echo  "<th></th>";
        }
    }
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-sattendance"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_sattendance')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == 'Teacher'|| $usertype == "Salesman"|| $usertype == "Receptionist") {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('sattendance/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>


                <div class="col-sm-6 col-sm-offset-3 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post">
                            <!-- <div class="form-group">
                                <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("attendance_classes")?>
                                </label>
                                <div class="col-sm-6">
                                    <?php
                                        $array = array("0" => $this->lang->line("attendance_select_classes"));
                                        foreach ($classes as $classa) {
                                            $array[$classa->classesID] = $classa->classes;
                                        }
                                        echo form_dropdown("classesID", $array, set_value("classesID", $set), "id='classesID' class='form-control'");
                                    ?>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="subjectID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("attendance_subject_group")?>
                                </label>
                                <div class="col-sm-6">
                                    <?php
                                        $array = array("0" => $this->lang->line("attendance_select_subject_group"));
                                        foreach ($code_list as $group) {
                                            $array[$group->code] = $group->codeValue;
                                        }
                                        echo form_dropdown("subject_group", $array, set_value("subject_group", $subject_group), "id='subject_group' class='form-control'");
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subjectID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("attendance_subject")?>
                                </label>
                                <div class="col-sm-6">
                                    <?php
                                        $array = array("0" => $this->lang->line("attendance_select_subject"));
                                        foreach ($subjects as $subject) {
                                            $array[$subject->subjectID] = $subject->subject;
                                        }
                                        echo form_dropdown("subjectID", $array, set_value("subjectID", $subjectID), "id='subjectID' class='form-control'");
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("attendance_date")?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="date" id="date" value="<?=set_value("date", $date)?>" >
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>

                <?php if(count($students) > 0 ) { ?>

                    <div class="col-sm-12">
                            <div class="tab-content">
                                <div id="all" class="tab-pane active">
                                    <div id="hide-table">
                                        <table id="sattendanceTable" class="table table-striped table-bordered table-hover dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th style="width: 100px;"><?=$this->lang->line('attendance_name')?></th>
                                                    <?php
                                                        $index = 0;
                                                        foreach ($routines as $routine) {
                                                            echo  "<th><div class=\"text-center\">".($index+1)."</div></th>";
                                                            $index++;
                                                        }
                                                        for ($index; $index < 10; $index++) {
                                                            echo  "<th><div class=\"text-center\">".($index+1)."</div></th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(count($students)) {
                                                        $i = 1;
                                                        foreach($students as $student) {
                                                            $year = date("Y");
                                                            $conditions = array("studentID" => $student->studentID, "classesID" => $student->classesID);
                                                            if($subjectID != 0){
                                                                $conditions = array("studentID" => $student->studentID, "classesID" => $student->classesID, "subjectID" => $subjectID);
                                                            }
                                                            $attendances = $this->subjectattendance_m->get_order_by_sub_attendance($conditions);
                                                        ?>
                                                            <tr>
                                                        <td data-title="<?=$this->lang->line('attendance_name')?>">
                                                            <?php
                                                               // echo btn_view('sattendance/view/'.$student->studentID."/".$set, $this->lang->line('view'));
                                                                echo $student->name;
                                                            ?>
                                                        </td>

                                                            <?php
                                                            if($attendances){
                                                            ?>
                                                        <?php
                                                                attendance($attendances,$this->lang,$routines);
                                                            }else{
                                                                $index = 0;
                                                                foreach ($routines as $routine) {
                                                                    echo  "<th></th>";
                                                                    $index++;
                                                                }
                                                                for ($index; $index < 10; $index++) {
                                                                    echo  "<th></th>";
                                                                }
                                                            }
                                                        ?>
                                                        </tr>
                                                <?php
                                                        $i++;
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <input id="tableCol" type="hidden" value="<?=$index?>"/>
                                    </div>

                                </div>

                            </div>
                    </div> <!-- col-sm-12 for tab -->
                <?php } ?>


                <?php } ?>

            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
    // $('#date').datepicker(
    //   {
    //     format: 'yyyy/mm',
    //     autoclose: true,
    //     minViewMode: 'months'
    //   }
    // );
    // $('#classesID').change(function() {
    //     var classesID = $(this).val();
    //     var subjectID = $('#subjectID').val();
    //     if(classesID == 0) {
    //         $('#hide-table').hide();
    //         $('#subjectID').val(0);
    //     } else {
    //         $.ajax({
    //             type: 'POST',
    //             url: "<?=base_url('sattendance/student_list')?>",
    //             data: {
    //                 'id': classesID,
    //                 'subjectID': subjectID
    //             },
    //             dataType: "html",
    //             success: function(data) {
    //                 window.location.href = data;
    //             }
    //         });
    //     }
    // });
    $(document).ready(function() {
        if($('#tableCol').val()<=40){
            var tableOption = {
                // buttons: [
                // //    'copyHtml5',
                // //    'excelHtml5',
                // //    'csvHtml5',
                // //    'pdfHtml5'
                // ],
                // // ソート機能 無効
                // ordering: false,
                // search: false
                // 件数切替機能 無効
                // lengthChange: false,
                // 検索機能 無効
                // searching: false,
                pageLength: 25,
            }
        }else{
            var tableOption = {
                // buttons: [
                // //    'copyHtml5',
                // //    'excelHtml5',
                // //    'csvHtml5',
                // //    'pdfHtml5'
                // ],
                // search: false,
                // ordering: false,
                // 件数切替機能 無効
                // lengthChange: false,
                // 検索機能 無効
                // searching: false,
                pageLength: 25,
                scrollX: true
            }
        }
          $('#sattendanceTable').DataTable(tableOption);
        } );
        $('#subject_group').change(function() {
            var subject_group = $(this).val();
            if(subject_group == 0) {
                $('#subjectID').val(0);
                $('#subjectID').empty();
                $('#subjectID').html("<option value='0'>选择课程</option>");
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('sattendance/subjectcall')?>",
                    data: "id=" + subject_group,
                    dataType: "html",
                    success: function(data) {
                       $('#subjectID').html(data)
                    }
                });
            }
        });
    $('#subjectID').change(function() {
        // var classesID = $('#classesID').val();
        var subjectID = $(this).val();
        if(subjectID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('sattendance/student_list')?>",
                data: {
                    // 'id': classesID,
                    'subjectID': subjectID,
                    'subject_group': $('#subject_group').val()
                },
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
