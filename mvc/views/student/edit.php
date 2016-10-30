<style>
/* 必須 */
.required{
    margin: 0 0.5em;
    padding: 0 0.5em;
    -webkit-border-radius: 6px;   /* Safari,Google Chrome */
    -moz-border-radius: 6px;      /* Firefox12まで */
    border-radius: 6px;           /* Firefox13以降 */
    background-color: #ff3957;
    color: #fff;
    font-weight: normal;
    font-size: 100%;
}

span.label {
	margin-left: 30px;
}
.center {
	display: block;
	text-align: center;
}
</style>
<?php
    $usertype = $this->session->userdata("usertype");
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('edit')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <?php
                if($usertype <> "Student") {
                ?>
            <li><a href="<?=base_url("student/index/$set")?>"><?=$this->lang->line('menu_student')?></a></li>
            <?php } ?> 
            <li class="active"> <?=$this->lang->line('edit')?></li>
        </ol>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
				<div class="componant-section" id="inputs">
					
					<div class="row ">
						<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
						
						  <!-- 调用添加客户情报界面 -->
	                      <?php $this->load->view("student/customerinfo"); ?>				 

                          <?php
                            if($usertype == "Admin" || $usertype == "Receptionist" || $usertype == "TeacherManager"|| $usertype == "Salesman") {
                            ?>
	                        <?php if ($student->classesID <> '1' || (isset($state) && $state == "join")) { ?>                    
						   		<!-- 调用添加客户情报界面 -->
	                      		<?php $this->load->view("student/joininfo"); ?>				 
	                        
	                        
	                        <?php } ?> 
                           <?php } ?> 
							
							<div class="form-group">
	                        <div class="col-sm-12 center">
	                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("submit")?>" >
	                        </div>
	                    </div>
                      </form>
					</div> <!-- /row -->
				</div>
	</div>

    
    
 
</div><!-- /.box -->
