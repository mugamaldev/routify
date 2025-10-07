@extends('layouts.mDashboard')

@section('content')
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			@if (session('success'))
			    <div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">
					{{$user->role_label}} Profile
				</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>{{ $user->role_label }} Profile</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>{{ $user->role_label }} Profile</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" method="post" action="{{route('profiles.update')}}">
								@csrf
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Full Name</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->full_name}}" name="full_name">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Occupation</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->occupation}}" name="occupation">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Company Name</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->company_name}}" name="company_name">
											<span class="help">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Phone No.</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->phone}}" name="phone">
										</div>
									</div>
									
									<div class="seperator"></div>
									
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Address</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Address</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->address}}" name="address">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">City</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->city}}" name="city">
										</div>
									</div>
									
									

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12 m-t20">
										<div class="ml-auto">
											<h3 class="m-form__section">3. Social Links</h3>
										</div>
									</div>

									<div class="form-group col-6">
										<label class="col-form-label">Linkedin</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->linkedin}}" name="linkedin">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Facebook</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->facebook}}" name="facebook">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Twitter</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->twitter}}" name="twitter">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Instagram</label>
										<div>
											<input class="form-control" type="text" value="{{$user->profile->instagram}}" name="instagram">
											@error('instagram') {{$message}} @enderror
										</div>
									</div>
									<div class="col-12">
										<button type="submit" value="submit" class="btn">Save changes</button>
										<button type="reset" class="btn-secondry">Cancel</button>
									</div>
								</div>
							</form>
							
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>

	@endsection