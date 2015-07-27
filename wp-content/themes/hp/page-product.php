<?php
/**
 * Template Name: product
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hp
 */

get_header();
$main_title= get_field('main_title');
$company_name= get_field('company_name');
$company_site_url = get_field('company_site_url');
?>
<section style="background-image: url(img/bg-product.jpg);" class="s-product-a">
    <div class="container">
        <div class="b-product">
            <div class="wrap">
                <?php echo  main_small_large_title_en() ?><span class="section">About</span> <span class="title"><?php echo $main_title ?></span>
                <?php
                if( have_rows('product_modules') ) {

                    // loop through the rows of data
                    while (have_rows('product_modules')) {
                        the_row();
                        if(get_row_layout() == 'free_text_module'){
                            $free_text = get_sub_field('free_text');
                            echo '<div class="wrap">';
                            echo '<div class="text">';
                            echo $free_text;
                            echo '</div>';
                            if($company_site_url){

                                echo '<a href="'.$company_site_url.'" class="link animsition-link"><span class="icon hi-icon"><img src="'.get_template_directory_uri().'/img/link.png"></span>Visit the official site</a>';
                            }
                            echo '</div>';

                        }
                        elseif(get_row_layout() == 'more_info_model'){
                          
                            $more_info_items = get_sub_field('more_info_items');
                         
                            if($more_info_items){
                                echo '<div class="wrap">';
                                echo '<div class="b-additional-info">';
                                echo '<span class="title">Additional Information</span>';

                                foreach ($more_info_items as $item) {

                                    $more_info_item_title = $item['more_info_item_title'];
                                    $more_info_item_icon = $item['more_info_item_icon'];
                                    $more_info_item_link_url = $item['more_info_item_link_url'];
                                    $more_info_item_file = $item['more_info_item_file'];
                                    echo '<div class="col">';
                                    if($more_info_item_link_url){
                                        echo '<a href="'.$more_info_item_link_url.'" class="link" target="_blank">';
                                    }else{
                                        echo '<a  href="'.$more_info_item_file['url'].'" download class="link">';
                                    }
                                    echo '<span class="icon hi-icon">';
                                    echo '<img src="'.$more_info_item_icon['url'].'">';
                                    echo '</span>'.$more_info_item_title.'</a></div>';
                                }
                                echo '</div>';
                                echo '</div>';

                            }
                        }
                        elseif(get_row_layout() == 'customers_module'){
                            $more_info_items = get_sub_field('customers_list');
                            if($more_info_items){
                                echo '<div class="wrap">';
                                echo '<span class="product">'.$company_name.'</span>';
                                echo '<span class="section">Customers</span>';
                                echo '<div class="l-customers">';
                                foreach ($more_info_items as $item) {
                                    $customer_logo = $item['customer_logo'];
                                    $customer_website_url = $item['customer_website_url'];
                                    echo '<div class="col">';
                                    echo '<a href="'.$customer_website_url.'" target="_blank">';
                                    echo '<img src="'.$customer_logo['url'].'" alt="">';
                                    echo '</a>';
                                    echo '</div>';
                                }
                echo '</div>';
                echo '</div>';
                            }
                        }
                        elseif (get_row_layout() == 'contact_module') {
                            $contact_module_repeater = get_sub_field('contact_module_repeater');
                            $contact_module_title = get_sub_field('contact_module_title');
                            ?>


                                    <!--        <div class="right"><a href="mailto:" class="name">
                                                    <svg version="1.1" viewbox="0 0 18 14" class="svg">
                                                        <path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>
                                                    </svg>Name Family</a><span class="proffesion">Admin</span><span class="phone">052-3542154<br>03-53-99950</span><span class="address">M3, 7th flour, room #178</span></div>
                                        </div>
                                    </div>-->

                <?php
                            if( $contact_module_repeater){
                                echo ' <div class="wrap">';
                                echo ' <span class="product">'.$company_name.'</span>';
                                echo ' <span class="section">Contact Us</span>';
                                echo ' <div class="l-contact">';
                                foreach ( $contact_module_repeater as $contact) {
                                    echo '<div class="b-contact">';
                                    echo '<div class="wrap">';
                                    if($contact['contact_image']){
                                        echo '<div class="left"><img src="'.$contact['contact_image']['url'].'" class="photo"></div>';
                                    }
                                        echo '<div class="right">';
                                    if($contact['contact_email']){
                                        echo '<a href="mailto:'.$contact['contact_email'].'" class="name">';
                                        echo '<svg version="1.1" viewbox="0 0 18 14" class="svg">';
                                        echo '<path d="M15.7,0.7h-13c-1,0-1.8,0.8-1.8,1.8v8.6c0,0.3,0.1,0.7,0.3,1c0,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.2,0.2,0.4,0.2 c0.3,0.2,0.6,0.3,1,0.3h13c1,0,1.8-0.8,1.8-1.8V2.5C17.5,1.5,16.7,0.7,15.7,0.7z M10.4,6.7H7.9L3.4,2.2h11.4L10.4,6.7z M5.9,6.8 l-3.5,3.5v-7L5.9,6.8z M6.9,7.9l0.3,0.3H11l0.3-0.3l3.7,3.5H3.4L6.9,7.9z M12.4,6.8l3.5-3.5l0,6.8L12.4,6.8z"></path>';
                                        echo '</svg>';
                                        echo $contact['contact_title'].'</a>';
                                    }else{
                                        echo '<span class="name" >'.$contact['contact_title'].'</span>';
                                    }

                                        echo '<span class="proffesion">'.$contact['contact_subtitle'].'</span>';
                                        echo '<span class="phone">'.$contact['contact_phone_1'];
                                        if($contact['contact_phone_2']){
                                            echo '<br>'.$contact['contact_phone_2'];
                                        }
                                        echo '</span>';
                                        if($contact['contact_content']){
                                            echo '<p class="address">'.$contact['contact_content'].'</p>';
                                        }
                                        echo '</div>';

                                    echo '</div>';echo '</div>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }
                }

                ?>

            </div>
            <div class="wrap"><span class="product">ADM</span><span class="section">Products</span>
                <div class="l-product">
                    <div data-row-index="1" class="row"><a href="#" class="production js-production">Management</a><a href="#" class="production js-production">Unified Functional Testing</a><a href="#" class="production js-production">HP Anywhere</a></div>
                    <div data-content-index="1" class="b-production-content">
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC) 2</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="1" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC)</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="0" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC) 2</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="1" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="close js-close-product-info">
                            <svg version="1.1" viewbox="0 0 26 26" class="svg">
                                <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
                            </svg>
                        </div>
                    </div>
                    <div data-row-index="2" class="row"><a href="#" class="production js-production">Performance Center</a><a href="#" class="production js-production">Agile Manager</a><a href="#" class="production js-production">Network Virtualization</a></div>
                    <div data-content-index="2" class="b-production-content">
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC) 2</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="1" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC)</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="0" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC) 2</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="1" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="close js-close-product-info">
                            <svg version="1.1" viewbox="0 0 26 26" class="svg">
                                <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
                            </svg>
                        </div>
                    </div>
                    <div data-row-index="3" class="row"><a href="#" class="production js-production">LoadRunner</a><a href="#" class="production js-production">Sprinter</a><a href="#" class="production js-production">Service Virtualization</a></div>
                    <div data-content-index="3" class="b-production-content">
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC) 2</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="1" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC)</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="0" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC) 2</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="1" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="close js-close-product-info">
                            <svg version="1.1" viewbox="0 0 26 26" class="svg">
                                <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
                            </svg>
                        </div>
                    </div>
                    <div data-row-index="4" class="row"><a href="#" class="production js-production">StormRunner Load</a></div>
                    <div data-content-index="4" class="b-production-content">
                        <div class="content">
                            <div class="top"><span class="title">HP Performance Center (PC)</span>
                                <p class="text">A platform for testing application performance at the Enterprise scale.  It can generate load using a huge variety of protocols at the same time and in different configurations, and provides advanced analysis of the data that is collected during the test’s execution.  PC also provides lab management capabilities and allows large and distributed groups to share their tests and other resources.</p>
                                <p class="text">PC is built on top of LoadRunner, the leading solution in the market for load testing, and supports all of LoadRunner’s capabilities.</p>
                            </div>
                            <div class="bottom"><a href="#" data-gallery-index="0" class="link js-gallery-product-open"><span class="icon hi-icon"><img src="img/download.png"></span>Application Gallery</a><a href="#" class="link"><span class="icon hi-icon"><img src="img/link.png"></span>Visit the official site</a></div>
                        </div>
                        <div class="close js-close-product-info">
                            <svg version="1.1" viewbox="0 0 26 26" class="svg">
                                <polygon points="25.8,2 24,0.2 13,11.1 2,0.2 0.2,2 11.1,13 0.2,24 2,25.8 13,14.9 24,25.8 25.8,24 14.9,13 "></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="i-totop js-totop">
                <svg version="1.1" viewbox="0 0 102 102" class="svg">
                    <path d="M78.1,96.9L31.4,50.3L78.1,3.8L74.4,0L23.9,50.3l50.5,50.3L78.1,96.9z"></path>
                </svg>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
