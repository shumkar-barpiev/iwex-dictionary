<?php
class DictionaryWord
{
    private $id;
    private $subMenuId;
    private $wordImage;
    private $germanWord;
    private $russianWord;
    private $description;
    private $chapterName;
    private $menuName;
    private $subMenuName;

    public function __construct($id, $subMenuId , $wordImage, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName)
    {
        if ($id) $this->id = $id;
        $this->subMenuId = $subMenuId;
        $this->wordImage = $wordImage;
        $this->germanWord = $germanWord;
        $this->russianWord = $russianWord;
        $this->description = $description;
        $this->chapterName = $chapterName;
        $this->menuName = $menuName;
        $this->subMenuName = $subMenuName;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSubMenuId()
    {
        return $this->subMenuId;
    }
    public function setSubMenuId($subMenuId)
    {
        $this->subMenuId = $subMenuId;
    }

    public function getWordImage()
    {
        return $this->wordImage;
    }
    public function setWordImage($wordImage)
    {
        $this->wordImage = $wordImage;
    }

    public function getGermanWord()
    {
        return $this->germanWord;
    }
    public function setGermanWord($germanWord)
    {
        $this->germanWord = $germanWord;
    }


    public function getRussianWord()
    {
        return $this->russianWord;
    }
    public function setRussianWord($russianWord)
    {
        $this->russianWord = $russianWord;
    }

    public function getDescriptionOfWord()
    {
        return $this->description;
    }
    public function setDescriptionOfWord($description)
    {
        $this->description = $description;
    }


    public function getChapterName()
    {
        return $this->chapterName;
    }
    public function setChapterName($chapterName)
    {
        $this->chapterName = $chapterName;
    }

    public function getMenuName()
    {
        return $this->menuName;
    }
    public function setMenuName($menuName)
    {
        $this->menuName = $menuName;
    }

    public function getSubMenuName()
    {
        return $this->subMenuName;
    }
    public function setSubMenuName($subMenuName)
    {
        $this->subMenuName = $subMenuName;
    }

}

?>