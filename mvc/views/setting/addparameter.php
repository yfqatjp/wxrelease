
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("user/index")?>"><?=$this->lang->line('menu_user')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_user')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                    <?php
                        if(form_error('codename'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="code_value" class="col-sm-2 control-label">
                            <?=$this->lang->line("setting_code_chinese_name")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                              $array = array("0" => "请选择");
                              $codename = $this->session->userdata("setting");
                              echo form_dropdown("codename", $codename, set_value("codename"), "id='codename' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('codename'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('codevalue'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="codevalue" class="col-sm-2 control-label">
                            <?=$this->lang->line("setting_code_value")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="codevalue" name="codevalue" value="<?=set_value('codevalue')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('codevalue'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-warning" value="<?=$this->lang->line("edit")?>" >
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

</script>
