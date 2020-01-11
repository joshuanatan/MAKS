<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Speech Recording</title>
    </head>
    <body>
        <script>
            window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
            let finalTranscript = '';
            let recognition = new window.SpeechRecognition();
            recognition.interimResults = true;
            recognition.maxAlternatives = 10;
            recognition.continuous = true;
            recognition.lang = "id-ID";
            recognition.onresult = (event) => {
                let interimTranscript = '';
                for (let i = event.resultIndex, len = event.results.length; i < len; i++) {
                    let transcript = event.results[i][0].transcript;
                    if (event.results[i].isFinal) {
                        finalTranscript += transcript;
                    } else {
                        interimTranscript += transcript;
                    }
                }
                document.querySelector('body').innerHTML = finalTranscript + '<i style="color:#ddd;">' + interimTranscript + '</>';
            }
            recognition.start();
        </script>
    </body>
</html>