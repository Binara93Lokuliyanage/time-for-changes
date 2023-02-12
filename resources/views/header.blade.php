<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
</head>

<body>
    <div id="confirmAdd" class="modal">
        <div class="modal-content">
            <div class="closeIcon" onclick="closeSubs();"><i class="fa fa-times" aria-hidden="true"></i></div>
            <h3>නවතම ලිපි පැමිණි සැනින් දැනගන්න. <br> Time for Changes වෙබ් පිටුව Subscribe කරන්න</h3>

            <form action="subscribe" method="POST">
                @csrf
                <p>ඔබේ නම</p>
                <input type="text" name="name" placeholder="Your Name" minlength="3" maxlength="50" required><br>
                <span style="color: red">@error('name'){{$message}}@enderror</span><br>

                <p>E-mail ලිපිනය</p>
                <input type="email" name="email" placeholder="Your Email" required><br>
                <span style="color: red">@error('email'){{$message}}@enderror</span><br>

                <p>උපන් දිනය</p>
                <input type="date" name="birth_date" placeholder="Birth Day" min="1922-01-01" max="2019-12-31" required><br>
                <span style="color: red">@error('birth_date'){{$message}}@enderror</span><br>

                <button type="submit" class="subscribeButton" class="button" id="subscribeBtn" onClick="switchBtn()">Subscribe</button>
            </form>
        </div>
    </div>
    <div id="confirmSubs" class="modal">
        <div class="modal-content">
            <div class="closeIcon" onclick="closeSubs();"><i class="fa fa-times" aria-hidden="true"></i></div>
            <h3>Subscribe කිරීම සාර්ථකයි !</h3>Time for Changes වෙබ් පිටුව හා සම්බන්ද වුවාට ස්තුතියි.<br>නව ලිපියක් වෙබ් පිටුවට පැමිණි සැනින් දැන් ඔබට email මාර්ගයෙන් දැනගත හැක.<br>
        </div>
    </div>
    <div id="categoryList" class="modal">
        <div class="modal-content">
            <div class="closeIcon" onclick="closeSubs();"><i class="fa fa-times" aria-hidden="true"></i></div>
            <br><br>
            <a href="stories/motivational">
                <div class="categoryCard" style="background-color:#f2c80a">අභිප්රේරණාත්මක ලිපි</div>
            </a>
            <a href="stories/lifeChanging">
                <div class="categoryCard" style="background-color:#44f20a">ජීවිතය වෙනස් කරන ලිපි</div>
            </a>
            <a href="stories/knowledge">
                <div class="categoryCard" style="background-color:#8cc9ff">දැනුම</div>
            </a>
            <a href="stories/trueStory">
                <div class="categoryCard" style="background-color:#f28a0a">සත්‍ය ජීවිත ලිපි</div>
            </a>
            <a href="stories/funny">
                <div class="categoryCard" style="background-color:#ea0af2">හාස්‍යජනක ලිපි</div>
            </a>
            <a href="stories/childStory">
                <div class="categoryCard" style="background-color:#f2530a">ළමා ලිපි</div>
            </a>
            <a href="stories/bookSummary">
                <div class="categoryCard" style="background-color:#0af2c8">පොත් සාරාංශ</div>
            </a>
            <a href="stories/religious">
                <div class="categoryCard" style="background-color:#d4d4d4">ආගමික ලිපි</div>
            </a>
        </div>
    </div>
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
                    <a onClick="openCatList()" style="cursor:pointer">වර්ගීකරණය</a>
                    <a href="{{'/contact'}}">අමතන්න</a>
                </div>
            </div>
        </div>
        <div class="navContents">

            <a href="{{'/'}}" style="border-left: 1px solid; font-size: 20px;"><i class="fa fa-home" aria-hidden="true"></i></a>
            <a href="#">විස්තර</a>
            <a onClick="openCatList()" style="cursor:pointer">වර්ගීකරණය</a>
            <a href="{{'/contact'}}">අමතන්න</a>
        </div>

        <div class="subscribeArea">
            <div class="subscribeButton" onclick="openSubs();">
                Subscribe
            </div>
        </div>
    </div>
</body>
<script>
    function openSubs() {
        document.getElementById('confirmAdd').style.visibility = 'visible'
    }

    function openCatList() {
        document.getElementById('categoryList').style.visibility = 'visible'
    }

    function closeSubs() {
        document.getElementById('confirmAdd').style.visibility = 'hidden'
        document.getElementById('confirmSubs').style.visibility = 'hidden'
        document.getElementById('categoryList').style.visibility = 'hidden'
    }
</script>