<?php if(!Configure::read('Application.maintenance')){?>
<nav class="top-bar" data-topbar role="navigation"  data-options="sticky_on: large">
  <ul class="title-area">
    <li class="name">
      <h1><a href="/">CMGR</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
<!--       <li class="active"><a href="#">Right Button Active</a></li>
 -->     
<?php if (AuthComponent::user('id')): ?>
	<?php if (AuthComponent::user('role') == 'admin'): ?>
	<li class="has-dropdown">
        <a href="#">Admin</a>
        <ul class="dropdown">
          <li><a href="/itemsAdmin/index">Posts</a></li>
          <li><a href="/usersAdmin/index">Users</a></li>

<!--           <li class="active"><a href="#">Active link in dropdown</a></li>
 -->        </ul>
      </li>
            <?php endif; ?>

  <li class="has-dropdown">
        <a href="#">User</a>
        <ul class="dropdown">
          <li><a href="/logout">Logout</a></li>
<!--           <li class="active"><a href="#">Active link in dropdown</a></li>
 -->        </ul>
      </li>
      <?php else: ?>
        <li><a href="#" data-reveal-id="myModal">Login</a></li>
      <?php endif; ?>
    </ul>

    <!-- Left Nav Section -->
<!--     <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul> -->
  </section>
</nav>
<?php } ?>