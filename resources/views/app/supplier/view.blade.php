<x-app-layout>
    @section('title', 'Dashboard')

    @push('css')

        <style>
/* sds */
        </style>
    @endpush

    @section('content')

    <div class="content">
					<div class="page-header">
						<div class="add-item d-flex">
							<div class="page-title">
								<h4>Suppliers</h4>
								<h6>Manage your suppliers</h6>
							</div>
						</div>
						<ul class="table-top-head">							
							<li class="me-2">
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
							</li>
							<li class="me-2">
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
							</li>
							<li class="me-2">
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
							</li>
							<li class="me-2">
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
							</li>
						</ul>
						<div class="page-btn">
							<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-supplier"><i class="ti ti-circle-plus me-1"></i>Add Supplier</a>
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
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
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
											<th>Supplier</th>
											<th>Email</th>
											<th>Phone</th>
											{{-- <th>Country</th> --}}
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
											<td>SU001</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="#" class="avatar avatar-md"><img src="assets/img/supplier/supplier-01.png" class="img-fluid rounded-2" alt="img"></a>
													<div class="ms-2">
														<p class="text-gray-9 mb-0"><a href="#">Apex Computers</a></p>
													</div>
												</div>
											</td>
											<td>
												<a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9ffeeffae7fcf0f2efeaebfaedecdffae7fef2eff3fab1fcf0f2">[email&#160;protected]</a>						
											</td>
											<td>+15964712634</td>
											
											<td>
												<span class="badge badge-success d-inline-flex align-items-center badge-xs">
													<i class="ti ti-point-filled me-1"></i>Active
												</span>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 p-2" href="#" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view-supplier">
														<i data-feather="eye" class="feather-eye"></i>
													</a>
													<a class="me-2 p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit-supplier">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete-modal">
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
											<td>SU001</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="#" class="avatar avatar-md"><img src="assets/img/supplier/supplier-01.png" class="img-fluid rounded-2" alt="img"></a>
													<div class="ms-2">
														<p class="text-gray-9 mb-0"><a href="#">Apex Computers</a></p>
													</div>
												</div>
											</td>
											<td>
												<a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9ffeeffae7fcf0f2efeaebfaedecdffae7fef2eff3fab1fcf0f2">[email&#160;protected]</a>						
											</td>
											<td>+15964712634</td>
											
											<td>
												<span class="badge badge-success d-inline-flex align-items-center badge-xs">
													<i class="ti ti-point-filled me-1"></i>Active
												</span>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 p-2" href="#" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view-supplier">
														<i data-feather="eye" class="feather-eye"></i>
													</a>
													<a class="me-2 p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit-supplier">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete-modal">
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

