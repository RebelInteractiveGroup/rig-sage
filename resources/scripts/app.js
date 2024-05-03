import domReady from '@roots/sage/client/dom-ready';

// Import Bootstrap
import Alert from 'bootstrap/js/dist/alert.js';
import Button from 'bootstrap/js/dist/button.js';
// import Ccarousel from 'bootstrap/js/dist/carousel.js';
import Collapse from 'bootstrap/js/dist/collapse.js';
import Dropdown from 'bootstrap/js/dist/dropdown.js';
// import Modal from 'bootstrap/js/dist/modal.js';
// import Offcanvas from 'bootstrap/js/dist/offcanvas.js';
import Popover from 'bootstrap/js/dist/popover.js';
import Scrollspy from 'bootstrap/js/dist/scrollspy.js';
import Tab from 'bootstrap/js/dist/tab.js';
// import Toast from 'bootstrap/js/dist/toast.js';
// import Tooltip 'bootstrap/js/dist/tooltip.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  const burger = document.getElementById('hamburger-menu-item');
  burger.addEventListener('click', () => {
    burger.classList.toggle('is-active');
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
