
{{-- This is the view for the student home page. It contains the list of all subjects with links to start exam --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <link rel="icon" href="{{asset('/img/logo.png')}}">

    <title>{{config('app.name')}} | {{config('app.schoolAlias')}} - All Current Exams</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> --}}

    <!-- Custom styles for this template -->
    <style>
        body {
        font-size: .875rem;
        }

        .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
        }

        .classes {
          margin-top: 120px;
        }
        .card-text {
          font-size: 20px !important;
          font-weight: bold;
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

        .logoutBtn, .examBtn:hover {
            color: white;
            border: solid #e67d23 2px;
            background-color: transparent
        }

        .examBtn:hover {
            color: black
        }

        .logoutBtn:hover, .examBtn {
            background-color: #e67d23;
            color: black;

        }


    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <a href="/">
            <img src="{{asset('/img/logo.png')}}" class="mr-2" height="45" width="45">
        </a>
        <a class="navbar-brand" href="{{route('home')}}">
            {{config('app.name')}} | {{config('app.schoolAlias')}} HOME
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mx-auto col-md-2">
                <li class="nav-item">
                    <a class="nav-link active" href="">{{Auth::user()->fullName}}</a>
                </li>
            </ul>
            <span>
                <a class="mt-2 nav-link logoutBtn" href="{{route('logout')}}">Sign Out</a>
            </span>
        </div>
    </nav>



    <div class="container">

        <h3 class="mt-5 text-center">Congratulation for taken this exam</h3>
        <hr>
       
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text text-success text-center">{{$result->totalScore()}} Marks<h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
        <div class="col-md-12">
        <table class="table">
        <thead>
            <tr>
                <th>Qestion</th>
                <th>Answer</th>
                <th>Choose</th>
                <th>Remark</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result->scores as $score)
            <tr>
                <td>{{$score->question->question}}</td>
                <td>{{$score->question->ANS}}</td>
                <td>{{$score->choosen}}</td>
                <td>{{$score->remark}}</td>
                <td>{{$score->marks()}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
            
        
        
        </div>
  </body>
</html>
