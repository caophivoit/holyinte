<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
				<?php the_field( 'work_time', 'option' ); ?>
            </div>
            <div class="col-lg-4">
                <ul class="box-social">
                    <li>Theo dõi chúng tôi qua</li>
                    <li>
                        <a href="<?php the_field( 'facebook', 'option' ); ?>"><img
                                    src="<?php holy2020_path() ?>assets/images/icon-fb.png"></a>
                    </li>
                    <li>
                        <a href="<?php the_field( 'instagram', 'option' ); ?>"><img
                                    src="<?php holy2020_path() ?>assets/images/icon-instagram.png"></a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="all-email">
                    <div class="box-email-later">
						<?= do_shortcode( '[contact-form-7 id="206" title="Newsletter"]' ) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
<footer class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 hot-line">
				<?php the_field( 'hot_line', 'option' ); ?>
            </div>
            <div class="col-lg-5 text-right">
				<?php the_field( 'copyright', 'option' ); ?>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>