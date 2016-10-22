
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-money"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_subject_group')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                            <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin"){
                ?>
                <h5 class="page-header"><a href="<?php echo base_url('setting/addparameter') ?>"><i class="fa fa-plus"></i>
                    <?=$this->lang->line('add_parameter')?></a>
                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('setting_code_chinese_name')?></th>
                                <th class="col-sm-6"><?=$this->lang->line('setting_code_value')?></th>
                                <th class="col-sm-3"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($code_list)) {
                              	    $i = 1;
                            foreach($code_list as $code) { 
                            ?>
                            <tr>
                                <td data-title="<?=$this->lang->line('slno')?>">
                                    <?php
                                        echo $i;
                                    ?>
                                </td>

                                <td>
                                    <?php 
                                    $setting = $this->session->userdata("setting");
                                    if(array_key_exists($code->codeName,$setting)){
                                    	echo $setting[$code->codeName];
                                    }
                                     ?>
                                </td>
                                <td>
                                    <?php 
                                     echo $code->codeValue;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                         echo btn_delete('setting/deleteparameter/'.$code->codeId, $this->lang->line('delete'));
                                         echo btn_edit('setting/editparameter/'.$code->codeId, $this->lang->line('edit'));                                       
                                    ?>
                                    <!-- 
                                   <a onclick="calc_one_month('<?=$wage_status->yearMonth?>')" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="<?=$this->lang->line('recalculate')?>">
                                        <i class="fa fa-calculator"></i>
                                    </a> -->
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
