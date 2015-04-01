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
    public $name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $active;


	public function validation()
    {

        $this->validate(new Email(array(
                'field'    => 'email',
                'required' => true
	    )));

        if ($this->validationHasFailed() == true) {
            return false;
        }

	    return;
    }


	public function columnMap()
    {
        return array(
            'id'         => 'id',
            'username'   => 'username',
            'password'   => 'password',
            'name'       => 'name',
            'email'      => 'email',
            'created_at' => 'created_at', 
            'active'     => 'active'
        );
    }
}
