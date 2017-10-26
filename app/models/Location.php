<?php

class Location extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idLocation;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    public $LocationName;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    public $room;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("camp");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Location';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Location[]|Location
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Location
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
