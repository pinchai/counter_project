@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Delete User Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="/admin/user" class="btn btn-sm btn-secondary">
                                    <i class="far fa-arrow-alt-circle-left"></i>
                                    Back
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger" role="alert">
                                    <h3>Do you want to delete ?</h3>
                                </div>
                                <ul>
                                    <li>Username: Dara</li>
                                    <li>Email: Dara@mail.com</li>
                                    <li>Role: User</li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="/admin/user" class="btn btn-secondary">
                                    <i class="far fa-window-close"></i>
                                    Cancel
                                </a>
                                <a href="#" class="btn btn-danger float-right">
                                    <i class="fas fa-trash"></i>
                                    Yes Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
