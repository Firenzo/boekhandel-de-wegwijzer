@extends('layouts.app')

@section('content')
  {{-- @include('partials.page-header') --}}

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
<div class="news-list">
  <h1>Nieuws</h1>
  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
    @include('partials.content-'.get_post_type())
  @endwhile
</div>
  {!! get_the_posts_navigation() !!}
  @php 
    global $wp_query;
    echo $wp_query->max_num_pages;
  @endphp
@endsection
