<?php

class Detailactivity extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idDetailactivity;

    /**
     *
     * @var string
     * @Column(type="string", length=8, nullable=false)
     */
    public $idStudent;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idActivity;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("camp");
        $this->belongsTo('idStudent', '\Student', 'idStudent', ['alias' => 'Student']);
        $this->belongsTo('idActivity', '\Activity', 'idActivity', ['alias' => 'Activity']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detailactivity';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detailactivity[]|Detailactivity
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detailactivity
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
