@extends('admin.layout')
@section("title")
 Show Message
@endsection
@section("content")
 <router-view>{{$message_id}}</router-view>
@endsection
