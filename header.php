<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php generic_schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
<header id="header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
<div id="branding">
<div id="site-title" itemscope itemtype="https://schema.org/Organization">
<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1 itemprop="name">'; } ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home" itemprop="url"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
</div>
<div id="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></div>
</div>
<nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
<button type="button" class="menu-toggle"><span class="menu-icon">&#9776;</span><span class="menu-text screen-reader-text"><?php esc_html_e( ' Menu', 'generic' ); ?></span></button>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
<div id="search"><?php get_search_form(); ?></div>
</nav>
</header>
<div id="container">