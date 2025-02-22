<?php

/**
 * BaseDmGroupPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $dm_group_id
 * @property integer $dm_permission_id
 * @property DmGroup $Group
 * @property DmPermission $Permission
 * 
 * @method integer           getDmGroupId()        Returns the current record's "dm_group_id" value
 * @method integer           getDmPermissionId()   Returns the current record's "dm_permission_id" value
 * @method DmGroup           getGroup()            Returns the current record's "Group" value
 * @method DmPermission      getPermission()       Returns the current record's "Permission" value
 * @method DmGroupPermission setDmGroupId()        Sets the current record's "dm_group_id" value
 * @method DmGroupPermission setDmPermissionId()   Sets the current record's "dm_permission_id" value
 * @method DmGroupPermission setGroup()            Sets the current record's "Group" value
 * @method DmGroupPermission setPermission()       Sets the current record's "Permission" value
 * 
 * @package    Acme
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmGroupPermission extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_group_permission');
        $this->hasColumn('dm_group_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('dm_permission_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('DmGroup as Group', array(
             'local' => 'dm_group_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('DmPermission as Permission', array(
             'local' => 'dm_permission_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}