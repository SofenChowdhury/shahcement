@extends('layouts.admin_layout')
@section('contents')
<div class="row" style="margin-top: 1%;">
    <div class="col-12">
    	@include('sweetalert::alert')
        <div class="card-box">
        	<div class="row" style="margin-bottom: 10px;">
        		<div class="col-6">
		            <h4 class="header-title text-center">{{$title}}</h4>
		        </div>
		        <div class="col-2">
		            <a href="#create-division" class="btn btn-primary btn-block waves-effect waves-light" data-animation="door" data-plugin="custommodal"data-overlaySpeed="100" data-overlayColor="#36404a" style="color: white;float: right;"><i class="fas fa-plus"></i> Create Division</a>
		        </div>
		        <div class="col-2">
		            <a href="#create-city" class="btn btn-info btn-block waves-effect waves-light" data-animation="door" data-plugin="custommodal"data-overlaySpeed="100" data-overlayColor="#36404a" style="color: white;float: right;"><i class="fas fa-plus"></i> Create City</a>
		        </div>
		        <div class="col-2">
		            <a href="#create-service" class="btn btn-warning btn-block waves-effect waves-light" data-animation="door" data-plugin="custommodal"data-overlaySpeed="100" data-overlayColor="#36404a" style="color: white;float: right;"><i class="fas fa-plus"></i> Create Service</a>
		        </div>
	        </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
	                <tr>
	                    <th>SL</th>
	                    <th>Division</th>
	                    <th>Cities/Services</th>
	                    <th>Note</th>
	                    <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	@php
                		use App\model\location\City;use App\model\location\Service;
                	@endphp
                	@foreach($get_divission as $divission)
                	@php
                		$get_cities = City::where('division_id',$divission->id)->get();
                	@endphp
                	<tr id="div{{$divission->id}}">
	                    <th>{{$loop->index+1}}</th>
	                    <th>{{$divission->division_name}}</th>
	                    <th>
	                    	<ul>
	                    		@foreach($get_cities as $cities)
		                    		@php
				                		$get_services = Service::where('city_id',$cities->id)
				                			->where('city_id',$cities->id)
				                			->get();
				                	@endphp
	                    		<li  id="city{{$cities->id}}">{{$cities->city_name}} 
	                    			<a href="javascript:void(0);" type="button" class="btn-icon btn-danger btn_delete_city" attr="{{$cities->id}}" style="padding: 3px 7px;border-radius: 50px;">
						  				<i class="far fa-trash-alt"></i>
						  			</a>
						  			<ul>
						  				@foreach($get_services as $services)
						  				<li id="service{{$services->id}}">
						  					{{$services->service_name}}
						  					<a href="javascript:void(0);" type="button" class="btn-icon btn-danger btn_delete_service" attr="{{$services->id}}" style="padding: 3px 7px;border-radius: 50px;">
								  				<i class="far fa-trash-alt"></i>
								  			</a>
						  				</li>
						  				@endforeach
						  			</ul>
						  		</li>
	                    		@endforeach
	                    	</ul>
	                    </th>
	                    <th>{{$divission->division_note}}</th>
	                    <th>
	                    	<a href="javascript:void(0);" type="button" class="btn btn-icon btn-danger btn_delete" attr="{{$divission->id}}">
						  		<i class="far fa-trash-alt"></i>
						  	</a>
						</th>
	                </tr>
	                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div id="create-division" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Create {{$title}}</h4>
            <div class="text-muted">
                <form method="POST" action="{{ route('saveDivision') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Name (required)</label>
										<input type="text" class="form-control" name="division_name" placeholder="Division Name" required="">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Note (Optional)</label>
										<textarea class="form-control" name="note" placeholder="Note (Optional) ..."></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
            </div>
        </div>
        <div id="create-city" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Create {{$title}}</h4>
            <div class="text-muted">
                <form method="POST" action="{{ route('saveCity') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Division (required)</label>
										<select class="form-control" name="division_id" required="">
											<option value="">Select Division</option>
											@foreach($get_divission as $divission)
											<option value="{{$divission->id}}">{{$divission->division_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>City Name (required)</label>
										<input type="text" class="form-control" name="city_name" placeholder="City Name" required="">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<label>Note (Optional)</label>
										<textarea class="form-control" name="note" placeholder="Note (Optional) ..."></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
            </div>
        </div>
        <div id="create-service" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Create {{$title}}</h4>
            <div class="text-muted">
                <form method="POST" action="{{ route('saveService') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Division (required)</label>
										<select class="form-control" name="division_id" required="" id="division_id">
											<option value="">Select Division</option>
											@foreach($get_divission as $divission)
											<option value="{{$divission->id}}">{{$divission->division_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>City (required)</label>
										<select class="form-control" name="city_id" required="" id="city_id">
											<option value="">Select City</option>
										</select>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Service Name (required)</label>
										<input type="text" class="form-control" name="service_name" placeholder="Service Name" required="">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Note (Optional)</label>
										<textarea class="form-control" name="note" placeholder="Note (Optional) ..."></textarea>
									</div>
								</div>
							</div>
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
		  	$('#div'+id).hide();
			$.ajax({
				url: "{{ url('/admin/location/division/delete/') }}"+'/'+id,
				success:function(result){
					Swal.fire(
				      'Deleted!',
				      'Your Divission has been deleted.',
				      'success'
				    )
				}
			});
		    
		  }
		})
	});
	$(document).on('click', '.btn_delete_city',function(event){
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
		  	$('#city'+id).hide();
			$.ajax({
				url: "{{ url('/admin/location/city/delete/') }}"+'/'+id,
				success:function(result){
					Swal.fire(
				      'Deleted!',
				      'Your City & Service has been deleted.',
				      'success'
				    )
				}
			});
		    
		  }
		})
	});
	$(document).on('click', '.btn_delete_service',function(event){
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
		  	$('#service'+id).hide();
			$.ajax({
				url: "{{ url('/admin/location/city/service/delete/') }}"+'/'+id,
				success:function(result){
					Swal.fire(
				      'Deleted!',
				      'Your Service has been deleted.',
				      'success'
				    )
				}
			});
		    
		  }
		})
	});
</script>
<script>
	$('#division_id').change(function(){
		var division_id = $('#division_id :selected').val();
		$.ajax({
			url: "{{ url('/admin/city/data/') }}"+'/'+division_id,
			success:function(result){
				console.log(result);
				$('#city_id').empty();
				$('#city_id').append('<option value="">Select City</option>');
				for(var i=0; i<result.length; i++){
					$('#city_id').append('<option value='+result[i].id+'>'+result[i].city_name+'</option>');
				}
			}
		});
	})
</script>
@stop
@section('css')
<style>
	#datatable-buttons_filter{
		float: right !important;
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