<!-- <div>

@foreach($data as $col)
        <tr>
            <td>{{$col->firstName}}</td>
            <td>{{$col->id}}</td>
            <td>{{$col->lastName}}</td>
        </tr>
 @endforeach
</div> -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
@include('profileHeader')
    <div style="width: 80%; max-width: 1000px; margin: auto; text-align: center">
        <div class="title">
            <h1 style="color: #001892; padding-top: 10px">අලුත් කතාවක්</h1>
        </div>

        <form action="addStory" method="POST">
            @csrf
            @foreach($data as $col)
            <input type="hidden" name="blogger_id" placeholder="blogger_id" value="{{$col->id}}"><br>
            @endforeach
            <input type="text" name="title" placeholder="මාතෘකාව" value="{{ old('title')}}"><br>
            <span style="color: red">@error('title'){{$message}}@enderror</span><br>

            <input type="text" name="discription" placeholder="කෙටි සටහන" value="{{ old('discription')}}"><br>
            <span style="color: red">@error('discription'){{$message}}@enderror</span><br>

            <select type="text" name="category" placeholder="වර්ගීකරණය" value="{{ old('category')}}">
                <option value="" selected disabled hidden>වර්ගීකරණය</option>
                <option value="motivational">අභිප්රේරණාත්මක</option>
                <option value="funny">හාස්‍යජනක</option>
            </select><br>
            <span style="color: red">@error('category'){{$message}}@enderror</span><br>

            <textarea name="story" placeholder="සම්පුර්ණ කතාව" value="{{ old('story')}}"></textarea><br>
            <span style="color: red">@error('story'){{$message}}@enderror</span><br>

            <button type="submit" class="subscribeButton"><strong>SAVE</strong></button>
            <button type="reset" class="resetButton"><strong>RESET</strong></button>
        </form>
    </div>
    @if(session('message'))
    <div class="successMsg">{{session('message')}}</div>
    @endif

</body>
