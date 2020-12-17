@extends('layouts.admin_layout')
@section('contents')
<div class="row" style="margin-top: 1%;">
    <div class="col-12">
    	@include('sweetalert::alert')
        <div class="card-box">
        	<div class="row">
        		<div class="col-12">
		            <h4 class="header-title text-center">{{$title}}</h4>
		        </div>
	        </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
	                <tr>
	                    <th>Image</th>
	                    <th>Title</th>
	                    <th>Sub Title</th>
	                    <th>Blog Type</th>
	                    <th>Author</th>
	                    <th>Posted date</th>
	                    <th>Status</th>
	                    <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($blog_post as $post)
                	@php
                		$images = explode(',',$post->image);
                	@endphp
	                <tr id="user{{$post->id}}">
	                    <td>
	                    	@foreach($images as $key_image)
	                    	@if($key_image)
						  	<span>
						  		<img src="{{asset($key_image)}}" style="width: 40px;height: 50px;">
						  	</span>
						  	@endif
						  	@endforeach
	                    </td>
	                    <td>{{$post->post_title}}</td>
	                    <td>{{$post->post_sub_title}}</td>
	                    @if($post->post_type_id == '1')
	                    <td>Blog</td>
	                    @elseif($post->post_type_id == '2')
	                    <td>Poll</td>
	                    @endif
	                    <td>{{$post->name}}</td>
	                    <td>{{date('d M Y',strtotime($post->created_at))}}</td>
	                    @if($post->status == 1)
	                    <td style="background-color: green;color: white;" id="status{{$post->id}}">Active</td>
	                    @else
	                    <td style="background-color: tomato;color: white;" id="status{{$post->id}}">Pending</td>
	                    @endif
	                    <td>
						  	<a href="#view-modal{{$post->id}}" type="button" class="btn btn-info waves-effect waves-light"  data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
						  		<i class="far fa-eye"></i>
						  	</a>
	                        <a href="#" class="material-switch">
	                        	@if($post->status == 1)
	                            <input id="postApprove{{$post->id}}" name="action" type="checkbox" onclick="actionPost({{$post->id}},{{$post->status}})" checked=""/>
	                            <label for="postApprove{{$post->id}}" class="label-danger" ></label>
	                            @else
	                            <input id="postApprove{{$post->id}}" name="action" type="checkbox" onclick="actionPost({{$post->id}},{{$post->status}})"/>
	                            <label for="postApprove{{$post->id}}" class="label-danger" ></label>
	                            @endif
	                        </a>
						  	{{-- <a href="#status-modal{{$post->id}}" type="button" class="btn btn-info waves-effect waves-light"  data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
						  		<i class="far fa-edit"></i>
						  	</a> --}}
						  	<a href="javascript:void(0);" type="button" class="btn btn-icon btn-danger btn_delete" attr="{{$post->id}}">
						  		<i class="far fa-trash-alt"></i>
						  	</a>
						</td>
	                </tr>
	                @endforeach
                </tbody>
            </table>
        </div>


        <!-- Modal -->
        @foreach($blog_post as $key)
        	@php
        		$images         = explode(',',$key->image);
        	@endphp
	        {{-- Action Modal --}}
	        <div id="view-modal{{$key->id}}" class="modal-demo" style="width: 95% !important;overflow-y: scroll;">
	            <button type="button" class="close" onclick="Custombox.modal.close();">
	                <span>&times;</span><span class="sr-only">Close</span>
	            </button>
	            <h4 class="custom-modal-title">{{$key->post_title}}</h4>
	            <div class="custom-modal-text text-muted">
	                <div class="row">
	                	<div class="col-6">
	                		<div class="row">
	                			@foreach($images as $post_images)
	                			@if(count($images)% 2 == 0)
	                			<div class="col-6">
	                				@if (pathinfo($post_images, PATHINFO_EXTENSION) == 'jpg' or pathinfo($post_images, PATHINFO_EXTENSION) == 'jpeg' or pathinfo($post_images, PATHINFO_EXTENSION) == 'png' or pathinfo($post_images, PATHINFO_EXTENSION) == 'gif')
		                			<img src="{{asset($post_images)}}" style="width: 100%;height: auto;">
		                			@else
		                				<video style="width: 100%;"controls style="margin-left: -14px;">
							                <source src="{{asset($post_images)}}" type="video/mp4">
							              Your browser does not support the video tag.
							            </video>
		                			@endif
		                		</div>
		                		@else
		                		<div class="col-12">

		                			@if (pathinfo($post_images, PATHINFO_EXTENSION) == 'jpg' or pathinfo($post_images, PATHINFO_EXTENSION) == 'jpeg' or pathinfo($post_images, PATHINFO_EXTENSION) == 'png' or pathinfo($post_images, PATHINFO_EXTENSION) == 'gif')
		                			<img src="{{asset($post_images)}}" style="width: 100%;height: auto;">
		                			@else
		                				@if($post_images)
		                				<video style="width: 100%;"controls style="margin-left: -14px;">
							                <source src="{{asset($post_images)}}" type="video/mp4">
							              Your browser does not support the video tag.
							            </video>
 										@endif
		                			@endif
		                		</div>
		                		@endif
	                			@endforeach
	                		</div>
	                	</div>
	                	<div class="col-6">
	                		<h4>{{$key->post_title}}</h4>
	                		<p>{!!$key->description !!}</p>
	                	</div>
	                </div>
	            </div>
	        </div>
        @endforeach
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
		  	$('#user'+id).hide();
			$.ajax({
				url: "{{ url('/admin/blog/post/delete/') }}"+'/'+id,
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
	function actionPost(id,id2){

		if ($('#postApprove'+id).prop('checked') == true) {
			$('#status'+id).css('background-color','green');
			$('#status'+id).empty();
			$('#status'+id).text('Accepted');

			$.ajax({
	            url: "{{ url('approvePost') }}"+'/'+id+'/'+1,
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
	            url: "{{ url('approvePost') }}"+'/'+id+'/'+0,
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