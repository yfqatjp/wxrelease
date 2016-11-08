
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-invoice"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_invoice')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <!-- <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin" || $usertype == "Accountant") {
                ?>
                <h5 class="page-header">
                    <a href="<?php echo base_url('invoice/add') ?>">
                        <i class="fa fa-plus"></i> 
                        <?=$this->lang->line('add_title')?>
                    </a>
                </h5>
                <?php } ?> -->
                <div class="col-sm-8 col-sm-offset-2 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label for="date_from" class="col-sm-2 col-sm-offset-2 control-label">查询区间
                                </label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="date_from" name="date_from" value="<?=set_value('date_from', $date_from)?>" >
                                        <span class="input-group-addon">
                                            ~
                                        </span>
                                        <input type="text" class="form-control" id="date_to" name="date_to" value="<?=set_value('date_to', $date_to)?>" >
                                    </div>
                                </div>
                            </div>
								<div class="form-group">
								<div class="col-sm-8 col-sm-offset-5">
								 <button type="submit" id="search" class="btn btn-warning">查询</button>
								 </div>
								</div>
                        </form>
                    </div>
                </div>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('invoice_studentName')?></th>
                                <th><?=$this->lang->line('invoice_pdate')?></th>
                                <th><?=$this->lang->line('invoice_paymentmethod')?></th>
                                <th><?=$this->lang->line('invoice_amount_total')?></th>
                                <th><?=$this->lang->line('invoice_paid_amount')?></th>
                                <th><?=$this->lang->line('invoice_principal')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sum1 = 0;
                                $sum2 = 0;
                                $oldinvoiceID = 0;
                                if(count($invoices)) {
                                    $i = 1; 
                                    foreach($invoices as $invoice) {

                                        if($oldinvoiceID != $invoice->invoiceID) {
                                        	$sum1 += $invoice->amount;
                                        }
                                        
                                        $oldinvoiceID = $invoice->invoiceID;
                                        
                                        //非减免取得
                                        $paid_array = $this->payment_m->get_paymentclass_IN(array('invoiceID' => $invoice->invoiceID));
                                                                                
                                        //减免取得
                                        $paid_array_Reduce = $this->payment_m->get_groupBypaymentclass(array('invoiceID' => $invoice->invoiceID));
                                        
                                        $mark = "";

                                        foreach ($paid_array_Reduce as $payclass) {

                                          if($payclass->paymentclass == '1'){
                                                  $mark = $mark . "（有减免）";
                                          }elseif ($payclass->paymentclass == '4'){
                                          	      $mark = $mark . "（有增加）";
                                          }
                                        }

                                           $sum2 += $invoice->paymentamount;

                            ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('invoice_studentName')?>">
                                        <?php echo $invoice->student; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_pdate')?>">
                                        <?php echo $invoice->paymentdate; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_paymentmethod')?>">
                                        <?php echo $invoice->paymenttype; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_amount_total')?>">
                                        <?php echo $siteinfos->currency_symbol. $invoice->amount . $mark; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_paid_amount')?>">
                                        <?php echo $siteinfos->currency_symbol. ($invoice->paymentamount); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('invoice_principal')?>">
                                        <?php echo $invoice->principal; ?>
                                    </td>

                                    
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php //echo btn_view('invoice/view/'.$invoice->invoiceID, $this->lang->line('view')) 
                                        echo btn_view('student/view/'.$invoice->studentID, $this->lang->line('view'))
                                        ?>
                                        <?php if($usertype == "Admin" || $usertype == "Accountant") { ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
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
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>总计：<?php echo $siteinfos->currency_symbol. $sum1; ?></th>
                                <th>总计：<?php echo $siteinfos->currency_symbol. $sum2; ?></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#date_from').datepicker(
        {
            format: "yyyy-mm-dd",
            startView: 3,
            language: "zh-CN",
            autoclose: true
        }
    );
    $('#date_to').datepicker(
        {
            format: "yyyy-mm-dd",
            startView: 3,
            language: "zh-CN",
            autoclose: true
        }
    );

</script>
