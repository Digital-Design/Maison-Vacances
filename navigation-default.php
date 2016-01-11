<nav class="navbar navbar-light bg-faded navbar-fixed-top">
  <ul class="nav navbar-nav">
    <?php
    $menu = wp_get_nav_menu_items('Menu Nav');
    if(!empty($menu))
      foreach (wp_get_nav_menu_items('Menu Nav') as $key => $item) : ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $item->url ?>"><?php echo $item->title ?></a>
    </li>
  <?php endforeach;?>
</ul>
</nav>