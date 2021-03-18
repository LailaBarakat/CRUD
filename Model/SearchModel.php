<?php


class SearchModel
{
    private string $name;
    private string $type;
    private int $id;

    /**
     * SearchModel constructor.
     * @param string $name
     * @param string $
     * @param int $id
     */
    public function __construct(string $name, string $type, int $id)
    {
        $this->name = $name;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFindName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFindType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getFindId(): int
    {
        return $this->id;
    }



}