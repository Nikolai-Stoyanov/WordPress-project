<?php 
    $softuni_options=get_option('softuni_options') ;
    $hide_product=get_option('$hide_product') ;

    if(empty ($softuni_options)){
        $softuni_options=3;
    }

    if(!empty($_POST['robots_save']) && $_POST['robots_save']==1){
        if(!empty($_POST['custom_option'])){
            $options=esc_attr($_POST['custom_option']);
            update_option('softuni_options',$options,false);
        }
    }
 ?>

<div class="wrap">

		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="" method="post">
            <div>
                <label for="custom_option"><?php _e( 'Robots Number of post on the homepage ' , 'softuni'); ?></label>
                <input type="text" id="custom_option" name="custom_option" value="<?php echo esc_attr( $softuni_options );  ?>">
            </div>
            <div>
                <label for="hide_product">Hide Products?</label>
                <input type="checkbox" name="hide_product" <?php echo checked( $hide_product, 1, true ) ?> id="hide_product" value="1">
            </div>
            <div>
                <input type="submit" value="Update me">
            </div>
            <input type="hidden" name="robots_save" value="1">
		</form>
	</div>