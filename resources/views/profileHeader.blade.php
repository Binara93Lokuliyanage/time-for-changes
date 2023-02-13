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
    <div id="manageAcc" class="modal">
        <div class="modal-content">
        <div class="closeIcon" onclick="closeConfirm();"><i class="fa fa-times" aria-hidden="true"></i></div>
            <h3>මගේ ගිණුම</h3>

            <form action="updateAccount" method="POST">
                @csrf
                <input type="hidden" name="id" placeholder="id" minlength="3" maxlength="50" value = "{{Session::get('blogger_id')}}" required><br>
                <span style="color: red">@error('id'){{$message}}@enderror</span><br>

                <p>First Name</p>
                <input type="text" name="firstName" placeholder="First Name" minlength="3" maxlength="50" value = "{{Session::get('firstName')}}" required><br>
                <span style="color: red">@error('firstName'){{$message}}@enderror</span><br>

                <p>Last Name</p>
                <input type="text" name="lastName" placeholder="Last Name" minlength="3" maxlength="50" value = "{{Session::get('lastName')}}" required><br>
                <span style="color: red">@error('lastName'){{$message}}@enderror</span><br>

                <p>Nick Name</p>
                <input type="text" name="nickName" placeholder="Nick Name" minlength="3" maxlength="50" value = "{{Session::get('nickName')}}" required><br>
                <span style="color: red">@error('nickName'){{$message}}@enderror</span><br>

                <p>E-mail</p>
                <input type="email" name="email" placeholder="Your Email" value = "{{Session::get('email')}}" required><br>
                <span style="color: red">@error('email'){{$message}}@enderror</span><br>

                <p>City</p>
                <input type="text" name="city" placeholder="City" minlength="3" maxlength="50" value = "{{Session::get('city')}}" required><br>
                <span style="color: red">@error('city'){{$message}}@enderror</span><br>

                <button type="submit" class="subscribeButton" class="button" id="subscribeBtn" onClick="switchBtn()">Update</button>
            </form>

        </div>
    </div>
    <div class="profileHeader">
        <div class="balanceContainer" style="text-align: center; padding: 10px; color: white">


            <i class="fa fa-sign-out" aria-hidden="true" style="float: right; font-size:25px; color: red; cursor: pointer; " title="Logout" onclick="confirmLogout()"></i>
            <i class="fa fa-user" aria-hidden="true" style="float: left; font-size:25px; color: white; cursor: pointer; margin-right:10px " title="Manage my account" onclick="manageAccount()"></i>
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

    function manageAccount() {
        document.getElementById('manageAcc').style.visibility = 'visible';
    }

    function closeConfirm() {
        document.getElementById('confirmLogout').style.visibility = 'hidden';
        document.getElementById('manageAcc').style.visibility = 'hidden';
    }
</script>