<html>
    <div style = "margin:auto;width:1000px">
    <div class="right">
            <button id="start_button" onclick="startButton(event)">
            </button>
        </div>
        <div class="center">
            <div class="sidebyside" style="text-align:right">
                <button id="copy_button" class="button" onclick="copyButton()">
                Copy and Paste</button>
                <div id="copy_info" class="info">
                Press Control-C to copy text.<br>(Command-C on Mac.)
            </div>
        </div>
        <div class="sidebyside">
            <button id="email_button" class="button" onclick="emailButton()">
            Create Email</button>
            <div id="email_info" class="info">
                Text sent to default email application.<br>
                (See chrome://settings/handlers to change.)
            </div>
        </div>
        <div id="div_language">
            <select id="select_language" onchange="updateCountry()"></select>
            &nbsp;&nbsp;
            <select id="select_dialect" ></select>
        </div>
    <form id = "form" action = "<?php echo base_url();?>lab/intent/result" method = "POST">
        <textarea readonly name = "phrase" id = "span1" class = "final interim"></textarea><br/>
        <input type = "text" id = "phrase">
        <button type = "submit">SUBMIT</button>
    </form>
    </div>
</html>
<script>
var langs =
[
    ['Bahasa Indonesia',['id-ID']],
    ['English',         ['en-US', 'United States']],
];

for (var i = 0; i < langs.length; i++) {
    select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 0;
select_dialect.selectedIndex = 0;
var recognizing = false;

if (!('webkitSpeechRecognition' in window)) {
} 
else {
    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = false;
    recognition.lang = select_dialect.value;
    //recognition.start();
    
    recognition.onresult = function(event) {
        var interim_transcript = $("#phrase").val();
        for (var i = event.resultIndex; i < event.results.length; ++i) {
            interim_transcript += event.results[i][0].transcript;
        }
        console.log("masuk: "+interim_transcript);
        $("#phrase").val(interim_transcript);
    };
    recognition.onerror = function(event) {
        console.log("error");
        if (event.error == 'no-speech') {
            console.log("nospeech");
            ////start_img.src = 'mic.gif';
            
            ignore_onend = true;
        }
        if (event.error == 'audio-capture') {
            console.log("nomic");
            //start_img.src = 'mic.gif';
            
            ignore_onend = true;
        }
        if (event.error == 'not-allowed') {
            console.log("notallowed");
            if (event.timeStamp - start_timestamp < 100) {
                
            } 
            else{
                
            }
            ignore_onend = true;
        }
    };

}

function updateCountry() {
    for (var i = select_dialect.options.length - 1; i >= 0; i--) {
        select_dialect.remove(i);
    }
    var list = langs[select_language.selectedIndex];
    for (var i = 1; i < list.length; i++) {
        select_dialect.options.add(new Option(list[i][1], list[i][0]));
    }
    select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

recognition.lang = select_dialect.value;
recognition.start();

var idleTime = 0;
var listen = false;
setInterval(countIdle,500);

function checkGreeting(){
    idleTime = 0;
    var text = $("#phrase").val();
    text = text.toLowerCase();
    console.log("setelah lower case "+text);
    textArray = text.split(" ");
    greetingsArray = textArray.slice(0,2);
    greet1 = false;
    greet2 = false;
    switch(greetingsArray[0]+" "+greetingsArray[1]){
        case 'hey mia':
        case 'hi mia':
        case 'hello mia':
        case 'halo mia':
            listen = true;
            var out = document.querySelector('output');
            var justSpoke = true;
            var computer = new Computer(true, out);
            var languageOpt = ["de","en","es","fr","it","nl","zh"];
            computer.DEST_LANG = languageOpt[1];
            computer.speak('I AM LISTENING');
        break;
        default:
        $("#phrase").val("");

    }
    /*
    switch(greetingsArray[0]){
        case 'hai':
        greet1 = true;
        break;
        case 'hello':
        greet1 = true;
        break;
        case 'helo':
        greet1 = true;
        break;
        case 'hi':
        greet1 = true;
        break;
        case 'hei':
        greet1 = true;
        break;
        default:
        $("#phrase").val("");
    }
    if(greet1 && greetingsArray.length > 1){
        console.log("checkmasuk");
        switch(greetingsArray[1]){
            case 'mia':
            greet2 = true;
            break;
            default:
            $("#phrase").val("");
        }
    }
    if(greet2){
        listen = true;
        var out = document.querySelector('output');
        var justSpoke = true;
        var computer = new Computer(true, out);
        var languageOpt = ["de","en","es","fr","it","nl","zh"];
        computer.DEST_LANG = languageOpt[1];
        computer.speak('I AM LISTENING');
    }
    */
    if(!listen){
        window.location.reload;
    }
}
function countIdle(){
    idleTime++;
    if(listen){
        phraseInput();
        var question = $("#span1").val();
        console.log(question.length);
        console.log(idleTime);
        if(idleTime > 2 && question.length > 0){ //kalau idle time lebih dari 1 detik
            console.log("masuk");
            $("#form").submit();
        }
    }
    else{
        checkGreeting();
    }
    console.log(listen);
}
function phraseInput(){
    
    recognition.continuous = false;
    var text = $("#phrase").val();
    text = text.toLowerCase();
    textArray = text.split(" ");
    greetingsArray = textArray.slice(2,(textArray.length));
    text = greetingsArray.join(" ");
    $("#span1").val(text);
    console.log("ini textnya "+text);
}   

</script>
