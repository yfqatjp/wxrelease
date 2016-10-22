<?php

function btn_add($uri, $name) {
    return anchor($uri, "<i class='fa fa-plus'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_view($uri, $name) {
    return anchor($uri, "<i class='fa fa-check-square-o'></i>", "class='btn btn-success btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_edit($uri, $name) {
    return anchor($uri, "<i class='fa fa-edit'></i>", "class='btn btn-warning btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_delete($uri, $name) {
    return anchor($uri, "<i class='fa fa-trash-o'></i>",
        array(
            'onclick' => "return confirm('将删除此条信息，如果删除，将不能回复，确认是否删除?')",
            'class' => 'btn btn-danger btn-xs mrg',
            'data-placement' => 'top',
            'data-toggle' => 'tooltip',
            'data-original-title' => $name
        )
    );
}

function btn_verify($uri, $name, $message) {
    return anchor($uri, "<i class='fa fa-check'></i>",
        array(
            'onclick' => "return confirm('将承认此条考勤，如果承认，将计入工资核算，确认是否承认?')",
            'class' => 'btn btn-success btn-xs mrg',
            'data-placement' => 'top',
            'data-toggle' => 'tooltip',
            'data-original-title' => $name
        )
    );
}

function btn_verify_cancel($uri, $name, $message) {
    return anchor($uri, "<i class='fa fa-undo'></i>",
        array(
            'onclick' => "return confirm('将取消承认此条考勤，如果取消，将不计入工资核算，确认是否取消?')",
            'class' => 'btn btn-success btn-xs mrg',
            'data-placement' => 'top',
            'data-toggle' => 'tooltip',
            'data-original-title' => $name
        )
    );
}

function delete_file($uri, $id) {
    return anchor($uri, "<i class='fa fa-times '></i>",
        array(
            'onclick' => "return confirm('you are about to delete a record. This cannot be undone. are you sure?')",
            'id' => $id,
            'class' => "close pull-right"
        )
    );
}
function share_file($uri, $id) {
    return anchor($uri, "<i class='fa fa-globe'></i>",
        array(
            'onclick' => "return confirm('you are about to delete a record. This cannot be undone. are you sure?')",
            'id' => $id,
            'class' => "pull-right"
        )
    );
}


function btn_dash_view($uri, $name) {
    return anchor($uri, "<span class='fa fa-check-square-o'></span>", "class='btn btn-success btn-xs mrg' style='background-color:#00bcd4;color:#fff;border:1px solid #00bcd4' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}


function btn_invoice($uri, $name) {
    return anchor($uri, "<i class='fa fa-credit-card'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}


function btn_return($uri, $name) {
    return anchor($uri, "<i class='fa fa-mail-forward'></i>",
        array(
            "onclick" => "return confirm('you are return the book . This cannot be undone. are you sure?')",
            "class" => 'btn btn-danger btn-xs',
            'data-placement' => 'top',
            'data-toggle' => 'tooltip',
            'data-original-title' => $name

        )
    );
}

function btn_attendance($id, $method, $class, $name) {
    return "<input type='checkbox' class='".$class."' $method id='".$id."' data-placement='top' data-toggle='tooltip' data-original-title='".$name."' >  ";
    // return anchor($uri, "<i class='fa fa-credit-card'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_promotion($id, $class, $name) {
    return "<input type='checkbox' class='".$class."' id='".$id."' data-placement='top' data-toggle='tooltip' data-original-title='".$name."' >  ";
    // return anchor($uri, "<i class='fa fa-credit-card'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

// infinite coding starts here..
function btn_add_pdf($uri, $name) {
    return anchor($uri, "<i class='fa fa-file'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button' target='_blank'");
}
function btn_sm_edit($uri, $name) {
    return anchor($uri, "<i class='fa fa-edit'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'");
}
function btn_sm_add($uri, $name) {
    return anchor($uri, "<i class='fa fa-plus'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'");
}

function btn_sm_accept_and_denied_leave($uri, $name, $icon) {
    return anchor($uri, "<i class='fa fa-".$icon."'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'");
}

function btn_payment($uri, $name) {
    return anchor($uri, "<i class='fa fa-credit-card'></i> ".$name, "class='btn-cs btn-sm-cs'style='text-decoration: none;' role='button'");
}

function btn_sm_join($uri, $name) {
    return anchor($uri, "<i class='fa fa-user-plus'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'");
}

function btn_sm_back($uri, $name) {
	return anchor($uri, "<i class='fa fa-level-up'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'");
}
// infinite coding end here..
