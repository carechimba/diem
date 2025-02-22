<?php

/**
 * BaseDmUserGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $dm_user_id
 * @property integer $dm_group_id
 * @property DmUser $User
 * @property DmGroup $Group
 * 
 * @method integer     getDmUserId()    Returns the current record's "dm_user_id" value
 * @method integer     getDmGroupId()   Returns the current record's "dm_group_id" value
 * @method DmUser      getUser()        Returns the current record's "User" value
 * @method DmGroup     getGroup()       Returns the current record's "Group" value
 * @method DmUserGroup setDmUserId()    Sets the current record's "dm_user_id" value
 * @method DmUserGroup setDmGroupId()   Sets the current record's "dm_group_id" value
 * @method DmUserGroup setUser()        Sets the current record's "User" value
 * @method DmUserGroup setGroup()       Sets the current record's "Group" value
 * 
 * @package    Acme
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmUserGroup extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_user_group');
        $this->hasColumn('dm_user_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('dm_group_id', 'integer', null, array(
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
        $this->hasOne('DmUser as User', array(
             'local' => 'dm_user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('DmGroup as Group', array(
             'local' => 'dm_group_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}