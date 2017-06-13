<?php

/* **************************************************************************************************** */
// METABOX - SIDEBAR +++ START
/* **************************************************************************************************** */

$meta_box_options['underwood_sidebar_meta_box']['id'] = 'sidebar_meta_box';
$meta_box_options['underwood_sidebar_meta_box']['title'] = 'Underwood Sidebar Options';
$meta_box_options['underwood_sidebar_meta_box']['callback'] = 'underwood_call_sidebar_meta_box'; #create
$meta_box_options['underwood_sidebar_meta_box']['post_type'] = 'post,page,attachment';
$meta_box_options['underwood_sidebar_meta_box']['context'] = 'side';
$meta_box_options['underwood_sidebar_meta_box']['priority'] = 'low';
$meta_box_options['underwood_sidebar_meta_box']['fields']['underwood_sidebar_select']
    = array('type'=>'radio',
            'options'=>array('left'=>'Left', 'right'=>'Right', 'full'=>'Full Width'),
            'default'=>'right',
            'script'=>'',
            'help'=>'Sidebar Display Options:');
$meta_box_options['underwood_sidebar_meta_box']['fields']['underwood_sidebar_number']
    = array('type'=>'textbox',
            'default'=>'',
            'script'=>'',
            'label'=>'Sidebar #:',
            'help'=>'Enter the number of the alternate sidebar you would like to apply. Leave blank to use the default sidebar.',
            'size'=>2);
add_action("admin_init", "underwood_sidebar_meta_box");
add_action('save_post', 'underwood_save_sidebar_meta_box');


function underwood_sidebar_meta_box() {
    $key = 'underwood_sidebar_meta_box';
    global $meta_box_options;
    $id = $meta_box_options[$key]['id'];
    $title = $meta_box_options[$key]['title'];
    $callback = $meta_box_options[$key]['callback'];
    $post_type = $meta_box_options[$key]['post_type'];
    $context = $meta_box_options[$key]['context'];
    $priority = $meta_box_options[$key]['priority'];
    $arr = explode(',', $post_type);
    foreach($arr as $v){
        add_meta_box($id, $title, $callback, $v, $context, $priority);
    }
}

function underwood_call_sidebar_meta_box() {
    $key = 'underwood_sidebar_meta_box';
    global $meta_box_options;
    global $post;
    $fields = $meta_box_options[$key]['fields'];
    underwood_metabox_nonce();
    underwood_draw_fields($fields, $post->ID);
}

function underwood_save_sidebar_meta_box($post_id) {

    $key = 'underwood_sidebar_meta_box';
    global $meta_box_options;
    global $post;

    // verify nonce
    if (isset($_POST['meta_box_nonce'])) {
        $pid = underwood_verify_nonce($_POST['meta_box_nonce'], $post_id);
        if($pid) return $pid;
    }

    // check autosave
    $pid = underwood_check_autosave($post_id);
    if($pid) return $pid;

    // check permissions
    if (isset($_POST['post_type'])) {
        $pid = underwood_verify_permissions($post_id, $_POST['post_type']);
        if($pid) return $pid;
    }

    $fields = $meta_box_options[$key]['fields'];
    foreach($fields as $k=>$f){
        $field_name = $k;
        if(isset($_POST[$field_name])) {
            $raw_value=$_POST[$field_name];
            $type=$f['type'];
            $value=underwood_sanitize_meta_field_value($type,$raw_value);
            update_post_meta($post_id, $field_name, $value);
        }
    }

}


/* **************************************************************************************************** */
// METABOX - FEAUTURED IMAGES +++ START
/* **************************************************************************************************** */

$meta_box_options['underwood_featured_img_meta_box']['id'] = 'featured_img_meta_box';
$meta_box_options['underwood_featured_img_meta_box']['title'] = 'Underwood Featured Images';
$meta_box_options['underwood_featured_img_meta_box']['callback'] = 'underwood_call_featured_img_meta_box'; #create
$meta_box_options['underwood_featured_img_meta_box']['post_type'] = 'page,post';
$meta_box_options['underwood_featured_img_meta_box']['context'] = 'side';
$meta_box_options['underwood_featured_img_meta_box']['priority'] = 'low';
$meta_box_options['underwood_featured_img_meta_box']['fields']['underwood_toggle_featured']
    = array('type'=>'radio',
            'options'=>array('show'=>'Show', 'hide'=>'Hide'),
            'default'=>'hide',
            'script'=>'',
            'help'=>'Show or hide the featured image at the top of the content column if one is set.');
$meta_box_options['underwood_featured_img_meta_box']['fields']['underwood_toggle_featured_banner']
    = array('type'=>'radio',
            'options'=>array('show'=>'Show', 'hide'=>'Hide'),
            'default'=>'show',
            'script'=>'',
            'help'=>'Show or hide the featured image in the banner if one is set.');           
add_action("admin_init", "underwood_featured_img_meta_box");
add_action('save_post', 'underwood_save_featured_img_meta_box');



function underwood_featured_img_meta_box() {
    $key = 'underwood_featured_img_meta_box';
    global $meta_box_options;
    $id = $meta_box_options[$key]['id'];
    $title = $meta_box_options[$key]['title'];
    $callback = $meta_box_options[$key]['callback'];
    $post_type = $meta_box_options[$key]['post_type'];
    $context = $meta_box_options[$key]['context'];
    $priority = $meta_box_options[$key]['priority'];
    $arr = explode(',', $post_type);
    foreach($arr as $v){
        add_meta_box($id, $title, $callback, $v, $context, $priority);
    }
}

