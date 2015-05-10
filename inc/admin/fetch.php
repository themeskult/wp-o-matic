<?php if(! defined('DOING_AJAX')) $this->adminHeader(); ?>
<ul class="campaigns_fetch">
<?php foreach($campaigns as $i => $campaign): ?>
  <li id="campaign_process-<?php echo $campaign->id ?>">
    <p>Campaign "<?php echo attribute_escape($campaign->title) ?>". <?php echo count($this->getFeedsForCampaing($campaign->id)) ?> feeds.</p>
    <p><a href="<?php // link to s=processcampaign ?>" class="start_process">Click here to start processing manually</a></p>
  </li>
<?php endforeach ?>
</ul>
<?php if(! defined('DOING_AJAX')) $this->adminFooter(); ?>