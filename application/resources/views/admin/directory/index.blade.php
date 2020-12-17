@extends('layouts.admin_layout')
@section('contents')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="row" style="margin-top: 1%;">
    <div class="col-12">
    	@include('sweetalert::alert')
        <div class="card-box">
        	<div class="row">
        		<div class="col-10">
		            <h4 class="header-title text-center">{{$title}}</h4>
		        </div>
		        <div class="col-2">
		            <a href="#create-modal" class="btn btn-primary waves-effect waves-light" data-animation="door" data-plugin="custommodal"data-overlaySpeed="100" data-overlayColor="#36404a" style="color: white;float: right;"><i class="fas fa-plus"></i> Create</a>
		        </div>
	        </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
	                <tr>
	                    <th>SL</th>
	                    <th>Image</th>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Phone</th>
	                    <th>Note</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($get_directory as $directory)
                	<tr id="directory{{$directory->id}}">
	                    <td>{{$loop->index+1}}</td>
	                    <td><img src="{{asset($directory->image)}}" style="height:50px;"></td>
	                    <td>{{$directory->name}}</td>
	                    <td>{{$directory->email}}</td>
	                    <td>{{$directory->phone}}</td>
	                    <td>{{$directory->note}}</td>
	                    @if($directory->status == 1)
	                    <td style="background-color: green;color: white;" id="status{{$directory->id}}">Active</td>
	                    @else
	                    <td style="background-color: tomato;color: white;" id="status{{$directory->id}}">Pending</td>
	                    @endif
	                    <td style="width: 200px;">
						  	<a href="#edit-modal{{$directory->id}}" type="button" class="btn btn-info waves-effect waves-light" data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
						  		<i class="far fa-edit"></i>
						  	</a>
	                        <a href="#" class="material-switch">
	                        	@if($directory->status == 1)
	                            <input id="postApprove{{$directory->id}}" name="action" type="checkbox" onclick="actionPost({{$directory->id}})" checked=""/>
	                            <label for="postApprove{{$directory->id}}" class="label-danger" ></label>
	                            @else
	                            <input id="postApprove{{$directory->id}}" name="action" type="checkbox" onclick="actionPost({{$directory->id}})"/>
	                            <label for="postApprove{{$directory->id}}" class="label-danger" ></label>
	                            @endif
	                        </a>
						  	<a href="javascript:void(0);" type="button" class="btn btn-icon btn-danger btn_delete" attr="{{$directory->id}}">
						  		<i class="far fa-trash-alt"></i>
						  	</a>
						</td>
	                </tr>
                	@endforeach
                </tbody>
            </table>
        </div>


        <!-- Modal -->
        <div id="create-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Create {{$title}}</h4>
            <div class="text-muted">
                <form method="POST" action="{{ route('saveDirectory') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-6">
									<label>Devision</label>
									<select class="form-control" name="division_id" required="" id="division_id">
										<option value="">Select Division</option>
										@foreach($get_divission as $divission)
										<option value="{{$divission->id}}">{{$divission->division_name}}</option>
										@endforeach
									</select>
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
										<select class="form-control" name="service_id" required="" id="service_id">
											<option value="">Select Service</option>
										</select>
									</div>
								</div>
								<div class="col-6">
									<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Name"  required="" />
								</div>
								<div class="col-6">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email" />
								</div>
								<div class="col-6">
									<label>Phone</label>
									<input type="text" name="phone" class="form-control" placeholder="Phone" />
								</div>
								<div class="col-12">
									<label>Image</label>
									<input type="file" name="image" class="form-control" />
								</div>
								<div class="col-12">
									<label>Doc Note</label>
									<textarea class="form-control" name="note" placeholder="Doc Note"></textarea>
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
        @foreach($get_directory as $key)
        <div id="edit-modal{{$key->id}}" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Update {{$key->name}}</h4>
            <div class="text-muted">
                <form method="POST" action="{{ route('updateDirectory') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-6">
									<label>Devision</label>
									<select class="form-control" name="division_id" required="" id="division_id{{$key->id}}">
										<option value="{{$key->devision_id}}">{{$key->division_name}}</option>
										@foreach($get_divission as $divission)
										<option value="{{$divission->id}}">{{$divission->division_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>City (required)</label>
										<select class="form-control" name="city_id" required="" id="city_id{{$key->id}}">
											<option value="{{$key->city_id}}">{{$key->city_name}}</option>
										</select>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Service Name (required)</label>
										<select class="form-control" name="service_id" required="" id="service_id{{$key->id}}">
											<option value="{{$key->service_id}}">{{$key->service_name}}</option>
										</select>
									</div>
								</div>
								<div class="col-6">
									<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Name"  required="" value="{{$key->name}}" />
									<input type="hidden" name="id" class="form-control" placeholder="Name"  required="" value="{{$key->id}}" />
								</div>
								<div class="col-6">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="email" value="{{$key->email}}" />
								</div>
								<div class="col-6">
									<label>Phone</label>
									<input type="text" name="phone" class="form-control" placeholder="email" value="{{$key->phone}}" />
								</div>
								<div class="col-12">
									<label>Image</label>
									<input type="file" name="image" class="form-control" />
									<img src="{{asset($key->image)}}" style="width: 40px;">
								</div>
								<div class="col-12">
									<label>Doc Note</label>
									<textarea class="form-control" name="note" placeholder="Doc Note">{{$key->note}}</textarea>
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
        <script>
        	$('#division_id{{$key->id}}').change(function(){
				var division_id = $('#division_id{{$key->id}} :selected').val();
				$.ajax({
					url: "{{ url('/admin/city/data/') }}"+'/'+division_id,
					success:function(result){
						console.log(result);
						$('#city_id{{$key->id}}').empty();
						$('#city_id{{$key->id}}').append('<option value="">Select City</option>');
						for(var i=0; i<result.length; i++){
							$('#city_id{{$key->id}}').append('<option value='+result[i].id+'>'+result[i].city_name+'</option>');
						}
					}
				});
			})
			$('#city_id{{$key->id}}').change(function(){
				var city_id = $('#city_id{{$key->id}} :selected').val();

				$.ajax({
					url: "{{ url('/admin/service/data/') }}"+'/'+city_id,
					success:function(result){
						console.log(result);
						$('#service_id{{$key->id}}').empty();
						$('#service_id{{$key->id}}').append('<option value="">Select Service</option>');
						for(var i=0; i<result.length; i++){
							$('#service_id{{$key->id}}').append('<option value='+result[i].id+'>'+result[i].service_name+'</option>');
						}
					}
				});
			})
        </script>
        @endforeach
    </div>
</div>

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
		  	$('#directory'+id).hide();
			$.ajax({
				url: "{{ url('/admin/blog/directory/member/delete/') }}"+'/'+id,
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
	            url: "{{ url('actionDirectoryMember') }}"+'/'+id+'/'+1,
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
	            url: "{{ url('actionDirectoryMember') }}"+'/'+id+'/'+0,
	            method: 'get',

	            success: function(result){
	            	console.log(result);
	            }
        	});
		}
	}
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
	$('#city_id').change(function(){
		var city_id = $('#city_id :selected').val();

		$.ajax({
			url: "{{ url('/admin/service/data/') }}"+'/'+city_id,
			success:function(result){
				console.log(result);
				$('#service_id').empty();
				$('#service_id').append('<option value="">Select Service</option>');
				for(var i=0; i<result.length; i++){
					$('#service_id').append('<option value='+result[i].id+'>'+result[i].service_name+'</option>');
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