
  <li class="team-item">
    
    <div class="team-item-container">

      <div class="team-item__image">
        <img src="<?php echo CFS()->get('image'); ?>" alt="">

        <div class="team-overlay">

        </div>
        <div class="icon-container">
          <i class="icon icon-plus"></i>
        </div>

      </div>

      <div class="team-item__text">

        <div class="team-text-wrap">
          <h4><?php echo CFS()->get('name'); ?></h4>
          <p class="team-position"><?php echo CFS()->get('position'); ?></p>
        </div>

      </div>
    </div>

    <div class="team-popup container-popup">
      <div class="container-icon-close"><i class="icon icon-x"></i></div>
      <h4><?php echo CFS()->get('name'); ?></h4>
      <p class="team-popup-position"><?php echo CFS()->get('position'); ?></p>
      <p class="team-popup-text"><?php echo CFS()->get('about_person'); ?></p>

    </div>
    
  </li>