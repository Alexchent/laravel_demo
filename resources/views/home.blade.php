@extends('layouts.default')
@section('content')
    @if(Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
            </aside>
        </div>
    @else
    <div class="jumbotron">
        <h1>hello laravel</h1>
        <p class="lead">
            你现在所看到的是<a href="https://learnku.com/courses/laravel-essential-training">laravel 入门教程</a>的demo
        </p>
        <p>一切从这里开始</p>

        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">注册</a>
    </div>
    @endif
@stop
