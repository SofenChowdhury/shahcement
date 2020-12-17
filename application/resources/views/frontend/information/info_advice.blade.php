@extends('layouts.frontend_layout')
@section('contents')
<div class="content-grid"style="padding-left:10%;margin-bottom: 10px;padding-top:7% !important;">
	@include('sweetalert::alert')
	<div class="contact-form">
		<div class="contact-image">
			
		</div>
		<form method="POST" action="{{ route('submitMessage') }}" enctype="multipart/form-data"  style="padding: 35px;">
		    @csrf()
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" placeholder="Your Title *" value="" />
					</div>
					<div class="form-group">
						<label>Subject</label>
						<input type="text" name="subject" class="form-control" placeholder="Your Subject " value="" />
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control" placeholder="Your Phone Number " value="" />
					</div>
					<div class="form-group">
						<input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Message</label>
						<textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group" style="margin-top: 2rem;padding-left:20px;font-weight: bold;">
					    <a href="http://xobotronix.com/shahcement/uploads/media/CONDITIONS OF USE.pdf">-> CONDITIONS OF USE</a>
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="form-group" style="margin-top: 2rem;padding-left:200px;font-weight: bold;">
					    <a href="http://xobotronix.com/shahcement/uploads/media/PRIVACY POLICY.pdf">-> PRIVACY POLICY</a>
					</div>
					
				</div>
				<!--<div class="col-md-6">-->
				<!--	<div class="form-group" style="margin-top: 1rem;padding-left:20px;">-->
				<!--	    <a href="mailto:info@homebuildersclub.org" target="_blank" style="padding-right: 3px; color=black;">-> info@homebuildersclub.org-->
    <!--                        <i class="fa fa-google fa-lg"></i>-->
    <!--                    </a>-->
				<!--	</div>-->
				<!--</div>-->
				<!--	<div class="col-md-6">-->
				<!--	<div class="form-group" style="margin-top: 1rem;padding-left:200px;">-->
				<!--	    <a href="" target="_blank" style="padding-right: 3px; color=black;">-> +8801708-158112-->
    <!--                        <i class="fas fa-phone-square"></i>-->
    <!--                    </a>-->
				<!--	</div>-->
					
				<!--</div>-->
			</div>
		</form>
	</div>
</div>
<style>
	.contact-form{
	    background: #fff;
	    margin-top: 3%;
	    margin-bottom: 5%;
	    width: 100%;
	}
	.contact-form .form-control{
	    /*border-radius:1rem;*/
	}
	.contact-image{
	    text-align: center;
	}
	.contact-image img{
	    /*border-radius: 6rem;*/
	    width: 10%;
	    margin-top: -3%;
	    transform: rotate(29deg);
	}
	.contact-form form{
	    padding: 14%;
	}

	.contact-form h3{
	    margin-bottom: 8%;
	    margin-top: -10%;
	    text-align: center;
	    color: #0062cc;
	}
	.contact-form .btnContact {
	    width: 50%;
	    border: none;
	    border-radius: 1rem;
	    padding: 1.5%;
	    background: #dc3545;
	    font-weight: 600;
	    color: #fff;
	    cursor: pointer;
	}
	.btnContactSubmit
	{
	    width: 50%;
	    border-radius: 1rem;
	    padding: 1.5%;
	    color: #fff;
	    background-color: #0062cc;
	    border: none;
	    cursor: pointer;
	}
	a{
	    
	    Padding-top:50px;
	    color:#dc3545;
	}

</style>
@stop
