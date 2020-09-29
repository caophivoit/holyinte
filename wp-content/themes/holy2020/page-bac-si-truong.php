<?php /* Template Name: bac-si-truong */ ?>
<?php get_header() ?>


<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

        <div class="container">
            <div class="row">
                <div class="box-doctor">
                    <div id="carouselDoctor" class="carousel slide"
                         data-ride="carousel">
                        <div class="carousel-inner">
							<?php
							$slide = get_field( 'doctor_slide' ) ?: [];
							?>
							<?php foreach ( $slide as $index => $item ): ?>
                                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>"
                                     data-interval="<?= $index == 0 ? '10000' : ( $index == 1 ? '20000' : '' ) ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="pic-doctor">
												<?= holy2020_field_image( $item['image'], $item['title'] ) ?>
                                            </div>
                                            <div class="info-doctor">
                                                <div class="text-tt">
													<?= $item['title'] ?>
                                                </div>
                                                <div class="text-content">
													<?= $item['content'] ?>
                                                    <!--
                                                    <a class="bt-read-more"
                                                       href="<?= $item['link'] ?>">Xem
                                                        Thêm</a>
                                                        -->
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

			<?php
			$awards = get_field( 'awards' ) ?: [];
			?>
            <div class="box-team">
                <div class="box-text-tt-about">
                    Thành Tựu
                </div>
                <div class="row">
                    <div class="box-comment">
                        <div id="carouselComment" class="carousel slide"
                             data-ride="carousel">
                            <div class="carousel-inner">
								<?php foreach ( array_chunk( $awards, 3 ) as $chunk_index => $chunk ): ?>
                                    <div class="carousel-item <?= $chunk_index == 0 ? 'active' : '' ?>"
                                         data-interval="<?= ( $chunk_index + 1 ) * 10000 ?>">
                                        <div class="row">
											<?php foreach ( $chunk as $index => $item ): ?>
                                                <div class="col-lg-4">
                                                    <div class="pic-kh">
														<?= holy2020_field_image( $item['image'], $item['title'] ) ?>
                                                    </div>
                                                    <div class="box-text-comment">
                                                        <div class="text-cm">
															<?= $item['title'] ?>
                                                        </div>
                                                        <div class="text-name">
															<?= $item['subtitle'] ?>
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

			<?php
			$awards = get_field( 'result' ) ?: [];
			?>
            <div class="box-team">
                <div class="box-text-tt-about">
                    Thành Quả của Bác Sĩ
                </div>
                <div class="row">
                    <div class="box-comment">
                        <div id="carouselPicture" class="carousel slide"
                             data-ride="carousel">
                            <div class="carousel-inner">
								<?php foreach ( array_chunk( $awards, 3 ) as $chunk_index => $chunk ): ?>
                                    <div class="carousel-item <?= $chunk_index == 0 ? 'active' : '' ?>"
                                         data-interval="<?= ( $chunk_index + 1 ) * 10000 ?>">
                                        <div class="row">
											<?php foreach ( $chunk as $index => $item ): ?>
                                                <div class="col-lg-4">
                                                    <div class="pic-kh"
                                                         data-original="<?= $item['image']['url'] ?>">
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
