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
                            @foreach ($subcategories as $subcategory)
                                <div class="col-sm-12 col-md-3">
                                    @if (Session()->get('language') == 'bangla')
                                        <a href="{{ url('admin/subCatg-wise/products/' .$subcategory->subcategory_id . '/' . $subcategory->subcategory_slug_bn) }}"> {{ $subcategory->subcategory_name_bn }} </a>
                                    @else
                                        <a href="{{ url('admin/subCatg-wise/products/' .$subcategory->subcategory_id . '/' . $subcategory->subcategory_slug_en) }}"> {{ $subcategory->subcategory_name_en  }} </a>
                                    @endif
                                    <ul class="links list-unstyled">
                                        @php
                                            $subsubCateg = App\Models\SubsubCategory::where('subcategory_id', $subcategory->subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                        @endphp
                                        @foreach ($subsubCateg as $subsubCat)
                                            <li>
                                                @if (Session()->get('language') == 'bangla')
                                                    <a href="#"> {{ $subsubCat->subsubcategory_name_bn }} </a>
                                                @else
                                                    <a href="#"> {{ $subsubCat->subsubcategory_name_en  }} </a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach

                        </div> <!-- /.row -->
                    </li><!-- /.yamm-content -->
                </ul><!-- /.dropdown-menu -->
            </li><!-- /.menu-item -->
            @endforeach

        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
