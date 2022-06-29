@extends('layouts.app')
<title>Dashboard </title>
@section('content')

<!-- Main content -->
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h1 text-white d-inline-block mb-0">Dashboard</h6>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6` col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h1 class="card-title text-uppercase text-center mb-0">{{$artikel}}</h1>
                                </div>
                            </div>
                            <div class="card-footer text-center mt-3 bg-white">
                                <p class="text-muted">Total Artikel</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h1 class="card-title text-uppercase text-center mb-0">{{$genre}}</h1>
                                </div>
                            </div>
                            <div class="card-footer text-center mt-3 bg-white">
                                <p class="text-muted">Total genre</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection