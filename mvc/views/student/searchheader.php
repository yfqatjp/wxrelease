<div class="row">
    <div class="col-sm-12">

        <?php
            $usertype = $this->session->userdata("usertype");
            if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {
        ?>
           <!-- <h5 class="page-header">
                <a href="<?php echo base_url('student/add') ?>">
                    <i class="fa fa-plus"></i>
                    <?=$this->lang->line('add_title')?>
                </a>
            </h5>
            -->
            <h5 class="page-header">
                <a href="<?php echo base_url('student/addcustomer') ?>">
                    <i class="fa fa-plus"></i>
                    <?=$this->lang->line('add_customer_title')?>
                </a>
            </h5>
        <?php } ?>

        <div class="col-sm-8 col-sm-offset-2 list-group">

                <form style="" class="form-horizontal" role="form" method="post">
<div>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">快速检索</a></li>
<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">普通检索</a></li>
<style type="text/css">
.nav-tabs{
    margin-bottom: -4px;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    background-color: #D9E0E7;
}
</style>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="home">
            <div class="list-group-item list-group-item-warning">
<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
        <?php if(isset($querystring)){ ?>
            <input type="text" class="form-control" id="querystring" name="$querystring" placeholder="姓名、微信号、手机号" value="<?=set_value('querystring', $querystring)?>" >
        <?php }else{ ?>
            <input type="text" class="form-control" id="querystring" name="$querystring" placeholder="姓名、微信号、手机号" value="<?=set_value('querystring')?>" >
        <?php } ?>
        <span class="input-group-btn">
            <button class="btn btn-warning" type="button" id="fuzzySearch">快速查询</button>
        </span>
        </div><!-- /input-group -->
    </div><!-- /.col-sm-12 -->
</div><!-- /.row -->
            </div>
