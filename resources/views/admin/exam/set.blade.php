
@extends('layouts.main')
@section('title', 'exam setting')
@section('pageHeader', 'Examination Setting Page')
@section('content')
    <form action="{{route('sets.update',[$levelCourse->id])}}" method="post">
        @csrf
        <div class="form-group row">
            <div class="col-md-3"><label for="">Semester</label></div>
            <div class="col-md-9">
                <select name="semester" id="" class="form-control">
                    <option value="">Select Semester</option>
                    <option value="1">First Semester</option>
                    <option value="2">Second Semester</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"><label for="">Semester</label></div>
            <div class="col-md-9">
                <select name="session" id="" class="form-control">
                    <option value="2021/2022">2021/2022</option>
                    <option value="2022/2023">2022/2023</option>
                    <option value="2023/2024">2023/2024</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"><label for="">Exam Date</label></div>
            <div class="col-md-9">
                <input type="date" name="date" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"><label for="">Exam Start</label></div>
            <div class="col-md-9">
                <input type="time" name="start" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"><label for="">Exam Start</label></div>
            <div class="col-md-9">
                <input type="time" name="end" class="form-control">
            </div>
        </div>
        <button class="btn btn-secondary">SET EXAM</button>
    </form>
@endsection