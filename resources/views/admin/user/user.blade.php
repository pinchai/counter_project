@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div id="app" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Page</h1>
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

        <!-- Modal -->
        <div
            class="modal fade"
            id="staticBackdrop"
            data-backdrop="static"
            data-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="staticBackdropLabel">USER</h3>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                {{--Username--}}
                                <div class="form-group col-12">
                                    <label for="Username">Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="Username"
                                        name="username"
                                    >
                                </div>
                                {{--Email--}}
                                <div class="form-group col-12">
                                    <label for="Email">Email</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="Email"
                                        name="email"
                                    >
                                </div>
                                {{--Password--}}
                                <div class="form-group col-12">
                                    <label for="Password">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="Password"
                                        name="password"
                                    >
                                </div>
                                {{--Role--}}
                                <div class="form-group col-12">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            @click="resetForm()"
                            type="button"
                            class="btn btn-danger"
                        >Cancel
                        </button>
                        <button
                            v-if="status == 'add'"
                            type="button"
                            class="btn btn-primary"
                        >Save
                        </button>

                        <button
                            v-if="status == 'edit'"
                            type="button"
                            class="btn btn-primary"
                        >Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="carxd">
                            <div class="card-header">
                                <a @click="showModal()" href="#" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    Add
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="user_table" class="table table-striped table-borderless">
                                        <thead>
                                        <tr class="btn-primary">
                                            <th>No.</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->role }}</td>
                                                <td>
                                                    <a
                                                        @click="getEdit()"
                                                        href="#"
                                                        class="btn btn-sm btn-secondary"
                                                    >
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a
                                                        @click="deleteRecord()"
                                                        href="#"
                                                        class="btn btn-sm btn-danger"
                                                    >
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        var app = new Vue({
            el: '#app',
            created() {
            },
            data: {
                status: 'add'
            },
            methods: {
                showModal() {
                    $('#staticBackdrop').modal('show')
                },
                closeModal() {
                    $('#staticBackdrop').modal('hide')
                },
                getEdit() {
                    //bind data to form
                    this.status = 'edit'
                    this.showModal()
                },
                deleteRecord() {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // process delete
                            alert('process delete')
                        }
                    });
                },
                resetForm() {
                    //
                    this.status = 'add'
                    this.closeModal()
                }
            }
        })
    </script>
@endsection
