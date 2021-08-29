<article class="two-columns">
    <div class="article-text">
    	@if(is_front_page())
    		@php the_content() @endphp
    		<a href="/over-ons" class="button">Over ons<i class="fas fa-chevron-right"></i></a>
    	@else
			<h1 class="entry-title">{!! get_the_title() !!}</h1>
			@if(is_page('contact'))
				<div class="contact-info-wrapper">
			        @include('partials.contact-info')
			    </div>
			@endif
			@php the_content() @endphp
        @endif
    </div>
    <div class="article-image">
        <?php echo get_the_post_thumbnail() ?>
    </div>
</article>

@if(is_page('over-ons'))
    <div class="additional-page-image">
    	<?php echo get_the_post_thumbnail() ?>
    </div>
@endif


{{-- @php the_content() @endphp --}}
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
