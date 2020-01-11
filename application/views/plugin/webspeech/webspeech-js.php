<script>
var out = document.querySelector('output');
var justSpoke = true;
var computer = new Computer(true, out);
document.addEventListener('DOMContentLoaded', function(e) {
    var languageOpt = ["de","en","es","fr","it","nl","zh"];
    computer.DEST_LANG = "id";
    computer.speak("<?php echo $answer;?>");
});
</script>