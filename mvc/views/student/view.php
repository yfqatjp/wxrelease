<?php
    $usertype = $this->session->userdata("usertype");
    if(count($student)) {
        $usertype = $this->session->userdata("usertype");
        if($usertype == "Admin" || 
           $usertype == "TeacherManager" || 
           $usertype == "Student"||           
           $usertype == "Salesman"|| 
           $usertype == "Receptionist") {
?>
    <div class="well">
        <div class="row">
            <div class="col-sm-6">

              <?php echo btn_sm_edit('student/edit/'.$student->studentID."/".$set, $this->lang->line('edit'))?>
                
              <?php if($usertype <> "Student"){?>
                <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#add_evaluation"><span class="fa fa-envelope-o"></span> <?=$this->lang->line('add_evaluation')?></button>
                <!-- 只有未报名的同学才显示报名按钮 -->
                <?php if ($student->classesID == 1) {
	               echo btn_sm_join('student/edit/'.$student->studentID."/".$set."/join/", $this->lang->line('join'))
	             ?>
                <?php  }?>

              <?php
                     if($invoice ) {
                        if($invoice->paidamount != $invoice->amount){
							echo btn_payment('invoice/payment/'.$invoice->invoiceID, $this->lang->line('payment'));                        	
                        }else{
                            if($usertype == "Admin"){
                            	echo btn_payment('invoice/payment/'.$invoice->invoiceID, $this->lang->line('paymentDifference'));
                            }
                        	
                        }
                     }
                ?>

                <?php echo btn_sm_back('student/index/'.$set, $this->lang->line('back'))
                ?>
           <?php  }?>
           </div>

            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                    <?php
                    if($usertype == "Admin" || $usertype == "Teacher" || $usertype == "TeacherManager") {
                    ?>
                    <li><a href="<?=base_url("student/index/$set")?>"><?=$this->lang->line('menu_student')?></a></li>
                    <?php } ?>
                    <li class="active"><?=$this->lang->line('view')?></li>
                </ol>
            </div>
        </div>

    </div>

    <?php } ?>

    <?php } ?>


    <div id="printablediv">
        <section class="panel">

            <div class="profile-view-head">
                <a href="#">
                    <?=img(base_url('uploads/images/'.$student->photo))?>
                </a>

                <h1><?=$student->name?></h1>
                <?php  $studentCategory = $this->session->userdata("studentCategory");
                       $studentSource = $this->session->userdata("studentSource");
                       $studentPossibility = $this->session->userdata("studentPossibility");
                ?>

                <p><?=$this->lang->line("student_category")." ".$studentCategory[$student->category]?></p>
               <!--  <p><?=$this->lang->line("student_classes")." ".$class->classes?></p>  -->

            </div>
            <div class="panel-body profile-view-dis">
                <h1><?=$this->lang->line("personal_information")?></h1>
                <div class="row">
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_sex")?> </span>: <?=$student->sex?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_wechat")?> </span>: <?=$student->wechat?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_email")?> </span>: <?=$student->email?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_phone")?> </span>: <?=$student->phone?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_address")?> </span>: <?=$student->address?></p>
                    </div>
                    <?php
                        if($usertype <> "Student") {
                        ?>
                    <div class="profile-view-tab">
                        <p>
                            <span><?=$this->lang->line("student_source")?> </span>: 
                            <?php 
                                if(array_key_exists($student->source, $studentSource)){
                                    echo $studentSource[$student->source];
                                }
                            ?>
                        </p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_possibility")?> </span>: <?=$studentPossibility[$student->possibility]?></p>
                    </div>
                    <?php } ?>
                    <?php if($usertype == "Admin") { ?>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_username")?> </span>: <?=$student->username?></p>
                    </div>
                    <?php } ?>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_language_school")?> </span>: <?=$student->language_school?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("latest_education")?> </span>: <?=$student->latest_education?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("graduated_school")?> </span>: <?=$student->graduated_school?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p>
                            <span><?=$this->lang->line("student_salesman")?> </span>: 
                            <?php
                                $salesman = $this->user_m->get($student->salesmanID);
                                if($salesman){
                                    echo $salesman->name;
                                }
                            ?>
                        </p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("student_createusername")?> </span>: <?=$student->create_username?></p>
                    </div>
                </div>
                
         <?php  if($usertype <> "Student")  { ?>
              
             <h1><?=$this->lang->line("student_evaluation")?></h1>
             <?php   if(count($evaluations) > 0) { ?>

              <div class = "row">
	            <div class='col-sm-12' >
		            <table  id="evaluationTable" class="table table-responsive table-striped table-bordered table-hover dataTable no-footer">
					  <thead>
					    <tr>
                           <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                           <th class="col-sm-8"><?=$this->lang->line('student_evaluation')?></th>
                           <th class="col-sm-1"><?=$this->lang->line('evaluation_createusername')?></th>
                           <th class="col-sm-1"><?=$this->lang->line('evaluation_modify_date')?></th>
                           <th class="col-sm-1"><?=$this->lang->line('action')?></th>

					    </tr>
					  </thead>
					  <tbody>
                      <?php $i = 1;
                          foreach($evaluations as $evaluation) {?>
					    <tr>
					      <td><?php echo $i; ?></td>
					      <td><?php echo $evaluation->evaluation ?></td>
					      <td><?php echo $evaluation->createusername ?></td>
					      <td><?php echo $evaluation->modify_date ?></td>
					      <td data-title="<?=$this->lang->line('action')?>">
                              <a id ="evaluation_<?php echo $i; ?>_<?php echo $evaluation->evaluationID; ?>" class='btn btn-warning btn-xs mrg edit_evaluation_btn'  data-target="#add_evaluation"  data-placement='top' data-toggle='modal' data-whatever="<?php echo  $evaluation->evaluationID ?>>" ><i class='fa fa-edit'></i></a>

                              <?php
                                 echo btn_delete('student/deleteEvaluation/'.$student->studentID."/".$set."/".$evaluation->evaluationID, $this->lang->line('delete'));
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
                        echo $this->lang->line("evaluation_zero");
                        echo '<button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#add_evaluation"><span class="fa fa-envelope-o"></span>';
                        echo $this->lang->line("add_evaluation");
                        echo '</button>';
                        echo "</div></div>";
                    }
                ?>

            <?php } ?>
            
                
                <h1><?=$this->lang->line("student_join_information")?></h1>
                <?php
                    if($student->classesID > 1 && $class ) { 
                ?>
                    <?php
                        if($class->class_type == 0 ) { 
                    ?>
                    <div class="row">
                        <div class="profile-view-tab">
                            <p><span><?=$this->lang->line("student_classes")?> </span>: <?php if(isset($class->classes))echo $class->classes;?></p>
                        </div>
                        <!-- <div class="profile-view-tab">
                            <p><span><?=$this->lang->line("student_join_date")?> </span>: <?=$student->create_date?></p>
                        </div> -->
                        <div class="profile-view-tab">
                            <p><span><?=$this->lang->line("student_subjectStartdate")?> </span>: <?=$student->subjectStart_date?></p>
                        </div>
                        <div class="profile-view-tab">
                            <p><span><?=$this->lang->line("student_subjectEnddate")?> </span>: <?=$student->subjectEnd_date?></p>
                        </div>
                    </div>
                    <?php } ?>
                <?php
                        $custom_course_array = $this->student_custom_course_m->get_order_by_student_custom_course(array('studentID' => $student->studentID));
                        if(isset($custom_course_array) && count($custom_course_array) > 0){
                            echo '<h5>自定义套餐</h5>';
                            $course_details = $this->course_details_m->get_by_classID($custom_course_array[0]->classesID);
                            foreach($course_details as $item) { 
                                $subject = $this->subject_m->get($item->subjectID);
                                echo "<div class='row'>";
                                echo "<div class='profile-view-tab'>";
                                echo "<p>";
                                echo "<span>";
                                echo $this->lang->line("student_subject");
                                echo "</span>:";
                                echo $subject->subject;
                                echo "</p>";
                                echo "</div>";
                                echo "</div>";
                            }			
                        }
                    } else {
                        echo "<div class='col-sm-12'><div class='col-sm-12 alert alert-warning'><span class='fa fa-exclamation-triangle'></span> ";
                        echo $this->lang->line("join_error");
                        if($usertype <> "Student"){
                           echo btn_sm_join('student/edit/'.$student->studentID."/".$set."/join/", $this->lang->line('join'));                        	
                        }

                        echo "</div></div>";
                    }
                ?>

 <?php   if($invoice) { ?>
        <h1><?=$this->lang->line("invoice_feetype")?>
              <?php
                    $status = $invoice->status;
                    $setstatus = '';
                    if($status == 0) {
                        $setstatus = $this->lang->line('invoice_notpaid');
                    } elseif($status == 1) {
                        $setstatus = $this->lang->line('invoice_partially_paid');
                    } elseif($status == 2) {
                        $setstatus = $this->lang->line('invoice_fully_paid');
                    }

                    echo "<button class='btn btn-success btn-xs'>".$setstatus."</button>";
                    if($invoice ) {
                        if($usertype <> "Student"){
	                        if($invoice->paidamount != $invoice->amount){
								echo btn_payment('invoice/payment/'.$invoice->invoiceID, $this->lang->line('payment'));                        	
	                        }else{
	                            if($usertype == "Admin"){
	                            	echo btn_payment('invoice/payment/'.$invoice->invoiceID, $this->lang->line('paymentDifference'));
	                            }
	                        }
                        }
                     }
                ?>

        </h1>
          <div class="row">
			<div class="col-xs-12" id="hide-table">
		        <table class="table table-striped">
		            <thead>
		                <tr>
		                    <th class="col-lg-1"><?=$this->lang->line('slno')?></th>
		                    <th class="col-lg-2"><?=$this->lang->line('invoice_feetype')?></th>
                            <th class="col-lg-2">缴费日期</th>
                            <th class="col-lg-2">经办人</th>
		                    <th class="col-lg-2">金额</th>
                            <th class="col-lg-3">备考</th>
		                </tr>
		            </thead>
		            <tbody>
		                <tr>
		                    <td data-title="<?=$this->lang->line('slno')?>">
		                        <?php echo '-'; ?>
		                    </td>
		                    <td data-title="<?=$this->lang->line('invoice_feetype')?>">
		                        <?php echo $invoice->feetype ?>
		                    </td>
                            <td>
		                    </td>   
                            <td>
		                    </td>                                
		                    <td data-title="<?=$this->lang->line('invoice_subtotal')?>">
                                <?php echo $invoice->amount; ?>
		                    </td>
                            <td>
		                    </td>   		                    
		                </tr>
                        <?php 
                            $payment_details = $this->payment_m->get_order_by_payment(array('invoiceID' => $invoice->invoiceID));
                            $index = 0;
                            $fee_reduction_view = 0;
                            $additional_cost_view = 0;
                            foreach ($payment_details as $payment) {
                                $index++;
                                /*
                                if($payment->paymentclass == '1'){
                                    $fee_reduction_view += $payment->paymentamount;
                                }elseif($payment->paymentclass == '4'){
                                    $additional_cost_view += $payment->paymentamount;
                                }*/
                            ?>
		                <tr>
		                    <td data-title="<?=$this->lang->line('slno')?>">
		                        <?php echo $index; ?>
		                    </td>
		                    <td>
		                        <?php echo $payment->paymenttype ?>
		                    </td>
		                    <td>
		                        <?php echo $payment->paymentdate ?>
		                    </td>
                            <td>
                                <?php echo $payment->principal ?>
		                    </td>
		                    <td data-title="<?=$this->lang->line('invoice_subtotal')?>">
                                <?php echo $payment->paymentamount ?>
		                    </td>
		                    <td>
                                <?php echo $payment->paymentnote ?>
		                    </td>		                    
		                </tr>
                        <?php }?>
		            </tbody>
		        </table>
		    </div>
		</div><!-- /.row -->

 	<div class="row">
		    <!-- accepted payments column -->
		    <div class="col-sm-6">
		    </div><!-- /.col -->
		    <div class="col-xs-12 col-sm-6 col-lg-6 col-md-18">
		        <p class="lead"><?=$this->lang->line('invoice_amount')?></p>
		        <div class="table-responsive">
		            <table class="table">
		                <tr>
                            <th class="col-sm-8 col-xs-8"><?=$this->lang->line('invoice_subtotal')?></th>
                            <td class="col-sm-4 col-xs-4">
                                <?php 
                                   // echo $invoice->amount - $fee_reduction_view + $additional_cost_view;
                                      echo $invoice->amount;
                                ?>
                            </td>
		                </tr>
		            </table>
                    <?php if(empty($invoice->paidamount) && $invoice->paidamount == 0) { ?>
                        <table class="table">
                            <tr>
                                <th class="col-sm-8 col-xs-8"><?=$this->lang->line('invoice_total')." (".$siteinfos->currency_code.")";?></th>
                                <td class="col-sm-4 col-xs-4"><?=$siteinfos->currency_symbol." ".$invoice->amount?></td>
                            </tr>
                        </table>
                    <?php } else { if($invoice->amount == $invoice->paidamount && $invoice->status == 2) { ?>
                        <table class="table">
                            <tr>
                                <th class="col-sm-8 col-xs-8"><?=$this->lang->line('invoice_total')." (".$siteinfos->currency_code.")";?></th>
                                <td class="col-sm-4 col-xs-4"><?=$siteinfos->currency_symbol." ".$invoice->amount?></td>
                            </tr>
                        </table>
                    <?php } elseif($invoice->amount > $invoice->paidamount && $invoice->status == 1) { ?>
                        <table class="table">
                            <tr>
                                <th class="col-sm-8 col-xs-8"><?=$this->lang->line('invoice_made');?></th>
                                <td class="col-sm-4 col-xs-4"><?=$invoice->paidamount?></td>
                            </tr>
                        </table>

                        <table class="table">
                            <tr>
                                <th class="col-sm-8 col-xs-8"><?=$this->lang->line('invoice_due')." (".$siteinfos->currency_code.")";?></th>
                                <?php 
                                    $due = $invoice->amount - $fee_reduction_view + $additional_cost_view - $invoice->paidamount; 
                                ?>
                                <td class="col-sm-4 col-xs-4"><?=$siteinfos->currency_symbol." ".$due?></td>
                            </tr>
                        </table>
                    <?php } else { ?>
                    <table class="table">
                        <tr>
                            <th class="col-sm-8 col-xs-8"><?=$this->lang->line('invoice_due')." (".$siteinfos->currency_code.")";?></th>
                            <?php $due = $invoice->amount-$invoice->paidamount; ?>
                            <td class="col-sm-4 col-xs-4"><?=$siteinfos->currency_symbol." ".$due?></td>
                        </tr>
                    </table>
                    <?php } } ?>

		        </div>
		    </div><!-- /.col -->
		</div><!-- /.row -->

<?php  } ?>

            </div>
        </section>
    </div>

    <?php if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") { ?>
    <!-- Modal content start here -->
    <div class="modal fade" id="idCard">
      <div class="modal-dialog">
        <div class="modal-content">
            <div id="idCardPrint">
              <div class="modal-header">
                <?=$this->lang->line('idcard')?>
              </div>
              <div class="modal-body" >
                <table>
                    <tr>
                        <td>
                            <h4 style="margin:0;">
                            <?php
                                if($siteinfos->photo) {
                                    $array = array(
                                        "src" => base_url('uploads/images/'.$siteinfos->photo),
                                        'width' => '25px',
                                        'height' => '25px',
                                        "style" => "margin-bottom:10px;"
                                    );
                                    echo img($array);
                                }

                            ?>

                            </h4>
                        </td>
                        <td style="padding-left:5px;">
                            <h4><?=$siteinfos->sname;?></h4>
                        </td>
                    </tr>
                </table>

                <table class="idcard-Table">
                    <tr>
                        <td>
                            <h4>
                                <?php
                                    echo img(base_url('uploads/images/'.$student->photo));
                                ?>
                            </h4>
                        </td>
                        <td class="row-style">
                            <h3><?php  echo $student->name; ?></h3>
                            <h5><?php  echo $this->lang->line("student_classes")." : ".$class->classes; ?>
                            </h5>
                            <h5><?php  echo $this->lang->line("student_section")." : ".$section->section; ?>
                            </h5>
                            <h5>
                                <?php  echo $this->lang->line("student_roll")." : ".$student->roll; ?>
                            </h5>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" style="margin-bottom:0px;" onclick="javascript:closeWindow()" data-dismiss="modal"><?=$this->lang->line('close')?></button>
            <button type="button" class="btn btn-success" onclick="javascript:printDiv('idCardPrint')"><?=$this->lang->line('print')?></button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal content End here -->



<!-- add_evaluation modal starts here -->
<form class="form-horizontal" role="form" action="" method="post">
    <div class="modal fade" id="add_evaluation">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title"><?=$this->lang->line('add_evaluation')?></h4>
            </div>
            <div class="modal-body">
            <input type="hidden" name="evaluationID" id="evaluationID" value="">
               <div id ="evaluationDiv" class='form-group' >
                    <label for="evaluation" class="col-sm-2 control-label">
                        <?=$this->lang->line("student_evaluation")?>
                    </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="evaluation" style="resize: vertical;" name="evaluation" value="<?=set_value('evaluation')?>" ></textarea>
                       <span class="control-label" id="evaluation_error">
                       </span>
                     </div>
              </div>

               <div id ="CreateuserDiv" class='form-group' >
                    <label for="subject" class="col-sm-2 control-label">
                        <?=$this->lang->line("student_createusername")?>
                    </label>
                    <div class="col-sm-10">
                        <p class="form-control-static">
								<?php
								  $username = $this->session->userdata('name');
								  echo $username;
								  ?>
								</p>
                    </div>
                    <span class="col-sm-4 control-label" id="subject_error">
                    </span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"><?=$this->lang->line('close')?></button>
                <input type="button" id="add_evaluation_btn" class="btn btn-success" value="<?=$this->lang->line("submit")?>" />
            </div>
        </div>
      </div>
    </div>
</form>

<!-- add_evaluation end here -->

<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML =
              "<html><head><title></title></head><body>" +
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
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

        $("#add_evaluation_btn").click(function(){
            var evaluation = $('#evaluation').val();
            var evaluationID = $('#evaluationID').val();

            var error = 0;
              if(evaluation == "" || evaluation == null) {
                error++;
                $("#evaluation_error").html("");
                $("#evaluation_error").html("<?=$this->lang->line('mail_to')?>").css("text-align", "left").css("color", 'red');
                $("#evaluationDiv").addClass("has-error");
            } else {
                $("#evaluation_error").html("");
                $("#evaluationDiv").removeClass("has-error");
            }
              if(error == 0) {
                  $.ajax({
                      type: 'POST',
                      url: "<?=base_url('student/addEvaluation')?>",
                      data: 'evaluationID='+ evaluationID +"&studentID="+ <?=$student->studentID?> + "&evaluation=" + evaluation,
                      dataType: "html",
                      success: function(data) {
                          location.reload();
                      }
                  });
              }
        });

        $( ".edit_evaluation_btn" ).click(function() {

           // alert("classは先頭に「.」を付けて取得します。");
        	var id = $(this).prop('id');
        	var kk = id.split("_");


        	var data = [];
        	var tr = $('#evaluationTable tr' ).eq(kk[1]);


        	for( var i=0,l=tr.length;i<l;i++ ){
       		 var cells = tr.eq(i).children();//1行目から順番に列を取得(th、td)
       		 for( var j=0,m=cells.length;j<m;j++ ){
	       		 if( typeof data[i] == "undefined" )
	       		 data[i] = [];
	       		 data[i][j] = cells.eq(j).text();//i行目j列の文字列を取得

       		 }
       		}

        	$('#evaluation').val(data[0][1]);
        	$('#evaluationID').val(kk[2]);



        });



        $("#send_pdf").click(function(){
            var to = $('#to').val();
            var subject = $('#subject').val();
            var message = $('#message').val();
            var id = "<?=$student->studentID;?>";
            var set = "<?=$set;?>";
            var error = 0;

            if(to == "" || to == null) {
                error++;
                $("#to_error").html("");
                $("#to_error").html("<?=$this->lang->line('mail_to')?>").css("text-align", "left").css("color", 'red');
            } else {
                if(check_email(to) == false) {
                    error++
                }
            }

            if(subject == "" || subject == null) {
                error++;
                $("#subject_error").html("");
                $("#subject_error").html("<?=$this->lang->line('mail_subject')?>").css("text-align", "left").css("color", 'red');
            } else {
                $("#subject_error").html("");
            }

            if(error == 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('student/send_mail')?>",
                    data: 'to='+ to + '&subject=' + subject + "&id=" + id+ "&message=" + message+ "&set=" + set,
                    dataType: "html",
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });
    </script>
    <?php } ?>
