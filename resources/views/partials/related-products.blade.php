@php

// Get Product category name
global $post;
$terms = get_the_terms( $post->ID, 'product_cat' );
$product_category_name = '';

foreach ($terms as $term) {
    $product_category_name = $product_cat_id = $term->name;
    break;
}

@endphp
    @php
    global $post;
    $getRandomRecentPosts = array( 
      'category__in' => wp_get_post_categories( $post->ID ),
      'orderby'   => 'rand',
      'product_cat'  => $product_category_name,
      'posts_per_page'  => 5,
      'post__not_in' => array( $post->ID ),
      // 'post_type'    => 'product',
    ) ;
    $relatedProducts = new WP_Query( $getRandomRecentPosts );
    $count = $relatedProducts->found_posts;

    if ($count < 3) {
       $getRandomRecentPosts = array(
        'post_type'    => 'product',
        'orderby'   => 'rand',
        'date_query' => array(
            array(
                'after'     => '90 days ago',
                'column'    => 'post_date_gmt',
                'inclusive' => true,
            ),
        ),
        'posts_per_page' => 5,
    );

       $relatedProducts = new WP_Query( $getRandomRecentPosts );
    };
    @endphp

<section class="related-products">
	<div class="container">
        <h2>Gerelateerde producten</h2>
    </div>
    <ul class="product-list">
      @posts($relatedProducts)
        <li class="product">
          <div class="product-link">
            <a href="@permalink">
              <img src=@thumbnail('full', false) />
              <h2>@title</h2>
            </a>
          </div>
          <div class="product-price-and-add-to-cart-button">
            <div class="price"><p>€ <?php echo wc_get_product()->get_price(); ?></p></div>
            <div class="add-to-cart-button">
              <a class="button" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart; ?>" class="more"><i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
        </li>
      @endposts
    </ul>
</section>