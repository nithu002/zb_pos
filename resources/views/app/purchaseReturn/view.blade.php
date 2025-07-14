<x-app-layout>
    @section('title', 'Dashboard')

    @push('css')
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <!-- Summernote CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
        <!-- Bootstrap Tagsinput CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

        <style>
            /* sds */
            .modal-body {
                max-height: 70vh;
                overflow-y: auto;
            }

            .modal:not(.show) {
                display: none !important;
            }
        </style>
    @endpush

    @section('content')

        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Purchase Returns</h4>
                        <h6>Manage your purchase return</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                                src="assets/img/icons/pdf.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                                src="assets/img/icons/excel.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
                                class="ti ti-refresh"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-sales-new">
                        <i class="ti ti-circle-plus me-1"></i>Add Sales Return
                    </a>
                </div>
            </div>
            <!-- /product list -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                            <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex table-dropdown my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Status
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Paid</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Unpaid</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Sort By : Last 7 Days
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Recently Added</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Desending</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Last Month</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Product Image</th>
                                    <th>Date</th>
                                    <th>Supplier Name</th>
                                    <th>Reference</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Payment Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/stock-img-01.png" alt="product">
                                        </a>
                                    </td>
                                    <td>24 Dec 2024</td>
                                    <td>Electro Mart</td>
                                    <td>PT001</td>
                                    <td><span class="badges status-badge fs-10 p-1 px-2 rounded-1">Received</span></td>
                                    <td>$1000</td>
                                    <td>$1000</td>
                                    <td>$0.00</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Paid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/stock-img-06.png" alt="product">
                                        </a>
                                    </td>
                                    <td>10 Dec 2024</td>
                                    <td>Quantum Gadgets</td>
                                    <td>PT002</td>
                                    <td><span
                                            class="badges status-badge badge-pending fs-10 p-1 px-2 rounded-1">Pending</span>
                                    </td>
                                    <td>$1500</td>
                                    <td>$0.00</td>
                                    <td>$1500</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-danger bg-danger-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Unpaid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/stock-img-02.png" alt="product">
                                        </a>
                                    </td>
                                    <td>27 Nov 2024</td>
                                    <td>Prime Bazaar</td>
                                    <td>PT003</td>
                                    <td><span class="badges status-badge fs-10 p-1 px-2 rounded-1">Received</span></td>
                                    <td>$1500</td>
                                    <td>$1800</td>
                                    <td>$0.00</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>paid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/stock-img-03.png" alt="product">
                                        </a>
                                    </td>
                                    <td>18 Nov 2024</td>
                                    <td>Gadget World</td>
                                    <td>PT004</td>
                                    <td><span class="badges status-badge fs-10 p-1 px-2 rounded-1">Received</span></td>
                                    <td>$2000</td>
                                    <td>$1000</td>
                                    <td>$1000</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-warning bg-warning-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Overdue</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/stock-img-04.png" alt="product">
                                        </a>
                                    </td>
                                    <td>06 Nov 2024</td>
                                    <td>Volt Vault</td>
                                    <td>PT005</td>
                                    <td><span class="badges status-badge fs-10 p-1 px-2 rounded-1">Received</span></td>
                                    <td>$800</td>
                                    <td>$800</td>
                                    <td>$0.00</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Paid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/stock-img-05.png" alt="product">
                                        </a>
                                    </td>
                                    <td>25 Oct 2024</td>
                                    <td>Elite Retail</td>
                                    <td>PT006</td>
                                    <td><span
                                            class="badges status-badge badge-pending fs-10 p-1 px-2 rounded-1">Pending</span>
                                    </td>
                                    <td>$750</td>
                                    <td>$0.00</td>
                                    <td>$750</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-danger bg-danger-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Unpaid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/expire-product-01.png" alt="product">
                                        </a>
                                    </td>
                                    <td>14 Oct 2024</td>
                                    <td>Prime Mart</td>
                                    <td>PT007</td>
                                    <td><span class="badges status-badge fs-10 p-1 px-2 rounded-1">Received</span></td>
                                    <td>$1300</td>
                                    <td>$1300</td>
                                    <td>$0.00</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Paid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/expire-product-02.png" alt="product">
                                        </a>
                                    </td>
                                    <td>14 Oct 2024</td>
                                    <td>NeoTech Store</td>
                                    <td>PT008</td>
                                    <td><span class="badges status-badge fs-10 p-1 px-2 rounded-1">Received</span></td>
                                    <td>$1100</td>
                                    <td>$1100</td>
                                    <td>$0.00</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Paid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/expire-product-03.png" alt="product">
                                        </a>
                                    </td>
                                    <td>20 Sep 2024</td>
                                    <td>Urban Mart</td>
                                    <td>PT009</td>
                                    <td><span
                                            class="badges status-badge badge-pending fs-10 p-1 px-2 rounded-1">Pending</span>
                                    </td>
                                    <td>$2300</td>
                                    <td>$2300</td>
                                    <td>$0.00</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Paid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="avatar avatar-md me-2">
                                            <img src="assets/img/products/expire-product-04.png" alt="product">
                                        </a>
                                    </td>
                                    <td>10 Sep 2024</td>
                                    <td>Travel Mart</td>
                                    <td>PT010</td>
                                    <td><span
                                            class="badges status-badge badge-pending fs-10 p-1 px-2 rounded-1">Pending</span>
                                    </td>
                                    <td>$1700</td>
                                    <td>$1700</td>
                                    <td>$0.00</td>
                                    <td><span class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Paid</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-sales-new">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2"
                                                href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>



        <!--add popup -->
        {{-- <div class="modal fade" id="add-sales-new">
            <div class="modal-dialog add-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="page-title">
                            <h4> Add Purchase Return</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/purchase-returns.html">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Supplier Name<span
                                                class="text-danger ms-1">*</span></label>
                                        <div class="row">
                                            <div class="col-lg-10 col-sm-10 col-10">
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Electro Mart</option>
                                                    <option>Quantum Gadgets </option>
                                                    <option>Prime Bazaar</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                <div class="add-icon">
                                                    <a href="#" class="choose-add" data-bs-toggle="modal"
                                                        data-bs-target="#add_customer"><i data-feather="plus-circle"
                                                            class="plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Date<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon calender-input">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <input type="text" class="datetimepicker form-control p-2"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Reference<span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Product<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" placeholder="Search Product" class="form-control p-2">
                                            <div class="addonset">
                                                <img src="assets/img/icons/qrcode-scan.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body-table mt-3">
                                <div class="table-responsive no-pagination">
                                    <table class="table datanew bg-light-9 p-3">
                                        <thead>
                                            <tr>
                                                <th class="bg-secondary-transparent p-3">Image</th>
                                                <th>Date</th>
                                                <th>Supplier</th>
                                                <th>Reference</th>
                                                <th>Status</th>
                                                <th>Total ($)</th>
                                                <th>Paid ($)</th>
                                                <th>Due ($)</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Order Tax<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" value="0" class="form-control p-2">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Discount<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" value="0" class="form-control p-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" value="0" class="form-control p-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Status<span class="text-danger ms-1">*</span></label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>Pending</option>
                                            <option>Received</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 summer-description-box">
                                        <label class="form-label">Description</label>
                                        <div id="summernote">Type your message</div>
                                        <p class="mt-1">Maximum 60 Words</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="modal fade" id="add-sales-new" tabindex="-1" aria-labelledby="addSalesLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Purchase Return</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="https://dreamspos.dreamstechnologies.com/html/template/purchase-returns.html"
                        method="post">
                        <div class="modal-body">
                            <div class="row g-3">
                                <!-- Supplier with Add Button -->
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Supplier Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select">
                                            <option selected>Select</option>
                                            <option>Electro Mart</option>
                                            <option>Quantum Gadgets</option>
                                            <option>Prime Bazaar</option>
                                        </select>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#add_customer">
                                            <i data-feather="plus-circle"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Date<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>

                                <!-- Reference -->
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Reference<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter reference">
                                </div>

                                <!-- Product -->
                                <div class="col-lg-12">
                                    <label class="form-label">Product<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Product">
                                        <span class="input-group-text">
                                            <img src="assets/img/icons/qrcode-scan.svg" alt="QR"
                                                style="height: 20px;">
                                        </span>
                                    </div>
                                </div>

                                <!-- Table -->
                                <div class="modal-body-table mt-3">
                                    <div class="table-responsive no-pagination">
                                        <table class="table datanew bg-light-9 p-3">
                                            <thead>
                                                <tr>
                                                    <th class="bg-secondary-transparent p-3">Image</th>
                                                    <th>Date</th>
                                                    <th>Supplier</th>
                                                    <th>Reference</th>
                                                    <th>Status</th>
                                                    <th>Total ($)</th>
                                                    <th>Paid ($)</th>
                                                    <th>Due ($)</th>
                                                    <th>Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Order Tax, Discount, Shipping, Status -->
                                <div class="col-md-3 col-6">
                                    <label class="form-label">Order Tax<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="0">
                                </div>

                                <div class="col-md-3 col-6">
                                    <label class="form-label">Discount<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="0">
                                </div>

                                <div class="col-md-3 col-6">
                                    <label class="form-label">Shipping<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="0">
                                </div>

                                <div class="col-md-3 col-6">
                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                    <select class="form-select">
                                        <option selected>Select</option>
                                        <option>Pending</option>
                                        <option>Received</option>
                                    </select>
                                </div>

                                <!-- Description -->
                                <div class="col-lg-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3" maxlength="500" placeholder="Maximum 60 Words"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- /add popup -->

        <!-- Add Supplier -->
        <div class="modal fade" id="add_customer">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="page-title">
                            <h4>Add Supplier</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/purchase-returns.html">
                        <div class="modal-body">
                            <div>
                                <label class="form-label">Supplier<span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Add Supplier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
        <!-- /Add Supplier -->

        <!--Edit popup -->
        {{-- <div class="modal fade" id="edit-sales-new">
            <div class="modal-dialog add-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="page-title">
                            <h4>Edit Purchase Return</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/purchase-returns.html">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Supplier Name<span
                                                class="text-danger ms-1">*</span></label>
                                        <div class="row">
                                            <div class="col-lg-10 col-sm-10 col-10">
                                                <select class="select">
                                                    <option>Electro Mart</option>
                                                    <option>Modern Automobile</option>
                                                    <option>AIM Infotech</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                <div class="add-icon">
                                                    <a href="#" class="choose-add" data-bs-toggle="modal"
                                                        data-bs-target="#add_customer"><i data-feather="plus-circle"
                                                            class="plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Date<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon calender-input">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <input type="text" class="datetimepicker form-control p-2"
                                                placeholder="24 Dec 2024">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Supplier<span class="text-danger ms-1">*</span></label>
                                        <select class="select">
                                            <option>Electro Mart</option>
                                            <option>Quantum Gadgets </option>
                                            <option>Prime Bazaar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Product<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" placeholder="Search Product" class="form-control p-2">
                                            <div class="addonset">
                                                <img src="assets/img/icons/qrcode-scan.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body-table mt-3 mb-1">
                                <div class="table-responsive no-pagination">
                                    <table class="table  datanew">
                                        <thead>
                                            <tr>
                                                <th class="bg-secondary-transparent p-3">Image</th>
                                                <th>Date</th>
                                                <th>Supplier</th>
                                                <th>Reference</th>
                                                <th>Status</th>
                                                <th>Total ($)</th>
                                                <th>Paid ($)</th>
                                                <th>Due ($)</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a class="avatar avatar-md me-2">
                                                        <img src="assets/img/products/stock-img-01.png" alt="product">
                                                    </a>
                                                </td>
                                                <td>24 Dec 2024</td>
                                                <td>Electro Mart</td>
                                                <td>PT001</td>
                                                <td><span
                                                        class="badges status-badge fs-10 p-1 px-2 rounded-1">Received</span>
                                                </td>
                                                <td>$1000</td>
                                                <td>$1000</td>
                                                <td>$600</td>
                                                <td><span
                                                        class="p-1 pe-2 rounded-1 text-success bg-success-transparent fs-10"><i
                                                            class="ti ti-point-filled me-1 fs-11"></i>Paid</span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ms-auto">
                                    <div class="total-order m-2 mb-3 ms-auto">
                                        <ul class="border-1 rounded-1">
                                            <li class="border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Order Tax</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                            <li class="border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Discount</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                            <li class="border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Shipping</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                            <li class="total border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Grand Total</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Order Tax<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" value="0" class="form-control p-2">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Discount<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" value="0" class="form-control p-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping<span class="text-danger ms-1">*</span></label>
                                        <div class="input-groupicon select-code">
                                            <input type="text" value="0" class="form-control p-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Status<span class="text-danger ms-1">*</span></label>
                                        <select class="select">
                                            <option>Received</option>
                                            <option>Pending</option>
                                            <option>Received</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="summer-description-box">
                                        <label class="form-label">Description</label>
                                        <div id="summernote2"></div>
                                        <p class="mt-1">Maximum 60 Words</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="modal fade" id="edit-sales-new" tabindex="-1" aria-labelledby="editSalesLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Purchase Return</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="https://dreamspos.dreamstechnologies.com/html/template/purchase-returns.html" method="post">
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Supplier Name -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Supplier Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-select">
                                    <option selected>Electro Mart</option>
                                    <option>Modern Automobile</option>
                                    <option>AIM Infotech</option>
                                </select>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#add_customer">
                                    <i data-feather="plus-circle"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Date<span class="text-danger">*</span></label>
                            <div class="input-group">

                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input type="date" class="form-control" value="24 Dec 2024" placeholder="dd/mm/yyyy">

                            </div>
                        </div>

                        <!-- Reference -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Reference<span class="text-danger">*</span></label>
                            <select class="form-select">
                                <option selected>Electro Mart</option>
                                <option>Quantum Gadgets</option>
                                <option>Prime Bazaar</option>
                            </select>
                        </div>

                        <!-- Product -->
                        <div class="col-lg-12">
                            <label class="form-label">Product<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Product">
                                <span class="input-group-text">
                                    <img src="assets/img/icons/qrcode-scan.svg" alt="QR" style="height: 20px;">
                                </span>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="col-lg-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Supplier</th>
                                            <th>Reference</th>
                                            <th>Status</th>
                                            <th>Total ($)</th>
                                            <th>Paid ($)</th>
                                            <th>Due ($)</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="assets/img/products/stock-img-01.png" alt="product" style="width: 40px;"></td>
                                            <td>24 Dec 2024</td>
                                            <td>Electro Mart</td>
                                            <td>PT001</td>
                                            <td><span class="badge bg-info text-dark">Received</span></td>
                                            <td>$1000</td>
                                            <td>$1000</td>
                                            <td>$600</td>
                                            <td><span class="badge bg-success">Paid</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Totals summary -->
                        <div class="row">
                                <div class="col-lg-6 ms-auto">
                                    <div class="total-order m-2 mb-3 ms-auto">
                                        <ul class="border-1 rounded-1">
                                            <li class="border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Order Tax</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                            <li class="border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Discount</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                            <li class="border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Shipping</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                            <li class="total border-0 border-bottom">
                                                <h4 class="border-0 text-gray-9">Grand Total</h4>
                                                <h5 class="text-gray-9">$ 0.00</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <!-- Form Inputs -->
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Order Tax<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="0">
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Discount<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="0">
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Shipping<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="0">
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-select">
                                <option selected>Received</option>
                                <option>Pending</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-lg-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Maximum 60 Words"></textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <!-- Edit popup -->

        <!-- delete modal -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="page-wrapper-new p-0">
                        <div class="content p-5 px-3 text-center">
                            <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i
                                    class="ti ti-trash fs-24 text-danger"></i></span>
                            <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Purchase Return</h4>
                            <p class="mb-0 fs-16">Are you sure you want to delete purchase return?</p>
                            <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                                <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Yes
                                    Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection



    @push('js')
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap Tagsinput JS -->
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    @endpush
</x-app-layout>
