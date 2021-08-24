<?php 
// No direct access
defined('_JEXEC') or die; ?>

<?php 
$url = $params['url'];
$urlthumb = $params['url-thumb'];
$columns = $params['columns'];
$modal = $params['modal'];
$class = $params['class'];
$class1 = '.' . $class; 
?> 

<?php
$dir = 'images/'.$url;
$dirthumb = 'images/'.$urlthumb;

$files1 = scandir($dir);
$filesthumb = scandir($dirthumb);

if ($modal == 1) {
	?>
	<script type="text/javascript">
		jQuery(function($) {
		"use strict";
		
		const <?=$class?> = document.querySelector("<?=$class1?>");
		if (<?=$class?>) {
			<?=$class?>.setAttribute('uk-toggle', '#<?=$class?>');
		}
		else console.log ('Класс в модуле галереи не совпадает с классом ссылки');
		});
	</script>

	<div id="<?=$class?>" class = 'uk-modal-container' uk-modal>
	    <div class="uk-modal-dialog uk-modal-body gallery-block">
	        <button class="uk-modal-close-default" type="button" uk-close></button>
	        <h2 class="uk-modal-title">Галерея</h2>
	        <hr>
<?php
}
?>

<div class="uk-grid-column-small uk-child-width-1-2 uk-child-width-1-<?=$columns?>@s uk-text-center uk-grid" uk-lightbox="animation: slide">
<?php
foreach ($files1 as $key => $value) {
    if (stripos(strtolower($value), 'jpg') !== false || strpos(strtolower($value), 'png') !== false) {
    	$item = $dir.'/'.$value;
    	$itemthumb = $dirthumb.'/'.$filesthumb[$key];
    	?> 
  
			<div class = 'uk-margin-small-bottom'>
			<?php
          		if ($urlthumb) {
          	?>
              <div class="uk-height-small uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src=<?php echo $itemthumb ?> uk-img uk-lightbox="animation: slide">
            <?php
          		}
          		else {
          			?>
          				<div class="uk-height-small uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src=<?php echo $item ?> uk-img uk-lightbox="animation: slide">
          			<?php
          		}
          	?>
                <a class="uk-inline" href=<?php echo $item ?> data-caption=<?php echo $key - 2 ?> style = 'width: 100%; height: 100%'></a>        
                
              </div>
            </div>
    	<?php
    }
}
?>
</div>
<?php
if ($modal == 1) {
	?>
		</div>
	</div>
	 <?php
}
?>
