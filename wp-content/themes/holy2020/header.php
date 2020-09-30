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

 <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu" style="background: white;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="<?= site_url() ?>" style="margin: auto; text-align: center;"><img style="margin: 5px 0; max-width: 50%; height: auto; margin-left: -15px;"
                                    src="<?php holy2020_path() ?>assets/images/logo.png"></a>
                   
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                       <ul class="nav navbar-nav menu_nav ml-left">
                       <?php 
                            $menu_items = wp_get_nav_menu_items('All');
                        ?>
                       <?php  foreach ( $menu_items as $key => $menu_item ): ?>
                          <?php if ($menu_item->menu_item_parent == 0 && $menu_item->ID != 939): ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li> 
                          <?php else: ?>
                            <?php if ($menu_item->ID == 939): ?>
                                <li class="nav-item submenu dropdown">
                                    <a href="<?php echo $menu_item->url ?>" class="nav-link"><?php echo $menu_item->title ?></a> 
                                    <button class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" style="
                                        float: right;
                                        position: absolute;
                                        margin-right: 10px;
                                        right: 0;
                                        top: 0;
                                        box-shadow: none !important;
                                        background: unset;
                                        border: unset;
                                    ">
                                        <i class="icon-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" style="width: max-content;">
                                        <?php  foreach ( $menu_items as $key => $menu_item_sub ): ?>
                                           <?php if ($menu_item_sub->menu_item_parent != 0 && $menu_item_sub->menu_item_parent == $menu_item->ID): ?>
                                              <li class="nav-item"><a class="nav-link" href="<?php echo $menu_item_sub->url ?>"><?php echo $menu_item_sub->title ?></a></li>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                             <?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

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