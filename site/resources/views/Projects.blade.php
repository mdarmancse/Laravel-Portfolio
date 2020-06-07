
@extends('Layout.app')
@section('title',"Projects")
@section('content')
    @include('Component.ProjectsBanner');
    @include(('Component.AllProjects'))

@endsection
