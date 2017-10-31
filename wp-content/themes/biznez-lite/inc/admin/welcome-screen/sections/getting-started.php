<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="biznez-lite-tab-pane active">

	<div class="biznez-tab-pane-center">

		<h1 class="biznez-lite-welcome-title">Welcome to Biznez Lite! <?php if( !empty($biznez_lite['Version']) ): ?> <sup id="biznez-lite-theme-version"><?php echo esc_attr( $biznez_lite['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Our one of the popular free minimal, responsive and Elegant Business WordPress theme, Biznez Lite!','biznez-lite'); ?></p>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using Biznez Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Biznez Lite, as much as we enjoy creating great products.', 'biznez-lite' ); ?>

	</div>

	<hr />

	<div class="biznez-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'biznez-lite' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'biznez-lite' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'biznez-lite' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'biznez-lite' ); ?></a></p>

	</div>

	<hr />

	<div class="biznez-tab-pane-center">

		<h1><?php esc_html_e( 'FAQ', 'biznez-lite' ); ?></h1>

	</div>

	<div class="biznez-tab-pane-half biznez-tab-pane-first-half">

		<h4><?php esc_html_e( 'Create a child theme', 'biznez-lite' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'biznez-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://codex.wordpress.org/Child_Themes' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'biznez-lite' ); ?></a></p>

		<hr />
		
		<h4><?php esc_html_e( 'How to set front page?', 'biznez-lite' ); ?></h4>
		<p><?php esc_html_e( 'You can set the front page to a static page from Setting -> Reading.', 'biznez-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://codex.wordpress.org/Creating_a_Static_Front_Page#WordPress_Static_Front_Page_Process/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'biznez-lite' ); ?></a></p>

	</div>

	<div class="biznez-tab-pane-half">

		<h4><?php esc_html_e( 'Translate Biznez Lite', 'biznez-lite' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to translate Biznez Lite into your native language or any other language you need for you site.', 'biznez-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://sketchthemes.com/blog/effective-steps-to-translate-your-wordpress-theme-using-qtranslate-x/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'biznez-lite' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'What if I have any problems?', 'biznez-lite' ); ?></h4>
		<p><?php esc_html_e( 'In case of any problems or help you can search to see if your topic has been started already or post a new support topic.', 'biznez-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/biznez-lite' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'biznez-lite' ); ?></a></p>
		
	</div>

	<div class="biznez-lite-clear"></div>

</div>
