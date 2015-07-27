<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package hp
 */

?>

</div>
<footer class="s-footer animsition">
    <?php footer_menu(); ?>
    <div class="sec-bottom">
        <div class="container">
            <p class="copy"><a href="#">HP Software.</a> All rights reserved</p>
            <div class="b-social">
                <?php
                $twitter = get_field('twitter' , 'option');
                $facebook = get_field('facebook' , 'option');
                $linkedin = get_field('linkedin' , 'option');
                $instagram = get_field('instagram' , 'option');
                $youtube = get_field('youtube' , 'option');

                if($youtube){
                  ?>
                    <a href="<?php echo $youtube ?>" target="_blank" class="social yt">
                        <svg version="1.1" viewbox="0 0 21 14" class="svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M20.5,10.1 c0,1.9-1.7,3.4-3.7,3.4H4.3c-2,0-3.8-1.5-3.8-3.4V3.9c0-1.9,1.8-3.4,3.8-3.4h12.5c2,0,3.7,1.5,3.7,3.4V10.1z"></path>
                            <polygon stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="9.5,3.7  14.9,6.6 9.5,9.6 	"></polygon>
                        </svg></a>
                <?php
                }
                if($instagram){
                  ?>
                    <a href="<?php echo $instagram ?>" target="_blank" class="social ig">
                        <svg version="1.1" viewbox="0 0 21 21" class="svg">
                            <path stroke-width="0.85" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M18.1,2.2h-1.9c-0.4,0-0.6,0.3-0.6,0.7v2c0,0.4,0.3,0.7,0.6,0.7h1.9c0.4,0,0.6-0.3,0.6-0.7v-2C18.8,2.5,18.5,2.2,18.1,2.2z"></path>
                            <line fill-rule="evenodd" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="14" y1="7.5" x2="21" y2="7.5"></line>
                            <line fill-rule="evenodd" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" y1="7.5" x2="8" y2="7.5"></line>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M20.5,16.3 c0,2.2-1.8,4.2-4,4.2h-12c-2.2,0-4-1.9-4-4.2V4.1c0-2.2,1.8-3.6,4-3.6h12c2.2,0,4,1.3,4,3.6V16.3z"></path>
                            <ellipse fill-rule="evenodd" clip-rule="evenodd" stroke-width="0.85" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="11" cy="11.7" rx="3" ry="3.1"></ellipse>
                            <ellipse fill-rule="evenodd" clip-rule="evenodd" stroke-width="0.85" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="11" cy="11.7" rx="5.5" ry="5.6"></ellipse>
                        </svg></a>
                <?php
                }
                if($linkedin){
                    ?>
                    <a href="<?php echo $linkedin ?>" target="_blank" class="social in">
                        <svg version="1.1" viewbox="0 0 21 21" class="svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" stroke-width="0.85" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M16.7,20.4v-7.7c0-1.8-0.9-3-2.4-3c-1.2,0-2.2,0.8-2.5,1.6c-0.1,0.3-0.1,0.7-0.1,1.1v8h-4v-9.5c0-1.7,0-3.2,0-4.4l3.6-0.1l0.2,2h0.1 c0.6-0.9,1.9-2.2,4.2-2.2c2.8,0,4.8,1.9,4.8,5.9v8.2H16.7z M2.8,4.9c-1.3,0-2.2-1-2.2-2.1c0-1.2,0.9-2.1,2.3-2.1 c1.4,0,2.2,0.9,2.2,2.1C5.1,3.9,4.2,4.9,2.8,4.9z M4.7,20.3h-4V6.4h4V20.3z"></path>
                        </svg></a>
                    <?php
                }
                if($facebook){
                  ?>
                    <a href="<?php echo $facebook ?>" target="_blank" class="social fb">
                        <svg version="1.1" viewbox="0 0 13 21" class="svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" stroke-width="0.85" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M12.4,0.5H9.1c0,0-3.6-0.3-4.6,3.4c0,0-0.3,1-0.3,3.3H0.8V10h3.8v10.5h3.8V10h3.8V7.2H8.4c0,0,0-0.6,0-1.7c0-1.1,0.7-2.1,2.4-2.1 h1.6V0.5z"></path>
                        </svg></a>
                <?php
                }
                if($twitter){
                  ?>
                    <a href="<?php echo $twitter ?>" target="_blank" class="social tw">
                        <svg version="1.1" viewbox="0 0 22 18" class="svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" stroke-width="0.85" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M18.8,3.4c0,0,1.6-0.1,2.2-0.6c0,0-0.2,0.6-2.1,2.3c0,0,0.7,9.4-9.3,11.8c0,0-5,1.1-8.7-1.7c0,0,3.8,0.7,6-1.7c0,0-2.8,0-3.6-2.8 c0,0,1,0.2,1.7-0.1c0,0-3.1-0.6-3.1-4.1c0,0,0.8,0.6,1.6,0.5c0,0-2.8-2.4-1.1-5.4c0,0,3.8,4.5,8.5,4.2c-0.1-0.3-0.1-0.7-0.1-1 c0-2.2,1.8-4,4-4c1.1,0,2.1,0.5,2.9,1.2c0.5,0,1.6-0.1,2.7-0.9C20.4,1.2,20.5,2.1,18.8,3.4z"></path>
                        </svg></a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<div class="b-search">
    <div class="container"><span class="title">תוצאות חיפוש</span><span class="result">נמצאו<span class="count">22</span>תוצאות הערך [המילים שהוקלדו בשדה חיפוש]</span>
        <div class="b-result"><span class="category">שכר ותנאים  >  תנאים סוציאליים</span><a href="#" class="title">ביטוחים רפואיים</a>
            <p class="text">עד שתי שורות של הסבר מלל, או...היא ה"משכורת" שלך לאחר הפרישה מהעבודה. בכל חודש תקבל תשלום מקרן הפנסיה. אפשר עד ארבע שורות. עדיף פחות.</p>
        </div>
        <div class="b-result"><span class="category">שכר ותנאים  >  תנאים סוציאליים</span><a href="#" class="title">ביטוחים רפואיים</a>
            <p class="text">עד שתי שורות של הסבר מלל, או...היא ה"משכורת" שלך לאחר הפרישה מהעבודה. בכל חודש תקבל תשלום מקרן הפנסיה. אפשר עד ארבע שורות. עדיף פחות.</p>
        </div>
        <div class="b-result"><span class="category">שכר ותנאים  >  תנאים סוציאליים</span><a href="#" class="title">ביטוחים רפואיים</a>
            <p class="text">עד שתי שורות של הסבר מלל, או...היא ה"משכורת" שלך לאחר הפרישה מהעבודה. בכל חודש תקבל תשלום מקרן הפנסיה. אפשר עד ארבע שורות. עדיף פחות.</p>
        </div>
    </div><a href="#" class="close js-close-search">
        <svg version="1.1" viewbox="0 0 26 26" class="svg">
            <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
        </svg></a>
</div>
<?php if(is_page_template('page-management.php')){
    ?>
    <div id="popup" class="b-popup vam_out overlay-scale">
        <a href="#" class="close js-close-popup">
            <svg version="1.1" viewbox="0 0 26 26" class="svg">
                <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
            </svg></a>
        <div class="f-email vam_in vam_out">
            <div class="vam_in">
                <div class="wrap">
                    <div class="right">
                        <fieldset class="validation"><span class="error">אופס! כל השדות הם חובה, כדי לשלוח אימייל.</span></fieldset>
                        <fieldset>
                            <div class="col-wrap-b">
                                <div class="col-b fl_r">
                                    <label for="name">שמך<span class="required">[חובה]</span></label>
                                    <input id="name" type="text" required placeholder="שמך">
                                </div>
                                <div class="col-b fl_l">
                                    <label for="email">האימייל שלך<span class="required">[חובה]</span></label>
                                    <input id="email" type="email" required placeholder="האימייל שלך" class="js-email-field">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <label for="subject">נושא<span class="required">[חובה]</span></label>
                            <input id="subject" type="text" required placeholder="נושא">
                        </fieldset>
                        <fieldset>
                            <label for="message">הטקסט שלך<span class="required">[חובה]</span></label>
                            <textarea id="message" rows="3" required placeholder="הטקסט שלך"></textarea>
                        </fieldset>
                        <fieldset class="btn">
                            <div class="b-anim">
                                <button class="t-c js-submit-button">לשלוח
                                    <div class="progress"></div>
                                </button>
                            </div>
                        </fieldset>
                    </div>
                    <div class="left"><span class="success">תודה. <br> המייל שלך נשלח בהצלחה.</span></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
 if(is_page_template('page-sport.php')){
    ?>
    <div id="popup" class="b-popup overlay-scale"><a href="#" class="close js-close-popup">
            <svg version="1.1" viewbox="0 0 26 26" class="svg">
                <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
            </svg></a>
        <div class="b-owl-4">
            <div class="b-owl-4-a vam_out">
                <div id="owl-4-a" class="owl-carousel owl-1 owl-4 owl-4-a owl-theme vam_in"></div>
            </div>
            <div class="b-owl-4-b">
                <div class="top">
                    <div class="b-toggle js-toggle _open">
                        <svg version="1.1" viewbox="0 0 33 62" class="svg">
                            <polygon points="33,58.9 4.6,30.6 33,2.3 30.7,0 0,30.6 30.7,61.2 "></polygon>
                        </svg>
                    </div>
                    <div class="b-counter"><span class="current">10</span><span class="length">| 23</span></div><span class="textimage">&nbsp;</span><span class="title">&nbsp;</span>
                </div>
                <div id="owl-4-b" class="owl-carousel owl-1 owl-4 owl-4-b owl-theme"></div>
            </div>
        </div>
    </div>
    <?php
}
if(is_page_template('page-home.php')){
    $parsed = parse_url( wp_get_attachment_url( 32 ) );
    $url    = dirname( $parsed [ 'path' ] ) . '/' . rawurlencode( basename( $parsed[ 'path' ] ) );
    $image_attributes = wp_get_attachment_image_src( 32 ); // returns an array
    $image_dir  = str_replace(WP_CONTENT_URL , WP_CONTENT_DIR , $image_attributes[0]);
    ?>
    <div id="popup" class="b-popup vam_out overlay-scale"><a href="#" class="close js-close-popup">
            <svg version="1.1" viewbox="0 0 26 26" class="svg">
                <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
            </svg></a>
        <form action="" class="f-birthday f-email vam_in">
            <fieldset class="top"><span class="title"><b>יום הולדת לאסתר חדוה גרינברג  /</b>לבחור ברכה, לשלוח ולשמח!</span>
                <div class="col-wrap">
                <?php if (have_rows('birthday_email_images_and_text' , 'option')):
                    $count = 1;
                    while (have_rows('birthday_email_images_and_text' , 'option')) : the_row();
                        $birthday_image = get_sub_field('birthday_image');
                        $birthday_text = get_sub_field('birthday_text');
                    echo '<div class="col"><img src="'.$birthday_image['url'].'">';
                    echo '<fieldset>';
                    echo '<input id="rd'.$count.'" type="radio" name="image">';
                    echo '<label for="rd'.$count.'" class="radio">'.$birthday_text.'</label>';
                    echo '</fieldset>';
                    echo '</div>';
                        $count++;
                    endwhile;
                endif; ?>
                </div>
            </fieldset>
            <div class="wrap">
                <div class="right">
                    <fieldset>
                        <div class="col-wrap-b">
                            <div class="col-b fl_r">
                                <label for="name">שמך<span class="required">[חובה]</span></label>
                                <input id="name" type="text" required>
                            </div>
                            <div class="col-b fl_l">
                                <label for="email">האימייל שלך<span class="required">[חובה]</span></label>
                                <input id="email" type="email" required class="js-email-field">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="validation"><span class="error">אופס! יש לציין את שמך ואת האימייל שלך, כדי לשלוח ברכה.</span></fieldset>
                    <fieldset>
                        <label for="message">הברכה שלך<span class="required">[אופציונאלי]</span></label>
                        <textarea id="message" rows="3"></textarea>
                    </fieldset>
                    <fieldset class="btn">
                        <div class="b-anim">
                            <button class="t-c js-submit-button">לשלוח
                                <div class="progress"></div>
                            </button>
                        </div>
                    </fieldset>
                </div>
                <div class="left"><span class="success">הברכה שלך נשלחה בהצלחה. <br> רק בשמחות.</span></div>
            </div>
        </form>
        <div class="b-owl-4">
            <div class="b-owl-4-a vam_out">
                <div id="owl-4-a" class="owl-carousel owl-1 owl-4 owl-4-a owl-theme vam_in"></div>
            </div>
            <div class="b-owl-4-b">
                <div class="top">
                    <div class="b-toggle js-toggle _open">
                        <svg version="1.1" viewbox="0 0 33 62" class="svg">
                            <polygon points="33,58.9 4.6,30.6 33,2.3 30.7,0 0,30.6 30.7,61.2 "></polygon>
                        </svg>
                    </div>
                    <div class="b-counter"><span class="current">10</span><span class="length">| 23</span></div><span class="textimage">תיאור תמונה, טקסט לתמונה</span><span class="title">שם הגלריה / תיאור הגלריה</span>
                </div>
                <div id="owl-4-b" class="owl-carousel owl-1 owl-4 owl-4-b owl-theme"></div>
            </div>
        </div>
    </div>
<?php
}?>
<?php if(is_page_template('page-home.php')){
    ?>
    <!--script(src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js")-->
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/svganimations3.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/classie.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/svgcheckbx.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/jquery.maskedinput.js"></script>


    <?php
}else{
    ?>
    <!--script(src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js")-->
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/jquery.mousewheel.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/svgcheckbx.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/jquery.maskedinput.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/jquery.jscrollpane.min.js"></script>

    <?php
} ?>
<script src="<?php echo get_template_directory_uri() ?>/js/vendor/jquery.animsition.js"></script>
<?php if(is_page_template('page-home.php')){
    if (have_rows('home_page_gallery')):
        $photoUrlArr = array();
        $thumbUrlArr = array();
        $photoTextArr = array();
        while (have_rows('home_page_gallery')) : the_row();
            $home_gallery_image = get_sub_field('home_gallery_image');
            $display_in_home_page = get_sub_field('display_in_home_page');
            $photoUrl = $home_gallery_image['url'];
            $thumbUrl = $home_gallery_image['sizes']['thumbnail'];
            $photoText = $home_gallery_image['description'];
            $photoUrlArr[] = "'$photoUrl'";
            $thumbUrlArr[] = "'$thumbUrl'";
            $photoTextArr[] = "'$photoText'";
        endwhile;
    endif;
    ?>
    <script>
        function home_gallery_arr(){
            var galleries = [
                {

                    photoUrl: [<?php echo implode(",",$photoUrlArr) ?>],

                    thumbUrl: [<?php echo implode(",",$thumbUrlArr) ?>],

                    photoText: [<?php echo implode(",",$photoTextArr) ?>]
                }
            ];
            return galleries;
        }


    </script>
    <?php
}
if(is_page_template('page-sport.php')){
    $image_gallery = get_field('image_gallery');
    ?>
    <script>
        function sport_gallery_arr(){
            var sportGalleries = [
                {
                    <?php
                    $photoUrlArr = array();
                    $thumbUrlArr = array();
                    $photoTextArr = array();
                 foreach ($image_gallery as $image) {
                     $photoUrl = $image['url'];
                     $thumbUrl = $image['sizes']['thumbnail'];
                     $photoText = $image['description'];

                     $photoUrlArr[] = "'$photoUrl'";
                     $thumbUrlArr[] = "'$thumbUrl'";
                     $photoTextArr[] = "'$photoText'";
                     ?>

                    <?php
                }

                ?>
                    photoUrl: [<?php echo implode(",",$photoUrlArr) ?>],

                    thumbUrl: [<?php echo implode(",",$thumbUrlArr) ?>],

                    photoText: [<?php echo implode(",",$photoTextArr) ?>]
                }
            ];
            return sportGalleries;
        }
    </script>
    <?php
}
?>

<script src="<?php echo get_template_directory_uri() ?>/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>
