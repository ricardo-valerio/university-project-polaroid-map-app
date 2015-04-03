<?php

class Routes extends \Phalcon\Mvc\Model
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
    public $title;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $datetime_created;

    /**
     *
     * @var string
     */
    public $datetime_updated;

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var integer
     */
    public $number_of_likes;
    public function initialize()
    {
        $this->hasMany('id', 'Route_comments', 'id_route', array('alias' => 'Route_comments'));
        $this->hasMany('id', 'Route_has_polaroid', 'id_route', array('alias' => 'Route_has_polaroid'));
        $this->hasMany('id', 'RouteComments', 'id_route', NULL);
        $this->hasMany('id', 'RouteHasPolaroid', 'id_route', NULL);
    }

}
