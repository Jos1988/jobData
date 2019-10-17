<?php

declare(strict_types=1);

namespace App\Document;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 *
 * @ODM\Document
 */
class Job
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     * @Assert\NotBlank
     * @var string
     */
    private $sourceId;

    /**
     * @ODM\Field(type="string")
     * @Assert\NotBlank
     * @var string
     */
    private $source;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $responseData;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $title;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $name;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $cao;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $proDiversity;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $description;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $location;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $jobLocationCountry;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $jobLocationRegion;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $jobLocationCity;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $category;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $ccCategory;

    /**
     * @ODM\Field(type="string")
     * @var string
     */
    private $jobIndustry;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSourceId()
    {
        return $this->sourceId;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    public function setSourceId(string $sourceId): void
    {
        $this->sourceId = $sourceId;
    }

    public function getResponseData(): string
    {
        return $this->responseData;
    }

    public function setResponseData(string $responseData): void
    {
        $this->responseData = $responseData;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCao(): string
    {
        return $this->cao;
    }

    public function setCao(string $cao): void
    {
        $this->cao = $cao;
    }

    public function getProDiversity(): string
    {
        return $this->proDiversity;
    }

    public function setProDiversity(string $proDiversity): void
    {
        $this->proDiversity = $proDiversity;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getJobLocationCountry(): string
    {
        return $this->jobLocationCountry;
    }

    public function setJobLocationCountry(string $jobLocationCountry): void
    {
        $this->jobLocationCountry = $jobLocationCountry;
    }

    public function getJobLocationRegion(): string
    {
        return $this->jobLocationRegion;
    }

    public function setJobLocationRegion(string $jobLocationRegion): void
    {
        $this->jobLocationRegion = $jobLocationRegion;
    }

    public function getJobLocationCity(): string
    {
        return $this->jobLocationCity;
    }

    public function setJobLocationCity(string $jobLocationCity): void
    {
        $this->jobLocationCity = $jobLocationCity;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getCcCategory(): string
    {
        return $this->ccCategory;
    }

    public function setCcCategory(string $ccCategory): void
    {
        $this->ccCategory = $ccCategory;
    }

    public function getJobIndustry(): string
    {
        return $this->jobIndustry;
    }

    public function setJobIndustry(string $jobIndustry): void
    {
        $this->jobIndustry = $jobIndustry;
    }
}