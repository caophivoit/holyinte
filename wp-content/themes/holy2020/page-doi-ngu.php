<?php /* Template Name: doi-ngu */ ?>
<?php get_header() ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-text-tt-about">Đội Ngũ Holy Clinic</div>
                </div>
            </div>
			<?php $items = get_field( 'items' );
			$items       = $items ?: [];
			?>
			<?php foreach ( $items as $index => $item ): ?>
                <div class="row">
                    <div class="col-lg-5 <?= $index % 2 == 0 ? '' : 'order-lg-7' ?>">
                        <div class="pic-doctor">
							<?= holy2020_field_image( $item['image'], $item['title'], 'original' ) ?>
                        </div>
                    </div>
                    <div class="col-lg-7 <?= $index % 2 == 0 ? '' : 'order-lg-0' ?>">
                        <div class="info-doctor">
                            <div class="text-tt">
								<?= $item['title'] ?: '' ?>
                            </div>
                            <div class="text-content">
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
