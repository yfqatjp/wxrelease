
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
                                <label for="date_from" class="col-sm-2 col-sm-offset-2 control-label">考勤区间</label>
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
                            <div class='form-group' >
                              <label class="col-sm-2 col-sm-offset-2 control-label">员工类型</label>
                                  <div class="col-sm-6">
                                  <?php
                                      $teacherType = $this->session->userdata("teacherType");
                                      echo form_dropdown("teacherType", $teacherType, set_value("teacherType", $teacher_type), "id='teacherType' class='form-control'");
                                  ?>
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
                                <th class="col-sm-2"><?=$this->lang->line('tattendance_name')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('tattendance_type')?></th>
                                <th class="col-sm-3"><?=$this->lang->line('tattendance_status')?></th>
                                <th class="col-sm-3"><?=$this->lang->line('tattendance_status')?></th>
                                <?php if($usertype != "Teacher") { ?><th class="col-sm-3"><?=$this->lang->line('action')?></th><?php }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($teachers)) {
                              	    $i = 1;
                            	   // $t = array();
                            	  /* if(count($teachers) == 1){
                            	      $t[] = $teachers;
                            	   }else{
                            	   	$t = $teachers;
                            	   }*/

                            foreach($teachers as $teacher) {
                              $i = 1;
                            ?>
                            <tr>
                                <td data-title="<?=$this->lang->line('slno')?>">
                                    <?php
                                        echo '<a href="'.'detaile/'.$teacher->teacherID.'">'.$teacher->name.'</a>'
                                    ?>
                                </td>

                                <td>
                                    <?php
                                        $teacherType = $this->session->userdata("teacherType");
                                        if($teacher->teachertype){
                                            echo $teacherType[$teacher->teachertype];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                         if($teacher->verifyNo > 0) {
                                             echo "<button class='btn btn-danger btn-xs'>".$teacher->verifyNo.'条记录'.$this->lang->line('attendance_verify_ng')."</button>";
                                         }
                                    ?>
                                </td>
                                
                                <td>
                                    <?php
                                         if($teacher->verifyYes > 0) {                                         
                                             echo "<button class='btn btn-info btn-xs'>".$teacher->verifyYes.'条记录'.$this->lang->line('attendance_verify_ok')."</button>";
                                         }
                                    ?>
                                </td>
                                <?php if($usertype != "Teacher") { ?>
                                <td>
                                    <?php
                                       echo btn_view('tattendance/detaile/'.$teacher->teacherID, $this->lang->line('view'));
                                    ?>
                                </td>
                                <?php }?>
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
    //$('#date_from').datepicker();
   // $('#date_to').datepicker();

    $('#date_from').datepicker({
        format: "yyyy-mm-dd",
    });
    $('#date_to').datepicker({
        format: "yyyy-mm-dd",

    });    
   
</script>
