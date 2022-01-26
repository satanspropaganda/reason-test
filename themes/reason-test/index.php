<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo(get_stylesheet_directory_uri())?>/style.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class('o-body'); ?>>
  <div class="o-body__border"></div>
<?php get_header(); ?>  
<div class="o-wrapper">
    <div class="c-posts__categories">
        <?php $categories =  get_categories();
            echo '<ul>';
            foreach  ($categories as $category) {
            echo '<li><a href="'. get_category_link($category) .'">'. $category->cat_name .'</a></li>';
            }
            echo '</ul>';
        ?>
    </div>
    <div class="c-posts-grid">
	<?php
	if ( have_posts() ) :
	
		while ( have_posts() ) :
	
			the_post();
			?>
	
			<article class="c-posts-grid__post">
                <a href="<?php echo(get_permalink());?>" class="c-posts-grid__post-link"></a>
                <div class="c-posts-grid__post-media">
                    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?> featured image">
                </div>
				<header>
					<p class="c-posts-grid__post-heading"><?php the_title(); ?></p>
				</header>
			
			</article>
	
		<?php endwhile; 
	endif;
	?>
    </div>
</div>
<?php wp_footer(); ?>
	</body>
</html>