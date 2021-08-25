// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

import {library, dom} from '@fortawesome/fontawesome-svg-core';
import {faShoppingCart, faBook, faGift, faBible, faSearch, faMapMarkerAlt, faPhone, faEnvelope, faChevronRight, faBars, faChevronDown} from '@fortawesome/free-solid-svg-icons';
import {faFacebook, faInstagram} from '@fortawesome/free-brands-svg-icons';

library.add(faShoppingCart, faBook, faGift, faBible, faSearch, faMapMarkerAlt, faPhone, faEnvelope, faFacebook, faInstagram, faChevronRight, faBars, faChevronDown);
dom.watch();

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
