<?php

class UserLikesRoute extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var integer
     */
    public $id_route;
    public function initialize()
    {
        $this->belongsTo('id_route', 'Routes', 'id', array('alias' => 'Routes'));
        $this->belongsTo('id_user', 'Users', 'id', array('alias' => 'Users'));
        $this->belongsTo('id_route', 'Routes', 'id', NULL);
        $this->belongsTo('id_user', 'Users', 'id', NULL);
    }

}
