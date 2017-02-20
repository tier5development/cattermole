<?php
/**
 * Template Name:Practice Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();

$practice_id = 9;
$post = get_post($practice_id); 
$title =  $post->post_title;
$content =  $post->post_content;
$image = wp_get_attachment_image_src( get_post_thumbnail_id($practice_id), 'full');

$practice_args = array(
  
   'post_type' => 'practice-area',
   'posts_per_page' => 6,
   'post_status' => 'publish',
   'order' => 'ASC'
);

$practice_query = new WP_Query($practice_args);

?>
<div class="small-banner">
      <img src="<?php echo($image[0]!="")?$image[0]: get_template_directory_uri().'/images/home-banner.jpg';?>" alt="img">
      <h1><?php echo $title;?></h1>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="practice-area inner-practice">
                   <?php if($practice_query->have_posts()):?>
            <div class="row">
                <?php while($practice_query->have_posts()):$practice_query->the_post();?>
                  <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');?>
                 <div class="col-md-2 col-sm-4 col-xs-6">
                  <img src="<?php echo ($image[0]!="")?$image[0]:'';?>" alt="img">
                  <div class="practice-txt">
                    <?php echo get_the_title();?>
                  </div>
                </div>


              <?php endwhile;?>
            </div>
            <?php endif;?>  
              </div>  
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
          <div class="row">
              <div class="col-md-8">
                 <?php echo $content;?>


              </div>

              <div class="col-md-4 col-sm-4">
                  <div class="contact-box">
                      <h3 class="align-center">Contact Us</h3>
              <?php echo do_shortcode('[contact-form-7 id="56" title="Sidebar Contact"]');?>
              </div>
              </div>

               </div>

        </div>  
    </div>
<?php get_footer(); ?>