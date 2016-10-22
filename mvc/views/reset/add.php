

<div class="form-box" id="login-box">
    <div class="header">密码重置</div>
    <form method="post">
        <div class="body white-bg">

        	<?php 
	            if($form_validation == "No"){
	            } else {
	                if(count($form_validation)) {
	                    echo "<div class=\"alert alert-danger alert-dismissable\">
                            <i class=\"fa fa-ban\"></i>
                            <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                            $form_validation
                        </div>";
	                }
	            }
	        ?>
            <div class="form-group">
                <input class="form-control" placeholder="New Password" name="newpassword" type="password">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Re-Password" name="repassword" type="password">
            </div>     

            <input type="submit" class="btn btn-lg btn-warning btn-block" value="Reset Password" />
        </div>
    </form>
</div>
