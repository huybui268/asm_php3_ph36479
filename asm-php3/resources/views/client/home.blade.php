@extends('client.layouts.master')

@section('content')
<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
			
            @foreach($banners as $index => $banner)
				<div class="item-slick1" style="background-image: url({{ Storage::url($banner->image) }});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									{{ $banner->title }}
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									{{ $banner->description }}
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

                @endforeach
			</div>
		</div>
	</section>


<div class="container">
<section class="bg0 p-t-23 p-b-140">
    <div class="p-b-10">
        <h3 class="ltext-103 cl5">
            Product Overview
        </h3>
    </div>

    <div class="flex-w flex-sb-m p-b-52">
        
    </div>
    <div class="container">

        <div class="row isotope-grid">
            @foreach($products as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{Storage::url($item->image)}}" alt="IMG-PRODUCT" style="max-width: 100%; max-height: 100%">
                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Add To Cart
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l">
                                <a href="{{ route('detail', ['id' => $item->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $item->name }}
                                </a>

                                <span class="stext-105 cl3" style="color: red; text-decoration: line-through;">
                                    {{ number_format($item->price, 0, ',', '.') }} vnđ
                                </span>
                                <span class="stext-105 cl3">
                                    {{ number_format($item->price_sale, 0, ',', '.') }} vnđ
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="{{ asset('theme/user/images/icons/icon-heart-01.png') }}" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('theme/user/images/icons/icon-heart-02.png') }}" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</section>
@endsection
