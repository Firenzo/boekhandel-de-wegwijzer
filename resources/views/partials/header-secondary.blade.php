<header class="secondary">
	<div class="container">
		<button class="mobileMenuButton">
        	<i class="fas fa-bars"></i>
        </button>

		<a href="{{ home_url('/') }}" class="brand-logo">
			<img src="@asset('images/logo-white.svg')" alt="Het logo van Boekhandel De Wegwijzer">
		</a>

		<div class="search">
            <input type="text" placeholder="Bijvoorbeeld: Gebedsboek, kaarten, luisterboeken, kinderboeken"><!--
            --><a href="#" class="button"><i class="fas fa-search"></i></a>
        </div>

        <nav class="secondary">
        	<ul>
        		<li class="about"><a href="#">Over Ons</a></li>
        		<li class="news"><a href="#">Nieuws</a></li>
        		<li class="shopping-cart"><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
        	</ul>
        </nav>
	</div>
</header>