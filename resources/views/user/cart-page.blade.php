@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    {{-- Breadcrumb Start --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Carts</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    {{-- Breadcrumb End --}}

    {{-- Wishlist Page Content Start --}}
    <div class="my-wishlist-page">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Image</th>
                                    <th class="cart-description item">Name & Price</th>
                                    <th class="cart-product-name item">Color</th>
                                    <th class="cart-edit item">Size</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-total last-item">Action</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody id="cartProduct" class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->
    {{-- Wishlist Page Content End --}}

</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection
