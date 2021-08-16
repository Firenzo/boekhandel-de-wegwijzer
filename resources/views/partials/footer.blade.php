{{-- <footer class="content-info">
    <div class="container">
        @php dynamic_sidebar('sidebar-footer') @endphp
    </div>
</footer> --}}


<footer class="content-info">
    <div class="main-footer-content">
        <div class="container">
            <div class="main-footer-content-logo">
                <div class="image">
                    <img src="@asset('images/logo-white.svg')" alt="De wegwijzer logo">
                </div>
            </div>

            <div class="main-footer-content-about">
                <h2>Over boekhandel de wegwijzer</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus porttitor ex orci, ut scelerisque lorem interdum sed. Integer vestibulum sed dui a sagittis. Etiam placerat rutrum nunc at suscipit. Donec cursus diam ac est molestie rhoncus.
                </p>
                <a href="#" class="button">Lees meer</a>
            </div>

            <div class="main-footer-content-contact">
                <h2>Contact</h2>
                <div class="contact-info address">
                    <i class="fas fa-map-marker-alt"></i>
                    <span> <?php echo get_option('woocommerce_store_address');?><br /><?php echo get_option('woocommerce_store_postcode');?>, <?php echo get_option('woocommerce_store_city');?></span>
                </div>
                <div class="contact-info phone-number">
                    <i class="fas fa-phone"></i>
                    <span>036 632 74 02</span>
                </div>
                <div class="contact-info email">
                    <i class="fas fa-envelope"></i>
                    <span class="address">boekhandel@dewegwijzer-almere.nl</span>
                </div>
                <div class="contact-info social-media">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <span id="copyright-text"></span>
    </div>
</footer>
