<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="This is an ecommerce website based on laravel name Easy Shopping">
    <meta name="author" content="Waliul Hasan">
    <meta name="keywords" content="online store, online business, ecom, ecommerce website, shopping cart, e business, ecommerce platforms">
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
                    <h5 class="modal-title" id="exampleModalLabel"> <span id="pName"></span> </h5>
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
                                <li class="list-group-item">
                                    Price:
                                    <strong class="text-danget" class="text-info">
                                        $<span id="pPrice"></span>
                                        <del id="oldPrice" class="text-danger"></del>
                                    </strong>
                                </li>
                                <li class="list-group-item">Code: <strong id="pCode" class="text-info"></strong></li>
                                <li class="list-group-item">Category: <strong id="pCategory" class="text-info"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pBrand" class="text-info"></strong></li>
                                <li class="list-group-item">Stock:
                                    <span class="label label-success" id="available"></span>
                                    <span class="label label-danger" id="stockout"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="product_color">Product Color:</label>
                              <select class="form-control" id="product_color" name="pColor">
                              </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                              <label for="product_size">Product Size:</label>
                              <select class="form-control" id="product_size" name="pSize">
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="pQty">Quantity:</label>
                              <input type="text" class="form-control" id="pQty" value="" min="1">
                            </div>
                            <input type="hidden" name="product_id" id="product_id">
                            <button type="submit" class="btn btn-primary" onclick="addToCart()">Add To Cart</button>
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
    {{-- ################## Sweetalert 2 ###################--}}
    <script src=" {{ asset('backend') }}/lib/sweetalert/sweetalert2.all.min.js "></script>

    {{-- Modal Ajax request Start --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
        // Start Product View ( On Cart) With Modal
        function productView(id){
            // alert(id)
            $.ajax({
                type:'GET',
                url:'product/view/withModal/'+id,
                dataType:'json',
                success:function(data){
                    // console.log(data)
                    $('#pName').text(data.product.product_name_en);
                    $('#pPrice').text(data.product.discount_price);
                    $('#pCode').text(data.product.product_code);
                    $('#pCategory').text(data.product.category_id);
                    $('#pBrand').text(data.product.brand_id);
                    $('#pImage').attr('src','/'+data.product.product_thumbnail);

                    $('#product_id').val(id);
                    $('#pQty').text(data.product.product_qty)

                    // Product Price
                    if (data.product.discount_price == null) {
                        $('#pPrice').text('');
                        $('#oldPrice').text('');
                        $('#pPrice').text(data.product.actual_price);
                    } else{
                        $('#pPrice').text(data.product.discount_price);
                        $('#oldPrice').text(data.product.actual_price);

                    }

                    // Product Stock Status
                    if (data.product.product_qty > 0) {
                        $('#available').text('');
                        $('#stockout').text('');
                        $('#available').text('Available');
                    }else{
                        $('#available').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Stock Out');
                    }

                    // Product Color
                    $('select[name="pColor"]').empty();
                    $.each(data.color, function(key, value){
                        $('select[name="pColor"]').append('<option value=" '+value+' ">' +value+ '</option>')
                    })

                    // Product Size
                    $('select[name="pSize"]').empty();
                    $.each(data.size, function(key, value){
                        $('select[name="pSize"]').append('<option value=" '+value+' ">' +value+ '</option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        }else {
                            $('#sizeArea').show();
                        }
                    })
                }
            })
        }
        // End Product View (On Cart) With Modal

        // Start Product Buying info (To Cart)
        function addToCart(id){
            var id = $('#product_id').val();
            var name = $('#pName').text();
            var color = $('#product_color option:selected').text();
            var size = $('#product_size option:selected').text();
            var qty = $('#pQty').val();

            // console.log(name)
            $.ajax({
                type:'GET',
                dataType:'json',
                url: "/cart/data/store/"+id,
                data:{
                    prod_name:name,
                    color:color,
                    size:size,
                    quantity:qty,
                },
                success:function(data){
                    miniCartInfo();
                    // alert(id)
                    // console.log(data)
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
        function miniCartInfo(){
            $.ajax({
                type:'GET',
                url:'/product/mini-cart/info',
                dataType:'json',
                success:function(response){
                    $('span[id="cartProductPrice"]').text(response.cartTotalPrice);
                    $('#cartProductQty').text(response.cartQuantity);
                    var miniCart = "";
                    $.each(response.carts, function(key, value){
                        miniCart += `
									<div class="cart-item product-summary">
										<div class="row">
											<div class="col-xs-4">
												<div class="image">
													<a href="#"><img src=" /${value.options.image}" alt=""></a>
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
            function miniCartProductRemove(rowId){
                // alert(rowId);
                $.ajax({
                    type:'GET',
                    url:'/miniCart/product-remove/'+rowId,
                    dataType:'json',
                    success:function(data){
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
        function addToWishlist(productId){
            // alert(productId);
            $.ajax({
                type: 'GET',
                url: "{{ url('user/product/add/wishlist') }}" + '/' + productId,
                dataType: 'json',
                success:function(data){
                    console.log(data);
                }
            });
        }
        // Product Add On Wishlist End



    </script>
    {{-- Modal Ajax request End --}}

</body>

</html>
