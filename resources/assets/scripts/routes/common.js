export default {
    init() {
        // JavaScript to be fired on all pages
        let lastScrollTop = 0;

        const setMenuButton = () => {
            if (window.innerWidth >= 834 ) {
                document.querySelector('header.secondary button.mobileMenuButton').innerHTML = 'Kies categorie <i class="fas fa-chevron-down"></i>';
            } else {
                document.querySelector('header.secondary button.mobileMenuButton').innerHTML = '<i class="fas fa-bars"></i>';
            }
        }
        document.querySelector('footer.content-info div.footer-copyright span').innerHTML =  `&copy; Boekhandel De Wegwijzer ${new Date().getFullYear()}`
        window.addEventListener('resize', setMenuButton)

        if (window.location.pathname != '/') {
            window.addEventListener('scroll', function(){
                 let st = window.pageYOffset || document.documentElement.scrollTop;
                 if (st > lastScrollTop){
                        //if statement toevoegen. Als class al bestaat
                        document.querySelector('header.secondary').classList.add('hideHeader')
                 } else {
                        document.querySelector('header.secondary').classList.remove('hideHeader')
                 }
                 lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
            }, false);
        }

        setMenuButton();

    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
