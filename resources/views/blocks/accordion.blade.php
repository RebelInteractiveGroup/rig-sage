@if ($items)
  @php($hasParent = str_contains($block->classes, 'is-style-with-parent'))
  <div class="{{ $block->classes }}">
    <div class="accordion accordion-flush" id="{{ $block->id }}">
      @foreach ($items as $key => $item)
        <div class="accordion-item">
          <h4 class="accordion-header">
            <button data-bs-toggle="collapse" type="button"
              class="accordion-button {{ 'bg-' . $item['background'] }} {!! ($hasParent && $key == 0) || !$hasParent ? '' : 'collapsed' !!}"
              aria-expanded="{!! ($hasParent && $key == 0) || !$hasParent ? 'true' : 'false' !!}"
              data-bs-target="#item-{{ $key }}"
              aria-controls="item-{{ $key }}">
              {{ $item['header'] }}
            </button>
          </h4>
          <div id="item-{{ $key }}"
            class="accordion-collapse collapse {!! ($hasParent && $key == 0) || !$hasParent ? 'show' : '' !!}"
            @if ($hasParent) data-bs-parent="#{{ $block->id }}" @endif>
            <div class="accordion-body bg-light-gray">
              {!! $item['content'] !!}
              @if ($item['link'])
              <div class="wp-block-button is-style-outline">
                <a href="{!! $item['link']['url'] !!}"  class="wp-block-button__link has-text-align-center wp-element-button">
                {{ $item['link']['title'] }}
                </a>
              </div>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@else
  <p>{{ $block->preview ? 'Add an item...' : 'No items found!' }}</p>
@endif
