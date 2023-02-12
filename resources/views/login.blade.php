<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.6">
</head>
<body>
    <div class = "registerBox">
    <div class="title">
        <h1 style="color: #001892">BLOGGER LOGIN</h1>
    </div>

    <form action="login" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Email" value = "{{ old('email')}}"><br>
        <span style="color: red">@error('email'){{$message}}@enderror</span><br>

        <input type="password" name="password" placeholder="Password"><br>
        <span style="color: red">@error('password'){{$message}}@enderror</span><br>

        <button type="submit" class = "subscribeButton"><strong>LOGIN</strong></button>
    </form>
</div>
    
</body>
<style>
    
</style>