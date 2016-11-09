
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-tattendance"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("tattendance/index")?>"><?=$this->lang->line('menu_tattendance')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_tattendance')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
          <div class="col-sm-8">
              <form class="form-horizontal" role="form" method="post">
                  <?php
                        if(form_error('teacherID'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                    
                        <label for="teacherID" class="col-sm-2 control-label">
                            <?=$this->lang->line("tattendance_teacher")?>
                        </label>
             
                        <div class="col-sm-6">
                              <input type="hidden"form-control" name="teacherID" id="teacherID" value="<?=set_value("teacherID", $tattendance->teacherID)?>">
                        
                            <?php
                                foreach ($teachers as $teacher) {
                                    $array[$teacher->teacherID] = $teacher->name;
                                }
                            ?>
                            
                              <input type="text" class="form-control" name="teacherName" id="teacherName" value="<?=set_value("teacherName", $array[$tattendance->teacherID])?>" readonly="readonly">
                            
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacherName'); ?>
                        </span>
                  </div>

                  <?php
                      if(form_error('date'))
                          echo "<div class='form-group has-error' >";
                      else
                          echo "<div class='form-group' >";
                  ?>
                      <label for="date" class="col-sm-2 control-label">
                          <?=$this->lang->line('tattendance_date')?>
                      </label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="date" id="date" value="<?=set_value("date", $tattendance->date)?>" >
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
                            <?=$this->lang->line("tattendance_start_time")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="start_time" name="start_time" value="<?=set_value('start_time', $tattendance->start_time)?>" >
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
                            <?=$this->lang->line("tattendance_end_time")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="end_time" name="end_time" value="<?=set_value('end_time', $tattendance->end_time)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('end_time'); ?>
                        </span>
                    </div>

                  <?php
                           if(form_error('tattendance_type'))
                               echo "<div class='form-group has-error' >";
                           else
                               echo "<div class='form-group' >";
                     ?>
                    <label class="col-sm-2 control-label"><?=$this->lang->line("tattendance_type")?></label>
                        <div class="col-sm-6">
                        <?php
                            $tattendanceType = $this->session->userdata("tattendanceType");
                            echo form_dropdown("tattendance_type", $tattendanceType, set_value("tattendance_type", $tattendance->tattendancetype), "id='tattendance_type' class='form-control'");
                        ?>

                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('tattendance_type'); ?>
                        </span>                       
                    </div>

                  <?php
                           if(form_error('TE_select'))
                               echo "<div class='form-group has-error' >";
                           else
                               echo "<div class='form-group' >";
                   ?>
                      <label class="col-sm-2 control-label" for="checkboxes">交通费选择</label>
                      <div class="col-sm-6">
                          <?php
                          $array3 = array('' => '请选择');
                          
                          if(isset($transportation_expenses)){
								foreach ($transportation_expenses as $row) {
									$array3[$row->teacher_transport_ID] = $row->transport_name;
									//echo "<input type='hidden' id='TE_".$row->teacher_transport_ID."' value='".$row->fare."'>";
								}
                          }
                          $transportType = $this->session->userdata("transportType");
                           foreach ($transportType as $key => $value) $array3[$key] = $value;
                          echo form_dropdown("TE_select", $array3, set_value("TE_select", $tattendance->teacher_transport_ID), "id='TE_select' class='form-control'");
                          ?>
                      </div>
                      <span class="col-sm-4 control-label">
                        <?php echo form_error('TE_select'); ?>
                        </span>
                    </div>
                    
                    
                  <?php
                           if(form_error('TE_Amount'))
                               echo "<div class='form-group has-error' >";
                           else
                               echo "<div class='form-group' >";
                   ?>
                       <label class="col-sm-2 control-label" for="checkboxes">金额</label>
                       <div class="col-sm-6">
                           <input type="text" class="form-control" name="TE_Amount" id="TE_Amount" value="<?=set_value("TE_Amount", $tattendance->teacher_transport_amount)?>" >
                       </div>
                       <span class="col-sm-4 control-label">
                       <?php echo form_error('TE_Amount'); ?>
                       </span>
                     </div>
                     
                  <?php

                           if(form_error('TE_note'))
                               echo "<div class='form-group has-error' >";
                           else
                               echo "<div class='form-group' >";
                   ?>
                        <label class="col-sm-2 control-label" for="checkboxes">工作内容</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="TE_note" id="TE_note" value="<?=set_value("TE_note", $tattendance->work_note)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                       <?php echo form_error('TE_note'); ?>
                       </span>
                      </div>


                  <?php
                  $usertype = $this->session->userdata("usertype");
                  if($usertype == "Admin" || $usertype == "TeacherManager" ) {
                           if(form_error('TE_wage'))
                               echo "<div class='form-group has-error' >";
                           else
                               echo "<div class='form-group' >";
                   ?>
                        <label class="col-sm-2 control-label" for="checkboxes">工资（强制修改时填写）</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="TE_wage" id="TE_wage" value="<?=set_value("TE_wage", $tattendance->wage)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                       <?php echo form_error('TE_wage'); ?>
                       </span>
                      </div>                      
                   <?php }
                   ?>                      
                      
                      
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-6">
                      <div id="holidays">
                      <div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-8">
                          <input type="submit" class="btn btn-success" style="margin-bottom:0px" value="<?=$this->lang->line("update_attendance")?>" >
                      </div>
                  </div>
              </form>
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
<script type="text/javascript">
    $('#TE_select').change(function(){
      var id = "#TE_" + $('#TE_select').val();
      $('#TE_Amount').val($(id).val());
    });
    $("#date").datepicker(
        {
            format: "yyyy-mm-dd",
        }
    );
    $('#start_time').timepicker({ 'showMeridian': false });
    $('#end_time').timepicker({ 'showMeridian': false });
    $('#teacherID').change(function() {
      var teacherID = $(this).val();
      if(teacherID == "") {
          $("#TE_select").html("");
      } else {
          $.ajax({
              type: 'POST',
              url: "<?=base_url('tattendance/teacherOptioncall')?>",
              data: "teacherID=" + teacherID,
              dataType: "json",
              success: function(data) {
                $("#TE_select").html("");
                $("#TE_select").append("<option value=\"\">请选择</option>");
                Object.keys(data).forEach(function(key) {
                 var value = this[key];
                  $("#TE_select").append("<option value="+key+">"+value+"</option>");
                 }, data);
                $("#TE_select").append("<option value=\"NO\">没有交通费</option>")
                $("#TE_select").append("<option value=\"CUSTOMIZE\">自定义</option>")
              }
          });
      }

    });
    $('#TE_select').change(function() {
        var transportID = $(this).val();

        if(transportID == "" || transportID == "CUSTOMIZE" ) {
          $('#TE_Amount').val("");
        }else if(transportID == "NO"){
          $('#TE_Amount').val(0);
        }
        else{
            $.ajax({
                type: 'POST',
                url: "<?=base_url('tattendance/getfare')?>",
                data: "teacher_transport_ID=" + transportID,
                dataType: "json",
                success: function(data) {
                  $('#TE_Amount').val(data);
                }
            });
        }

      });
</script>
