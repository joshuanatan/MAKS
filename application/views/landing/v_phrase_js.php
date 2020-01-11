<script>
function getPhraseList(){
    var text = $("#search_text").val();
    $.ajax({
        url:"<?php echo base_url();?>interface/phrase/search",
        type:"POST",
        dataType:"JSON",
        data:{text:text},
        success:function(respond){
            var html = "";
            if(respond.length > 0){
                for(var a = 0; a<respond.length; a++){
                    html += "<tr><td><a target = '_blank' href = '<?php echo base_url();?>welcome/load_registered_phrase/"+respond[a]["id_submit_system_request"]+"'>"+respond[a]["phrase"]+" / "+respond[a]["tgl_system_request_add"]+"</a></td></tr>";
                }
            }
            else{
                html = "<tr><td>PHRASE NOT FOUND</td></tr>";
            }
            $("#phrase_container").html(html);
        }
    })
}
</script>