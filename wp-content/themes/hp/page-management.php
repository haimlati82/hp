<?php
/**
 * Template Name: management
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hp
 */

get_header();
$management_boxes_bottom_line_text = get_field('management_boxes_bottom_line_text');
$management_boxes_bottom_line_email = get_field('management_boxes_bottom_line_email');
?>
<section style="background-image: url(<?php echo get_template_directory_uri() ?>/img/wood.jpg);" class="s-management-a">
    <div class="container">
        <div class="b-management">
            <div class="sec-top">
                <?php
                echo main_small_large_title();
                ?>
            </div>
            <?php
            $management_boxes = get_field_object('management_boxes');
            $management_boxes = $management_boxes['value'];
            if(count($management_boxes) >0){
                echo '<div class="sec-middle">';
            if(count($management_boxes) <=3){
                echo '<div class="col-wrap-top">';
                for($i = 0; $i<count($management_boxes); $i++){
                    $management_main_image= $management_boxes[$i]['management_main_image'];
                    $management_name= $management_boxes[$i]['management_name'];
                    $management_position= $management_boxes[$i]['management_position'];
                    $management_icons= $management_boxes[$i]['management_icons'];
                    $management_content= $management_boxes[$i]['management_content'];
                }
                echo '</div>';
            }else{
                echo '<div class="col-wrap-top">';
                for($i = 0; $i<3; $i++){
                    $management_main_image= $management_boxes[$i]['management_main_image'];
                    $management_name= $management_boxes[$i]['management_name'];
                    $management_position= $management_boxes[$i]['management_position'];
                    $management_icons= $management_boxes[$i]['management_icons'];
                    $management_content= $management_boxes[$i]['management_content'];
                    echo'<div class="col">';
                        echo'<div data-index="'.$i.'" class="b-manager">';
                            echo'<div style="background-image: url('. $management_main_image['url'] .');" class="img"></div>';
                            echo'<div class="b-short-info"><span class="name">'.$management_name.'</span><span class="proffesion">'.$management_position.'</span></div>';
                        echo'</div>';
                    echo'</div>';
                }
                echo '</div>';
                echo '<div class="b-about-manager">';

                for($i = 0; $i<count($management_boxes); $i++){
                    $management_main_image= $management_boxes[$i]['management_main_image'];
                    $management_name= $management_boxes[$i]['management_name'];
                    $management_position= $management_boxes[$i]['management_position'];
                    $management_icons= $management_boxes[$i]['management_icons'];
                    $management_content= $management_boxes[$i]['management_content'];
            echo '<div class="b-full-info">';
                        echo '<div class="right">';
                    foreach ($management_icons as $icon ) {
                        echo '<span class="social hi-icon"><img src="'. $icon['url'] .'"></span>';
                    }
                    echo '</div>';
                        echo '<div class="left">';
                    echo $management_content;
                        echo '</div>';
                    echo '</div>';
                }
                echo '<a href="#" class="close">';
                  echo '<svg version="1.1" viewbox="0 0 26 26" class="svg">';
                    echo '<polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>';
                  echo '</svg>';
                echo '</a>';
                echo '</div>';
                echo '<div class="col-wrap-bottom">';
                for($i = 3; $i<count($management_boxes); $i++){
                    $management_main_image= $management_boxes[$i]['management_main_image'];
                    $management_name= $management_boxes[$i]['management_name'];
                    $management_position= $management_boxes[$i]['management_position'];
                    $management_icons= $management_boxes[$i]['management_icons'];
                    $management_content= $management_boxes[$i]['management_content'];
                    echo'<div class="col">';
                    echo'<div data-index="'.$i.'" class="b-manager">';
                    echo'<div style="background-image: url('. $management_main_image['url'] .');" class="img"></div>';
                    echo'<div class="b-short-info"><span class="name">'.$management_name.'</span><span class="proffesion">'.$management_position.'</span></div>';
                    echo'</div>';
                    echo'</div>';
                }
                echo '</div>';
            }
                echo '</div>';
            }
            if($management_boxes_bottom_line_text){
                echo ' <div class="sec-bottom"><a href="mailto:'.$management_boxes_bottom_line_email.'" data-hover="'.$management_boxes_bottom_line_text.'" class="link js-send-email">
                    <svg version="1.1" viewbox="0 0 18 14" class="svg">
                        <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                    </svg>'.$management_boxes_bottom_line_text.'</a>
            </div>';
            }
            ?>


        </div>
    </div>
</section>
<?php get_footer(); ?>
