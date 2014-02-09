<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/log.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#ok').submit();" class="button"><span><?php if($success) {echo $button_close;} else {echo $button_ok;} ?></span></a></div>
    </div>
    <div class="content">
	   <form action="<?php if($success) {echo $close;} else {echo $ok;} ?>" method="post" enctype="multipart/form-data" id="ok">
	  <?php echo $content; ?>
	   </form> 
    </div>
  </div>
</div>
<?php echo $footer; ?>