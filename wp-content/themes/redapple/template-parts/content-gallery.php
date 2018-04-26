<?php
$categories = get_the_terms($post->ID, 'album');
$album = '';
if( $categories ){
  $category = array_shift( $categories );

  $album = $category->name;
}
 ?>


  <div class="gallery-item <?php echo $album; ?>">
    
    <div class="gallery-item-container">
      <a href="<?php echo CFS()->get('image'); ?>" class="html5lightbox" data-group="mygroup" data-thumbnail="">
      
      <img src="<?php echo CFS()->get('image'); ?>" alt="">
      
      <div class="gallery-overlay">
        <div class="gallery-icon-container">
          <i class="icon icon-vec"></i>
        </div>
      </div>

      </a>

    </div>


    

  </div>