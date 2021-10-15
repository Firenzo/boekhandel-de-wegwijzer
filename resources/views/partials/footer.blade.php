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
                <a href="/over-ons" class="button">Lees meer</a>
            </div>

            <div class="main-footer-content-contact">
                <h2>Contact</h2>
                @include('partials.contact-info')
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <span id="copyright-text"></span>
    </div>
</footer>
