<footer class="content-info">
  @php(dynamic_sidebar('sidebar-footer'))

  <div class="footer-menu">
  @if (has_nav_menu('footer_navigation'))
    {!! wp_nav_menu($footerMenu) !!}
  @endif
  </div>

  <div class="footer-bottom">
    <p>Digital Marketing by Rebel Interactive Group.</p>
  </div>
</footer>
