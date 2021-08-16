<header class="banner">
    <div class="header-content">
        <div class="container">
            <a class="brand-logo" href="{{ home_url('/') }}"><img src="@asset('images/logo-white.svg')" alt=""></a>
            <h2 class="headline"><?php echo get_bloginfo('description') ?></h2>
            <a href="#" class="button">Shop nu!</a>
        </div>
    </div>

    <div class="shop-navigation">
        <div class="container">
        <h2>Waar bent u naar op zoek?</h2>
            <div class="categories">
                <a href="#" class="button transparent"><i class="fas fa-book"></i> Boeken</a>
                <a href="#" class="button transparent"><i class="fas fa-gift"></i> Cadeau's</a>
                <a href="#" class="button transparent"><i class="fas fa-bible"></i> Bijbels</a>
            </div>

            <div class="search">
                <input type="text" placeholder="Bijvoorbeeld: Gebedsboek, kaarten, luisterboeken, kinderboeken"><!--
                --><a href="#" class="button"><i class="fas fa-search"></i></a>
            </div>
        </div>  
    </div>

    <nav class="nav-primary">
        @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
    </nav>
</header>