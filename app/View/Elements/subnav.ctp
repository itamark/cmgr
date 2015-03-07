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
    <ul class="right">
  <li><a href="/" >Hot</a></li>
        <li><a href="/recent" >Recent</a></li>
        <li><a href="/top" >Top</a></li>
    </ul>





    <!-- Left Nav Section -->
<!--     <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul> -->
  </section>
</nav>
<?php } ?>