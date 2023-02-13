<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.75">
</head>

<body>
    <div class="mainContainer">
        <div class="commonContainer" id="topContainer">
            @include('header')
        </div>
        <div class="storyCategory">
            @if ($data->category == 'motivational')
            <p  style = "background-color: #f2c80a; padding: 5px; color:#001892">අභිප්රේරණාත්මක</p>
            @elseif ($data->category == 'lifeChanging')
            <p  style = "background-color: #44f20a; padding: 5px; color:#001892">ජීවිතය වෙනස් කරන ලිපි</p>
            @elseif ($data->category == 'knowledge')
            <p  style = "background-color: #8cc9ff; padding: 5px; color:#001892">දැනුම</p>
            @elseif ($data->category == 'trueStory')
            <p  style = "background-color: #f28a0a; padding: 5px; color:#001892">සත්‍ය ජීවිත ලිපි</p>
            @elseif ($data->category == 'funny')
            <p  style = "background-color: #ea0af2; padding: 5px; color:#001892">හාස්‍යජනක ලිපි</p>
            @elseif ($data->category == 'childStory')
            <p  style = "background-color: #f2530a; padding: 5px; color:#001892">ළමා ලිපි</p>
            @elseif ($data->category == 'bookSummary')
            <p  style = "background-color: #0af2c8; padding: 5px; color:#001892">පොත් සාරාංශ</p>
            @elseif ($data->category == 'religious')
            <p  style = "background-color: #d4d4d4; padding: 5px; color:#001892">ආගමික ලිපි</p>
            @else
            <p  style = "background-color: white; padding: 5px; color:#001892">වෙනත්</p>
            @endif
        </div>
        <div class="storyTitle">
            <strong>{{$data['title']}}</strong>
        </div>
        <div class="storyWriter">
            by <strong>{{$data->blogger->firstName}} {{$data->id}}</strong>
        </div>
        <div class="storyImage">
            <img src="{{URL('/storage/images/'.$data->image)}}" alt="" title="" style="max-width: 100%; max-height:400px; ">
        </div>
        <div class="fullStory">
            {{$data['story']}}
        </div>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v16.0" nonce="dAEN836M"></script>
        <div class = "shareStory">
        <div class="fb-share-button" data-href="http://timeforchanges.blog/fullStory/{{$data->id}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftimeforchanges.blog%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>

        </div>


    </div>
</body>