<?php /* Template Name: tin-tuc */ ?>
<?php get_header() ?>

<?php
$paged         = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$post_query    = new WP_Query( [
    'post_type'   => 'post',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_status' => [ 'publish' ],
    'paged'       => $paged,
    'posts_per_page' => 5,
] );
$posts         = $post_query->posts;
$post_ids      = array_map( function ( $post ) {
    return $post->ID;
}, $posts );
$first_post    = array_shift( $posts );
$related_posts = get_posts( [
    'exclude'        => $post_ids,
    'posts_per_page' => 4,
    'orderby'        => 'date',
    'order'          => 'DESC',
] );
?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-news">
                        <?php $post = $first_post;
                        setup_postdata( $post ); ?>
                        <div class="block-hot-news">
                            <div class="pic-dl">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'news_large' ); ?>
                                </a>
                            </div>
                            <div class="box-content-hot-news">
                                <div class="tt-content"><a
                                            href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                </div>
                                <div class="tt-day">
                                    <?= holy2020_the_date( get_the_date( 'U' ) ) ?>
                                </div>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); ?>

                        <?php foreach ( $posts as $post ): setup_postdata( $post ); ?>
                            <div class="block-thumb-news">
                                <div class="pic-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'news_thumb' ); ?>
                                    </a>
                                </div>
                                <div class="text-thumb">
                                    <div class="tt-text-thumb"><a
                                                href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                    </div>
                                    <div class="tt-day">
                                        <?= holy2020_the_date( get_the_date( 'U' ) ) ?>
                                    </div>
                                    <div class="text-content-thumb">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        <?php endforeach; ?>
                    </div>

                    <?php holy2020_paginate_links( $post_query ); ?>

                </div>
            </div>
        </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>
