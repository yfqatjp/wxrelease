
<?php
    if(count($teacher)) {
        $usertype = $this->session->userdata("usertype");
        if($usertype == "Admin") {
?>
    <input type='hidden' id='teacherID' value="<?=$teacher->teacherID?>">
    <div class="well">
        <div class="row">
            <div class="col-sm-6">
                <a class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button' onclick="openModal()">
                    <i class='fa fa-plus'></i> 追加明细
                </a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                    <li><a href="<?=base_url("wage/view")?>"><?=$this->lang->line('menu_wage_view')?></a></li>
                    <li class="active"><?=$this->lang->line('view')?></li>
                </ol>
            </div>
        </div>
    </div>
    <?php } ?>

    <div id="printablediv">
        <section class="panel">
            <div class="profile-view-head">
                <a href="#">
                    <?=img(base_url('uploads/images/'.$teacher->photo))?>
                </a>

                <h1><?=$teacher->name?></h1>

            </div>
            <div class="panel-body profile-view-dis">
                <h1><?=$this->lang->line("personal_information")?></h1>
                <div class="row">
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_jod")?> </span>: <?=date("Y-M-d", strtotime($teacher->jod))?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_sex")?> </span>: <?=$teacher->sex?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_phone")?> </span>: <?=$teacher->phone?></p>
                    </div>
                    <div class="profile-view-tab">
                        <p><span><?=$this->lang->line("teacher_bank")?> </span>: <?=$teacher->bankname?>|<?=$teacher->bankbranch?>|<?=$teacher->bankaccount?>|<?=$teacher->bankaccountname?></p>
                    </div>
                </div>
    <?php   if($wage_list) { ?>
            <h1>
                <?=$this->lang->line("wage_details")?>
            </h1>
            <div class="row">
                <div class="col-xs-2">
                <?php
                    $wage_yearmonth_list = [];
                    foreach ($wage_list as $row) {
                        $wage_yearmonth_list[$row->yearMonth] = $row->yearMonth;
                    }
                    echo form_dropdown("wage_yearmonth", $wage_yearmonth_list, set_value("wage_yearmonth",$yearmonth), "id='wage_yearmonth' class='form-control'");
                ?>
                </div>
            </div>
    <?php  } ?>
    <?php  if($wage_details){?>
            <div class="row">
                <div class="col-sm-12" id="hide-table">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-1">工资类型</th>
                                <th class="col-sm-2">工作时间</th>
                                <th class="col-sm-2">工资</th>
                                <th class="col-sm-3">备考</th>
                                <th class="col-sm-3"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            foreach ($wage_details as $row) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php
                                        $wageTypeDetail = $this->session->userdata("wageTypeDetail");
                                        if(array_key_exists($row->typeOfWork,$wageTypeDetail)){
                                            echo $wageTypeDetail[$row->typeOfWork];
                                        }
                                    ?>

                                </td>
                                <td>
                                    <?php 
                                    if($row->workingHours == 0){
                                           echo "-";                                    	
                                    }else{
                                      
                                        echo $row->workingHours."時間";
                                    	
                                    }
                                     ?>
                                </td>
                                <td>
                                    <?php echo $row->total."円"; ?>
                                </td>
                                <td>
                                    <?php echo $row->note; ?>
                                </td>
                                <td>
                                    <label onclick="openModal(<?=$row->wageDetailsID?>)">
                                    <a class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="编辑">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    </label>
                                    <?php
                                        echo btn_delete('wage/delete/'.$teacher->teacherID.'/'.$row->wageDetailsID, $this->lang->line('delete'));
                                    ?>
                                </td>
                            </tr>
                        <?php
                            $i++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->

        <div class="row">
                <!-- accepted payments column -->
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-6 col-lg-6 col-md-18">
                    <p class="lead">工资</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th class="col-sm-8 col-xs-8">工资合计</th>
                                <td class="col-sm-4 col-xs-4">
                                    <?php
                                        if($wage){
                                            echo $wage[0]->total."円";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

    <?php  } ?>
            </div>
        </section>
    </div>
<div id="myModal" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="glyphicon glyphicon-info-sign"></i><label  id="myModalLabel"></label></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
                <div id ="wageTypeDetailDiv"  class='form-group' >
                    <label for="wage_type" class="col-sm-2 col-sm-offset-2 control-label"> 工资类型</label>
                    <div class="col-sm-6">
                        <?php 
                              $array = array("0" => "请选择");
                              $wageTypeDetail = $this->session->userdata("wageTypeDetail");
                              echo form_dropdown("wageTypeDetail", $wageTypeDetail, set_value("wageTypeDetail"), "id='wageTypeDetail' class='form-control'");
                              
                          ?>
                    </div>
                    <span class="control-label" id="wageTypeDetail_error"></span>
                </div>
                <div id ="wage_details_amountDiv"  class='form-group' >
                    <label for="wage_details_amount" class="col-sm-2 col-sm-offset-2 control-label">金额</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="wage_details_amount" name="wage_details_amount" value="" >
                    </div>
                    <span class="control-label" id="wage_details_amount_error"></span>
                </div>
                <div class='form-group' >
                    <label for="working_Hours" class="col-sm-2 col-sm-offset-2 control-label">工作时长</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="working_Hours" name="working_Hours" value="" >
                    </div>
                </div>
                <div class='form-group' >
                    <label for="wage_details_note" class="col-sm-2 col-sm-offset-2 control-label"> 备注</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="wage_details_note" name="wage_details_note" value="" >
                    </div>
                </div>
                <div class='form-group' >
                    <label for="" class="col-sm-2 col-sm-offset-2 control-label"> 操作人</label>
                    <div class="col-sm-6">
                        <label class="form-control" for=""><?=$this->session->userdata('name');?></label>
                        <!-- <input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name')?>" > -->
                        <input type="hidden" id="wage_details_id">
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btn_add_tattendance" onclick="submit()" class="btn btn-success">完成</button>
            <button type="button" id="btn_add_tattendance" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> 关闭</button>
          </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('#wage_yearmonth').change(function() {
        window.location.href = "<?=base_url('wage/details/')?>/"+"<?=$teacher->teacherID?>/"+$('#wage_yearmonth').val();
    });

    function openModal(flg){
        if(flg){
            $('#myModalLabel').text('编辑明细');
            $('#wage_details_id').val(flg);
        }else{
            $('#myModalLabel').text('追加明细');
        }
        $('#myModal').modal('show');
    }
    $('#myModal').on('hidden.bs.modal', function (e) {
        clean();
    })
    $('#myModal').on('show.bs.modal', function (e) {
        init();
    })
    function init(){
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
              url: '<?=base_url('wage/init')?>',
              data: {
                  "wage_details_id":$('#wage_details_id').val()
              },
              dataType: "json",
              success: function(data) {
                  console.log(data);
                  if(data.status == 'ok'){
                      if(data.content){
                        var content = data.content;
                        $('#wageTypeDetail').val(content.typeOfWork);
                        $('#wage_details_amount').val(content.total);
                        $('#wage_details_note').val(content.note);
                        $('#working_Hours').val(content.workingHours);
                      }
                  }
              },
              error: function(data) {
                  toastr.clear();
                  toastr["error"]('初始化失败，请与管理员联系！');
              }
          });
    }
    function clean(){
        $('#wageTypeDetail').val('');
        $("#wageTypeDetail_error").html("");
        $("#wageTypeDetailDiv").removeClass("has-error");

        $('#wage_details_amount').val('');
        $("#wage_details_amount_error").html("");
        $("#wage_details_amountDiv").removeClass("has-error");
        
        $('#wage_details_note').val('');
        $('#wage_details_id').val('');
     }

    function submit(){
        
        var wageTypeDetail = $('#wageTypeDetail').val();
        var wage_details_amount = $('#wage_details_amount').val();

        var error = 0;
       if(wageTypeDetail == "" || wageTypeDetail == null) {
            error++;
            $("#wageTypeDetail_error").html("");
            $("#wageTypeDetail_error").html("必须填写").css("text-align", "left").css("color", 'red');
            $("#wageTypeDetailDiv").addClass("has-error");
        } else {
            $("#wageTypeDetail_error").html("");
            $("#wageTypeDetailDiv").removeClass("has-error");
        }
       
       if(wage_details_amount == "" || wage_details_amount == null) {
           error++;
           $("#wage_details_amount_error").html("");
           $("#wage_details_amount_error").html("必须填写").css("text-align", "left").css("color", 'red');
           $("#wage_details_amountDiv").addClass("has-error");
       } else {
           $("#wage_details_amount_error").html("");
           $("#wage_details_amountDiv").removeClass("has-error");
    	   
    	   if(isNaN(wage_details_amount)){
               $("#wage_details_amount_error").html("请输入数值类型").css("text-align", "left").css("color", 'red');
               $("#wage_details_amountDiv").addClass("has-error");
           }
       }              	

        if(error > 0){ return;}

          
       // if(confirm('将修改工资记录，确定要操作吗?')){
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
          var url = '';
          if($('#wage_details_id').val()){
              url = "<?=base_url('wage/edit')?>";
          }else{
              url = "<?=base_url('wage/add')?>";
          }
          $.ajax({
              type: 'POST',
              url: url,
              data: {
            	  "wage_details_id":$("#wage_details_id").val(),
                  "wage_type_detail":$('#wageTypeDetail').val(),
                  "wage_details_amount":$('#wage_details_amount').val(),
                  "working_hours":$('#working_Hours').val(),
                  "wage_details_note":$('#wage_details_note').val(),
                  "wage_details_id":$('#wage_details_id').val(),
                  "teacherID":$('#teacherID').val(),
                  "wage_yearmonth":$('#wage_yearmonth').val(),
              },
              dataType: "json",
              success: function(data) {
                  if(data.status == 'ok'){
                      $('#myModal').modal('hide');
                      toastr.clear();
                      toastr["success"]('成功');
                      setTimeout(function(){
                          window.location.href = '<?=base_url('wage/details')?>'+'/'+$('#teacherID').val();
                      },300);
                  }else{
                      toastr.clear();
                      toastr["error"](data.error);
                  }
              },
              error: function(data) {
                  toastr.clear();
                  toastr["error"](data.error);
              }
          });
     // }
    }
</script>
<?php } ?>
