@php
  $cta = get_field('header_cta');
  $content = get_field('header_content');
@endphp

<div class="wp-block-cover page-header {!! is_front_page() ? 'home-hero' : 'hero' !!}">
  @if (!empty($headerBGImage))
    {!! wp_get_attachment_image($headerBG['ID'], 'full', false, [
        'loading' => 'eager',
        'class' => 'wp-block-cover__image-background desktop',
    ]) !!}
  @elseif(!empty($headerBGVideoEmbed))
    <div class="cover-background-replacement header-video embed-responsive embed-responsive-16by9">
      {!! $headerBGVideoEmbed !!}
    </div>
  @elseif(!empty($headerBGVideoFile))
    {!! $headerBGVideoEmbed !!}
  @endif

  <div class="wp-block-cover__inner-container">
    @if (!empty($cta['link']))
      <div class="hero-container">
        <div class="block-hero-cta">
          <h1 class="hero-heading">{!! $cta['heading'] !!}</h1>
          <div class="hero-content">{!! $cta['content'] !!}</div>
          <div class="wp-block-buttons d-flex justify-content-center justify-content-md-start">
          @if (!empty($cta['link']))
            <div class="wp-block-button is-style-btn-outline">
              <a class="wp-block-button__link" href="{{ $cta['link']['url'] }}" role="button">
                {{ $cta['link']['title'] }}
              </a>
            </div>
          @endif
          </div>
        </div>
      </div>
    @endif
    @if (!empty($content))
      {!! $content !!}
    @endif
  </div>
</div>