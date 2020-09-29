<?php /* Template Name: ve-chung-toi */ ?>
<?php get_header() ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		$slide_about   = get_field( 'about_slide' ) ?: [];
		$about_title   = get_field( 'about_title' ) ?: '';
		$about_content = get_field( 'about_content' ) ?: '';
		$slide_doctor  = get_field( 'doctor_slide' ) ?: [];
		$testimonial   = get_field( 'testimonial' ) ?: [];
		$result        = get_field( 'result' ) ?: [];
		?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-text-tt-about">
						<?php the_title() ?>
                        <small class="text-center">lý do chọn HOLY
                            International</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="carouselAbout"
                         class="carousel slide"
                         data-ride="carousel"
                    >
                        <div class="carousel-inner">
							<?php foreach ( $slide_about as $index => $item ): ?>
                                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>"
                                     data-interval="<?= $index == 0 ? '10000' : '2000' ?>">
                                    <div class="pic-doctor">
                                        <a href="<?= $item['link'] ?>">
											<?= holy2020_field_image( $item['image'] ) ?>
                                        </a>
                                    </div>
                                </div>
							<?php endforeach; ?>
                        </div>
                        <!--
                        <a class="doctor-control-prev" href="#carouselAbout"
                           role="button" data-slide="prev">
                            <img src="<?php holy2020_path() ?>assets/images/icon-prev.png">
                        </a>
                        <a class="doctor-control-next" href="#carouselAbout"
                           role="button" data-slide="next">
                            <img src="<?php holy2020_path() ?>assets/images/icon-next.png">
                        </a>
                        -->
                    </div>

                    <div class="info-about">
						<?php if ( ! empty( $about_title ) ): ?>
                            <div class="text-tt">
								<?= $about_title ?>
                            </div>
						<?php endif; ?>
                        <div class="text-content">
							<?= $about_content ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box-doctor">
                    <div id="carouselDoctor" class="carousel slide"
                         data-ride="carousel">
                        <div class="carousel-inner">
							<?php foreach ( $slide_doctor as $index => $item ): ?>
                                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>"
                                     data-interval="<?= $index == 0 ? '10000' : '2000' ?>">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="pic-doctor">
												<?= holy2020_field_image( $item['image'] ) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="info-doctor">
                                                <div class="text-tt">
													<?= $item['title'] ?>
                                                </div>
                                                <div class="text-content">
													<?= $item['content'] ?>
													<?php if ( ! empty( $item['link'] ) ): ?>
                                                        <a class="bt-read-more"
                                                           href="<?= $item['link'] ?>">Xem
                                                            Thêm</a>
													<?php endif; ?>
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
                <div class="box-text-tt-about">
                    Nhận Xét Từ Khách Hàng
                </div>
                <div class="row">
                    <div class="box-comment">
                        <div id="carouselComment" class="carousel slide"
                             data-ride="carousel">
                            <div class="carousel-inner">
								<?php foreach ( array_chunk( $testimonial, 3 ) as $chunk_index => $chunk ): ?>
                                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>"
                                         data-interval="<?= $index == 0 ? '10000' : '2000' ?>">
                                        <div class="row">
											<?php foreach ( $chunk as $index => $item ): ?>
                                                <div class="col-lg-4">
                                                    <div class="pic-kh">
														<?= holy2020_field_image( $item['image'] ) ?>
                                                    </div>
                                                    <div class="box-text-comment">
                                                        <div class="text-cm">
															<?= $item['subtitle'] ?>
                                                        </div>
                                                        <div class="text-name">
															<?= $item['title'] ?>
                                                        </div>
                                                        <div class="text-content">
															<?= $item['content'] ?>
                                                        </div>
                                                    </div>
                                                </div>
											<?php endforeach; ?>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <a class="doctor-control-prev"
                               href="#carouselComment" role="button"
                               data-slide="prev">
                                <img src="<?php holy2020_path() ?>assets/images/icon-prev.png">
                            </a>
                            <a class="doctor-control-next"
                               href="#carouselComment" role="button"
                               data-slide="next">
                                <img src="<?php holy2020_path() ?>assets/images/icon-next.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-team">
                <div class="box-text-tt-about">
                    Hình Ảnh Trước & Sau
                </div>
                <div class="row">
                    <div class="box-comment">
                        <div id="carouselPicture" class="carousel slide"
                             data-ride="carousel">
                            <div class="carousel-inner">

								<?php foreach ( array_chunk( $result, 3 ) as $chunk_index => $chunk ): ?>
                                    <div class="carousel-item <?= $chunk_index == 0 ? 'active' : '' ?>"
                                         data-interval="10000">
                                        <div class="row">
											<?php foreach ( $chunk as $index => $item ): ?>
                                                <div class="col-lg-4">
                                                    <div class="pic-kh">
														<?= holy2020_field_image( $item['image'], $item['title'] ) ?>
                                                    </div>
                                                </div>
											<?php endforeach; ?>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <a class="doctor-control-prev"
                               href="#carouselPicture" role="button"
                               data-slide="prev">
                                <img src="<?php holy2020_path() ?>assets/images/icon-prev.png">
                            </a>
                            <a class="doctor-control-next"
                               href="#carouselPicture" role="button"
                               data-slide="next">
                                <img src="<?php holy2020_path() ?>assets/images/icon-next.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer() ?>
