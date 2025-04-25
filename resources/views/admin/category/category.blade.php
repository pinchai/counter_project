@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div id="app" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category Page</li>
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
                        <h3 class="modal-title" id="staticBackdropLabel">Category</h3>
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
                                        name="name"
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
                            @click="addCategory()"
                            v-if="status == 'add'"
                            type="button"
                            class="btn btn-primary"
                        >Save
                        </button>

                        <button
                            @click="editCategory()"
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
                                <a @click="showModal()" href="#" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    Add
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="category_table" class="table table-striped table-borderless">
                                        <thead>
                                        <tr class="btn-primary">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr
                                            v-for="(item, index) in category_list"
                                            :key="'category_list_'+index"
                                        >
                                            <td>[[ index+1 ]]</td>
                                            <td>[[ item.name ]]</td>
                                            <td>
                                                <a
                                                    @click="getEdit(item)"
                                                    href="#"
                                                    class="btn btn-sm btn-secondary"
                                                >
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a
                                                    @click="deleteRecord(item)"
                                                    href="#"
                                                    class="btn btn-sm btn-danger"
                                                >
                                                    <i class="far fa-trash-alt"></i>
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
                category_list: [],
                form: {
                    id: null,
                    name: null,
                }
            },
            methods: {
                fetchData() {
                    let vm = this
                    axios.get('/admin/get-category')
                        .then(function (response) {
                            // handle success
                            vm.category_list = response.data
                            $.LoadingOverlay("hide");
                        })
                        .catch(function (error) {
                            // handle error
                        })
                },
                showModal() {
                    $('#staticBackdrop').modal('show')
                },
                closeModal() {
                    $('#staticBackdrop').modal('hide')
                },
                addCategory() {
                    let vm = this
                    axios.post('/admin/add-category', vm.form)
                        .then(function (response) {
                            if (response.status == 200) {
                                $.LoadingOverlay("hide");
                                vm.resetForm();
                                vm.fetchData()
                            }
                        })
                        .catch(function (error) {
                        });
                },
                getEdit(item) {
                    this.form.id = item.id
                    this.form.name = item.name
                    this.status = 'edit'
                    this.showModal()
                },
                editCategory() {
                    let vm = this
                    axios.post('/admin/edit-category', vm.form)
                        .then(function (response) {
                            if (response.status == 200) {
                                $.LoadingOverlay("hide");
                                vm.resetForm();
                                vm.fetchData()
                            }
                        })
                        .catch(function (error) {
                        });
                },
                deleteRecord(item) {
                    let vm = this
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
                            axios.post('/admin/delete-category', {id: item.id})
                                .then(function (response) {
                                    if (response.status == 200) {
                                        $.LoadingOverlay("hide");
                                        vm.fetchData()
                                    }
                                })
                                .catch(function (error) {
                                });
                        }
                    });
                },
                resetForm() {
                    //
                    this.status = 'add'
                    this.form.id = null
                    this.form.name = null
                    this.closeModal()
                }
            }
        })
    </script>
@endsection
