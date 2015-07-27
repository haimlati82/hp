<?php

function main_small_large_title(){
    global $post;
    $small_large_title = '';
    $small_title = get_field('small_title' , $post->ID);
    $large_title = get_field('large_title' , $post->ID);
    if($small_title){
        $small_large_title .= '<span class="small-title">'.$small_title.'</span>';
    }
    $small_large_title .= '<span class="big-title">'.$large_title.'</span>';
    return $small_large_title;
}
function main_small_large_title_en(){
    global $post;
    $small_large_title = '';
    $small_title = get_field('company_name' , $post->ID);
    $large_title = get_field('large_title' , $post->ID);
    if($small_title){
        $small_large_title .= '<span class="product">'.$small_title.'</span>';
    }

    return $small_large_title;
}
function home_page_gallery(){
    global $post;
    if (have_rows('home_page_gallery')):
    echo '<div class="b-wrap js-scale-block">';
        echo '<div class="owl-wrap">';
        echo '<div class="owl-open-gallery"></div>';
        echo '<div id="owl-3" class="owl-carousel owl-1 owl-3 owl-theme">';
        while (have_rows('home_page_gallery')) : the_row();

           $home_gallery_image =  get_sub_field('home_gallery_image');
           $display_in_home_page =  get_sub_field('display_in_home_page');
            if($display_in_home_page){
                echo '<div class="item">';
                echo '<div data-index="0" data-name="'.$home_gallery_image['title'].'" data-description="'.$home_gallery_image['description'].'" style="background-image: url('.$home_gallery_image['sizes']['home_gallery'].');" class="b-item"></div>';
                echo ' </div>';
            }

        endwhile;
        echo '</div>';
        echo '<div class="b-bottom-title"><a href="#" class="title js-owl-title"><b> שם הגלריה /</b><span>תיאור הגלריה</span></a></div>';
        echo '</div>';
        echo '</div>';
    endif;

}
function club_benefits_box(){
    global $post;
    $post_id = $post->ID;
    ?>
<div class="b-wrap js-scale-block js-scroll-to">
    <?php
    $club_benefits_url ='';
    $club_benefits_download ='';
    $club_benefits_main_image = get_field('club_benefits_main_image');
    $club_benefits_title = get_field('club_benefits_title');
    $club_benefits_description = get_field('club_benefits_description');
    $club_benefits_mouse_hover_line = get_field('club_benefits_mouse_hover_line');
    $club_benefits_call_to_action_line = get_field('club_benefits_call_to_action_line');
    $club_benefits_link_url = get_field('club_benefits_link_url');
    $club_benefits_page_url = get_field('club_benefits_page_url');
    $club_benefits_file = get_field('club_benefits_file');


    if($club_benefits_link_url){
        $club_benefits_url =$club_benefits_link_url;
    }elseif($club_benefits_page_url){
        $club_benefits_url =$club_benefits_page_url;
    }elseif($club_benefits_file){
        $club_benefits_url =$club_benefits_file['url'];
        $club_benefits_download = 'download';
    }

    ?>
    <div class="b-photo">
        <div class="img-wrap"><img src="<?php echo $club_benefits_main_image['url'] ?>" alt="" class="main-img">
            <div class="b-mo">
                <div class="top"><span class="text"><?php echo $club_benefits_mouse_hover_line ?></span></div>
                <div class="bottom"><a href="<?php echo $club_benefits_url ?>" class="title" <?php echo $club_benefits_download ?>><?php echo  $club_benefits_call_to_action_line ?></a></div>
            </div>
        </div>
        <div class="b-bottom-title"><a href="<?php echo $club_benefits_url ?>" class="title bottom-title"><b><?php echo $club_benefits_title ?></b><?php echo $club_benefits_description ?></a><img src="<?php echo get_template_directory_uri() ?>/img/logo-club.png" alt="" class="club"></div>
    </div>
</div>
<?php
}
function community_relations_box(){
    global $post;
    $community_relations_url ='';
    $community_relations_download ='';
    $community_relations_main_image = get_field('community_relations_main_image');
    $community_relations_hover_line = get_field('community_relations_hover_line');
    $community_relations_call_to_action_line = get_field('community_relations_call_to_action_line');
    $community_relations_link_url = get_field('community_relations_link_url');
    $community_relations_page_url = get_field('community_relations_page_url');
    $community_relations_file = get_field('community_relations_file');
    if($community_relations_link_url){
        $community_relations_url =$community_relations_link_url;
    }elseif($community_relations_page_url){
        $community_relations_url =$community_relations_page_url;
    }elseif($community_relations_file){
        $community_relations_url =$community_relations_file['url'];
        $community_relations_download = 'download';
    }

    ?>
    <div class="b-wrap js-scale-block js-scroll-to">
        <div class="b-community">
            <div class="wrap"><img src="<?php echo $community_relations_main_image['url'] ?>" alt="">
                <div class="b-mo">
                    <div class="top"><span class="text"><?php echo $community_relations_hover_line ?></span></div>
                    <div class="bottom"><a href="<?php echo $community_relations_url ?>" class="title" <?php echo $community_relations_download ?>><?php echo $community_relations_call_to_action_line ?></a></div>
                </div>
            </div>
        </div>
    </div>
<?php
}