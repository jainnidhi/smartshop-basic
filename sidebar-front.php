<?php
/**
 *  Front page sidebars for 
 * 
 *  Home Featured
 *  Home CTA
 *  Home #1, Home #2 and Home #3
 */
// Check if home featured sidebar is active. Yes, then output the relevant HTML else exit. 

?>

    <div id="home-featured-area" class="container" >

        <div class="row" id="featured-widgets">

            <div class="flexslider">

               <ul class="slides">
            <?php
            // check if the slider is blank.
            // if there are no slides by user then load default slides. 
            if ( get_theme_mod('slider_one') =='' ) {  ?>
                <li id="slider1">
                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slide1.jpg" alt=""/>
             </li>
            
             
            <li id="slider2"> 
                <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slide2.jpg" alt=""/>
            </li>
            
            <li id="slider3">
                <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slide3.jpg" alt=""/>
            </li>
            
            <?php } ?>
            
             <?php 
             // if user adds a cusotm slide then display the slides 
          // load first slide
            if ( get_theme_mod('slider_one') !='' ) {  ?>
                    <li id="slider1">
                    <img  src="<?php echo get_theme_mod('slider_one'); ?>" alt=""/>
                </li>
                
               
                  <?php
                   // load second slide 
                   if ( get_theme_mod('slider_two') !='' ) {  ?>
                <li id="slider2">
                    <img  src="<?php echo get_theme_mod('slider_two'); ?>" alt=""/>
                </li>
                   <?php } ?>
                
               
                  <?php 
                   // load third slide
                   if ( get_theme_mod('slider_three') !='' ) {  ?>
                <li id="slider3">
                    <img  src="<?php echo get_theme_mod('slider_three'); ?>" alt=""/>
                </li>
                   <?php } ?>
                
                
                 <?php 
                 // load fourth slide 
                 if ( get_theme_mod('slider_four') !='' ) {  ?>
                <li id="slider4"> 
                    <img  src="<?php echo get_theme_mod('slider_four'); ?>" alt=""/>
                </li>
                 <?php } ?>
                
                
                <?php
                // load fifth slide
                if ( get_theme_mod('slider_five') !='' ) {  ?>
                <li id="slider5">  
                    <img  src="<?php echo get_theme_mod('slider_five'); ?>" alt=""/>
                </li>
            <?php } ?>
        <?php } ?>
            
        </ul>

            </div>

        </div> <!--end .row --> 

    </div> <!--end .container -->



    <div id="home-widgets-area" class="container">
        <div class="row" id="home-widgets">

            
            <div class="col grid_4_of_12 home-widget-one">
                <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_one'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa fa-gears"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Home Featured #1', 'smartshop') ?></h3>
                           <?php } ?>
            </div>
       
            <div class="col grid_4_of_12 home-widget-two">
                <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_two'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa fa-comments"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Home Featured #2', 'smartshop') ?></h3>
                           <?php } ?>
            </div>
            <div class="col grid_4_of_12 home-widget-three">
                <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_three'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa fa-laptop"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Home Featured #3', 'smartshop') ?></h3>
                           <?php } ?>
            </div>

    </div>
</div>

 
    <div id="home-cta-area" class="container" >

        <div class="row" id="home-cta">

            <div class="col grid_12_of_12">
            
                    <?php if ( get_theme_mod('cta_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('cta_title')); ?></h3>
                          <?php } else {  ?> <h3><?php esc_html_e('Home CTA', 'smartshop') ?></h3>
                               <?php } ?>			
                        <?php if ( get_theme_mod('cta_text') !='' ) {  ?>
                        <p><?php echo esc_html(get_theme_mod('cta_text')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('This is Home CTA widget area to add some Call to Action text and button.', 'smartshop') ?> </p>
                            <?php } ?>
                          
                            <a class="smartshop-cta" href="<?php if ( get_theme_mod('home_cta_link_url') !='' ) { echo esc_url(get_theme_mod('home_cta_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_cta_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_cta_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Get Started', 'smartshop') ?>
                           <?php } ?></a>
                        
                   
              
            </div>

        </div> <!--end .row --> 

    </div> <!--end .container -->
   