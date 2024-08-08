@extends('client.layouts.master-detail')
@section('content')

<div class="container mt-5">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
            Men
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $product->name }}
        </span>
    </div>
</div>
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<form action="{{ route('cart.add') }}" method="post">
	@csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                        <div class="wrap-pic-w pos-relative">
                            <img style="height:400px ; with:500px; !imporotant" src="{{Storage::url($product->image)}}"
                                alt="Image">
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $product->name }}
                    </h4>

                    <span class="mtext-106 cl2">
                        {{ $product->price }}
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        {{ $product->description}}
                    </p>

                    <!--  -->
                    <div class="p-t-33">


                        Size: {{ $product->size}}

                    </div>



                    <p class="mb-4">Kích thước: {{ $product->size }}</p>
                    <div class="d-flex color-item align-items-center mb-4">
                        <span>Màu: {{ $product->color}}</span>
                    </div>

                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" name="quantity" value="1" placeholder=""
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                    </div>
                    @if($product->price_sale > 0 || !empty($product->price_sale))
                    <p><strong class="text-primary h4">Giá: <del>{{ number_format($product->price, 0, ",", ".") }}
                                VND</del> {{ number_format($product->price_sale, 0, ",", ".") }} VND</strong></p>
                    @else
                    <p><strong class="text-primary h4">Giá: {{ number_format($product->price, 0, ",", ".") }}
                            VND</strong></p>
                    @endif
                    <br>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="price_sale" value="{{ $product->price_sale }}">
                    <input type="hidden" name="image" value="{{ $product->image }}">

                    <button
                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                        Add to cart
                    </button>
                </div>
            </div>
			</form>
        </div>

        <!--  -->
        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
            <div class="flex-m bor9 p-r-10 m-r-11">
                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                    data-tooltip="Add to Wishlist">
                    <i class="zmdi zmdi-favorite"></i>
                </a>
            </div>

            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                <i class="fa fa-facebook"></i>
            </a>

            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                <i class="fa fa-twitter"></i>
            </a>

            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                data-tooltip="Google Plus">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
@endsection