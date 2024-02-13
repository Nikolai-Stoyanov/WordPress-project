<?php
$current_service_number = get_option('service_number');
$hide_service_section = get_option('hide_service_section');
$current_food_number = get_option('food_number');
$hide_food_section = get_option('hide_food_section');

if (!empty($_POST['save']) && $_POST['save'] == 1) {
    if (!empty($_POST['service_number'])) {
        $options = esc_attr($_POST['service_number']);
        update_option('service_number', $options, false);
        $current_service_number= $options;
    }

    if (!empty($_POST['hide_service_section'])) {
        $options = esc_attr($_POST['hide_service_section']);
        update_option('hide_service_section', $options, false);
        $hide_service_section= $options;
    }
    if (!empty($_POST['food_number'])) {
        $options = esc_attr($_POST['food_number']);
        update_option('food_number', $options, false);
        $current_food_number =$options;
    }
    if (!empty($_POST['hide_food_section'])) {
        $options = esc_attr($_POST['hide_food_section']);
        update_option('hide_food_section', $options, false);
        $hide_food_section = $options;
    }
}
?>

<div class="wrap">
    <h1>
        <?php echo esc_html(get_admin_page_title()); ?>
    </h1>
    <form action="" method="post" style="border:2px">
        <div style="border:1px solid;display: inline-block">
            <h4 style="padding-left:5px;">
                <?php _e('Service Section', 'softuni'); ?>
            </h4>
            <div style="padding:10px;">
                <label for="service_number">
                    <?php _e('Number of Homepage`s services', 'softuni'); ?>
                </label>
                <input type="number" id="service_number" name="service_number"
                    value="<?php echo esc_attr($current_service_number); ?>">
            </div>
            <div style="padding:10px;">
                <label for="hide_service_section">
                    <?php _e('Hide Servise Section'); ?>
                </label>
                <div>
                    <input type="radio" id="hide_service" name="hide_service_section" value="hide" <?php echo checked("hide", $hide_service_section, false) ?>>
                    <label for="hide_service">Hide</label><br>
                    <input type="radio" id="unhide_service" name="hide_service_section" value='unhide' <?php echo checked("unhide", $hide_service_section, false) ?>>
                    <label for="unhide_service">Unhide</label><br>

                </div>
            </div>
        </div>
        <div style="border:1px solid; margin-top:10px;display: inline-block">
            <h4 style="padding-left:5px;">
                <?php _e('Food Section', 'softuni'); ?>
            </h4>
            <div style="padding:10px;">
                <label for="food_number">
                    <?php _e('Number of Homepage`s foods in tab', 'softuni'); ?>
                </label>
                <input type="number" id="food_number" name="food_number"
                    value="<?php echo esc_attr($current_food_number); ?>">
            </div>
            <div style="padding:10px;">
                <label for="hide_food_section">
                    <?php _e('Hide Food Section'); ?>
                </label>
                <div>
                    <input type="radio" id="hide_food" name="hide_food_section" value="hide" <?php echo checked("hide", $hide_food_section, false) ?>>
                    <label for="hide_food">Hide</label><br>
                    <input type="radio" id="unhide_food" name="hide_food_section" value="unhide" <?php echo checked("unhide", $hide_food_section, false) ?>>
                    <label for="unhide_food">Unhide</label><br>
                </div>
            </div>
        </div>
        <div style="margin-top:30px;">
            <input type="submit" value="Update" class="button button-primary button-md">
        </div>
        <input type="hidden" name="save" value="1">
    </form>
</div>