<?php
/**
 * Template Name: gridtext
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hp
 */

get_header(); ?>
<section style="background-image: url(img/bg-text.jpg);" class="s-gridtext-a">
    <div class="container">
        <div class="b-article">
            <div class="sec-top">
                <div class="titles">
                    <?php  echo main_small_large_title(); ?>
                </div>
            </div>
            <?php
            if( have_rows('gridtext_modules') ) {

                // loop through the rows of data
                while (have_rows('gridtext_modules')) {
                    the_row();
                    if (get_row_layout() == 'contact_module') {
                        $contact_module_repeater = get_sub_field('contact_module_repeater');
                        $contact_module_title = get_sub_field('contact_module_title');
                        if( $contact_module_repeater){
                            echo ' <div class="sec-top">';
                            echo '<div class="b-cols">';
                            if($contact_module_title){
                                echo '<div class="top"><span class="title">'.$contact_module_title.'</span></div>';
                            }
                            echo '<div class="bottom">';
                            foreach ( $contact_module_repeater as $contact) {
                                echo '<div class="b-column">';
                                if($contact['contact_image']){
                                    echo '<div class="right"><img src="'.$contact['contact_image']['url'].'" class="photo"></div>';
                                    echo '<div class="left">';
                                    echo '<a href="mailto:'.$contact['contact_email'].'" class="message">';
                                    echo '<svg version="1.1" viewbox="0 0 18 14" class="svg">';
                                    echo '<path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>';
                                    echo '</svg>';
                                    echo $contact['contact_title'].'</a>';
                                    echo '<span class="name">'.$contact['contact_subtitle'].'</span>';
                                    echo '<span class="phone">'.$contact['contact_phone_1'];
                                    if($contact['contact_phone_2']){
                                        echo '<br>'.$contact['contact_phone_2'];
                                    }
                                    echo '</span>';
                                    if($contact['contact_content']){
                                        echo '<p class="description">'.$contact['contact_content'].'</p>';
                                    }

                                    echo '</div>';
                                }else{
                                    echo '<div class="wrap"><a href="mailto:'.$contact['contact_email'].'" class="message">';
                                    echo '<svg version="1.1" viewbox="0 0 18 14" class="svg">';
                                    echo '<path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>';
                                    echo '</svg>';
                                    echo $contact['contact_title'].'</a>';
                                    echo '<span class="name">'.$contact['contact_subtitle'].'</span>';
                                    echo '<span class="phone">'.$contact['contact_phone_1'];
                                    if($contact['contact_phone_2']){
                                        echo '<br>'.$contact['contact_phone_2'];
                                    }
                                    echo '</span>';
                                    echo '<p class="description">'.$contact['contact_content'].'</p>';
                                    echo '</div>';

                                }
                                echo '</div>';

                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }

                    }
                    elseif(get_row_layout() == 'free_text_module'){
                        $free_text = get_sub_field('free_text');
                        echo '<div class="sec-bottom">';
                        echo '<div class="b-text">';
                        echo $free_text;
                        echo '</div>';
                        echo '</div>';
                    }
                    elseif(get_row_layout() == 'highlighting_text_module'){
                        $highlighting_text = get_sub_field('highlighting_text');
                        echo '<div class="sec-bottom">';
                        echo '<div class="b-emphasize">';
                        echo '<p class="text">';
                        echo $highlighting_text;
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                    elseif(get_row_layout() == 'collapse_module'){
                        $collapses = get_sub_field('collapse');
                        if($collapses){
                            echo '<div class="sec-bottom">';
                            echo '<div class="b-collapse">';
                            foreach ($collapses as $collapse) {
                                $collapse_title = $collapse['collapse_title'];
                                $collapse_content = $collapse['collapse_content'];

                                echo '<a href="#" class="toggle js-toggle-content">';
                                echo '<svg version="1.1" viewbox="0 0 102 102" class="svg">';
                                echo '<path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>';
                                echo '</svg>';
                                echo $collapse_title.'</a>';
                                echo '<div class="b-content-collapse">';
                                echo $collapse_content;
                                echo '</div>';
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    elseif(get_row_layout() == 'did_you_know_module'){
                        $did_you_know_title = get_sub_field('did_you_know_title');
                        $did_you_know_content = get_sub_field('did_you_know_content');
                        echo '<div class="sec-bottom">';
                        echo '<div class="b-question">';
                        echo '<div class="top">';
                        echo '<span class="title">';
                        echo '<svg version="1.1" viewbox="0 0 24 24" class="svg">';
                        echo '<path d="M12,0C5.4,0,0,5.4,0,12c0,6.6,5.4,12,12,12c6.6,0,12-5.4,12-12C24,5.4,18.6,0,12,0z M12,21.5  c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6C13.6,20.8,12.9,21.5,12,21.5z M15.1,13.1  c-1.2,0.9-2.1,1.6-2.1,2.9c0,0.5-0.4,0.9-0.9,0.9c-0.5,0-0.9-0.4-0.9-0.9c0-2.2,1.6-3.4,2.9-4.3c1.3-1,2.4-1.8,2.4-3.4  c0-2.3-1.8-3.8-4.4-3.8c-2.6,0-4.4,1.8-4.4,4.4c0,0.5-0.4,0.9-0.9,0.9c-0.5,0-0.9-0.4-0.9-0.9c0-3.6,2.6-6.2,6.2-6.2  c3.6,0,6.2,2.4,6.2,5.7C18.2,10.8,16.4,12,15.1,13.1z"></path>';
                        echo '</svg>'.$did_you_know_title.'</span></div>';
                        echo '<div class="bottom">';
                        echo $did_you_know_content;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    elseif(get_row_layout() == 'more_info_model'){
                        $more_info_items = get_sub_field('more_info_items');
                        if($more_info_items){
                            echo '<div class="sec-bottom">';
                            echo '<div class="b-additional">';
                            echo '<span class="title">מידע נוסף</span>';
                            echo '<div class="col-wrap">';
                            foreach ($more_info_items as $item) {
                                $more_info_item_title = $item['more_info_item_title'];
                                $more_info_item_icon = $item['more_info_item_icon'];
                                $more_info_item_link_url = $item['more_info_item_link_url'];
                                $more_info_item_file = $item['more_info_item_file'];
                                echo '<div class="col">';
                                if($more_info_item_link_url){
                                    echo '<a href="'.$more_info_item_link_url.'" class="info" target="_blank">';
                                }else{
                                    echo '<a  href="'.$more_info_item_file['url'].'" download class="info">';
                                }
                                echo '<span class="circle hi-icon">';
                                echo '<img src="'.$more_info_item_icon['url'].'">';
                                echo '</span>'.$more_info_item_title.'</a></div>';
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    elseif(get_row_layout() == 'table_module'){
                        echo '<div class="sec-bottom">';
                        $table = get_sub_field('table');
                        $number_the_column_color = get_sub_field('number_the_column_color');
                        $column_color = get_sub_field('column_color');
                        ?>
                        <style>
                            th.column-<?php echo $number_the_column_color ?>,
                            .column-<?php echo $number_the_column_color ?>{
                                background-color:<?php echo $column_color ?> !important;
                            }
                        </style>
                        <?php
                        echo $table;
                        echo '</div>';
                    }
                }
            }

            ?>

            <div class="sec-bottom">

                <table class="b-table">
                    <thead>
                    <tr>
                        <th>שם</th>
                        <th>תפקיד</th>
                        <th>מחלקה</th>
                        <th class="gray">טלפון</th>
                        <th>הערה</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="mailto:" class="message">
                                <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                    <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                </svg>יגאל יפה</a></td>
                        <td>מנהל מחלקת בריאות</td>
                        <td>הנהלה</td>
                        <td class="gray">03-5390000 שלוחה 123</td>
                        <td>אפשרות להערה או איקון</td>
                    </tr>
                    <tr>
                        <td><a href="mailto:" class="message">
                                <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                    <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                </svg>יגאל יפה</a></td>
                        <td>מנהל מחלקת בריאות</td>
                        <td>הנהלה</td>
                        <td class="gray">03-5390000 שלוחה 123</td>
                        <td><a href="#">
                                <svg version="1.1" viewbox="0 0 20 20" class="svg stroke">
                                    <path stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M19.6,1.4L0.8,1.6l0.1,15.1l5.8,0L4.5,19c-0.1,0.1-0.1,0.3,0,0.4c0.1,0.1,0.1,0.1,0.2,0.1c0.1,0,0.2,0,0.2-0.1l2.5-2.5 c0.1-0.1,0.1-0.1,0.1-0.2l5.7,0c0,0.1,0,0.2,0.1,0.2l2.5,2.5c0.1,0.1,0.1,0.1,0.2,0.1c0.1,0,0.2,0,0.2-0.1c0.1-0.1,0.1-0.3,0-0.4 l-2.3-2.3l5.8,0L19.6,1.4z M19.1,15.9L1.5,16.1L1.4,2.2L19,2.1L19.1,15.9z"></path>
                                    <path stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M4,13.8c0.7,0,1.3-0.6,1.2-1.3c0-0.2-0.1-0.4-0.2-0.6l2.4-2.4c0.2,0.1,0.4,0.2,0.6,0.2c0.3,0,0.5-0.1,0.7-0.2l2,1.8 c-0.1,0.2-0.1,0.4-0.1,0.6c0,0.7,0.6,1.3,1.3,1.2c0.7,0,1.3-0.6,1.2-1.3c0-0.3-0.1-0.6-0.3-0.8l3.3-4.7c0.1,0.1,0.3,0.1,0.5,0.1 c0.7,0,1.3-0.6,1.2-1.3c0-0.7-0.6-1.3-1.3-1.2c-0.7,0-1.3,0.6-1.2,1.3c0,0.3,0.1,0.6,0.3,0.8l-3.3,4.7c-0.1-0.1-0.3-0.1-0.5-0.1 c-0.3,0-0.5,0.1-0.7,0.2L9.2,9c0.1-0.2,0.1-0.4,0.1-0.6c0-0.7-0.6-1.3-1.3-1.2c-0.7,0-1.3,0.6-1.2,1.3c0,0.2,0.1,0.4,0.2,0.6 l-2.4,2.4c-0.2-0.1-0.4-0.2-0.6-0.2c-0.7,0-1.3,0.6-1.2,1.3C2.8,13.3,3.3,13.8,4,13.8z"></path>
                                </svg></a></td>
                    </tr>
                    <tr>
                        <td><a href="mailto:" class="message">
                                <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                    <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                </svg>יגאל יפה</a></td>
                        <td>מנהל מחלקת בריאות</td>
                        <td>הנהלה</td>
                        <td class="gray">03-5390000 שלוחה 123</td>
                        <td><a href="#">
                                <svg version="1.1" viewbox="0 0 20 20" class="svg stroke">
                                    <path stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M5,19c-1,0-1.9-0.4-2.6-1.1l0,0c-1.4-1.4-1.4-3.8,0-5.2l2.3-2.3c1-1,2.5-1.3,3.9-0.8C8.7,9.7,8.7,9.8,8.7,10 c-0.1,0.2-0.3,0.3-0.4,0.2c-1.1-0.4-2.4-0.1-3.2,0.7l-2.3,2.3c-1.2,1.2-1.2,3.1,0,4.3l0,0C3.4,18,4.2,18.3,5,18.3 c0.8,0,1.6-0.3,2.1-0.9l2.3-2.3c0.8-0.8,1.1-2.1,0.7-3.2c-0.1-0.2,0-0.4,0.2-0.4c0.2-0.1,0.4,0,0.4,0.2c0.5,1.4,0.2,2.9-0.8,4 l-2.3,2.3C6.9,18.6,6,19,5,19z"></path>
                                    <path stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M13.3,10.6c-0.5,0-1-0.1-1.4-0.3c-0.2-0.1-0.2-0.3-0.2-0.4c0.1-0.2,0.3-0.2,0.4-0.2c1.1,0.5,2.5,0.2,3.3-0.6l2.3-2.3 c1.2-1.2,1.2-3.1,0-4.3l0,0c-1.2-1.2-3.1-1.2-4.3,0l-2.3,2.3c-0.8,0.8-1.1,2.1-0.7,3.2c0.1,0.2,0,0.4-0.2,0.4 c-0.2,0.1-0.4,0-0.4-0.2c-0.5-1.3-0.2-2.9,0.9-3.9l2.3-2.3c1.4-1.4,3.8-1.4,5.2,0l0,0c1.4,1.4,1.4,3.8,0,5.2l-2.3,2.3 C15.2,10.3,14.3,10.6,13.3,10.6z"></path>
                                    <path stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M7,13.5c-0.1,0-0.2,0-0.2-0.1c-0.1-0.1-0.1-0.3,0-0.5l6.7-6.7c0.1-0.1,0.3-0.1,0.5,0c0.1,0.1,0.1,0.3,0,0.5l-6.7,6.7 C7.1,13.4,7.1,13.5,7,13.5z"></path>
                                </svg></a></td>
                    </tr>
                    <tr>
                        <td><a href="mailto:" class="message">
                                <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                    <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                </svg>יגאל יפה</a></td>
                        <td>צירוף מבוטח</td>
                        <td>הנהלה</td>
                        <td class="gray">03-5390000</td>
                        <td>אפשרות להערה או איקון</td>
                    </tr>
                    <tr>
                        <td><a href="mailto:" class="message">
                                <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                    <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                </svg>יגאל יפהיגאל יפה</a></td>
                        <td>מנהל מחלקת בריאות</td>
                        <td>הנהלה</td>
                        <td class="gray">03-5390000 שלוחה 123</td>
                        <td>אפשרות להערה או איקון</td>
                    </tr>
                    <tr>
                        <td><a href="mailto:" class="message">
                                <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                    <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                </svg>יגאל יפה</a></td>
                        <td>מנהל מחלקת בריאות ים, בירורים לגבי מבוטחים, טיפול ברצף ביטוחי, גריעה מביטוח</td>
                        <td>הנהלה</td>
                        <td class="gray">03-5390000</td>
                        <td>אפשרות להערה או איקון</td>
                    </tr>
                    <tr>
                        <td><a href="mailto:" class="message">
                                <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                    <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                </svg>יגאל יפה</a></td>
                        <td>מנהל מחלקת בריאות</td>
                        <td>מזכירות</td>
                        <td class="gray">03-5390000</td>
                        <td>אפשרות להערה או איקון</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
       custom_form_display(408);
        ?>
        <form class="f-sport ac-custom ac-checkbox ac-checkmark">
            <div class="top">
                <div class="b-about-sport"><span class="title">טופס העברת בעלות טלפון סלולרי</span><span class="subtitle"><span class="small">מבעלות פרטית לחברת</span><span class="eng">HP / Mercury</span></span>
                    <ol>
                        <li>החברה מקבלת לבעלותה את הקו בלבד ללא המכשיר הפרטי, כאשר ההתחייבות היא לשלוש שנים מיום ההעברה.</li>
                        <li>במידה ויש חיובים על הקו הישן, המכשיר, קנסות או כל חיוב אחר, לרבות התנתקות מתוכנית קיימת-העובד יישא בהוצאות, ועל אחריותו לבדוק את כל הנתונים מול הספק שהוא עובד עימו.</li>
                        <li>החברה תספק לעובד מכשיר סלולארי. המכשיר שייך לחברה ולא ניתן להעבירו לבעלות העובד , לאחר סיום ההתקשרות של העובד עם חברת מרקורי.</li>
                    </ol>
                </div>
            </div>
            <div class="middle"><span class="error">אופס! יש למלא את השדות החסרים כדי להשלים את שליחת הטופס.</span>
                <fieldset class="b-success-msg"><span class="b-success-msg__title">תודה!<br>     הפרטים נקלטו בהצלחה.<br>ניהיה בקשר.</span>
                    <p class="b-success-msg__text">אם אינך אישור במייל תוך 48 שעות, אנא צור קשר עם מיכל 03-5396666</p>
                </fieldset>
                <fieldset class="b-fields">
                    <fieldset class="row">
                        <div class="col">
                            <label for="person">שמך [חובה]</label>
                            <input type="text" id="person" placeholder="שם ומשפחה" required class="js-isEmpty">
                        </div>
                    </fieldset>
                    <fieldset class="row">
                        <div class="col">
                            <label for="email">האימייל שלך [חובה]</label>
                            <input type="email" id="email" required class="js-isEmpty js-isEmail">
                        </div>
                    </fieldset>
                    <fieldset class="row justify">
                        <div class="col">
                            <label for="datepicker">תאריך [חובה]</label>
                            <input type="text" id="datepicker" required readonly class="js-isEmpty"><a href="#" class="arrow-down">
                                <svg version="1.1" viewbox="0 0 102 102" class="svg">
                                    <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
                                </svg></a>
                        </div>
                        <div class="col">
                            <label for="time">שעה [חובה]</label>
                            <input type="phone" id="time" required maxlength="4" placeholder="בחר שעה" class="js-isEmpty time js-time"><a href="#" class="arrow-down">
                                <svg version="1.1" viewbox="0 0 102 102" class="svg">
                                    <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
                                </svg></a>
                            <div class="b-time-drop">
                                <div class="wrap scroll-pane">
                                    <div class="link">01:00AM</div>
                                    <div class="link">01:30AM</div>
                                    <div class="link">02:00AM</div>
                                    <div class="link">02:30AM</div>
                                    <div class="link">03:00AM</div>
                                    <div class="link">03:30AM</div>
                                    <div class="link">04:00AM</div>
                                    <div class="link">04:30AM</div>
                                    <div class="link">05:00AM</div>
                                    <div class="link">05:30AM</div>
                                    <div class="link">06:00AM</div>
                                    <div class="link">06:30AM</div>
                                    <div class="link">07:00AM</div>
                                    <div class="link">07:30AM</div>
                                    <div class="link">08:00AM</div>
                                    <div class="link">08:30AM</div>
                                    <div class="link">09:00AM</div>
                                    <div class="link">09:30AM</div>
                                    <div class="link">10:00AM</div>
                                    <div class="link">10:30AM</div>
                                    <div class="link">11:00AM</div>
                                    <div class="link">11:30AM</div>
                                    <div class="link">12:00PM</div>
                                    <div class="link">12:30PM</div>
                                    <div class="link">01:00PM</div>
                                    <div class="link">01:30PM</div>
                                    <div class="link">02:00PM</div>
                                    <div class="link">02:30PM</div>
                                    <div class="link">03:00PM</div>
                                    <div class="link">03:30PM</div>
                                    <div class="link">04:00PM</div>
                                    <div class="link">04:30PM</div>
                                    <div class="link">05:00PM</div>
                                    <div class="link">05:30PM</div>
                                    <div class="link">06:00PM</div>
                                    <div class="link">06:30PM</div>
                                    <div class="link">07:00PM</div>
                                    <div class="link">07:30PM</div>
                                    <div class="link">08:00PM</div>
                                    <div class="link">08:30PM</div>
                                    <div class="link">09:00PM</div>
                                    <div class="link">09:30PM</div>
                                    <div class="link">10:00PM</div>
                                    <div class="link">10:30PM</div>
                                    <div class="link">11:00PM</div>
                                    <div class="link">11:30PM</div>
                                    <div class="link">12:00AM</div>
                                    <div class="link">12:30AM</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="row">
                        <label for="message">טקסט חופשי [אופציונאלי]</label>
                        <textarea rows="3" id="message"></textarea>
                    </fieldset>
                </fieldset>
                <fieldset class="b-img-picker">
                    <div class="col-wrap">
                        <div class="col">
                            <input type="radio" id="rd1" name="image">
                            <label for="rd1" class="radio"></label>
                            <div class="img-wrap"><img src="http://placehold.it/320x200" alt=""></div>
                        </div>
                        <div class="col">
                            <input type="radio" id="rd2" name="image">
                            <label for="rd2" class="radio"></label>
                            <div class="img-wrap"><img src="http://placehold.it/320x200" alt=""></div>
                        </div>
                        <div class="col col-mb">
                            <input type="radio" id="rd3" name="image">
                            <label for="rd3" class="radio"></label>
                            <div class="img-wrap"><img src="http://placehold.it/320x200" alt=""></div>
                        </div>
                        <div class="col col-mb">
                            <input type="radio" id="rd4" name="image">
                            <label for="rd4" class="radio"></label>
                            <div class="img-wrap"><img src="http://placehold.it/320x200" alt=""></div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="b-checkbox-fields"><span class="title">טקסט הסבר או בקשה או פנייה לעובדים. אפשרות ולא חובה להכניס את הטקסט הזה לטופס.<b>אפשרות לבחירה מרובה של שדות:</b></span>
                    <div class="row">
                        <input type="checkbox" id="ck1">
                        <label for="ck1" class="checkbox">טקסט ליום הולדת</label>
                    </div>
                    <div class="row">
                        <input type="checkbox" id="ck2">
                        <label for="ck2" class="checkbox">טקסט ליום הולדת</label>
                    </div>
                    <div class="row">
                        <input type="checkbox" id="ck3">
                        <label for="ck3" class="checkbox">טקסט ליום הולדת</label>
                    </div>
                </fieldset>
                <fieldset class="b-drop-wrap"><span class="title">כמה כרטיסים?</span>
                    <input type="hidden" required class="js-ticket">
                    <div class="b-drop-list"><a href="#" class="main-link js-dropdown"><span class="value">כמות [חובה]</span>
                            <svg version="1.1" viewbox="0 0 102 102" class="svg">
                                <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
                            </svg></a>
                        <div class="b-drop"><a href="#" class="link js-count">2 כרטיסים מינימום</a><a href="#" class="link js-count">3 כרטיסים</a><a href="#" class="link js-count">4 כרטיסים</a><a href="#" class="link js-count">5 כרטיסים מקסימום</a></div>
                    </div>
                </fieldset>
            </div>
            <div class="bottom">
                <fieldset class="b-description"><span class="title">טקסט הסבר או בקשה או פנייה לעובדים. אפשרות ולא חובה להכניס את הטקסט הזה לטופס.<b>אפשרות לבחירה מרובה של שדות:</b></span>
                    <input id="rd5" type="radio" name="description">
                    <label for="rd5" class="radio">טקסט שאני רוצה לבחור</label>
                    <input id="rd6" type="radio" name="description">
                    <label for="rd6" class="radio">טקסט רדיו לבחירה בודדת</label>
                    <input id="rd7" type="radio" name="description">
                    <label for="rd7" class="radio">טקסט לרדיו בלה בלה</label>
                </fieldset>
                <fieldset class="b-rating"><span class="title">דרג את ההשתתפות שלך באירוע. 1<b>מרוצה מאוד</b>, 5<b>כלל לא מרוצה.</b></span><span class="max">מרוצה מאוד</span>
                    <div class="b-stars"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div><span class="min">כלל לא מרוצה</span>
                </fieldset>
                <fieldset class="b-upload"><span class="title">טען את הקובץ שסרקת</span>
                    <label class="file"><span>בחר קובץ</span>
                        <input type="file" class="js-input-file"><a href="#" class="clear js-clear-file">
                            <svg version="1.1" viewbox="0 0 11 11" class="svg">
                                <polygon stroke-miterlimit="10" points="1.6,0.9 1,1.5 4.9,5.5 1,9.5 1.6,10.1 5.6,6.2 9.5,10.1  10.2,9.5 6.3,5.5 10.2,1.5 9.5,0.9 5.6,4.8 "></polygon>
                            </svg></a>
                    </label>
                </fieldset>
                <fieldset class="b-submit">
                    <div class="b-anim">
                        <button class="t-c t-d js-submit-f-sport">לשלוח
                            <div class="progress"></div>
                        </button>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</section>
<?php get_footer(); ?>
