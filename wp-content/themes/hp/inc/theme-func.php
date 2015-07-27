<?php
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
}
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}
add_image_size( 'home_gallery', 388, 534,true );
add_filter( 'body_class', 'my_class_names' );
function my_class_names( $classes ) {
    if(is_page_template( 'page-home.php' )){
        $classes[] = 'p-index';
    }
    if(is_page_template( 'page-gridtext.php' )){
        $classes[] = 'p-gridtext';
        $classes[] = '_crumbs';
    }
    if(is_page_template( 'page-management.php' )){
        $classes[] = 'p-management';
        $classes[] = '_crumbs';
    }
    if(is_page_template( 'page-product.php' )){
        $classes[] = 'p-product';
        $classes[] = '_crumbs';
    }
    if(is_page_template( 'page-sport.php' )){
        $classes[] = 'p-sport';
        $classes[] = '_crumbs';
    }
    if(is_page_template( 'page-volunteer.php' )){
        $classes[] = 'p-volunteer';
        $classes[] = '_crumbs';
    }
    return $classes;
}

function gat_day_name_heb($string){
    $day_name = '';
    switch($string){
        case 'א':
            $day_name = 'ראשון';
            break;
        case 'ב':
            $day_name = 'שני';
            break;
        case 'ג':
            $day_name = 'שלישי';
            break;
        case 'ד':
            $day_name = 'רביעי';
            break;
        case 'ה':
            $day_name = 'חמישי';
            break;
        case 'ו':
            $day_name = 'שישי';
            break;
        case 'ש':
            $day_name = 'שבת';
            break;
    }
    $day_name = 'יום '.$day_name;
    return $day_name;
}
$message = register_cuztom_post_type( 'Message' );
$event = register_cuztom_post_type( 'Event' );
$gym_class = register_cuztom_post_type( 'Gym Class' );
$employee = register_cuztom_post_type( 'Employee' );
$form = register_cuztom_post_type( 'Form' );
$gym_class->add_taxonomy( 'Class Day' );
$page_group = register_cuztom_taxonomy( 'Page Group', 'page' );
function live_stock_value(){
    $quote  = file_get_contents('http://www.google.com/finance/info?q=NYSE:HPQ');
//Remove CR's from ouput - make it one line
    $json = str_replace("\n", "", $quote);

//Remove //, [ and ] to build qualified string
    $data = substr($json, 4, strlen($json) -5);

//decode JSON data
    $json_output = json_decode($data, true);
    ?>
    <div class="b-wrap js-scale-block">
        <div class="b-exchange">
            <span class="company">Hewlett-Packard</span>
            <span class="price">$<?php echo $json_output['l'] ?></span>
            <span class="changes"><?php echo $json_output['cp'] ?>% / <?php echo $json_output['c'] ?></span>
            <span class="time"><?php echo  $json_output['lt']?></span>
        </div>
    </div>
    <?php
}
function employee_birthday_arr(){
    $args = array(
        'post_type' => 'employee'
    );
    $query = new WP_Query($args);
    $employee_birthday_arr= array();
    if($query->have_posts()){
        while($query->have_posts()){
            $query->the_post();
            $employee_birthday = get_field('employee_birthday');
            $employee_birthday_arr[] =$employee_birthday;
        }
    }
    wp_reset_postdata();
    $result = array_unique($employee_birthday_arr);
    return $result;
}
function header_menu(){
    global $post;
    $page_group = wp_get_post_terms($post->ID , 'page_group');
    if($page_group){
        $top_group = $page_group[0]->parent;
        $sub_group = $page_group[0]->term_id;
    }else{
        $top_group =-10;
    }
    $top_class='';
    $args = array(
        'parent'            => '0',
        'hide_empty'        => false,
    );
    $header_menu_items = get_terms( 'page_group', $args );

    echo '<nav class="m-site-menu">';
    echo '<ul>';
    foreach ($header_menu_items as $item) {
        $top_class = '';
        if($top_group == $item->term_id){
            $top_class = 'li-crumbs';
        }
        $args2 = array(
            'parent'            => $item->term_id,
            'hide_empty'        => false,
        );
        $menu_sub_groups = get_terms( 'page_group', $args2 );
        if($menu_sub_groups){
            echo '<li class="li-menul2 js-menul2-a '.$top_class.'" ><a class="link animsition-link" href="#">'.$item->name.'</a>';
            echo '<div class="b-menu-l2">';
            echo '<div class="container">';
            echo '<div class="col-wrap">';
            foreach ($menu_sub_groups as $sub_group) {
                $page_group_links = get_field('page_group_links' , $sub_group);
                $product_group = get_field('product_group' , $sub_group);
                if($product_group){
                    echo '<div class="col col_wide">';
                    echo '<nav class="m-menu-l2">';
                    echo '<span class="main-link">'.$sub_group->name.'</span>';
                    $args3 = array(
                        'post_type' => 'page',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $sub_group->taxonomy,
                                'terms' => $sub_group->term_id
                            )
                        )
                    );
                    $postslists = get_posts( $args3 );
                    if($postslists){
                        $item_class = '';

                        echo '<div class="l-unit">';
                        foreach ($postslists as $sub_item) {
                            $normal_menu_image = get_field('normal_menu_image' , $sub_item->ID);
                            $hover_menu_image = get_field('hover_menu_image' ,$sub_item->ID);
                            if($sub_item->ID == $post->ID){
                                $item_class = 'unit_active';
                            }
                            $company_name = get_field('company_name' ,$sub_item->ID );
                            echo '<a href="'.get_the_permalink($sub_item->ID).'" class="animsition-link unit '.$item_class.'">';
                            echo '<img src="'.$normal_menu_image['url'].'" class="default">';
                            echo '<img src="'.$hover_menu_image['url'].'" class="hover">';
                            echo '</a>';
                        }
                        echo '</div>';
                    }
                    echo ' </nav>';
                    echo '</div>';
                }else{
                    echo '<div class="col">';
                    echo '<nav class="m-menu-l2">';
                    echo '<span class="main-link">'.$sub_group->name.'</span>';
                    $args3 = array(
                        'post_type' => 'page',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $sub_group->taxonomy,
                                'terms' => $sub_group->term_id
                            )
                        )
                    );
                    $postslists = get_posts( $args3 );
                    if($postslists){
                        echo '<ul class="js-set-height">';
                        foreach ($postslists as $sub_item) {
                            echo '<li><a href="'.get_the_permalink($sub_item->ID).'" class="animsition-link link">'.get_the_title($sub_item->ID).'</a></li>';
                        }
                        echo '</ul>';
                    }
                    if($page_group_links){
                        echo '<ul class="sub-list">';
                        foreach ($page_group_links as $group_link) {
                            $link_url = '';
                            $download ='';
                            if($group_link['page_group_link_url']){
                                $link_url = $group_link['page_group_link_url'];
                            }else{
                                $link_url = $group_link['page_group_link_file']['url'];
                                $download = 'download';
                            }
                            echo '<li><a href="'.$link_url.'" '.$download.' class="animsition-link link link_img">';
                            echo '<img src="'.$group_link['page_group_link_icon']['url'].'" />';
                            echo '<span>'.$group_link['page_group_link_title'].'</span></a></li>';
                        }
                        echo '</ul>';
                    }
                    echo ' </nav>';
                    echo '</div>';
                }

            }
            echo ' </div>';
            echo ' </div>';
            echo ' </div>';
            echo '</li>';
        }else{
            $group_url = get_field('group_url' , $item);
            echo '<li><a class="animsition-link link" href="'.$group_url.'">'.$item->name.'</a></li>';
        }
    }
    echo '</ul>';
    echo '</nav>';

}
function page_menu(){
    global $post;
    $page_group = wp_get_post_terms($post->ID , 'page_group');
    if($page_group){
        $product_group = get_field('product_group' , $page_group[0]);

        $args3 = array(
            'post_type' => 'page',
            'tax_query' => array(
                array(
                    'taxonomy' => $page_group[0]->taxonomy,
                    'terms' => $page_group[0]->term_id
                )
            )
        );
        $postslists = get_posts( $args3 );
        if($postslists){
            if($product_group){
                echo '<div class="b-menu-l3">';
                echo ' <div class="container"><span class="link_l2">'.$page_group[0]->name.'
              <svg version="1.1" viewbox="0 0 102 102" class="svg">
                  <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
              </svg>';
                echo '</span>';
                echo '<a href="'.get_the_permalink($post->ID).'" class="link_l3 active eng">'.get_the_title($post->ID).'</a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="b-products-list">';
                foreach ($postslists as $item) {
                    $company_name = get_field('company_name' ,$item->ID );
                    $normal_menu_image = get_field('normal_menu_image' , $item->ID);
                    $hover_menu_image = get_field('hover_menu_image' ,$item->ID);
                    $item_class = '';
                    if($item->ID == $post->ID){
                        $item_class = 'product_active';
                    }
                    echo '<a href="#" class="animsition-link product '.$item_class.'">';
                    echo '<img src="'.$normal_menu_image['url'].'" class="default">';
                    echo '<img src="'.$hover_menu_image['url'].'" class="hover">';
                    echo '</a>';
                }
                echo '</div>';
            }else{
                echo '<div class="b-menu-l3">';
                echo ' <div class="container"><span class="link_l2">'.$page_group[0]->name.'
              <svg version="1.1" viewbox="0 0 102 102" class="svg">
                  <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
              </svg>';
                echo '</span>';
                foreach ($postslists as $item) {
                    $item_class = '';
                    if($item->ID == $post->ID){
                        $item_class = 'active';
                    }
                    echo '<a href="'.get_the_permalink($item->ID).'" class="link_l3 '.$item_class.'">'.get_the_title($item->ID).'</a>';
                }
                echo '</div>';
                echo '</div>';
            }

        }
    }


}
function footer_menu(){
    $footer_menu_section = get_field_object('footer_menu_section' ,'option' );

    $footer_menu_section = $footer_menu_section['value'];
   echo '<div class="sec-top">';
    echo '<div class="container">';
    echo '<div class="col-wrap">';
    foreach ($footer_menu_section as $section) {
        $section_title = $section['section_title'];
        echo '<div class="col"><a href="#" class="b-link animsition-link">'.$section_title.' /</a></div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="sec-middle">';
    echo '<div class="container">';
    echo '<div class="col-wrap">';
    foreach ($footer_menu_section as $section) {
        echo '<div class="col">';
        echo '<nav class="m-footer-menu">';
        echo '<ul>';
        $section_items = $section['section_items'];
        foreach ($section_items as $item) {
           $item_type = $item['item_type'];
            echo '<pre>';
            print_r($item);
            echo '</pre>';
            if($item_type === 'page'){
                $section_item_link = $item['section_item_link'];
                $postid = url_to_postid( $section_item_link );
                echo '<li><a href="'.$section_item_link.'" class="link animsition-link">'.get_the_title($postid).'</a></li>';
            }elseif($item_type === 'file'){
                $section_item_title = $item['section_item_title'];
                $section_item_icon = $item['section_item_icon'];
                $section_item_file = $item['section_item_file'];
                echo '<li><a href="'.$section_item_file['url'].'" class="link animsition-link" download><img src="'.$section_item_icon['url'].'" />'.$section_item_title.'</a></li>';

            }else{
                $section_item_title = $item['section_item_title'];
                $section_item_icon = $item['section_item_icon'];
                $section_item_link = $item['section_item_link'];
                $postid = url_to_postid( $section_item_link );
                echo '<li><a href="'.$section_item_link.'#opengallery" class="link animsition-link"><img src="'.$section_item_icon['url'].'" />'.$section_item_title.'</a></li>';

            }
        }

        echo '<pre>';
        print_r($section_items);
        echo '</pre>';
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

function custom_form_display($post_id){
    if( have_rows('forms_type' ,$post_id ) ) {
echo ' <form class="f-sport ac-custom ac-checkbox ac-checkmark">';
        echo '<div class="middle">';
        // loop through the rows of data
        while (have_rows('forms_type' , $post_id)) {
            the_row();
            $required_text ='';
            $required_input = '';
            if (get_row_layout() == 'text_field') {
                $filed_title = get_sub_field('filed_title');
                $filed_placeholder = get_sub_field('filed_placeholder');
                $required = get_sub_field('required');
                if($required){
                    $required_text = '[חובה]';
                    $required_input = 'required';
                }
                ?>

                <fieldset class="row">
                    <div class="col">
                        <label for="person"><?php echo $filed_title.' '.$required_text ?></label>
                        <input type="text" id="person" placeholder="<?php echo $filed_placeholder ?>" <?php echo $required_input ?> class="js-isEmpty">
                    </div>
                </fieldset>
<?php
            }
            elseif(get_row_layout() == 'email_field'){
                $filed_title = get_sub_field('filed_title');
                $filed_placeholder = get_sub_field('filed_placeholder');
                $required = get_sub_field('required');
                if($required){
                    $required_text = '[חובה]';
                    $required_input = 'required';
                }
                ?>
                <fieldset class="row">
                    <div class="col">
                        <label for="email"><?php echo $filed_title.' '.$required_text ?></label>
                        <input type="email" id="email" <?php echo $required_input ?> class="js-isEmpty js-isEmail">
                    </div>
                </fieldset>
<?php
            }
            elseif(get_row_layout() == 'date_field'){

            }
            elseif(get_row_layout() == 'text_area_field'){
                $filed_title = get_sub_field('filed_title');
                $filed_placeholder = get_sub_field('filed_placeholder');
                $required = get_sub_field('required');
                if($required){
                    $required_text = '[חובה]';
                    $required_input = 'required';
                }
                ?>
                <fieldset class="row">
                    <label for="message"><?php echo $filed_title.' '.$required_text ?></label>
                    <textarea rows="3" id="message"></textarea>
                </fieldset>
<?php
            }
            elseif(get_row_layout() == 'image_selector_field'){
                $images = get_sub_field_object('images');
                $images = $images['value'];
                ?>
                <fieldset class="b-img-picker">
                    <div class="col-wrap">
                <?php
                $count = 1;
                foreach ($images as $image) {
                    ?>
                    <div class="col">
                        <input type="radio" id="rd<?php echo $count ?>" name="image">
                        <label for="rd<?php echo $count ?>" class="radio"></label>
                        <div class="img-wrap"><img src="<?php echo $image['image_option']['url'] ?>" alt=""></div>
                    </div>
                    <?php
                    $count++;
                }

                ?>
                    </div>
                </fieldset>
<?php
            }
            elseif(get_row_layout() == 'chackbox_field'){
                $filed_title = get_sub_field('filed_title');
                $fields_option = get_sub_field_object('fields_option');
                $fields_option = $fields_option['value'];
                $count = 1;

                ?>
                <fieldset class="b-checkbox-fields"><span class="title"><?php echo  $filed_title?></span>
                    <?php
                foreach ($fields_option as $opt) {
                    ?>
                    <div class="row">
                        <input type="checkbox" id="ck<?php echo $count ?>">
                        <label for="ck<?php echo $count ?>" class="checkbox"><?php echo $opt['option'] ?></label>
                    </div>
                    <?php
                    $count++;
                }
                ?>
                </fieldset>
<?php
            }
            elseif(get_row_layout() == 'dropdown_field'){
                $filed_title = get_sub_field('filed_title');
                $fields_option = get_sub_field_object('fields_option');
                $fields_option = $fields_option['value'];
                $filed_placeholder = get_sub_field('filed_placeholder');
                $required = get_sub_field('required');
                if($required){
                    $required_text = '[חובה]';
                    $required_input = 'required';
                }
                ?>
                <fieldset class="b-drop-wrap"><span class="title"><?php echo $filed_title ?></span>
                <input type="hidden" required class="js-ticket">
                <div class="b-drop-list"><a href="#" class="main-link js-dropdown"><span class="value"><?php echo $filed_placeholder.' '. $required_text?></span>
                    <svg version="1.1" viewbox="0 0 102 102" class="svg">
                        <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
                    </svg></a>
                    <div class="b-drop">
                <?php
                foreach ($fields_option as $opt) {
                    echo '<a href="#" class="link js-count">'. $opt['option'].'</a>';
                }
                ?>
                </div>
                </div>
                </fieldset>
<?php
            }
            elseif(get_row_layout() == 'radio_button_field'){
                $filed_title = get_sub_field('filed_title');
                $fields_option = get_sub_field_object('fields_option');
                $fields_option = $fields_option['value'];
                $count = 1;

                ?>
                <fieldset class="b-description"><span class="title"><?php echo $filed_title ?></span>
                    <?php
                    foreach ($fields_option as $opt) {
                        ?>
                        <input id="rd<?php echo $count ?>" type="radio" name="description">
                        <label for="rd<?php echo $count ?>" class="radio"><?php echo $opt['option'] ?></label>
                        <?php
                        $count++;
                    }
                    ?>
                </fieldset>
                <?php
            }
            elseif(get_row_layout() == 'upload_file_field'){

            }
            elseif(get_row_layout() == 'rating_field'){

            }
        }
    }
    echo '</div>';
    echo '</form>';
}