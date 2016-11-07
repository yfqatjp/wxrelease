
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-invoice"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("invoice/index")?>"><?=$this->lang->line('menu_invoice')?></a></li>
            <li class="active"><?=$this->lang->line('add_payment')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <?php 
                    $usertype = $this->session->userdata("usertype"); 
                    if($usertype == "Admin" || $usertype == "TeacherManager") { 
                ?>
                    <form class="form-horizontal" role="form" method="post">

                    <?php 
                        if(form_error('payment_class')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="payment_class" class="col-sm-2 control-label">
                            <?=$this->lang->line("invoice_paymenttype")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $payment_classes = $this->session->userdata("paymentClass");
                                foreach ($payment_classes as $key => $value) {
                                    if($key){
                                        $payment_classes_options[$key] = $value;
                                    }
                                }
                                echo form_dropdown("payment_class", $payment_classes_options, set_value("payment_class", $payment->paymentclass), "id='payment_class' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('payment_class'); ?>
                        </span>
                    </div>
                    
                    <?php 
                        if(form_error('amount')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="amount" class="col-sm-2 control-label">
                            <?=$this->lang->line("invoice_amount")?>
                        </label>
                        <div class="col-sm-6">
                               <input type="text" class="form-control" id="amount" name="amount" value="<?=set_value('amount', $payment->paymentamount)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('amount'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('payment_method')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="payment_method" class="col-sm-2 control-label">
                            <?=$this->lang->line("invoice_paymentmethod")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = $this->session->userdata("paymentMethod");

                                echo form_dropdown("payment_method", $array, set_value("payment_method", $payment->paymenttype), "id='payment_method' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('payment_method'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('payment_principal')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="payment_method" class="col-sm-2 control-label">
                            <?=$this->lang->line("invoice_principal")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array_principal[$this->session->userdata("name")] = $this->session->userdata("name");
								// $array['Cheque'] = $this->lang->line('invoice_cheque');
								// $array['Paypal'] = $this->lang->line('invoice_paypal');
                                // $array['Reduce'] = $this->lang->line('invoice_reduce');
                                echo form_dropdown("payment_principal", $array_principal, set_value("payment_principal", $payment->principal), "id='payment_principal' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('payment_principal'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('payment_note'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="payment_note" class="col-sm-2 control-label">
                            <?=$this->lang->line("invoice_note")?>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="payment_note" name="payment_note"><?=set_value('payment_note', $payment->paymentnote)?></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('payment_note'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('payment_date'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="payment_note" class="col-sm-2 control-label">
                            <?=$this->lang->line("invoice_date")?>
                        </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="payment_date" name="payment_date" value="<?=set_value('payment_date', $payment->paymentdate)?>" >                          
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('payment_date'); ?>
                        </span>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_payment")?>" >
                        </div>
                    </div>

                    </form>
                <?php }  ?>
                  
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#classesID').change(function(event) {
    var classesID = $(this).val();
    if(classesID === '0') {
        $('#studentID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('invoice/call_all_student')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#studentID').html(data);
            }
        });
    }
});
$(function(){
    $('#payment_class').change(function(){
        if($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '4'){
            $('#payment_method').val('').prop("disabled", true);
        }else{
            $('#payment_method').prop("disabled", false);
        }
    })
});


$('#feetype').keyup(function() {
    var feetype = $(this).val();
    $.ajax({
        type: 'POST',
        url: "<?=base_url('invoice/feetypecall')?>",
        data: "feetype=" + feetype,
        dataType: "html",
        success: function(data) {
            if(data != "") {
                var width = $("#feetype").width();
                $(".book").css('width', width+25 + "px").show();
                $(".result").html(data);

                $('.result li').click(function(){
                    var result_value = $(this).text();
                    $('#feetype').val(result_value);
                    $('.result').html(' ');
                    $('.book').hide();
                });
            } else {
                $(".book").hide();
            }
           
        }
    });
});

$('#date').datepicker();
</script>