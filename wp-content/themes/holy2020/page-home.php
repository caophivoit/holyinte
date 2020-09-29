<?php /* Template Name: trang-chu */ ?>
<?php get_header() ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		$home_slide      = get_field( 'home_slide' ) ?: [];
		$doctor_slide    = get_field( 'doctor_slide' ) ?: [];
		$team            = get_field( 'team' ) ?: [];
		$service_slide   = get_field( 'service_slide' ) ?: [];
		$equipment_slide = get_field( 'equipment_slide' ) ?: [];
		$team_desc       = get_field( 'team_description' ) ?: '';
		$contact         = get_pages( [
			'meta_key'   => '_wp_page_template',
			'meta_value' => 'page-lien-he.php',
		] );
		$contact         = reset( $contact );
		?>
        <div class="container">
            <div class="row">
                <div class="col">
					<?php foreach ( $home_slide as $index => $item ): ?>
                        <div id="tab-<?= $index + 1 ?>"
                             class="box-tab-banner-time <?= $index == 0 ? 'current' : '' ?>">
                            <a href="<?= $item['url'] ?>">
								<?= holy2020_field_image( $item['image'], $item['title'], 'original' ) ?>
                            </a>
                        </div>
					<?php endforeach; ?>
                    <ul class="tab-banner">
						<?php foreach ( $home_slide as $index => $item ): ?>
                            <li class="tab-link <?= $index == 0 ? 'current' : '' ?>"
                                data-tab="tab-<?= $index + 1 ?>">
								<?= $item['title'] ?>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="box-doctor">
                    <div id="carouselDoctor" class="carousel slide"
                         data-ride="carousel">
                        <div class="carousel-inner">
							<?php foreach ( $doctor_slide as $index => $item ): ?>
                                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>"
                                     data-interval="<?= $index == 0 ? '10000' : '2000' ?>">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="pic-doctor">
												<?= holy2020_field_image( $item['image'], $item['title'], 'original' ) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="info-doctor">
                                                <div class="text-tt">
													<?= $item['title'] ?>
                                                </div>
                                                <div class="text-content">
													<?= $item['content'] ?>
                                                    <a class="bt-read-more"
                                                       href="<?= $item['link'] ?>">Xem
                                                        Thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php endforeach; ?>
                        </div>
                        <a class="doctor-control-prev" href="#carouselDoctor"
                           role="button" data-slide="prev">
                            <img src="<?php holy2020_path() ?>assets/images/icon-prev.png">
                        </a>
                        <a class="doctor-control-next" href="#carouselDoctor"
                           role="button" data-slide="next">
                            <img src="<?php holy2020_path() ?>assets/images/icon-next.png">
                        </a>
                    </div>
                </div>
            </div>
            <div class="box-team">
                <div class="team-info">
                    <p class="text-tt-member">ĐỘI NGŨ</p>
					<?= $team_desc ?>
                </div>
                <div class="row">
					<?php foreach ( $team as $index => $item ): ?>
                        <div class="col-lg-<?= max( 1, ceil( 12 / count( $team ) ) ) ?>">
                            <div class="content-team">
                                <div class="box-pic-sv">
                                    <a href=<?= $item['link'] ?>>
                                        <div class="text-name">
											<?= $item['title'] ?>
                                            <span><?= $item['content'] ?></span>
                                        </div>
                                        <div class="box-mask"></div>
										<?= holy2020_field_image( $item['image'], $item['title'], 'original' ) ?>
                                    </a>
                                </div>
                            </div>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
            <div class="box-team">
                <div class="team-info">
                    <p class="text-tt-member">DỊCH VỤ</p>
                </div>
                <div class="row">
                    <div class="box-doctor">
                        <div id="carouselService" class="carousel slide"
                             data-ride="carousel">
                            <div class="carousel-inner">
								<?php foreach ( $service_slide as $index => $item ): ?>
                                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>"
                                         data-interval="<?= $index == 0 ? '10000' : '2000' ?>">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="pic-service">
													<?= holy2020_field_image( $item['image'], $item['title'], 'original' ) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="info-text-service">
                                                    <div class="text-tt">
														<?= $item['title'] ?>
                                                    </div>
                                                    <div class="text-content">
														<?= $item['content'] ?>
                                                        <a class="bt-read-more"
                                                           href="<?= $item['link'] ?>">Xem
                                                            Thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <a class="doctor-control-prev"
                               href="#carouselService" role="button"
                               data-slide="prev">
                                <img src="<?php holy2020_path() ?>assets/images/icon-prev.png">
                            </a>
                            <a class="doctor-control-next"
                               href="#carouselService" role="button"
                               data-slide="next">
                                <img src="<?php holy2020_path() ?>assets/images/icon-next.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-team">
                <div class="team-info">
                    <p class="text-tt-member">TRANG THIẾT BỊ</p>
                </div>
                <div class="row">
                    <div class="box-thiet-bi">
                        <div id="carouselthiet-bi" class="carousel slide"
                             data-ride="carousel">
                            <ol class="carousel-indicators">
								<?php foreach ( $equipment_slide as $index => $item ): ?>
                                    <li data-target="#carouselExampleIndicators"
                                        data-slide-to="<?= $index ?>"
                                        class="<?= $index == 0 ? 'active' : '' ?>"></li>
								<?php endforeach; ?>
                            </ol>
                            <div class="carousel-inner">
								<?php foreach ( $equipment_slide as $index => $item ): ?>
                                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="pic-thiet-bi">
													<?= holy2020_field_image( $item['image'], $item['title'], 'original' ) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="info-thiet-bi">
                                                    <div class="text-content">
														<?= $item['content'] ?>
                                                        <a class="bt-read-more"
                                                           href="<?= $item['link'] ?>">Xem
                                                            Thêm<img
                                                                    src="<?php holy2020_path() ?>assets/images/icon-next.png"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <a class="thiet-bi-control-prev"
                               href="#carouselthiet-bi" role="button"
                               data-slide="prev">
                                <img src="<?php holy2020_path() ?>assets/images/icon-prev1.png">
                            </a>
                            <a class="thiet-bi-control-next"
                               href="#carouselthiet-bi" role="button"
                               data-slide="next">
                                <img src="<?php holy2020_path() ?>assets/images/icon-next1.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-team">
                <div class="team-info">
                    <p class="text-tt-member">LIÊN HỆ</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="map-contact">
							<?php the_field( 'map', $contact->ID ); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-contact">
                            <p class="big-text"><?php the_field( 'title', $contact->ID ); ?></p>
							<?php the_field( 'description' ); ?>
                            <p class="location"><img
                                        src="<?php holy2020_path() ?>assets/images/icon-location.png"><?php the_field( 'address', $contact->ID ); ?>
                            </p>
                            <p class="location"><img
                                        src="<?php holy2020_path() ?>assets/images/icon-contact.png"><?php the_field( 'phone', $contact->ID ); ?>
                            </p>
                            <p class="location"><img
                                        src="<?php holy2020_path() ?>assets/images/icon-email.png"><?php the_field( 'email', $contact->ID ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

			<?php require_once __DIR__ . '/includes/contact-form.php' ?>
            
        </div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>