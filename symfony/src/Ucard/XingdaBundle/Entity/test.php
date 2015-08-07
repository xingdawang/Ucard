<?php

namespace Ucard\XingdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * test
 *
 * @ORM\Table(name="tests")
 * @ORM\Entity(repositoryClass="Ucard\XingdaBundle\Entity\testRepository")
 */
class test
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="generate_date", type="date")
     */
    private $generateDate;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return test
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set generateDate
     *
     * @param \DateTime $generateDate
     * @return test
     */
    public function setGenerateDate($generateDate)
    {
        $this->generateDate = $generateDate;

        return $this;
    }

    /**
     * Get generateDate
     *
     * @return \DateTime 
     */
    public function getGenerateDate()
    {
        return $this->generateDate;
    }
}
