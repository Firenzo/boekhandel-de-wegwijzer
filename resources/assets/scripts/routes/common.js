export default {
    init() {
        // JavaScript to be fired on all pages
        let lastScrollTop = 0;
        const mobileMenuButton = document.querySelector('header.secondary button.mobileMenuButton')
        const footerCopyrightBox = document.querySelector('footer.content-info div.footer-copyright span')
        const secondaryHeader = document.querySelector('header.secondary');
        const menuList = document.querySelector('header.secondary nav.mobile');
        const closeMenuButton = document.querySelector('header.secondary nav.mobile button');

        let clicksRegistered = 0; // for category page

        const setMenuButton = () => {
            if (window.innerWidth >= 834 ) {
                mobileMenuButton.innerHTML = 'Kies categorie <i class="fas fa-chevron-down"></i>';
                document.querySelector('body').classList.remove('noScroll')
            } else {
                mobileMenuButton.innerHTML = '<i class="fas fa-bars"></i>';
            }

            if (window.innerWidth >= 1024) {
                secondaryHeader.classList.remove('hideHeader');
            }

            if (window.location.pathname.includes('/categorie/') && window.innerWidth < 1200) {
                document.querySelector('button.show-filter-options').classList.remove('hide')
            }

            if (window.location.pathname.includes('/categorie/') && window.innerWidth >= 1200) {
                document.querySelector('button.show-filter-options').classList.add('hide')
                document.querySelector('section.product-archive-filter').classList.remove('show')
                clicksRegistered = 0;
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
                        closeMenu();
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

        let amountOfClicksRegistered = 0;

        const openMenu = () => {
            document.querySelector('html').addEventListener('click', checkforClicksOutsideOfMenu)

            menuList.classList.add('showMenu');
            if (window.innerWidth < 834) {
                document.querySelector('body').classList.add('noScroll');
            }
        }

        const closeMenu = () => {
            document.querySelector('html').removeEventListener('click', checkforClicksOutsideOfMenu)

            menuList.classList.remove('showMenu');
            document.querySelector('body').classList.remove('noScroll');
            amountOfClicksRegistered = 0;
        }

        const checkforClicksOutsideOfMenu = (event) => {
            if (!$(event.target).closest('header.secondary nav.mobile').length) {
                amountOfClicksRegistered += 1;
                console.log(amountOfClicksRegistered);
                if (amountOfClicksRegistered >= 2) {
                    closeMenu();
                }
            }
        }

        const checkMenu = (e) => {
            e.preventDefault();
            if (menuList.classList.contains('showMenu')) {
                closeMenu();
            } else {
                openMenu();
            }
        }

        window.addEventListener('scroll', function(){
            if (window.innerWidth < 1024) {
                let speed = checkScrollSpeed()
                console.log(speed);
                if (speed > 7) {
                    secondaryHeader.classList.add('hideHeader')
                    menuList.classList.remove('showMenu')
                }

                if (speed < -15) {
                    secondaryHeader.classList.remove('hideHeader')
                }
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
            if (document.querySelector('article.two-columns')) {
                document.querySelector('article.two-columns').classList.add('add-space')
            }
        }

        window.addEventListener('resize', setMenuButton)
        mobileMenuButton.addEventListener('click', checkMenu);
        closeMenuButton.addEventListener('click', checkMenu);
        footerCopyrightBox.innerHTML =  `&copy; Boekhandel De Wegwijzer ${new Date().getFullYear()}`
        setMenuButton();
        
        if(window.location.pathname === '/'){
            setup();
        }

        if (!!document.getElementById('wpadminbar')) {
            secondaryHeader.classList.add('addMoreSpace')
        }

        //Code for Product Archive page

        if(window.location.pathname.includes('/categorie/') || window.location.pathname.includes('/shop')) {
            const filterButton = document.querySelector('button.show-filter-options');
            const filterOptions = document.querySelector('section.product-archive-filter');
            const applyFilterButton = document.querySelector('button.apply-filter-button');
            const subCategories = document.querySelectorAll('fieldset.subcategories-filter>div.checkbox-and-label>input[type=\"checkbox\"]');
            const minimumPriceFilter = document.querySelector('fieldset.price-filter input[name=\"minumum-price\"]');
            const maximumPriceFilter = document.querySelector('fieldset.price-filter input[name=\"maximum-price\"]');
            const filterErrors = {maxPrice: false, minPrice: false, noMatch: false};
            const errorMessages = {
                maxPrice: document.querySelector('fieldset.price-filter p.price-filter-error-text.max-price'),
                minPrice: document.querySelector('fieldset.price-filter p.price-filter-error-text.min-price'),
                noMatch: document.querySelector('fieldset.price-filter p.price-filter-error-text.no-match'),
            }
            const sortOptions = document.querySelector('select.orderby');
            let searchQuery = '';
            let searchQueryObject = {};

            const openFilter = () => {
                document.querySelector('html').addEventListener('click', checkforClicksOutsideOfFilter)
                filterOptions.classList.add('show');
            }

            const closeFilter = () => {
                document.querySelector('html').removeEventListener('click', checkforClicksOutsideOfFilter)
                filterOptions.classList.remove('show');
                clicksRegistered = 0;
            }

            const checkFilter = (e) => {
            e.preventDefault();
                if (filterOptions.classList.contains('show')) {
                    closeFilter();
                } else {
                    openFilter();
                }
            }

            const checkforClicksOutsideOfFilter = (event) => {
                if (!$(event.target).closest('section.product-archive-filter').length) {
                    clicksRegistered += 1;
                    console.log(clicksRegistered);
                    if (clicksRegistered >= 2) {
                        closeFilter();
                    }
                }
            }

            const applyFilters = (event) => {
                event.preventDefault();
                console.log(subCategories);

                for (let i=0; i<subCategories.length; i++) {
                    if (subCategories[i].checked) {
                        console.log(subCategories[i].name, subCategories[i].checked);
                        searchQueryObject[subCategories[i].name] = subCategories[i].value;
                    }
                }

                //Price filter error check
                if (!!maximumPriceFilter.value || !!minimumPriceFilter.value) {
                    filterErrors.noMatch = false
                    errorMessages.noMatch.classList.remove('show');
                    !!maximumPriceFilter.value ? filterErrors.maxPrice = false : filterErrors.maxPrice = true;
                    !!minimumPriceFilter.value ? filterErrors.minPrice = false : filterErrors.minPrice = true;
                    !!filterErrors.minPrice ? errorMessages.minPrice.classList.add('show') : errorMessages.minPrice.classList.remove('show');
                    !!filterErrors.maxPrice ? errorMessages.maxPrice.classList.add('show') : errorMessages.maxPrice.classList.remove('show');
                }

                if (!maximumPriceFilter.value && !minimumPriceFilter.value) {
                    filterErrors.minPrice = false;
                    filterErrors.maxPrice = false;
                    errorMessages.minPrice.classList.remove('show');
                    errorMessages.maxPrice.classList.remove('show');
                }

                if (!!maximumPriceFilter.value && !!minimumPriceFilter.value) {
                    parseInt(minimumPriceFilter.value) < parseInt(maximumPriceFilter.value) ? filterErrors.noMatch = false : filterErrors.noMatch = true;
                    !!filterErrors.noMatch ? errorMessages.noMatch.classList.add('show') : errorMessages.noMatch.classList.remove('show');
                }



                console.log(filterErrors);
                console.log(searchQueryObject);
            } 

            if (window.location.search === '') {
                console.log('no query')
            } else {
                searchQuery = window.location.search.substring(1);
                searchQueryObject = JSON.parse('{\"' + searchQuery.replace(/&/g, '\",\"').replace(/=/g,'\":\"') + '\"}', function(key, value) { return key==='' ? value:decodeURIComponent(value) });
                console.log(searchQueryObject);

                if (searchQueryObject.orderby) {
                    sortOptions.value = searchQueryObject.orderby;
                }

                if (subCategories) {
                    for (let i=0; i<subCategories.length; i++) {
                        
                        if (searchQueryObject[subCategories[i].name] === 'on') {
                            subCategories[i].checked = true;
                        }
                    }
                }
            }

            applyFilterButton.addEventListener('click', applyFilters);
            filterButton.addEventListener('click', checkFilter);

        }
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
