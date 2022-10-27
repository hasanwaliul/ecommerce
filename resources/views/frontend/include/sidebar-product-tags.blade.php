<!-- ============================================== PRODUCT TAGS ============================================== -->

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if (Session()->get('language') == 'bangla')
                @foreach ($tags_bn as $tag)
                <a class="item" title="{{ $tag}}" href="{{ url('tagwise-product/show/' . $tag) }}"> {{ str_replace(',', ' ', $tag) }} </a>
                {{-- <a class="item" title="{{ $tag->product_tags_bn }}" href="{{ url('tagwise-product/show/' . $tag->product_tags_bn) }}"> {{ str_replace(',', ' ', $tag->product_tags_bn) }} </a> --}}
                @endforeach
            @else
                @foreach ($tags_en as $tag)
                <a class="item" title="{{ $tag }}" href=" {{ url('tagwise-product/show/' . $tag) }}"> {{ str_replace(',', ' ', $tag)  }} </a>
                {{-- <a class="item" title="{{ $tag->product_tags_en }}" href=" {{ url('tagwise-product/show/' . $tag->product_tags_en) }}"> {{ str_replace(',', ' ', $tag->product_tags_en)  }} </a> --}}
                @endforeach
            @endif
        </div><!-- /.tag-list -->
    </div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->
