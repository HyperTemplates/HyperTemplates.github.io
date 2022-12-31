<?php
function mayosis_wave_cat_elementor($settings){ ?>


<?php 
global $post;
$mayosis_audio = get_post_meta($post->ID, 'audio_url',true);
$wavecolor=$settings['product_wave_color'];
 $primaryopcitywave = mayosis_hexto_rgb($wavecolor, 0.25);
 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

 $peakpath= plugins_url( '/', __FILE__ );
 
    $recent_section_title = $settings['title'];
    $listlayout= $settings['list_layout'];
        
   $row= '';
   if ( $listlayout == '2') {
       $msvrowclass = 'col-12 col-md-6';
   } elseif ( $listlayout == '3'){
        $msvrowclass = 'col-12 col-md-4';
   } elseif ( $listlayout == '4'){
        $msvrowclass = 'col-12 col-md-3';
        
   } elseif ( $listlayout == '5'){
        $msvrowclass = 'col';
        $row= 'row-cols-1 row-cols-md-5';
        
   } elseif ( $listlayout == '6'){
        $msvrowclass = 'col-12 col-md-2';
   } else {
        $msvrowclass = 'col-12 col-md-12';
   }
 ?>
 
  <script type="text/javascript">
            
            var awp_player; 

            jQuery(document).ready(function($){
                
                var settings = {
                    instanceName:"wall4",
                    sourcePath:"<?php echo $peakpath;?>",
                    playlistList:"#awp-playlist-list",
                    activePlaylist:"#playlist-audio2",
                    activeItem:0,
                    volume:0.5,
                    autoPlay:false,
                    preload:"auto",
                    randomPlay:false,
                    loopingOn:true,
                    autoAdvanceToNextMedia:false,
                    sck:"",
                    useTooltips:true,
                    useKeyboardNavigationForPlayback:false,
                    usePlaylistScroll:false,
                    playlistScrollOrientation:"vertical",
                    playlistScrollTheme:"minimal",
                    useNumbersInPlaylist: false,
                    numberTitleSeparator: ".  ",
                    artistTitleSeparator: " - ",
                    playlistItemContent:"thumb",
                    wavesurfer:{
                         waveColor: '<?php echo $primaryopcitywave;?>',
                        progressColor: '<?php echo $wavecolor;?>',
                        barWidth: 0,
                        cursorColor: '#ffffff',
                        cursorWidth: 0,
                        height: 100,
                    },
                    togglePlaybackOnPlaylistItem:true,

                };
                awp_player = $("#awp-wrapper").awp(settings); 

            });

        </script>
 
	
        <!-- player code -->   
        <div id="awp-wrapper" class="awp-play-overlay awp-wall4">

            <div class="awp-player-thumb-wrapper">

                <div class="awp-playback-toggle awp-contr-btn">
                    <div class="awp-btn awp-btn-play">
                        <i class="fa fa-play"></i>
                    </div>
                    <div class="awp-btn awp-btn-pause">
                        <i class="fa fa-pause"></i>
                    </div>
                </div>

            </div>

            <div class="awp-player-holder">

                <div class="awp-waveform-wrap">
                    <div class="awp-waveform awp-hidden"></div>  
                    <div class="awp-waveform-img awp-hidden"><!-- image waveform backup -->
                        <div class="awp-waveform-img-load"></div>
                        <div class="awp-waveform-img-progress-wrap"><div class="awp-waveform-img-progress"></div></div>
                    </div>
                    <span class="awp-waveform-preloader"></span>
                </div>  

                <div class="awp-media-time-total awp-hidden">0:00</div>
                <div class="awp-media-time-current awp-hidden">0:00</div>

            </div>
            <?php if($recent_section_title){?>
            <h3 class="msb-title-section-tld"><?php echo esc_html($recent_section_title);?> <?php single_cat_title( __( '', 'mayosis' ) ); ?></h3>
            <?php } ?>
            
            <div class="awp-playlist-holder">
                <div class="awp-playlist-filter-msg"><p>NOTHING FOUND!</p></div>
                <div class="awp-playlist-inner">
                    <div class="awp-playlist-content row <?php echo $row;?>">
                        <!-- playlist items are appended here! --> 
      
                    </div>
                                      
                        <div class="nav-links">
<?php if (function_exists("mayosis_page_navs")) { mayosis_page_navs(); } ?>
</div>
                </div>
            </div> 

            <!-- preloader --> 
            <div class="awp-preloader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>


          

            

            

            <div class="awp-tooltip"></div>

        </div>     
       
        <!-- PLAYLIST LIST -->
        <div id="awp-playlist-list">

             <div id="playlist-audio2">
                 
                   <?php
    $term=get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $CatTerms=(isset($term->slug))?$term->slug:null;
    $paged=( get_query_var( 'paged')) ? get_query_var( 'paged') : 1;
    if ( ! isset( $wp_query->query['orderby'] ) ) {
        $args = array(
            'order' => 'DESC',
            'post_type' => 'download',
            'download_category'=>$CatTerms,
            'paged' => $paged );
    } else {
        switch ($wp_query->query['orderby']) {
            case 'newness_asc':
                $args = array(
                    'orderby' => 'newness_asc',
                    'order' => 'ASC',
                    'post_type' => 'download',
                    'download_category'=>$CatTerms,
                    'paged' => $paged );
                break;
            case 'newness_desc':
                $args = array(
                    'orderby' => 'newness_desc',
                    'order' => 'DESC',
                    'post_type' => 'download',
                    'download_category'=>$CatTerms,
                    'paged' => $paged );
                break;
            case 'sales':
                $args = array(
                    'meta_key'=>'_edd_download_sales',
                    'order' => 'DESC',
                    'orderby' => 'meta_value_num',
                    'download_category'=>$CatTerms,
                    'post_type' => 'download',
                    'paged' => $paged );
                break;
            case 'price_asc':
                $args = array(
                    'meta_key'=>'edd_price',
                    'order' => 'ASC',
                    'orderby' => 'meta_value_num',
                    'download_category'=>$CatTerms,
                    'post_type' => 'download',
                    'paged' => $paged );
                break;
                
                case 'price_desc':
                $args = array(
                    'meta_key'=>'edd_price',
                    'order' => 'DESC',
                    'orderby' => 'meta_value_num',
                    'download_category'=>$CatTerms,
                    'post_type' => 'download',
                    'paged' => $paged );
                break;
                
                case 'title_asc':
                $args = array(
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'download_category'=>$CatTerms,
                    'post_type' => 'download',
                    'paged' => $paged );
                break;
                
                case 'title_desc':
                $args = array(
                    'orderby' => 'title',
                    'order' => 'DESC',
                    'download_category'=>$CatTerms,
                    'post_type' => 'download',
                    'paged' => $paged );
                break;
        } }
   
    $wp_query = new \WP_Query(); $wp_query->query($args); ?>
    <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
    
    global $post;
     $featured_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'mayosis-audio-cat-thumbnail' ); 
     $mayosis_audio = get_post_meta($post->ID, 'audio_url',true);
    ?>
                    
                <div class="awp-playlist-item <?php echo $msvrowclass;?>" data-type="audio" data-mp3="<?php echo esc_url($mayosis_audio);?>" data-thumb="<?php echo $featured_img_url[0];?>" >
                    <div class="mav-title-cat-mn">
                        
                        <div class="product-meta">
                            <?php get_template_part( 'includes/product-meta' ); ?>

                        </div>
                    </div>
                </div>

          <?php endwhile; ?>
<?php else : ?>
<h4 class="msv-no-p-title">No products Available on this category</h4>
<?php endif; ?>



            </div>

        </div>    	

<?php 

}