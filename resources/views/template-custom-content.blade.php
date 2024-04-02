{{--
  Template Name: ASHA Content Page Template
--}}

@extends('layouts.app')

@section('content')
  <div class="container">
    @include('partials.page-header')

    <div class="row">
    @if(get_field('template_type') === 'sidebar')
      <div class="sidebar col-12 col-md-3">
        @include('sections.sidebar')
      </div>
      <div class="content col-12 col-md-9">
    @else
      <div class="content col-12">
    @endif
        <h1>{!! get_the_title() !!}</h1>

        {!! the_content() !!}

        @while (have_posts())
          @php(the_post())

          @includeFirst(['partials.content-' . get_field('content_type'), 'partials.content'])
        @endwhile

        <div class="pagination-container">
          {!! bootstrap_pagination() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
