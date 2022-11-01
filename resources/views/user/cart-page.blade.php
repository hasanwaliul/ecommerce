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
        <div class="row">
            <div class="col-md-12 my-wishlist">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="4" class="heading-title">My Cart</th>
                            </tr>
                        </thead>
                        <tbody id="cartProduct">

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->
    {{-- Wishlist Page Content End --}}

</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection











