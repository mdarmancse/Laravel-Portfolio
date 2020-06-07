@extends('layout.app')

@section('title','Home')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalServices}}</h3>
                    <h3 class="count card-text">Total Visitors</h3>
                </div>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalServices}}</h3>
                    <h3 class="count card-text">Total Services</h3>
                </div>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalCourses}}</h3>
                    <h3 class="count card-text">Total Courses</h3>
                </div>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalProjects}}</h3>
                    <h3 class="count card-text">Total Projects</h3>
                </div>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalReviews}}</h3>
                    <h3 class="count card-text">Total Reviews</h3>
                </div>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalContact}}</h3>
                    <h3 class="count card-text">Total Contacts</h3>
                </div>
                </div>
            </div>



        </div>
    </div>



@endsection
