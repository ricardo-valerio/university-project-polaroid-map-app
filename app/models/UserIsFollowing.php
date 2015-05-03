<?php

class UserIsFollowing extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_user_who_follows;

    /**
     *
     * @var integer
     */
    public $id_user_who_is_followed;

    public function initialize()
    {
        $this->belongsTo('id_user_who_follows', 'Users', 'id', array('alias' => 'Users'));
        $this->belongsTo('id_user_who_is_followed', 'Users', 'id', array('alias' => 'Users'));
        $this->belongsTo('id_user_who_follows', 'Users', 'id', NULL);
        $this->belongsTo('id_user_who_is_followed', 'Users', 'id', NULL);
    }

}
