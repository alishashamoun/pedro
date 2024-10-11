@extends('frontend.layout.app')
@section('content')
    <!-----sec-9----->
    <div class="sec-9">
        <div class="container">
            <div class="row">

                <div class="section-padding gallery-section" id="gallery">
                    <div class="container">

                        <div id="btncontainer" class="filter">
                            <a class="btn-2" href="#all">ALL</a>
                            <a class="btn-2" href="#grain-bins">Grain Bins</a>
                            <a class="btn-2" href="#grain-bin-sealant">grain bin sealant</a>
                            <a class="btn-2" href="#barn">Barn</a>
                            <a class="btn-2" href="#metal-building">Metal building</a>
                        </div>

                        <div class="gallery sets">
                            <a class="all grain-bins barn"><img
                                    src="{{ asset('frontend/images/14485020_1617755015189122_5413769578851821888_n.jpg') }}" /></a>
                            <a class="all grain-bins"><img
                                    src="{{ asset('frontend/images/20-Home-Exterior-Makeover-Before-and-After-Ideas-_-Home-Stories-A-to-Z.jpeg') }}" /></a>
                            <a class="all grain-bins"><img
                                    src="{{ asset('frontend/images/245066392_110572908064753_3640817812826095307_n.jpg') }}" /></a>
                            <a class="all grain-bins"><img src="{{ asset('frontend/images/37190717_85.jpg') }}" /></a>
                            <a class="all grain-bins"><img
                                    src="{{ asset('frontend/images/37190717_859788514214247_7172358379434672128_o.jpg') }}" /></a>
                            <a class="all grain-bin-sealant"><img
                                    src="{{ asset('frontend/images/37205000_859788617547570_2738574274389344256_o.jpg') }}" /></a>
                            <a class="all grain-bin-sealant metal-building"><img
                                    src="{{ asset('frontend/images/37206622_859788880880877_3898988100335960064_o (1).jpg') }}" /></a>
                            <a class="all grain-bin-sealant metal-building"><img
                                    src="{{ asset('frontend/images/37206622_859788880880877_3898988100335960064_o.jpg') }}" /></a>
                            <a class="all grain-bin-sealant"><img
                                    src="{{ asset('frontend/images/56490461_315953122454432_5072977733789679616_n.jpg') }}" /></a>
                            <a class="all barn"><img
                                    src="{{ asset('frontend/images/barn-before-after-2017-1.jpg') }}" /></a>
                            <a class="all barn"><img
                                    src="{{ asset('frontend/images/central-indiana-farm-and-agricultural-building-painters.jpg') }}" /></a>
                            <a class="all grain-bins barn"><img
                                    src="{{ asset('frontend/images/e0ce8a00fe844fc62cfea75b12925dcd.jpg') }}" /></a>
                            <a class="all metal-building"><img src="{{ asset('frontend/images/Exterior.jpeg') }}" /></a>
                            <a class="all metal-building"><img
                                    src="{{ asset('frontend/images/paint-barn6_800_DJ.jpg') }}" /></a>

                            <a class="all grain-bin-sealant"><img
                                    src="{{ asset('frontend/images/steel-building-ba2-1.jpg') }}" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
