@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div id="app" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Branch Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Branch Page</li>
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
                        <h3 class="modal-title" id="staticBackdropLabel">Branch</h3>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                {{--name--}}
                                <div class="form-group col-12">
                                    <label for="name">Name</label>
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        class="form-control"
                                        id="name"
                                    >
                                </div>
                                {{--logo--}}
                                <div class="form-group col-12">
                                    <label for="logo">Logo</label>
                                    <input
                                        v-model="form.logo"
                                        type="text"
                                        class="form-control"
                                        id="logo"
                                    >
                                </div>
                                {{--location--}}
                                <div class="form-group col-12">
                                    <label for="location">Location</label>
                                    <input
                                        v-model="form.location"
                                        type="text"
                                        class="form-control"
                                        id="location"
                                    >
                                </div>
                                {{--phone--}}
                                <div class="form-group col-12">
                                    <label for="phone">Phone</label>
                                    <input
                                        v-model="form.phone"
                                        type="text"
                                        class="form-control"
                                        id="phone"
                                    >
                                </div>
                                {{--alt phone--}}
                                <div class="form-group col-12">
                                    <label for="alt_phone">Alt Phone</label>
                                    <input
                                        v-model="form.alt_phone"
                                        type="text"
                                        class="form-control"
                                        id="alt_phone"
                                    >
                                </div>
                                {{--email--}}
                                <div class="form-group col-12">
                                    <label for="Email">Email</label>
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        class="form-control"
                                        id="Email"
                                        name="email"
                                    >
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
                            @click="editBranch()"
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
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="user_table" class="table table-striped table-borderless">
                                        <thead>
                                        <tr class="btn-primary">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>logo</th>
                                            <th>location</th>
                                            <th>phone</th>
                                            <th>alt_phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr
                                            v-for="(item, index) in branch_list"
                                            :key="'branch_list_'+index"
                                        >
                                            <td>[[ index+1 ]]</td>
                                            <td>[[ item.name ]]</td>
                                            <td>[[ item.logo ]]</td>
                                            <td>[[ item.location ]]</td>
                                            <td>[[ item.phone ]]</td>
                                            <td>[[ item.alt_phone ]]</td>
                                            <td>[[ item.email ]]</td>
                                            <td>
                                                <a
                                                    @click="getEdit(item)"
                                                    href="#"
                                                    class="btn btn-sm btn-secondary"
                                                >
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
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
            delimiters: ['[[', ']]'],
            created() {
                this.fetchData()
            },
            data: {
                status: 'add',
                branch_list: [],
                form: {
                    id: null,
                    name: null,
                    logo: null,
                    location: null,
                    phone: null,
                    alt_phone: null,
                    email: null,
                }
            },
            methods: {
                fetchData() {
                    let vm = this
                    axios.get('/admin/get-branch')
                        .then(function (response) {
                            // handle success
                            vm.branch_list = response.data
                        })
                        .catch(function (error) {
                        })
                },
                showModal() {
                    $('#staticBackdrop').modal('show')
                },
                closeModal() {
                    $('#staticBackdrop').modal('hide')
                },
                getEdit(item) {
                    this.form.id = item.id
                    this.form.name = item.name
                    this.form.logo = item.logo
                    this.form.location = item.location
                    this.form.phone = item.phone
                    this.form.alt_phone = item.alt_phone
                    this.form.email = item.email
                    this.status = 'edit'
                    this.showModal()
                },
                editBranch() {
                    let vm = this
                    axios.post('/admin/edit-branch', vm.form)
                        .then(function (response) {
                            if (response.status == 200){
                                vm.resetForm();
                                vm.fetchData()
                            }
                        })
                        .catch(function (error) {
                        });
                },
                resetForm() {
                    //
                    this.status = 'add'
                    this.form.id = null
                    this.form.username = null
                    this.form.email = null
                    this.form.password = null
                    this.form.role = 'user'
                    this.closeModal()
                }
            }
        })
    </script>
@endsection