function underwood_call_featured_img_meta_box() {



    $key = 'underwood_featured_img_meta_box';
    global $meta_box_options;
    global $post;

    $fields = $meta_box_options[$key]['fields'];
    underwood_metabox_nonce();
    underwood_draw_fields($fields, $post->ID);
}

function underwood_save_featured_img_meta_box($post_id) {

    $key = 'underwood_featured_img_meta_box';
    global $meta_box_options;
    global $post;

    // verify nonce
    if (isset($_POST['meta_box_nonce'])) {
        $pid = underwood_verify_nonce($_POST['meta_box_nonce'], $post_id);
        if($pid) return $pid;
    }

    // check autosave
    $pid = underwood_check_autosave($post_id);
    if($pid) return $pid;

    // check permissions
    if (isset($_POST['post_type'])) {
        $pid = underwood_verify_permissions($post_id, $_POST['post_type']);
        if($pid) return $pid;
    }

    $fields = $meta_box_options[$key]['fields'];
    foreach($fields as $k=>$f){
        $field_name = $k;
        if(isset($_POST[$field_name])) {
            $raw_value=$_POST[$field_name];
            $type=$f['type'];
            $value=underwood_sanitize_meta_field_value($type,$raw_value);
            update_post_meta($post_id, $field_name, $value);
        }
    }

}





/*** HELPER FUNCTIONS ***/



// Sanitize all input

function underwood_sanitize_meta_field_value($type,$raw_value) {
    switch($type){
                case 'radio':
                            $value = sanitize_key($raw_value);
                            return $value;
                            break;
                case 'textbox':
                            $value = sanitize_text_field($raw_value);
                            return $value;
                            break;
                case 'textarea':
                            $value = wp_kses_post($raw_value);
                            return $value;
                            break;
                case 'select':
                            $value = sanitize_key( $raw_value );
                            return $value;
                            break;
                case 'colorbox':
                            $value = sanitize_hex_color($raw_value);
                            return $value;
                            break;
    }
}


### FORM FIELDS ###

function underwood_draw_fields($fields, $post_id){
    foreach($fields as $k=>$f){
        $field_name = $k;
        $field_value = get_post_meta($post_id, $field_name, true);
        echo '<p>' . $f['help'] .'</p>';
        echo $f['script'];
        switch($f['type']){
            case 'radio':
                        underwood_draw_radio_buttons($f['options'], $f['default'], $field_name, $field_value);
                        break;
            case 'textbox':
                        underwood_draw_textbox($f['label'], $field_name, $field_value, $f['size']);
                        break;
            case 'textarea':
                        underwood_draw_textarea($f['label'], $field_name, $field_value, $f['cols'], $f['rows']);
                        break;
            case 'select':
                        underwood_draw_select($f['options'], $f['default'], $field_name, $field_value);
                        break;
            case 'colorbox':
                        underwood_draw_colorbox($f['label'], $field_name, $field_value, $f['size']);
                        break;
        }
    }
}


function underwood_metabox_nonce(){
    echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
}


function underwood_draw_radio_buttons($options, $default, $field_name, $field_value){
    $checked_option = $default;
    foreach($options as $val=>$lab){
        if($field_value == $val && $field_value != $default)
            $checked_option = $val;
    }
    foreach($options as $val=>$lab){
        $checked = $val == $checked_option ? 'checked' : '';
        $id = $field_name . '-' . $val;
        echo '<input class="" type="radio" name="'.$field_name.'" id="'.$id .'" value="'.$val.'" ' . $checked . '><label style="float:none;" for="'.$id.'">'.$lab.'</label><br />';
    }
}

function underwood_draw_select($options, $default, $field_name, $field_value){
    echo '<select name="'.$field_name.'">';
    foreach($options as $val=>$lab){
        $selected = $field_value == $val ? 'selected' : '';
        if($checked == '') $checked = $val == $default ? 'selected' : '';
        echo '<option value="'.$val.'" ' . $selected . '>'.$lab.'</option>';
    }
    echo '</select>';
}

function underwood_draw_textbox($label, $field_name, $field_value, $size){
    echo '<label>' . $label . ' </label>';
    echo '<input type="text" id="'.$field_name.'" name="'.$field_name.'" value="'.$field_value.'" size="'.$size.'" />';
}

function underwood_draw_colorbox($label, $field_name, $field_value, $size){
    echo '<label>' . $label . ' </label>';
    echo '<input type="text" class="color {required:false}" id="colorbox_'.$field_name.'" name="'.$field_name.'" value="'.$field_value.'" size="'.$size.'" />';
}

function underwood_draw_textarea($label, $field_name, $field_value, $cols, $rows){
    echo '<label>' . $label . '</label><br />';
    echo '<textarea name="'.$field_name.'" id="'.$field_name.'" cols="'.$cols.'" rows="'.$rows.'">' . $field_value . '</textarea>';
}

### VERIFICATION FUNCTIONS ###

function underwood_verify_nonce($meta_box_nonce, $post_id){
    if (isset($meta_box_nonce)) {
        if (!wp_verify_nonce($meta_box_nonce, basename(__FILE__))) {
            return $post_id;
        }
    }
    return false;
}

function underwood_check_autosave($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    return false;
}

function underwood_verify_permissions($post_id, $post_type){
     if (isset($post_type)) {
        if ('page' == $post_type) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        return false;
    }
    return false;
}


?>