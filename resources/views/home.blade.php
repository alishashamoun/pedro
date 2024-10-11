@extends('frontend.layout.app')
@section('content')
    <!-----section-1----->
    <section>
        <div class="sec-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="content">
                            <h1>Tom McNally - Best Painting Contractor In USA</h1>
                            <p>For homes, warehouses, and offices needing on-time, on-spec, and on-budget painting by
                                safety-certified painting professionals, Tom McNally Painting is your trusted choice.
                            </p>
                            <div class="btn">
                                <a href="#">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-----section-2----->
        <div class="sec-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="img-1">
                            <img src="frontend/images/Group-6-1.png">
                        </div>
                        <h4>Quality Materials</h4>
                        <p>We use top-grade paints and materials from Sherwin Williams for a long-lasting and
                            professional appearance.</p>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="img-1">
                            <img src="frontend/images/Group-7-3.png">
                        </div>
                        <h4>Garage Cleanouts</h4>
                        <p>Our experienced painters bring precision and skill to every job for a high-quality finish
                            that enhances your property.</p>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="img-1">
                            <img src="frontend/images/Group-6-1.png">
                        </div>
                        <h4>Timely Completion</h4>
                        <p>We prioritize clear communication and on-time delivery, providing a smooth and stress-free
                            painting experience from start to finish.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-----section-3----->
        <div class="sec-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <h4>About Us</h4>
                        <h2>With (10) Years Of Experience, We Enhance Property Durability!</h2>
                        <p>Our expert finish revitalizes your space, delivering a fresh look and lasting performance for
                            years to come.</p>
                        <div class="pro-info">
                            <div class="icon">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </div>
                            <div class="content-info">
                                <h5>Projects Completed</h5>
                                <p>250+</p>
                            </div>
                        </div>

                        <div class="pro-info">
                            <div class="icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="content-info">
                                <h5>Happy Customers</h5>
                                <p>70+</p>
                            </div>
                        </div>
                        <div class="btn">
                            <a href="{{ route('about_us') }}">About Us</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="image-2">
                            <img width="100%" src="frontend/images/Group-63-4.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-----section-4----->
        <div class="sec-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                        <h3>BRING YOUR SPACE TO LIFE</h3>
                        <h1>Hire Tom MacNally <br> Painting Contactor!</h1>
                        <p>We strive to deliver on our promise of care and quality. Get in touch to see how we do
                            it!
                        </p>
                        <div class="btn">
                            <a href="{{ route('contactus') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-----section-5----->
        <div class="sec-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <h4>Testimonial</h4>
                        <h2>Words Of Satisfaction</h2>
                        <div class="images-5">
                            <img width="100%" src="frontend/images/Group-66-2.png">
                        </div>
                    </div>
                    <div class="testi-main col-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="owl-carousel owl-theme">
                            <div class="testi-inner">
                                <div class="upper1">
                                    <div>
                                        <img src="frontend/images/Ellipse-4-2.png" alt="">
                                    </div>
                                    <div>
                                        <h6>Sally James</h6>
                                        <p>Painting and Finishing For Mill</p>
                                    </div>
                                </div>
                                <p class="resti-para">
                                    It's been amazing to witness how Tom MacNally's paint crews have revitalized the
                                    entire mill, giving it a modern, refreshed appearance and bringing it back to life.
                                </p>
                            </div>

                            <div class="testi-inner">
                                <div class="upper1">
                                    <div>
                                        <img width="100px" src="frontend/images/headshot-girl-smiling.png" alt="">
                                    </div>
                                    <div>
                                        <h6>Lina Doe</h6>
                                        <p>Rust Stop Treatment For Terrace </p>
                                    </div>
                                </div>
                                <p class="testi-para">

                                    I really appreciate their punctuality and commitment to delivery. They didn't delay
                                    a day and completed the project within a week. I highly recommend Tom MacNally.
                                </p>
                            </div>

                            <div class="testi-inner">
                                <div class="upper1">
                                    <div>
                                        <img width="100px" src="frontend/images/manlook.png" alt="">
                                    </div>
                                    <div>
                                        <h6>Robert Hans</h6>
                                        <p>Airless Spray For Garage </p>
                                    </div>
                                </div>
                                <p class="testi-para">

                                    Phase two of five has been completed to paint the entire facility. I loved it when
                                    the same crew extended to phase three; I would love to get my garage done by them in
                                    the spring.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-----section-6----->
            <div class="sec-6">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="content-3">
                                <h2>Our Services</h2>
                                <p>The Only Painter and Restorer You Need!</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="images-3">
                                <img width="100%" src="frontend/images/image-2024-08-19T180503.011.png">
                            </div>
                            <h5>Grain Bins & Legs</h5>
                            <p>We specialize in painting and maintaining grain bins and legs, ensuring a
                                professional finish that protects against corrosion and wear while enhancing
                                durability.</p>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="images-3">
                                <img width="100%" src="frontend/images/image-2024-08-19T180429.918.png">
                            </div>
                            <h5>Morton Buildings</h5>
                            <p>Our expertise extends to painting Morton Buildings, delivering a high-quality,
                                long-lasting finish that complements the robust construction and helps withstand the
                                elements.</p>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="images-2">
                                <img width="100%" src="frontend/images/image-2024-08-19T180433.686.png">
                            </div>
                            <h5>Rubberized Roof Coatings</h5>
                            <p>We apply premium rubberized roof coatings that provide extra protection against leaks
                                and weather damage, ensuring your roof remains in top condition.</p>
                        </div>
                        <div class="btn">
                            <a href="{{ route('service') }}">Explore Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-----section-7----->
            <div class="sec-7">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                            <h2>Find Us Here!</h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4400.741146836249!2d-90.04144914165491!3d35.14695242321589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87d57f64e0678647%3A0xad453f0450885857!2sManassas%20Garden!5e0!3m2!1sen!2s!4v1726178910707!5m2!1sen!2s"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div class="images-4">
                                <img width="25%" src="frontend/images/image-2024-08-19T185437.173.png">
                                <img width="25%" src="frontend/images/image-2024-08-19T185426.178-1.png">
                                <img width="25%" src="frontend/images/image-2024-08-19T185426.178.png">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <h2>Map Location</h2>
                            <p>Track the phone number’s location on Google Maps by opening the app on the
                                associated <br> device.</p>
                            <ul>
                                <li>Mississippi</li>
                                <li>Tennessee</li>
                                <li>Arkansas</li>
                                <li>Kentucky</li>
                                <li>Oklahoma</li>
                                <li>Kansas</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
