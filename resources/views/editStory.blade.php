<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
@include('profileHeader')
    <div style="width: 80%; max-width: 1000px; margin: auto; text-align: center">
        <div class="title">
            <h1 style="color: #001892; padding-top: 10px">කතාව වෙනස් කරන්න</h1>
        </div>
        <form action="updateStory" method="POST">
            @csrf
            <input type="hidden" name="id" placeholder="id" value="{{$data['id']}}"><br>

            <input type="hidden" name="blogger_id" placeholder="blogger_id" value="{{$data['blogger_id']}}"><br>
            
            <p style="text-align: left; width: 80%; margin:auto; color: #001892">මාතෘකාව</p>
            <input type="text" name="title" placeholder="මාතෘකාව" value="{{$data['title']}}"><br>
            <span style="color: red">@error('title'){{$message}}@enderror</span><br>

            <p style="text-align: left; width: 80%; margin:auto; color: #001892">කෙටි සටහන</p>
            <input type="text" name="discription" placeholder="කෙටි සටහන" value="{{$data['discription']}}"><br>
            <span style="color: red">@error('discription'){{$message}}@enderror</span><br>

            <p style="text-align: left; width: 80%; margin:auto; color: #001892">වර්ගීකරණය</p>
            <select type="text" name="category" placeholder="වර්ගීකරණය" value="{{$data['category']}}">
                <option value="motivational">අභිප්රේරණාත්මක</option>
                <option value="funny">හාස්‍යජනක</option>
            </select><br>
            <span style="color: red">@error('category'){{$message}}@enderror</span><br>

            <p style="text-align: left; width: 80%; margin:auto; color: #001892">සම්පුර්ණ කතාව</p>
            <textarea name="story" placeholder="සම්පුර්ණ කතාව" >{{$data['story']}}</textarea><br>
            <span style="color: red">@error('story'){{$message}}@enderror</span><br>

            <button type="submit" class="subscribeButton"><strong>UPDATE</strong></button>
            <button type="reset" class="resetButton"><strong>RESET</strong></button>
        </form>
    </div>
    @if(session('message'))
    <div class="successMsg">{{session('message')}}</div>
    @endif

</body>
