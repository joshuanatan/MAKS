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
<form action = "<?php echo base_url();?>welcome/process" method = "POST">
    <div class = "row">
        <div class = "col-lg-1"></div>
        <div class = "col-lg-10">
            <div class = "form-group">
                <h5>ASK ME WITH VOICE OR TYPE!</h5>
                <input type = "text" class = "form-control" name = "question" id = "search_text">
            </div>
            <div class = "form-group">
                <div class = "row" style = "margin-right:0rem;margin-left:0rem">
                    <button type = "submit" class = "btn col-lg-1" style = "background-color:#3b464c;border-color:#3b464c; color:white">
                        SEARCH
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>