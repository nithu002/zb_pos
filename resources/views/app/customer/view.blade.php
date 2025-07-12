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
        <!-- Product create CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/product-create.css') }}">

        <style>
            /* sds */
        </style>
    @endpush

    @section('content')

        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">Customers</h4>
                        <h6>Manage your customers</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a id="export-selected-pdf" data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                                src="assets/img/icons/pdf.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" id="export-selected" data-bs-placement="top" title="Excel"><img
                                src="assets/img/icons/excel.svg" alt="img"></a>
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
                    <a href="#" class="btn btn-primary text-white" data-bs-toggle="modal"
                        data-bs-target="#add-customer"><i class="ti ti-circle-plus me-1"></i>Add Customer</a>
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

                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Status
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
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
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Code</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Province</th>
                                    <th>Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox" class="row-checkbox" value="{{ $customer->id }}">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>CU001</td>
                                        @php
                                            $image = $customer->image;
                                            $imageUrl = !empty($image)
                                                ? $image
                                                : asset('assets/img/products/istockphoto.png');
                                        @endphp
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a class="avatar avatar-md me-2">
                                                    <img src="{{ url($imageUrl) }}" alt="product">
                                                </a>
                                                <a>{{ $customer->first_name }}
                                                    {{ $customer->last_name }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->city }}</td>
                                        <td><span
                                                class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white bg-success fs-10"><i
                                                    class="ti ti-point-filled me-1 fs-11"></i>Active</span></td>
                                        <td class="d-flex">
                                            <div class="edit-delete-action d-flex align-items-center">
                                                <a href="javascript:void(0);"
                                                    class="me-2 p-2 d-flex align-items-center border rounded viewCustomerBtn"
                                                    data-id="{{ $customer->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#view-customer">
                                                    <i data-feather="eye" class="feather-eye"></i>
                                                </a>

                                                <a class="me-2 p-2 d-flex align-items-center border rounded EditCustomerBtn"
                                                    data-id="{{ $customer->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#edit-customer">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>

                                                <a data-bs-toggle="modal" data-bs-toggle="modal"
                                                    data-bs-target="#delete-modal"
                                                    class="p-2 d-flex align-items-center border rounded DeleteCustomerBtn"
                                                    data-id="{{ $customer->id }}" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>

                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>

        {{-- model --}}

        <!-- Add Customer -->
        <div class="modal fade" id="add-customer">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="page-title">
                            <h4>Add Customer</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <div class="add-image-upload">
                                    <div class="preview-images d-flex align-items-center add-image">

                                    </div>
                                    <div class="new-employee-field">
                                        <div class="mb-0">
                                            <div class="image-upload mb-2">
                                                <input type="file" name="image" id="category_image"
                                                    accept=".jpeg, .png, .jpg">
                                                <div class="image-uploads">
                                                    <h4 class="fs-13 fw-medium">Upload Image</h4>
                                                </div>
                                            </div>
                                            <span>JPEG, PNG up to 2 MB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">First Name<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Last Name<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Phone<span class="text-danger ms-1">*</span></label>
                                    <input type="number" class="form-control" name="phone" required>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Address<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">City<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="city" required>
                                        <option value="">Select a city</option>
                                        <option value="Ampara">Ampara</option>
                                        <option value="Anuradhapura">Anuradhapura</option>
                                        <option value="Badulla">Badulla</option>
                                        <option value="Batticaloa">Batticaloa</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Hambantota">Hambantota</option>
                                        <option value="Jaffna">Jaffna</option>
                                        <option value="Kalutara">Kalutara</option>
                                        <option value="Kandy">Kandy</option>
                                        <option value="Kegalle">Kegalle</option>
                                        <option value="Kilinochchi">Kilinochchi</option>
                                        <option value="Kurunegala">Kurunegala</option>
                                        <option value="Mannar">Mannar</option>
                                        <option value="Matale">Matale</option>
                                        <option value="Matara">Matara</option>
                                        <option value="Monaragala">Monaragala</option>
                                        <option value="Mullaitivu">Mullaitivu</option>
                                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                                        <option value="Polonnaruwa">Polonnaruwa</option>
                                        <option value="Puttalam">Puttalam</option>
                                        <option value="Ratnapura">Ratnapura</option>
                                        <option value="Trincomalee">Trincomalee</option>
                                        <option value="Vavuniya">Vavuniya</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Province<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="province" required>
                                        <option value="">Select a province</option>
                                        <option value="Central">Central</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="Northern">Northern</option>
                                        <option value="North Central">North Central</option>
                                        <option value="North Western">North Western</option>
                                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                                        <option value="Southern">Southern</option>
                                        <option value="Uva">Uva</option>
                                        <option value="Western">Western</option>
                                    </select>

                                </div>

                                <div class="col-lg-12">
                                    <div
                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                        <span class="status-label">Status<span class="text-danger ms-1">*</span></span>
                                        <input type="checkbox" name="addstatus" id="user1" class="check"
                                            checked="">
                                        <label for="user1" class="checktoggle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Add Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Add Customer -->


        <!-- View Customer -->
        <div class="modal fade" id="view-customer">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="page-wrapper-new p-0">
                        <div class="content">
                            <div class="modal-header">
                                <div class="page-title">
                                    <h4>View Customer</h4>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="false">&times;</span>
                                </button>
                            </div>
                            <form id="viewCustomerForm" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="new-employee-field">
                                        <div class="profile-pic-upload image-field">
                                            <div class="profile-pic p-2">
                                                <img id="viewCustomerImage"
                                                    src="{{ asset('assets/img/users/user-41.jpg') }}"
                                                    class="object-fit-cover h-100 rounded-1" alt="user">

                                                <button type="button" class="close rounded-1">
                                                    <span aria-hidden="false">&times;</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">First Name: <span
                                                    id="viewCustomerFirst"></span></label>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Last Name: <span
                                                    id="viewCustomerLast"></span></label>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Email: <span id="viewCustomerEmail"></span></label>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Phone: <span id="viewCustomerPhone"></span></label>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Address: <span
                                                    id="viewCustomerAddress"></span></label>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">City: <span id="viewCustomerCity"></span></label>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Province: <span
                                                    id="viewCustomerProvince"></span></label>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                        data-bs-dismiss="modal">Cancel</button>
                                    {{-- <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Save
                                        Changes</button> --}}
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /View Customer -->




        <!-- Edit Customer Modal -->
        <div class="modal fade" id="edit-customer">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="page-wrapper-new p-0">
                        <div class="content">
                            <div class="modal-header">
                                <div class="page-title">
                                    <h4>Edit Customer</h4>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="editCustomerForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="modal-body">
                                    <div class="new-employee-field">
                                        <div class="profile-pic-upload image-field">
                                            <div class="profile-pic p-2">
                                                <img id="editCustomerImage"
                                                    src="{{ asset('assets/img/users/user-41.jpg') }}"
                                                    class="object-fit-cover h-100 rounded-1" alt="user">
                                            </div>
                                            <div class="mb-3">
                                                <input type="file" name="image" class="form-control"
                                                    id="editCustomerImageFile">
                                                <p class="mt-2">JPEG, PNG up to 2 MB</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" id="editCustomerFirst"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" id="editCustomerLast"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" id="editCustomerEmail"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="tel" name="phone" id="editCustomerPhone"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" id="editCustomerAddress"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">City</label>
                                            <select class="form-select" name="city" required id="editCustomerCity">
                                                <option value="">Select a city</option>
                                                <option value="Ampara">Ampara</option>
                                                <option value="Anuradhapura">Anuradhapura</option>
                                                <option value="Badulla">Badulla</option>
                                                <option value="Batticaloa">Batticaloa</option>
                                                <option value="Colombo">Colombo</option>
                                                <option value="Galle">Galle</option>
                                                <option value="Gampaha">Gampaha</option>
                                                <option value="Hambantota">Hambantota</option>
                                                <option value="Jaffna">Jaffna</option>
                                                <option value="Kalutara">Kalutara</option>
                                                <option value="Kandy">Kandy</option>
                                                <option value="Kegalle">Kegalle</option>
                                                <option value="Kilinochchi">Kilinochchi</option>
                                                <option value="Kurunegala">Kurunegala</option>
                                                <option value="Mannar">Mannar</option>
                                                <option value="Matale">Matale</option>
                                                <option value="Matara">Matara</option>
                                                <option value="Monaragala">Monaragala</option>
                                                <option value="Mullaitivu">Mullaitivu</option>
                                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                                <option value="Polonnaruwa">Polonnaruwa</option>
                                                <option value="Puttalam">Puttalam</option>
                                                <option value="Ratnapura">Ratnapura</option>
                                                <option value="Trincomalee">Trincomalee</option>
                                                <option value="Vavuniya">Vavuniya</option>
                                            </select>
                                            {{-- <input type="text" name="city" id="editCustomerCity"
                                                class="form-control"> --}}
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Province</label>
                                            <select class="form-select" name="province" id="editCustomerProvince"
                                                required>
                                                <option value="">Select a province</option>
                                                <option value="Central">Central</option>
                                                <option value="Eastern">Eastern</option>
                                                <option value="Northern">Northern</option>
                                                <option value="North Central">North Central</option>
                                                <option value="North Western">North Western</option>
                                                <option value="Sabaragamuwa">Sabaragamuwa</option>
                                                <option value="Southern">Southern</option>
                                                <option value="Uva">Uva</option>
                                                <option value="Western">Western</option>
                                            </select>
                                            {{-- <input type="text" name="province" id="editCustomerProvince"
                                                class="form-control"> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Edit Customer model --}}

        <!-- DELETE MODAL -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="deleteCustomerForm" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="page-wrapper-new p-0">
                            <div class="content p-5 px-3 text-center">
                                <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2">
                                    <i class="ti ti-trash fs-24 text-danger"></i>
                                </span>
                                <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Customer</h4>
                                <p class="mb-0 fs-16">Are you sure you want to delete this customer?</p>

                                <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                                    <button type="button"
                                        class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                        data-bs-dismiss="modal">Cancel</button>

                                    <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">
                                        Yes Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    @endsection



    @push('js')
        {{-- <!-- Select2 JS -->
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap Tagsinput JS -->
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

        {{-- select function --}}
        <script>
            $('#select-all').on('change', function() {
                $('.row-checkbox').prop('checked', this.checked);
            });
        </script>


        {{-- View Details --}}
        <script>
            $(document).ready(function() {
                $('.viewCustomerBtn').on('click', function() {
                    var customerId = $(this).data('id');

                    $.ajax({
                        url: '{{ url('/customers') }}/' + customerId,
                        method: 'GET',
                        success: function(response) {
                            $('#viewCustomerFirst').text(response.first_name);
                            $('#viewCustomerLast').text(response.last_name);
                            $('#viewCustomerEmail').text(response.email);
                            $('#viewCustomerPhone').text(response.phone);
                            $('#viewCustomerAddress').text(response.address);
                            $('#viewCustomerCity').text(response.city);
                            $('#viewCustomerProvince').text(response.province);
                            // Set profile image if available
                            // if (response.image) {
                            //     $('#viewCustomerImage').attr('src', '/storage/customers/' + response
                            //         .image);
                            // } else {
                            //     $('#viewCustomerImage').attr('src',
                            //         '/assets/img/users/user-41.jpg'); // fallback image
                            // }
                            if (response.image) {
                                $('#viewCustomerImage').attr('src', response
                                    .image); // ✅ Already full URL
                            } else {
                                $('#viewCustomerImage').attr('src',
                                    '/assets/img/users/user-41.jpg');
                            }

                        },
                        error: function() {
                            alert('Failed to fetch customer details');
                        }
                    });
                });
            });
        </script>
        {{-- /View end --}}

        {{-- Edit details --}}
        <script>
            // This will give something like: http://localhost/yourproject/public/customers/
            var routeBase = "{{ route('customers.show', ['id' => 'ID_REPLACE']) }}";
        </script>

        <script>
            $(document).ready(function() {
                $('.EditCustomerBtn').on('click', function() {
                    var customerId = $(this).data('id');

                    // Replace placeholder with actual ID
                    var fetchUrl = routeBase.replace('ID_REPLACE', customerId);


                    $.ajax({
                        url: fetchUrl,
                        method: 'GET',
                        success: function(response) {
                            // Set values for input fields
                            $('#editCustomerFirst').val(response.first_name);
                            $('#editCustomerLast').val(response.last_name);
                            $('#editCustomerEmail').val(response.email);
                            $('#editCustomerPhone').val(response.phone);
                            $('#editCustomerAddress').val(response.address);
                            $('#editCustomerCity').val(response.city);
                            $('#editCustomerProvince').val(response.province);

                            // Set profile image if available
                            // if (response.image) {
                            //     $('#viewCustomerImage').attr('src', '/storage/customers/' + response
                            //         .image);
                            // } else {
                            //     $('#viewCustomerImage').attr('src',
                            //         '/assets/img/users/user-41.jpg'); // fallback image
                            // }
                            // Set image
                            if (response.image) {
                                $('#editCustomerImage').attr('src', response.image);
                            } else {
                                $('#editCustomerImage').attr('src',
                                    '/assets/img/users/user-41.jpg');
                            }

                            // Update the form action dynamically
                            $('#editCustomerForm').attr('action', fetchUrl);

                        },
                        error: function() {
                            alert('Failed to fetch customer details');
                        }
                    });
                });
            });
        </script>
        {{-- /Edit end --}}


        {{-- Image view for add image --}}

        <script>
            // Single image preview
            $(document).on('change', '.image-upload input[type="file"]', function(e) {
                const file = e.target.files[0]; // Only take the first file
                const $previewArea = $(this).closest('.add-image-upload').find('.preview-images');

                // Clear previous previews
                $previewArea.empty();

                if (!file) return; // No file selected

                if (!file.type.startsWith('image/')) {
                    toastr.error('Only image files are allowed!');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(evt) {
                    const imgHtml = `
            <div class="phone-img uploaded" style="position:relative; display:inline-block; margin:5px;">
                <img src="${evt.target.result}" alt="image" style="max-width:110px; max-height:110px; border-radius:8px; box-shadow:0 2px 8px #eee;">
                <a href="javascript:void(0);" class="remove-product" style="position:absolute;top:5px;right:5px;">
                    <span style="background:#f33;color:#fff;border-radius:50%;padding:2px 6px;font-weight:bold;font-size:16px;line-height:1;">×</span>
                </a>
            </div>
        `;
                    $previewArea.html(imgHtml);
                    if (window.feather) feather.replace();
                };
                reader.readAsDataURL(file);
            });

            // Remove image preview
            $(document).on('click', '.remove-product', function() {
                $(this).closest('.phone-img.uploaded').remove();
            });
        </script>

        {{-- Export  --}}
             <script>
            $(document).ready(function() {
                function submitExportForm(route) {
                    var selectedIds = [];
                    $(".row-checkbox:checked").each(function() {
                        selectedIds.push($(this).val());
                    });

                    if (selectedIds.length === 0) {
                        toastr.warning("Please select at least one cutomer to export.");
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
                    submitExportForm('{{ route('customers.downloadExcel') }}');
                });

                $("#export-selected-pdf").on("click", function() {
                    submitExportForm('{{ route('customers.downloadPdf') }}');
                });

            });
        </script>


        {{-- Delete  --}}

        <script>
            // Get the base delete route with a placeholder
            var deleteRoute = "{{ route('customers.destroy', ['id' => 'ID_REPLACE']) }}";

            $(document).ready(function() {
                $('.DeleteCustomerBtn').on('click', function() {
                    var customerId = $(this).data('id');

                    // Replace placeholder with actual ID
                    var finalRoute = deleteRoute.replace('ID_REPLACE', customerId);

                    // Set the form action
                    $('#deleteCustomerForm').attr('action', finalRoute);
                });
            });
        </script>
    @endpush
</x-app-layout>
