
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-money"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_wage_calculator')?></li>
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
                <div class="col-sm-8 col-sm-offset-2 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post">
                            <div class='form-group' >
                                <label for="date" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line('wage_yearmonth')?>
                                </label>
                                <!-- 
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date', $date)?>" >
                                </div> -->
                                <div class="col-sm-5">
                                    <?php
                                        $array = array("" => "请选择");

                                        $date = new dateTime();
                                        
                                        for ($i=0;$i<6;$i++){
                                            if($i == 0){
												$month = $date->format("Y-m");
												$array[$month] = $month;                                            	
                                            }  
                                            
                                            $month = $date->add(DateInterval::createFromDateString("-1 month"))->format("Y-m");
                                        	$array[$month] = $month;
                                        }
                                        
                                        if(count($wage_status_list)){
                                        	foreach($wage_status_list as $wage_status) {
                                                    if(array_key_exists($wage_status->yearMonth,$array)){
                                                    	unset($array[$wage_status->yearMonth]);
                                                    }                                       		
                                        	}
                                        }
                                        
                                        echo form_dropdown("date", $array,null, "id='date' class='form-control'");
                                    ?>
                                </div>
                                
                                <div class="col-sm-1">
								    <button type="button" id="calc" class="btn btn-warning"><?=$this->lang->line('wage_auto_batch_calc')?></button>
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
                                <th class="col-sm-2"><?=$this->lang->line('wage_yearmonth')?></th>
                                <th class="col-sm-6"><?=$this->lang->line('wage_calculation_state')?></th>
                                <th class="col-sm-3"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($wage_status_list)) {
                              	    $i = 1;
                            foreach($wage_status_list as $wage_status) { 
                            ?>
                            <tr>
                                <td data-title="<?=$this->lang->line('slno')?>">
                                    <?php
                                        echo $i;
                                    ?>
                                </td>

                                <td>
                                    <?php echo $wage_status->yearMonth; ?>
                                </td>
                                <td>
                                    <?php 
                                        $wageCalcStatus = $this->session->userdata("wageCalcStatus");
                                        if(array_key_exists($wage_status->status,$wageCalcStatus)){
                                            echo $wageCalcStatus[$wage_status->status]; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        // echo btn_delete('tattendance/delete/'.$wage->teacherID, $this->lang->line('delete'));
                                        // echo btn_edit('tattendance/edit/'.$wage->teacherID, $this->lang->line('edit'));                                       
                                    ?>
                                   <a onclick="calc_one_month('<?=$wage_status->yearMonth?>')" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="<?=$this->lang->line('recalculate')?>">
                                        <i class="fa fa-calculator"></i>
                                    </a>
                                </td>
                        </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>

            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
  /*  $('#date').datepicker(
        {
            format: "yyyy-mm",
            startView: 3,
            minViewMode: 'months',
            language: "zh-CN",
            autoclose: true
        }
    );*/
    $('#calc').click(function(){
    	yearmonth = $('#date').val();

    	if(yearmonth == ""){
    		alert("请选择计算月份");
        }else{
        	calc_one_month(yearmonth);
        }
    });


    function calc_one_month(yearmonth){
        if(confirm('将计算指定月份所有员工的工资，确定计算吗?')){
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
              url: "<?=base_url('wage/calculate')?>",
              data: {
                  "yearmonth":yearmonth
              },
              dataType: "html",
              success: function(data) {
                  if(data == '成功'){
                      toastr.clear();
                      toastr["success"](data);
                      setTimeout(function(){
                          window.location.href = '<?=base_url('wage/')?>';
                      },300);
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
