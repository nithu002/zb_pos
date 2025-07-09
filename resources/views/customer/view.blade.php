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

                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CU001</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                <img src="assets/img/users/user-33.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Carl Evans</a>
                                        </div>
                                    </td>
                                    <td><a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                            class="__cf_email__"
                                            data-cfemail="accfcddec0c9dacdc2dfecc9d4cdc1dcc0c982cfc3c1">[email&#160;protected]</a>
                                    </td>
                                    <td>+12163547758</td>
                                    <td>Germany</td>
                                    <td><span
                                            class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white bg-success fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Active</span></td>
                                    <td class="d-flex">
                                        <div class="edit-delete-action d-flex align-items-center">
                                            <a class="me-2 p-2 d-flex align-items-center border rounded" href="#"
                                                data-bs-toggle="modal" data-bs-target="#view-customer">
                                                <i data-feather="eye" class="feather-eye"></i>
                                            </a>
                                            <a class="me-2 p-2 d-flex align-items-center border rounded" href="#"
                                                data-bs-toggle="modal" data-bs-target="#edit-customer">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                class="p-2 d-flex align-items-center border rounded"
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
                                    <td>CU002</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                <img src="assets/img/users/user-02.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Minerva Rameriz</a>
                                        </div>
                                    </td>
                                    <td><a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                            class="__cf_email__"
                                            data-cfemail="592b38343c2b3023193c21383429353c773a3634">[email&#160;protected]</a>
                                    </td>
                                    <td>+11367529510 </td>
                                    <td>Japan</td>
                                    <td><span
                                            class="d-inline-flex align-items-center p-1 pe-2 rounded-1 text-white bg-success fs-10"><i
                                                class="ti ti-point-filled me-1 fs-11"></i>Active</span></td>
                                    <td class="d-flex">
                                        <div class="edit-delete-action d-flex align-items-center">
                                            <a class="me-2 p-2 d-flex align-items-center border rounded" href="#">
                                                <i data-feather="eye" class="feather-eye"></i>
                                            </a>
                                            <a class="me-2 p-2 d-flex align-items-center border rounded" href="#"
                                                data-bs-toggle="modal" data-bs-target="#edit-customer">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                class="p-2 d-flex align-items-center border rounded"
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
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="new-employee-field">
                                <div class="profile-pic-upload">
                                    <div class="profile-pic">
                                        <span><i data-feather="plus-circle" class="plus-down-add"></i> Add Image</span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="image-upload mb-0">
                                            <input type="file" name="image">
                                            <div class="image-uploads">
                                                <h4>Upload Image</h4>
                                            </div>
                                        </div>
                                        <p class="mt-2">JPEG, PNG up to 2 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">First Name<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="first_name">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Last Name<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Phone<span class="text-danger ms-1">*</span></label>
                                    <input type="tel" class="form-control" name="phone">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Address<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">City<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select select2" name="city">
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
                                    <select class="form-select">
                                        <option>Select</option>
                                        <option>California</option>
                                        <option>New York</option>
                                        <option>Texas</option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <div
                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                        <span class="status-label">Status</span>
                                        <input type="checkbox" id="user1" class="check" checked="">
                                        <label for="user1" class="checktoggle"> </label>
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
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="modal-body">
                                    <div class="new-employee-field">
                                        <div class="profile-pic-upload image-field">
                                            <div class="profile-pic p-2">
                                                <img src="assets/img/users/user-41.jpg"
                                                    class="object-fit-cover h-100 rounded-1" alt="user">
                                                <button type="button" class="close rounded-1">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">First Name: </label>
                                            {{-- <input type="text" class="form-control" value="Carl"> --}}
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Last Name: </label>
                                            {{-- <input type="text" class="form-control" value="Evans"> --}}
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Email: </label>
                                            {{-- <input type="email" class="form-control" value="carlevans@example.com"> --}}
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Phone: </label>
                                            {{-- <input type="tel" class="form-control" value="+12163547758 "> --}}
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Address: </label>
                                            {{-- <input type="text" class="form-control" value="87 Griffin Street"> --}}
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">City: </label>
                                            {{-- <select class="select">
                                                <option>Select</option>
                                                <option selected>Los Angles</option>
                                                <option>New York City</option>
                                                <option>Houston</option>
                                            </select> --}}
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Province: </label>
                                            {{-- <select class="select">
                                                <option>Select</option>
                                                <option selected>California</option>
                                                <option>New York</option>
                                                <option>Texas</option>
                                            </select> --}}
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




        <!-- Edit Customer -->
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
                            <form action="https://dreamspos.dreamstechnologies.com/html/template/customers.html">
                                <div class="modal-body">
                                    <div class="new-employee-field">
                                        <div class="profile-pic-upload image-field">
                                            <div class="profile-pic p-2">
                                                <img src="assets/img/users/user-41.jpg"
                                                    class="object-fit-cover h-100 rounded-1" alt="user">
                                                <button type="button" class="close rounded-1">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="mb-3">
                                                <div class="image-upload mb-0">
                                                    <input type="file">
                                                    <div class="image-uploads">
                                                        <h4>Change Image</h4>
                                                    </div>
                                                </div>
                                                <p class="mt-2">JPEG, PNG up to 2 MB</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">First Name<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control" value="Carl">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Last Name<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control" value="Evans">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                            <input type="email" class="form-control" value="carlevans@example.com">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Phone<span class="text-danger ms-1">*</span></label>
                                            <input type="tel" class="form-control" value="+12163547758 ">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Address<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control" value="87 Griffin Street">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">City<span class="text-danger ms-1">*</span></label>
                                            <select class="form-select">
                                                <option>Select</option>
                                                <option selected>Los Angles</option>
                                                <option>New York City</option>
                                                <option>Houston</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Province<span
                                                    class="text-danger ms-1">*</span></label>
                                            <select class="form-select">
                                                <option>Select</option>
                                                <option selected>California</option>
                                                <option>New York</option>
                                                <option>Texas</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-12">
                                            <div
                                                class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                <span class="status-label">Status</span>
                                                <input type="checkbox" id="user2" class="check" checked="">
                                                <label for="user2" class="checktoggle"> </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Customer -->

        <!-- delete modal -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="page-wrapper-new p-0">
                        <div class="content p-5 px-3 text-center">
                            <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i
                                    class="ti ti-trash fs-24 text-danger"></i></span>
                            <h4 class="fs-20 fw-bold mb-2 mt-1">Delete Customer</h4>
                            <p class="mb-0 fs-16">Are you sure you want to delete customer?</p>
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
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select a city",
                    allowClear: true,
                    width: '100%'
                });
            });
        </script>
    @endpush
</x-app-layout>
