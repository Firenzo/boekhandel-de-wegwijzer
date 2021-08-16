@extends("partials.page-header")
<section class="featured-products">
        <div class="container">
            <h2>Uitgelichte Producten</h2>
        </div>

        <div class="product-list">
                @php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 5,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => 'featured',
                            ),
                        ),
                    );
                    $query = new WP_Query($args);
                    /*if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;
                    }
                    wp_reset_postdata();*/
                @endphp
                @posts($query)
                <div class="product">
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
                </div>        
                @endposts
            </div>
    </section>