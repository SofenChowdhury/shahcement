@extends('layouts.admin_layout')
@section('contents')
@php
	$get_emails    = explode(',',$get_setup->email);
	$get_phones    = explode(',',$get_setup->phone);
@endphp
<div class="row" style="margin-top: 1%;">
    <div class="col-12">
    	@include('sweetalert::alert')
        <div class="card-box" style="margin-left:25%;width: 50%;">
        	<div class="row" style="border-bottom: 1px dotted lightgray;margin-bottom: 10px;">
        		<div class="col-9">
		            <h4 class="header-title text-center">{{$title}}</h4>
		        </div>
		        <div class="col-3" style="margin-top: -5px;margin-bottom: 5px;">
		        	@if($get_setup) 
		            <a href="#create-modal" class="btn btn-primary waves-effect waves-light" data-animation="door" data-plugin="custommodal"data-overlaySpeed="100" data-overlayColor="#36404a" style="color: white;float: right;">
		            	<i class="fas fa-edit"></i> Update
		            </a>
		            @else
		            <a href="#create-modal" class="btn btn-primary waves-effect waves-light" data-animation="door" data-plugin="custommodal"data-overlaySpeed="100" data-overlayColor="#36404a" style="color: white;float: right;">
		            	<i class="fas fa-plus"></i> Create
		            </a>
		            @endif	
		        </div>
	        </div>
	        @if($get_setup)
	        <div class="row" style="background-image:url({{asset($get_setup->bg_image)}});background-position: center;background-size: cover;margin-top: 5px;">
	        	<div class="col-12" style="background-color: #ffffffed;">
		            <div class="row">
		            	<div class="col-6">
		            		<label>Logo : </label>
		            		<center>
		            			<img src="{{asset($get_setup->logo)}}" style="width: 100px;" />
		            		</center>
		            	</div>
		            	<div class="col-6">
		            		<label>Page Loader : </label>
		            		<center>
		            			<img src="{{asset($get_setup->pg_loder)}}" style="width: 100px;" />
		            		</center>
		            	</div>
		            </div>
		            <div class="row" style="margin-top: 30px;">
		            	<div class="col-6">
		            		<p>Site Name : {{$get_setup->site_name}}</p>
		            	</div>
		            	<div class="col-6">
		            		<address>Address : {{$get_setup->address}}</address>
		            	</div>
		            	<div class="col-6">
		            		<label>Emails : </label>
		            		@foreach($get_emails as $email)
		            		<p style="padding-left: 10px;"><i class="fa fa-arrow-right"></i> {{$email}}</p>
		            		@endforeach
		            	</div>
		            	<div class="col-6">
		            		<label>Phones : </label>
		            		@foreach($get_phones as $phone)
		            		<p style="padding-left: 10px;"><i class="fa fa-arrow-right"></i> {{$phone}}</p>
		            		@endforeach
		            	</div>
		            </div>
			    </div>
	        </div>
	        @endif
        </div>

        <!-- Modal -->
        <div id="create-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Create {{$title}}</h4>
            <div class="text-muted">
                <form method="POST" action="{{ route('updateSettingForums') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							@if($get_setup)
								<div class="row gutters">
									<div class="col-4">
										<label>Background-image</label>
										<input type="file" name="bg_image" class="form-control" onchange="document.getElementById('bg_image').src = window.URL.createObjectURL(this.files[0])" />
										<img src="{{asset($get_setup->bg_image)}}" style="width: 50%;" id="bg_image">
									</div>
									<div class="col-4">
										<label>Logo</label>
										<input type="file" name="logo" class="form-control" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])" />
										<img src="{{asset($get_setup->logo)}}" style="width: 50%;" id="logo">
									</div>
									<div class="col-4">
										<label>Page Loder</label>
										<input type="file" name="pg_loder" class="form-control" onchange="document.getElementById('pg_loder').src = window.URL.createObjectURL(this.files[0])"/>
										<img src="{{asset($get_setup->pg_loder)}}" style="width: 50%;" id="pg_loder">
									</div>
								</div>
								<div class="row gutters" style="padding-top: 10px;">
									<div class="col-12" style="text-align: center;border-bottom: 1px dotted lightgray;"><h5> Site Details </h5></div>
									<div class="col-6">
										<label>Site Name</label>
										<input type="text" name="site_name" class="form-control" placeholder="Site Name" value="{{$get_setup->site_name}}" />
										<input type="hidden" name="id" class="form-control" placeholder="Site Name" value="{{$get_setup->id}}" />
									</div>
									<div class="col-6">
										<label>Address</label>
										<textarea class="form-control" name="address" placeholder="Site Address">{{$get_setup->address}}</textarea>
									</div>
									<div class="col-6">
										<label>Email <i class="btn-danger fa fa-plus" style="padding:2px;cursor: pointer;" onclick="addEmail()"></i> </label>
										
										@if($get_emails)
										@foreach($get_emails as $emails)
										<input type="email" name="email[]" class="form-control" placeholder="Site email" value="{{$emails}}" />
										@endforeach
										@else
										<input type="email" name="email[]" class="form-control" placeholder="Site email" />
										@endif
										<div id="append_email">
											
										</div>
									</div>
									<div class="col-6">
										<label>Phone <i class="btn-danger fa fa-plus" style="padding:2px;cursor: pointer;" onclick="addPhone()"></i> </label>
										
										@if($get_phones)
										@foreach($get_phones as $phones)
										<input type="text" name="phone[]" class="form-control" placeholder="Site phone" value="{{$phones}}" />
										@endforeach
										@else
										<input type="text" name="phone[]" class="form-control" placeholder="Site Phone" />
										@endif
										<div id="append_phone">
											
										</div>
									</div>
								</div>
							@else
								<div class="row gutters">
									<div class="col-4">
										<label>Background-image</label>
										<input type="file" name="bg_image" class="form-control" onchange="document.getElementById('bg_image').src = window.URL.createObjectURL(this.files[0])" />
									</div>
									<div class="col-4">
										<label>Logo</label>
										<input type="file" name="logo" class="form-control" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])" />
									</div>
									<div class="col-4">
										<label>Page Loder</label>
										<input type="file" name="pg_loder" class="form-control" onchange="document.getElementById('pg_loder').src = window.URL.createObjectURL(this.files[0])"/>
									</div>
								</div>
								<div class="row gutters" style="padding-top: 10px;">
									<div class="col-12" style="text-align: center;border-bottom: 1px dotted lightgray;"><h5> Site Details </h5></div>
									<div class="col-6">
										<label>Site Name</label>
										<input type="text" name="site_name" class="form-control" placeholder="Site Name" />
									</div>
									<div class="col-6">
										<label>Address</label>
										<textarea class="form-control" name="address" placeholder="Site Address"></textarea>
									</div>
									<div class="col-6">
										<label>Email <i class="btn-danger fa fa-plus" style="padding:2px;cursor: pointer;" onclick="addEmail()"></i> </label>
										<input type="email" name="email[]" class="form-control" placeholder="Site email" />

										<div id="append_email">
											
										</div>
									</div>
									<div class="col-6">
										<label>Phone <i class="btn-danger fa fa-plus" style="padding:2px;cursor: pointer;" onclick="addPhone()"></i> </label>
										
										<input type="text" name="phone[]" class="form-control" placeholder="Site Phone" />
										<div id="append_phone">
											
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	function addEmail(){
		$('#append_email').append('<input type="email" name="email[]" class="form-control" placeholder="Site email" />');
	}
	function addPhone(){
		$('#append_phone').append('<input type="text" name="phone[]" class="form-control" placeholder="Site Phone" />');
	}
	$(document).on('click', '.btn_delete',function(event){
		event.preventDefault();
		var id = $(this).attr("attr");
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		  	$('#user'+id).hide();
			$.ajax({
				url: "{{ url('/admin/blog/forum/delete/') }}"+'/'+id,
				success:function(result){
					Swal.fire(
				      'Deleted!',
				      'Your Image has been deleted.',
				      'success'
				    )
				}
			});
		    
		  }
		})
	});
