<div class="navbar-spacer"></div>
    <nav class="navbar">
      <div class="container">
      <div class="row">
        <div class="eight columns">
<ul class="navbar-list">
          <li class="navbar-item"><a class="navbar-link brand" href="/">CMGR</a></li>
          <?php if($this->params['controller'] == 'items'): ?>
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
        <?php endif; ?>
           <?php if (AuthComponent::user('has_meta')): ?>
                    <li class="navbar-item"><a class="navbar-link" href="/meta">Meta</a></li>
          <?php endif; ?>
                   <li class="navbar-item"><a class="navbar-link" href="/must-read">Must Read</a></li>
<?php if(AuthComponent::user('role') == 'admin'): ?>
  <li class="navbar-item">
            <a class="navbar-link" href="#" data-popover="#adminPop">Admin</a>
            <div id="adminPop" class="popover">
              <ul class="popover-list">
                <li class="popover-item">
                 <a href="/itemsAdmin/index" class="popover-link">Posts</a>
          
                </li>
                <li class="popover-item">
                  <a href="/usersAdmin/index" class="popover-link">Users</a>
                </li>
                
              </ul>
            </div>
          </li>
        <?php endif; ?>

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
                  <a class="popover-link" href="/users/view/<?php echo AuthComponent::user('username'); ?>">Profile</a>
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