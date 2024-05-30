<section class="fp__banner" style="background: url({{ asset('frontend/images/banner_bg.jpg') }});">
    <div class="fp__banner_overlay">
        <div class="row banner_slider">
            @foreach ($sliders as $slider)
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset($slider->image) }}" alt="food item"
                                                class="img-fluid w-100">
                                            @if ($slider->offer)
                                                <span> {{ $slider->offer }} off </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1>{{ $slider->title }}</h1>
                                        <h3>{{ $slider->sub_title }}</h3>
                                        <p>{{ $slider->short_description }}</p>
                                        <ul class="d-flex flex-wrap">
                                            <li><a class="common_btn" href="{{ $slider->button_link }}">shop now</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-12">
                <div class="fp__banner_slider">
                    <div class=" container">
                        <div class="row">
                            <div class="col-xl-5 col-md-5 col-lg-5">
                                <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                    <div class="img">
                                        <img src="images/slider_img_2.png" alt="food item" class="img-fluid w-100">
                                        <span style="background: url(images/offer_shapes.png);">
                                            70% off
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-7 col-lg-6">
                                <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                    <h1>Eat healthy. Stay healthy.</h1>
                                    <h3>Fast Food & Restaurants</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima
                                        et debitis ut distinctio optio qui voluptate natus.</p>
                                    <ul class="d-flex flex-wrap">
                                        <li><a class="common_btn" href="#">shop now</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="fp__banner_slider">
                    <div class=" container">
                        <div class="row">
                            <div class="col-xl-5 col-md-5 col-lg-5">
                                <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                    <div class="img">
                                        <img src="images/slider_img_3.png" alt="food item" class="img-fluid w-100">
                                        <span style="background: url(images/offer_shapes.png);">
                                            50% off
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-7 col-lg-6">
                                <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                    <h1>Great food. Tastes good.</h1>
                                    <h3>Fast Food & Restaurants</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima
                                        et debitis ut distinctio optio qui voluptate natus.</p>
                                    <ul class="d-flex flex-wrap">
                                        <li><a class="common_btn" href="#">shop now</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
