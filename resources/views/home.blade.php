@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-white">
            <div class="card-body">
                <h4>Selamat datang {{ Auth::user()->name }} Sebagai {{ Auth::user()->getRoleNames()->implode('') }}</h4>
            </div>
        </div>
    </div>
@endsection
