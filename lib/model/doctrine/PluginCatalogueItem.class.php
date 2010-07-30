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
  /**
   * Moves item into category
   * @param  int $categoryId Category where item to be moved
   * @return bool
   */
  public function moveTo($categoryId)
  {
    $category = Doctrine::getTable('CatalogueCategory')->findOneById($categoryId);
    if (!$category)
    {
      return false;
    }

    if ($categoryId == $this['category_id'])
    {
      return false;
    }

    if (!sfConfig::get('app_catalogue_add_to_category_with_subcategories', false) && $category['rgt'] != $category['lft'] + 1)
    {
      return false;
    }

    $this->setCatalogueCategory($category);
    $this->save();

    return true;
  }
}