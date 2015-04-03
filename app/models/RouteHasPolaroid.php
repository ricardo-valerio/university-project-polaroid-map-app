<?php

class RouteHasPolaroid extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_route;

    /**
     *
     * @var integer
     */
    public $id_polaroid;

    /**
     *
     * @var string
     */
    public $datetime_associated;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_route', 'Routes', 'id', array('alias' => 'Routes'));
        $this->belongsTo('id_polaroid', 'Polaroids', 'id', array('alias' => 'Polaroids'));
        $this->belongsTo('id_route', 'Routes', 'id', NULL);
        $this->belongsTo('id_polaroid', 'Polaroids', 'id', NULL);
    }

}
