<div class="navbar-spacer"></div>
    <nav class="navbar">
      <div class="container">
      <div class="row">
        <div class="eight columns">
<ul class="navbar-list">
          <li class="navbar-item"><a class="navbar-link brand" href="/">CMGR</a></li>
          <li class="navbar-item">
            <a class="navbar-link" href="#" data-popover="#codeNavPopover">Sort</a>
            <div id="codeNavPopover" class="popover">
              <ul class="popover-list">
                <li class="popover-item">
                 <?php echo $this->Paginator->sort('score', 'Trending', array('direction' => 'desc', 'class'=> 'popover-link')); ?>
                </li>
                <li class="popover-item">
                  <?php echo $this->Paginator->sort('created', 'Latest', array('direction' => 'desc', 'class'=> 'popover-link')); ?>
                </li>
                
              </ul>
            </div>
          </li>
           <?php if (AuthComponent::user('has_meta')): ?>
                    <li class="navbar-item"><a class="navbar-link" href="/meta">Meta</a></li>
          <?php endif; ?>
                   <li class="navbar-item"><a class="navbar-link" href="/must-read">Must Read</a></li>


        </ul>
        </div>
        <div class="four columns">
        <ul class="navbar-list  u-pull-right">
        <?php if (!AuthComponent::user('id')): ?>
          <li class="navbar-item"><a class="navbar-link needslogin" href="#">Login</a></li>
        <?php else: ?>

<li class="navbar-item">
            <a class="navbar-link" href="#" data-popover="#userPopover">                  
 <?php echo AuthComponent::user('first_name'); ?></a>
            <div id="userPopover" class="popover">
              <ul class="popover-list">
                <li class="popover-item">
                  <a class="popover-link" href="/users/view/<?php echo AuthComponent::user('id'); ?>">Profile</a>
                </li>
                <li class="popover-item">
                  <a class="popover-link" href="/logout">Logout</a>
                </li>
                
              </ul>
            </div>
          </li>





        <?php endif; ?>
                 

        </ul>

        </div>
      </div>
        
      </div>
    </nav>
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