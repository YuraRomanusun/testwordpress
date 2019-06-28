<?php

if ( class_exists ( 'TimberSite' ) ) {

	class MtntopconsultingSite extends TimberSite {

		function __construct() {

			add_filter( 'timber_context', array( $this, 'add_to_context' ) );

			parent::__construct();

		}

		function add_to_context( $context ) {
			global $post;
			
			// Check if current post is the homepage
			$context['is_front_page'] = is_front_page();

			// Check if current page is category page
			$context['is_category_page'] = is_category();
			$context['is_singular'] = is_singular('post');
			$context['is_blog'] = is_page('blog');
			$context['is_home'] = is_page('home');
			$context['home_id'] = get_option( 'page_on_front' );
			$context['is_404'] = is_404();
			
			// Get options
			$context['options'] = get_fields( 'options' );

			$context['menu'] = new TimberMenu( 'top-bar' );
		
			// Get the post type
			$context['post_type'] = get_query_var( 'post_type' );

			// Search query in search page
			$context['search_query'] = esc_html( get_search_query( false ) );

			//Check if mobile
			$context['mobile_device'] = wp_is_mobile();

			// Protected pages/posts
			$context['password_required'] = post_password_required($post->ID);
			$context['password_form'] = get_the_password_form($post->ID);

			//Archive
			$context['is_day'] = is_day();
			$context['is_month'] = is_month();
			$context['is_year'] = is_year();

			return $context;
		}

		/**
		 * Returns posts and pagination based on request variables
		 * @return array
		 */
		public static function blog_handler() {
			// Make sure you validate request variables before you will use them
			$page           = ( isset( $_REQUEST['n'] ) && $_REQUEST['n'] != 0 ) ? (int) $_REQUEST['n'] : 1;
			$posts_per_page = get_option('posts_per_page');
			$args           = array(
				'paged'          => $page,
				'posts_per_page' => $posts_per_page,
			);

			$query = new WP_Query($args);
			$posts = new \Timber\PostCollection($query->posts);
			return array(
				'posts'      => self::prepare_blogpost_array($posts->get_posts()),
				'pagination' => BedrockSite::bedrock_pagination( $page, $query->found_posts, $posts_per_page ),
			);
		}

	}

	new MtntopconsultingSite();

}