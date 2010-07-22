<?php

/**
 * PluginCatalogueItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginCatalogueItem extends BaseCatalogueItem
{
  public function moveTo($categoryId){
    $category = Doctrine::getTable('CatalogueCategory')->findOneById($categoryId);
    if (!$category){
      return false;
    }

    if ($categoryId == $this['category_id']){
      return false;
    }

    $this->setCatalogueCategory($category);
    $this->save();

    return true;
  }
}