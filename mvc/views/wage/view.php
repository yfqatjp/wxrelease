
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-money"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_wage_view')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin") {
                ?>
                <div class="col-sm-6 col-sm-offset-3 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label for="date" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line('wage_yearmonth')?>
                                </label>
                             <!--    <div class="col-sm-6">
                                    <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date', $date)?>" >
                                </div>
                                 --><div class="col-sm-6">
                                 <?php
                                        $array = array("" => "请选择");
                                        if(count($wage_status_list)){
                                        	foreach($wage_status_list as $wage_status) {
                                               $array[$wage_status->yearMonth] = $wage_status->yearMonth;
                                        	}
                                        }
                                        echo form_dropdown("date", $array,set_value("date", $date), "id='date' class='form-control'");
                                    ?>
                                </div>
                            </div>
								<div class="form-group">
								<div class="col-sm-8 col-sm-offset-5">
								 <button type="submit" id="search" class="btn btn-warning"><?=$this->lang->line('wage_view')?></button>
								 </div>
								</div>
                        </form>
                    </div>
                </div>


                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('wage_name')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('teacher_wage_type')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('wage_yearmonth')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('wage')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('wage_transportation_expenses')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('wage_total')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('wage_calculation_state')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sumTotal = 0;
                            $transportTotal = 0;
                            $sum = 0;
                            
                            if(count($wage_list)) {
                            $i = 1;
                              	    
                            foreach($wage_list as $wage) {
                            ?>
                            <tr>
                                <td data-title="<?=$this->lang->line('slno')?>">
                                    <?php
                                        echo $i;
                                    ?>
                                </td>

                                <td>
                                    <?php echo $wage->name; ?>
                                </td>
                                <td>
                                    <?php //echo $wage->wage_type;
                                        $wage_type = $this->session->userdata("wageType");
                                        if(array_key_exists($wage->wage_type,$wage_type)){
                                            echo $wage_type[$wage->wage_type];
                                        }
                                        ?>
                                </td>
                                <td>
                                    <?php echo $wage->yearMonth; ?>
                                </td>
                                <td>
                                    <?php echo number_format($wage->total)."円"; 
                                          $sumTotal = $sumTotal + $wage->total;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    	echo number_format($wage->transportTotal)."円";
                                    	$transportTotal = $wage->transportTotal + $transportTotal;
                                    ?>
                                </td>
                                <td>
                                    <?php echo number_format($wage->transportTotal + $wage->total)."円"; 
                                               $sum = $sum + $wage->transportTotal + $wage->total;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $wageCalcStatus = $this->session->userdata("wageCalcStatus");

                                        if(array_key_exists($wage->status,$wageCalcStatus)){

                                           if($wage->status == 5)
                                           	echo "<button class='btn btn-warning btn-xs'>".$wageCalcStatus[$wage->status]."</button>";
                                           elseif($wage->status == 6)
                                           echo "<button class='btn btn-danger btn-xs'>".$wageCalcStatus[$wage->status]."</button>";                                            
                                           elseif($wage->status == 4)
                                           echo "<button class='btn btn-info btn-xs'>".$wageCalcStatus[$wage->status]."</button>";
                                           else{
                                           	echo $wageCalcStatus[$wage->status];
                                           }
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo btn_view('wage/details/'.$wage->teacherID, $this->lang->line('view'));
                                    ?>
                                   <?php  if($wage->status != 5) {?>
                                    <a onclick="calc(<?=$wage->teacherID?>,'<?=$wage->yearMonth?>',<?=$wage->status?>)" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="<?=$this->lang->line('recalculate')?>">
                                        <i class="fa fa-calculator"></i>
                                    </a>
                                    <?php  } ?>
                                </td>
                        </tr>
                            <?php $i++; }} ?>
                        </tbody>
                        
                            <?php if(count($wage_list)) {
                            ?>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>总计：</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><?php echo number_format($sumTotal)."円"; ?></th>
                                <th><?php echo number_format($transportTotal)."円"; ?></th>
                                <th><?php echo number_format($sum)."円"; ?></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                            <?php }
                            ?>                        
                    </table>
                </div>
                <?php } ?>

            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">

    function calc(teacherID,yearmonth,status){

    	if(status == '5'){
        	alert("手动修改过的数据不能进行重新计算");
            return false;
        }
    	if(status == '2'){
        	alert("正在自动计算中，请稍等再操作！");
            return false;
        }

        if(confirm('将重新计算所选员工的工资，确定重新计算吗?')){
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
            };
            $.ajax({
                type: 'POST',
                url: "<?=base_url('wage/calc_single')?>",
                data: {
                    "teacherID":teacherID,
                    "yearmonth":yearmonth
                },
                dataType: "html",
                success: function(data) {
                    if(data == '成功'){
                        toastr.clear();
                        toastr["success"](data);
                    }else{
                        toastr.clear();
                        toastr["error"](data);
                    }
                },
                error: function(data) {
                    toastr.clear();
                    toastr["error"](data);
                }
            });
            toastr["success"]("计算中...");
        }
    }
</script>
