@extends('layouts.main')
@section('title', 'All Students')
@section('pageHeader', 'Examination Configuration Page')
@section('content')
<div class="row">
    @foreach(App\Level::all() as $level)
       <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">{{$level->name}} Courses</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($level->levelCourses as $levelCourse)
                            <tr>
                                <th>{{$levelCourse->course->code}}</th>
                                <th>{{$levelCourse->course->title}}</th>
                                <th>
                                @if($levelCourse->hasExam())
                                <a href="{{route('sets',[$levelCourse->id])}}">
                                <button class="btn btn-info">Edit Exam</button></a>
                                @else
                                <a href="{{route('sets',[$levelCourse->id])}}">
                                <button class="btn btn-primary">Set Exam</button></a>
                                @endif
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
       </div>
    @endforeach
</div>
@endsection
