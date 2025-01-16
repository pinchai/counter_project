@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User Page</h1>
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
                                <form>
                                    <div class="form-row">
                                        {{--Username--}}
                                        <div class="form-group col-12">
                                            <label for="Username">Username</label>
                                            <input type="text" class="form-control" id="Username">
                                        </div>
                                        {{--Email--}}
                                        <div class="form-group col-12">
                                            <label for="Email">Email</label>
                                            <input type="email" class="form-control" id="Email">
                                        </div>
                                        {{--Email--}}
                                        <div class="form-group col-12">
                                            <label for="Password">Password</label>
                                            <input type="password" class="form-control" id="Password">
                                        </div>
                                        {{--Role--}}
                                        <div class="form-group col-12">
                                            <label for="role">Role</label>
                                            <select class="form-control" id="role">
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button
                                        type="reset"
                                        class="btn btn-danger"
                                    >
                                        <i class="far fa-window-close"></i>
                                        Reset
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn btn-primary float-right"
                                    >
                                        <i class="far fa-edit"></i>
                                        Edit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
