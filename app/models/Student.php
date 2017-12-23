<?php

class Student extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=8, nullable=false)
     */
    public $idStudent;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $NameTitle;

  

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    public $FirstName;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    public $LastName;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $Year;

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
        return 'student';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Student[]|Student
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Student
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
