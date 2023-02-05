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
</head>
<body>
<div id="confirmLogout" class="modal">
    <div class="modal-content">
        <h4>ඔබට පිටවන්නට අවශ්‍යද?</h4><br>
        <a href = "/logout"><button type = "submit" class="yesButton" class="button">ඔව්</button></a>
        <button type = "submit" class="noButton" class="button" onclick="closeConfirm()">නැත</button>

    </div> 
</div>
<div class = "profileHeader">
    <div class = "balanceContainer" style="text-align: center; padding: 10px; color: white">
    @foreach($data as $col)
    
    <i class="fa fa-sign-out" aria-hidden="true" style="float: right; font-size:25px; color: red; cursor: pointer; " title = "Logout" onclick = "confirmLogout()"></i>
    <h1>Hello, {{$col->firstName}} {{$col->lastName}} !</h1>
        <p>අලුත් ලස්සන කතාවක් ලියමු !!!</p>
     @endforeach
    </div>
    <div style="width: 80%; max-width: 1000px; margin: auto; text-align: center">
    <div class="title">
        <h1 style="color: #001892">අලුත් කතාවක්</h1>
    </div>

    <form action="addStory" method="POST">
        @csrf
        @foreach($data as $col)
        <input type="hidden" name="blogger_id" placeholder="blogger_id" value = "{{$col->id}}"><br>
        @endforeach
        <input type="text" name="title" placeholder="මාතෘකාව" value = "{{ old('title')}}"><br>
        <span style="color: red">@error('title'){{$message}}@enderror</span><br>

        <input type="text" name="discription" placeholder="කෙටි සටහන" value = "{{ old('discription')}}"><br>
        <span style="color: red">@error('discription'){{$message}}@enderror</span><br>  

        <select type="text" name="category" placeholder="වර්ගීකරණය" value = "{{ old('category')}}">
            <option value = "" selected disabled hidden>වර්ගීකරණය</option>
            <option value = "motivational">අභිප්රේරණාත්මක</option>
            <option value = "funny">හාස්‍යජනක</option>
        </select><br>
        <span style="color: red">@error('category'){{$message}}@enderror</span><br>

        <textarea name="story" placeholder="සම්පුර්ණ කතාව" value = "{{ old('story')}}"></textarea><br>
        <span style="color: red">@error('story'){{$message}}@enderror</span><br>

        <button type="submit" class = "subscribeButton"><strong>SAVE</strong></button>
        <button type="reset" class = "resetButton"><strong>RESET</strong></button>
    </form>
    </div>
    @if(session('message'))
    <div class = "successMsg">{{session('message')}}</div>
@endif
</div>
</body>
<script>
    function confirmLogout(){
        document.getElementById('confirmLogout').style.visibility = 'visible';
    }
    function closeConfirm(){
        document.getElementById('confirmLogout').style.visibility = 'hidden';
    }
</script>