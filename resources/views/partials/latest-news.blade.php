@if(is_front_page())
    @php
    //Query to get latest 3 posts
    $getLatestNews = array(
        'posts_per_page' => 3, /* how many post you need to display */
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post', /* your post type name */
        'post_status' => 'publish'
    );

    $featuredPosts = new WP_Query($getLatestNews);  
    @endphp
@else
    @php
    global $post;
    $getRandomRecentPosts = array(
    'post__not_in' => array($post->ID),
    'orderby'   => 'rand',
    'date_query' => array(
        array(
            'after'     => '90 days ago',
            'column'    => 'post_date_gmt',
            'inclusive' => true,
        ),
    ),
    'posts_per_page' => 3,
    );
    $featuredPosts = new WP_Query( $getRandomRecentPosts );
    $count = $featuredPosts->found_posts;

    if ($count < 3) {
       $getRandomRecentPosts = array(
        'orderby'   => 'rand',
        'date_query' => array(
            array(
                'after'     => '90 days ago',
                'column'    => 'post_date_gmt',
                'inclusive' => true,
            ),
        ),
        'posts_per_page' => 3,
        );

       $featuredPosts = new WP_Query( $getRandomRecentPosts );
    };
    @endphp
@endif

<section class="latest-news news-list">
	<div class="container">
        <h2>Het laatste Nieuws</h2>

        <div class="news-list">
            @posts($featuredPosts)
                <a href="@permalink" class="news-item">
                    <div class="image">
                        <img src=@thumbnail('full', false) />
                    </div>
                    <p class="publish-date">@published</p>
                    <h2>@title</h2>
                    @excerpt
                    <p href="@permalink" class="read-more">Lees meer<i class="fas fa-chevron-right"></i></p>
                </a>
            @endposts
        </div>
        <a href="/nieuws" class="button">Bekijk meer nieuws</a>
    </div>
    
</section>