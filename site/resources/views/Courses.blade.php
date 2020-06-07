
@extends('Layout.app')
@section('title',"Courses")
@section('content')

    @include('Component.CoursesBanner');
    @include(('Component.AllCourses'))


@endsection
