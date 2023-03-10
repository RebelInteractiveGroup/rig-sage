<header class="banner">
  <nav class="navbar navbar-dark navbar-expand-md">
    <div class="container-fluid nav-container">
      <div class="utility-container">
        <div class="container">
          <div class="utility-cta">
            @if (has_nav_menu('utility_navigation'))
              {!! wp_nav_menu($utilityMenu) !!}
            @endif
          </div>
        </div>
      </div>
      <div class="primary-container">
        <div class="d-flex flex-column flex-md-row container-lg">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{ home_url('/') }}">
              {{-- {!! wp_get_attachment_image() !!} --}}
            </a>
            <button id="hamburger-menu-item" class="hamburger hamburger--squeeze d-md-none" type="button"
              data-bs-toggle="collapse" data-bs-target="#primaryNavbar" aria-controls="primaryNavbar"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="primaryNavbar">
            @if (has_nav_menu('primary_navigation'))
              {!! wp_nav_menu($primaryMenu) !!}
            @endif
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
