<?php
/*============================================
                SHORTCODES
 ============================================*/

//------------------------- PRIMARY FUNCTIONS
function colleft($atts, $content = null){
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    return '<div class="left col-6-entry">'.$content.'</div><div class="left divide-entry">&nbsp;</div>';
}

function colright($atts, $content = null){
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    return '<div class="left col-6-entry">'.$content.'</div>';
}

function colhr(){
    return '<br clear="all" /><hr />';
}

function panel($atts, $content = null){
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    return '<div class="panel">'.$content.'</div>';
}

function download_icon(){
    return '<span class="fa fa-download green"></span>&nbsp;';
}

function staff($atts, $content = null){
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    return '<div style="text-align:center;" class="staff-holder left">'.$content.'</div>';
}

function isa_gallery() {                                                                        
    global $nggdb;
    $nextg = new $nggdb;
    $i = 1; 
    
    foreach($nextg->find_all_galleries('gid', 'DESC') as $gallery) : ?>

        <?php if($i % 2 == 0) echo '<div class="left divide-entry">&nbsp;</div>'; ?>

        <?php 
        
        $images = $nextg->get_gallery($gallery->gid);

        $last_updated = 0;

        foreach($images as $image) {
            if($gallery->previewpic === $image->pid) {
                $preview_pic_url = content_url('gallery/' . $image->slug . $image->thumbFolder . $image->meta_data['thumbnail']['filename']);
                $preview_pic_alttext = $image->alttext;
            }

            if($last_updated < $image->updated_at) {
                    $last_updated = $image->updated_at;
            }

            ?>
            <a class="fancybox <?php echo "fancygroup$i"; ?>" data-fancybox-group="<?php echo "gallery$i"; ?>" title="<?php echo $image->alttext; ?>" href="<?php echo $image->imageURL; ?>"></a>
            <?php
        }

        ?>

        <div class="left col-6-entry">
            <div class="gallery-thumb-holder pointer">
                <img data-gallery="<?php echo $i; ?>" class="response pointer" alt="<?php echo $preview_pic_alttext; ?>" src="<?php echo $preview_pic_url; ?>" />
                <div data-gallery="<?php echo $i; ?>" class="gallery-view-opt pointer clearfix">
                    <span class="gallery-view-count right"><?php echo count($images); ?></span>
                    <div class="fa fa-search right"></div>
                </div>
            </div>
            <h3><?php echo $gallery->title; ?></h3>
            <p class="byline vcard">
                <?php
                    printf( __( 'Updated on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), date(get_option('date_format'), $last_updated), date(get_option('date_format'), $last_updated) );
                ?>
            </p>
        </div>

        <?php if($i % 2 == 0) echo '<br clear="all" /><hr />'; ?>

    <?php $i++; endforeach;
}

function isa_single_gallery( $atts ) {
    $args = shortcode_atts( array(
        'id' => 'something'
    ), $atts );

    global $nggdb;
    $nextg = new $nggdb;
    
    if($gallery = $nextg->find_gallery($args['id'])){
        $images = $nextg->get_gallery($args['id']);
      
        $unique_id = md5(rand(0,99));

        foreach($images as $image) {
            if($gallery->previewpic === $image->pid) {
                $preview_pic_url = content_url('gallery/' . $image->slug . $image->thumbFolder . $image->meta_data['thumbnail']['filename']);
                $preview_pic_alttext = $image->alttext;
            }
            
            $output .= '<a class="fancybox fancygroup'.$unique_id.'" data-fancybox-group="gallery'.$unique_id.'" title="'.$image->alttext.'" href="'.$image->imageURL.'"></a>';
        }

        $output .= '        
            <div class="left">
                <div class="gallery-thumb-holder pointer">
                    <img data-gallery="'.$unique_id.'" class="response pointerjk" alt="'.$preview_pic_alttext.'" src="'.$preview_pic_url.'" />
                    <div data-gallery="'.$unique_id.'" class="gallery-view-opt pointer clearfix">
                        <span class="gallery-view-count right">'.count($images).'</span>
                        <div class="fa fa-search right"></div>
                    </div>
                </div>
            </div>
        ';

        return $output;
    }
}


//------------------------- HOOKS
add_shortcode('colleft', 'colleft');
add_shortcode('colright', 'colright');
add_shortcode('colhr', 'colhr');
add_shortcode('panel', 'panel');
add_shortcode('staff', 'staff');
add_shortcode('download_icon', 'download_icon');
add_shortcode('isa_gallery', 'isa_gallery');
add_shortcode('isa_single_gallery', 'isa_single_gallery');

?>
