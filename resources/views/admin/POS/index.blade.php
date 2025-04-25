<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('pos/boostrap.css') }}">
    <!-- Select2 CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <title>POS Screen</title>
</head>
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<body>
<div id="app" class="container-fluid">
    <div class="row">
        <!-- Modal add new customer -->
        <div
            class="modal fade"
            id="staticBackdrop"
            data-backdrop="static"
            data-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-md">
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
                                        v-model="customer_form.name"
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
                                        v-model="customer_form.phone"
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
                                        v-model="customer_form.alt_phone"
                                        type="text"
                                        class="form-control"
                                        id="alt_phone"
                                        name="alt_phone"
                                    >
                                </div>
                                {{--current_location--}}
                                <div class="form-group col-12">
                                    <label for="current_location">Current Location</label>
                                    <textarea
                                        rows="3"
                                        v-model="customer_form.current_location"
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
                            type="button"
                            class="btn btn-primary"
                        >Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--product card list-->
        <div
            class="col-lg-7 col-md-7 col-sm-12"
            :style="'box-shadow: 0px 5px 13px 8px #CCCC; height: '+screen_height+'px'"
        >
            <div class="row">
                <div
                    class="col-lg-3  col-md-4 col-sm-6 mb-3 mt-3"
                    v-for="(item, index) in product_list"
                    :key="'product_list_'+index"
                >
                    <div
                        class="card"
                        style="width: 100%;"
                        @click="selectProductCard(item)"
                    >
                        <img
                            src="{{ asset('no-image.png') }}"
                            class="card-img-top"
                            style="height: 200px; object-fit: contain"
                        >
                        <div class="card-body">
                            <h5 class="card-title">[[ item.name ]]</h5>
                            <p
                                class="card-text font-weight-bolder"
                                style="font-size: 19px;background-color: yellow; color: red; width: 100%"
                            >
                                [[ item.price ]] $
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--selected  list-->
        <div
            class="col-lg-5 col-md-5 col-sm-12"
            style="box-shadow: 10px 5px 13px 8px #CCCC;"
        >
            <div class="form-group">
                <label for="selectBoxCustomer">Customer | </label>
                <a
                    href="#"
                    @click="showModal()"
                >
                    New Customer ⨁
                </a>
                <select
                    id="selectBoxCustomer"
                    class="form-control"
                    v-model="form.customer_id"
                >
                    <option value="" disabled>Select an option</option>
                    <option
                        v-for="item in customer_list"
                        :key="item.id"
                        :value="item.id"
                    >
                        [[ item.name ]] - [[ item.phone ]]
                    </option>
                </select>
            </div>
            <hr>
            <!--Table selected list-->
            <div class="table-responsive">
                <table
                    class="w-100 table table-sm table-borderless table-striped"
                >
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Kg</th>
                        <th>Price/1kg</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="(item, index) in selected_product_list"
                        :key="'selected_product_list_'+index"
                    >
                        <td>[[ index + 1 ]]</td>
                        <td>[[ item.name ]]</td>
                        <td>
                            <input
                                type="number"
                                v-model="item.qty"
                                @input="qtyOnchange(index, item.qty)"
                                style="width: 60px;
                text-align: center;
                font-weight: bold;
                color: red;"
                            >
                        </td>
                        <td>[[ item.price ]] $</td>
                        <td>[[ item.sub_total ]] $</td>
                        <td>
                            <input @click="deleteItem(index)" type="button" value="❌">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!--Table total-->
            <table
                class="table thead-dark"
            >
                <thead>
                <tr>
                    <th>
                        <h3>Total As USD: </h3>
                    </th>
                    <th class="float-right">
                        <h2 class="text-danger">[[ total.toLocaleString() ]] $</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>Total As KHR: </h3>
                    </th>
                    <th class="float-right">
                        <h2 class="text-danger">[[ (total * 4100).toLocaleString() ]] ៛</h2>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <input
                            type="number"
                            class="form-control w-100"
                            v-model="received_amount"
                        >
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>Change: </h3>
                    </th>
                    <th
                        v-if="received_amount-total > 0"
                        class="float-right"
                        style="background-color: yellow; color: red"
                    >
                        <h2 class="text-danger">
                            [[ (received_amount-total).toLocaleString() ]] $
                        </h2>
                        <h2 class="text-danger">
                            [[ ((received_amount-total) * 4100).toLocaleString() ]] ៛
                        </h2>
                    </th>
                </tr>
                </thead>
            </table>

            <!--Button-->
            <input
                type="button"
                value="Cancel ❌"
                class="btn btn-outline-danger float-left"
                @click="clearSale()"
            >
            <input
                type="button"
                value="Pay Now 💵"
                class="btn btn-outline-primary float-right"
                @click="payNow()"
            >
        </div>
    </div>
