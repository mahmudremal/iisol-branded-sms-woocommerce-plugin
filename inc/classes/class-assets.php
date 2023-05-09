<?php
/**
 * Enqueue theme assets
 *
 * @package FutureWordPressProjectBrandedSms
 */


namespace FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc;

use FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'wp_denqueue_scripts' ], 99 );
		/**
		 * The 'enqueue_block_assets' hook includes styles and scripts both in editor and frontend,
		 * except when is_admin() is used to include them conditionally
		 */
		// add_action( 'enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ], 10, 1 );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_denqueue_scripts' ], 99 );

		add_filter( 'futurewordpress/project/javascript/siteconfig', [ $this, 'siteConfig' ], 1, 1 );
	}

	public function register_styles() {
		// Register styles.
		wp_register_style( 'bootstrap', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/css/bootstrap.min.css', [], false, 'all' );
		// wp_register_style( 'slick-css', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/css/slick.css', [], false, 'all' );
		// wp_register_style( 'slick-theme-css', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/css/slick-theme.css', ['slick-css'], false, 'all' );
		// wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', [], false, 'all' );

		wp_register_style( 'FutureWordPressProjectBrandedSms', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_URI . '/frontend.css', [], $this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_DIR_PATH . '/frontend.css' ), 'all' );
		wp_register_style( 'FutureWordPressProjectBrandedSms-library', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/css/frontend-library.css', [], false, 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'FutureWordPressProjectBrandedSms-library' );
		wp_enqueue_style( 'FutureWordPressProjectBrandedSms' );
		// if( $this->allow_enqueue() ) {}

		// wp_enqueue_style( 'bootstrap' );
		// wp_enqueue_style( 'slick-css' );
		// wp_enqueue_style( 'slick-theme-css' );

	}

	public function register_scripts() {
		// Register scripts.
		// wp_register_script( 'slick-js', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/js/slick.min.js', ['jquery'], false, true );
		wp_register_script( 'FutureWordPressProjectBrandedSms', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI . '/frontend.js', ['jquery'], $this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_DIR_PATH . '/frontend.js' ), true );
		// wp_register_script( 'single-js', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI . '/single.js', ['jquery', 'slick-js'], $this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_DIR_PATH . '/single.js' ), true );
		// wp_register_script( 'author-js', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI . '/author.js', ['jquery'], $this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_DIR_PATH . '/author.js' ), true );
		wp_register_script( 'bootstrap', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/js/bootstrap.min.js', ['jquery'], false, true );
		// wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', ['jquery'], false, true );
		// wp_register_script( 'prismjs', 'https://preview.keenthemes.com/start/assets/plugins/custom/prismjs/prismjs.bundle.js', ['jquery'], false, true );
		// wp_register_script( 'datatables', 'https://preview.keenthemes.com/start/assets/plugins/custom/datatables/datatables.bundle.js', ['jquery'], false, true );
		wp_register_script( 'popperjs', 'https://unpkg.com/@popperjs/core@2', ['jquery'], false, true );
		wp_register_script( 'plugins-bundle', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/js/keenthemes.plugins.bundle.js', ['jquery'], false, true );
		wp_register_script( 'scripts-bundle', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/js/keenthemes.scripts.bundle', ['jquery'], false, true );

		// Enqueue Scripts.
		// Both of is_order_received_page() and is_wc_endpoint_url( 'order-received' ) will work to check if you are on the thankyou page in the frontend.
		// wp_enqueue_script( 'datatables' );
		wp_enqueue_script( 'FutureWordPressProjectBrandedSms' );
		// wp_enqueue_script( 'prismjs' );wp_enqueue_script( 'popperjs' )
		;wp_enqueue_script( 'bootstrap' );
		// if( $this->allow_enqueue() ) {}
		
		// wp_enqueue_script( 'bootstrap-js' );
		// wp_enqueue_script( 'slick-js' );

		// If single post page
		// if ( is_single() ) {
		// 	wp_enqueue_script( 'single-js' );
		// }

		// If author archive page
		// if ( is_author() ) {
		// 	wp_enqueue_script( 'author-js' );
		// }
		// 

		wp_localize_script( 'FutureWordPressProjectBrandedSms', 'fwpSiteConfig', apply_filters( 'futurewordpress/project/javascript/siteconfig', [
			'videoClips'		=> [],
		] ) );
	}
	private function allow_enqueue() {
		return ( function_exists( 'is_checkout' ) && ( is_checkout() || is_order_received_page() || is_wc_endpoint_url( 'order-received' ) ) );
	}

	/**
	 * Enqueue editor scripts and styles.
	 */
	public function enqueue_editor_assets() {

		$asset_config_file = sprintf( '%s/assets.php', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_PATH );

		if ( ! file_exists( $asset_config_file ) ) {
			return;
		}

		$asset_config = require_once $asset_config_file;

		if ( empty( $asset_config['js/editor.js'] ) ) {
			return;
		}

		$editor_asset    = $asset_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
		$version         = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : $this->filemtime( $asset_config_file );

		// Theme Gutenberg blocks JS.
		if ( is_admin() ) {
			wp_enqueue_script(
				'aquila-blocks-js',
				FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI . '/blocks.js',
				$js_dependencies,
				$version,
				true
			);
		}

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'aquila-blocks-css',
			FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			$this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_DIR_PATH . '/blocks.css' ),
			'all'
		);

	}
	public function admin_enqueue_scripts( $curr_page ) {
		global $post;
		// if( ! in_array( $curr_page, [ 'edit.php', 'post.php' ] ) || 'shop_order' !== $post->post_type ) {return;}
		wp_register_style( 'FutureWordPressProjectBrandedSmsBackendCSS', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_URI . '/backend.css', [], $this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_CSS_DIR_PATH . '/backend.css' ), 'all' );
		wp_register_script( 'FutureWordPressProjectBrandedSmsBackendJS', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI . '/backend.js', [ 'jquery' ], $this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_DIR_PATH . '/backend.js' ), true );

		// wp_register_style( 'FutureWordPressProjectBrandedSmsBackend', 'https://templates.iqonic.design/product/qompac-ui/html/dist/assets/css/qompac-ui.min.css?v=1.0.1', [], false, 'all' );
		wp_register_style( 'FutureWordPressProjectBrandedSmsBackend', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_LIB_URI . '/css/backend-library.css', [], false, 'all' );
		wp_register_script( 'FutureWordPressProjectBrandedSmsBackend', FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_URI . '/backend-library.js', [ 'jquery' ], $this->filemtime( FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_JS_DIR_PATH . '/backend-library.js' ), true );
		
		wp_enqueue_style( 'FutureWordPressProjectBrandedSmsBackendCSS' );
		wp_enqueue_script( 'FutureWordPressProjectBrandedSmsBackendJS' );
		if( isset( $_GET[ 'page' ] ) && in_array( $_GET[ 'page' ], apply_filters( 'futurewordpress/project/admin/allowedpage', [] ) ) ) {
			wp_enqueue_style( 'FutureWordPressProjectBrandedSmsBackend' );wp_enqueue_script( 'FutureWordPressProjectBrandedSmsBackend' );
		}

		wp_localize_script( 'FutureWordPressProjectBrandedSmsBackendJS', 'fwpSiteConfig', apply_filters( 'futurewordpress/project/javascript/siteconfig', [] ) );
	}
	private function filemtime( $file ) {
		return apply_filters( 'futurewordpress/project/filesystem/filemtime', false, $file );
	}
	public function siteConfig( $args ) {
		return wp_parse_args( [
			'ajaxUrl'    		=> admin_url( 'admin-ajax.php' ),
			'ajax_nonce' 		=> wp_create_nonce( 'futurewordpress/project/verify/nonce' ),
			'is_admin' 			=> is_admin(),
			'buildPath'  		=> FUTUREWORDPRESS_PROJECT_BRANDEDSMS_BUILD_URI,
			'videoClips'  		=> ( function_exists( 'WC' ) && WC()->session !== null ) ? (array) WC()->session->get( 'uploaded_files_to_archive' ) : [],
			'i18n'					=> [
				'sureToSubmit'							=> __( 'Want to submit it? You can retake.', 'iisol-branded-sms-woocommerce-plugin' ),
				'uploading'									=> __( 'Uploading', 'iisol-branded-sms-woocommerce-plugin' ),
				'click_here'								=> __( 'Click here', 'iisol-branded-sms-woocommerce-plugin' ),
				'video_exceed_dur_limit'		=> __( 'Video exceed it\'s duration limit.', 'iisol-branded-sms-woocommerce-plugin' ),
				'file_exceed_siz_limit'			=> __( 'Filesize exceed it maximum limit 30MB.', 'iisol-branded-sms-woocommerce-plugin' ),
				'audio_exceed_dur_limit'		=> __( 'Audio exceed it\'s duration limit.', 'iisol-branded-sms-woocommerce-plugin' ),
				'invalid_file_formate'			=> __( 'Invalid file formate.', 'iisol-branded-sms-woocommerce-plugin' ),
				'device_error'							=> __( 'Device Error', 'iisol-branded-sms-woocommerce-plugin' ),
				'confirm_cancel_subscribe'	=> __( 'Do you really want to cancel this Subscription?', 'iisol-branded-sms-woocommerce-plugin' ),
				'i_confirm_it'							=> __( 'Yes I confirm it', 'iisol-branded-sms-woocommerce-plugin' ),
				'confirming'								=> __( 'Confirming', 'iisol-branded-sms-woocommerce-plugin' ),
				'successful'								=> __( 'Successful', 'iisol-branded-sms-woocommerce-plugin' ),
				'request_failed'						=> __( 'Request failed', 'iisol-branded-sms-woocommerce-plugin' ),
				'submit'										=> __( 'Submit', 'iisol-branded-sms-woocommerce-plugin' ),
				'cancel'										=> __( 'Cancel', 'iisol-branded-sms-woocommerce-plugin' ),
				'registration_link'					=> __( 'Registration link', 'iisol-branded-sms-woocommerce-plugin' ),
				'password_reset'						=> __( 'Password reset', 'iisol-branded-sms-woocommerce-plugin' ),
				'give_your_old_password'		=> __( 'Give here your old password', 'iisol-branded-sms-woocommerce-plugin' ),
				'you_paused'								=> __( 'Subscription Paused', 'iisol-branded-sms-woocommerce-plugin' ),
				'you_paused_msg'						=> __( 'Your retainer subscription has been successfully paused. We\'ll keep your account on hold until you\'re ready to resume. Thank you!', 'iisol-branded-sms-woocommerce-plugin' ),
				'you_un_paused'							=> __( 'Subscription Resumed', 'iisol-branded-sms-woocommerce-plugin' ),
				'you_un_paused_msg'					=> __( 'Welcome back! Your retainer subscription has been successfully resumed. We\'ll continue to provide you with our services as before. Thank you!', 'iisol-branded-sms-woocommerce-plugin' ),
				'are_u_sure'								=> __( 'Are you sure?', 'iisol-branded-sms-woocommerce-plugin' ),
				'sure_to_delete'						=> __( 'Are you sure about this deletation. Once you permit to delete, this user data will be removed from database forever. This can\'t be Undone', 'iisol-branded-sms-woocommerce-plugin' ),
				'sent_reg_link'							=> __( 'Registration Link sent successfully!', 'iisol-branded-sms-woocommerce-plugin' ),
				'sent_passreset'						=> __( 'Password reset link sent Successfully!', 'iisol-branded-sms-woocommerce-plugin' ),
				'sometextfieldmissing'			=> __( 'Some required field you missed. Pleae fillup them first, then we can proceed.', 'iisol-branded-sms-woocommerce-plugin' ),
				'retainer_zero'							=> __( 'Retainer Amount Zero', 'iisol-branded-sms-woocommerce-plugin' ),
				'retainer_zerowarn'					=> __( 'You must set retainer amount before send a registration email.', 'iisol-branded-sms-woocommerce-plugin' ),
				'selectcontract'						=> __( 'Select Contract', 'iisol-branded-sms-woocommerce-plugin' ),
				'sure2logout'								=> __( 'Are you to Logout?', 'iisol-branded-sms-woocommerce-plugin' ),
				'selectcontractwarn'				=> __( 'Please choose a contract to send the registration link. Once you have selected a contract and updated the form, you will be able to send the registration link.', 'iisol-branded-sms-woocommerce-plugin' ),
				'subscription_toggled'			=> __( 'Thank you for submitting your request. We have reviewed and accepted it, and it is now pending for today. You will have the option to change your decision tomorrow. Thank you for your patience and cooperation.', 'iisol-branded-sms-woocommerce-plugin' ),
				'rusure2unsubscribe'				=> __( 'You can only pause you retainer once every 60 days. Are you sure you want to pause your retainer?', 'iisol-branded-sms-woocommerce-plugin' ),
				'rusure2subscribe'					=> __( 'We are super happy you want to resume your retainer. Are you sure you want to start now?', 'iisol-branded-sms-woocommerce-plugin' ),
				'say2wait2pause'						=> __( 'You\'ve already paused your subscription this month. Please wait until 60 days over to pause again. If you need further assistance, please contact our administrative team.', 'iisol-branded-sms-woocommerce-plugin' ),
			],
			'leadStatus'		=> apply_filters( 'futurewordpress/project/action/statuses', ['no-action' => __( 'No action fetched', 'iisol-branded-sms-woocommerce-plugin' )], false )
		], (array) $args );
	}
	public function wp_denqueue_scripts() {}
	public function admin_denqueue_scripts() {
		if( ! isset( $_GET[ 'page' ] ) ||  $_GET[ 'page' ] !='crm_dashboard' ) {return;}
		wp_dequeue_script( 'qode-tax-js' );
	}

}
