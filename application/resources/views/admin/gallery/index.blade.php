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
	                    <th>Note</th>
	                    <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($get_gallery as $gallery)
                	<tr id="gallery{{$gallery->id}}">
	                    <td>{{$loop->index+1}}</td>
	                    <td>{{$gallery->updated_at}}</td>
	                    <td>{{$gallery->title}}</td>
	                    <td><img src="{{asset($gallery->image)}}" style="height: 50px;"></td>
	                    @if($gallery->status == 1)
	                    <td style="background-color: green;color: white;" id="status{{$gallery->id}}">Active</td>
	                    @else
	                    <td style="background-color: tomato;color: white;" id="status{{$gallery->id}}">Pending</td>
	                    @endif
	                    <td>{{$gallery->note}}</td>
	                    <td style="width: 200px;">
						  	{{-- <a href="#edit-modal{{$gallery->id}}" type="button" class="btn btn-info waves-effect waves-light" data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
						  		<i class="far fa-edit"></i>
						  	</a> --}}
	                        <a href="#" class="material-switch">
	                        	@if($gallery->status == 1)
	                            <input id="postApprove{{$gallery->id}}" name="action" type="checkbox" onclick="actionPost({{$gallery->id}})" checked=""/>
	                            <label for="postApprove{{$gallery->id}}" class="label-danger" ></label>
	                            @else
	                            <input id="postApprove{{$gallery->id}}" name="action" type="checkbox" onclick="actionPost({{$gallery->id}})"/>
	                            <label for="postApprove{{$gallery->id}}" class="label-danger" ></label>
	                            @endif
	                        </a>
						  	<a href="javascript:void(0);" type="button" class="btn btn-icon btn-danger btn_delete" attr="{{$gallery->id}}">
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
                <form method="POST" action="{{ route('saveGallery') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Title (required)</label>
										<input type="text" class="form-control" name="title" placeholder="Image Title" required="">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Image</label>
										<input type="file" class="form-control" name="image">
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
		  	$('#gallery'+id).hide();
			$.ajax({
				url: "{{ url('/admin/blog/gallery/delete/') }}"+'/'+id,
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
	            url: "{{ url('actionGallery') }}"+'/'+id+'/'+1,
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
	            url: "{{ url('actionGallery') }}"+'/'+id+'/'+0,
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