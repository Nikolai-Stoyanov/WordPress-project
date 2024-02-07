<?php
if (!class_exists("Restorant_Cpt")):

	class Restorant_Cpt{

		function __construct(){
			add_action('init', array( $this, 'services_cpt' ));
			add_action('init', array( $this, 'team_cpt' ));
			add_action('init', array( $this, 'testimonial_cpt' ));
			add_action('init', array( $this, 'foods_cpt' ));
			add_action('init', array( $this, 'restorant_category_taxonomy' ));
			add_action('add_meta_boxes', array( $this, 'register_meta_boxes' ));
			add_action('save_post', array( $this, 'food_meta_save' ));
		}

	
		public function team_cpt(){
			$labels = array(
				'name' => _x('Team', 'Post type general name', 'softuni'),
				'singular_name' => _x('Team', 'Post type singular name', 'softuni'),
				'menu_name' => _x('Team', 'Admin Menu text', 'softuni'),
				'name_admin_bar' => _x('Team', 'Add New on Toolbar', 'softuni'),
				'add_new' => __('Add New', 'softuni'),
				'add_new_item' => __('Add New Team', 'softuni'),
				'new_item' => __('New Team', 'softuni'),
				'edit_item' => __('Edit Team', 'softuni'),
				'view_item' => __('View Team', 'softuni'),
				'all_items' => __('All Team', 'softuni'),
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'revisions',
				),
				'show_in_rest' => true
			);

			register_post_type('team', $args);
		}

		public function testimonial_cpt(){
			$labels = array(
				'name' => _x('Testimonials', 'Post type general name', 'softuni'),
				'singular_name' => _x('Testimonial', 'Post type singular name', 'softuni'),
				'menu_name' => _x('Testimonials', 'Admin Menu text', 'softuni'),
				'name_admin_bar' => _x('Testimonial', 'Add New on Toolbar', 'softuni'),
				'add_new' => __('Add New', 'softuni'),
				'add_new_item' => __('Add New Testimonial', 'softuni'),
				'new_item' => __('New Testimonial', 'softuni'),
				'edit_item' => __('Edit Testimonial', 'softuni'),
				'view_item' => __('View Testimonial', 'softuni'),
				'all_items' => __('All Testimonials', 'softuni'),
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'revisions',
				),
				'show_in_rest' => true
			);

			register_post_type('testimonial', $args);
		}

		public function foods_cpt(){
			$labels = array(
				'name' => _x('Foods', 'Post type general name', 'softuni'),
				'singular_name' => _x('Food', 'Post type singular name', 'softuni'),
				'menu_name' => _x('Foods', 'Admin Menu text', 'softuni'),
				'name_admin_bar' => _x('Food', 'Add New on Toolbar', 'softuni'),
				'add_new' => __('Add New', 'softuni'),
				'add_new_item' => __('Add New Food', 'softuni'),
				'new_item' => __('New Food', 'softuni'),
				'edit_item' => __('Edit Food', 'softuni'),
				'view_item' => __('View Food', 'softuni'),
				'all_items' => __('All Foods', 'softuni'),
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'revisions',
				),
				'show_in_rest' => true
			);

			register_post_type('food', $args);
		}

		public function services_cpt(){
			$labels = array(
				'name' => _x('Services', 'Post type general name', 'softuni'),
				'singular_name' => _x('Service', 'Post type singular name', 'softuni'),
				'menu_name' => _x('Services', 'Admin Menu text', 'softuni'),
				'name_admin_bar' => _x('Service', 'Add New on Toolbar', 'softuni'),
				'add_new' => __('Add New', 'softuni'),
				'add_new_item' => __('Add New Service', 'softuni'),
				'new_item' => __('New Service', 'softuni'),
				'edit_item' => __('Edit Service', 'softuni'),
				'view_item' => __('View Service', 'softuni'),
				'all_items' => __('All Services', 'softuni'),
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'revisions',
				),
				'show_in_rest' => true
			);

			register_post_type('service', $args);
		}

		public function restorant_category_taxonomy(){
			$labels = array(
				'name' => 'Categories',
				'singular_name' => 'Category',

			);

			$args = array(
				'labels' => $labels,
				'show_in_rest' => true,
				'hierarchical' => true,
			);

			register_taxonomy('restorant-category', 'food', $args);
			register_taxonomy('restorant-category', 'team', $args);
			register_taxonomy('restorant-category', 'service', $args);
			register_taxonomy('restorant-category', 'testimonial', $args);
		}



		/**
		 * Register meta box(es).
		 */
		public function register_meta_boxes(){
			add_meta_box('price', __('Price', 'softuni'), array( $this, 'food_price_metabox_callback' ), 'food', 'side');
			add_meta_box('food_type', __('Food Type', 'softuni'), array( $this, 'food_type_metabox_callback' ), 'food', 'side');
		}

		/**
		 * Callback function for Price Metabox
		 *
		 * @return void
		 */
		public function food_price_metabox_callback($post_id){
			$price = get_post_meta($post_id->ID, 'price', true);
			?>
			<div>
				<label for='price'>Price</label>
			</div>
			<div>
				<input id='price' name='price' type='number' value='<?php echo ($price); ?>' />
			</div>
			<?php
		}

		public function food_type_metabox_callback($post_id){
			$food_type = get_post_meta($post_id->ID, 'food_type', true);
			?>

			<div>
				<label for='food_type'>Food Type</label>
			</div>
			<div>
				<select id='food_type' name='food_type'>
					<option value='' selected disabled hidden>
						<?php echo ($food_type); ?>
					</option>
					<option value="Breakfast">Breakfast</option>
					<option value="Launch">Launch</option>
					<option value="Dinner">Dinner</option>
				</select>
			</div>
			<?php
		}


		/**
		 * Save Foods post meta
		 *
		 * @return void
		 */
		public function food_meta_save($post_id){
			if (empty($post_id)) {
				return;
			}

			$price = '';
			$food_type = '';

			if (isset($_POST['price'])) {
				$price = esc_attr($_POST['price']);
			}

			if (isset($_POST['food_type'])) {
				$food_type = esc_attr($_POST['food_type']);
			}

			update_post_meta($post_id, 'price', $price);
			update_post_meta($post_id, 'food_type', $food_type);
		}
	}

	$restorant_cpt = new Restorant_Cpt();

endif;