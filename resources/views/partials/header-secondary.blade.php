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
        		<li class="about"><a href="/over-ons">Over Ons</a></li>
        		<li class="news"><a href="/nieuws">Nieuws</a></li>
        		<li class="contact"><a href="/contact">Contact</a></li>
        		<li class="shopping-cart"><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
        	</ul>
        </nav>

        <nav class="mobile" style>
    		<button><i class="fas fa-times"></i></button>

        	<section class="shop-links">
        		<h1>Categorieën:</h1>
	    		<ul>
		        	<li><a href="#"><i class="fas fa-book"></i> Boeken</a></li>
		    		<li><a href="#"><i class="fas fa-gift"></i> Cadeau's</a></li>
		    		<li class="last-item"><a href="#"><i class="fas fa-bible"></i> Bijbels</a></li>
		    		<li class="shopping-cart"><a href="/contact"><i class="fas fa-shopping-cart"></i> Winkelwagen</a></li>
	    		</ul>
        	</section>
        	<section class="main-links">
        		<h1>Ontdek:</h1>
	    		<ul>
		        	<li class="about"><a href="/over-ons"><i class="fas fa-info"></i> Over Ons</a></li>
		    		<li class="news"><a href="/nieuws"><i class="fas fa-newspaper"></i> Nieuws</a></li>
		    		<li class="contact"><a href="/contact"><i class="fas fa-comment"></i> Contact</a></li>
	    		</ul>
        	</section>
        	
        </nav>
	</div>
</header>