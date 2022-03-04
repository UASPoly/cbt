{{-- Welcome to our SPA. This is the view for the exam the student will be undertaking --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="{{asset('/img/logo.png')}}">


    <title>{{config('app.name')}} | {{config('app.schoolAlias')}} - {{ucfirst($levelCourse->course->name). ' ' . Auth::user()->level->name}} Examination</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <style>
        /* html,
        body {
        border: border-box;
        } */

        body {
        background-color: #f5f5f5;

        }
        .question-body {
           padding: 130px 100px 50px;
           height: 100vh;
            overflow-y: scroll;
        }
        .question-body input {
            margin-right: 15px;
        }

        .radioBtn {
            width: 15px;
            height: 15px;
        }
        .sidebar {
            padding: 70px 0 20px;
            height: 100vh;
            overflow-y: scroll;
            background-color: #fff;
        }

        .radios.disabled:hover {
            cursor: not-allowed
        }
        .radios:hover {
            border:solid #204d74 1px;
        }

        ul .nav-link:hover {
            border-bottom: solid #e67d23 2px
        }

        ul>.nav-item>.active {
            border-bottom: solid #e67d23 2px
        }

        ul .nav-link {
            padding: 8px;
            margin-left: 12px;
        }

        input[type='radio'] { 
            transform: scale(2); 
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a href="">
                <img src="{{asset('/img/logo.png')}}" class="mr-2" height="45" width="45">
            </a>
            
            <a class="navbar-brand" href="">
                {{config('app.name')}} | 
                {{config('app.schoolAlias')}} 
                {{strtoupper($levelCourse->level->name) . ' ' . $levelCourse->course->code}} EXAMINATION <p id="demo"></p>
            </a>
            <div class="order-5">
                <Timer :hours="{{$hours}}" :minutes="{{$minutes}}"></Timer>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto col-md-6">
                    <li class="nav-item">
                        <a class="nav-link active" href="">{{Auth::user()->fullName}} (Exam No {{Auth::user()->code}})</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container card">
            <div class="card-body">
            <form action="{{route('exam.submit',[$levelCourse->id])}}" method="post">
               @csrf
                @foreach($exam->questions as $question)
                    <div class="row">
                        <div class="col-md-12"><h3>{{$question->question}}</h3></div>
                        <div class="col-md-12">
                        
                        <div class="row">
                          <div class="col-md-1 text-right lg"><h3>Q. {{$loop->iteration}} <input type="radio" name="{{$question->id}}" value="A{{$question->id}}" id="{{$question->id}}_0" /></h3></div>
                          <div class="col-md-11 text-left"><h4>{{$question->A}}</h4></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1 text-right lg"><h3><input type="radio" name="{{$question->id}}" value="B{{$question->id}}" id="{{$question->id}}_0" /></h3></div>
                          <div class="col-md-11 text-left"><h4>{{$question->B}}</h4></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1 text-right lg"><h3><input type="radio" name="{{$question->id}}" value="C{{$question->id}}" id="{{$question->id}}_0" /></h3></div>
                          <div class="col-md-11 text-left"><h4>{{$question->C}}</h4></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1 text-right lg"><h3><input type="radio" name="{{$question->id}}" value="D{{$question->id}}" id="{{$question->id}}_0" /></h3></div>
                          <div class="col-md-11 text-left"><h4>{{$question->D}}</h4></div>
                        </div>
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <script>
// Set the date we're counting down to
var countDownDate = new Date("March 12, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>    
</body>
</html>
