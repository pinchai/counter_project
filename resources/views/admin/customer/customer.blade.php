@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div id="app" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer Page</li>
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
                        <h3 class="modal-title" id="staticBackdropLabel">Customer</h3>
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
                                {{--phone--}}
                                <div class="form-group col-12">
                                    <label for="phone">Phone</label>
                                    <input
                                        v-model="form.phone"
                                        type="text"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                    >
                                </div>
                                {{--alt_phone--}}
                                <div class="form-group col-12">
                                    <label for="alt_phone">Alt Phone</label>
                                    <input
                                        v-model="form.alt_phone"
                                        type="text"
                                        class="form-control"
                                        id="alt_phone"
                                        name="alt_phone"
                                    >
                                </div>
                                {{--point--}}
                                <div class="form-group col-12">
                                    <label for="point">Point</label>
                                    <input
                                        v-model="form.point"
                                        type="number"
                                        class="form-control"
                                        id="point"
                                        name="point"
                                    >
                                </div>
                                {{--set defualt--}}
                                <div class="form-group col-12">
                                    <label for="set_default">Set Default</label>
                                    <select
                                        class="form-control"
                                        id="set_default"
                                        v-model="form.default"
                                    >
                                        <option value="1">Is Default</option>
                                        <option value="0">Not Default</option>
                                    </select>
                                </div>
                                {{--current_location--}}
                                <div class="form-group col-12">
                                    <label for="current_location">Current Location</label>
                                    <textarea
                                        rows="5"
                                        v-model="form.current_location"
                                        type="number"
                                        class="form-control"
                                        id="current_location"
                                        name="current_location"
                                    ></textarea>
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
                            @click="addCustomer()"
                            v-if="status == 'add'"
                            type="button"
                            class="btn btn-primary"
                        >Save
                        </button>

                        <button
                            @click="editCustomer()"
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
                                    <table id="customer_table" class="table table-striped table-borderless">
                                        <thead>
                                        <tr class="btn-primary">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Alt Phone</th>
                                            <th>Point</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr
                                            v-for="(item, index) in customer_list"
                                            :key="'customer_list_'+index"
                                        >
                                            <td>[[ index+1 ]]</td>
                                            <td>
                                                [[ item.name ]]
                                                <span
                                                    v-if="item.default == 1"
                                                    class="badge badge-success"
                                                >is default</span>
                                            </td>
                                            <td>[[ item.phone ]]</td>
                                            <td>[[ item.alt_phone ]]</td>
                                            <td>[[ item.point ]]</td>
                                            <td>[[ item.current_location ]]</td>
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
                customer_list: [],
                form: {
                    id: null,
                    name: null,
                    phone: null,
                    alt_phone: null,
                    point: null,
                    default: 0,
                    current_location: null,
                }
            },
            methods: {
                fetchData() {
                    let vm = this
                    axios.get('/admin/get-customer')
                        .then(function (response) {
                            // handle success
                            vm.customer_list = response.data
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
                addCustomer() {
                    let vm = this
                    axios.post('/admin/add-customer', vm.form)
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
                    this.form.phone = item.phone
                    this.form.alt_phone = item.alt_phone
                    this.form.point = item.point
                    this.form.default = item.default
                    this.form.current_location = item.current_location

                    this.status = 'edit'
                    this.showModal()
                },
                editCustomer() {
                    let vm = this
                    axios.post('/admin/edit-customer', vm.form)
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
                            axios.post('/admin/delete-customer', {id: item.id})
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
                    this.form.phone = null
                    this.form.alt_phone = null
                    this.form.point = null
                    this.form.current_location = null
                    this.closeModal()
                }
            }
        })
    </script>
@endsection
