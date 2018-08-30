@extends('admin.layout')
@section("title")
 Edit Article
@endsection
@section("content")
 <router-view>{{$article_id}}</router-view>
@endsection
