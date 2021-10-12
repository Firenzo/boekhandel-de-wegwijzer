{{--
The Template for displaying all single products

This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see 	    https://docs.woocommerce.com/document/template-structure/
@author 		WooThemes
@package 	WooCommerce/Templates
@version     1.6.4
--}}

@extends('layouts.app')

@section('content')
  @php
    do_action('get_header', 'shop');
    do_action('woocommerce_before_main_content');
  @endphp

  @while(have_posts())
    @php
      the_post();
      global $product;
      $attachment_ids = $product->get_gallery_image_ids();
      // do_action('woocommerce_shop_loop');
      // wc_get_template_part('content', 'single-product');

    @endphp
    <section class="product-page">
      <div class="product-title-and-subtitle">
        <h1>@title</h1>
        <p>Auteur: Tonja Versluis-Markestein <span class="divider">|</span> ISBN: 9789087184889</p>
      </div>

      <div class="product-image">
        <div class="image main-image">
          <img src="@thumbnail('full', false)">
        </div>
        @if($attachment_ids)
          <div class="image-gallery">
            <ul>
              @php
                foreach( $attachment_ids as $attachment_id ) {
                  $image_link = wp_get_attachment_url( $attachment_id );
                    echo "<li><img src='$image_link'></li>";
                }
              @endphp
            </ul>
          </div>
        @endif
      </div>

      <div class="product-description">
        <h2>Productomschrijving</h2>
        @content
      </div>

      <div class="price-and-addToCartButton">
        <p class="in-stock-check"><i class="fas fa-check"></i> Op voorraad</p>
        <p class="price">€ <?php echo wc_get_product()->get_price(); ?></p>
        <a href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart; ?>" class="button"><i class="fas fa-shopping-cart"></i> In winkelwagen</a>
      </div>

      <div class="additional-product-information">
        <h2>Meer informatie:</h2>
        <ul>
          <li>
            <p class="information-title">ISBN:</p>
            <p class="information">product info</p>
          </li>
          <li>
            <p class="information-title">Auteur:</p>
            <p class="information">Tonja Versluis-Markestein</p>
          </li>
          <li>
            <p class="information-title">Uitgever:</p>
            <p class="information">Uitgeverij De Banier</p>
          </li>
          <li>
            <p class="information-title">Verschijningsdatum:</p>
            <p class="information">Juni 2021</p>
          </li>
          <li>
            <p class="information-title">Genre:</p>
            <p class="information">Klassiek</p>
          </li>
          <li>
            <p class="information-title">Taal:</p>
            <p class="information">Nederlands</p>
          </li>
        </ul>
      </div>
    </section>
  @endwhile

  @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
  @endphp
@endsection
