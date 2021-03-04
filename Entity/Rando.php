<?php


class Rando
{
    private ?int $id;
    private ?string $name;
    private ?string $difficulty;
    private ?string $duration;
    private ?int $height_difference;
    private ?float $distance;
    private ?int $avalide;

    /**
     * Article constructor.
     * @param int|null $id
     * @param string|null $title
     * @param string|null $content
     * @param string|null $date_add
     */
    public function __construct(int $id = null, int $avalide = null, string $name = null, string $difficulty = null, int $duration = null, int $height_differencer = null, float $distance = null){
        $this->id = $id;
        $this->name = $name;
        $this->difficulty = $difficulty;
        $this->duration = $duration;
        $this->height_difference = $height_differencer;
        $this->distance = $distance;
        $this->avalide = $avalide;
    }

    public function getAvalide(): ?int
    {
        return $this->avalide;
    }

    public function setAvalide(?int $avalide): Rando
    {
        $this->avalide = $avalide;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): Rando
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): Rando
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    /**
     * @param string|null $difficulty
     */
    public function setDifficulty(?string $difficulty): Rando
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    /**
     * @return int|string|null
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int|string|null $duration
     */
    public function setDuration($duration): Rando
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeightDifference(): ?int
    {
        return $this->height_difference;
    }

    /**
     * @param int|null $height_difference
     */
    public function setHeightDifference(?int $height_difference): Rando
    {
        $this->height_difference = $height_difference;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDistance(): ?float
    {
        return $this->distance;
    }

    /**
     * @param float|null $distance
     */
    public function setDistance(?float $distance): Rando
    {
        $this->distance = $distance;
        return $this;
    }



}