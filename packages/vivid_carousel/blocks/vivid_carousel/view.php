<?php 
defined('C5_EXECUTE') or die(_("Access Denied.")); 
$ih = Core::make('helper/image');  
$nh = Core::make('helper/navigation'); 
$c = Page::getCurrentPage(); 
?>
<div class="vivid-carousel" id="vivid-carousel-<?php echo $bID?>">
    <div class="carousel-header-wrap clearfix">
        <h2><?php echo $carouselTitle?></h2>
        <span class="carousel-nav-button next"></span>
        <span class="carousel-nav-button prev"></span>
    </div>
    <?php  if($c->isEditMode()){?>
    <div class="well"><?php echo t('Carousel Items hidden during edit mode')?></div>
    <?php  } else {?>
    <ul class="carousel-item-container" data-small-visible="<?php echo $itemsmobile?>" data-medium-visible="<?php echo $itemstablet?>" data-large-visible="<?php echo $itemsdesktop?>" data-offset="0">
        <div class="carousel-overflow-wrap">
            <?php  
            foreach($items as $item){ 
                $imgObj = File::getByID($item['fID']); 
                $page = Page::getByID($item['pageID']);
            ?>
            <li class="carousel-item">
                <div class="item-inner">
                    <?php  if (is_object($imgObj)){?>
                        <img src="<?php echo $ih->getThumbnail($imgObj,$thumbwidth,$thumbheight,true)->src?>">
                    <?php  } ?>
                    <h3><?php echo $item['title']?></h3>
                    <?php echo $item['carcontent']?>
                    <?php  if($item['btntext'] && is_object($page)){?>
                        <a href="<?php echo $nh->getLinkToCollection($page)?>" class="carousel-button"><?php echo $item['btntext']?></a>
                    <?php  } ?>
                </div>
            </li>
        <?php  
        }//foreach ?>
        </div>
    </ul>
    <?php  } ?>
</div>