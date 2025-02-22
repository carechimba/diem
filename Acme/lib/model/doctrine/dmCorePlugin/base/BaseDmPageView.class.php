<?php

/**
 * BaseDmPageView
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $module
 * @property string $action
 * @property integer $dm_layout_id
 * @property DmLayout $Layout
 * @property Doctrine_Collection $Areas
 * 
 * @method string              getModule()       Returns the current record's "module" value
 * @method string              getAction()       Returns the current record's "action" value
 * @method integer             getDmLayoutId()   Returns the current record's "dm_layout_id" value
 * @method DmLayout            getLayout()       Returns the current record's "Layout" value
 * @method Doctrine_Collection getAreas()        Returns the current record's "Areas" collection
 * @method DmPageView          setModule()       Sets the current record's "module" value
 * @method DmPageView          setAction()       Sets the current record's "action" value
 * @method DmPageView          setDmLayoutId()   Sets the current record's "dm_layout_id" value
 * @method DmPageView          setLayout()       Sets the current record's "Layout" value
 * @method DmPageView          setAreas()        Sets the current record's "Areas" collection
 * 
 * @package    Acme
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmPageView extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_page_view');
        $this->hasColumn('module', 'string', 127, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 127,
             ));
        $this->hasColumn('action', 'string', 127, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 127,
             ));
        $this->hasColumn('dm_layout_id', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('dmPageViewModuleAction', array(
             'fields' => 
             array(
              0 => 'module',
              1 => 'action',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('DmLayout as Layout', array(
             'local' => 'dm_layout_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasMany('DmArea as Areas', array(
             'local' => 'id',
             'foreign' => 'dm_page_view_id'));
    }
}