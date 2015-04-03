<?php

class Countries extends \Phalcon\Mvc\Model
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
    public $country;

    /**
     *
     * @var string
     */
    public $image_file_name;
    public function initialize()
    {
        $this->hasMany('id', 'Users', 'id_country', array('alias' => 'Users'));
        $this->hasMany('id', 'Users', 'id_country', NULL);
    }

}
