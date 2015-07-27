<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hp
 */

get_header(); ?>
<?php
echo '<section class="s-index-a">';
if (have_rows('home_main_slider')):
    $coun = 1;
    echo '<div class="b-svg-animation-wrap-1">';
    while (have_rows('home_main_slider')) : the_row();
        echo '<svg id="bullet'.$coun.'" version="1.1" width="18px" height="18px" viewbox="0 0 18 18" class="line-drawing">
            <path id="top_line" d="M16.5,9c0,4.1-3.4,7.5-7.5,7.5S1.5,13.1,1.5,9S4.9,1.5,9,1.5S16.5,4.9,16.5,9z" class="darkersvg"></path>
        </svg>';
        $coun++;
    endwhile;
    echo '</div>';
endif;
?>

<?php
if (have_rows('home_main_slider')):
    echo '<div id="owl-1" class="owl-carousel owl-1 owl-1-1 owl-theme">';
    while (have_rows('home_main_slider')) : the_row();
        $slide_main_image = get_sub_field('slide_main_image');
        $slide_main_text = get_sub_field('slide_main_text');
        $slide_sub_text = get_sub_field('slide_sub_text');
        $slide_call_to_action_text = get_sub_field('slide_call_to_action_text');
        $slide_link_url = get_sub_field('slide_link_url');
        $slide_page_link_url = get_sub_field('slide_page_link_url');
        $open_new_tab = get_sub_field('open_new_tab');
        $slid_url = '';
        if($slide_link_url){
            $slid_url= $slide_link_url;
        }elseif($slide_page_link_url){
            $slid_url = $slide_page_link_url;
        }
        if($open_new_tab){
            $target = 'target="_blank"';
        }else{
            $target = '';
        }
        echo '<div style="background-image: url('.$slide_main_image['url'].');" class="item">';
        echo '<div class="container">';
        echo '<div class="b-slogan">';
        if($slide_sub_text){
            echo '<span class="subtitle">'.$slide_sub_text.'</span>';
        }
        if($slide_main_text){
            echo '<span class="title">'.$slide_main_text.'</span>';
        }
        if($slide_call_to_action_text){
            echo '<a href="'.$slid_url.'" '.$target.' class="t-a">';
            echo '<span>'.$slide_call_to_action_text.'</span>';
            echo '</a>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    endwhile;
    echo '</div>';
endif;

?>

<div class="b-svg-animation-wrap-2">
    <svg id="leftArrow" version="1.1" viewbox="0 0 102 102" class="line-drawing left-arrow">
        <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z" class="darkersvg"></path>
    </svg>
    <svg id="rightArrow" version="1.1" viewbox="0 0 102 102" class="line-drawing right-arrow">
        <path d="M24,96.9l46.6-46.6L24,3.8L27.8,0L78,50.3l-50.2,50.3L24,96.9z" class="darkersvg"></path>
    </svg>
</div>
</section>

        <?php
        $event_date = get_field('event_date' , 186);


        $date = date('Ymd');
        $date_end = date('Ymt');
        $args = array(
            'post_type' => 'event',
            'posts_per_page' => -1,
            'meta_query'	=> array(
                'relation'		=> 'AND',
                array(
                    'key'		=> 'event_date',
                    'value'		=> $date_end,
                    'compare'	=> '<=',
                    'type'    => 'DATE'
                ),
                array(
                    'key'		=> 'event_date',
                    'value'		=> $date,
                    'compare'	=> '>=',
                    'type'    => 'DATE'
                )
            )
        );
        $query = new WP_Query($args);
        $post_count = $query->post_count;
        if(($query->have_posts()) && ($post_count > 4)) {
            $count = 1;
            ?>
<section class="s-index-b">
            <div class="container"><span class="sec-subtitle">אירועי</span><span class="sec-title">החודש</span>

                <div id="owl-2" class="owl-carousel owl-1 owl-2 owl-theme">
                <div class="item">
                    <div class="col-wrap">
                        <?php
                        while($query->have_posts()) {
                            $query->the_post();
                            $title = get_the_title();
                            $content = get_the_content();
                            $event_date = get_field('event_date');
                            $dateFormat = 'd/m/Y';
                            $event_start_time = get_field('event_start_time');
                            $event_end_time = get_field('event_end_time');
                            $event_location = get_field('event_location');
                            $timestamp = strtotime($event_date);
                            $php_date = getdate($timestamp);
                            $date = DateTime::createFromFormat($dateFormat, $event_date);
                            $day_num = $date->format('d');
                            $month_name = $date->format('F');
                            $month_name = __($month_name);
                            ?>
                            <div class="col">
                                <a href="#" class="animsition-link b-article-short">
                                    <div class="top-wrap">
                                        <div class="top">
                                            <div class="row">
                                                <div class="right"><span class="date"><?php echo $day_num ?></span></div>
                                                <div class="left"><span class="time"><?php echo $month_name.' // '.$event_start_time.'-'.$event_end_time.'' ?></span><span class="subtitle"><?php echo $event_location ?></span></div>
                                            </div>
                                            <div class="row active">
                                                <div class="right"><span class="date"><?php echo $day_num ?></span></div>
                                                <div class="left"><span class="time"><?php echo $month_name.' // '.$event_start_time.'-'.$event_end_time.'' ?></span><span class="subtitle"><?php echo $event_location ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    echo '<div class="bottom"><span class="title">'.$title.'</span>';
                                    echo '<p class="text">'.$content.'</p>';
                                    echo '</div>';
                                    ?>
                                </a>
                            </div>
                            <?php

                            if($count%4 == 0){
                                echo ' </div></div>';
                                echo '<div class="item">';
                                echo '<div class="col-wrap">';
                            }
                            $count++;
                        }
                        ?>

                    </div>
                </div>
            </div>
    <div class="b-svg-animation-wrap-3">
        <svg id="leftArrow2" version="1.1" viewbox="0 0 102 102" class="line-drawing left-arrow">
            <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z" class="darkersvg"></path>
        </svg>
        <svg id="rightArrow2" version="1.1" viewbox="0 0 102 102" class="line-drawing right-arrow">
            <path d="M24,96.9l46.6-46.6L24,3.8L27.8,0L78,50.3l-50.2,50.3L24,96.9z" class="darkersvg"></path>
        </svg>
    </div>
    </div>
</section>
            <?php
        }
        wp_reset_postdata();
        ?>


<section class="s-index-c">
    <div class="container">
        <div class="sec-wrap">
            <div id="grid" class="sec-left">
                <?php home_page_gallery(); ?>
                <?php
                $args = array(
                    'post_type' => 'message',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
                if($query->have_posts()){
                    ?>
                    <div class="b-wrap js-scale-block">
                        <div class="b-main-messages">
                            <div class="top"><span class="title">
                      <svg version="1.1" viewbox="0 0 50 36" class="svg">
                          <path d="M-0.2,18c0,8.7,2.6,18,7.5,18c1.3,0,2.5-0.7,3.5-1.9c1.2-0.4,5.1-1.6,10-3.1l0.7,1.9 c0.4,1.2,1.2,2.1,2.4,2.6c0.6,0.3,1.3,0.5,2,0.5c0.5,0,1.1-0.1,1.6-0.3l7.3-2.6c2.4-0.8,3.6-3.5,2.8-5.8L37.2,26 c5.6-1.7,9.8-3,10-3.1c1.6-0.5,2.7-2.5,2.7-5s-1.1-4.4-2.7-5c-0.5-0.1-32.6-10-36.3-11.1C9.9,0.7,8.7,0,7.3,0C2.5,0-0.2,9.3-0.2,18z  M22.8,30.4c4-1.2,8.5-2.6,12.5-3.8l0.5,1.3c0.5,1.3-0.2,2.8-1.6,3.3l-7.3,2.6c-0.7,0.2-1.4,0.2-2-0.1c-0.6-0.3-1.1-0.8-1.3-1.5 L22.8,30.4z M12.4,31.5C14,28,14.8,22.9,14.8,18c0-4.9-0.8-10-2.4-13.5C20.5,7,46.1,14.8,46.5,15c0.5,0.2,1.3,1.1,1.3,3 s-0.8,2.9-1.3,3C46.1,21.2,20.5,29,12.4,31.5z M1.7,18c0-9.5,3-16.1,5.6-16.1s5.6,6.6,5.6,16.1c0,9.5-3,16.1-5.6,16.1 S1.7,27.5,1.7,18z"></path>
                      </svg>הודעות</span></div>
                            <div class="bottom">
                                <?php
                                while($query->have_posts()){
                                    $query->the_post();
                                    $link_html = '';
                                    $message_body = get_field('message_body');
                                    $message_link_text = get_field('message_link_text');
                                    $message_link_url = get_field('message_link_url');
                                    $message_file = get_field('message_file');
                                    if($message_link_text){
                                        if($message_link_url){
                                            $link_html = '<a href="'.$message_link_url.'"><b>'.$message_link_text.'</b></a>';
                                        }elseif($message_file){
                                            $link_html = '<a href="'.$message_file['url'].'" download><b>'.$message_link_text.'</b></a>';
                                        }
                                    }
                                    ?>
                                    <div class="message"><?php echo $message_body.' '.$link_html ?></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>

                <div class="b-wrap js-scale-block">
                    <div class="b-photo _xl">
                        <div class="img-wrap"><img src="<?php echo get_template_directory_uri() ?>/img/pic2.jpg" alt="" class="main-img">
                            <div class="b-mo-sport">
                                <div class="top"><span class="title"><b>לוח שעות /</b>חוגים</span>
                                    <div class="col-wrap">


                                        <?php
                                        $terms_slugs=array('sunday','monday','tuesday','wednesday','thursday');
                                        $opening_hours_morning = get_field('opening_hours_morning');
                                        $opening_hours_evening = get_field('opening_hours_evening');
                                        $sport_article_title = get_field('sport_article_title');
                                        $sport_article_description = get_field('sport_article_description');
                                        $sport_article_page_url = get_field('sport_article_page_url');
                                        foreach ($terms_slugs as $slug ) {
                                            echo '<div class="col">';
                                            $taxonomy = 'class_day';
                                            $terms = $slug;
                                            $term = get_term_by('slug' ,$terms , $taxonomy );
                                            $args = array(
                                                'post_type' => 'gym_class',
                                                'posts_per_page' => 5,
                                                'orderby'   => 'meta_value_num',
                                                'meta_key'  => 'start_time',
                                                'order'     => 'ASC',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => $taxonomy,
                                                        'field'    => 'slug',
                                                        'terms'    => $terms,
                                                    ),
                                                ),
                                            );
                                            $query = new WP_Query($args);
                                            if($query->have_posts()){
                                                echo '<div class="b-shelude"><span class="title">'.$term->name.' /</span>';
                                                echo '<dl>';
                                                while($query->have_posts()){
                                                    $query->the_post();
                                                    $start_time = get_field('start_time');
                                                    $end_time = get_field('end_time');
                                                    echo '<dt>'.$start_time.'-'.$end_time.'</dt>';
                                                    echo '<dd>'.get_the_title().'</dd>';
                                                }
                                                echo '</dl>';
                                                echo '</div>';
                                            }
                                            wp_reset_postdata();
                                            echo '</div>';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="bottom"><span class="title-a"><b>שעות פעילות /</b>חדר כושר</span><span class="subtitle"><b>בוקר /</b> <?php echo $opening_hours_morning ?><b class="mr">ערב /</b><?php echo $opening_hours_evening ?></span></div>
                            </div>
                        </div>
                        <div class="b-bottom-title"><a href="<?php echo $sport_article_page_url ?>" class="title bottom-title"><b><?php echo $sport_article_title ?> /</b><?php echo $sport_article_description ?> </a></div>
                    </div>
                </div>
            </div>
            <div class="sec-right">
                <?php live_stock_value();
                club_benefits_box();
                community_relations_box();
                ?>





                <div class="b-wrap js-scale-block">
                    <?php
                    $date = date('md');
                    $date2 = date('Y');
                    $employee_birthday_arr = employee_birthday_arr();
                    $coun = 1;
                    $dispaly_birthday = array();

                    foreach ($employee_birthday_arr as $birthday) {
                        if($birthday >= $date){
                            if($coun <= 3){
                                $dispaly_birthday[] = $birthday;
                            }

                            $coun++;
                        }
                    }
                    echo '<div class="b-birthday">';
                    echo '<div class="top">';
                    echo '<div class="b-dates">';
                    foreach ($dispaly_birthday as $dis) {
                        $dateFormat = 'md';
                        $yrdata =   DateTime::createFromFormat($dateFormat, $dis);
                        $day_num = $yrdata->format('d');
                        $month_name = $yrdata->format('F');

                        echo '<div class="col">';
                        echo '<div class="link"><span class="date">'.$day_num.'</span><span class="month">'.__($month_name).'</span></div>';
                        echo '<div class="content">';
                        $args = array(
                            'post_type' => 'employee',
                            'meta_query' => array(
                                array(
                                    'key'     => 'employee_birthday',
                                    'value'   => $dis,
                                    'compare' => 'LIKE'
                                ),
                            ),

                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()){
                            $count = 1;
                            echo '<div class="col-a">';
                            while($query->have_posts()){
                                $query->the_post();
                                echo '<a href="#" data-employee-id="'.$post->ID.'" class="name js-birthday-popup-open">'.get_the_title().'</a>';
                                if($count%4 == 0){
                                    echo '</div>';
                                    echo '<div class="col-a">';
                                }
                                $count++;
                            }
                            echo '</div>';
                        }
                        wp_reset_postdata();
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '<div class="envelope"></div>';
                    echo '</div>';
                    echo '<div class="b-bottom-title"><a href="#" class="title bottom-title"><b>&#x5D4;&#x5D9;&#x5D5;&#x5DD; &#x5D9;&#x5D5;&#x5DD; &#x5D4;&#x5D5;&#x5DC;&#x5D3;&#x5EA; / &#x5E8;&#x5D5;&#x5E6;&#x5D4; &#x5DC;&#x5E9;&#x5DC;&#x5D5;&#x5D7; &#x5D1;&#x5E8;&#x5DB;&#x5D4;</b></a></div>';
                    echo '</div>';
                    echo '</div>';
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
