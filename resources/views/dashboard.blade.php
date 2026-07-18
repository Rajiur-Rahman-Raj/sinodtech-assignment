@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="custom-title">Hello {{ auth()->user()->name }}</h6>

                    <h2>You are logged in into your dashboard!</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
