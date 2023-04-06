import domReady from '@roots/sage/client/dom-ready';
// Import Bootstrap
import 'bootstrap';

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
