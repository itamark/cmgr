<?php if(!Configure::read('Application.maintenance')){?>
<nav class="top-bar" data-topbar role="navigation"  data-options="sticky_on: large">
  

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="left">
<!--       <li class="active"><a href="#">Right Button Active</a></li>
 -->     
  <li class="has-dropdown">
        <a href="/">Filter</a>
        <ul class="dropdown">
          <li><a href="/questions">Questions</a></li>
          <li><a href="/articles">Articles</a></li>
<!--           <li class="active"><a href="#">Active link in dropdown</a></li>
 -->        </ul>
      </li>

      

    </ul>
    <?php if($this->params['controller'] == 'items' && $this->params['action'] == 'index'): ?>
    <ul class="left">
        <li><?php echo $this->Paginator->sort('Item.upvotes', 'Top', array('class' => '')); ?></li>
         <li><?php echo $this->Paginator->sort('score', 'Hot', array('class' => '')); ?></li>
         <li><?php echo $this->Paginator->sort('created', 'Recent', array('class' => '')); ?></li>
    </ul>
  <?php endif; ?>





    <!-- Left Nav Section -->
<!--     <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul> -->
  </section>
</nav>
<?php } ?>