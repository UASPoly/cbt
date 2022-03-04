@extends('layouts.main')
@section('title', 'All Students')
@section('pageHeader', ' Students')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>STUDENT EXAM CODE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($level->users as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->code}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
