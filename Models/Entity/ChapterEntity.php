<?php
class Chapter
{
    private $id;
    private $chapterName;
    private $imageUrl;

    public function __construct($id, $chapterName, $imageUrl)
    {
        if ($id) $this->id = $id;
        $this->chapterName = $chapterName;
        $this->imageUrl = $imageUrl;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getChapterName()
    {
        return $this->chapterName;
    }

    public function setChapterName($chapterName)
    {
        $this->chapterName = $chapterName;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

}

?>