<?php
function mayosis_wave_standard_audio(){ ?>
<?php 
global $post;
$mayosis_audio = get_post_meta($post->ID, 'audio_url',true);
$wavecolor=get_theme_mod( 'wave_color','#5a00f0');
 $primaryopcitywave = mayosis_hexto_rgb($wavecolor, 0.25);
 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
 $thumbstate=get_theme_mod( 'product_thumbnail_state','disable');
 $product_playlist=get_theme_mod( 'product_playlist','disable');
 ?>
<script type="text/javascript">

            var awp_player;  
            jQuery(document).ready(function($){

                var settings = {
                    instanceName:"default",
                    sourcePath:"<?php echo plugins_url( '/', __FILE__ ) ?>",
                    playlistList:"#awp-playlist-list",
                    activePlaylist:"playlist-audio1",
                    activeItem:0,
                    volume:0.5,
                    autoPlay:false,
                    drawWaveWithoutLoad:false,
                    randomPlay:false,
                    loopingOn:true,
                    autoAdvanceToNextMedia:true,
                    mediaEndAction:"loop",
                    useKeyboardNavigationForPlayback:true,
                    usePlaylistScroll:true,
                    playlistScrollOrientation:"vertical",
                    playlistScrollTheme:"light",
                    facebookAppId:"644413448983338",
                    useNumbersInPlaylist: true,
                    numberTitleSeparator: ".  ",
                    artistTitleSeparator: " - ",
                    playlistItemContent:"title",
                    wavesurfer:{
                        waveColor: '<?php echo $primaryopcitywave;?>',
                        progressColor: '<?php echo $wavecolor;?>',   
                        barWidth: 2,
                        cursorColor: '#0000ff',
                        cursorWidth: 3,
                        height: 175,
                    }
                };

                awp_player = $("#awp-wrapper").awp(settings);

            }); 

        </script>
 <!-- player code -->   
        <div id="awp-wrapper">

            <div class="awp-player-thumb-wrapper">
			
			<div class="awp-player-thumb"></div>
			
			<div class="awp-playback-toggle"><i class="fa fa-play"></i></div>

                <div class="awp-volume-wrapper">
                    <div class="awp-player-volume"><i class="fa fa-volume-up"></i></div>
                    <div class="awp-volume-seekbar awp-tooltip-top">
                         <div class="awp-volume-bg"></div>
                         <div class="awp-volume-level"></div>
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

                <p class="awp-media-time-total awp-hidden">0:00</p>
                <p class="awp-media-time-current awp-hidden">0:00</p>

            </div>
              
              <?php if ($product_playlist=="enable"){?>
            <div class="awp-playlist-holder">
                <div class="awp-playlist-filter-msg"><p>NOTHING FOUND!</p></div>
                <div class="awp-playlist-inner">
                    <div class="awp-playlist-content">
                        <!-- playlist items are appended here! --> 
                    </div>
                </div>
                
                <div class="awp-preloader"></div>

                <div class="awp-bottom-bar">

                    <input class="awp-search-filter" type="text" value="filter...">
                   

                </div>

            </div>
            <?php } ?>
        
        </div>  



        <!-- PLAYLIST LIST -->
        <div id="awp-playlist-list">

             <!-- audio playlist -->
             <ul id="playlist-audio1">
                
                <?php if( have_rows('playlist_repeater') ): ?>
                
                         <li class="awp-playlist-item" <?php if ($thumbstate=="enable"){?>data-thumb="<?php echo  $feat_image; ?>"<?php }?> data-type="audio" data-mp3="<?php echo $mayosis_audio;?>" data-title="<?php the_title();?>" data-peak-name="<?php the_title();?>"></li>  
                         
                        <?php while( have_rows('playlist_repeater') ): the_row(); 

                    		// vars
                    		$songtitle = get_sub_field('song_title');
                    		$coverimage = get_sub_field('song_cover_image');
                    		$coversongs = get_sub_field('cover_songs');
                    		
                    	
                    
                    		?>

                         <li class="awp-playlist-item" <?php if ($thumbstate=="enable"){?>data-thumb="<?php echo  $coverimage; ?>"<?php }?> data-type="audio" data-mp3="<?php echo $coversongs['url'];?>" data-title="<?php echo $songtitle;?>" data-peak-name="<?php echo $coversongs['filename']?>"></li>  

                        <?php endwhile; ?>
                
                
                <?php else :?>
                <li class="awp-playlist-item" <?php if ($thumbstate=="enable"){?>data-thumb="<?php echo  $feat_image; ?>"<?php }?> data-type="audio" data-mp3="<?php echo $mayosis_audio;?>" data-title="<?php the_title();?>" data-peak-name="<?php the_title();?>"></li>  
                <?php endif; ?>

             </ul>

        </div>     
		

<?php }