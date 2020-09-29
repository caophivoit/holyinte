<?php get_header() ?>

<?php
$related_posts = get_posts( [
	'exclude'        => [ get_the_ID() ],
	'posts_per_page' => 4,
	'orderby'        => 'date',
	'order'          => 'DESC',
] );
$pTinTuc       = get_pages( [
	'meta_key'   => '_wp_page_template',
	'meta_value' => 'page-tin-tuc.php',
] );
$pTinTuc       = reset( $pTinTuc );
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-news">
                        <div class="box-back">
                            <a href="<?= get_permalink( $pTinTuc->ID ) ?>"><img
                                        src="<?php holy2020_path() ?>assets/images/icon-prev.png">
                                Quay
                                lại trang trước</a>
                        </div>
                        <div class="block-hot-news">
                            <div class="box-content-news-detail">
                                <div class="tt-content"><a
                                            href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                </div>
                                <div class="tt-day"><span>Tin Tức</span>
                                    | <?= holy2020_the_date( get_the_date( 'U' ) ) ?>
                                </div>
								<?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-news-right">
                        <div class="block-hot-news">
                            <div class="tt-hot-news">Tin tức mới nhất</div>

							<?php foreach ( $related_posts as $post ): setup_postdata( $post ); ?>
                                <div class="block-content-right">
                                    <div class="pic-dl">
                                        <a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                    <div class="box-content-hot-news">
                                        <div class="tt-content">
                                            <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                        </div>
										<?php the_excerpt(); ?>
                                    </div>
                                </div>
								<?php wp_reset_postdata(); ?>
							<?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer() ?>
