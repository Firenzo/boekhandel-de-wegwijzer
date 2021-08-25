<!doctype html>
<html {!! get_language_attributes() !!}>
    @include('partials.head')
    <body @php body_class() @endphp>
        @php do_action('get_header') @endphp
        @if (is_front_page())
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
                <div class="image">
                        <?php echo get_the_post_thumbnail() ?>
                </div>
                @if (App\display_sidebar())
                    <aside class="sidebar">
                        @include('partials.sidebar')
                    </aside>
                @endif
            </div>
        </div>
        @include('partials.latest-news')
        @include('partials.footer')
        @php wp_footer() @endphp
    </body>
</html>
