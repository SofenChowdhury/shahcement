@extends('layouts.admin_layout')
@section('contents')
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
	                    <th>Date</th>
	                    <th>Title</th>
	                    <th>Image</th>
	                    <th>Status</th>
	                    <th>Video</th>
	                    <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($get_gallery as $video)
                	<tr id="video{{$video->id}}">
	                    <td>{{$loop->index+1}}</td>
	                    <td>{{$video->updated_at}}</td>
	                    <td>{{$video->title}}</td>
	                    <td><img src="{{asset($video->video_image)}}" style="height: 50px;"></td>
	                    @if($video->status == 1)
	                    <td style="background-color: green;color: white;" id="status{{$video->id}}">Active</td>
	                    @else
	                    <td style="background-color: tomato;color: white;" id="status{{$video->id}}">Pending</td>
	                    @endif
	                    <td>
	                    	<embed
							    src="{{$video->video_link}}"
							    wmode="transparent"
							    type="video/mp4"
							    width="100%" height="100%"
							    allow="autoplay; encrypted-media; picture-in-picture"
							    allowfullscreen
							    title="Keyboard Cat"
							  >
	                    </td>
	                    <td style="width: 200px;">
						  	<a href="#edit-modal{{$video->id}}" type="button" class="btn btn-info waves-effect waves-light" data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
						  		<i class="far fa-edit"></i>
						  	</a>
	                        <a href="#" class="material-switch">
	                        	@if($video->status == 1)
	                            <input id="postApprove{{$video->id}}" name="action" type="checkbox" onclick="actionPost({{$video->id}})" checked=""/>
	                            <label for="postApprove{{$video->id}}" class="label-danger" ></label>
	                            @else
	                            <input id="postApprove{{$video->id}}" name="action" type="checkbox" onclick="actionPost({{$video->id}})"/>
	                            <label for="postApprove{{$video->id}}" class="label-danger" ></label>
	                            @endif
	                        </a>
						  	<a href="javascript:void(0);" type="button" class="btn btn-icon btn-danger btn_delete" attr="{{$video->id}}">
						  		<i class="far fa-trash-alt"></i>
						  	</a>
						</td>
	                </tr>

	                <div id="edit-modal{{$video->id}}" class="modal-demo">
			            <button type="button" class="close" onclick="Custombox.modal.close();">
			                <span>&times;</span><span class="sr-only">Close</span>
			            </button>
			            <h4 class="custom-modal-title">Edit {{$title}}</h4>
			            <div class="text-muted">
			                <form method="POST" action="{{ route('updateVideo') }}" enctype="multipart/form-data">
					            @csrf()
								<div class="card m-0">
									<div class="card-body">
										<div class="row gutters">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label>Title (required)</label>
													<input type="text" class="form-control" name="title" placeholder="Video Title" required="" value="{{$video->title}}">
													<input type="hidden" class="form-control" name="id" placeholder="Video Title" required="" value="{{$video->id}}">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<label>Image</label>
													<input type="file" class="form-control" name="video_image">
													<img src="{{asset($video->video_image)}}" style="width: 50px;">
												</div>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<label>Video link</label>
													<input type="text" class="form-control" name="video_link" placeholder="Video Link" required="" value="{{$video->video_link}}">
												</div>
												<embed
												    src="{{$video->video_link}}"
												    wmode="transparent"
												    type="video/mp4"
												    width="50%" height="50%"
												    allow="autoplay; encrypted-media; picture-in-picture"
												    allowfullscreen
												    title="Keyboard Cat"
												  >
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
                <form method="POST" action="{{ route('saveVideo') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Title (required)</label>
										<input type="text" class="form-control" name="title" placeholder="Video Title" required="">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Image</label>
										<input type="file" class="form-control" name="video_image">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<label>Video link</label>
										<input type="text" class="form-control" name="video_link" placeholder="Video Link" required="">
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
		  	$('#video'+id).hide();
			$.ajax({
				url: "{{ url('/admin/blog/video/delete/') }}"+'/'+id,
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
	            url: "{{ url('actionVideo') }}"+'/'+id+'/'+1,
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
	            url: "{{ url('actionVideo') }}"+'/'+id+'/'+0,
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