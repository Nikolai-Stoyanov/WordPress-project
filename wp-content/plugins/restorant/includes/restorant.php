<?php
if (!class_exists("Restorant_Cpt")):

class Restorant_Cpt{

    function __construct(){

        add_action( 'init', array( $this, 'robots_cpt' ) );
		add_action( 'init', array( $this, 'robot_category_taxonomy' ) );
    }

    public function robots_cpt() {
		$labels = array(
			'name'                  => _x( 'Robots', 'Post type general name', 'softuni' ),
			'singular_name'         => _x( 'Robot', 'Post type singular name', 'softuni' ),
			'menu_name'             => _x( 'Robots', 'Admin Menu text', 'softuni' ),
			'name_admin_bar'        => _x( 'Robot', 'Add New on Toolbar', 'softuni' ),
			'add_new'               => __( 'Add New', 'softuni' ),
			'add_new_item'          => __( 'Add New Robot', 'softuni' ),
			'new_item'              => __( 'New Robot', 'softuni' ),
			'edit_item'             => __( 'Edit Robot', 'softuni' ),
			'view_item'             => __( 'View Robot', 'softuni' ),
			'all_items'             => __( 'All Robots', 'softuni' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'revisions',
			),
			'show_in_rest'       => true
		);

		register_post_type( 'robot', $args );
	}


    public function robot_category_taxonomy () {
		$labels = array(
			'name' => 'Categories',
			'singular_name' => 'Category',

		);

		$args = array(
			'labels'       => $labels,
			'show_in_rest' => true,
			'hierarchical' => true,
		);

		register_taxonomy( 'robot-category', 'robot', $args );
	}

}


$restorant_cpt = new Restorant_Cpt();

endif;