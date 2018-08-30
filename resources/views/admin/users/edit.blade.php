@extends('admin.layout')
@section("title")
 Edit Users
@endsection
@section("content")
 <router-view>{{$user_id}}</router-view>
@endsection
