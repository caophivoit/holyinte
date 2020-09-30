<?php get_header() ?>

<?php
    
$pTinTuc       = get_pages( [
    'meta_key'   => '_wp_page_template',
    'meta_value' => 'page-tin-tuc.php',
] );
$pTinTuc       = reset( $pTinTuc );

$post_query1    = new WP_Query( [
    'post_type'   => 'post',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_status' => [ 'publish' ],
    'paged'       => 1,
    'posts_per_page' => 5,
] );
$posts1        = $post_query1->posts;
$related_posts1 = array_slice($posts1, 0, 5);
$id = $post->ID;
$index = -1;
foreach($related_posts1 as $struct) {
    $index++;
    if ($id == $struct->ID) {
        break;
    }
}

if ($index != -1) {
    array_splice($related_posts1, $index, 1);
}else{
    array_pop($related_posts1);
}

?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-news">
                        <div class="block-hot-news">
                            <div class="box-content-news-detail">
                                <div class="tt-content"><a
                                            href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                </div>
                                <div class="tt-day">
                                    <?= holy2020_the_date( get_the_date( 'U' ) ) ?>
                                </div>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-news-right">
                        <div class="block-hot-news">
                            <div class="tt-hot-news">Bài viết mới nhất</div>

                            <?php foreach ( $related_posts1 as $post ): setup_postdata( $post ); ?>
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