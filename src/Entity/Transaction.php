<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2018-01-16
 * Time: 17:04
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Classes\CategoriesList;

/**
 * Class Transaction
 * @package App\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="transactions")
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $subcategory;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $value;

    /**
     * @ORM\Column(type="boolean")
     */
    private $income ;


    /**
     * @ORM\Column(type="string")
     */
    private $month;

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function isIncome()
    {
        $ctgs = new CategoriesList();
        if($this->category === $ctgs->incomeCategory()){
            $this->income = true;
        }else{
            $this->income = false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * @param mixed $subcategory
     */
    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * @param mixed
     */
    public function setIncome()
    {
        $this->isIncome();
    }



}