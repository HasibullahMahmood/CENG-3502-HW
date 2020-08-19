<?php  

if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p style="color: red; font-style: italic; margin: 0px 0px 10px 0px; font-size: 14px"><?php echo "*".$error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>