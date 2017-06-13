<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div><lable class="screen-reader-text" for="s"><?php echo esc_attr_x('Search for: ', 'lable', 'frindle'); ?></lable>
    <input type="text" placeholder="<?php echo esc_attr_x('Search &hellip;','placeholder', 'frindle'); ?>" value="<?php the_search_query(); ?>" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x('Search', 'submit button', 'frindle'); ?>" />
  </div>
</form>


