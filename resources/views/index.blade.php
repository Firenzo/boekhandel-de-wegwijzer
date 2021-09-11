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
  @php
    global $wp_query;
      $number_of_pages = $wp_query->max_num_pages / 3 * 200;
      // $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $currentPage = 198;
      $prevPage = $currentPage - 1;
      $nextPage = $currentPage + 1;
  @endphp
</div>
  <nav class="pagination">
    <ul>
      @if($currentPage != 1)
        @php
          echo "<li class='prevButton'><a class='button' href='/nieuws/page/$prevPage'>Vorige</a></li>"
        @endphp
      @endif
      @php
      function renderListItems($begin, $end, $page) {
        for ($x = $begin; $x <= $end; $x++) {
          if ($x == $page) {
            echo "<li class='currentPage'><a class='button' href='/nieuws/page/$x'>$x</a></li>";
          } else {
            echo "<li><a class='button' href='/nieuws/page/$x'>$x</a></li>";
          };
        };
      };

      if ($number_of_pages <= 10) {
        renderListItems(1, $number_of_pages, $currentPage);
      } else if ($number_of_pages > 10) {

        if ($currentPage >= 6 && $number_of_pages - $currentPage < 6) {
          // add dots to begin of list;
          if ($number_of_pages - $currentPage <= 2) {
            $renderFrom = $currentPage - 4 - (3 + $currentPage - $number_of_pages);
            echo "<li><a class='button' href='/nieuws/page/1'>1</a></li>";
            echo "<li><span>. . .</span></li>";
            renderListItems($renderFrom, $number_of_pages, $currentPage);
          } else {
            echo "<li><a class='button' href='/nieuws/page/1'>1</a></li>";
            echo "<li><span>. . .</span></li>";
            renderListItems($currentPage - 4, $number_of_pages, $currentPage);
          }
        } else if ($currentPage < 6 && $number_of_pages - $currentPage >= 6) {
          // add dots to end of list;
          renderListItems(1, 8, $currentPage);
          echo "<li><span>. . .</span></li>";
          echo "<li><a class='button' href='/nieuws/page/$number_of_pages'>$number_of_pages</a></li>";

        } else if ($currentPage >= 6 && $number_of_pages - $currentPage >= 6) {
          // add dots to begin and end of list;
          echo "<li><a class='button' href='/nieuws/page/1'>1</a></li>";
          echo "<li><span>. . .</span></li>";
          renderListItems($currentPage - 2, $currentPage + 3 , $currentPage);
          echo "<li><span>. . .</span></li>";
          echo "<li><a class='button' href='/nieuws/page/$number_of_pages'>$number_of_pages</a></li>";
        }
      }
      @endphp
      @if($currentPage != $number_of_pages)
        @php
          echo "<li class='nextButton'><a class='button' href='/nieuws/page/$nextPage'>Volgende</a></li>"
        @endphp
      @endif
      
    </ul>
  </nav>
@endsection
