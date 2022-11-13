<?php
/**
 * @var \App\View\AppView $this
 */
?>
    <!--<div class="logoAndProfile">
        <?= $this->Html->image('pos_image.jpg',array("class"=>"image")) ?>
        <a href="/pos/users/view/2">User name</a>
    </div>
    
    <div class="search">
        <?= $this->Form->input("searchQuery")?>
    </div>

    <div class="notificationAndProfile">
        <?= $this->Html->image('pos_image.jpg',array("class"=>"image")) ?>
        <a href="/users/logout">Logout</a>
</div>-->

<header class="py-3 mb-3 border-bottom header">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle" id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink">
          <li><a class="dropdown-item active" href="/pos" aria-current="page">Overview</a></li>
          <li><a class="dropdown-item" href="/pos/products">Products</a></li>
          <li><a class="dropdown-item" href="/pos/services">Services</a></li>
          <li><a class="dropdown-item" href="/pos/users">Users</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="/pos/reports">Reports</a></li>
          <li><a class="dropdown-item" href="/pos/inventory">Inventory</a></li>
        </ul>
      </div>

      <div class="d-flex align-items-center">
        <form class="w-100 me-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="/pos/users/view/2">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/pos/users/logout">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>