</div>
<div role="tabpanel" class="tab-pane" id="profile">
<div class="list-group-item list-group-item-warning">
                    <div class = "right">
                        <a href="#" id="advancedSearch" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                            高级检索
                        </a>
                    </div>
                <!--
                    <div class="form-group">

                        <label for="classesID" class="col-sm-2 col-sm-offset-1 control-label">
                            <?=$this->lang->line("student_classes")?>
                        </label>
                        <div class="col-sm-7">
                            <?php
                             //   $array = array("0" => $this->lang->line("student_select_class"));
                            $array = array();
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                                if (isset($set)){
                                    echo form_dropdown("classesID", $array, set_value("classesID",$set), "id='classesID' class='form-control'");
                                }else{
                                    echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control'");
                                }
                            ?>
                        </div>
                       </div>  -->
         <div class="form-group">
          <label class="col-sm-2 col-sm-offset-1 control-label" for="checkboxes">学员状态</label>
          <div class="col-sm-7">
            <div class="radio-inline">
              <label><input type="radio" name="radiojoin" id="radio1" value="1" <?php  if (isset($set)){ if($set=="1") echo "checked"; } else { echo "checked";} ?>> 未报名</label>
            </div>
            <div class="radio-inline">
              <label><input type="radio" name="radiojoin" id="radio2" value="2" <?php  if (isset($set) && $set == "2"){ echo "checked"; } ?> > 已报名</label>
            </div>
            <div class="radio-inline">
              <label><input type="radio" name="radiojoin" id="radio3" value="3" <?php  if (isset($set) && $set == "3"){ echo "checked"; } ?> ></label>
            </div>
          </div>
         </div>
                        <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="checkboxes"><?=$this->lang->line("student_salesman")?></label>
                                        <div class="col-sm-7">
                            <select class="js-student-salesman-basic-multiple js-states form-control" id="id_student_salesman_multiple" multiple="multiple">
                                <?php
                                $student_salesman_array = array();
                                foreach ($salesmans as $salesman) {
                                    $student_salesman_array[$salesman->teacherID] = $salesman->name;
                                }

                                foreach ($student_salesman_array as $key => $value){
                                    if($key == "") continue;
                                    echo "<option value='".$key."'>".$value."</option>";
                                }
                                    ?>
                            </select>
                            <?php
                                foreach ($salesman_list as $key => $value) {
                            ?>
                                <input type="hidden" class="salesman_list" value="<?=$value?>">
                            <?php
                                }
                            ?>
          </div>
        </div>
         <div class="form-group">
          <label class="col-sm-2 col-sm-offset-1 control-label" for="checkboxes"><?=$this->lang->line("student_possibility")?></label>
          <div class="col-sm-7">
           <?php
                                $studentPossibility = $this->session->userdata("studentPossibility");
                                foreach ($studentPossibility as $key => $value){
                                 if($key == "") continue;
                                 $check ="";
                                if (isset($possibility) && $possibility != NULL){
              if (in_array($key, $possibility)) {
                    $check = "checked";
              }
                                }
                                ?>

             <label class="checkbox-inline" for="checkboxesPossibility-<?=$key?>">
             <input type="checkbox" name="possibilitycheckBox" id="checkboxesPossibility-<?=$key?>" value="<?=$key?>"  <?=$check?>>
              <?=$value?>
            </label>
                          <?php  } ?>
          </div>
        </div>
         <div class="form-group">
          <label class="col-sm-2 col-sm-offset-1 control-label" for="checkboxes"><?=$this->lang->line("student_category")?></label>
          <div class="col-sm-7">
           <?php
                                $studentCategory = $this->session->userdata("studentCategory");
                                foreach ($studentCategory as $key => $value){
                                 if($key == "") continue;
                                 $check ="";
                                if (isset($category) && $category != NULL){
              if (in_array($key, $category)) {
                    $check = "checked";
              }
                                }
                                ?>

             <label class="checkbox-inline" for="checkboxescategory-<?=$key?>">
             <input type="checkbox" name="categorycheckBox" id="checkboxescategory-<?=$key?>" value="<?=$key?>"  <?=$check?>>
              <?=$value?>
            </label>
                          <?php  } ?>
          </div>
        </div>
         <div class="form-group">
          <label class="col-sm-2 col-sm-offset-1 control-label" for="checkboxes"><?=$this->lang->line("student_source")?></label>
          <div class="col-sm-7">
           <?php
                                $studentSource = $this->session->userdata("studentSource");
                                foreach ($this->code_m->getcodeToArray(array('codeName'=>'studentSource', 'loadflag' => '1')) as $key => $value) {
									$studentSource[$key] = $value;
								}
                                foreach ($studentSource as $key => $value){
                                if($key == "") continue;
                                 $check ="";
                                if (isset($source) && $source != NULL){
              if (in_array($key, $source)) {
                    $check = "checked";
              }
                                }
                                ?>
             <label class="checkbox-inline" for="checkboxessource-<?=$key?>">
             <input type="checkbox" name="sourcecheckBox" id="checkboxessource-<?=$key?>" value="<?=$key?>" $ <?=$check?>>
             <?=$value?>
            </label>

                          <?php  } ?>
                          <div id="source_memo">
                            <?php
                                $studentSourcePartner = $this->session->userdata("studentSourcePartner");
                                foreach ($this->code_m->getcodeToArray(array('codeName'=>'studentSourcePartner', 'loadflag' => '1')) as $key => $value) {
                                    $studentSourcePartner[$key] = $value;
                                }
                                foreach ($studentSourcePartner as $key => $value) {
                                    if($key == "") continue;
                                    $check ="";
                                    if (isset($source_memo) && $source_memo != NULL){
                                        if (in_array($key, $source_memo)) {
                                            $check = "checked";
                                        }
                                    }
                            ?>
                                        <label class="checkbox-inline" for="checkboxessource_memo-<?=$key?>">
                                        <input type="checkbox" name="source_memocheckBox" id="checkboxessource_memo-<?=$key?>" value="<?=$key?>" $ <?=$check?>>
                                        <?=$value?>
                    </label>
                            <?php  } ?>
                          </div>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-8 col-sm-offset-5">
         <button type="button" id="search" class="btn btn-warning"><?=$this->lang->line("student_search")?></button>
         </div>
        </div>
</div>
</div>
</div>

