<?php

/**
 * BaseDmUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $username
 * @property string $email
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property string $forgot_password_code
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $DmLock
 * @property Doctrine_Collection $DmUserPermission
 * @property Doctrine_Collection $DmUserGroup
 * @property DmRememberKey $RememberKeys
 * @property Doctrine_Collection $Articlesou
 * 
 * @method string              getUsername()             Returns the current record's "username" value
 * @method string              getEmail()                Returns the current record's "email" value
 * @method string              getAlgorithm()            Returns the current record's "algorithm" value
 * @method string              getSalt()                 Returns the current record's "salt" value
 * @method string              getPassword()             Returns the current record's "password" value
 * @method boolean             getIsActive()             Returns the current record's "is_active" value
 * @method boolean             getIsSuperAdmin()         Returns the current record's "is_super_admin" value
 * @method timestamp           getLastLogin()            Returns the current record's "last_login" value
 * @method string              getForgotPasswordCode()   Returns the current record's "forgot_password_code" value
 * @method Doctrine_Collection getGroups()               Returns the current record's "Groups" collection
 * @method Doctrine_Collection getPermissions()          Returns the current record's "Permissions" collection
 * @method Doctrine_Collection getDmLock()               Returns the current record's "DmLock" collection
 * @method Doctrine_Collection getDmUserPermission()     Returns the current record's "DmUserPermission" collection
 * @method Doctrine_Collection getDmUserGroup()          Returns the current record's "DmUserGroup" collection
 * @method DmRememberKey       getRememberKeys()         Returns the current record's "RememberKeys" value
 * @method Doctrine_Collection getArticlesou()           Returns the current record's "Articlesou" collection
 * @method DmUser              setUsername()             Sets the current record's "username" value
 * @method DmUser              setEmail()                Sets the current record's "email" value
 * @method DmUser              setAlgorithm()            Sets the current record's "algorithm" value
 * @method DmUser              setSalt()                 Sets the current record's "salt" value
 * @method DmUser              setPassword()             Sets the current record's "password" value
 * @method DmUser              setIsActive()             Sets the current record's "is_active" value
 * @method DmUser              setIsSuperAdmin()         Sets the current record's "is_super_admin" value
 * @method DmUser              setLastLogin()            Sets the current record's "last_login" value
 * @method DmUser              setForgotPasswordCode()   Sets the current record's "forgot_password_code" value
 * @method DmUser              setGroups()               Sets the current record's "Groups" collection
 * @method DmUser              setPermissions()          Sets the current record's "Permissions" collection
 * @method DmUser              setDmLock()               Sets the current record's "DmLock" collection
 * @method DmUser              setDmUserPermission()     Sets the current record's "DmUserPermission" collection
 * @method DmUser              setDmUserGroup()          Sets the current record's "DmUserGroup" collection
 * @method DmUser              setRememberKeys()         Sets the current record's "RememberKeys" value
 * @method DmUser              setArticlesou()           Sets the current record's "Articlesou" collection
 * 
 * @package    Acme
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmUser extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_user');
        $this->hasColumn('username', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('algorithm', 'string', 128, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('forgot_password_code', 'string', 12, array(
             'type' => 'string',
             'unique' => true,
             'length' => 12,
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('DmGroup as Groups', array(
             'refClass' => 'DmUserGroup',
             'local' => 'dm_user_id',
             'foreign' => 'dm_group_id'));

        $this->hasMany('DmPermission as Permissions', array(
             'refClass' => 'DmUserPermission',
             'local' => 'dm_user_id',
             'foreign' => 'dm_permission_id'));

        $this->hasMany('DmLock', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('DmUserPermission', array(
             'local' => 'id',
             'foreign' => 'dm_user_id'));

        $this->hasMany('DmUserGroup', array(
             'local' => 'id',
             'foreign' => 'dm_user_id'));

        $this->hasOne('DmRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'dm_user_id'));

        $this->hasMany('Article as Articlesou', array(
             'local' => 'id',
             'foreign' => 'author'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}