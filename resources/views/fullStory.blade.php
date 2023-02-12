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
        <div class = "storyCategory">
            @if ($data->category == 'motivational')
                අභිප්රේරණාත්මක
            @elseif ($data->category == 'funny')
                හාස්‍යජනක
            @else
                වෙනත් 
            @endif
        </div>
        <div class = "storyTitle">
            <strong>{{$data['title']}}</strong>
        </div>
        <div class = "storyWriter">
            by <strong>{{$data->blogger->firstName}} {{$data->blogger->lastName}}</strong>
        </div>
        <div class = "storyImage">
        <img src="{{URL('/storage/images/'.$data->image)}}" alt="" title="" style = "max-width: 100%; max-height:400px; ">
        </div>
        <div class = "fullStory">
            {{$data['story']}}
        </div>
    

</div> 
</body>
