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

{{-- @query(['posts_per_page' => '1']) --}}

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
    $term_object = get_queried_object();
  @endphp

  @if( is_product_category() )
    <h1><?php echo $term_object->name; ?></h1>
    <p class="category-description"><?php echo $term_object->description; ?></p>
  @endif
  <div class="filter-and-sort">
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
  </div>

  <div class="product-list">
    @if(woocommerce_product_loop())
      @if(wc_get_loop_prop('total'))
        <ul class="products">
          @posts
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
      @endif
      @php
        global $wp_query;
          $number_of_pages = $wp_query->max_num_pages;
          $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
          // $currentPage = 150;
          $prevPage = $currentPage - 1;
          $nextPage = $currentPage + 1;
      @endphp
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
        @php
          echo "<p>Pagina $currentPage van $number_of_pages</p>"
        @endphp
      </nav>
      @php
        woocommerce_product_loop_end();
        // do_action('woocommerce_after_shop_loop');
      @endphp
    @else
      @php
        do_action('woocommerce_no_products_found');
      @endphp
    @endif
  </div>

  @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
  @endphp
  </section>
</div>
@endsection