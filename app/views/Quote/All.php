 <?php foreach ( $data as $quote ):?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">#<?php echo $quote->id; ?></h3>
  </div>
  <div class="panel-body">
  	<?php echo preg_replace('/(?:\r\n|[\r\n]){2,}/', "\n\n", $quote->quote); ?>
  </div>
</div>
  <?php endforeach; ?>