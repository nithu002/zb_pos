<x-app-layout>
    @section('title', 'Dashboard')

    @push('css')
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <!-- Bootstrap Tagsinput CSS -->
        <link rel="stylesheet" href="{{ asset(path: 'assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
        <style>
            .table-wrapper {
                position: relative;
            }

            #product-loader {
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: 10;
                transform: translate(-50%, -50%);
                display: none;
            }

            #product-table.dull {
                opacity: 0.3;
                pointer-events: none;
                filter: grayscale(0.7);
            }
        </style>
    @endpush

    @section('content')
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Product List</h4>
                        <h6>Manage your products</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a id="export-selected-pdf" data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                                src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" id="export-selected" data-bs-placement="top" title="Excel"><img
                                src="{{ asset('assets/img/icons/excel.svg') }}" alt="img"></a>
                    </li>
                    <li>
                        <a href="{{ url()->current() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
                                class="ti ti-refresh"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                class="ti ti-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn">
                    <a href="{{ route('barcode.index') }}" class="btn btn-info"><i
                            class="ti ti-barcode fs-16 me-2"></i>Print Barcode</a>
                </div>
                <div class="page-btn">
                    <a href="{{ route('product.create') }}" class="btn btn-primary"><i
                            class="ti ti-circle-plus me-1"></i>Add Product</a>
                </div>
                <div class="page-btn import">
                    <a href="#" class="btn btn-secondary color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                            data-feather="download" class="me-1"></i>Import Product</a>
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
                                Category
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                @forelse ($catgeories as $cat)
                                    <li>
                                        <a href="javascript:void(0);"
                                            class="dropdown-item dropdown-category rounded-1">{{ $cat->category }}</a>
                                    </li>
                                @empty
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Categories not
                                            available</a>
                                    </li>
                                @endforelse
                            </ul>
                        </div>

                        {{-- version 2 --}}
                        {{-- <div class="dropdown">

                            <ul class="dropdown-menu  dropdown-menu-end p-3">

                                @forelse ($location  as $loc)
                                    <li>
                                        <a href="javascript:void(0);"
                                            class="dropdown-item rounded-1">{{ $loc->name }}</a>
                                    </li>
                                @empty
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Location not
                                            available</a>
                                    </li>
                                @endforelse


                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="table-wrapper position-relative">
                            <div id="product-loader" style="display:none;">
                                <img src="{{ asset('assets/img/loader/table-loader.gif') }}" alt="Loading..."
                                    style="width:500px; height:500px;">
                            </div>
                            <table class="table datatable" id="product-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Item Code </th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Selling Price</th>
                                        <th>Discount</th>
                                        <th>Unit</th>
                                        <th>Qty</th>
                                        <th>Supplier</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="product-table-body" class="">

                                    @include('app.products.table')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>

        {{-- model --}}
        <!-- Import Product -->
        {{-- <div class="modal fade" id="view-notes">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="page-wrapper-new p-0">
                        <div class="content">
                            <div class="modal-header">
                                <div class="page-title">
                                    <h4>Import Product</h4>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="https://dreamspos.dreamstechnologies.com/html/template/product-list.html">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label>Product<span class="ms-1 text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Bold V3.2</option>
                                                    <option>Nike Jordan</option>
                                                    <option>Iphone 14 Pro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label>Category<span class="ms-1 text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Laptop</option>
                                                    <option>Electronics</option>
                                                    <option>Shoe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label>Sub Category<span class="ms-1 text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Lenovo</option>
                                                    <option>Bolt</option>
                                                    <option>Nike</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6 col-12">
                                            <div class="row">
                                                <div>
                                                    <div class="modal-footer-btn download-file">
                                                        <a href="javascript:void(0)" class="btn btn-submit">Download
                                                            Sample File</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3 image-upload-down">
                                                <label class="form-label">Upload CSV File</label>
                                                <div class="image-upload download">
                                                    <input type="file">
                                                    <div class="image-uploads">
                                                        <img src="assets/img/download-img.png" alt="img">
                                                        <h4>Drag and drop a <span>file to upload</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Created by<span
                                                        class="ms-1 text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control"></textarea>
                                                <p class="mt-1">Maximum 60 Characters</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Import Product -->



        <!-- delete modal -->
        	 <div class="modal fade" id="delete-modal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content p-5 px-3 text-center">
								<span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i class="ti ti-trash fs-24 text-danger"></i></span>
								<h4 class="fs-20 fw-bold mb-2 mt-1">Delete Purchase</h4>
								<p class="mb-0 fs-16">Are you sure you want to delete purchase?</p>
								<div class="modal-footer-btn mt-3 d-flex justify-content-center">
									<button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-submit fs-13 fw-medium p-2 px-3">Yes Delete</button>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    @endsection





    @push('js')
        <!-- Select2 JS -->
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap Tagsinput JS -->
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>

        <script>
            $(document).on('click', '.dropdown-menu .dropdown-category', function() {
                var category = $(this).text().trim();

                // Show loader and dull table
                $('#product-loader').show();
                $('#product-table').addClass('dull');

                $.ajax({
                    url: '{{ route('products.filterByCategory') }}',
                    type: 'POST',
                    data: {
                        category: category,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#product-table-body').html(response.html);
                        toastr.info('Review the list of products that have been found.');
                    },
                    error: function() {
                        toastr.error('Failed to load products for this category.');
                    },
                    complete: function() {
                        // Hide loader and restore table
                        $('#product-loader').hide();
                        $('#product-table').removeClass('dull');
                    }
                });
            });
        </script>
        <script>
            $(function() {
                let deleteProductId = null;

                // When delete button is clicked, set the product ID
                $(document).on('click', '.delete-product-btn', function() {
                    deleteProductId = $(this).data('id');
                    $('#delete-product-id').val(deleteProductId);
                });


            });
        </script>


        <script>
            $(document).ready(function() {
                function submitExportForm(route) {
                    var selectedIds = [];
                    $(".row-checkbox:checked").each(function() {
                        selectedIds.push($(this).val());
                    });

                    if (selectedIds.length === 0) {
                        toastr.warning("Please select at least one product to export.");
                        return;
                    }

                    var form = $('<form>', {
                        action: route,
                        method: 'POST'
                    });

                    form.append('@csrf');

                    selectedIds.forEach(function(id) {
                        form.append($('<input>', {
                            type: 'hidden',
                            name: 'ids[]',
                            value: id
                        }));
                    });

                    $('body').append(form);
                    form.submit();
                }

                $("#export-selected").on("click", function() {
                    submitExportForm('{{ route('products.exportSelected') }}');
                });

                $("#export-selected-pdf").on("click", function() {
                    submitExportForm('{{ route('products.exportSelectedPdf') }}');
                });

            });
        </script>
    @endpush
</x-app-layout>
