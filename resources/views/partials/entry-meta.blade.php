{{-- <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
<p class="byline author vcard">
  {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ get_the_author() }}
  </a>
</p> --}}

<time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
<span>|</span>
<p class="byline author vcard" rel="author">
  {{ __('Door', 'sage') }} {{ get_the_author() }}
</p>
