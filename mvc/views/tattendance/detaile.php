
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-tattendance"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_tattendance')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                
                  $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin" || $usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Receptionist"|| $usertype == "Salesman") {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('tattendance/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>
                <div class="col-sm-8 col-sm-offset-2 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label for="date_from" class="col-sm-2 col-sm-offset-2 control-label">考勤区间 </label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="date_from" name="date_from" value="<?=set_value('date_from', $date_from)?>" >
                                        <span class="input-group-addon">
                                            ~
                                        </span>
                                        <input type="text" class="form-control" id="date_to" name="date_to" value="<?=set_value('date_to', $date_to)?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="verify_status" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line('tattendance_status')?>
                                </label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label class="checkbox-inline" for="verify_status">
                                        <?php
                                            $check = '';
                                            if($verify_status === "0"){
                                                $check = 'checked';
                                            }
                                        ?>
										 <input type="checkbox" name="verify_status" id="verify_status" value="0" <?=$check?>>
											<?=$this->lang->line('attendance_verify_ng')?>
                                    </div>
                                </div>
                            </div>
								<div class="form-group">
								<div class="col-sm-8 col-sm-offset-5">
								 <button type="submit" id="search" class="btn btn-warning">查询</button>
								 </div>
								</div>
                        </form>
                    </div>
                </div>


                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('tattendance_name')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('tattendance_date')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('tattendance_period')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('tattendance_time')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('wage_hour')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('wage_total')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('TE_Amount')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('tattendance_type')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('tattendance_status')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('tattendance_note')?></th>

                                <?php // if($usertype != "Teacher") { ?><th class="col-sm-2"><?=$this->lang->line('action')?></th><?php // }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($teachers)) {
                              	    $i = 1;
                            	    $t = array();
                            	   if(count($teachers) == 1){
                            	      $t[] = $teachers;
                            	   }else{
                            	   	$t = $teachers;
                            	   }

                            foreach($t as $teacher) {
                            ?>
                            <?php
                                    $array = array(
                                        'teacherID' => $teacher->teacherID,
                                        'date >=' => date('Y-m-d', strtotime($date_from)),
                                        'date <=' => date('Y-m-d', strtotime($date_to)));
                                    if($verify_status === "0"){
                                        $array['verifyflg'] = $verify_status;
                                    }
                                    $attendances = $this->tattendance_m->get_order_by_tattendance($array);
                                    if(count($attendances)) {$i = 1; foreach($attendances as $key => $attendance) {
                            ?>
                                        <tr>
                                            <td data-title="<?=$this->lang->line('slno')?>">
                                                <?php
                                                    echo '<a href="'.'view/'.$teacher->teacherID.'">'.$teacher->name.'</a>'
                                                ?>
                                            </td>

                                            <td>
                                                <?php echo $attendance->date; ?>
                                            </td>
                                            <td>
                                                <?php echo $attendance->start_time ."～" .$attendance->end_time; ?>
                                            </td>
                                            <td>
                                                <?php
                                               
                                                  date_default_timezone_set("UTC");
                                                  
                                                  $workingHours =  $this->wage_m->quarter_round(date("H:i", strtotime($attendance->end_time) - strtotime($attendance->start_time)),0);
                                                  
                                                  echo $workingHours."時間";
                                                  
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $timing_remuneration = 0;
                                                if($attendance->tattendancetype == "1"){
                                                    $timing_remuneration = $teacher->lecture_timing_remuneration;
                                                }else if($attendance->tattendancetype == "2"){
													$timing_remuneration = $teacher->affairs_timing_remuneration;
                                                }else if($attendance->tattendancetype == "3"){
													$timing_remuneration = $teacher->vip_timing_remuneration;
                                                }
                                                echo $timing_remuneration."円/時";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($attendance->verifyflg == '0'){
													echo $timing_remuneration * $workingHours."円";                                                	
                                                }else{
                                                	echo $attendance->wage."円"; 
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $attendance->teacher_transport_amount."円";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $tattendanceType = $this->session->userdata("tattendanceType");
                                                    if($attendance->tattendancetype){
                                                        echo $tattendanceType[$attendance->tattendancetype];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($attendance->verifyflg == '1') {
                                                        echo "<button class='btn btn-success btn-xs'>".$this->lang->line('attendance_verify_ok')."</button>";
                                                    }else{
                                                        echo "<button class='btn btn-danger btn-xs'>".$this->lang->line('attendance_verify_ng')."</button>";
                                                    }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
 
                                                        echo $attendance->work_note;
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                  if($usertype == "Admin" || $usertype == "TeacherManager" ) {
														if($attendance->verifyflg == '0'){
															echo btn_verify('tattendance/verify/'.$attendance->tattendanceID.'/1/'.$teacher->teacherID, $this->lang->line('attendance_verify'), $this->lang->line('attendance_verify_msg_ok'));
														}else{
															echo btn_verify_cancel('tattendance/verify/'.$attendance->tattendanceID.'/0/'.$teacher->teacherID, '承认取消', '承认取消');
														}
												   }	
												  if($attendance->verifyflg == '0'){
														  echo btn_delete('tattendance/delete/'.$attendance->tattendanceID, $this->lang->line('delete'));														 
                                                          echo btn_edit('tattendance/edit/'.$attendance->tattendanceID, $this->lang->line('edit'));
                                                   } 
                                                ?>
                                            </td>
                                           
                                    </tr>
                                    <?php $i++; }} ?>
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
    $('#date_from').datepicker({
        format: "yyyy-mm-dd",
    });
    $('#date_to').datepicker({
        format: "yyyy-mm-dd",

    });
</script>
