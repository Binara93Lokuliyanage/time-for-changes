<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="navBar">
        <div class="logoArea">
            <img src="{{ asset('images/logo2.png') }}" style="height: 70px;">
        </div>
        <div class="bars">
            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="dropdown-content">
                <a href="{{'/'}}" style="border-left: 1px solid; font-size: 20px;"><i class="fa fa-home" aria-hidden="true"></i></a>
            <a href="#">විස්තර</a>
            <a href="#">වර්ගීකරණය</a>
            <a href="#">අමතන්න</a>
                </div>
            </div>
        </div>
        <div class="navContents">

            <a href="{{'/'}}" style="border-left: 1px solid; font-size: 20px;"><i class="fa fa-home" aria-hidden="true"></i></a>
            <a href="#">විස්තර</a>
            <a href="#">වර්ගීකරණය</a>
            <a href="#">අමතන්න</a>
        </div>

        <div class="subscribeArea">
            <div class="subscribeButton" onclick="openSubs();">
                Subscribe
            </div>
        </div>
    </div>
</body>