<style>

span.label {
	margin-left: 30px;
}
.center {
	display: block;
	text-align: center;
}
</style>

<script>

</script>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("student/index")?>"><?=$this->lang->line('menu_student')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    
    <!-- form start -->
    <div class="box-body">
				<div class="componant-section" id="inputs">
					
					<div class="row ">
						<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
						
						  <!-- 调用添加客户情报界面 -->
	                      <?php $this->load->view("student/customerinfo"); ?>				 
	
	
							<div class="form-group">
	                        <div class="col-sm-12 center">
	                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_customer")?>" >
	                        </div>
	                    </div>
                      </form>
					</div> <!-- /row -->
				</div>
	</div>
</div><!-- /.box -->
