<?php

class Polaroids extends \Phalcon\Mvc\Model
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
    public $lat_lon_id;

    /**
     *
     * @var string
     */
    public $lat;

    /**
     *
     * @var string
     */
    public $lon;

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
    public $photo_hash_file_name;

    /**
     *
     * @var integer
     */
    public $number_of_likes;

    /**
     *
     * @var string
     */
    public $country;

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
    public function initialize()
    {
        $this->hasMany('id', 'Polaroid_comments', 'id_polaroid', array('alias' => 'Polaroid_comments'));
        $this->hasMany('id', 'Route_has_polaroid', 'id_polaroid', array('alias' => 'Route_has_polaroid'));
        $this->belongsTo('id_user', 'Users', 'id', array('alias' => 'Users'));
        $this->hasMany('id', 'PolaroidComments', 'id_polaroid', NULL);
        $this->hasMany('id', 'RouteHasPolaroid', 'id_polaroid', NULL);
        $this->belongsTo('id_user', 'Users', 'id', NULL);
    }

}
