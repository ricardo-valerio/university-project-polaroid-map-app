<?php

class PolaroidHasComments extends \Phalcon\Mvc\Model
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
    public $id_polaroid;

    /**
     *
     * @var integer
     */
    public $comment_number_of_likes;

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


    public function initialize()
    {
        $this->belongsTo('id_polaroid', 'Polaroids', 'id', array('alias' => 'Polaroids'));
        $this->belongsTo('id_user', 'Users', 'id', array('alias' => 'Users'));
        $this->belongsTo('id_polaroid', 'Polaroids', 'id', NULL);
        $this->belongsTo('id_user', 'Users', 'id', NULL);
    }

	public function beforeCreate()
	{
		$this->comment_number_of_likes = 0;
		$this->datetime_created        = date('Y-m-d H:i:s');
		$this->datetime_updated        = date('Y-m-d H:i:s');
	}

	public function beforeUpdate()
	{
		$this->datetime_updated = date('Y-m-d H:i:s');
	}
}
