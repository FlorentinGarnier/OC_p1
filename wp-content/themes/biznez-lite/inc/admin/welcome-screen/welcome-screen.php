<?php
/**
 * Welcome Screen Class
 */
class Biznez_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'biznez_lite_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'biznez_lite_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'biznez_lite_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'biznez_lite_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'biznez_lite_welcome', array( $this, 'biznez_lite_welcome_getting_started' ), 	    10 );
		add_action( 'biznez_lite_welcome', array( $this, 'biznez_lite_welcome_github' ), 		            20 );
		add_action( 'biznez_lite_welcome', array( $this, 'biznez_lite_welcome_changelog' ), 				30 );
		add_action( 'biznez_lite_welcome', array( $this, 'biznez_lite_welcome_free_pro' ), 				40 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_biznez_lite_dismiss_required_action', array( $this, 'biznez_lite_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_biznez_lite_dismiss_required_action', array($this, 'biznez_lite_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function biznez_lite_welcome_register_menu() {
		add_theme_page( 'About Biznez Lite', 'About Biznez Lite', 'activate_plugins', 'biznez-lite-welcome', array( $this, 'biznez_lite_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function biznez_lite_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'biznez_lite_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function biznez_lite_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Biznez Lite! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'biznez-lite' ), '<a href="' . esc_url( admin_url( 'themes.php?page=biznez-lite-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=biznez-lite-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Biznez Lite', 'biznez-lite' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function biznez_lite_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_biznez-lite-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'biznez-lite-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'biznez-lite-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );

			global $biznez_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('biznez_show_required_actions') ):
				$biznez_show_required_actions = get_option('biznez_show_required_actions');
			else:
				$biznez_show_required_actions = array();
			endif;

			if( !empty($biznez_required_actions) ):
				foreach( $biznez_required_actions as $biznez_required_action_value ):
					if(( !isset( $biznez_required_action_value['check'] ) || ( isset( $biznez_required_action_value['check'] ) && ( $biznez_required_action_value['check'] == false ) ) ) && ((isset($biznez_show_required_actions[$biznez_required_action_value['id']]) && ($biznez_show_required_actions[$biznez_required_action_value['id']] == true)) || !isset($biznez_show_required_actions[$biznez_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'biznez-lite-welcome-screen-js', 'biznezLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','biznez-lite' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function biznez_lite_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'biznez-lite-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		wp_enqueue_script( 'biznez-lite-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $biznez_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('biznez_show_required_actions') ):
			$biznez_show_required_actions = get_option('biznez_show_required_actions');
		else:
			$biznez_show_required_actions = array();
		endif;

		if( !empty($biznez_required_actions) ):
			foreach( $biznez_required_actions as $biznez_required_action_value ):
				if(( !isset( $biznez_required_action_value['check'] ) || ( isset( $biznez_required_action_value['check'] ) && ( $biznez_required_action_value['check'] == false ) ) ) && ((isset($biznez_show_required_actions[$biznez_required_action_value['id']]) && ($biznez_show_required_actions[$biznez_required_action_value['id']] == true)) || !isset($biznez_show_required_actions[$biznez_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'biznez-lite-welcome-screen-customizer-js', 'biznezLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=biznez-lite-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','biznez-lite'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function biznez_lite_dismiss_required_action_callback() {

		global $biznez_required_actions;

		$biznez_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $biznez_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($biznez_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('biznez_show_required_actions') ):

				$biznez_show_required_actions = get_option('biznez_show_required_actions');

				$biznez_show_required_actions[$biznez_dismiss_id] = false;

				update_option( 'biznez_show_required_actions',$biznez_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$biznez_show_required_actions_new = array();

				if( !empty($biznez_required_actions) ):

					foreach( $biznez_required_actions as $biznez_required_action ):

						if( $biznez_required_action['id'] == $biznez_dismiss_id ):
							$biznez_show_required_actions_new[$biznez_required_action['id']] = false;
						else:
							$biznez_show_required_actions_new[$biznez_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'biznez_show_required_actions', $biznez_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function biznez_lite_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="biznez-lite-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','biznez-lite'); ?></a></li>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute','biznez-lite'); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog','biznez-lite'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','biznez-lite'); ?></a></li>
		</ul>

		<div class="biznez-lite-tab-content">

			<?php
			/**
			 * @hooked biznez_lite_welcome_getting_started - 10
			 * @hooked biznez_lite_welcome_child_themes - 20
			 * @hooked biznez_lite_welcome_github - 30
			 * @hooked biznez_lite_welcome_changelog - 40
			 * @hooked biznez_lite_welcome_free_pro - 50
			 */
			do_action( 'biznez_lite_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function biznez_lite_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Contribute
	 * @since 1.8.2.4
	 */
	public function biznez_lite_welcome_github() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 * @since 1.8.2.4
	 */
	public function biznez_lite_welcome_changelog() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}

	/**
	 * Free vs PRO
	 * @since 1.8.2.4
	 */
	public function biznez_lite_welcome_free_pro() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/free_pro.php' );
	}
}

$GLOBALS['Biznez_Welcome'] = new Biznez_Welcome();