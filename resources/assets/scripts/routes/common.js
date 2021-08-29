export default {
    init() {
        // JavaScript to be fired on all pages
        let lastScrollTop = 0;
        const mobileMenuButton = document.querySelector('header.secondary button.mobileMenuButton')
        const footerCopyrightBox = document.querySelector('footer.content-info div.footer-copyright span')
        const secondaryHeader = document.querySelector('header.secondary');

        const setMenuButton = () => {
            if (window.innerWidth >= 834 ) {
                mobileMenuButton.innerHTML = 'Kies categorie <i class="fas fa-chevron-down"></i>';
            } else {
                mobileMenuButton.innerHTML = '<i class="fas fa-bars"></i>';
            }
        }

        const setup = () => {
            const options = {
                rootMargin: '0px 0px 0px 0px',
            }

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting){
                        secondaryHeader.classList.add('noShow')
                    } else {
                        secondaryHeader.classList.remove('noShow')
                    }
                })
            }, options)

            const el = document.querySelector('header.banner')
            observer.observe(el);
        }

        const checkScrollSpeed = (function(settings) {
            settings = settings || {};

            let lastPos, newPos, timer, delta,
            delay = settings.delay || 50;

            function clear() {
                lastPos = null;
                delta = 0;
            }

            clear();

            return function() {
                newPos = window.scrollY;
                if (lastPos != null) { // && newPos < maxScroll
                    delta = newPos - lastPos;
                }
                lastPos = newPos;
                clearTimeout(timer);
                timer = setTimeout(clear, delay);
                return delta;
            };
        })();

        window.addEventListener('scroll', function(){
            let speed = checkScrollSpeed()
            console.log(speed);
            if (speed > 7) {
                secondaryHeader.classList.add('hideHeader')
            }

            if (speed < -15) {
                secondaryHeader.classList.remove('hideHeader')
            }
        }, false);

        if (window.location.pathname === '/') {
            secondaryHeader.classList.add('fixed')
            setTimeout(() => {
                secondaryHeader.classList.add('display')
            },1600)
        } else {
            secondaryHeader.classList.add('sticky')
            secondaryHeader.classList.add('display')
            document.querySelector('article.two-columns').classList.add('add-space')
        }

        window.addEventListener('resize', setMenuButton)
        footerCopyrightBox.innerHTML =  `&copy; Boekhandel De Wegwijzer ${new Date().getFullYear()}`
        setMenuButton();
        
        if(window.location.pathname === '/'){
            setup();
        }

        if (!!document.getElementById('wpadminbar')) {
            secondaryHeader.classList.add('addMoreSpace')
        }
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
