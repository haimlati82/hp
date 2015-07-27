<?php
/**
 * Template Name: sport
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hp
 */

get_header();
$preview_image = get_field('preview_image');
$gallery_title = get_field('gallery_title');
$gallery_icon = get_field('gallery_icon');
$image_gallery = get_field('image_gallery');
?>
<section style="background-image: url(img/bg-text.jpg);" class="s-sport-a">
    <div class="container">
        <div class="b-sport">
            <div class="main-wrap">
                <div class="right">
                    <?php
                    echo '<div class="b-sport-gallery js-sport-gallery">';
                    echo '<img src="'.$preview_image['url'].'" class="js-img-open-gallery">';
                    echo '<a href="#" data-gallery-index="0" class="title js-open-gallery">';
                    if($gallery_icon){
                        echo '<span class="icon hi-icon"><img src="'.$gallery_icon['url'].'">';
                        echo '</span>'.$gallery_title;
                    }
                    echo '</a></div>';
                    ?>
                </div>
                <div class="left">
                    <div class="b-titles">
                        <?php  echo main_small_large_title(); ?>
                    </div>
                    <?php
                    if( have_rows('sport_modules') ) {

                        // loop through the rows of data
                        while (have_rows('sport_modules')) {
                            the_row();
                        if(get_row_layout() == 'free_text_module'){
                                $free_text = get_sub_field('free_text');

                                echo '<div class="b-text">';
                                echo $free_text;
                                echo '</div>';

                            }
                        elseif(get_row_layout() == 'highlighting_text_module'){
                            $highlighting_text = get_sub_field('highlighting_text');
                            echo '<div class="b-emphasize">';
                            echo '<p class="text">';
                            echo $highlighting_text;
                            echo '</p>';
                            echo '</div>';
                        }
                        elseif(get_row_layout() == 'collapse_module'){
                            $collapses = get_sub_field('collapse');
                            if($collapses){
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
                            }
                        }
                        elseif(get_row_layout() == 'did_you_know_module'){
                            $did_you_know_title = get_sub_field('did_you_know_title');
                            $did_you_know_content = get_sub_field('did_you_know_content');
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
                        }
                        elseif(get_row_layout() == 'more_info_model'){
                            $more_info_items = get_sub_field('more_info_items');
                            if($more_info_items){
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
                                        echo '<a href="'.$more_info_item_link_url.'" class="info animsition-link" target="_blank">';
                                    }else{
                                        echo '<a  href="'.$more_info_item_file['url'].'" download class="info">';
                                    }
                                    echo '<span class="circle hi-icon">';
                                    echo '<img src="'.$more_info_item_icon['url'].'">';
                                    echo '</span>'.$more_info_item_title.'</a></div>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }elseif(get_row_layout() == 'contact_module'){
                            $contact_info = get_sub_field('contact_info');
                            $date = get_sub_field('date');
                            $location = get_sub_field('location');
                            $start_time = get_sub_field('start_time');
                            $end_time = get_sub_field('end_time');
                            $day_name = gat_day_name_heb($date);

                          echo '<div class="b-contact-info">';
                            echo '<a href="#" class="link date">';
                            echo '<svg version="1.1" viewbox="0 0 100 100" class="svg">';
                            echo '<path stroke-miterlimit="10" d="M87.3,13.2H75.5V9.5c0-2.7-2.3-5-5-5h-1.8c-2.7,0-5,2.3-5,5v3.2H36.8V9.5c0-2.7-2.3-5-5-5h-1.4 c-3.2,0-5.5,2.3-5.5,5v3.2H13.2c-4.5,0-8.6,3.6-8.6,8.6v65.5c0,4.5,3.6,8.6,8.6,8.6h74.1c4.5,0,8.6-3.6,8.6-8.6V21.4 C95.9,16.8,92.3,13.2,87.3,13.2z M13.2,16.4H25v3.2c0,2.7,2.3,5,5,5h5c0.9,0,1.8-0.9,1.8-1.8c0-0.9-0.9-1.8-1.8-1.8h-4.5 c-0.9,0-1.8-0.9-1.8-1.8V9.5c0-0.9,0.9-1.8,1.8-1.8h1.4c0.9,0,1.8,0.9,1.8,1.8v3.2c-0.9,0.5-1.8,0.9-1.8,1.8s0.9,1.8,1.8,1.8h30.5 v3.2c0,2.7,2.3,5,5,5h5c0.9,0,1.8-0.9,1.8-1.8c0-0.9-0.9-1.8-1.8-1.8h-5c-0.9,0-1.8-0.9-1.8-1.8V9.5c0-0.9,0.9-1.8,1.8-1.8h1.8 c0.9,0,1.8,0.9,1.8,1.8v3.2c-0.9,0-1.8,0.9-1.8,1.8s0.9,1.8,1.8,1.8h15c2.7,0,5,2.3,5,5V35H8.2V21.4C8.2,18.6,10.5,16.4,13.2,16.4z M87.3,92.3H13.2c-2.7,0-5-2.3-5-5V38.2h84.1v48.6C92.7,90,90.5,92.3,87.3,92.3z"></path>';
                            echo '<path stroke-miterlimit="10" d="M30.9,55.5c-0.9,0.5-0.9,1.8-0.5,2.3c0.5,0.9,1.8,0.9,2.3,0.5l4.1-3.2v23.6c0,0.9,0.9,1.8,1.8,1.8 c0.9,0,1.8-0.9,1.8-1.8V51.8l-2.7-1.4L30.9,55.5z"></path>';
                            echo '<path stroke-miterlimit="10" d="M60.5,61.8h-3.2V55h10c0.9,0,1.8-0.9,1.8-1.8c0-0.9-0.9-1.8-1.8-1.8H53.6V65H60c3.2,0,5.9,2.7,5.9,5.9 s-2.7,5.9-5.9,5.9c-2.3,0-4.1-1.4-5-3.2c-0.5-0.9-1.4-1.4-2.3-0.9c-0.9,0.5-1.4,1.4-0.9,2.3c1.4,3.2,4.5,5.5,8.2,5.5 c5,0,9.1-4.1,9.1-9.1C69.1,65.9,65,61.8,60.5,61.8z"></path>';
                            echo '</svg>';
                            echo $day_name.'</a>';
                            if($start_time) {
                                echo '<a href="#" class="link time">';
                                echo '<svg version="1.1" viewbox="0 0 22 22" class="svg">';
                                echo '<path stroke-miterlimit="10" d="M11.1,1.2c-5.5,0-10,4.5-10,10c0,5.5,4.5,10,10,10 c5.5,0,10-4.5,10-10C21.1,5.7,16.7,1.2,11.1,1.2z M11.1,20.6c-5.1,0-9.3-4.2-9.3-9.3S6,1.9,11.1,1.9c5.1,0,9.3,4.2,9.3,9.3 S16.3,20.6,11.1,20.6z"></path>';
                                echo '<path stroke-miterlimit="10" d="M11.5,9.9V3.6c0-0.2-0.1-0.3-0.3-0.3c-0.2,0-0.3,0.1-0.3,0.3v6.4 c-0.5,0.1-0.8,0.5-1,1h-4c-0.2,0-0.3,0.1-0.3,0.3c0,0.2,0.1,0.3,0.3,0.3h4c0.1,0.6,0.7,1,1.3,1c0.7,0,1.3-0.6,1.3-1.3 C12.5,10.6,12,10.1,11.5,9.9z"></path>';
                                echo '</svg>' . $start_time;
                                if ($end_time) {
                                    echo '-' . $end_time;
                                }
                                echo '</a>';
                            }
                            if($location) {
                                echo '<a href="#" class="link address">';
                                echo '<svg version="1.1" viewbox="0 0 16 22" class="svg">';
                                echo '<path d="M7.8,21l-0.3-0.3c0,0-4-4.8-6.1-9.7c-0.4-0.9-0.7-1.9-0.7-3c0-3.9,3.2-7,7.1-7c3.9,0,7.1,3.2,7.1,7 c0,1-0.2,2.1-0.7,3c-2.1,4.8-6.1,9.6-6.1,9.6L7.8,21z M7.8,1.7C4.3,1.7,1.4,4.5,1.4,8c0,1,0.2,1.9,0.6,2.7c1.8,4.1,4.9,8.1,5.8,9.2 c0.9-1.1,4-5.1,5.8-9.2C14,9.9,14.2,9,14.2,8C14.2,4.5,11.3,1.7,7.8,1.7z"></path>';
                                echo '<path d="M7.8,11.7c-2,0-3.7-1.7-3.7-3.7c0-2,1.7-3.7,3.7-3.7c2,0,3.7,1.7,3.7,3.7C11.5,10,9.8,11.7,7.8,11.7z M7.8,4.9c-1.7,0-3,1.4-3,3c0,1.7,1.4,3,3,3c1.7,0,3-1.4,3-3C10.8,6.3,9.5,4.9,7.8,4.9z"></path>';
                                echo '</svg>' . $location . '</a>';
                            }
                            if($contact_info) {
                                echo '<a href="#" class="link phone">';
                                echo '<svg version="1.1" viewbox="0 0 15 22" class="svg">';
                                echo '<path d="M12.4,1H2.8c-1,0-1.9,0.8-1.9,1.9v16.3c0,1,0.8,1.9,1.9,1.9h9.6c1,0,1.9-0.8,1.9-1.9V2.9 C14.3,1.8,13.4,1,12.4,1z M1.7,4.3h11.9v11.5H1.7V4.3z M2.8,1.7h9.6c0.6,0,1.1,0.5,1.1,1.1v0.7H1.7V2.9C1.7,2.2,2.2,1.7,2.8,1.7z M12.4,20.3H2.8c-0.6,0-1.1-0.5-1.1-1.1v-2.6h11.9v2.6C13.5,19.8,13,20.3,12.4,20.3z"></path>';
                                echo '<path d="M8.3,18H6.9c-0.2,0-0.4,0.2-0.4,0.4s0.2,0.4,0.4,0.4h1.5c0.2,0,0.4-0.2,0.4-0.4S8.5,18,8.3,18z"></path>';
                                echo '</svg>' . $contact_info . '</a>';
                            }
                            echo '</div>';
                        }
                        }
                    }
                    ?>




                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