</div>
</body>
<!-- vue -->
<script src="{{ asset('/pos/vue.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script
    src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    const {createApp} = Vue
    createApp({
        delimiters: ['[[', ']]'],
        mounted() {
            let vm = this;
            $("#selectBoxCustomer").select2().on("change", function () {
                console.log($(this).val())
                vm.form.customer_id = $(this).val();
            });
        },
        created() {
            this.fetchData()
        },
        data() {
            return {
                product_list: [],
                customer_list: [],
                selected_product_list: [],
                total: 0,
                received_amount: 0,
                form: {
                    customer_id: null
                },
                screen_height : (window.screen.height)-250,
                customer_form: {
                    name: null,
                    phone: null,
                    alt_phone: null,
                    current_location: null,
                    point: 0,
                    default: 0
                }
            }
        },
        methods: {
            fetchData() {
                $.LoadingOverlay("show");
                let vm = this
                axios.get('/admin/pos/get-data')
                    .then(function (response) {
                        // handle success
                        vm.product_list = response.data.service
                        vm.customer_list = response.data.customer
                        let default_customer = vm.customer_list.find(item=>{
                            return item.default === 1;
                        })
                        if (default_customer){
                            vm.form.customer_id = default_customer.id
                        }else {
                            vm.form.customer_id = vm.customer_list[0].id
                        }
                        $.LoadingOverlay("hide");
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            selectProductCard(item) {
                let is_dpl = this.selected_product_list.find(function (obj) {
                    return obj.id == item.id
                })
                if (is_dpl == undefined) {
                    item.qty = 1
                    item.sub_total = item.price
                    this.selected_product_list.push(item)
                } else {
                    is_dpl.qty++
                    is_dpl.sub_total = parseFloat(is_dpl.qty) * parseFloat(is_dpl.price)
                }

                this.calculateTotal()
            },
            calculateTotal() {
                this.total = 0
                for (let item of this.selected_product_list) {
                    item.sub_total = parseFloat(item.qty) * parseFloat(item.price)
                    this.total += item.sub_total
                }
            },
            clearSale() {
                if (confirm("Do you want to clear this sale ?")) {
                    this.selected_product_list = []
                    this.total = 0
                    this.received_amount = 0
                }

            },
            payNow() {
                if (parseFloat(this.received_amount) >= parseFloat(this.total)) {
                    let width = 600
                    let height = 600

                    let left = (window.screen.width - width) / 2;
                    let top = (window.screen.height - height) / 2;
                    window.open('invoice.html', '_blank', `width=${width},height=${height}, left=${left},top=${top}`)

                } else {
                    alert("Error received_amount")
                }
            },
            deleteItem(index) {
                if (confirm("Do you want to delete ?")) {
                    this.selected_product_list.splice(index, 1)
                    this.total = 0
                    this.calculateTotal()
                }
            },
            qtyOnchange(index, qty) {
                if (isNaN(parseInt(qty)) || parseInt(qty) < 1) {
                    alert("Enter Quantity input")
                    this.selected_product_list[index].qty = 1
                    return
                }
                this.calculateTotal()
            },
            showModal() {
                $('#staticBackdrop').modal('show')
            },
            closeModal() {
                $('#staticBackdrop').modal('hide')
            },
            addCustomer() {
                let vm = this
                axios.post('/admin/add-customer', vm.customer_form)
                    .then(function (response) {
                        //console.log(response.data)
                        vm.customer_list.push(response.data)
                        vm.form.customer_id = response.data.id
                        if (response.status == 200) {
                            $.LoadingOverlay("hide");
                            vm.resetForm();
                        }
                    })
                    .catch(function (error) {
                    });
            },
            resetForm() {
                this.customer_form.name = null
                this.customer_form.phone = null
                this.customer_form.alt_phone = null
                this.customer_form.point = 0
                this.customer_form.current_location = null
                this.closeModal()
            }
        }
    }).mount('#app')
</script>
</html>
