<div class = "row">
    <div class = "col-lg-3 col-md-0"></div>
    <div class = "col-lg-6 col-md-12">
        <img src = "<?php echo base_url();?>assets/images/mataharilogo.png" style = "width:100%">
    </div>    
    <div class = "col-lg-3 col-md-0"></div>
</div>
<div class = "row">
    <div class = "col-lg-12">    
        <h5 align = "center">WELOME TO MATAHARI DEPARTMENT STORE KNOWLEDGE MANAGEMENT SYSTEM</h5>
    </div>
</div>
    <br/><br/>
<div class = "row">
    <div class = "col-lg-1"></div>
    <div class = "col-lg-10">
        <form action = "<?php echo base_url();?>search_form/endpoint/process" method = "POST">
            <input type = "hidden" name = "redirect_url" value = "<?php echo $redirect_url;?>">
            <input type = "hidden" name = "update_url" value = "<?php echo $update_url;?>">
            <input type = "hidden" name = "update_field" value = "<?php echo $update_field;?>">
            <input type = "hidden" name = "id_request" value = "<?php echo $id_request;?>">
            <div class = "form-group">
                <h5>ASK ME !</h5>
                <input type = "text" class = "form-control" name = "question">
            </div>
            <div class = "form-group">
                <div class = "row" style = "margin-right:0rem;margin-left:0rem">
                    <div class = "col-lg-1"></div>
                    <div class = "col-lg-1"></div>
                    <div class = "col-lg-8"></div>
                    <div class = "col-lg-1"></div>  
                    <button type = "submit" class = "btn col-lg-1" style = "background-color:#3b464c;   border-color:#3b464c; color:white">
                        SEARCH
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>