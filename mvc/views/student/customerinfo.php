<?php
    $usertype = $this->session->userdata("usertype");
?>
<?php
if($usertype <> "Student") {
?>
<div class="row col-md-12">
	<div class="alert alert-info">
	  <p><span class="center"><?=$this->lang->line('student_info')?></span></p>
	</div>
</div>
<div class="row col-md-12">
		<div class="col-md-6">
		                   <?php
		                        if(form_error('salesmanID'))
		                            echo "<div class='form-group has-error' >";
		                        else
		                            echo "<div class='form-group' >";
		                    ?>
							<label class="col-sm-3 control-label"><?=$this->lang->line("student_salesman")?> <span class="required">必須</span></label>
								<div class="col-sm-9">
								  <div class="select2-wrapper">
                                     <?php
									 	$disabled = ' disabled';
										if($usertype == "Admin" || $usertype == "Teacher" || $usertype == "TeacherManager") {
											$disabled = '';
										}
                                    $array = array('' => '请选择');
                                    foreach ($salesmans as $salesman) {
                                        $array[$salesman->teacherID] = $salesman->name." (" . $salesman->email ." )";
                                    }
                                    if(isset($student)){
                                      echo form_dropdown("salesmanID", $array, set_value("salesmanID",$student->salesmanID), "id='salesmanID' class='form-control salesmanID'".$disabled);
                                   }else{
                                      echo form_dropdown("salesmanID", $array, set_value("salesmanID"), "id='salesmanID' class='form-control salesmanID'");
                                   }
                                    ?>
                                     </div>
                                     <span class="control-label">
				                            <?php echo form_error('salesmanID'); ?>
		                        </span>
					        </div>
						</div>
				</div>
				<div class="col-md-6">

						<div class="form-group">
							<label class="col-sm-3 control-label"><?=$this->lang->line("student_createusername")?></label>
							<div class="col-sm-9">
								<p class="form-control-static">
								<?php
								  $username = $this->session->userdata('name');
								  echo $username;
								  ?>
								</p>
							</div>
						</div>
				</div>
</div>

<div class="row col-md-12">
	<div class="col-md-6">
			<?php
							 if(form_error('input_date'))
									 echo "<div class='form-group has-error' >";
							 else
									 echo "<div class='form-group' >";
					 ?>
			<label class="col-sm-3 control-label"><?=$this->lang->line("student_input_date")?><span class="required">必須</span></label>
			<div class="col-sm-9">
			<?php if (isset($student)) {?>
			<input type="text" class="form-control" id="input_date" name="input_date" value="<?=set_value('input_date',$student->input_date)?>" placeholder="1992/08/02">
								 <?php } else {?>
			<input type="text" class="form-control" id="input_date" name="input_date" value="<?=set_value('input_date')?>"   placeholder="1992/08/02">
								 <?php }?>
								 <span class="control-label">
										 <?php echo form_error('input_date'); ?>
					 </span>
			</div>
		</div>
	</div>
</div>
<?php
}
?>

<div class="row col-md-12">
	<div class="alert alert-info">
	  <p><span class="center"><?=$this->lang->line('student_info')?></span></p>
	</div>
</div>

