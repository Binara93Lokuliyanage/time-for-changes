<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.6">
</head>

<div class="registerBox">
    <br>
    <h1 style="color: #001892;">BLOGGER REGISTRATION</h1>
    <form action="addBlogger" method="POST">
        @csrf
        <input type="text" name="firstName" placeholder="First Name" value = "{{ old('firstName')}}"><br>
        <span style="color: red">@error('firstName'){{$message}}@enderror</span><br>

        <input type="text" name="lastName" placeholder="Last Name" value = "{{ old('lastName')}}"><br>
        <span style="color: red">@error('lastName'){{$message}}@enderror</span><br>

        <input type="text" name="nickName" placeholder="Nick Name" value = "{{ old('nickName')}}"><br>
        <span style="color: red">@error('nickName'){{$message}}@enderror</span><br>

        <input type="text" name="email" placeholder="Email" value = "{{ old('email')}}"><br>
        <span style="color: red">@error('email'){{$message}}@enderror</span><br>

        <input type="text" name="city" placeholder="City" value = "{{ old('city')}}"><br>
        <span style="color: red">@error('city'){{$message}}@enderror</span><br>

        <input type="password" name="password" placeholder="Password" style="width:74%" value = "{{ old('password')}}">
        <i class="fa fa-info-circle" aria-hidden="true" style="margin-left: 5px; color: #b7b2d1" title = "Password length should be between 8 - 14 characters. Must contain atleast one capital letter, simple letter, number, symbol "></i><br>
        <span style="color: red">@error('password'){{$message}}@enderror</span><br>

        <input id="password" type="password" name="password_confirmation" placeholder="Re-enter Password"><br>

        <button type="submit" class="subscribeButton">Register</button>
    </form>
</div>

@if(session('message'))
    <div class = "successMsg">{{session('message')}}</div>
@endif