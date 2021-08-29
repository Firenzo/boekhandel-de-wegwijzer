{{-- <article @php post_class() @endphp>
    <header>
        <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
        @include('partials/entry-meta')
    </header>
    <div class="entry-summary">
        @php the_excerpt() @endphp
        <p>Helloooo</p>
    </div>
</article> --}}

<article class='news-item-blog-page'>
    <a href="@permalink" class="news-item">
        <div class="image">
            <img src=@thumbnail('full', false) />
        </div>
        <p class="publish-date">@published</p>
        <h2>@title</h2>
        @excerpt
        <p href="@permalink" class="read-more">Lees meer<i class="fas fa-chevron-right"></i></p>
    </a>
</article>