</div>
                </form>
        </div>
    </div> <!-- col-sm-12 -->
</div><!-- row -->

<!-- Modal -->



<div id="myModal" class="modal fade" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">其他检索项目设定</h4>
        </div>
        <div class="modal-body">
             <form id="requestacallform"  class="form-horizontal" method="POST" name="requestacallform">
         <div class="form-group">
          <label class="col-sm-2 control-label" for="checkboxes">缴费状态</label>
          <div class="col-sm-9">
            <div>
              <label class="radio-inline"  for="paymentflag1" ><input type="radio" name="radiopayment" id="paymentflag1" value="1" <?php  if (isset($paymentflag)){ if($paymentflag=="1") echo "checked"; } else { echo "checked";} ?>> 全部</label>
              <label class="radio-inline" for="paymentflag2" ><input type="radio" name="radiopayment" id="paymentflag2" value="2" <?php  if (isset($paymentflag) && $paymentflag == "2"){ echo "checked"; } ?> > 未付清</label>
              <label class="radio-inline" for="paymentflag3"><input type="radio" name="radiopayment" id="paymentflag3" value="3" <?php  if (isset($paymentflag) && $paymentflag == "3"){ echo "checked"; } ?> > 已付清</label>
            </div>
            </div>
        </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="checkboxes">学生状态</label>
          <div class="col-sm-9">
            <div>
              <label class="radio-inline"  for="studentstate1" ><input type="radio" name="radiostudentstate" id="studentstate1" value="1" <?php  if (isset($studentstate)){ if($studentstate=="1") echo "checked"; } else { echo "checked";} ?>> 在籍中</label>
              <label class="radio-inline" for="studentstate2" ><input type="radio" name="radiostudentstate" id="studentstate2" value="2" <?php  if (isset($studentstate) && $studentstate == "2"){ echo "checked"; } ?> > 已过期</label>
              <label class="radio-inline" for="studentstate3"><input type="radio" name="radiostudentstate" id="studentstate3" value="3" <?php  if (isset($studentstate) && $studentstate == "3"){ echo "checked"; } ?> > 全部</label>
            </div>
            </div>
        </div>
         <div class="form-group">
          <label class="col-sm-2  control-label" for="checkboxes">报名课程</label>
          <div class="col-sm-9">
            <select class="js-student-class-basic-multiple js-states form-control" id="id_student_class_multiple" multiple="multiple">
                <?php
                    $classArray = array();
                    foreach ($classes as $classa) {
                        $classArray[$classa->classesID] = $classa->classes;
                    }

                    foreach ($classArray as $key => $value){
                        if($key == "") continue;
                        echo "<option value='".$key."'>".$value."</option>";
                    }
                ?>
            </select>
            <?php
                foreach ($class_list as $key => $value) {
            ?>
                <input type="hidden" class="class_list" value="<?=$value?>">
            <?php
                }
            ?>
          </div>
        </div>
                    </form>
          </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-warning">确定</button>
      </div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
