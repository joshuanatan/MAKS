<div class = "row">
    <div class = "col-lg-3 col-md-0"></div>
    <div class = "col-lg-6 col-md-12">
        <img src = "<?php echo base_url();?>assets/images/mataharilogo.png" style = "width:100%">
    </div>    
    <div class = "col-lg-3 col-md-0"></div>
</div>
<div class = "row">
    <div class = "col-lg-12">    
        <h5 align = "center">WELOME TO MATAHARI DEPARTMENT STORE DATA PROCESSING SYSTEM</h5>
    </div>
</div>
<br/><br/>
<form action = "<?php echo base_url();?>admin/auth" method = "POST">
    <div class = "row">
        <div class = "col-lg-3"></div>
        <div class = "col-lg-6">
            <div class = "form-group">
                <h5>Email</h5>
                <input type = "text" class = "form-control" name = "email_user">
            </div>
            <div class = "form-group">
                <h5>Password</h5>
                <input type = "password" class = "form-control" name = "password_user">
            </div>
            <div class = "form-group">
                <div class = "row" style = "margin-right:0rem;margin-left:0rem">
                    <div class = "col-lg-10"></div>
                    <button type = "submit" class = "btn btn-primary col-lg-2" style = "background-color:#3B464C; border-color:#3B464C">LOGIN</button>
                </div>
            </div>
        </div>
    </div>
</form>