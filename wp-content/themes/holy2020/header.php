<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body>
<div <?php body_class( 'body-container' ) ?>>
    <div class="chat-mute">
        <div class="icon-chat icon-viber">
            <a href="tel:<?php the_field( 'viber', 'option' ); ?>">
                <img src="<?php holy2020_path() ?>assets/images/icon-viber.png">
                <div class="number-viber"><?php the_field( 'viber', 'option' ); ?></div>
            </a>
        </div>
        <div class="icon-chat">
            <a href="\\<?php the_field( 'messenger', 'option' ) ?>">
                <img src="<?php holy2020_path() ?>assets/images/icon-chat-inbox.png">
            </a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg fix-nav navbar-light">
        <div class="container">
            <div class="row w-100 align-items-center">
                <div class="col-logo d-lg-none d-xl-none">
                    <div class="box-logo-top">
                        <a href="<?= site_url() ?>"><img
                                    src="<?php holy2020_path() ?>assets/images/logo.png"></a>
                    </div>
                </div>
                <div class="ml-auto box-menu-top">
                    <button class="navbar-toggler ic-top" type="button"><span
                                class="navbar-toggler-icon"></span></button>
                </div>
                <div class="mb-nav-top">
                    <div class="col-navbar">
						<?php
						$extra = '<div class="bt-close d-xl-none ic-top">
                                    <img src="' . holy2020_path( FALSE ) . 'assets/images/icon-close.png">
                                </div>';
						wp_nav_menu( [
							'theme_location'    => 'primary_left',
							'container'         => NULL,
							'menu_class'        => 'navbar-top',
							'link_class'        => 'nav-link',
							'active_link_class' => 'active',
							'items_wrap'        => '<ul id="%1$s" class="%2$s">' . $extra . '%3$s</ul>',
						] );
						?>
                    </div>
                    <div class="col-logo d-none d-lg-block">
                        <div class="box-logo-top">
							<?php
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							}
							?>
                        </div>
                    </div>
                    <div class="col-navbar">
						<?php
						wp_nav_menu( [
							'theme_location'    => 'primary_right',
							'container'         => NULL,
							'menu_class'        => 'navbar-top',
							'link_class'        => 'nav-link',
							'active_link_class' => 'active',
						] );
						?>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <div class="box-smark-nav"></div>
    <div class="container-fluid">
		<?php $postId = get_the_ID();
		$banners      = get_field( 'banners', $postId );
		?>
        <div class="row">
            <div class="top-banner">
				<?php if ( empty( $banners ) ): ?>
                    <img src="<?php holy2020_path() ?>assets/images/banner-top.jpg">
				<?php else: ?>
                    <div class="top-banner">
                        <div id="slideBigBanner" class="carousel slide"
                             data-ride="carousel">
                            <ol class="carousel-indicators">
								<?php foreach ( $banners as $index => $banner ): ?>
                                    <li data-target="#slideBigBanner"
                                        data-slide-to="<?= $index ?>"
                                        class="<?= $index == 0 ? 'active' : '' ?>">

                                    </li>
								<?php endforeach; ?>
                            </ol>
                            <div class="carousel-inner">
								<?php foreach ( $banners as $index => $banner ): ?>
                                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?> ">
										<?= holy2020_field_image( $banner['image'], 'banner of ' . get_the_title(), 'banner', 'class="d-block w-100"' ) ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev"
                               href="#slideBigBanner" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon"
                                      aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next"
                               href="#slideBigBanner" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon"
                                      aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
    <div id="top-of-site-pixel-anchor"></div>