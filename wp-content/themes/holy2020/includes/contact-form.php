<?php
$pageIds       = holy2020_get_page_ids_by_template( 'page-lien-he.php' );
$contactPageId = reset( $pageIds );
?>

<?php if ( empty( $contactPageId ) ): ?>

    <!-- contact-form is empty! No page with template page-lien-he.php -->

<?php else: ?>
	<?php
	$post = get_post( $contactPageId );
	setup_postdata( $post );
	?>
    <div class="box-contact box-contact-send">
        <div>
            <p class="box-text-tt-about">Liên Hệ Đặt Hẹn</p>
        </div>
        <div class="box-form-send">
            <div class="row justify-content-md-center">
                <div class="col-lg-5">
					<?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
