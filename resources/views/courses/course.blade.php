@extends('layouts.app')
@section('content')

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner3.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Our Courses</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Our Courses</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="widget courses-search-bx placeani">
								<div class="form-group">
									<div class="input-group">
										<label>Search Courses</label>
										<input name="dzName" type="text" required class="form-control">
									</div>
								</div>
							</div>
							<div class="widget widget_archive">
                                <h5 class="widget-title style-1">All Categories</h5>
                                <ul>
									@foreach($categories as $category)
                                    <li class="active">
										<a href="#">{{$category->name}}</a>
									</li>
									@endforeach
                                </ul>
                            </div>
							<div class="widget">
								<a href="#"><img src="assets/images/adv/adv.jpg" alt=""/></a>
							</div>
							<div class="widget recent-posts-entry widget-courses">
                                <h5 class="widget-title style-1">Recent Courses</h5>
                                <div class="widget-post-bx">
									@foreach($latestCourses as $latest)
										<div class="widget-post clearfix">
											<div class="ttr-post-media">
												{{-- الصورة --}}
												<img 
													src="{{ $latest->image ? asset('storage/' . $latest->image) : asset('assets/images/blog/recent-blog/pic1.jpg') }}" 
													width="200" height="143" 
													alt="{{ $latest->title }}"
												>
											</div>

											<div class="ttr-post-info">
												<div class="ttr-post-header">
													<h6 class="post-title">
														<a href="#">{{ $latest->title }}</a>
													</h6>
													{{-- <small class="text-muted">{{ $latest->category->name ?? 'Uncategorized' }}</small> --}}
												</div>

												<div class="ttr-post-meta">
													<ul>
														<li class="price">
															@if($latest->sale_price)
																<del>{{ $latest->price }} EGP</del>
																<h5>{{ $latest->sale_price }} EGP</h5>
															@else
																<h5>{{ $latest->price }} EGP</h5>
															@endif
														</li>

														{{-- المراجعات --}}
														<li class="review">
															{{ $latest->reviews_count ?? 0 }}
															{{ \Illuminate\Support\Str::plural('Review', $latest->reviews_count ?? 0) }}
														</li>
													</ul>
												</div>
											</div>
										</div>
									@endforeach
								</div>

                            </div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="row">
								@forelse($courses as $course)
									<div class="col-md-6 col-lg-4 col-sm-6 mb-4">
										<div class="cours-bx">
											{{-- صورة الكورس --}}
											<div class="action-box">
												<img src="{{ $course->image ?? asset('assets/images/courses/pic1.jpg') }}" alt="{{ $course->title }}">
												<a href="#" class="btn">Read More</a>
											</div>

											{{-- معلومات الكورس --}}
											<div class="info-bx text-center">
												<h5><a href="#">{{ $course->title }}</a></h5>
												<span>{{ $course->category->name ?? 'Uncategorized' }}</span>
												<h6>By: {{ $course->instructor->name ?? 'Unknown' }}</h6>
											</div>

											{{-- مراجعات الكورس --}}
											<div class="cours-more-info">
												<div class="review">
													<span>
														{{ $course->reviews_count }} 
														{{ \Illuminate\Support\Str::plural('Review', $course->reviews_count) }}
													</span>

													@php
														$avgRating = round($course->reviews_avg_rating, 1);
													@endphp

													<ul class="cours-star">
														@for ($i = 1; $i <= 5; $i++)
															<li class="{{ $i <= $avgRating ? 'active' : '' }}">
																<i class="fa fa-star"></i>
															</li>
														@endfor
													</ul>
												</div>

												{{-- السعر --}}
												<div class="price text-center">
													@if($course->sale_price)
														<del>{{ $course->price }} EGP</del>
														<h5>{{ $course->sale_price }} EGP</h5>
													@else
														<h6>{{ $course->price }} EGP</h6>
													@endif
												</div>
											</div>
										</div>
									</div>
								@empty
									<div class="col-12 text-center py-5">
										<h4>No courses available right now.</h4>
									</div>
								@endforelse
								<div class="col-lg-12 mt-4">
									<div class="pagination-bx rounded-sm gray clearfix">
										{{ $courses->links() }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>
    <!-- Content END-->
@endsection