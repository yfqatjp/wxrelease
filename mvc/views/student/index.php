<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title_student')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_student')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">

    <?php $this->load->view("student/searchheader"); ?>
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $usertype = $this->session->userdata("usertype");
               ?>

                <?php if(count($students) > 0 ) { ?>

                    <div class="col-sm-12">
                            <div class="tab-content">
                                <div id="all" class="tab-pane active">
                                    <div id="hide-table">
                                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th><?=$this->lang->line('slno')?></th>
                                                    <th><?=$this->lang->line('student_name')?></th>
                                                    <th><?=$this->lang->line('student_phone')?></th>
                                                    <th><?=$this->lang->line('student_wechat')?></th>                                                  
                                                    <?php  if (isset($set) &&  $set!="3"){?>
                                                      <th><?=$this->lang->line('student_category')?></th>
                                                      <?php  if (isset($set) &&  $set=="1"){?>
                                                        <th><?=$this->lang->line('student_language_school')?></th>
                                                      <?php }?>
                                                      <th><?=$this->lang->line('student_source')?></th>
                                                      <th><?=$this->lang->line('student_salesman')?></th>
                                                      <?php  if (isset($set) &&  $set=="1"){?>
  	                                                    <th><?=$this->lang->line('student_possibility')?></th>
  	                                                    <th><?=$this->lang->line('student_createusername')?></th>
  	                                                    <th><?=$this->lang->line('student_evaluation')?></th>
  	                                                    <th><?=$this->lang->line('student_createdate')?></th>
                                                      <?php } else {?>
  	                                                    <th><?=$this->lang->line('student_classes')?></th>
  	                                                    <th><?=$this->lang->line('student_paymentAmount')?></th>
  	                                                    <th><?=$this->lang->line('student_balance')?></th>
  	                                                    <th><?=$this->lang->line('student_join_date')?></th>
                                                      <?php }?>
                                                    <?php }?>
                                                  <!--   <th class="col-sm-1"><?=$this->lang->line('student_status')?></th> -->
                                                   <?php  if (isset($set) &&  $set=="3"){?>
							                           
							                                 <th><?=$this->lang->line('student_status')?></th>	
							                                                                         
                                                    <?php }?>  
                                                  
                                                    <th><?=$this->lang->line('action')?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!--  取得报名课程数组 -->
                                             <?php
                                               $arrayClass = array();
                                               foreach ($classes as $classa) {
                                               		$arrayClass[$classa->classesID] = $classa->classes;
                                              }
                                    		 ?>

                                                <?php if(count($students)) {$i = 1; foreach($students as $student) { ?>
                                                    <tr>
                                                        <td data-title="<?=$this->lang->line('slno')?>">
                                                            <?php echo $i; ?>
                                                        </td>

                                                        <td data-title="<?=$this->lang->line('student_name')?>">
                                                            <?php echo $student->name; ?>
                                                        </td>
                                                        <td data-title="<?=$this->lang->line('student_phone')?>">
                                                            <?php echo $student->phone; ?>
                                                        </td>

                                                        <td data-title="<?=$this->lang->line('student_wechat')?>">
                                                            <?php echo $student->wechat; ?>
                                                        </td>
                                                        <?php  if (isset($set) &&  $set!="3"){?>
                                                          <td data-title="<?=$this->lang->line('student_category')?>">
                                                              <?php
                                                              $studentCategory = $this->session->userdata("studentCategory");
                                                              echo $studentCategory[$student->category]; ?>
                                                          </td>
                                                          <?php  if (isset($set) &&  $set=="1"){?>
                                                            <td data-title="<?=$this->lang->line('student_language_school')?>">
                                                                <?php
                                                                    echo $student->language_school; 
                                                                ?>
                                                            </td>
                                                          <?php  }?>
                                                          <td data-title="<?=$this->lang->line('student_source')?>">
                                                              <?php
                                                              $studentSource = $this->session->userdata("studentSource");
                                                              
                                                            //  $studentSource =  array_merge ( $studentSource,$code_list );
                                    		                foreach ($this->code_m->getcodeToArray(array('codeName'=>'studentSource', 'loadflag' => '1')) as $key => $value) {
									                               $studentSource[$key] = $value;
							                                 }
                                                              
                                                              $memo = "";
                                                              if($student->source_memo != null && $student->source_memo != ""){
                                                                  $studentSourcePartner = $this->session->userdata("studentSourcePartner"); 
                                                                  if(array_key_exists($student->source_memo, $studentSourcePartner)){
                                                              	      $memo = "(".$studentSourcePartner[$student->source_memo].")";
                                                                  }else{
                                                                      $memo = "(".$student->source_memo.")";
                                                                  }
                                                              }
                                                                if(array_key_exists($student->source, $studentSource)){
                                                                    echo $studentSource[$student->source] . $memo; 
                                                                }
                                                              ?>
                                                          </td>
                                                          <td data-title="<?=$this->lang->line('student_salesman')?>">
                                                            <?php
                                                              $salesman = $this->teacher_m->get_teacher($student->salesmanID);
                                                              if(isset($salesman->name)){
                                                              	echo $salesman->name;
                                                              }
                                                            ?>
                                                          </td>
                                                          <?php  if (isset($set) &&  $set=="1"){?>
  	                                                        <td data-title="<?=$this->lang->line('student_possibility')?>">
  	                                                            <?php
  	                                                            $studentPossibility = $this->session->userdata("studentPossibility");
  	                                                            echo $studentPossibility[$student->possibility]; ?>
  	                                                        </td>
  	                                                        <td data-title="<?=$this->lang->line('student_createusername')?>">
  	                                                            <?php echo $student->create_username; ?>
  	                                                        </td>
  	                                                        <td data-title="<?=$this->lang->line('student_evaluation')?>">
                                                                <?php
                                                                      $evaluations = $this->evaluation_m->get_order_by_evaluation(array('studentID' => $student->studentID));
                                                                      $tooltip_value = '';
                                                                      if(isset($evaluations)){
                                                                          $index = 1;
                                                                          foreach($evaluations as $evaluation){
                                                                              $tooltip_value = $tooltip_value.'('.$index.') '.$evaluation->evaluation.' --'.$evaluation->createusername.' '.$evaluation->modify_date.'; <br>';
                                                                              $index++;
                                                                          }
                                                                      }
                                                                ?>
                                                                <span data-toggle="tooltip" data-html="true" title="<?php echo $tooltip_value; ?>" style=" font-weight: bold; cursor: pointer;"><?php echo $student->evaluationCount; ?></span>
  	                                                        </td>
  	                                                        <td data-title="<?=$this->lang->line('student_createdate')?>">
  	                                                            <?php echo date('Y-m-d',strtotime($student->create_date)); ?>
  	                                                        </td>
                                                          <?php } else {?>
  	                                                        <td data-title="<?=$this->lang->line('student_classes')?>">
  	                                                            <?php  	                                                            
  	                                                                if(isset($arrayClass[$student->classesID])){
                                                                          echo $arrayClass[$student->classesID];
                                                                    }
                                                                    $custom_course_array = $this->student_custom_course_m->get_order_by_student_custom_course(array('studentID' => $student->studentID));
                                                                    if(isset($custom_course_array) && count($custom_course_array) > 0){
                                                                        $course_details = $this->course_details_m->get_by_classID($custom_course_array[0]->classesID);
                                                                        foreach($course_details as $item) { 
                                                                            $subject = $this->subject_m->get($item->subjectID);
                                                                            echo "|";
                                                                            echo $subject->subject;
                                                                        }			
                                                                    }
                                                                ?>
  	                                                        </td>
  	                                                        <td data-title="<?=$this->lang->line('student_paymentAmount')?>">
  	                                                            <?php echo $student->totalamount; ?>
  	                                                        </td>
  	                                                        <td data-title="<?=$this->lang->line('student_balance')?>">
  	                                                            <?php
  											                    $status = $student->totalamount - $student->paidamount;
  											                    if($status == 0) {
  											                        $status = $this->lang->line('invoice_fully_paid');
  											                        echo "<button class='btn btn-success btn-xs'>".$status."</button>";
  											                    }else{
  											                    	echo $student->totalamount - $student->paidamount;											                    }

  											                ?>

  	                                                        </td>
  	                                                        <td data-title="<?=$this->lang->line('student_join_date')?>">
  	                                                            <?php echo date('Y-m-d',strtotime($student->create_date)); ?>
  	                                                        </td>
                                                          <?php }?>
                                                        <?php }?>

	                                                   <?php  if (isset($set) &&  $set=="3"){?>
								                           
			                                                    <td data-title="<?=$this->lang->line('student_status')?>">
			                                                            <div class="onoffswitch-small" id="<?=$student->studentID?>">
			                                                                <input type="checkbox" id="myonoffswitch<?=$student->studentID?>" class="onoffswitch-small-checkbox" name="paypal_demo" <?php if($student->studentactive === '1') echo "checked='checked'"; ?>>
			                                                                <label for="myonoffswitch<?=$student->studentID?>" class="onoffswitch-small-label">
			                                                                    <span class="onoffswitch-small-inner"></span>
			                                                                    <span class="onoffswitch-small-switch"></span>
			                                                                </label>
			                                                            </div>
			                                                      </td>
								                                                                           
	                                                    <?php }?>  
	                                                    
                                                       <td data-title="<?=$this->lang->line('action')?>">
                                                            <?php
                                                                if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {
                                                                    echo btn_view('student/view/'.$student->studentID."/".$set, $this->lang->line('view'));
                                                                    echo btn_edit('student/edit/'.$student->studentID."/".$set, $this->lang->line('edit'));
                                                                    if($usertype == "Admin"){
                                                                    	echo btn_delete('student/delete/'.$student->studentID."/".$set, $this->lang->line('delete'));
                                                                    }                                                                   
                                                                } 
                                                            ?>
                                                        </td>
                                                   </tr>
                                                <?php $i++; }} ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                    </div> <!-- col-sm-12 for tab -->

                <?php } else { ?>
                    <div class="col-sm-12">
                            <div class="tab-content">
                                <div id="all" class="tab-pane active">
                                    <div id="hide-table">
                                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                                    <th class="col-sm-2"><?=$this->lang->line('student_photo')?></th>
                                                    <th class="col-sm-2"><?=$this->lang->line('student_name')?></th>
                                                    <th class="col-sm-2"><?=$this->lang->line('student_roll')?></th>
                                                    <th class="col-sm-2"><?=$this->lang->line('student_phone')?></th>
                                                    <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(count($students)) {$i = 1; foreach($students as $student) { ?>
                                                    <tr>
                                                        <td data-title="<?=$this->lang->line('slno')?>">
                                                            <?php echo $i; ?>
                                                        </td>

                                                        <td data-title="<?=$this->lang->line('student_photo')?>">
                                                            <?php $array = array(
                                                                    "src" => base_url('uploads/images/'.$student->photo),
                                                                    'width' => '35px',
                                                                    'height' => '35px',
                                                                    'class' => 'img-rounded'

                                                                );
                                                                echo img($array);
                                                            ?>
                                                        </td>
                                                        <td data-title="<?=$this->lang->line('student_name')?>">
                                                            <?php echo $student->name; ?>
                                                        </td>
                                                        <td data-title="<?=$this->lang->line('student_roll')?>">
                                                            <?php echo $student->roll; ?>
                                                        </td>
                                                        <td data-title="<?=$this->lang->line('student_phone')?>">
                                                            <?php echo $student->phone; ?>
                                                        </td>
                                                        <td data-title="<?=$this->lang->line('action')?>">
                                                            <?php
                                                                if($usertype == "Admin" || $usertype == "Super Admin") {
                                                                    echo btn_view('student/view/'.$student->studentID."/".$set, $this->lang->line('view'));
                                                                    echo btn_edit('student/edit/'.$student->studentID."/".$set, $this->lang->line('edit'));
                                                                    echo btn_delete('student/delete/'.$student->studentID."/".$set, $this->lang->line('delete'));
                                                                } elseif ($usertype == "Teacher") {
                                                                    echo btn_view('student/view/'.$student->studentID."/".$set, $this->lang->line('view'));
                                                                }

                                                            ?>
                                                        </td>
                                                   </tr>
                                                <?php $i++; }} ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                    </div>
                <?php } ?>

            </div> <!-- col-sm-12 -->

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">


    var status = '';
    var id = 0;
    $('.onoffswitch-small-checkbox').click(function() {
        if($(this).prop('checked')) {
            status = 'chacked';
            id = $(this).parent().attr("id");
        } else {
            status = 'unchacked';
            id = $(this).parent().attr("id");
        }

        if((status != '' || status != null) && (id !='')) {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('student/active')?>",
                data: "id=" + id + "&status=" + status,
                dataType: "html",
                success: function(data) {
                    if(data == 'Success') {
                        toastr["success"]("Success")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "500",
                            "hideDuration": "500",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    } else {
                        toastr["error"]("Error")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "500",
                            "hideDuration": "500",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                }
            });
        }
    });
</script>
