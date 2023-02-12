<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.75">
</head>

<body>
    <div id="confirmLogout" class="modal">
        <div class="modal-content">
            <h4>ඔබට පිටවන්නට අවශ්‍යද?</h4><br>
            <a href="/logout"><button type="submit" class="yesButton" class="button">ඔව්</button></a>
            <button type="submit" class="noButton" class="button" onclick="closeConfirm()">නැත</button>

        </div>
    </div>
    <div class="profileHeader">
        <div class="balanceContainer" style="text-align: center; padding: 10px; color: white">


            <i class="fa fa-sign-out" aria-hidden="true" style="float: right; font-size:25px; color: red; cursor: pointer; " title="Logout" onclick="confirmLogout()"></i>
            <h1>Hello, {{ Session::get('firstName') }} {{ Session::get('lastName') }} !</h1>
            <p>අලුත් ලස්සන කතාවක් ලියමු !!!</p>



        </div>
        <div class="profileNav">
            <p><a href="{{'/profile'}}">අලුත් කතාවක්</a></p>
            <p><a href="{{'/myPosts'}}">මගේ කතා</a></p>
            <p><a href="#">නව පුවත්</a></p>
        </div>
    </div>
</body>
<script>
    function confirmLogout() {
        document.getElementById('confirmLogout').style.visibility = 'visible';
    }

    function closeConfirm() {
        document.getElementById('confirmLogout').style.visibility = 'hidden';
    }
</script>