<!-- Add Supplier -->
		<div class="modal fade" id="add-supplier">
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
					<form action="https://dreamspos.dreamstechnologies.com/html/template/suppliers.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="new-employee-field">
										<div class="profile-pic-upload mb-2">
											<div class="profile-pic">
												<span><i data-feather="plus-circle" class="plus-down-add"></i>Add Image</span>
											</div>
											<div class="mb-0">
												<div class="image-upload mb-2">
													<input type="file">
													<div class="image-uploads">
														<h4>Upload Image</h4>
													</div>
												</div>
												<p>JPEG, PNG up to 2 MB</p>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Company Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required>
									</div>
								</div>	
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Email <span class="text-danger">*</span></label>
										<input type="email" class="form-control" required>
									</div>
								</div>								
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Phone <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required>
									</div>
								</div>									
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Address <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
                                <div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Bank Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required>
									</div>
								</div>
                                <div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Bank Acc No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="mb-0">
										<div class="status-toggle modal-status d-flex justify-content-between align-items-center">
											<span class="status-label">Status</span>
											<input type="checkbox" id="users5" class="check" checked>
											<label for="users5" class="checktoggle mb-0"></label>
										</div>
									</div>	
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Add Supplier</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Supplier -->

        {{-- View Supplier --}}

        <div class="modal fade" id="view-supplier">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="content">
						<div class="modal-header">
							<div class="page-title">
								<h4>View Supplier</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="https://dreamspos.dreamstechnologies.com/html/template/suppliers.html">
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="new-employee-field">
											<div class="profile-pic-upload edit-pic">
												<div class="profile-pic">
													<span><img src="assets/img/supplier/edit-supplier.jpg" alt="Img"></span>
													<div class="close-img">
														<i data-feather="x" class="info-img"></i>
													</div>
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Company Name: <b class="text-black-50"> &nbsp; Shaliny</b> </label>
                                            
										</div>
									</div>
									<div class="col-lg-12">
										<div class="mb-3">
											<label class="form-label">Email:  <b class="text-black-50"> &nbsp; Shaliny@gmail.com</b> </label>
										</div>
									</div>								
									<div class="col-lg-12">
										<div class="mb-3">
											<label class="form-label">Phone:  <b class="text-black-50"> &nbsp; 0754105429</b> </label>
										</div>
									</div>									
									<div class="col-lg-12">
										<div class="mb-3">
											<label class="form-label">Address: <b class="text-black-50"> &nbsp; batticaloa</b> </label>
										</div>
									</div>
                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label ">Bank Name:  <b class="text-black-50"> &nbsp; BOC</b> </label>
										</div>
									</div>
                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Bank Acc No:  <b class="text-black-50"> &nbsp; 007845263</b> </label>
											
										</div>
									</div>
								
									<div class="col-md-12">
										<div class="mb-0">
											<div class="status-toggle modal-status d-flex justify-content-between align-items-center">
												<span class="status-label">Status</span>
												<input type="checkbox" id="users6" class="check" checked>
												<label for="users6" class="checktoggle mb-0"></label>
											</div>
										</div>	
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
		</div>

        {{-- /View Supplier --}}

		<!-- Edit Supplier -->
		<div class="modal fade" id="edit-supplier">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="content">
						<div class="modal-header">
							<div class="page-title">
								<h4>Edit Supplier</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="https://dreamspos.dreamstechnologies.com/html/template/suppliers.html">
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="new-employee-field">
											<div class="profile-pic-upload edit-pic">
												<div class="profile-pic">
													<span><img src="assets/img/supplier/edit-supplier.jpg" alt="Img"></span>
													<div class="close-img">
														<i data-feather="x" class="info-img"></i>
													</div>
												</div>
												<div class="mb-0">
													<div class="image-upload mb-0">
														<input type="file">
														<div class="image-uploads">
															<h4>Change Image</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-lg-12">
										<div class="mb-3">
											<label class="form-label">Company Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" value="Company Name" required>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="mb-3">
											<label class="form-label">Email <span class="text-danger">*</span></label>
											<input type="email" class="form-control" value="carlevans@example.com" required>
										</div>
									</div>								
									<div class="col-lg-12">
										<div class="mb-3">
											<label class="form-label">Phone <span class="text-danger">*</span></label>
											<input type="text" class="form-control" value="+15964712634" required>
										</div>
									</div>									
									<div class="col-lg-12">
										<div class="mb-3">
											<label class="form-label">Address <span class="text-danger">*</span></label>
											<input type="text" class="form-control" value="46 Perry Street">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Bank Name <span class="text-danger">*</span></label>
										    <input type="text" class="form-control" value="BOC">

										</div>
									</div>

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Bank Acc No <span class="text-danger">*</span></label>
											<input type="text" class="form-control" value="00012562">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="mb-0">
											<div class="status-toggle modal-status d-flex justify-content-between align-items-center">
												<span class="status-label">Status</span>
												<input type="checkbox" id="users6" class="check" checked>
												<label for="users6" class="checktoggle mb-0"></label>
											</div>
										</div>	
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
		</div>
		<!-- /Edit Supplier -->
		  
		<!-- Delete Modal -->
		<div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-5">
                    <div class="modal-body text-center p-0">
						<span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i class="ti ti-trash fs-24 text-danger"></i></span>
						<h4 class="fs-20 text-gray-9 fw-bold mb-2 mt-1">Delete Supplier</h4>
						<p class="text-gray-6 mb-0 fs-16">Are you sure you want to delete supplier?</p>	
						<div class="d-flex justify-content-center mt-3">
							<a class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none" data-bs-dismiss="modal">Cancel</a>
							<a href="suppliers.html" class="btn btn-primary fs-13 fw-medium p-2 px-3">Yes Delete</a>
						</div>											
					</div>					
                </div>
            </div>
        </div>
		<!-- /Delete Modal -->
		 


    @endsection



    @push('js')

          <!-- Select2 JS -->
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap Tagsinput JS -->
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>



    @endpush
</x-app-layout>
