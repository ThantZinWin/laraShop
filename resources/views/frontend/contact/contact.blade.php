@extends('frontend.layouts.app')

@section('content')
	
	<div class="mail">
			<h3>Contact Us</h3>
			<div class="agileinfo_mail_grids">
				<div class="col-md-4 agileinfo_mail_grid_left">
					<ul>
						<li><i class="fa fa-home" aria-hidden="true"></i></li>
						<li>address<span>Sin Min Zay(bus-stop),</br>Kyi Minn Dine Township,</br>Yangon.</span></li>
					</ul>
					<ul>
						<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
						<li>email<span><a href="mailto:info@example.com">info@larashop.com</a></span></li>
					</ul>
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i></li>
						<li>call to us<span>(+95) 9 259128739</br>(+95) 9 773 689 56</span></li>
					</ul>
				</div>
				<div class="col-md-8 agileinfo_mail_grid_right">
					{{ Form::open(['route' => 'frontend.send_message','method' => 'post']) }}

						<div class="col-md-6 wthree_contact_left_grid">
							{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name*']) }}

							{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email*']) }}
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							{{ Form::text('teltphone', null, ['class' => 'form-control', 'placeholder' => 'Telephone*']) }}

							{{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject*']) }}
						</div>			
						<div class="clearfix"> </div>		
						{{ Form::textarea('message_body', null, ['class' => 'form-control', 'placeholder' => 'Message...']) }}
						{{ Form::submit('Submit', ['class' => 'btn btn-success btn-xs']) }}
						<input type="reset" value="Clear">	

					{{ Form::close() }}
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- map -->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d96748.15352429623!2d-74.25419879353115!3d40.731667701988506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sshopping+mall+in+New+York%2C+NY%2C+United+States!5e0!3m2!1sen!2sin!4v1467205237951" style="border:0"></iframe>
	</div>
<!-- //map -->

@endsection
