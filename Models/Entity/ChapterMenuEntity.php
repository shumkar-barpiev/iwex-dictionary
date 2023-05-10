<?php
class ChapterMenu
{
    private $id;
    private $chapterMenuName;
    private $chapterId;
    private $chapterName;

    public function __construct($id, $chapterMenuName, $chapterId, $chapterName)
    {
        if ($id) $this->id = $id;
        $this->chapterMenuName = $chapterMenuName;
        $this->chapterId = $chapterId;
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


    public function getChapterMenuName()
    {
        return $this->chapterMenuName;
    }
    public function setChapterMenuName($chapterMenuName)
    {
        $this->chapterMenuName = $chapterMenuName;
    }


    public function getChapterId()
    {
        return $this->chapterId;
    }
    public function setChapterId($chapterId)
    {
        $this->chapterId = $chapterId;
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