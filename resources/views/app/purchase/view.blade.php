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

            .autocomplete-dropdown {
                background: #fff;
                border: 1px solid #ccc;
                max-height: 200px;
                overflow-y: auto;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .autocomplete-dropdown .dropdown-item {
                padding: 8px 12px;
                border-bottom: 1px solid #eee;
            }

            .autocomplete-dropdown .dropdown-item:last-child {
                border-bottom: none;
            }

            .autocomplete-dropdown .dropdown-item:hover {
                background-color: #f8f9fa;
            }
        </style>
    @endpush

    @section('content')

        <div class="content">
            <div class="page-header transfer">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Purchase</h4>
                        <h6>Manage your purchases</h6>
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
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                                class="feather-rotate-ccw"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="d-flex purchase-pg-btn">
                    <div class="page-btn">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-purchase"><i
                                data-feather="plus-circle" class="me-1"></i>Add Purchase</a>
                    </div>
                    <div class="page-btn import">
                        <a href="#" class="btn btn-secondary color" data-bs-toggle="modal"
                            data-bs-target="#view-notes"><i data-feather="download" class="me-2"></i>Import Purchase</a>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                            <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex table-dropdown my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Status
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Received</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Pending</a>
                                </li>
                                {{-- <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Overdue</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Supplier Name</th>
                                    <th>Reference</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Quantity</th>
                                    {{-- <th>Due</th> --}}
                                    {{-- <th>Payment Status</th> --}}
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>{{ $purchase->supplier->company_name ?? 'N/A' }}</td>
                                        <td>{{ $purchase->reference }}</td>
                                        <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}</td>
                                        <td>
                                            <span
                                                class="badges status-badge fs-10 p-1 px-2 rounded-1 {{ $purchase->status === 'Pending' ? 'badge-pending' : '' }}">
                                                {{ $purchase->status }}
                                            </span>
                                        </td>
                                        <td>${{ number_format($purchase->total) }}</td>
                                        {{-- @forelse ($purchase->items as $item)
                                            <td>
                                                {{ $item->qty }}
                                            </td>
                                        @empty
                                            <td>
                                                0
                                            </td>
                                        @endforelse --}}
                                        <td>
                                            {{ $purchaseQtySum[$purchase->id] ?? 0 }}
                                        </td>


                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" data-bs-toggle="modal" data-bs-target="#edit-purchase"
                                                    data-id="{{ $purchase->id }}"
                                                    data-supplier="{{ $purchase->supplier_id }}"
                                                    data-date="{{ $purchase->purchase_date }}"
                                                    data-reference="{{ $purchase->reference }}"
                                                    data-status="{{ $purchase->status }}"
                                                    data-notes="{{ $purchase->notes }}" {{-- data-tax="{{ $purchase->order_tax }}" --}}
                                                    {{-- data-discount="{{ $purchase->discount }}" --}} data-shipping="{{ $purchase->shipping }}">

                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="p-2" data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                    href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
            <!-- /product list -->
        </div>


        <!-- Add Purchase -->

        <div class="modal fade" id="add-purchase">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Purchase</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('purchases.store') }}" id="purchaseForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Supplier Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" name="supplier_id" required>
                                            <option value="">Select</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                            <div class="add-icon tab">
                                                <a href="{{ route('suppliers.create') }}"
                                                    class="btn btn-outline-primary">
                                                    <i data-feather="plus-circle" class="feather-plus-circles"></i>
                                                </a>
                                                {{-- <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#add_customer">
                                                    <i data-feather="plus-circle" class="feather-plus-circles"></i> --}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Date<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="date" name="purchase_date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <label class="form-label">Reference<span class="text-danger">*</span></label>
                                    <input type="text" name="reference" class="form-control" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Product<span class="text-danger">*</span></label>
                                    <div class="position-relative" id="product-input-wrapper" style="z-index: 1060;">
                                        <input type="text" id="product-input" class="form-control"
                                            placeholder="Search Product">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="modal-body-table mt-3">
                                        <div class="table-responsive">
                                            <table class="table  rounded-1">
                                                <thead>
                                                    <tr>
                                                        <th class="bg-secondary-transparent p-3">Product</th>
                                                        <th class="bg-secondary-transparent p-3">Qty</th>
                                                        <th class="bg-secondary-transparent p-3">Purchase Price($)</th>
                                                        <th class="bg-secondary-transparent p-3">Discount($)</th>
                                                        {{-- <th class="bg-secondary-transparent p-3">Tax(%)</th>
                                                        <th class="bg-secondary-transparent p-3">Tax Amount($)</th> --}}
                                                        <th class="bg-secondary-transparent p-3">Unit Cost($)</th>
                                                        <th class="bg-secondary-transparent p-3">Total Cost($)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="purchase-items-table-body">
                                                    <!-- JS will append rows here -->
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5" class="text-end">Sub Total:</th>
                                                        <th id="sub">$0.00</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <label class="form-label">Discount<span class="text-danger">*</span></label>
                                    <input type="number" name="discount" class="form-control" value="0"
                                        step="any">
                                </div> --}}
                                <div class="col-md-4">
                                    <label class="form-label">Shipping<span class="text-danger">*</span></label>
                                    <input type="number" name="shipping" class="form-control" value="0"
                                        step="any">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" required>
                                        <option value="">Select</option>
                                        <option value="Received">Received</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes" rows="3" maxlength="600"></textarea>
                                    <small class="text-muted">Maximum 60 words</small>
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
        </div>
        <!-- /Add Purchase -->



        <!-- Edit Purchase -->
        <div class="modal fade" id="edit-purchase" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Purchase</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editPurchaseForm" method="POST"
                        action="{{ route('purchases.update', ['purchase' => '__ID__']) }}">
                        @csrf
                        @method('PUT')
                        {{-- <input type="hidden" name="discount" value="0"> <!-- Ensure this exists --> --}}

                        <div class="modal-body" style="max-height:70vh; overflow-y:auto;">
                            <div class="row g-3">

                                {{-- Supplier --}}
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Supplier Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" name="supplier_id">
                                            <option value="">Select</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#add_customer" type="button">
                                            <i data-feather="plus-circle"></i>
                                        </button>
                                    </div>
                                </div>

                                {{-- Date --}}
                                {{-- <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Date <span class="text-danger">*</span></label>
                                    <div class="input-groupicon calender-input">
                                        <i data-feather="calendar" class="info-img"></i>
                                        <input type="text" name="purchase_date"
                                            class="datetimepicker form-control p-2">
                                    </div>
                                </div> --}}

                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Date<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="date" name="purchase_date" class="form-control" required>
                                    </div>
                                </div>


                                {{-- Reference --}}
                                <div class="col-lg-4 col-md-12">
                                    <label class="form-label">Reference <span class="text-danger">*</span></label>
                                    <input type="text" name="reference" class="form-control">
                                </div>

                                {{-- Search Product --}}
                                {{-- <div id="edit-product-input-wrapper" class="col-12">
                                    <label class="form-label">Search Product</label>
                                    <input type="text" class="form-control" name="product_search"
                                        id="edit-product-input" placeholder="Search Product">
                                </div> --}}
                                <div class="col-12">
                                    <label class="form-label">Product<span class="text-danger">*</span></label>
                                    <div class="position-relative" id="edit-product-input-wrapper"
                                        style="z-index: 1060;">
                                        <input type="text" id="edit-product-input" class="form-control"
                                            name="product_search" placeholder="Search Product">
                                    </div>
                                </div>

                                {{-- Dynamic Product Table --}}
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>QTY</th>
                                                    <th>Purchase Price ($)</th>
                                                    <th>Discount ($)</th>
                                                    <th>Unit Cost ($)</th>
                                                    <th>Total Cost ($)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="editPurchaseItems">
                                                {{-- Filled by JS --}}
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" class="text-end">Sub Total:</th>
                                                    <th id="sub-totals">$0.00</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                {{-- Shipping --}}
                                <div class="col-md-4">
                                    <label class="form-label">Shipping</label>
                                    <input type="text" name="shipping" class="form-control" value="0">
                                </div>

                                {{-- Status --}}
                                <div class="col-12">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-select">
                                        <option value="">Select</option>
                                        <option value="Received">Received</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>

                                {{-- Description / Notes --}}
                                <div class="col-12">
                                    <label class="form-label">Notes</label>
                                    <textarea name="notes" class="form-control" rows="3" maxlength="600"></textarea>
                                    <small class="text-muted">Maximum 60 words</small>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <!-- /Edit Purchase -->



        <div class="modal fade" id="view-notes" tabindex="-1" aria-labelledby="viewNotesLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewNotesLabel">Import Purchase</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="supplierSelect" class="form-label">Supplier Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select id="supplierSelect" class="form-select" required>
                                            <option value="">Select</option>
                                            <option>Apex Computers</option>
                                            <option>Dazzle Shoes</option>
                                            <option>Best Accessories</option>
                                        </select>
                                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#add_customer">
                                            <i data-feather="plus-circle"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="statusSelect" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select id="statusSelect" class="form-select" required>
                                        <option value="">Select</option>
                                        <option>Received</option>
                                        <option>Ordered</option>
                                        <option>Pending</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <a href="javascript:void(0)" class="btn btn-primary mb-3">Download Sample File</a>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 image-upload-down">
                                        <label class="form-label"> Upload CSV File</label>
                                        <div class="image-upload download">
                                            <input type="file">
                                            <div class="image-uploads">
                                                <img src="assets/img/download-img.png" alt="img">
                                                <h4>Drag and drop a <span>file to upload</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Order Tax <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Discount <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Shipping <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" class="form-control" rows="3" maxlength="60" placeholder="Maximum 60 characters"></textarea>
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

        <!-- /Import Purchase -->


        <!-- delete modal -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="page-wrapper-new p-0">
                        <div class="content p-5 px-3 text-center">
                            <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i
                                    class="ti ti-trash fs-24 text-danger"></i></span>
                            <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Purchase</h4>
                            <p class="mb-0 fs-16">Are you sure you want to delete purchase?</p>
                            <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                                <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit fs-13 fw-medium p-2 px-3">Yes Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection


    @push('js')
        {{-- Add function --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const BASE_URL = "{{ url('') }}";
                let productInput = document.getElementById('product-input');
                let inputWrapper = document.getElementById('product-input-wrapper');
                let tableBody = document.getElementById('purchase-items-table-body');

                let dropdown = document.createElement('div');
                dropdown.classList.add('autocomplete-dropdown');
                dropdown.style.position = 'absolute';
                dropdown.style.top = '100%';
                dropdown.style.left = '0';
                dropdown.style.right = '0';
                dropdown.style.zIndex = '1060';
                inputWrapper.appendChild(dropdown);

                productInput.addEventListener('input', function() {
                    let query = this.value.trim();
                    if (query.length < 2) {
                        dropdown.innerHTML = '';
                        return;
                    }

                    fetch(`${BASE_URL}/products/search?q=${query}`)
                        .then(res => res.json())
                        .then(products => {
                            dropdown.innerHTML = '';
                            if (products.length === 0) {
                                dropdown.innerHTML = '<div class="dropdown-item">No results</div>';
                                return;
                            }

                            products.forEach(product => {
                                let item = document.createElement('div');
                                item.classList.add('dropdown-item');
                                item.textContent = product.product_name;
                                item.style.cursor = 'pointer';
                                item.addEventListener('mousedown', function() {
                                    addProductRow(product);
                                    productInput.value = '';
                                    dropdown.innerHTML = '';
                                });
                                dropdown.appendChild(item);
                            });
                        });
                });

                document.addEventListener('click', function(e) {
                    if (!productInput.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.innerHTML = '';
                    }
                });

                function addProductRow(product) {
                    let rowIndex = tableBody.querySelectorAll('tr').length;
                    let row = document.createElement('tr');

                    row.innerHTML = `
                    <tr>
                    <td>${product.product_name}
                        <input type="hidden" name="items[${rowIndex}][product_id]" value="${product.id}">
                    </td>
                    <td><input type="number" name="items[${rowIndex}][qty]" class="form-control qty" value="1" min="1"></td>
                    <td><input type="number" name="items[${rowIndex}][purchase_price]" class="form-control price" value="0" step="any"></td>
                    <td><input type="number" name="items[${rowIndex}][discount]" class="form-control discount" value="0" step="any"></td>
                    <td><input type="number" name="items[${rowIndex}][unit_cost]" class="form-control unit-cost" readonly value="0"></td>
                    <td><input type="number" name="items[${rowIndex}][line-total]" class="form-control line-total" readonly value="0"></td>
                    </tr>
                        `;

                    tableBody.appendChild(row);

                    const qtyInput = row.querySelector('.qty');
                    const priceInput = row.querySelector('.price');
                    const discountInput = row.querySelector('.discount');
                    const unitCostField = row.querySelector('.unit-cost');
                    const lineTotalField = row.querySelector('.line-total');

                    function calculateRow() {
                        const qty = parseFloat(qtyInput.value) || 0;
                        const price = parseFloat(priceInput.value) || 0;
                        const discount = parseFloat(discountInput.value) || 0;

                        const unitCost = price - discount;
                        const lineTotal = unitCost * qty;

                        unitCostField.value = unitCost.toFixed(2);
                        lineTotalField.value = lineTotal.toFixed(2);

                        updateSub();
                    }

                    [qtyInput, priceInput, discountInput].forEach(input => {
                        input.addEventListener('input', calculateRow);
                    });

                    calculateRow();
                }

            });

            function updateSub() {
                let sub = 0;
                const lineTotals = document.querySelectorAll('.line-total');

                lineTotals.forEach(input => {
                    const lineAmount = parseFloat(input.value) || 0;
                    sub += lineAmount;
                });

                document.getElementById('sub').textContent = `$${sub.toFixed(2)}`;
            }
        </script>

        {{-- Edit function --}}
        <script>
            $(document).on('click', '[data-bs-target="#edit-purchase"]', function() {
                let $this = $(this);
                let id = $this.data('id');
                let form = $('#editPurchaseForm');

                let action = form.attr('action').replace('__ID__', id);
                form.attr('action', action);

                form.find('select[name="supplier_id"]').val($this.data('supplier'));
                form.find('input[name="purchase_date"]').val($this.data('date'));
                form.find('input[name="reference"]').val($this.data('reference'));
                form.find('select[name="status"]').val($this.data('status'));
                form.find('textarea[name="notes"]').val($this.data('notes'));
                form.find('input[name="shipping"]').val($this.data('shipping'));

                loadPurchaseItems(id);
            });

            // Product search setup
            document.addEventListener('DOMContentLoaded', function() {
                const BASE_URL = "{{ url('') }}";
                let productInput = document.getElementById('edit-product-input');
                let inputWrapper = document.getElementById('edit-product-input-wrapper');
                let tableBody = document.getElementById('editPurchaseItems');

                let dropdown = document.createElement('div');
                dropdown.classList.add('autocomplete-dropdown');
                dropdown.style.position = 'absolute';
                dropdown.style.top = '100%';
                dropdown.style.left = '0';
                dropdown.style.right = '0';
                dropdown.style.zIndex = '1060';
                inputWrapper.appendChild(dropdown);

                productInput.addEventListener('input', function() {
                    let query = this.value.trim();
                    if (query.length < 2) {
                        dropdown.innerHTML = '';
                        return;
                    }

                    fetch(`${BASE_URL}/products/search?q=${query}`)
                        .then(res => res.json())
                        .then(products => {
                            dropdown.innerHTML = '';
                            if (products.length === 0) {
                                dropdown.innerHTML = '<div class="dropdown-item">No results</div>';
                                return;
                            }

                            products.forEach(product => {
                                let item = document.createElement('div');
                                item.classList.add('dropdown-item');
                                item.textContent = product.product_name;
                                item.style.cursor = 'pointer';
                                item.addEventListener('mousedown', function() {
                                    addProductRow(product);
                                    productInput.value = '';
                                    dropdown.innerHTML = '';
                                });
                                dropdown.appendChild(item);
                            });
                        });
                });

                document.addEventListener('click', function(e) {
                    if (!productInput.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.innerHTML = '';
                    }
                });
            });

            function loadPurchaseItems(purchaseId) {
                $.ajax({
                    url: "{{ route('purchases.edit', ':id') }}".replace(':id', purchaseId),
                    method: 'GET',
                    success: function(items) {
                        const tbody = $('#editPurchaseItems');
                        tbody.empty();

                        if (!items || items.length === 0) {
                            tbody.html(
                                `<tr><td colspan="6" class="text-center">No items found for this purchase.</td></tr>`
                            );
                            return;
                        }

                        let rowsHtml = '';
                        items.forEach(item => {
                            const productName = item.product?.product_name || 'Unnamed Product';

                            rowsHtml += `
                        <tr>
                            <td>${productName}</td>
                            <td>
                                <input type="number" step="any" name="items[${item}][qty]" value="${item.qty}" class="form-control form-control-sm qty-input">
                                <input type="hidden" name="item_id[]" value="${item.id}">
                            </td>
                            <td>
                                <input type="number" step="any" name=" items[${item}][purchase_price]" value="${item.purchase_price}" class="form-control form-control-sm price-input">
                            </td>
                            <td>
                                <input type="number" name="items[${item}][discount]" step="any" value="${item.discount}" class="form-control form-control-sm discount-input">
                            </td>
                            <td>
                                <input type="text" name="items[${item}][unit-cost]" class="form-control form-control-sm unit-cost" readonly>
                            </td>
                            <td>
                                <input type="text" name="items[${item}][line-total]" class="form-control form-control-sm line-total" readonly>
                            </td>
                        </tr>
                    `;
                        });

                        tbody.html(rowsHtml);

                        if (window.feather) {
                            feather.replace();
                        }

                        attachEditCalculations();
                    },
                    error: function(xhr) {
                        console.error("Error fetching items:", xhr);
                        alert('Failed to load purchase items.');
                    }
                });
            }

            function attachEditCalculations() {
                const rows = document.querySelectorAll('#editPurchaseItems tr');

                rows.forEach(row => {

                    const qtyInput = row.querySelector('.qty-input');
                    const priceInput = row.querySelector('.price-input');
                    const discountInput = row.querySelector('.discount-input');
                    const unitCostField = row.querySelector('.unit-cost');
                    const lineTotalField = row.querySelector('.line-total');

                    function calculateRow() {
                        const qty = parseFloat(qtyInput.value) || 0;
                        const price = parseFloat(priceInput.value) || 0;
                        const discount = parseFloat(discountInput.value) || 0;

                        const unitCost = price - discount;
                        const lineTotal = unitCost * qty;

                        unitCostField.value = unitCost.toFixed(2);
                        lineTotalField.value = lineTotal.toFixed(2);

                        updateSubTotal();
                    }

                    [qtyInput, priceInput, discountInput].forEach(input => {
                        input.addEventListener('input', calculateRow);
                    });

                    calculateRow();
                });

                updateSubTotal();
            }

            function updateSubTotal() {
                let subTotal = 0;
                const lineTotals = document.querySelectorAll('.line-total');

                lineTotals.forEach(input => {
                    const lineAmount = parseFloat(input.value) || 0;
                    subTotal += lineAmount;
                });

                document.getElementById('sub-totals').textContent = `$${subTotal.toFixed(2)}`;
            }

            function addProductRow(product) {
                const tbody = document.getElementById('editPurchaseItems');
                let rowIndex = tbody.querySelectorAll('tr').length;

                let row = document.createElement('tr');
                row.innerHTML = `
            <td>${product.product_name}
                <input type="hidden" name="items[${rowIndex}][product_id]" value="${product.id}">
            </td>
            <td><input type="number" name="items[${rowIndex}][qty]" class="form-control form-control-sm qty-input" value="1" min="1"></td>
            <td><input type="number" name="items[${rowIndex}][purchase_price]" class="form-control form-control-sm price-input" value="0" step="any"></td>
            <td><input type="number" name="items[${rowIndex}][discount]" class="form-control form-control-sm discount-input" value="0" step="any"></td>
            <td><input type="text" name="items[${rowIndex}][unit_cost]" class="form-control form-control-sm unit-cost" readonly value="0"></td>
            <td><input type="text" name="items[${rowIndex}][total]" class="form-control form-control-sm line-total" readonly value="0"></td>
        `;
                tbody.appendChild(row);

                const qtyInput = row.querySelector('.qty-input');
                const priceInput = row.querySelector('.price-input');
                const discountInput = row.querySelector('.discount-input');
                const unitCostField = row.querySelector('.unit-cost');
                const lineTotalField = row.querySelector('.line-total');

                function calculateRow() {
                    const qty = parseFloat(qtyInput.value) || 0;
                    const price = parseFloat(priceInput.value) || 0;
                    const discount = parseFloat(discountInput.value) || 0;

                    const unitCost = price - discount;
                    const lineTotal = unitCost * qty;

                    unitCostField.value = unitCost.toFixed(2);
                    lineTotalField.value = lineTotal.toFixed(2);

                    updateSubTotal();
                }

                [qtyInput, priceInput, discountInput].forEach(input => {
                    input.addEventListener('input', calculateRow);
                });

                calculateRow();
            }
        </script>


        <!-- Select2 JS -->
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap Tagsinput JS -->
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    @endpush
</x-app-layout>
