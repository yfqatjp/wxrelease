
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-teacher"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("teacher/index")?>"><?=$this->lang->line('menu_teacher')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_teacher')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                    <?php
                        if(form_error('name'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacher_name" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_name")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name', $teacher->name)?>" >

                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('sex'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sex" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_sex")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                echo form_dropdown("sex", array($this->lang->line('teacher_sex_male') => $this->lang->line('teacher_sex_male'), $this->lang->line('teacher_sex_female') => $this->lang->line('teacher_sex_female')), set_value("sex", $teacher->sex), "id='sex' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('teacher_type'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacher_type" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_type")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                          <?php
                                $teacherType = $this->session->userdata("teacherType");
                                if (isset($teacher)){
                                    echo form_dropdown("teacher_type", $teacherType, set_value("teacher_type", $teacher->teachertype), "id='category' class='form-control'");
                                }else{
                                    echo form_dropdown("teacher_type", $teacherType, set_value("teacher_type"), "id='category' class='form-control'");
                                }
                        ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacher_type'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('teacher_bank'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacher_bank_name" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_bank")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="银行名" id="teacher_bank_name" name="teacher_bank_name" value="<?=set_value('teacher_bank_name', $teacher->bankname)?>" >
                            <input type="text" class="form-control" placeholder="支店名" id="teacher_bank_branch" name="teacher_bank_branch" value="<?=set_value('teacher_bank_branch', $teacher->bankbranch)?>" >
                            <input type="text" class="form-control" placeholder="账号" id="teacher_bank_account" name="teacher_bank_account" value="<?=set_value('teacher_bank_account', $teacher->bankaccount)?>" >
                            <input type="text" class="form-control" placeholder="名义人" id="teacher_bank_account_name" name="teacher_bank_account_name" value="<?=set_value('teacher_bank_account_name', $teacher->bankaccountname)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacher_bank'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('teacher_school'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacher_school" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_school")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="在读学校" id="teacher_school" name="teacher_school" value="<?=set_value('teacher_school', $teacher->teacherschool)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacher_school'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('teacher_special'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacher_special" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_special")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="专攻名" id="teacher_special" name="teacher_special" value="<?=set_value('teacher_special', $teacher->teacherspecial)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacher_special'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('email'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="email" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_email")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $teacher->email)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('phone'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="phone" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', $teacher->phone)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('address'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="address" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_address")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address', $teacher->address)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('jod'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="jod" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_jod")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="jod" name="jod" value="<?=set_value('jod', date("Y-m-d", strtotime($teacher->jod)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('jod'); ?>
                        </span>
                    </div>

                    
                    <?php $usertype = $this->session->userdata("usertype");  
                    
                    if($usertype == "Admin" || $usertype == "TeacherManager"){

                    ?>
                    
                    <?php
                        if(form_error('wage_type'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="wage_type" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_wage_type")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                        <?php
                                $wageType = $this->session->userdata("wageType");
                                if (isset($teacher)){
                                    if(!isset($teacher->wage_type)) $teacher->wage_type = "";                                   
                                    echo form_dropdown("wage_type", $wageType, set_value("wage_type", $teacher->wage_type), "id='wage_type' class='form-control'");
                                }else{
                                    echo form_dropdown("wage_type", $wageType, set_value("wage_type"), "id='wage_type' class='form-control'");
                                }
                        ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('wage_type'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('fixed_remuneration'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="fixed_remuneration" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_wage_fixed_remuneration")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="fixed_remuneration" name="fixed_remuneration" value="<?=set_value('fixed_remuneration', $teacher->fixed_remuneration)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('fixed_remuneration'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('affairs_timing_remuneration'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="affairs_timing_remuneration" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_wage_affairs_timing_remuneration")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="affairs_timing_remuneration" name="affairs_timing_remuneration" value="<?=set_value('affairs_timing_remuneration', $teacher->affairs_timing_remuneration)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('affairs_timing_remuneration'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('lecture_timing_remuneration'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="lecture_timing_remuneration" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_wage_lecture_timing_remuneration")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="lecture_timing_remuneration" name="lecture_timing_remuneration" value="<?=set_value('lecture_timing_remuneration', $teacher->lecture_timing_remuneration)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('lecture_timing_remuneration'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('vip_timing_remuneration'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="vip_timing_remuneration" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_wage_vip_timing_remuneration")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="vip_timing_remuneration" name="vip_timing_remuneration" value="<?=set_value('vip_timing_remuneration', $teacher->vip_timing_remuneration)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('vip_timing_remuneration'); ?>
                        </span>
                    </div>

                    <?php } ?>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-warning" value="<?=$this->lang->line("update_teacher")?>" >
                        </div>
                    </div>

                </form>
            </div><!-- col-sm-8 -->
        </div>
    </div>
</div>


<script type="text/javascript">

$('#jod').datepicker({
    format: "yyyy-mm-dd",
    startView: 3,
    language: "zh-CN",
    autoclose: true
});
/*                            
document.getElementById("uploadBtn").onchange = function() {
    document.getElementById("uploadFile").value = this.value;
};
$('#dob').datepicker({ startView: 2 });
$('#jod').datepicker();
*/
</script>
