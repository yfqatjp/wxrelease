<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wage extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	SCHOOL MANAGEMENT
| -----------------------------------------------------
| AUTHOR:			TEAM
| -----------------------------------------------------
| EMAIL:			
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY LiveTech
| -----------------------------------------------------
| WEBSITE:			
| -----------------------------------------------------
*/
	function __construct() {
		parent::__construct();
		$this->load->model("teacher_m");
		$this->load->model("wage_m");
		$this->load->model("wage_details_m");
		$this->load->model("wage_status_m");
		$this->load->model("tattendance_m");

		$language = $this->session->userdata('lang');
		$this->lang->load('wage', $language);	
	}

	public function index() {
        $usertype = $this->session->userdata("usertype");
 		if($usertype == "Admin") {
            $this->data['date'] = date("Y-m");
            $this->data['wage_status_list'] = $this->wage_status_m->get_order_by_wage_status(array('yearMonth <='=>date("Y-m")));
            $this->data["subview"] = "wage/calculate";
            $this->load->view('_layout_main', $this->data);
        } else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

    public function init(){
        $wage_details_id = $this->input->post("wage_details_id");
        $arr = array('status' => '','content' => '');
        if($wage_details_id){
            $arr['status'] = 'ok';
            $arr['content'] = $this->wage_details_m->get_wage_details($wage_details_id);
        }else{
            $arr['status'] = 'ok';
        }
        echo json_encode($arr);
    }

    public function add(){
    	//工资类型
        $wageTypeDetail = $this->input->post("wage_type_detail");
        $wage_details_amount = $this->input->post("wage_details_amount");
        $wage_details_note = $this->input->post("wage_details_note");
        $teacherID = $this->input->post("teacherID");
        $working_hours= $this->input->post("working_hours");
        $teacher = $this->teacher_m->get_teacher($teacherID);
        $yearMonth = $this->input->post("wage_yearmonth");
        $username = $this->session->userdata('name');

        $wage = $this->wage_m->get_order_by_wage(array(
        		"teacherID"=>$teacherID,
        		"yearMonth"=>$yearMonth
        ));
        

        $arr = array('status' => '','content' => '');

        if(!$wage){
        	$arr['status'] = 'ng';
        	$arr['error'] = '工资不存在！';
        	echo json_encode($arr);
        	exit;
        }        
        
        if($teacher){
        	$wageID = $wage[0]->wageID;
            $input_wage_details = array(
                        "wageID"=>$wageID,
                        "teacherID"=>$teacherID,
                        "name"=>$teacher->name,
                        "yearMonth"=>$yearMonth,
                        "typeOfWork"=>$wageTypeDetail,
                        "workingHours"=>$working_hours,
                        "wageType"=>$teacher->wage_type,
                        "amount"=>0,
                        "total"=>$wage_details_amount,
                        "note"=>$wage_details_note,
                        "operator"=>$username
                    );
            $this->wage_details_m->insert_wage_details($input_wage_details);
            
            //工资总和取得
            $total = $this->getwagetotal($teacherID, $yearMonth);
            
            $input_wage = array(
            		"total"=>$total["wagetotal"],
            		"transportTotal"=>$total["transporttotal"],
            		"status"=>5,
            );
            
            //修改总和
            $this->wage_m->update_wage($input_wage,$wageID);

            $arr['status'] = 'ok';
        }else{
            $arr['status'] = 'ng';
            $arr['error'] = '教师不存在';
        }
        
        echo json_encode($arr);
        
        exit;
    }

    public function edit(){
        $wage_type_detail = $this->input->post("wage_type_detail");
        $wage_details_amount = $this->input->post("wage_details_amount");
        $wage_details_note = $this->input->post("wage_details_note");
        $wage_details_id = $this->input->post("wage_details_id");
        $working_hours= $this->input->post("working_hours");
        $username = $this->session->userdata('name');
        
        $arr = array('status' => '','content' => '');
        
        //编辑出勤明细
        $input_wage_details = array(
        		"typeOfWork"=>$wage_type_detail, 
        		"workingHours"=>$working_hours,
        		"total"=>$wage_details_amount,
        		"note"=>$wage_details_note,
        		"operator"=>$username
        );
        
        
        $wageDetails = $this->wage_details_m->get_wage_details($wage_details_id);
        
        $this->wage_details_m->update_wage_details($input_wage_details,$wage_details_id);
        
        
        //工资总和取得
        $total = $this->getwagetotal($wageDetails->teacherID, $wageDetails->yearMonth);
        
        $input_wage = array(
        		"total"=>$total["wagetotal"],
        		"status"=>5,
        );
        
        //修改总和
        $this->wage_m->update_wage($input_wage,$wageDetails->wageID);
        
        $arr['status'] = 'ok';
        
        echo json_encode($arr);
        
        exit;

    }

    public function calculate(){
        $usertype = $this->session->userdata("usertype");
 		if($usertype == "Admin") {
            if($_POST) {
                $yearmonth = $this->input->post("yearmonth");
                if($yearmonth > date("Y-m")){
                    echo "只能计算过去月份！";
                }else{
                    $isgo = false;
                    $wage_status = $this->wage_status_m->get_order_by_wage_status(array(
                        "yearMonth"=>$yearmonth
                    ));
                    $input_wage_status = array(
                        "yearMonth"=>$yearmonth,
                        "status"=>'1',
                    );
                    if($wage_status){
                        $wageStatusID = $wage_status[0]->wageStatusID;
                        if($wage_status[0]->status != '2'){    //计算中的情况下不能计算
                            $this->wage_status_m->update_wage_status($input_wage_status,$wageStatusID);
                            $isgo = true; 
                        }
                        
                    }else{
                        $wageStatusID = $this->wage_status_m->insert_wage_status($input_wage_status);
                        $isgo = true; //新月插入，需要重新计算
                    }
                    if($isgo){
                        $input_wage_status = array(
                            "status"=>'2',
                        );
                        $this->wage_status_m->update_wage_status($input_wage_status,$wageStatusID);
                        
                        //计算工资需要判断入职日期
                        $date = new DateTime($yearmonth);
                        $nextmonth = $date->add(DateInterval::createFromDateString("1 month"))->format("Y-m");
                        $teachers = $this->teacher_m->get_order_by_teacher(array("jod < " => $nextmonth."-01"));
                        
                        foreach ($teachers as $teacher) {
                            $this->calc_one($teacher,$yearmonth);
                        }
                        $input_wage_status = array(
                            "status"=>'3',
                        );
                        $this->wage_status_m->update_wage_status($input_wage_status,$wageStatusID);
                        echo $this->lang->line('menu_success');
                    }else{
                        echo "当前月份正在计算计算中，请稍等！";
                    }
                }
			}else{
                echo "非法请求，请与管理员联系！";
            }
        } else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
    }

    public function calc_single(){
        $usertype = $this->session->userdata("usertype");
 		if($usertype == "Admin") {
             if($_POST) {
                $teacherID = $this->input->post("teacherID");
                $yearmonth = $this->input->post("yearmonth");
                $teacher = $this->teacher_m->get_teacher($teacherID);
                if($teacher){
                    $this->calc_one($teacher,$yearmonth);
                    echo $this->lang->line('menu_success');
                }else{
                    echo "员工不存在，请确认数据是否整合！";
                }
             }else{
                echo "非法请求，请与管理员联系！";
             }
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
    }

    private function calc_one($teacher,$yearmonth){
        $isgo = false;
        $isnotverify = false;
        $teacherID = $teacher->teacherID;
        $username = $this->session->userdata('name');
        $wage = $this->wage_m->get_order_by_wage(array(
            "teacherID"=>$teacherID,
            "yearMonth"=>$yearmonth
        ));
        $input_wage = array(
            "teacherID"=>$teacherID,
            "name"=>$teacher->name,
        	"wage_type"=>$teacher->wage_type,
            "yearMonth"=>$yearmonth,
            "total"=>0,
            "status"=>'1',
        );
        if($wage){
            $wageID = $wage[0]->wageID;
            if($wage[0]->status == '1' || $wage[0]->status == '3'|| $wage[0]->status == '4'|| $wage[0]->status == '6'){
                $this->wage_m->update_wage($input_wage,$wageID);
                $isgo = true; 
            }
            elseif ($wage[0]->status == '5'){  
            	$isgo = false; //有手动修改过记录不能重新计算
            }
        }else{
            $wageID = $this->wage_m->insert_wage($input_wage);
            $isgo = true;   //新插入明细，需要重新计算
        }
        
        //重新计算工资明细
        if($isgo){
            $input_wage = array(
                "status"=>'2',
            );
            $this->wage_m->update_wage($input_wage,$wageID);
            
            
            //重新计算之前明细数据删除
            $this->wage_details_m->delete_wage_details_where(array(
                    "teacherID"=>$teacherID,
                    "yearMonth"=>$yearmonth,
             ));
                       
            //时给区分(wageType) 1，时给;2，固定给;3固定给＋时给
           
            //固定给  OR  固定给 + 时给 明细表 追加数据
            if($teacher->wage_type == '3'){
                $input_wage_details = array(
                    "wageID"=>$wageID,
                	"tattendanceID"=>0,
                    "teacherID"=>$teacherID,
                    "name"=>$teacher->name,
                    "yearMonth"=>$yearmonth,
                    "typeOfWork"=>'99',
                    "workingHours"=>'0',
                    "wageType"=>'1',
                    "amount"=>0,
                    "total"=>$teacher->fixed_remuneration,
                    "note"=>'自动计算（基本给）',
                    "operator"=>$username
                );
                    $this->wage_details_m->insert_wage_details($input_wage_details);
            }

            $workLectureTime = 0;          //教学总时长
            $workAffairsTime = 0;          //事务总时长            
            $workVipTime = 0;
            $workLectureWage = 0;
            $workAffairsWage = 0;
            $workVipWage = 0;
            $transportWage = 0;
            
            // 固定给 + 时给 明细表 追加数据
            if( $teacher->wage_type == '3'){ 
            	//取得当前教师出勤表时间，自动计算时给工资
            	$tattendances = $this->tattendance_m->get_order_by_tattendance(
            			                    array('teacherID'=>$teacherID,
            			                          'monthyear'=>$yearmonth));         
            	   	
            	foreach ($tattendances as $tattendance) {
            	
            		//工资计算
            		if($tattendance->tattendancetype == '1'){                          //教学
            			$workLectureTime = $workLectureTime + $tattendance->work_time;
            			$workLectureWage = $workLectureWage + $tattendance->wage;
            		}elseif($tattendance->tattendancetype == '2'){                     //事务
            			$workAffairsTime = $workAffairsTime + $tattendance->work_time;
            			$workAffairsWage = $workAffairsWage + $tattendance->wage;            			
            		}elseif($tattendance->tattendancetype == '3'){                      //VIP教学
            			$workVipTime = $workVipTime + $tattendance->work_time;
            			$workVipWage = $workVipWage + $tattendance->wage;
            		}
            	    
            		$transportWage = $transportWage + $tattendance->teacher_transport_amount;
            		
            		
            		if($tattendance->verifyflg == '0'){
            			$isnotverify = true;
            		}
            	}

            	if($workLectureTime != 0 && !$isnotverify){          //教学时长大于零
            		//插入出勤明细
            		$input_wage_details = array(
            				"wageID"=>$wageID,
            				// "tattendanceID"=>$tattendance->tattendanceID,
            				"tattendanceID"=>0,
            				"teacherID"=>$teacherID,
            				"name"=>$teacher->name,
            				"yearMonth"=>$yearmonth,
            				"typeOfWork"=>'1',               //教学
            				"workingHours"=>$workLectureTime,
            				"wageType"=>'2',                 //时给
            				"amount"=>$teacher->lecture_timing_remuneration,  //时给 *工作时长
            				//"total"=>$teacher->lecture_timing_remuneration * $workLectureTime,
            				"total"=>$workLectureWage,
            				"note"=>'自动计算（'.$teacher->lecture_timing_remuneration.'円/时）',
            				"operator"=>$username
            		);
            		$this->wage_details_m->insert_wage_details($input_wage_details);
            	}            	
            	
            	if($workAffairsTime != 0 && !$isnotverify ){          //教学时长大于零
            		//插入出勤明细
            		$input_wage_details = array(
            				"wageID"=>$wageID,
            				// "tattendanceID"=>$tattendance->tattendanceID,
            				"tattendanceID"=>0,
            				"teacherID"=>$teacherID,
            				"name"=>$teacher->name,
            				"yearMonth"=>$yearmonth,
            				"typeOfWork"=>'2',               //事务
            				"workingHours"=>$workAffairsTime,
            				"wageType"=>'2',                 //时给
            				"amount"=>$teacher->affairs_timing_remuneration,  //时给 *工作时长
            				//"total"=>$teacher->affairs_timing_remuneration * $workAffairsTime,
            				"total"=>$workAffairsWage,
            				"note"=>'自动计算（'.$teacher->affairs_timing_remuneration.'円/时）',
            				"operator"=>$username
            		);
            		$this->wage_details_m->insert_wage_details($input_wage_details);
            	} 

            	if($workVipTime != 0 && !$isnotverify ){          //VIP时长大于零
            		//插入出勤明细
            		$input_wage_details = array(
            				"wageID"=>$wageID,
            				"tattendanceID"=>0,
            				"teacherID"=>$teacherID,
            				"name"=>$teacher->name,
            				"yearMonth"=>$yearmonth,
            				"typeOfWork"=>'3',               //事务
            				"workingHours"=>$workVipTime,
            				"wageType"=>'2',                 //时给
            				//"amount"=>$teacher->affairs_timing_remuneration,  //时给 *工作时长
            				"amount"=>$workVipWage,  //时给 *工作时长
            				"total"=>$workVipWage,
            				"note"=>'自动计算（'.$teacher->vip_timing_remuneration.'円/时）',
            				"operator"=>$username
            		);
            	
            		$this->wage_details_m->insert_wage_details($input_wage_details);
            	}
            	
            	if($transportWage != 0 && !$isnotverify ){          //交通费
            		//交通费
            		$input_wage_details = array(
            				"wageID"=>$wageID,
            				"tattendanceID"=>0,
            				"teacherID"=>$teacherID,
            				"name"=>$teacher->name,
            				"yearMonth"=>$yearmonth,
            				"typeOfWork"=>'999',              //交通费
            				"workingHours"=>0,
            				"wageType"=>0,                    //时给
            				"amount"=>0,  //时给 *工作时长
            				"total"=>$transportWage,
            				"note"=>'自动计算（交通费）',
            				"operator"=>$username
            		);
            		 
            		$this->wage_details_m->insert_wage_details($input_wage_details);
            	}            	
            	
            	             	
            }

            //取得明细表数据，计算当月总工资
            $total = $this->getwagetotal($teacherID, $yearmonth);
            $status = '3';
           
            //没有出勤记录
            if($workAffairsTime == 0 && 
               $workLectureTime == 0 &&
               $workVipTime == 0 ){
            	$status = '4';
            }
            
            //有未承认的记录
            if($isnotverify){
            	$status = '6';
            	//未承认记录有，并且是支付类型是时给，或者固定给+时给出勤，将当月总额修改为0
            	$total["wagetotal"] = 0;
            }
            
            $input_wage = array(
                "total"=>$total["wagetotal"],
            	"transportTotal"=>$total["transporttotal"],
                "status"=>$status,
            );
            
            $this->wage_m->update_wage($input_wage,$wageID);
        }
    }

    
    //取得明细表数据，计算当月总工资
    public function getwagetotal($teacherID,$yearmonth){
    	
    	$wage_details = $this->wage_details_m->get_order_by_wage_details(array(
    			"teacherID"=>$teacherID,
    			"yearMonth"=>$yearmonth,
    	));

    	$total = 0;
    	$totaltra =0;
    	foreach ($wage_details as $row) {
   		if($row->typeOfWork == "999"){
    			$totaltra += $row->total;
    		}else{
    			$total += $row->total;
    		}
    	}
    	
    	$array = array("wagetotal"=>$total,"transporttotal"=>$totaltra);
    	
    	return $array;
    	
    }
    
    public function view(){
        $usertype = $this->session->userdata("usertype");
 		if($usertype == "Admin") {
            $this->data['date'] = date("Y-m");
            $this->data['wage_status_list'] = $this->wage_status_m->get_order_by_wage_status(array('yearMonth <='=>date("Y-m")));
            $this->data['wage_list'] = [];
            if($_POST) {
                $this->data['date'] = $this->input->post("date");
                if($this->input->post("date")){
                    $condition = array('yearMonth'=>$this->input->post("date"));
                }else{
                    $condition = null;
                }
                $wage_list = $this->wage_m->get_order_by_wage($condition);
                if(!is_array($wage_list)){
                    $wage_list = array($wage_list);
                }
                $this->data['wage_list'] = $wage_list;
            }
            $this->data["subview"] = "wage/view";
            $this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
    }

    public function delete(){
        $usertype = $this->session->userdata("usertype");
 		if($usertype == "Admin") {
            $teacherID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
            $wageDetailsID = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
            if($teacherID && $wageDetailsID){
            	
            	$wageDetails = $this->wage_details_m->get_wage_details($wageDetailsID);
            	
                $this->wage_details_m->delete_wage_details($wageDetailsID);
                                
                //工资总和取得
                $total = $this->getwagetotal($teacherID, $wageDetails->yearMonth);
               // $array = array("wagetotal"=>$total,"transporttotal"=>$totaltra);
                $input_wage = array(
                		"total"=>$total["wagetotal"],
                		"transportTotal"=>$total["transporttotal"],
                		"status"=>5,
                );
                
                //修改总和
                $this->wage_m->update_wage($input_wage,$wageDetails->wageID);
                
                
                $this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("wage/details/".$teacherID));
            }else{
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
    }

    public function details(){
        $usertype = $this->session->userdata("usertype");
 		if($usertype == "Admin") {
            $teacherID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
            if($teacherID){
                $this->data["teacher"] = $this->teacher_m->get_teacher($teacherID);
                $this->data["wage_list"] = $this->wage_m->get_order_by_wage(array(
                    "teacherID"=>$teacherID
                ));
                $yearmonth = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
                if(!$yearmonth){
                    $yearmonth = date("Y-m");
                }
                $this->data["yearmonth"] = $yearmonth;
                $this->data["wage_details"] = $this->wage_details_m->get_order_by_wage_details(array(
                    "teacherID"=>$teacherID,
                    "yearMonth"=>$yearmonth,
                ));
                $this->data["wage"] = $this->wage_m->get_order_by_wage(array(
                    "teacherID"=>$teacherID,
                    "yearMonth"=>$yearmonth,
                ));
                $this->data["subview"] = "wage/details";
                $this->load->view('_layout_main', $this->data);
            }else{
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
    }

	protected function rules() {
		$rules = array(
			array(
				'field' => 'date', 
				'label' => $this->lang->line("wage_yearmonth"), 
				'rules' => 'trim|required|xss_clean'
			), 
		);
		return $rules;
	}

}