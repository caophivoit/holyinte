<?php /* Template Name: lien-he */ ?>
<?php get_header() ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="box-team">
                <div class="team-info">
                    <p class="text-tt-member"><?php the_title() ?></p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="map-contact">
							<?php the_field( 'map' ); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-contact">
                            <p class="big-text"><?php the_field( 'title' ); ?></p>
							<?php the_field( 'description' ); ?>
                            <p class="location"><img
                                        src="<?php holy2020_path() ?>assets/images/icon-location.png"><?php the_field( 'address' ); ?>
                            </p>
                            <p class="location"><img
                                        src="<?php holy2020_path() ?>assets/images/icon-contact.png"><?php the_field( 'phone' ); ?>
                            </p>
                            <p class="location"><img
                                        src="<?php holy2020_path() ?>assets/images/icon-email.png"><?php the_field( 'email' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

			<?php require_once __DIR__ . '/includes/contact-form.php' ?>

        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>
