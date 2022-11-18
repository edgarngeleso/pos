<?php
/**
 * @var \App\View\AppView $this
 */
?>

<header class="header">
  <div class="logoAndProfile" >
    <a href="/">
      <?= $this->Html->image("pos_image.jpg",array("class"=>"rounded-circle","width"=>32,"height"=>32))?>
    </a>
    
    <a href="/users/view/<?=$user->userID?>"><?=$user->userName?></a>
  </div>

  <div class="search">
    <?php
      //echo $this->Form->create();
      //echo $this->Form->input("searchQuery");

      //echo $this->Form->end();
    ?>
      <form action="/search">
        <input type="text" name="searchQuery" placeholder="search...">
        <button>
          <?= $this->Html->image("assets/search.png")?>
        </button>
        
      </form>
  </div>

  <div class="header-right">
    <a href="/notifications">
      <?= $this->Html->image("assets/notification.png",array("class"=>"rounded-circle","width"=>32,"height"=>32))?>
    </a>

    <div class="flex-shrink-0 dropdown"> 

      <a href="/users/view/2" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $this->Html->image("assets/profile.png",array("class"=>"rounded-circle","width"=>32,"height"=>32,"object-fit"=>"contain"))?>
      </a>

      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
        <li><a class="dropdown-item" href="/users/view/<?=$user->userID?>">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/users/logout">Sign out</a></li>
      </ul>
    </div>

    
  </div>

  <div class="menu" style="display:none;">
    Hamburger for small screen
  </div>
</header>


  