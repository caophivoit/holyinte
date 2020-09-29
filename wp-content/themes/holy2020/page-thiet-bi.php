<?php /* Template Name: thiet-bi */ ?>
<?php get_header() ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-text-tt-about">Hệ Thống Trang Thiết Bị</div>
                </div>
            </div>
			<?php $items = get_field( 'items' );
			$items       = $items ?: [];
			?>
			<?php foreach ( $items as $index => $item ): ?>
                <div class="row">
                    <div class="col-lg-6 <?= $index % 2 != 0 ? 'col' : 'order-lg-6' ?>">
                        <div class="pic-about">
							<?php if ( ! empty( $item['image'] ) ): ?>
                                <img src="<?= $item['image']['sizes']['540x320']; ?>"
                                     alt="<?= $item['title'] ?>">
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 <?= $index % 2 != 0 ? 'col' : 'order-lg-0' ?>">
                        <div class="box-about">
                            <div class="info-about">
                                <div class="text-about">
									<?= $item['title'] ?: '' ?>
                                </div>
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
