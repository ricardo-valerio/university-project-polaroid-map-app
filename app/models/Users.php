<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Users extends \Phalcon\Mvc\Model
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
    public $username;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $full_name;

    /**
     *
     * @var string
     */
    public $country;

    /**
     *
     * @var string
     */
    public $facebook_username;

    /**
     *
     * @var string
     */
    public $twitter_username;

    /**
     *
     * @var string
     */
    public $google_plus_username;

    /**
     *
     * @var string
     */
    public $datetime_created;

    /**
     *
     * @var string
     */
    public $datetime_last_login;

    /**
     *
     * @var string
     */
    public $online;
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
    public function initialize()
    {
        $this->hasMany('id', 'Polaroid_comments', 'id_user', array('alias' => 'Polaroid_comments'));
        $this->hasMany('id', 'Polaroids', 'id_user', array('alias' => 'Polaroids'));
        $this->hasMany('id', 'Route_comments', 'id_user', array('alias' => 'Route_comments'));
        $this->belongsTo('id_country', 'Countries', 'id', array('alias' => 'Countries'));
        $this->hasMany('id', 'PolaroidComments', 'id_user', NULL);
        $this->hasMany('id', 'Polaroids', 'id_user', NULL);
        $this->hasMany('id', 'RouteComments', 'id_user', NULL);
        $this->belongsTo('id_country', 'Countries', 'id', NULL);
    }

}
