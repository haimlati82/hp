<?php
function register_my_custom_field() {
    $args = array(
        'name' => 'My Custom Field',
        'edit_options'  => array(
            array(
                'type' => 'hidden',
                'name' => 'user_info_field_group',
            ),
        ),
        'display_function' => 'ninja_forms_field_list_hp_display',
        'edit_function' => 'ninja_forms_field_list_hp_edit',
        'sidebar' => 'template_fields',
        'save_function' => '',
		'group' => 'standard_fields',
		'edit_label' => true,
		'edit_label_pos' => true,
		'edit_req' => true,
		'edit_custom_class' => true,
		'edit_help' => true,
		'edit_desc' => true,
		'edit_meta' => false,
		'edit_conditional' => true,
        'sub_table_value' => 'nf_field_list_hp_sub_table_value',
       // 'pre_process'        =>  'ninja_forms_field_list_hp_process',

    );

    if( function_exists( 'ninja_forms_register_field' ) ) {
        ninja_forms_register_field('my_field', $args);
    }
}
add_action( 'init', 'register_my_custom_field' );
/*
 * This function outputs HTML for the backend editor.
 * The naming convention is: ninja_forms_field_4[custom_value].
 * It will be available as $data[custom_value].
 *
 * $field_id is the id of the field currently being edited.
 * $data is an array of the field data, including any custom variables.
 *
*/
function ninja_forms_field_list_hp_edit( $field_id, $data ) {
    global $wpdb;

    $list_type = isset( $data['list_type'] ) ? $data['list_type'] : '';
    $hidden = isset( $data['list_show_value'] ) ? $data['list_show_value'] : 0;
    $multi_size = isset( $data['multi_size'] ) ? $data['multi_size'] : 5;
    $default_options = array(
        array( 'label' => 'Option 1', 'value' => '', 'calc' => '', 'selected' => 0 ),
        array( 'label' => 'Option 2', 'value' => '', 'calc' => '', 'selected' => 0 ),
        array( 'label' => 'Option 3', 'value' => '', 'calc' => '', 'selected' => 0 ),
    );

    $list_options = isset ( $data['list']['options'] ) ? $data['list']['options'] : $default_options;

    $list_type_options = array(
        array('name' => __( 'Dropdown', 'ninja-forms' ), 'value' => 'dropdown'),
        array('name' => __( 'Radio', 'ninja-forms' ), 'value' => 'radio'),
        array('name' => __( 'Checkboxes', 'ninja-forms' ), 'value' => 'checkbox'),
        array('name' => __( 'Multi-Select', 'ninja-forms' ), 'value' => 'multi'),
    );

    ninja_forms_edit_field_el_output( $field_id, 'select', __( 'List Type', 'ninja-forms' ), 'list_type', $list_type, 'wide', $list_type_options, 'widefat' );

    ?>

    <p id="ninja_forms_field_<?php echo $field_id;?>_multi_size_p" class="description description-wide" style="<?php if($list_type != 'multi'){ echo 'display:none;';}?>">
        <?php _e( 'Multi-Select Box Size', 'ninja-forms' );?>: <input type="text" id="" name="ninja_forms_field_<?php echo $field_id;?>[multi_size]" value="<?php echo $multi_size;?>">
    </p>
    <span id="ninja_forms_field_<?php echo $field_id;?>_list_span" class="ninja-forms-list-span">
		<!-- <p class="description description-wide"> -->
			<a href="#" id="ninja_forms_field_<?php echo $field_id;?>_list_add_option" class="ninja-forms-field-add-list-option button-secondary"><?php _e( 'Add New', 'ninja-forms' );?></a>
			<a href="#TB_inline?width=640&height=530&inlineId=ninja_forms_field_<?php echo $field_id;?>_import_options_div" class="thickbox button-secondary" title="<?php _e( 'Import List Items', 'ninja-forms' ); ?>" id=""><?php _e( 'Import List Items', 'ninja-forms' );?></a>
		<!-- </p> -->

		<p class="description description-wide">
            <input type="hidden" id="" name="ninja_forms_field_<?php echo $field_id;?>[list_show_value]" value="0">
            <label for="ninja_forms_field_<?php echo $field_id;?>_list_show_value"><input type="checkbox" value="1" id="ninja_forms_field_<?php echo $field_id;?>_list_show_value" name="ninja_forms_field_<?php echo $field_id;?>[list_show_value]" class="ninja-forms-field-list-show-value" <?php if(isset($data['list_show_value']) AND $data['list_show_value'] == 1){ echo "checked='checked'";}?>>
                <?php _e( 'Show list item values', 'ninja-forms' );?> </label>
        </p>
		<div id="ninja_forms_field_<?php echo $field_id;?>_list_options" class="ninja-forms-field-list-options description description-wide">
            <input type="hidden" name="ninja_forms_field_<?php echo $field_id;?>[list][options]" value="">
            <?php
            if( isset( $list_options ) AND is_array( $list_options ) AND $list_options != '' ){
                $x = 0;
                foreach( $list_options as $option ) {
                    ninja_forms_field_list_option_output( $field_id, $x, $option, $hidden );
                    $x++;
                }
            }
            ?>

        </div>
	</span>
    <?php add_thickbox(); ?>
    <div id="ninja_forms_field_<?php echo $field_id;?>_import_options_div" style="display:none;">
        <textarea id="test" class="list-import-textarea"></textarea>
        <input type="button" class="save-list-import button-secondary" value="<?php _e( 'Import', 'ninja-forms' ); ?>" rel="<?php echo $field_id;?>">
        <input type="button" class="cancel-list-import button-secondary" value="<?php _e( 'Cancel', 'ninja-forms' ); ?>">
        <p><?php _e( 'To use this feature, you can paste your CSV into the textarea above.', 'ninja-forms' );?></p>
        <p><?php _e( 'The format should look like the following:', 'ninja-forms' );?></p>
<pre>
<?php
$example1 = _x( 'Label,Value,Calc', 'Example for list importing. Leave puncation in place.', 'ninja-forms' );
echo $example1;
echo '<br />';
echo $example1;
echo '<br />';
echo $example1;
?>
</pre>

        <p><?php _e( "If you want to send an empty value or calc, you should use '' for those.", 'ninja-forms' );?></p>
<pre>
<?php
$example2 = __( 'Label', 'ninja-forms' ) . ",'',''";
echo $example2;
echo '<br />';
echo $example2;
echo '<br />';
echo $example2;
?>
</pre>


    </div>
    <?php
}
function ninja_forms_field_list_hp_display( $field_id, $data, $form_id = '' ){
    global $wpdb, $ninja_forms_fields;

    if(isset($data['show_field'])){
        $show_field = $data['show_field'];
    }else{
        $show_field = true;
    }

    $field_class = ninja_forms_get_field_class( $field_id, $form_id );
    $field_row = ninja_forms_get_field_by_id($field_id);

    $type = $field_row['type'];
    $type_name = $ninja_forms_fields[$type]['name'];

    if ( isset( $data['list_type'] ) ) {
        $list_type = $data['list_type'];
    } else {
        $list_type = '';
    }

    if(isset($data['list_show_value'])){
        $list_show_value = $data['list_show_value'];
    }else{
        $list_show_value = 0;
    }

    if( isset( $data['list']['options'] ) AND $data['list']['options'] != '' ){
        $options = $data['list']['options'];
    }else{
        $options = array();
    }

    if(isset($data['label_pos'])){
        $label_pos = $data['label_pos'];
    }else{
        $label_pos = 'left';
    }

    if(isset($data['label'])){
        $label = $data['label'];
    }else{
        $label = $type_name;
    }

    if( isset( $data['multi_size'] ) ){
        $multi_size = $data['multi_size'];
    }else{
        $multi_size = 5;
    }

    if( isset( $data['default_value'] ) AND !empty( $data['default_value'] ) ){
        $selected_value = $data['default_value'];
    }else{
        $selected_value = '';
    }

    $list_options_span_class = apply_filters( 'ninja_forms_display_list_options_span_class', '', $field_id );
echo '<div class="middle">';
    switch($list_type){
        case 'dropdown':
            ?>
            <input type="hidden" class="b-drop-list_val <?php echo $field_class;?>" name="ninja_forms_field_<?php echo $field_id;?>" id="ninja_forms_field_<?php echo $field_id;?>" rel="<?php echo $field_id;?>">
             <div class="b-drop-list"><a href="#" class="main-link js-dropdown"><span class="value"><?php echo $options[0]['label'];?></span>
                            <svg version="1.1" viewbox="0 0 102 102" class="svg">
                                <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
                            </svg></a>
                 <div class="b-drop">
                <?php
                if($label_pos == 'inside'){
                    ?>
                    <a href="#" class="link js-count"><?php echo $label;?></a>

                    <?php
                }
                foreach($options as $option){

                    if(isset($option['value'])){
                        $value = $option['value'];
                    }else{
                        $value = $option['label'];
                    }

                    $value = htmlspecialchars( $value, ENT_QUOTES );

                    if(isset($option['label'])){
                        $label = $option['label'];
                    }else{
                        $label = '';
                    }

                    if(isset($option['display_style'])){
                        $display_style = $option['display_style'];
                    }else{
                        $display_style = '';
                    }

                    if ( isset( $option['disabled'] ) AND $option['disabled'] ){
                        $disabled = 'disabled';
                    }else{
                        $disabled = '';
                    }

                    $label = htmlspecialchars( $label, ENT_QUOTES );

                    $label = stripslashes( $label );

                    $label = str_replace( '&amp;', '&', $label );

                    $field_label = $data['label'];

                    if($list_show_value == 0){
                        $value = $label;
                    }


                    if ( $selected_value == $value OR ( is_array( $selected_value ) AND in_array( $value, $selected_value ) ) ) {
                        $selected = 'selected';
                    }else if( ( $selected_value == '' OR $selected_value == $field_label ) AND isset( $option['selected'] ) AND $option['selected'] == 1 ){
                        $selected = 'selected';
                    }else{
                        $selected = '';
                    }

                    ?>
                    <a href="#" class="link js-count"><?php echo $label;?></a>
                    <?php
                }
                ?>
             </div>
            <?php
            break;
        case 'radio':
            $x = 0;
            if( $label_pos == 'left' OR $label_pos == 'above' ){
                ?><?php

            }
            ?><input type="hidden" name="ninja_forms_field_<?php echo $field_id;?>" value=""><span id="ninja_forms_field_<?php echo $field_id;?>_options_span" class="<?php echo $list_options_span_class;?>" rel="<?php echo $field_id;?>"><ul><?php
                foreach($options as $option){

                    if(isset($option['value'])){
                        $value = $option['value'];
                    }else{
                        $value = $option['label'];
                    }

                    $value = htmlspecialchars( $value, ENT_QUOTES );

                    if(isset($option['label'])){
                        $label = $option['label'];
                    }else{
                        $label = '';
                    }

                    if(isset($option['display_style'])){
                        $display_style = $option['display_style'];
                    }else{
                        $display_style = '';
                    }

                    //$label = htmlspecialchars( $label, ENT_QUOTES );

                    $label = stripslashes($label);

                    if($list_show_value == 0){
                        $value = $label;
                    }

                    if ( $selected_value == $value OR ( is_array( $selected_value ) AND in_array( $value, $selected_value ) ) ) {
                        $selected = 'checked';
                    }else if( $selected_value == '' AND isset( $option['selected'] ) AND $option['selected'] == 1 ){
                        $selected = 'checked';
                    }else{
                        $selected = '';
                    }
                    ?><li><label id="ninja_forms_field_<?php echo $field_id;?>_<?php echo $x;?>_label" class="ninja-forms-field-<?php echo $field_id;?>-options" style="<?php echo $display_style;?>" for="ninja_forms_field_<?php echo $field_id;?>_<?php echo $x;?>"><input id="ninja_forms_field_<?php echo $field_id;?>_<?php echo $x;?>" name="ninja_forms_field_<?php echo $field_id;?>" type="radio" class="<?php echo $field_class;?>" value="<?php echo $value;?>" <?php echo $selected;?> rel="<?php echo $field_id;?>" /><?php echo $label;?></label></li><?php
                    $x++;
                }
                ?></ul></span><li style="display:none;" id="ninja_forms_field_<?php echo $field_id;?>_template"><label><input id="ninja_forms_field_<?php echo $field_id;?>_" name="" type="radio" class="<?php echo $field_class;?>" value="" rel="<?php echo $field_id;?>" /></label></li>
            <?php
            break;
        case 'checkbox':
            $x = 0;
            ?><input type="hidden" id="ninja_forms_field_<?php echo $field_id;?>" name="ninja_forms_field_<?php echo $field_id;?>" value=""><fieldset id="ninja_forms_field_<?php echo $field_id;?>_options_span" class="b-checkbox-fields <?php echo $list_options_span_class;?>" rel="<?php echo $field_id;?>"><?php
                foreach($options as $option){

                    if(isset($option['value'])){
                        $value = $option['value'];
                    }else{
                        $value = $option['label'];
                    }

                    $value = htmlspecialchars( $value, ENT_QUOTES );

                    if(isset($option['label'])){
                        $label = $option['label'];
                    }else{
                        $label = '';
                    }

                    if(isset($option['display_style'])){
                        $display_style = $option['display_style'];
                    }else{
                        $display_style = '';
                    }

                    //$label = htmlspecialchars( $label, ENT_QUOTES );

                    $label = stripslashes( $label) ;

                    if($list_show_value == 0){
                        $value = $label;
                    }

                    if( isset( $option['selected'] ) AND $option['selected'] == 1 ){
                        $checked = 'checked';
                    }

                    if( is_array( $selected_value ) AND in_array($value, $selected_value) ){
                        $checked = 'checked';
                    }else if($selected_value == $value){
                        $checked = 'checked';
                    }else if( $selected_value == '' AND isset( $option['selected'] ) AND $option['selected'] == 1 ){
                        $checked = 'checked';
                    }else{
                        $checked = '';
                    }

                    ?>
                    <div class="row">
                    <input id="ninja_forms_field_<?php echo $field_id;?>_<?php echo $x;?>" name="ninja_forms_field_<?php echo $field_id;?>[]" type="checkbox" class="<?php echo $field_class;?> ninja_forms_field_<?php echo $field_id;?>" value="<?php echo $value;?>" <?php echo $checked;?> rel="<?php echo $field_id;?>"/>
                    <label  class="checkbox" style="<?php echo $display_style;?>"><?php echo $label;?></label>
                    </div>
                    <?php
                    $x++;
                }
                ?></fieldset>
            <?php
            break;
        case 'multi':
            ?>
            <select name="ninja_forms_field_<?php echo $field_id;?>[]" id="ninja_forms_field_<?php echo $field_id;?>" class="<?php echo $field_class;?>" multiple size="<?php echo $multi_size;?>" rel="<?php echo $field_id;?>" >
                <?php
                if($label_pos == 'inside'){
                    ?>
                    <option value=""><?php echo $label;?></option>
                    <?php
                }
                foreach($options as $option){

                    if(isset($option['value'])){
                        $value = $option['value'];
                    }else{
                        $value = $option['label'];
                    }

                    $value = htmlspecialchars( $value, ENT_QUOTES );

                    if(isset($option['label'])){
                        $label = $option['label'];
                    }else{
                        $label = '';
                    }

                    if(isset($option['display_style'])){
                        $display_style = $option['display_style'];
                    }else{
                        $display_style = '';
                    }

                    $label = htmlspecialchars( $label, ENT_QUOTES );

                    $label = stripslashes($label);

                    if($list_show_value == 0){
                        $value = $label;
                    }

                    if(is_array($selected_value) AND in_array($value, $selected_value)){
                        $selected = 'selected';
                    }else if( $selected_value == '' AND isset( $option['selected'] ) AND $option['selected'] == 1 ){
                        $selected = 'selected';
                    }else{
                        $selected = '';
                    }

                    if( $display_style == '' ){
                        ?>
                        <option value="<?php echo $value;?>" <?php echo $selected;?>><?php echo $label;?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <select id="ninja_forms_field_<?php echo $field_id;?>_clone" style="display:none;" rel="<?php echo $field_id;?>" >
                <?php
                $x = 0;
                foreach($options as $option){

                    if(isset($option['value'])){
                        $value = $option['value'];
                    }else{
                        $value = $option['label'];
                    }

                    $value = htmlspecialchars( $value, ENT_QUOTES );

                    if(isset($option['label'])){
                        $label = $option['label'];
                    }else{
                        $label = '';
                    }

                    if(isset($option['display_style'])){
                        $display_style = $option['display_style'];
                    }else{
                        $display_style = '';
                    }

                    $label = htmlspecialchars( $label, ENT_QUOTES );

                    $label = stripslashes( $label );

                    if($list_show_value == 0){
                        $value = $label;
                    }

                    if(is_array($selected_value) AND in_array($value, $selected_value)){
                        $selected = 'selected';
                    }else{
                        $selected = '';
                    }

                    if( $display_style != '' ){
                        ?>
                        <option value="<?php echo $value;?>" title="<?php echo $x;?>" <?php echo $selected;?>><?php echo $label;?></option>
                        <?php
                    }
                    $x++;
                }
                ?>
            </select>
            <?php
            break;
    }
    echo '</div>';
}
function nf_field_list_hp_sub_table_value( $field_id, $user_value ) {
	if ( is_array ( $user_value ) ) {
		echo '<ul>';
		$max_items = apply_filters( 'nf_sub_table_user_value_max_items', 3, $field_id );
		$x = 0;

		while ( $x < $max_items && $x <= count( $user_value ) - 1 ) {
			echo '<li>' . $user_value[$x] . '</li>';
			$x++;
		}
		echo '</ul>';
	} else {
		$max_len = apply_filters( 'nf_sub_table_user_value_max_len', 140, $field_id );
		if ( strlen( $user_value ) > 140 )
			$user_value = substr( $user_value, 0, 140 );

		echo nl2br( $user_value );
	}
}

