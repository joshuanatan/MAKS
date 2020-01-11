<div class="oz-body-wrap" style = "height:100%" style = "opacity:0;animation:fade-in 0.5s linear 0s;animation-fill-mode:forwards">
    <?php $this->load->view("landing/v_navbar");?>

    <section class="banner-area relative" style = "opacity:0;animation:fade-in 0.5s linear 0.5s;animation-fill-mode:forwards">
        <div class="container">
            <div class="row fullscreen">
                <div class="col-lg-12">
                    <br/><br/><br/>
                    <input type = "text" class = "form-control" onkeyup = "getPhraseList()" id = "search_text">
                    <br/>
                    <table class = "table table-striped table-hover table-bordered">
                        <thead>
                            <th>Latest Phrase</th>
                        </thead>
                        <tbody id = "phrase_container">
                            <?php for($a = 0; $a<count($phrase); $a++):?>
                                <tr>
                                    <td><a target = "_blank" href = "<?php echo base_url();?>welcome/load_registered_phrase/<?php echo $phrase[$a]["id_submit_system_request"];?>"><?php echo strtoupper($phrase[$a]["phrase"]);?> / <?php echo $phrase[$a]["tgl_system_request_add"];?></a></td>
                                </tr>
                            <?php endfor;?>
                        </tbody>
                    </table>
                    <a href = "<?php echo base_url();?>welcome" class = "btn btn-primary btn-sm">BACK</a>
                </div>
            </div>
        </div>
    </section>
</div>