{{--
The Template for displaying product archives, including the main shop page which is a post type archive

This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see https://docs.woocommerce.com/document/template-structure/
@package WooCommerce/Templates
@version 3.4.0
--}}

@extends('layouts.app')
@section('content')
<?php woocommerce_breadcrumb(); ?>
<div id="shop-layout">
  <section class="product-archive-filter">
    <h1>Filteropties</h1>
    <form action="">
      <fieldset class="filter-list subcategories-filter">
        <h2>Genres</h2>

        <div class="checkbox-and-label">
          <input type="checkbox" name="kinderboeken" id="kinderboeken">
          <label for="kinderboeken">Kinderboeken</label>
        </div>

        <div class="checkbox-and-label">
          <input type="checkbox" name="klassiek" id="klassiek">
          <label for="klassiek">Klassiek</label>
        </div>

        <div class="checkbox-and-label">
          <input type="checkbox" name="roman" id="roman">
          <label for="roman">Roman</label>
        </div>

        <div class="checkbox-and-label">
          <input type="checkbox" name="informatief" id="informatief">
          <label for="informatief">Informatief</label>
        </div>
      </fieldset>

      <fieldset class="filter-list language-filter">
        <h2>Taal</h2>

        <div class="checkbox-and-label">
          <input type="checkbox" name="nederlands" id="nederlands">
          <label for="nederlands">Nederlands</label>
        </div>

        <div class="checkbox-and-label">
          <input type="checkbox" name="engels" id="engels">
          <label for="engels">Engels</label>
        </div>
      </fieldset>

      <fieldset class="filter-list price-filter">
        <h2>Prijs</h2>

        <div class="label-and-input">
          <label for="minumum-price">Van</label>
          <div class="price-input">
            <div class="euro-sign-before-input-field">€</div>
            <input type="text" name="minumum-price">
          </div>  
        </div>

        <div class="label-and-input">
          <label for="maximum-price">Tot</label>
          <div class="price-input">
            <div class="euro-sign-before-input-field">€</div>
            <input type="text" name="maximum-price">
          </div>  
        </div>

      </fieldset>
      <button type="submit">Filters Toepassen</button>
    </form>
  </section>
  <section class="product-archive">
    
  
  @php
    // do_action('get_header', 'shop');
    // do_action('woocommerce_before_main_content');
    $term_object = get_queried_object();
  @endphp

  @if( is_product_category() )
    <h1><?php echo $term_object->name; ?></h1>
    <p class="category-description"><?php echo $term_object->description; ?></p>
  @endif

  <div class="filterOptions">
    <button class="show-filter-options"><i class="fas fa-sliders-h"></i> Filter</button>
  </div>

  <div class="sortOptions">
    <form class="woocommerce-ordering" method="get">
      <select name="orderby" class="orderby" aria-label="Shop order">
        <option value="menu_order" selected="selected">Standaard sortering</option>
        <option value="popularity">Sorteer op populariteit</option>
        {{-- <option value="rating">Sort by average rating</option> --}}
        {{-- <option value="date">Sort by latest</option> --}}
        <option value="price">Prijs: Laag - hoog</option>
        <option value="price-desc">Prijs: Hoog - laag</option>
      </select>
      <input type="hidden" name="paged" value="1">
    </form>
  </div>

  {{-- <header class="woocommerce-products-header">
    @if(apply_filters('woocommerce_show_page_title', true))
      <h1 class="woocommerce-products-header__title page-title">{!! woocommerce_page_title(false) !!}</h1>
    @endif

    @php
      do_action('woocommerce_archive_description');
    @endphp
  </header> --}}

  @if(woocommerce_product_loop())
    @php
      do_action('woocommerce_before_shop_loop');
      woocommerce_product_loop_start();
    @endphp

    @if(wc_get_loop_prop('total'))
      @while(have_posts())
        @php
          the_post();
          do_action('woocommerce_shop_loop');
          wc_get_template_part('content', 'product');
        @endphp
      @endwhile
    @endif

    @php
      woocommerce_product_loop_end();
      do_action('woocommerce_after_shop_loop');
    @endphp
  @else
    @php
      do_action('woocommerce_no_products_found');
    @endphp
  @endif

  @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
  @endphp
  </section>
</div>
@endsection

