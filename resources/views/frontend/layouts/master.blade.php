<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="This is an ecommerce website based on laravel name Easy Shopping">
    <meta name="author" content="Waliul Hasan">
    <meta name="keywords"
        content="online store, online business, ecom, ecommerce website, shopping cart, e business, ecommerce platforms">
    <meta name="robots" content="all">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/main.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/blue.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/rateit.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/bootstrap-select.min.css">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    {{-- tostr cdn --}}
    <link rel="stylesheet" href=" {{ asset('backend') }}/lib/toastr/toastr.min.css">

    {{-- Sweetalert 2 --}}
    <link rel="stylesheet" href=" {{ asset('backend') }}/lib/sweetalert/sweetalert2.min.css">

    {{-- Bootstrap tagsinput --}}
    <link rel="stylesheet" href=" {{ asset('backend') }}/lib/bootstrap-tagsinput/bootstrap-tagsinput.css ">

    {{-- Bootstrap tagsinput --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body class="cnt-home">


    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.layouts.header')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">

            @yield('content')

            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            {{-- @include('frontend.layouts.footer-slider') --}}
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->


    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.layouts.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    {{-- Modal Body Start --}}
    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    @if (Session()->get('language') == 'bangla')
                        <h5 class="modal-title" id="exampleModalLabel"> <span id="pNameBn"></span> </h5>
                    @else
                        <h5 class="modal-title" id="exampleModalLabel"> <span id="pNameEn"></span> </h5>
                    @endif

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 16rem;">
                                <img src="" alt="Cart Image" class="card-img-top" style="height: 200px;" id="pImage">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                @if (Session()->get('language') == 'bangla')
                                    <li class="list-group-item">
                                        মূল্য:
                                        <strong class="text-danget" class="text-info">
                                            $<span id="pPrice"></span>
                                            <del id="oldPrice" class="text-danger"></del>
                                        </strong>
                                    </li>
                                @else
                                    <li class="list-group-item">
                                        Price:
                                        <strong class="text-danget" class="text-info">
                                            $<span id="pPrice"></span>
                                            <del id="oldPrice" class="text-danger"></del>
                                        </strong>
                                    </li>
                                @endif

                                @if (Session()->get('language') == 'bangla')
                                    <li class="list-group-item">কোড নংঃ <strong id="pCode" class="text-info"></strong></li>
                                @else
                                    <li class="list-group-item">Code No: <strong id="pCode" class="text-info"></strong></li>
                                @endif

                                @if (Session()->get('language') == 'bangla')
                                    <li class="list-group-item">পণ্যের ধরনঃ <strong id="pCategoryBn" class="text-info"></strong></li>
                                @else
                                    <li class="list-group-item">Category: <strong id="pCategoryEn" class="text-info"></strong></li>
                                @endif

                                @if (Session()->get('language') == 'bangla')
                                    <li class="list-group-item">ব্র্যান্ডের নামঃ <strong id="pBrandBn" class="text-info"></strong></li>
                                @else
                                    <li class="list-group-item">Brand: <strong id="pBrandEn" class="text-info"></strong></li>
                                @endif

                                @if (Session()->get('language') == 'bangla')
                                    <li class="list-group-item">উপস্থিতিঃ
                                        <span class="label label-success" id="availableBn"></span>
                                        <span class="label label-danger" id="stockoutBn"></span>
                                    </li>
                                @else
                                    <li class="list-group-item">Stock:
                                        <span class="label label-success" id="available"></span>
                                        <span class="label label-danger" id="stockout"></span>
                                    </li>
                                @endif

                            </ul>
                        </div>
                        <div class="col-md-4">
                            @if (Session()->get('language') ==  'bangla')
                                <div class="form-group" id="productColorArea">
                                    <label for="product_color">পণ্যের রংঃ </label>
                                    <select class="form-control" id="product_color" name="pColorBn">
                                    </select>
                                </div>
                            @else
                                <div class="form-group" id="productColorArea">
                                    <label for="product_color">Product Color: </label>
                                    <select class="form-control" id="product_color" name="pColorEn">
                                    </select>
                                </div>
                            @endif

                            @if (Session()->get('language') ==  'bangla')
                                <div class="form-group" id="sizeArea">
                                    <label for="product_size">পণ্যের আকারঃ </label>
                                    <select class="form-control" id="product_size" name="pSizeBn">
                                    </select>
                                </div>
                            @else
                                <div class="form-group" id="sizeArea">
                                    <label for="product_size">Product Size:</label>
                                    <select class="form-control" id="product_size" name="pSizeEn">
                                    </select>
                                </div>
                            @endif

                            @if (Session()->get('language') ==  'bangla')
                                <div class="form-group" id="qtyArea">
                                    <label for="pQty">পরিমাণঃ </label>
                                    <input type="text" class="form-control" id="pQty" value="" min="1">
                                </div>
                            @else
                                <div class="form-group" id="qtyArea">
                                    <label for="pQty">Quantity:</label>
                                    <input type="text" class="form-control" id="pQty" value="" min="1">
                                </div>
                            @endif

                            <input type="hidden" name="product_id" id="product_id">

                            @if (Session()->get('language') == 'bangla')
                                <div id="addToCartArea">
                                <button type="submit" class="btn btn-primary" id="addToCart" onclick="addToCart()">ব্যাগে যুক্ত করুন</button>
                                </div>
                            @else
                                <div id="addToCartArea">
                                <button type="submit" class="btn btn-primary" id="addToCart" onclick="addToCart()">Add To Cart</button>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Body End --}}

    {{-- tostr cdn --}}
    <script src=" {{ asset('backend/lib/toastr/jquery.min.js') }} "></script>
    <script src=" {{ asset('backend/lib/toastr/toastr.min.js') }} "></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
        @if (Session:: has('message'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
        @endif

        @if (Session:: has('error'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if (Session:: has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if (Session:: has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    {{-- ################## Bootstrap Tagsinput ###################--}}
    <script src=" {{ asset('backend') }}/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js "></script>

    <script src=" {{ asset('frontend') }}/assets/js/jquery-1.11.1.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/echo.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/jquery.rateit.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/lightbox.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap-select.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/wow.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/scripts.js"></script>

    {{-- ################## Jquery form validator ###################--}}
    <script type="text/javascript" src=" {{ asset('common') }}/jquery.validate.js "></script>
    <script>
        $.validate({
            lang : 'en'
        });
    </script>



    {{-- ################## Sweetalert 2 ###################--}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src=" {{ asset('backend') }}/lib/sweetalert/sweetalert2.all.min.js "></script>

    {{-- Modal Ajax request Start --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        // Start Product Details View ( On Cart) With Modal
        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/withModal/' + id,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    $('#pNameBn').text(data.product.product_name_bn);
                    $('#pNameEn').text(data.product.product_name_en);
                    $('#pPrice').text(data.product.discount_price);
                    $('#pCode').text(data.product.product_code);
                    $('#pCategoryEn').text(data.product.categoryfunc_prod.category_name_en);
                    $('#pCategoryBn').text(data.product.categoryfunc_prod.category_name_bn);
                    $('#pBrandEn').text(data.product.brandfunc_prod.brand_name_en);
                    $('#pBrandBn').text(data.product.brandfunc_prod.brand_name_bn);
                    $('#pImage').attr('src', '/' + data.product.product_thumbnail);

                    $('#product_id').val(id);
                    $('#pQty').text(data.product.product_qty)


                    // Product Price
                    if (data.product.discount_price == null) {
                        $('#pPrice').text('');
                        $('#oldPrice').text('');
                        $('#pPrice').text(data.product.actual_price);
                    } else {
                        $('#pPrice').text(data.product.discount_price);
                        $('#oldPrice').text(data.product.actual_price);
                    }

                    // Product Stock Status Bangla
                    if (data.product.product_qty > 0) {
                        $('#availableBn').text('');
                        $('#stockoutBn').text('');
                        $('#availableBn').text('এখনও রয়েছে');
                    } else {
                        $('#availableBn').text('');
                        $('#stockoutBn').text('');
                        $('#stockoutBn').text('ফুরিয়ে গেছে');
                    }
                    // Product Stock Status English
                    if (data.product.product_qty > 0) {
                        $('#available').text('');
                        $('#stockout').text('');
                        $('#available').text('Available');
                    } else {
                        $('#available').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Stock Out');
                    }

                    // Product Quantity Area
                    if (data.product.product_qty > 0) {
                        $('#qtyArea').show();
                    } else {
                        $('#qtyArea').hide();
                    }

                    // Product Add To Cart Area
                    if (data.product.product_qty > 0) {
                        $('#addToCartArea').show();
                    } else {
                        $('#addToCartArea').hide();
                    }

                    if (data.product.product_color_en == null) {
                        $('#productColorArea').hide();
                    }else {
                        $('#productColorArea').show();
                    }

                    // Product Color Bangla
                    $('select[name="pColorBn"]').empty();
                        $.each(data.colorBn, function (key, value) {
                            $('select[name="pColorBn"]').append('<option value=" ' + value + ' ">' + value + '</option>')
                    })
                    // Product Color English
                    $('select[name="pColorEn"]').empty();
                        $.each(data.colorEn, function (key, value) {
                            $('select[name="pColorEn"]').append('<option value=" ' + value + ' ">' + value + '</option>')
                    })

                    // Product Size Bnagla
                    $('select[name="pSizeBn"]').empty();
                    $.each(data.sizeBn, function (key, value) {
                        $('select[name="pSizeBn"]').append('<option value=" ' + value + ' ">' + value + '</option>')
                        if (data.sizeBn == '') {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    })
                    // Product Size English
                    $('select[name="pSizeEn"]').empty();
                    $.each(data.sizeEn, function (key, value) {
                        $('select[name="pSizeEn"]').append('<option value=" ' + value + ' ">' + value + '</option>')
                        if (data.sizeEn == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    })

                }
            })
        }
        // End Product Details View (On Cart) With Modal

        // Start Product Buying info (To Cart)
        function addToCart(id) {
            var id = $('#product_id').val();
            var name = $('#pNameBn').text();
            var name = $('#pNameEn').text();
            var color = $('#product_color option:selected').text();
            var size = $('#product_size option:selected').text();
            var qty = $('#pQty').val();

            // console.log(name)
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/cart/data/store/" + id,
                data: {
                    prod_name: name,
                    color: color,
                    size: size,
                    quantity: qty,
                },
                success: function (data) {
                    // alert(id)
                    // console.log(data);

                    miniCartInfo();
                    $('#closeModal').click();

                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }

            })
        }
        // End Product Buying info (To Cart)

        // Start Product Info Show On Public Page (Mini Cart)
        function miniCartInfo() {
            $.ajax({
                type: 'GET',
                url: '/product/mini-cart/info',
                dataType: 'json',
                success: function (response) {
                    $('span[id="cartProductPrice"]').text(response.cartTotalPrice);
                    $('#cartProductQty').text(response.cartQuantity);
                    var miniCart = "";
                    $.each(response.carts, function (key, value) {
                        miniCart += `
									<div class="cart-item product-summary">
										<div class="row">
											<div class="col-xs-4">
												<div class="image">
													<a href="#"><img src="/${value.options.image}" alt=""></a>
												</div>
											</div>
											<div class="col-xs-7">

												<h3 class="name"><a href="#">${value.name}</a>
												</h3>
												<div class="price">${value.price} * ${value.qty}</div>
											</div>
											<div class="col-xs-1 action">
												<button type="submit" id="${value.rowId}" onclick="miniCartProductRemove(this.id)" href="#"><i class="fa fa-trash"></i></button>
											</div>
										</div>
									</div><!-- /.cart-item -->
									<div class="clearfix"></div>
									<hr>
                                `
                    });
                    $('#miniCartArea').html(miniCart);
                },
            });
        }
        miniCartInfo();
        // End Product Info Show On Public Page (Mini Cart)

        // Product Remove From Mini Cart Start
        function miniCartProductRemove(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/miniCart/product-remove/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // cosole.log(data)
                    miniCartInfo();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
        // Product Remove From Mini Cart End

        // Product Add On Wishlist Start
        function addToWishlist(productId) {
            // alert(productId);
            $.ajax({
                type: 'GET',
                url: "{{ url('/product/add/wishlist') }}" + '/' + productId,
                dataType: 'json',
                success: function (data) {
                    // cosole.log(data)
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
        // Product Add On Wishlist End


           // Start Product Info Show On Wishlist Page
           function wishlistProduct() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/user/wishlist-products/view') }}",
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    var rows = "";
                    $.each(response,function (key, value) {
                        rows += `
                                    <tr>
                                        <td class="col-md-2"><img src="/${value.wishlist_prod.product_thumbnail}" alt="img"></td>
                                        <td class="col-md-7">
                                            <div class="product-name"><a href="#">${value.wishlist_prod.product_name_en}</a></div>
                                            <div class="price">
                                                $${value.wishlist_prod.discount_price}
                                                <span>$${value.wishlist_prod.actual_price}</span>
                                            </div>
                                        </td>
                                        <td class="col-md-2">
                                            <button type="button" data-toggle="modal" data-target="#cartModal"
                                                 id="${value.product_id}" onclick="productView(this.id)"
                                                  href="#" class="btn-upper btn btn-primary">
                                                  Add to cart
                                            </button>
                                        </td>
                                        <td class="col-md-1 close-btn">
                                            <button type="submit" id="${value.product_id}" onclick="WishlistProductRemove(this.id)" href="#"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                `
                    });
                    // console.log(rows);
                    $('#wishlistProduct').html(rows);
                },
            });
        }
        wishlistProduct();
        // End Product Info Show On Wishlist Page

        // Start Wishlist Product Remove from Page
        function  WishlistProductRemove(prodId){
            //    alert(prodId);
               $.ajax({
                type: 'GET',
                url: '/user/wishlist/product-remove/' + prodId,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    wishlistProduct();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
        // End Wishlist Product Remove from Page

       // Start Product Info Show On Cart Page
       function cartPageProduct() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/cart-products/view') }}",
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    var cartItem = "";
                    $.each(response.carts, function (key, value) {
                        cartItem += `
                                    <tr>
                                        <td class="col-md-2"><img src="/${value.options.image}" alt="img" style="width:100px; height:120px;"></td>

                                        <td class="col-md-3">
                                            <div class="product-name"><a href="#">${value.name}</a></div>
                                            <div class="price">
                                                $${value.price}
                                            </div>
                                        </td>

                                        <td class="col-md-1">
                                            ${ value.options.color == null
                                                ? `<span>....</span>`
                                                : `<strong>${value.options.color}</strong>`
                                            }
                                        </td>

                                        <td class="col-md-1">
                                            ${ value.options.size == null
                                                ? `<span>....</span>`
                                                : `<strong>${value.options.size}</strong>`
                                            }
                                        </td>

                                        <td class="col-md-2">
                                            <div class="price" style="font-weight:bold">
                                                ${value.price}*${value.qty}=${value.subtotal}
                                            </div>
                                        </td>

                                        <td class="col-md-2">
                                            ${value.qty > 1
                                            ? `<button type="submit" id="${value.rowId}" onclick="CartDecrement(this.id)" class="btn btn-danger btn-sm">-</button>`
                                            : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button>`
                                            }
                                            <input type="text" name="" id="" value="${value.qty}" min="1" max="100" disabled style="width:30px; height:40px;">
                                            <button type="submit" id="${value.rowId}" onclick="CartIncrement(this.id)" class="btn btn-success btn-sm">+</button>

                                        </td>

                                        <td class="col-md-1" style="margin:0px; padding:0px">
                                            <button type="submit" id="${value.rowId}" style="color: #ff7878;border: 2px solid #ff7878;border-radius: 4px; height:35px; width:28px;"
                                            onclick="CartProductRemove(this.id)" href="#" title="Remove"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                `
                    });
                    // console.log(cartItem);
                    $('#cartProduct').html(cartItem);
                },
            });
        }
        cartPageProduct();
        // End Product Info Show On Cart Page


        // Product Remove From Mini Cart Start
        function CartProductRemove(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/cart/product-remove/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    cartPageProduct();
                    miniCartInfo();
                    couponCalculatedData();
                    $('#CouponField').show();
                    // $('#CouponField').css('display','');
                    $('#coupon_name').val('');

                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
        // Product Remove From Mini Cart End

         // Start Product Increment On Cart Page
         function CartIncrement(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/cart/product-increment/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    couponCalculatedData();
                    cartPageProduct();
                    miniCartInfo();
                }

            });
        }
         // End Product Increment On Cart Page

         // Start Product Decrement On Cart Page
         function CartDecrement(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/cart/product-decrement/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    couponCalculatedData();
                    cartPageProduct();
                    miniCartInfo();
                }

            });
        }
         // End Product Decrement On Cart Page
    </script>

    <script>

         // Start Cart Page Coupon Apply With Ajax
         function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            // alert(coupon_name);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data:{coupon_name:coupon_name},
                url: "{{ url('/coupon-apply') }}",
                success: function (data) {
                    console.log(data);
                    couponCalculatedData();
                    $('#CouponField').hide();
                    // $('#CouponField').css('display','none');
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        $('#coupon_name').val('');
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
         // End Cart Page Coupon Apply With Ajax

         // Start Cart Page Coupon Applied Data With Ajax
         function couponCalculatedData(){
            $.ajax({
                type: 'GET',
                url: '/cart-page/coupon-calculated-data',
                dataType: 'json',
                success: function (data) {
                    if (data.totalprice) {
                        $('#CouponField').css('display','');
                        $('#couponCalculatedDataField').html(
                            `
								<tr>
									<th>
										<div class="cart-sub-total">
											Subtotal<span class="inner-left-md">$ ${data.totalprice}</span>
										</div>
										<div class="cart-grand-total">
											Grand Total<span class="inner-left-md">$ ${data.totalprice}</span>
										</div>
									</th>
								</tr>

                            `
                        )
                    } else {
                        $('#couponCalculatedDataField').html(
                            `
								<tr>
									<th>
										<div class="cart-sub-total">
											Subtotal<span class="inner-left-md">$${data.subTotal}</span>
										</div>
										<div class="cart-sub-total">
											Coupon Name<span class="inner-left-md">${data.coupon_name}</span>
                                            <button type="submit" id="" onclick="CouponRemove()" href="#"><i class="fa fa-times"></i></button>
										</div>
										<div class="cart-sub-total">
											Discount Amount<span class="inner-left-md">$${data.discount_amount_withCoupon}</span>
										</div>
										<div class="cart-grand-total">
											Grand Total<span class="inner-left-md">$${data.total_amount}</span>
										</div>
									</th>
								</tr>

                            `
                        )
                    }
                }

            });
         }
         couponCalculatedData();
         // End Cart Page Coupon Applied Data With Ajax

         // Start Cart Page Applied Coupon Data Remove With Ajax
            function CouponRemove(){
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: "{{ url('/applied-coupon-remove') }}",
                    success: function (data) {
                        couponCalculatedData();
                        // $('#CouponField').show();
                        $('#CouponField').css('display','');
                        $('#coupon_name').val('');
                        //  start message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'message',
                                title: data.success
                            })
                        } else {
                            $('#coupon_name').val('');
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }
                        //  end message
                    }
                });
            }
         // End Cart Page Applied Coupon Data Remove With Ajax
    </script>

    @yield('script')

</body>

</html>
