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
<div class = "row">
    <div class = "col-lg-1"></div>
    <div class = "col-lg-10">
        <div class = "form-group">
            <h5>QUERY ME !</h5>
            <textarea class = "form-control" rows = 5></textarea>
        </div>
        <div class = "form-group">
            <h5>DATABASE DRIVER</h5>
            <input type = "text" class = "form-control">
        </div>
        <div class = "form-group">
            <h5>DATABASE</h5>
            <input type = "text" class = "form-control">
        </div>
        <div class = "form-group">
            <h5>HOSTNAME / IP ADDRESS</h5>
            <input type = "text" class = "form-control">
        </div>
        <div class = "form-group">
            <h5>DATABASE USERNAME</h5>
            <input type = "text" class = "form-control">
        </div>
        <div class = "form-group">
            <h5>DATABASE PASSWORD</h5>
            <input type = "text" class = "form-control">
        </div>
        <div class = "form-group">
            <form action = "<?php echo base_url();?>main/welcome/process" method = "POST">
                <div class = "row" style = "margin-right:0rem;margin-left:0rem">
                    <div class = "col-lg-1"></div>
                    <div class = "col-lg-1"></div>
                    <div class = "col-lg-8"></div>
                    <div class = "col-lg-1"></div>  
                    <button type = "submit" class = "btn col-lg-1" style = "background-color:#3b464c;   border-color:#3b464c; color:white">
                        SEARCH
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>