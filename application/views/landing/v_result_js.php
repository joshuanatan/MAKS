<script>
    function speech(){
        window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
        var finalTranscript = '';
        var recognition = new window.SpeechRecognition();
        recognition.interimResults = true;
        recognition.maxAlternatives = 10;
        recognition.continuous = true;
        recognition.lang = "id-ID";
        recognition.onresult = (event) => {
            var interimTranscript = '';
            for (var i = event.resultIndex, len = event.results.length; i < len; i++) {
                var transcript = event.results[i][0].transcript;
                if(parseInt(transcript.toString().toLowerCase().trim().localeCompare("close")) == 0){
                    //alert("Test");
                    //$("#form_id").submit();
                    close();
                }
                if(parseInt(transcript.toString().toLowerCase().trim().localeCompare("refresh")) == 0){
                    //alert("Refresh");
                    window.location.reload();
                }
            }
        }
        recognition.start();
    }
</script>
<script>
$(window).on("blur focus", function(e) {
    var prevType = $(this).data("prevType");

    if (prevType != e.type) {   //  reduce double fire issues
        switch (e.type) {
            case "blur":
            break;
            case "focus":
            speech();
        }
    }

    $(this).data("prevType", e.type);
})
</script>