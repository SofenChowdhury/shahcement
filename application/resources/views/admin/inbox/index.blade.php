@extends('layouts.admin_layout')
@section('contents')
@php
	use App\model\RepliedMessage;
@endphp
<div class="row" style="margin-top: 1%;">
    <div class="col-12">
    	@include('sweetalert::alert')
        <div class="card-box">
        	<div class="row">
        		<div class="col-12">
		            <h4 class="header-title text-center">{{$title}}</h4>
		        </div>
		        <!--<div class="col-2">-->
		        <!--    <a href="#create-modal" class="btn btn-primary waves-effect waves-light" data-animation="door" data-plugin="custommodal"data-overlaySpeed="100" data-overlayColor="#36404a" style="color: white;float: right;"><i class="fas fa-plus"></i> Create</a>-->
		        <!--</div>-->
	        </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
	                <tr>
	                    <th>SL</th>
	                    <th>Date</th>
	                    <th>Title</th>
	                    <th>Subject</th>
	                    <th>Phone</th>
	                    <th>Sender</th>
	                    <th>Message</th>
	                    <th>Replied Message</th>
	                    <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($get_message as $message)
                	@php
                		$checkReplied = RepliedMessage::where('message_id',$message->id)->first();
                	@endphp
                	<tr id="message{{$message->id}}">
	                    <td>{{$loop->index+1}}</td>
	                    <td>{{$message->created_at}}</td>
	                    <td>{{$message->title}}</th>
	                    <td>{{$message->sub_title}}</th>
	                    <td>{{$message->phone}}</th>
	                    <td>{{$message->name}}</th>
	                    <td>{{$message->message}}</td>
	                    @if($checkReplied)
	                    <td>
	                    	<a href="#replied-modal" type="button" class="btn btn-primary waves-effect waves-light" data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" onclick="replied({{$message->id}})">
						  		<i class="fas fa-comments"></i> Replied
						  	</a>
	                    </td>
	                    @else
	                    <td></td>
	                    @endif
	                    <td style="width: 200px;">
						  	<a href="#edit-modal" type="button" class="btn btn-info waves-effect waves-light" data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" onclick="getData({{$message->id}})">
						  		<i class="fas fa-reply-all"></i>
						  	</a>

						  	<!--<a href="javascript:void(0);" type="button" class="btn btn-icon btn-danger btn_delete" attr="{{$message->id}}">-->
						  	<!--	<i class="far fa-trash-alt"></i>-->
						  	<!--</a>-->
						</td>
	                </tr>
                	@endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->

        <div id="edit-modal" class="modal-demo" style="width: 80% !important;">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Replay (<span id="txttitle"></span>)</h4>
            <div class="text-muted">
                <form method="POST" action="{{ route('admin_replay') }}" enctype="multipart/form-data">
		            @csrf()
					<div class="card m-0">
						<div class="card-body">
							<div class="row gutters">
								<div class="col-md-6">

									<div class="form-group">
										<label>Message</label>
										<textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" id="message" readonly=""></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Reply To : <span id="replied_to"></span></label>
										<input type="hidden" name="user_id" class="form-control" placeholder="Your Title *" value="" id="user_id" readonly="" />
										<input type="hidden" name="id" class="form-control" placeholder="Your Title *" value="" id="id" readonly="" />
										<textarea name="replied_message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
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
        <div id="replied-modal" class="modal-demo" style="height: 500px;overflow-y: scroll;">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Message History</h4>
            <div class="text-muted">
                <div class="row" style="margin-right:7px;margin-left:7px;margin-top:7px;">
                	<div class="col-12" style="margin-bottom: 7px;">
                		<textarea class="form-control" id="msg" readonly="" style="background-color: #ff5d48; color: white;"></textarea>
                	</div>
                	<div class="col-12" style="padding-bottom: 15px;">
                		<div id="replied">

                			
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	function replied(id){
		$.ajax({
			url: "{{ url('/admin/blog/messages') }}"+'/'+id,
			success:function(result){
				$('#msg').val(result.message);
			}
		});
		$.ajax({
			url: "{{ url('/admin/blog/message/replied') }}"+'/'+id,
			success:function(result){
				$('#replied').empty();
				for (var i = 0; i < result.length; i++){
					$('#replied').append('<textarea class="form-control" readonly="" style="text-align:right;">'+result[i].replied_message+'</textarea>');
				}
			}
		});
	}
	function getData(id){
		
		$.ajax({
			url: "{{ url('/admin/blog/messages') }}"+'/'+id,
			success:function(result){
				console.log(result);
				$('#txttitle').empty();
				$('#message').empty();
				$('#id').empty();

				$('#txttitle').text(result.title);
				$('#replied_to').text(result.name);
				$('#id').val(result.id);
				$('#user_id').val(result.user_id);
				$('#message').val(result.message);
			}
		});
	}
</script>
{{-- <script>
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
		  	$('#library'+id).hide();
			$.ajax({
				url: "{{ url('/admin/blog/library/delete') }}"+'/'+id,
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
	            url: "{{ url('actionLibrary') }}"+'/'+id+'/'+1,
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
	            url: "{{ url('actionLibrary') }}"+'/'+id+'/'+0,
	            method: 'get',

	            success: function(result){
	            		console.log(result);
	            }
        	});

		}
		
	}
</script> --}}
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