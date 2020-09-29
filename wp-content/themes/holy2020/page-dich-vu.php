<?php /* Template Name: dich-vu */ ?>
<?php get_header() ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php global $post; ?>
        <div class="container">
			<?php if ( empty( $post->post_parent ) ): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-text-tt-about">Dịch Vụ Tại Holy Clinic
                        </div>
                    </div>
                </div>
			<?php else: ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-text-tt-about"><?php the_title() ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
						<?php the_content(); ?>
                    </div>
                </div>
			<?php endif; ?>

			<?php $items = get_field( 'items' );
			$items       = $items ?: [];
			?>
			<?php foreach ( $items as $index => $item ): ?>
                <div class="row">
                    <div class="col-lg-6 <?= $index % 2 == 0 ? '' : 'order-lg-6' ?>">
                        <div class="pic-about">
                            <a href="<?= $item['link'] ?>">
								<?= holy2020_field_image( $item['image'], $item['title'] ) ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 <?= $index % 2 == 0 ? '' : 'order-lg-0' ?>">
                        <div class="box-about">
                            <div class="info-about">
                                <a href="<?= $item['link'] ?>"
                                   class="text-about">
									<?= $item['title'] ?: '' ?>
                                </a>
								<?= $item['content'] ?: '' ?>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer() ?>
