<script>
function loadRelatedEntity(){
    var id_submit_intent = $("#test_intent_dropdown").val();
    $.ajax({
        url:"<?php echo base_url();?>interface/intent/get_related_entity",
        dataType:"JSON",
        type:"POST",
        data:{id_submit_intent:id_submit_intent},
        success:function(respond){
            var html = "";
            for(var a = 0; a<respond.length; a++){
                var role = respond[a]["role_entity"].split(" ");
                var checkbox_name = "";
                for (var role_loop = 0; role_loop < role.length; role_loop++){
                    checkbox_name += role[role_loop];
                }
                html += "<div class = 'form-group'><h5>"+respond[a]["role_entity"]+"</h5>";
                html += "<table class = 'table table-striped table-hover table-bordered'><thead><th style = 'width:5%'>#</th><th style = 'width:40%'>Entity</th><th style = 'width:25%'>Value</th></thead><tbody id = 'group_by_mapping_list'>"; 
                for(var b = 0; b<respond[a]["value"].length; b++){
                    html += "<tr><td><div class = 'checkbox-custom checkbox-primary'><input value = '"+respond[a]["value"][b]["id_submit_entity_mapping"]+"' type = 'checkbox' name = '"+checkbox_name.toLowerCase()+"[]'><label></label></div></td><td><input type = 'hidden' name = '"+checkbox_name.toLowerCase()+respond[a]["value"][b]["id_submit_entity_mapping"]+"' value ='"+respond[a]["value"][b]["db_field"]+"'>"+respond[a]["value"][b]["entity"]+"</td><td><input type = 'text' class = 'form-control' name = 'value_"+checkbox_name.toLowerCase()+respond[a]["value"][b]["id_submit_entity_mapping"]+"'></td></tr>";
                }
                html += "</tbody></table>";
                html += "</div>";
            }
            $("#intentLogicContainer").html(html);
        }
    })
}
</script>