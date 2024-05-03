@if ($items)
<section class='wp-block-acf-image-grid {{ $block->classes }} @if ($block->style == 'light')text-black @endif'>
  <div class="container">
    <div class="row">
      @foreach ($items as $item)
        <div class="col-6 col-md-4 col-lg-2">
          <img src="{{ $item['image'] }}">
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif