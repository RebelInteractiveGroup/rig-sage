<section class="{{ $block->classes }}">
  <div class="hero-container swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        @if ($hero['background_type'] == 'video' && $hero['background_video'])
          <div class="video-wrapper">
            <video autoplay loop muted playsinline id="hero-video">
              <source src="{{ $hero['background_video']['url'] }}" type="video/mp4">
            </video>
            <div class="video-overlay"></div>
        @endif
        <div class="hero-wrapper slide-inner"
          style="@if ($hero['background_type'] == 'image' && $hero['background_image']) background-image: url('{{ $hero['background_image']['url'] }}') @endif">
          <div class="hero-content">
            <div class="container">
              <h1 class="hero-title h1-alt">{!! $hero['heading'] !!}</h1>
              <p class="hero-subheading @if ($hero['small_subheading']) h3-large @else h1-large @endif">
                {!! $hero['subheading'] !!}</p>
              @if ($hero['button'])
                <a href="{{ $hero['button']['url'] }}" class="btn btn-text">{{ $hero['button']['title'] }}</a>
              @endif
            </div>
          </div>
        </div>
        @if ($hero['background_type'] == 'video' && $hero['background_video'])
      </div>
      @endif
    </div>
  </div>
  </div>
</section>
