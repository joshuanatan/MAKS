<div class="oz-body-wrap" style = "height:100%" style = "opacity:0;animation:fade-in 0.5s linear 0s;animation-fill-mode:forwards">
    <?php $this->load->view("landing/v_navbar");?>

    <section class="banner-area relative" style = "opacity:0;animation:fade-in 0.5s linear 0.5s;animation-fill-mode:forwards">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="story-content">
                        <h1>Matahari<span class="sp-1"> Knowledge</span><br>
                        <span class="sp-2">Management</span> System</h1>
                        <h5 class = "sp-1">Ask Me Here</h5>
                        <form id = "form_id" target = "_blank" action = "<?php echo base_url();?>welcome/process" method = "POST">
                            <input name="question" placeholder="Ask me here" id = "search_text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ask me here'" class="common-input mt-20" required="" type="text" style = "color:black">
                        </form>
                    </div>
                    <button type = "button" onclick = "window.location.reload()" class = "btn btn-sm btn-success btn-outline sp-2">REFRESH</button>
                </div>
                
            </div>
        </div>
    </section>
</div>