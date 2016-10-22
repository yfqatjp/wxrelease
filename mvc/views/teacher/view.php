
<?php
    if(count($teacher)) {
        $usertype = $this->session->userdata("usertype");
?>
    <div class="well">
        <div class="row">
            <div class="col-sm-6">

                <?php
                  echo btn_sm_edit('teacher/edit/'.$teacher->teacherID."/", $this->lang->line('edit'));
                  echo '<button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#add_transportation_expenses"><span class="fa fa-train"></span> ';
                  echo $this->lang->line("teacher_add_transportation_expenses");
                  echo '</button>';
                ?>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                    <li><a href="<?=base_url("teacher/index")?>"><?=$this->lang->line('menu_teacher')?></a></li>
                    <li class="active"><?=$this->lang->line('view')?></li>
                </ol>
            </div>
        </div>
    </div>
  

    <div id="printablediv">
        <section class="panel">
            <div class="profile-view-head">
                <a href="#">
                    <?=img(base_url('uploads/images/'.$teacher->photo))?>
                </a>

                <h1><?=$teacher->name?></h1>



            </div>
            <div class="panel-body profile-view-dis">
                <h1><?=$this->lang->line("personal_information")?></h1>
                <div class="row">
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_dob")?> </span>: <?=date("Y M d", strtotime($teacher->dob))?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_jod")?> </span>: <?=date("Y M d", strtotime($teacher->jod))?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_sex")?> </span>: <?=$teacher->sex?></p>
                    </div>
                    <!-- <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_religion")?> </span>: <?=$teacher->religion?></p>
                    </div> -->
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_email")?> </span>: <?=$teacher->email?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_phone")?> </span>: <?=$teacher->phone?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_address")?> </span>: <?=$teacher->address?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_school")?> </span>: <?=$teacher->teacherschool?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_special")?> </span>: <?=$teacher->teacherspecial?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_bank")?> </span>: <?=$teacher->bankname?>|<?=$teacher->bankbranch?>|<?=$teacher->bankaccount?>|<?=$teacher->bankaccountname?></p>
                    </div>
                </div>

    

             <h1><?=$this->lang->line("teacher_transportation_expenses")?></h1>
             <?php   if(count($transportation_expenses) > 0) { ?>

              <div class = "row">
	            <div class='col-sm-12' >
		            <table  id="evaluationTable" class="table table-responsive table-striped table-bordered table-hover dataTable no-footer">
					  <thead>
					    <tr>
                           <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                           <th class="col-sm-2"><?=$this->lang->line('teacher_transportation_expenses_name')?></th>
                           <th class="col-sm-2"><?=$this->lang->line('teacher_transportation_expenses_start_station')?></th>
                           <th class="col-sm-2"><?=$this->lang->line('teacher_transportation_expenses_end_station')?></th>
                           <th class="col-sm-1"><?=$this->lang->line('teacher_transportation_expenses_fare')?></th>
                           <th class="col-sm-2"><?=$this->lang->line('teacher_transportation_expenses_note')?></th>
                           <th class="col-sm-1"><?=$this->lang->line('action')?></th>

					    </tr>
					  </thead>
					  <tbody>
                      <?php $i = 1;
                          foreach($transportation_expenses as $row) {?>
					    <tr>
					      <td><?php echo $i; ?></td>
					      <td><?php echo $row->transport_name ?></td>
					      <td><?php echo $row->start_station ?></td>
					      <td><?php echo $row->end_station ?></td>
                          <td><?php echo $row->fare ?></td>
                          <td><?php echo $row->note ?></td>
					      <td data-title="<?=$this->lang->line('action')?>">
                              <a class='btn btn-warning btn-xs mrg'
                                  data-target="#add_transportation_expenses"
                                  data-placement='top' data-toggle='modal'
                                  data-option_type_id="<?php echo  $row->teacher_transport_ID ?>"
                                  data-name="<?php echo  $row->transport_name ?>"
                                  data-start_station="<?php echo  $row->start_station ?>"
                                  data-end_station="<?php echo  $row->end_station ?>"
                                  data-fare="<?php echo  $row->fare ?>"
                                  data-note="<?php echo  $row->note ?>"
                                  ><i class='fa fa-edit'></i></a>

                              <?php
                                 echo btn_delete('teacher/deleteTransportationExpenses/'.$teacher->teacherID."/".$row->teacher_transport_ID, $this->lang->line('delete'));
                              ?>

                          </td>
					    </tr>
                      <?php $i++; } ?>
					  </tbody>
				</table>
	            </div>
            </div>

                <?php
                    } else {
                        echo "<div class='col-sm-12'><div class='col-sm-12 alert alert-warning'><span class='fa fa-exclamation-triangle'></span> ";
                        echo $this->lang->line("teacher_transportation_expenses_zero");
                        echo '<button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#add_transportation_expenses"><span class="fa fa-train"></span> ';
                        echo $this->lang->line("teacher_add_transportation_expenses");
                        echo '</button>';
                        echo "</div></div>";
                    }
                ?>

         
            </div>
        </section>
    </div>



    <!-- add_transportation_expenses modal starts here -->
    <form class="form-horizontal" role="form" action="" method="post">
        <div class="modal fade" id="add_transportation_expenses">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title"><?=$this->lang->line('teacher_add_transportation_expenses')?></h4>
                </div>
                <div class="modal-body">
                <input type="hidden" name="option_type_id" id="option_type_id" value="">
                <div id ="nameDiv" class='form-group' >
                     <label for="name" class="col-sm-2 control-label">
                         <?=$this->lang->line("teacher_transportation_expenses_name")?>
                     </label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name')?>" ></input>
                        <span class="control-label" id="name_error">
                        </span>
                      </div>
               </div>
               <div id ="start_stationDiv" class='form-group' >
                    <label for="start_station" class="col-sm-2 control-label">
                        <?=$this->lang->line("teacher_transportation_expenses_start_station")?>
                    </label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" id="start_station" name="start_station" value="<?=set_value('start_station')?>" ></input>
                       <span class="control-label" id="start_station_error">
                       </span>
                     </div>
               </div>
               <div id ="end_stationDiv" class='form-group' >
                    <label for="end_station" class="col-sm-2 control-label">
                        <?=$this->lang->line("teacher_transportation_expenses_end_station")?>
                    </label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" id="end_station" name="end_station" value="<?=set_value('end_station')?>" ></input>
                       <span class="control-label" id="end_station_error">
                       </span>
                     </div>
               </div>
               <div id ="fareDiv" class='form-group' >
                    <label for="fare" class="col-sm-2 control-label">
                        <?=$this->lang->line("teacher_transportation_expenses_fare")?>
                    </label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" id="fare" name="fare" value="<?=set_value('fare')?>" ></input>
                       <span class="control-label" id="fare_error">
                       </span>
                     </div>
               </div>
               <div id ="noteDiv" class='form-group' >
                    <label for="evaluation" class="col-sm-2 control-label">
                        <?=$this->lang->line("teacher_transportation_expenses_note")?>
                    </label>
                    <div class="col-sm-10">
                       <textarea class="form-control" id="note" style="resize: vertical;" name="note" value="<?=set_value('note')?>" ></textarea>
                       <span class="control-label" id="note_error">
                       </span>
                     </div>
                </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"><?=$this->lang->line('close')?></button>
                    <input type="button" id="add_btn" class="btn btn-success" value="<?=$this->lang->line("submit")?>" />
                </div>
            </div>
          </div>
        </div>
    </form>

    <!-- add_transportation_expenses end here -->




    <script language="javascript" type="text/javascript">
        $('#add_transportation_expenses').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var option_type_id = button.data('option_type_id');
          var name = button.data('name');
          var start_station = button.data('start_station');
          var end_station = button.data('end_station');
          var fare = button.data('fare');
          var note = button.data('note');
          var modal = $(this);
          modal.find('#option_type_id').val(option_type_id);
          modal.find('#name').val(name);
          modal.find('#start_station').val(start_station);
          modal.find('#end_station').val(end_station);
          modal.find('#fare').val(fare);
          modal.find('#note').val(note);
        })
        
        $("#add_btn").click(function(){
            var teacherID = "<?=$teacher->teacherID?>";
            var option_type_id = $('#option_type_id').val();
            var name = $('#name').val();
            var start_station = $('#start_station').val();
            var end_station = $('#end_station').val();
            var fare = $('#fare').val();
            var note = $('#note').val();

            var error = 0;
            
            
            var error = 0;
            if(name == "" || name == null) {
                error++;
                $("#name_error").html("");
                $("#name_error").html("必须输入").css("text-align", "left").css("color", 'red');
                $("#nameDiv").addClass("has-error");
            } else {
                $("#name_error").html("");
                $("#nameDiv").removeClass("has-error");
            }

            if(start_station == "" || start_station == null) {
                error++;
                $("#start_station_error").html("");
                $("#start_station_error").html("必须输入").css("text-align", "left").css("color", 'red');
                $("#start_stationDiv").addClass("has-error");
            } else {
                $("#start_station_error").html("");
                $("#start_stationDiv").removeClass("has-error");
            }            

            if(end_station == "" || end_station == null) {
                error++;
                $("#end_station_error").html("");
                $("#end_station_error").html("必须输入").css("text-align", "left").css("color", 'red');
                $("#end_stationDiv").addClass("has-error");
            } else {
                $("#end_station_error").html("");
                $("#end_stationDiv").removeClass("has-error");
            }           

            if(fare == "" || fare == null) {
                error++;
                $("#fare_error").html("");
                $("#fare_error").html("必须输入").css("text-align", "left").css("color", 'red');
                $("#fareDiv").addClass("has-error");
            } else {
                $("#fare_error").html("");
                $("#fareDiv").removeClass("has-error");
                
                if(isNaN(fare)) {
                    error++;
                    $("#fare_error").html("");
                    $("#fare_error").html("必须输入数字").css("text-align", "left").css("color", 'red');
                    $("#fareDiv").addClass("has-error");
                } else {
                    $("#fare_error").html("");
                    $("#fareDiv").removeClass("has-error");
                } 
                
            }   


            
            if(error == 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('teacher/addTransportationExpenses')?>",
                    data: {
                      'option_type_id':option_type_id,
                      'teacherID':teacherID,
                      'name':name,
                      'start_station':start_station,
                      'end_station':end_station,
                      'fare':fare,
                      'note':note
                    },
                    dataType: "html",
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });
        
        function closeWindow() {
            location.reload();
        }
        
        function check_email(email) {
            var status = false;
            var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (email.search(emailRegEx) == -1) {
                $("#to_error").html('');
                $("#to_error").html("<?=$this->lang->line('mail_valid')?>").css("text-align", "left").css("color", 'red');
            } else {
                status = true;
            }
            return status;
        }


    </script>

  

<?php } ?>
