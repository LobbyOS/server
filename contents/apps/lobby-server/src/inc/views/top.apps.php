<h1><a href="<?php echo APP_URL;?>/apps">Lobby Store</a></h1>
<div class="nav">
  <div class="nav-item">
    <a href="<?php echo L_URL;?>/apps" class="button">Featured</a>
  </div>
  <div class="nav-item">
    <a href="<?php echo L_URL;?>/apps?browse=popular" class="button red">Popular</a>
  </div>
  <div class="nav-item">
    <a href="<?php echo L_URL;?>/apps?browse=new" class="button green">New</a>
  </div>
  <div class="nav-item" id="search">
    <form action="<?php echo APP_URL . "/apps";?>">
     <input name="q" placeholder="Search..." value="<?php echo isset($q) ? $q : "";?>" />
    </form>
  </div>
</div>
