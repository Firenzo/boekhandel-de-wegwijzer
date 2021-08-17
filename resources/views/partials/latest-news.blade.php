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

<section class="latest-news">
	<div class="container">
        <h2>Het laatste Nieuws</h2>
    </div>

    <div class="news-list">
    	@posts($latestNews)
    	<div class="news-item">
			<a href="@permalink">
				<img src=@thumbnail('full', false) />
				<h2>@title</h2>
			</a>
			<p>@published</p>
			<p>@excerpt</p>
			<a href="@permalink">lees meer</a>
		</div>
		@endposts
    </div>
    <a href="/nieuws" class="button">Bekijk meer nieuws</a>
</section>