<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
</head>

<body>
<div id="confirmDelete" class="modal">
        <div class="modal-content">
            <h4>ඔබට මෙම ලිපිය ඉවත් කිරීමට අවශ්‍යද?</h4><br>
            <button type="submit" class="yesButton" class="button" onclick="deleteConfirm()">ඔව්</button>
            <button type="submit" class="noButton" class="button" onclick="closeDelete()">නැත</button>

        </div>
    </div>
    @include('profileHeader')
    <div class="balanceContainer">

        @foreach($data as $col)
        <div class="storyCard">
            <div class="sCardCat">
                @if ($col->category == 'motivational')
                අභිප්රේරණාත්මක
                @elseif ($col->category == 'funny')
                හාස්‍යජනක
                @else
                වෙනත්
                @endif
                <a href="{{'editStory/'.$col->id}}">

                    <i class="fa fa-pencil" aria-hidden="true" style="float: right; margin-right: 10px; cursor: pointer; color: #001892"></i>
                </a>
                <a onclick="openDelete('{{$col->id}}')">

                    <i class="fa fa-trash" aria-hidden="true" style="float: right; margin-right: 10px; cursor: pointer; color: red"></i>
                </a>
            </div>
            <div class="sCardTitle"><strong>{{$col->title}}</strong></div>
            <div class="sCardDes">{{$col->discription}}</div>
            <div class="sCardStory">{{$col->story}}</div>
        </div>

        @endforeach

        <div class="pagination">
            {{$data->links()}}
        </div>
    </div>
</body>
<script>
    function openDelete(id){
        document.getElementById('confirmDelete').style.visibility = "visible";
        localStorage.setItem('deleting_item', id)
    }

    function closeDelete(){
        document.getElementById('confirmDelete').style.visibility = "hidden"
    }

    function deleteConfirm(){
        var deletingId = localStorage.getItem('deleting_item');
        window.location.href="deleteStory/" + deletingId;
    }
</script>