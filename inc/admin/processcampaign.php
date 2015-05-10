<?php $this->adminHeader(); ?>
<p>Campaign "<?php echo attribute_escape($campaign->title) ?>"</p>
<div class="campaign_process">
  <?php if($nextfeed): ?>
  <p class="status">Processing ?></p>
  <?php else: ?>
  <p class="status">Finished!</p>
  <?php endif; ?>
  <div class="progressbar"><p style="width: "><?php echo $completed ?> out of <?php echo $total ?> feeds completed.</p><span class="percentage"><?php echo $percentage ?>%</span></div>
</div>
<?php $this->adminFooter(); ?>