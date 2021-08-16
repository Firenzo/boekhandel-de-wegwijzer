export default {
  init() {
    // JavaScript to be fired on all pages
    document.querySelector('footer.content-info div.footer-copyright span').innerHTML =  `&copy; Boekhandel De Wegwijzer ${new Date().getFullYear()}`

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
