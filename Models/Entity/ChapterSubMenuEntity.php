<?php
class ChapterSubMenu
{
    private $id;
    private $subMenuName;
    private $menuId;
    private $menuName;
    private $chapterName;

    public function __construct($id, $subMenuName, $menuId, $menuName, $chapterName)
    {
        if ($id) $this->id = $id;
        $this->subMenuName = $subMenuName;
        $this->menuId = $menuId;
        $this->menuName = $menuName;
        $this->chapterName = $chapterName;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getSubMenuName()
    {
        return $this->subMenuName;
    }
    public function setSubMenuName($subMenuName)
    {
        $this->subMenuName = $subMenuName;
    }


    public function getMenuid()
    {
        return $this->menuId;
    }
    public function setMenuid($menuId)
    {
        $this->menuId = $menuId;
    }

    public function getMenuName()
    {
        return $this->menuName;
    }
    public function setMenuName($menuName)
    {
        $this->menuName = $menuName;
    }

    public function getChapterName()
    {
        return $this->chapterName;
    }
    public function setChapterName($chapterName)
    {
        $this->chapterName = $chapterName;
    }

}

?>