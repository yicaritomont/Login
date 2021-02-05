@extends('layouts.app')

{{-- {{dd(auth()->user()->roles)}} --}}
@section('content')
    @if(Auth::check())
    <div class="alert alert-success">
        <h2> @lang('words.Wellcome') {{Auth::user()->name}} </h2>
        <p>  @lang('words.LastConnection') {{Auth::user()->last_login}}</p>
    </div>
    @endif
@endsection
