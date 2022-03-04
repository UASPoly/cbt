{{-- This is the view for the admin main page. It contains the list of all subjects with 
links to host exam, add questions, view results, it also has a navbar with links to the students page --}}
@extends('layouts.main')
@section('title', 'Main Dashboard')
@section('pageHeader', 'Main Dashboard')
@section('content')
@can('superAdminGate')
    <main role="main">
        <h4>Students</h4>
        <hr>
        @foreach ($levels as $level)
        <div class="card-deck">
            @foreach ($level->levelCourses as $levelCourse)
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('students',[$level->id])}}" class="text-dark">
                            <h5 class="card-title">{{strtoupper($levelCourse->course->code)}}</h5>
                            <p class="card-text">{{count($level->users)}} Students</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach
    </main>
    <hr>
@endcan
    
    <script src="{{asset('/js/app.js')}}"></script>
@endsection
