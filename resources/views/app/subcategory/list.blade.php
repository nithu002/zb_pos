<x-app-layout>
    @section('title', 'Category')

    @push('css')
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <!-- Bootstrap Tagsinput CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
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
                        <h4 class="fw-bold">Sub Category</h4>
                        <h6>Manage your sub categories</h6>
                    </div>
                </div>
                <ul class="table-top-head">

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
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-category"><i
                            class="ti ti-circle-plus me-1"></i>Add Sub Category</a>
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
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Status
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" data-status="1"
                                        class="dropdown-category dropdown-item rounded-1">Active</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-status="0"
                                        class=" dropdown-category dropdown-item rounded-1">Inactive</a>
                                </li>
                            </ul>
                        </div>
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
                                        	<th>Image</th>
											<th>Sub Category</th>
											<th>Category</th>
											<th>Status</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="product-table-body" class="">
                                    @include('app.subcategory.table')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>

        {{-- model --}}
        <!-- Add Category -->
        <div class="modal fade" id="add-category">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="page-title">
                            <h4>Add Sub Category</h4>
                        </div>
                        <button type="button" class="close bg-danger text-white fs-16" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/sub-categories.html">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="add-image-upload">
                                    <div class="add-image">
                                        <span class="fw-normal"><i data-feather="plus-circle" class="plus-down-add"></i> Add
                                            Image</span>
                                    </div>
                                    <div class="new-employee-field">
                                        <div class="mb-0">
                                            <div class="image-upload mb-2">
                                                <input type="file">
                                                <div class="image-uploads">
                                                    <h4 class="fs-13 fw-medium">Upload Image</h4>
                                                </div>
                                            </div>
                                            <span>JPEG, PNG up to 2 MB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category<span class="text-danger ms-1">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Computers</option>
                                    <option>Shoe</option>
                                    <option>Electronics</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sub Category<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category Code<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger ms-1">*</span></label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="mb-0">
                                <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                    <span class="status-label">Status</span>
                                    <input type="checkbox" id="user2" class="check" checked="">
                                    <label for="user2" class="checktoggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Sub Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Add Category -->

        <!-- Edit Category -->
        <div class="modal fade" id="edit-category">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="page-title">
                            <h4>Edit Sub Category</h4>
                        </div>
                        <button type="button" class="close bg-danger text-white fs-16" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/sub-categories.html">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="add-image-upload">
                                    <div class="add-image p-1 border-solid">

                                        <img src="assets/img/products/laptop.png" alt="image">
                                        <a href="javascript:void(0);"><i data-feather="x"
                                                class="x-square-add image-close remove-product fs-12 text-white bg-danger rounded-1"></i></a>

                                    </div>
                                    <div class="new-employee-field">
                                        <div class="mb-0">
                                            <div class="image-upload mb-2">
                                                <input type="file">
                                                <div class="image-uploads">
                                                    <h4 class="fs-13 fw-medium">Change Image</h4>
                                                </div>
                                            </div>
                                            <span>JPEG, PNG up to 2 MB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category<span class="text-danger ms-1">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option selected>Computers</option>
                                    <option>Shoe</option>
                                    <option>Electronics</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sub Category<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control" value="Laptop">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category Code<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control" value="CT001">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger ms-1">*</span></label>
                                <textarea class="form-control">Efficient Productivity</textarea>
                            </div>
                            <div class="mb-0">
                                <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                    <span class="status-label">Status</span>
                                    <input type="checkbox" id="user3" class="check" checked="">
                                    <label for="user3" class="checktoggle"></label>
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
        <!-- /Edit Category -->
        <!-- delete modal -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="page-wrapper-new p-0">
                        <div class="content p-5 px-3 text-center">
                            <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i
                                    class="ti ti-trash fs-24 text-danger"></i></span>
                            <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Sub Category</h4>
                            <p class="mb-0 fs-16">Are you sure you want to delete sub category?</p>
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
        <!-- Select2 JS -->
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap Tagsinput JS -->
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>

        <script>
            const routes = {
                categoriesStore: @json(route('categories.store')),
                categoriesUpdate: @json(route('category.update')),
            };
            const csrfToken = '{{ csrf_token() }}';
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('.edit-category-btn');
                editButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.dataset.id;
                        const slug = this.dataset.slug;
                        const status = this.dataset.status;
                        const category = this.dataset.name;

                        // Fill modal fields
                        document.getElementById('edit_category_id').value = id;
                        document.getElementById('edit_category_slug').value = slug;
                        document.getElementById('edit_category_name').value = category;

                        // Set checkbox state
                        const checkbox = document.getElementById('user3');
                        checkbox.checked = (status == 1);

                        // Also set the hidden input value
                        const hiddenInput = document.getElementById('edit_category_status');
                        hiddenInput.value = status;

                        // When user changes the checkbox, update hidden input value
                        checkbox.addEventListener('change', function() {
                            hiddenInput.value = this.checked ? 1 : 0;
                        });
                    });
                });
            });
        </script>


        <script>
            $(document).on('click', '.dropdown-menu .dropdown-category', function() {

                const status = this.dataset.status;

                // Show loader and dull table
                $('#product-loader').show();
                $('#product-table').addClass('dull');

                $.ajax({
                    url: '{{ route('category.filterByStatus') }}',
                    type: 'POST',
                    data: {
                        status: status,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#product-table-body').html(response.html);
                        toastr.info('Review the list of categories that have been found.');
                    },
                    error: function() {
                        toastr.error('Failed to load categories for this status.');
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

                // Save category
                $('#submitCategory').on('click', function() {
                    var $btn = $(this);
                    var category = $('#category_name').val();
                    const checkbox = document.querySelector('input[name="addstatus"]');
                    // Get value: 1 if checked, 0 if unchecked
                    const statusValue = checkbox.checked ? 1 : 0;

                    if (!category) {
                        toastr.warning('Please enter a category name.');
                        return;
                    }
                    $btn.prop('disabled', true).html(
                        '<span class="spinner-border spinner-border-sm me-1"></span> Saving...');
                    $.ajax({
                        url: routes.categoriesStore,
                        type: 'POST',
                        data: {
                            category: category,
                            status: statusValue,
                            _token: csrfToken
                        },
                        success: function(response) {
                            toastr.success('Category added!');
                            // refresh page
                            location.reload();
                        },
                        error: function(xhr) {
                            toastr.error('Error adding category.');
                            $btn.prop('disabled', false).html('Try Again');
                        }
                    });
                });

                // edit category
                $('#editCategory').on('click', function() {
                    var $btn = $(this);
                    var id = $('#edit_category_id').val();
                    var category = $('#edit_category_name').val();
                    var slug = $('#edit_category_slug').val();
                    const checkbox = document.querySelector('input[name="status"]');
                    // Get value: 1 if checked, 0 if unchecked
                    const statusValue = checkbox.checked ? 1 : 0;

                    if (!category) {
                        toastr.warning('Please enter a category name.');
                        return;
                    }
                    $btn.prop('disabled', true).html(
                        '<span class="spinner-border spinner-border-sm me-1"></span> Saving...');
                    $.ajax({
                        url: routes.categoriesUpdate,
                        type: 'POST',
                        data: {
                            id: id,
                            category: category,
                            slug: slug,
                            status: statusValue,
                            _token: csrfToken
                        },
                        success: function(response) {
                            toastr.success('Category updated!');
                            // refresh page
                            location.reload();
                        },
                        error: function(xhr) {
                            toastr.error('Error updating category.');
                            $btn.prop('disabled', false).html('Try Again');
                        }
                    });
                });

            });
        </script>
    @endpush
</x-app-layout>