/*   $('#classesID').change(function() {
var classesID = $(this).val();
if(classesID == 0) {
    $('#hide-table').hide();
    $('.nav-tabs-custom').hide();
} else {
    $.ajax({
        type: 'POST',
        url: "<?=base_url('student/student_list')?>",
        data: "id=" + classesID,
        dataType: "html",
        success: function(data) {
            window.location.href = data;
        }
    });
}
});
*/
var currentTab = '';
$('#advancedSearch').click(function() {
// alert("dddd");
});
var js_student_salesman_basic_multiple;
var js_student_class_basic_multiple;
$(document).ready(function(){
$js_student_salesman_basic_multiple = $(".js-student-salesman-basic-multiple").select2({
placeholder: "选择对应人"
});
$js_student_class_basic_multiple = $(".js-student-class-basic-multiple").select2({
placeholder: "选择课程"
});
var show_salesman_list = Array();
var selected_salesman_list_elem = $('.salesman_list');
for(var i=0; i< selected_salesman_list_elem.length; i++){
show_salesman_list.push($(selected_salesman_list_elem.get(i)).val());
}
$js_student_salesman_basic_multiple.val(show_salesman_list).trigger("change");
var show_class_list = Array();
var selected_class_list_elem = $('.class_list');
for(var i=0; i< selected_class_list_elem.length; i++){
show_class_list.push($(selected_class_list_elem.get(i)).val());
}
$js_student_class_basic_multiple.val(show_class_list).trigger("change");
toggleAdvancedSearch();
toggleCheckboxessource3();
$('input[name=radiojoin]:eq(2)').hide();
if($('input[name=radiojoin]:eq(2)').is(':checked')){
currentTab = '#home';
}else{
currentTab = '#profile';
}
$('a[href="' + currentTab + '"]').tab('show')
});
$('[name=radiojoin]').click(toggleAdvancedSearch);
$('[name=radiojoin]').click(function(){
if($('#hide-table')){
$('#hide-table').hide();
$('.nav-tabs-custom').hide();
}
});
$('a[data-toggle="tab"]').click(function (e) {
if($(e.target).prop('href').indexOf('#home')>0){
$('input[name=radiojoin]:eq(2)').prop('checked',true).hide();
currentTab = '#home';
}else{
$('input[name=radiojoin]:eq(0)').prop('checked',true);
currentTab = '#profile';
}
});
// $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//   if($(e.target).prop('href').indexOf('#home')>0){
//       $('input[name=radiojoin]:eq(2)').prop('checked',true).hide();
//       currentTab = '#home';
//   }else{
//       $('input[name=radiojoin]:eq(0)').prop('checked',true);
//       currentTab = '#profile';
//   }
// });
$('#checkboxessource-3').click(toggleCheckboxessource3);
function toggleCheckboxessource3(){
if($('#checkboxessource-3').is(':checked')){
$('#source_memo').show();
}else{
$('#source_memo').hide();
$('input[name="source_memocheckBox"]').prop("checked",false);
}
}
function toggleAdvancedSearch(){
if($('[name=radiojoin]:checked').val() == '2'){
$('#advancedSearch').show();
}
else{
$('#advancedSearch').hide();
}
}
$('#querystring').keypress(function(ev) {
console.log(ev.which);
console.log(ev.keyCode);
if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
    search();
return false;
} else {
return true;
}
});
$('#fuzzySearch').click(search);
$('#search').click(search);
function search() {
//学员类别选择
var categorycheck=[];
$("[name='categorycheckBox']:checked").each(function(){
  categorycheck.push(this.value);
});
//学员来源
var sourcecheck=[];
$("[name='sourcecheckBox']:checked").each(function(){
  sourcecheck.push(this.value);
});
//学员来源备注
var source_memocheck=[];
$("[name='source_memocheckBox']:checked").each(function(){
  source_memocheck.push(this.value);
});
//报名可能性
var possibilitycheck=[];
$("[name='possibilitycheckBox']:checked").each(function(){
  possibilitycheck.push(this.value);
});

//var classesID =  $('#classesID').val();
//报名状态
var flag = $("input[name='radiojoin']:checked").val();
//支付状态
var paymentflag = $("input[name='radiopayment']:checked").val();

//学生在籍状态
var studentstate = $("input[name='radiostudentstate']:checked").val();

var querystring =  $("#querystring").val();

if(flag == 0) {
    $('#hide-table').hide();
    $('.nav-tabs-custom').hide();
} else {
    $.ajax({
        type: 'POST',
        url: "<?=base_url('student/student_list')?>",
        // url: "<?=base_url('student/index/')?>",
       // data: "id=" + classesID,
        data: {
            "id":flag,
            "category":categorycheck,
            "source":sourcecheck,
            "source_memo":source_memocheck,
            "possibility":possibilitycheck,
            "paymentflag":paymentflag,
            "studentstate":studentstate,
            "querystring":querystring,
            "salesman_list":$js_student_salesman_basic_multiple.val(),
            "class_list":$js_student_class_basic_multiple.val(),
        },
        dataType: "html",
        success: function(data) {
            window.location.href = data;
        }
    });
}
}
</script>
