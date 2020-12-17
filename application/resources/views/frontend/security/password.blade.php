@extends('layouts.frontend_layout')
@section('contents')
<!-- Sweet Alert -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
<div class="content-grid">
	<div class="profile-header" style="border-radius: 0px;margin-top: -1.5%;">
		<figure class="profile-header-cover liquid" style="border-radius: 0px;">
			<img src="https://126544-362384-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/2018/07/Shah-Cement.jpg" alt="cover-01">
		</figure>
		<div class="profile-header-info">
			<div class="user-short-description big">
				<a class="user-short-description-avatar user-avatar big" href="#" id="nv_edit_profile">
					<div class="user-avatar-border">
						<div class="hexagon-148-164"></div>
					</div>
					<div class="user-avatar-content">
						<div class="hexagon-image-100-110" data-src="{{asset(Auth::user()->image)}}"></div>
					</div>
					<div class="user-avatar-progress">
						<div class="hexagon-progress-124-136"></div>
					</div>
					<div class="user-avatar-progress-border">
						<div class="hexagon-border-124-136"></div>
					</div>
					<div class="user-avatar-badge">
						<div class="user-avatar-badge-border">
							<div class="hexagon-40-44"></div>
						</div>
						<div class="user-avatar-badge-content">
							<div class="hexagon-dark-32-34"></div>
						</div>
						<p class="user-avatar-badge-text"><i class="lni lni-pencil-alt"></i></p>
					</div>
				</a>
				<a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium" href="{{route('profile')}}">
					<div class="user-avatar-border">
						<div class="hexagon-120-132"></div>
					</div>
					<div class="user-avatar-content">
						<div class="hexagon-image-82-90" data-src="{{asset(Auth::user()->image)}}"></div>
					</div>
					<div class="user-avatar-progress">
						<div class="hexagon-progress-100-110"></div>
					</div>
					<div class="user-avatar-progress-border">
						<div class="hexagon-border-100-110"></div>
					</div>
					<div class="user-avatar-badge">
						<div class="user-avatar-badge-border">
							<div class="hexagon-32-36"></div>
						</div>
						<div class="user-avatar-badge-content">
							<div class="hexagon-dark-26-28"></div>
						</div>
						<p class="user-avatar-badge-text">24</p>
					</div>
				</a>
				<p class="user-short-description-title"><a href="{{route('profile')}}">{{Auth::user()->name}}</a></p>
				<p class="user-short-description-text"><a href="#">{{Auth::user()->email}}</a></p>
			</div>
			<div class="user-stats">
				<div class="user-stat big">
					<p class="user-stat-title">930</p>
					<p class="user-stat-text">posts</p>
				</div>
				<div class="user-stat big">
					<p class="user-stat-title">82</p>
					<p class="user-stat-text">Forums</p>
				</div>
				<div class="user-stat big">
					<img class="user-stat-image" src="{{asset('assets/frontend/img/flag/bangladesh.png')}}" alt="flag-usa">
					<p class="user-stat-text">Bangladesh</p>
				</div>
			</div>
		</div>
	</div>
	<div class="grid">
		<div class="grid-column">
			<h3 style="padding-top: 20px;">Change PassWord</h3>
			<div class="widget-box">
				<form method="POST" action="{{ route('submitMessage') }}" enctype="multipart/form-data"  style="padding: 35px;">
				    @csrf()
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Enter Your Email *" value="{{Auth::user()->email}}" style="height: 54px;border-radius: 0px;" id="email" readonly="" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Old Password</label>
								<input type="password" name="password" class="form-control" placeholder="Your Old password *" value="" id="old_password" required=""/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>New Password</label>
								<input type="password" name="new_password" class="form-control" placeholder="your New password *" value="" id="new_password" required=""/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Re-Password</label>
								<input type="password" name="re_password" class="form-control" placeholder="Re-type Your New password *" value="" id="re_password" required=""/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group" style="float: right;">
								<input type="button" name="btnSubmit" class="btn btn-danger saveData" value="Change Password" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).on('click', '.saveData',function(event){
		event.preventDefault();
		var email 			= $('#email').val();
		var old_password 	= $('#old_password').val();
		var new_password 	= $('#new_password').val();
		var re_password 	= $('#re_password').val();
		console.log(email);
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Change it!'
		}).then((result) => {
		  if (result.value) {
			$.ajax({
				url: "{{ url('/profile/update_password') }}",
				data:{'email':email,'old_password':old_password,'new_password':new_password,'re_password':re_password},
				success:function(result){
					console.log(result);
					if (result == 'success') {
						Swal.fire(
					      'Updated!',
					      'Your Password has been Updated.',
					      'success'
					    )

					    location.reload();
					}else if(result == 're_error'){
						Swal.fire(
					      'Error!',
					      'Your re-typed Password doesn`t matched.',
					      'error'
					    )
					    $('#old_password').val('');
					}else{
						Swal.fire(
					      'Updated!',
					      'Your Old Password doesn`t matched.',
					      'error'
					    )
					    $('#old_password').val('');
					    $('#new_password').val('');
                        $('#re_password').val('');
					}
					
				}
			});
		  }
		})
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@stop