</script>
<script>
	function actionPost(id){

		if ($('#postApprove'+id).prop('checked') == true) {
			$('#status'+id).css('background-color','green');
			$('#status'+id).empty();
			$('#status'+id).text('Accepted');

			$.ajax({
	            url: "{{ url('actionForums') }}"+'/'+id+'/'+1,
	            method: 'get',

	            success: function(result){
	            		console.log(result);
	            }
        	});
		}else{
			$('#status'+id).css('background-color','tomato');
			$('#status'+id).empty();
			$('#status'+id).text('Pending');
			$.ajax({
	            url: "{{ url('actionForums') }}"+'/'+id+'/'+0,
	            method: 'get',

	            success: function(result){
	            		console.log(result);
	            }
        	});

		}
		
	}
</script>
@stop
@section('css')
<style>
	#datatable-buttons_filter{
		float: right !important;
	}
	.material-switch > input[type="checkbox"] {
	    display: none;   
	}

	.material-switch > label {
	    cursor: pointer;
	    height: 0px;
	    position: relative; 
	    width: 40px;  
	}

	.material-switch > label::before {
	    background: rgb(255 99 71);
	    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
	    border-radius: 8px;
	    content: '';
	    height: 16px;
	    margin-top: -8px;
	    position:absolute;
	    opacity: 0.3;
	    transition: all 0.4s ease-in-out;
	    width: 40px;
	}
	.material-switch > label::after {
	    background: rgb(255 99 71);
	    border-radius: 16px;
	    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
	    content: '';
	    height: 24px;
	    left: -4px;
	    margin-top: -8px;
	    position: absolute;
	    top: -4px;
	    transition: all 0.3s ease-in-out;
	    width: 24px;
	}
	.material-switch > input[type="checkbox"]:checked + label::before {
	    background: green;
	    opacity: 0.5;
	}
	.material-switch > input[type="checkbox"]:checked + label::after {
	    background: green;
	    left: 20px;
	}
</style>

@stop
@section('js')
<!-- Datatable plugin js -->
<script src="{{asset('assets/admin/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/datatables/buttons.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/admin/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/pdfmake/vfs_fonts.js')}}"></script>

<script src="{{asset('assets/admin/libs/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/datatables/buttons.print.min.js')}}"></script>

<!-- Datatables init -->
<script src="{{asset('assets/admin/js/pages/datatables.init.js')}}"></script>
@stop