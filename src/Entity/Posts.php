<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use function Symfony\Component\DependencyInjection\Loader\Configurator\ref;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostsRepository")
 */
class Posts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string")
     */

    private $text;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;

    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getImagePath()
    {

        return $this->imagePath;
    }
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }



    // add your own fields
}
