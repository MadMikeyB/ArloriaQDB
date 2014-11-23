<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">#<?php echo $data->id; ?> <a href="quote/<?php echo $data->id ?>"><small>[permalink]</small></a> </h3>
  </div>
  <div class="panel-body">
  	<?php echo preg_replace('/(?:\r\n|[\r\n]){2,}/', "\n\n", $data->quote); ?>
  </div>
</div>
