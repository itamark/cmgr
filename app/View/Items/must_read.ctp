<!--  <pre>
  <?php print_r(AuthComponent::user()); ?>
</pre>   -->
<!-- Begin MailChimp Signup Form -->
<div class="row">
  <div class="large-12 columns">



    <?php echo $this->Session->flash(); ?>
    


   
</div>
</div>

      
    <?php //echo $this->Paginator->sort('created', 'Recent'); ?>
    <?php foreach ($items as $item): ?>
      <?php echo $this->element('post', array(
    "item" => $item
)) ?>



    <?php endforeach; ?>
    <?php echo $this->Paginator->numbers(); ?>