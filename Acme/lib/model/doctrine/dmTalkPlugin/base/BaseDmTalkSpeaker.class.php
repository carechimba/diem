<?php

/**
 * BaseDmTalkSpeaker
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $room_id
 * @property string $code
 * @property string $name
 * @property integer $last_ping
 * @property DmTalkRoom $Room
 * @property Doctrine_Collection $PrivateMessages
 * 
 * @method integer             getRoomId()          Returns the current record's "room_id" value
 * @method string              getCode()            Returns the current record's "code" value
 * @method string              getName()            Returns the current record's "name" value
 * @method integer             getLastPing()        Returns the current record's "last_ping" value
 * @method DmTalkRoom          getRoom()            Returns the current record's "Room" value
 * @method Doctrine_Collection getPrivateMessages() Returns the current record's "PrivateMessages" collection
 * @method DmTalkSpeaker       setRoomId()          Sets the current record's "room_id" value
 * @method DmTalkSpeaker       setCode()            Sets the current record's "code" value
 * @method DmTalkSpeaker       setName()            Sets the current record's "name" value
 * @method DmTalkSpeaker       setLastPing()        Sets the current record's "last_ping" value
 * @method DmTalkSpeaker       setRoom()            Sets the current record's "Room" value
 * @method DmTalkSpeaker       setPrivateMessages() Sets the current record's "PrivateMessages" collection
 * 
 * @package    Acme
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmTalkSpeaker extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_talk_speaker');
        $this->hasColumn('room_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('code', 'string', 8, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 32,
             ));
        $this->hasColumn('last_ping', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));


        $this->index('room_name_unique', array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'room_id',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('DmTalkRoom as Room', array(
             'local' => 'room_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('DmTalkMessage as PrivateMessages', array(
             'local' => 'id',
             'foreign' => 'to_speaker_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'updated' => 
             array(
              'disabled' => true,
             ),
             ));
        $this->actAs($timestampable0);
    }
}