<div class="row col-md-12 ">
	<div class="col-md-6">


	                  <?php
	                        if(form_error('name'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label">
							<?php 
								echo $this->lang->line("student_name");
								if($usertype <> "Student") {
									echo "<span class='required'>必須</span>";
									$disabled_name = '';
								}else{
									$disabled_name = 'disabled';
								}
							?>
						</label>
						<div class="col-sm-9">
						    <?php if (isset($student)) {?>
							<input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name',$student->name)?>" <?=$disabled_name?>   placeholder="张三">
	                        <?php } else {?>
							<input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name')?>"   placeholder="张三">

	                        <?php }?>
	                        <span class="control-label">
	                            <?php echo form_error('name'); ?>
	                        </span>
						</div>
					</div>
		             <!-- <?php
	                        if(form_error('dob'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_dob")?><span class="required">必須</span></label>
						<div class="col-sm-9">
							<?php if (isset($student)) {?>
							<input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob',$student->dob)?>" placeholder="1992/08/02">
	                        <?php } else {?>
							<input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob')?>"   placeholder="1992/08/02">
	                        <?php }?>
	                        <span class="control-label">
	                            <?php echo form_error('dob'); ?>
				            </span>
						</div>
					</div> -->


             <?php
                      if(form_error('wechat'))
                          echo "<div class='form-group has-error' >";
                      else
                          echo "<div class='form-group' >";
                ?>
							<label class="col-sm-3 control-label"><?=$this->lang->line("student_wechat")?></label>
							<div class="col-sm-9">
							    <?php if (isset($student)) {?>
							      <input type="text" class="form-control"  id="wechat" name="wechat" value="<?=set_value('wechat',$student->wechat)?>"  >
		                        <?php } else {?>
							      <input type="text" class="form-control"  id="wechat" name="wechat" value="<?=set_value('wechat')?>"  >
		                        <?php } ?>

							</div>
			                 <span class="control-label">
		                            <?php echo form_error('wechat'); ?>
		                     </span>

						</div>
					  <?php
	                        if(form_error('phone'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_phone")?><span class="required">必須</span></label>
						<div class="col-sm-9">
						<?php if (isset($student)) {?>
							<input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone',$student->phone)?>"  placeholder="090-1111-2222">
	                        <?php } else {?>
							<input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone')?>"  placeholder="090-1111-2222">
	                        <?php }?>
							<span class="control-label">
	                            <?php echo form_error('phone'); ?>
	                        </span>
						</div>
					</div>
					<?php
					if($usertype <> "Student") {
					?>
		             <?php
	                        if(form_error('possibility'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_possibility")?><span class="required">必須</span></label>
						<div class="col-sm-9">
						<?php
                                       $studentCategory = $this->session->userdata("studentPossibility");

                                       if (isset($student)){
                                         echo form_dropdown("possibility", $studentCategory, set_value("possibility",$student->possibility), "id='possibility' class='form-control'");
                                       }else{
                                          echo form_dropdown("possibility", $studentCategory, set_value("possibility"), "id='possibility' class='form-control'");
                                       }

                                         ?>
		                    <span class="control-label">
	                            <?php echo form_error('possibility'); ?>
	                        </span>
						</div>
					</div>
					<?php } ?>
		             <?php
	                        if(form_error('language_school'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_language_school")?></label>
						<div class="col-sm-9">
						    <?php if (isset($student)) {?>
							<input type="text" class="form-control" id="language_school" name="language_school" value="<?=set_value('language_school',$student->language_school)?>"  placeholder="千叶日语学校">
	                        <?php } else {?>
							<input type="text" class="form-control" id="language_school" name="language_school" value="<?=set_value('language_school')?>"  placeholder="千叶日语学校">
	                        <?php } ?>
							<span class="control-label">
	                            <?php echo form_error('language_school'); ?>
	                        </span>
						</div>
					</div>
		             <!-- <?php
	                        if(form_error('address'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_address")?></label>
						<div class="col-sm-9">
						    <?php if (isset($student)) {?>
						    <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address',$student->address)?>"  placeholder="神奈川県横浜市西区１－２－１">
	                        <?php } else {?>
						    <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address')?>"  placeholder="神奈川県横浜市西区１－２－１">
	                        <?php } ?>
						    <span class="control-label">
	                            <?php echo form_error('address'); ?>
	                        </span>
						</div>
					</div> -->

		             <?php
	                        if(form_error('graduated_school'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                  ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("graduated_school")?></label>
						<div class="col-sm-9">
						<?php if (isset($student)) {?>
						<input type="text" class="form-control" id="graduated_school" name="graduated_school" value="<?=set_value('graduated_school',$student->graduated_school)?>">
	                     <?php } else {?>
						<input type="text" class="form-control" id="graduated_school" name="graduated_school" value="<?=set_value('graduated_school')?>">
	                     <?php  }?>
						<span class="control-label">
	                            <?php echo form_error('graduated_school'); ?>
	                     </span>
						</div>
					</div>

			</div>

			<div class="col-md-6">

		             <?php
	                        if(form_error('sex'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label">
							<?php 
								echo $this->lang->line("student_sex");
								if($usertype <> "Student") {
									echo "<span class='required'>必須</span>";
									$disabled_sex = '';
								}else{
									$disabled_sex = ' disabled';
								}
							?>
						</label>
							<div class="col-sm-9">
                            <?php
                               if (isset($student)) {
                                   echo form_dropdown("sex", array("" => "请选择",$this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("sex",$student->sex), "id='sex' class='form-control'".$disabled_sex);
                               }else{
                                   echo form_dropdown("sex", array("" => "请选择",$this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("sex"), "id='sex' class='form-control'");
                               }
                            ?>
		                 <span class="control-label">
	                            <?php echo form_error('sex'); ?>
	                     </span>
						</div>
					</div>

		             <?php
	                        if(form_error('email'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                  ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_email")?><!--<span class="required">必須</span>--></label>
						<div class="col-sm-9">
						<?php if (isset($student)) {?>
						<input type="text" class="form-control" id="email" name="email" value="<?=set_value('email',$student->email)?>"  placeholder="test@gmail.com">
	                     <?php } else {?>
						<input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>"  placeholder="test@gmail.com">
	                     <?php  }?>
						<span class="control-label">
	                            <?php echo form_error('email'); ?>
	                     </span>
						</div>
					</div>
		             <?php
	                        if(form_error('category'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                  ?>
						<label class="col-sm-3 control-label">
							<?php 
								echo $this->lang->line("student_category");
								if($usertype <> "Student") {
									echo "<span class='required'>必須</span>";
									$disabled_category = '';
								}else{
									$disabled_category = ' disabled';
								}
							?>
						</label>
						<div class="col-sm-9">
						<?php
                                       $studentCategory = $this->session->userdata("studentCategory");
                                       if (isset($student)){
                                          echo form_dropdown("category", $studentCategory, set_value("category",$student->category), "id='category' class='form-control'".$disabled_category);
                                       }else{
                                          echo form_dropdown("category", $studentCategory, set_value("category"), "id='category' class='form-control'");
                                       }
                        ?>

						</div>
					</div>
					<?php
					if($usertype <> "Student") {
					?>
		             <?php
	                        if(form_error('source'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                  ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_source")?><span class="required">必須</span></label>
						<div class="col-sm-9">
                            <?php
                                $studentSource = $this->session->userdata("studentSource");
                                foreach ($this->code_m->getcodeToArray(array('codeName'=>'studentSource', 'loadflag' => '1')) as $key => $value) {
									$studentSource[$key] = $value;
								}
								if(isset($student)){
                                    echo form_dropdown("source", $studentSource, set_value("source",$student->source), "id='source' class='form-control'");
                                }else{
                                    echo form_dropdown("source", $studentSource, set_value("source"), "id='source' class='form-control'");
                                }
                            ?>
                          <span class="control-label">
	                            <?php echo form_error('source'); ?>
	                     </span>
						</div>

					</div>
		             <?php
	                        if(form_error('source_memo'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                  ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_source_memo")?><span class="required">必須</span></label>
						<div class="col-sm-9">
						<?php 
							$studentSourcePartner = $this->session->userdata("studentSourcePartner"); 
							foreach ($this->code_m->getcodeToArray(array('codeName'=>'studentSourcePartner', 'loadflag' => '1')) as $key => $value) {
								$studentSourcePartner[$key] = $value;
							}
						?>
						<?php if (isset($student)) {?>
						<input type="text" class="form-control" id="source_memo" name="source_memo" value="<?=set_value('source_memo',$student->source_memo)?>"  placeholder="">
                        <?php echo form_dropdown("source_partner", $studentSourcePartner, set_value("source_partner",$student->source_memo), "id='source_partner' class='form-control' ");
                        ?>
						<?php } else {?>
						<input type="text" class="form-control" id="source_memo" name="source_memo" value="<?=set_value('source_memo')?>"  placeholder="">
                        <?php echo form_dropdown("source_partner", $studentSourcePartner, set_value("source_partner"), "id='source_partner' class='form-control station'");
                        ?>
						<?php  }?>

                         </div>
					</div>
					<?php } ?>
		             <?php
	                        if(form_error('latest_education'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                  ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("latest_education")?></label>
						<div class="col-sm-9">
						<?php if (isset($student)) {?>
						<input type="text" class="form-control" id="latest_education" name="latest_education" value="<?=set_value('latest_education',$student->latest_education)?>">
	                     <?php } else {?>
						<input type="text" class="form-control" id="latest_education" name="latest_education" value="<?=set_value('latest_education')?>">
	                     <?php  }?>
						<span class="control-label">
	                            <?php echo form_error('latest_education'); ?>
	                     </span>
						</div>
					</div>

			</div>
</div>

<script type="text/javascript">

/*
$(window).load(function() {
	$('#source_partner').hide();
	});
*/

//var set = "<?php echo implode(",", $studentSourcePartner);?>";

var set = "<?php if (isset($student)) {echo 0;} else echo 1;?>";

//添加记录是，直接隐藏
if(set == 1){
	$('#source_partner').hide();
}

//全ての駅名を非表示にする


// $('#dob').datepicker({
//     format: "yyyy-mm-dd",
//     startView: 2,
//     language: "zh-CN",
//     autoclose: true
// });
$('#input_date').datepicker({
    format: "yyyy-mm-dd",
    startView: 3,
    language: "zh-CN",
    autoclose: true
});

$('#source').change(function(event) {
    var source = $(this).val();
    if(source !== '3') {
    	$('#source_partner').hide();
    	$('#source_memo').show();
    } else {
    	$('#source_partner').show();
    	$('#source_memo').hide();
    }
});
$('#source_partner').change(function(event) {
	$('#source_memo').val($('#source_partner').val());
});

$(document).ready(function(){
	$('#source').change();
});


</script>
