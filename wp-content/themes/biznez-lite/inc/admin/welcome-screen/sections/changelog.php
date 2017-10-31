<?php
/**
 * Changelog
 */

$biznez_lite = wp_get_theme( 'biznez-lite' );

?>
<div class="biznez-lite-tab-pane" id="changelog">

	<div class="biznez-tab-pane-center">
	
		<h1>Biznez Lite <?php if( !empty($biznez_lite['Version']) ): ?> <sup id="biznez-lite-theme-version"><?php echo esc_attr( $biznez_lite['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$biznez_lite_changelog = $wp_filesystem->get_contents( get_template_directory().'/changelog.txt' );
	$biznez_lite_changelog_lines = explode(PHP_EOL, $biznez_lite_changelog);
	foreach($biznez_lite_changelog_lines as $biznez_lite_changelog_line){
		if(substr( $biznez_lite_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($biznez_lite_changelog_line,3).'</h1>';
		} else {
			echo $biznez_lite_changelog_line,'<br/>';
		}
	}

	?>
	
</div>