<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
</head>

<body>




    <div class="mainContainer">
        <div class="commonContainer" id="topContainer">
            @include('header')
        </div>
        <div class="balanceContainer">
            <div class="contactForm">
                <br>
                <h3 style="color: #001892; text-align: center">
                    ඔබගේ අදහස්, යෝජනා, චෝදනා හෝ වැඩි විස්තර සදහා අපව අමතන්න.
                </h3>
                <form action="contact" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="ඔබේ නම" minlength="3" maxlength="50" required><br>

                    <input type="email" name="email" placeholder="E-mail ලිපිනය" minlength="9" maxlength="10" required><br>

                    <input type="tel" name="contact" placeholder="දුරකථන අංකය (අනිවාර්ය නොවේ )" pattern="[0-9]{10}"><br>

                    <textarea name="message" placeholder="පණිවිඩය" minlength="3" maxlength="500" required></textarea><br>

                    <button type="submit" class="subscribeButton" id="sendBtn" onClick="switchBtn()">යවන්න</button>
                    <button type="reset" class="resetButton" id="resetBtn">ඉවත් කරන්න</button>
                </form>
                <br>
            </div>
            @if(session('message'))
            <br>
            <div class="successMsg">
            ස්තුතියි ! <br>ඔබේ පණිවිඩය අපට ලැබුනා. ඉක්මනින් අපි ඔබව සම්බන්ද කරගැනීමට බලාපොරොත්තු වෙමු.<br>ඔබට සුභ දවසක් !
            </div>
            @endif

        </div>
    </div>
</body>
<script>
    function switchBtn(){
        document.getElementById('sendBtn').innerHTML = '<img src="images/loading.gif" style="width: 20px; ">';
    }
</script>