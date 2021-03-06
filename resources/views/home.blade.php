@extends('layouts.blog')

@section('doc_title', 'Dashboard - Sharan\'s Blog')

@section('content')
    <!-- Page Heading -->
    <div class="mb-4 overflow-auto">
        <h2>Dashboard</h2>
    </div>

    <h5 class="p-3 mx-auto col-6 text-center text-lowercase bg-light rounded-pill shadow">
        <span class="text-capitalize">Welcome {{ $auth_user_name = Auth::user()->name }}</span>
    </h5>

    <div class="row">
        @can('create-post')
            <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="{{ route('create') }}" id="test">
                <div class="dashboard-element dashboard-element-success">Create Post</div>
            </a>

            <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="\post/{{ $auth_user_name }}">
                <div class="dashboard-element dashboard-element-secondary">Show My Post</div>
            </a>
        @endcan

        <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="\post/home">
            <div class="dashboard-element dashboard-element-primary">Show All Post</div>
        </a>

        <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="\stats">
            <div class="dashboard-element dashboard-element-danger">Stats</div>
        </a>

        @hasrole('SuperAdmin')
            <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="\role/list">
                <div class="dashboard-element dashboard-element-info">List Roles</div>
            </a>

            <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="\role/assign">
                <div class="dashboard-element dashboard-element-secondary">Assign Roles</div>
            </a>

            <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" style="cursor: pointer">
                <div class="dashboard-element dashboard-element-danger">
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <form id="new_user_toggle_form">
                            @csrf
                            <input type="checkbox" class="custom-control-input" id="new_user_toggle"
                                   onclick="NewUserToggle(this.form)"
                                {{ DB::table('user_register')->first()->allow_register ? 'checked' : '' }} />
                            <label class="custom-control-label" for="new_user_toggle">Allow New User</label>
                        </form>
                    </div>
                </div>
            </a>
        @endhasrole

        @hasrole('Admin')
            <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="\role/list">
                <div class="dashboard-element dashboard-element-info">List Roles</div>
            </a>

            <a class="col-12 col-md-6 m-3 m-md-0 mt-md-3 text-decoration-none" href="\role/assign">
                <div class="dashboard-element dashboard-element-secondary">Assign Roles</div>
            </a>
        @endhasrole
    </div>
@endsection
