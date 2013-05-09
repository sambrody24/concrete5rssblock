<?php  defined('C5_EXECUTE') or die("Access Denied."); 
 
 
 
 
?>
 
 
<div id="rssSummaryList<?php echo intval($bID)?>" class="rssSummaryList">
 
<?php  if( strlen($title)>0 ){ ?>
   <div class="rssSummaryListTitle" style="margin-bottom:8px"><?php echo $title?></div>
<?php  } ?>
 
<?php  
$rssObj=$controller;
$textHelper = Loader::helper("text"); 
 
 
if (!$dateFormat) {
   $dateFormat = t('F jS');
}
 
 
 
 
 
if( strlen($errorMsg)>0 ){
   echo $errorMsg;
}else{
 
   foreach($posts as $itemNumber=>$item) { 
 
      if( intval($itemNumber) >= intval($rssObj->itemsToDisplay) ) break;
      ?>
 
      <div class="rssItem">
 
           <div class="rssItemThumbnail">
         <?php 
 
            if (!function_exists('get_first_image_url')) {
            function get_first_image_url($html) {
                      {
                      if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
                      return $matches[1];
                      }
                         else echo '';
                      }
 
            }
 
               
         }
          echo '<img src="' .get_first_image_url($item->get_content()). '" style="float:left; margin-right:5px;" />';
            ?>
            </div>
 
 
         <div class="rssItemTitle">
 
            <a href="<?php echo  $item->get_permalink(); ?>" <?php  if($rssObj->launchInNewWindow) echo 'target="_blank"' ?> >
               <strong><?php echo  $item->get_title(); ?></strong>
            </a>
         </div>
         <div class="rssItemDate"><em><?php echo  $item->get_date($dateFormat); ?></em></div>
 
 
 
 
 
         <div class="rssItemSummary">
 
            <?php 
               if( $rssObj->showSummary ){
               echo $textHelper->shortText( strip_tags($item->get_description()), 170 );
               echo " <a href='" . $item->get_permalink() . '<br /> ' ;
               echo "' title='" . $item->get_title() . "' class='btn btn-medium' style='clear: both; display: table; margin-top: 25px;'>Read More</a><br /><br />";
               }
 
 
            ?>
 
         </div>
      </div>
 
<?php   }  
}
?>
</div>