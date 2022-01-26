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
<div class="o-wrapper c-single__wrapper">
    <div class="c-single__content">
        <h1 class="c-single__content-title"><?php the_title(); ?></h1>
        <div class="o-content-block">
            <?php the_content();?>
        </div>
    </div>
    <div class="c-single__media">
        <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?> featured image">
    </div>
</div>
<?php wp_footer(); ?>
	</body>
</html>