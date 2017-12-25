<?php

class Teacher extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idTeacher;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $NameTitle;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $FirstName;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $LastName;

    

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $admin;

     /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $active;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("camp");
        $this->hasMany('idTeacher', 'Activity', 'Teacher_idTeacher', ['alias' => 'Activity']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'teacher';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Teacher[]|Teacher
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Teacher
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
