<?php

class RouteHasComments extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $comment;

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

    /**
     *
     * @var integer
     */
    public $comment_number_of_likes;
    public function initialize()
    {
        $this->belongsTo('id_route', 'Routes', 'id', array('alias' => 'Routes'));
        $this->belongsTo('id_user', 'Users', 'id', array('alias' => 'Users'));
        $this->belongsTo('id_route', 'Routes', 'id', NULL);
        $this->belongsTo('id_user', 'Users', 'id', NULL);
    }

}
