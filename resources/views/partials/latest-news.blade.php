@php
//Code to get latest 3 posts
    $getLatestNews = array(
        'posts_per_page' => 3, /* how many post you need to display */
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post', /* your post type name */
        'post_status' => 'publish'
    );

    $latestNews = new WP_Query($getLatestNews);  
@endphp

<section class="latest-news news-list">
	<div class="container">
        <h2>Het laatste Nieuws</h2>

        <div class="news-list">
            @posts($latestNews)
                <a href="@permalink" class="news-item">
                    <div class="image">
                        <img src=@thumbnail('full', false) />
                    </div>  
                    <h2>@title</h2>
                    <p class="publish-date">@published</p>
                    @excerpt
                    <p href="@permalink" class="read-more">Lees meer<i class="fas fa-chevron-right"></i></p>
                </a>
            @endposts
        </div>
        <a href="/nieuws" class="button">Bekijk meer nieuws</a>
    </div>
    
</section>