@extends('layouts.app')

@section('title', 'General Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Users</h4>
                </div>
                <div class="card-body">
                    {{ \App\Models\User::count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Current Date</h4>
                </div>
                <div class="card-body">
                    {{ now()->format('M d, Y') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-check"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Laravel Version</h4>
                </div>
                <div class="card-body">
                    {{ Illuminate\Foundation\Application::VERSION }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Welcome to Stisla Laravel Integration</h4>
            </div>
            <div class="card-body">
                <p>
                    This template has been integrated with Laravel 12 and Breeze starter kit.
                    You can now build your application using this beautiful admin template.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
