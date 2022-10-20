<!-- ================================== TOP NAVIGATION ================================== -->

@php
$categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> @if (Session()->get('language') ==
        'bangla') আমাদের পণ্যের বিভাগ সমূহ @else Categories @endif </div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">

            @foreach ($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{-- <i class="icon fa fa-shopping-bag" aria-hidden="true"></i> --}}
                    <img src=" {{ asset($category->category_image) }} " alt="" height="40" width="40">
                    {{-- Adding Spaces --}} &nbsp;
                    @if (Session()->get('language') == 'bangla')
                    {{ $category->category_name_bn }}
                    @else
                    {{ $category->category_name_en }}
                    @endif
                </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        @php
                        $subcategories =
                        App\Models\Subcategory::where('category_id',$category->category_id)->orderBy('subcategory_name_en','ASC')->get();
                        @endphp
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                @foreach ($subcategories as $subcategory)
                                <ul class="links list-unstyled">
                                    @if (Session()->get('language') == 'bangla')
                                    <li><a href="#"> {{ $subcategory->subcategory_name_bn }} </a></li>
                                    @else
                                    <li><a href="#"> {{ $subcategory->subcategory_name_en }} </a></li>
                                    @endif
                                </ul>
                                @endforeach
                            </div>

                        </div> <!-- /.row -->
                    </li><!-- /.yamm-content -->
                </ul><!-- /.dropdown-menu -->
            </li><!-- /.menu-item -->
            @endforeach

        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
