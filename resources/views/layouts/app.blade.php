<!doctype html>
<html {!! get_language_attributes() !!}>
    @include('partials.head')
    <body @php body_class() @endphp>
        @php do_action('get_header') @endphp
        @if (is_front_page())
            @include('partials.header-secondary')
            @include('partials.header')
        @else
            @include('partials.header-secondary')
        @endif
        @if (is_front_page())
            @include("partials.featured-products")
        @endif
        <div class="wrap container" role="document">
            <div class="content">
                <main class="main">
                    @yield('content')
                </main>
                @if (App\display_sidebar())
                    <aside class="sidebar">
                        @include('partials.sidebar')
                    </aside>
                @endif
            </div>
        </div>
        @if(is_page('contact'))
            <div class="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Makassarweg%2080&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com/elementor/">elementor pro discount</a><br><style>.mapouter{position:relative;text-align:right;}</style><a href="https://www.embedgooglemap.net">embed map in website</a><style>.gmap_canvas {overflow:hidden;background:none!important;}</style></div></div>
        @endif

        @if(get_post_type() == 'post' && !is_home() || is_front_page())
            @include('partials.latest-news')
        @endif

        @if(get_post_type() == 'product')
            <h1>Related products</h1>
        @endif

        @include('partials.footer')
        @php wp_footer() @endphp
    </body>
</html>
