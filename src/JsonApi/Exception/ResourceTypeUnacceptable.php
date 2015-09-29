<?php
namespace WoohooLabs\Yin\JsonApi\Exception;

use WoohooLabs\Yin\JsonApi\Schema\Error;
use WoohooLabs\Yin\JsonApi\Schema\ErrorSource;

class ResourceTypeUnacceptable extends JsonApiException
{
    /**
     * @var string
     */
    private $currentType;

    /**
     * @param string $currentType
     * @param array $acceptedTypes
     */
    public function __construct($currentType, array $acceptedTypes)
    {
        parent::__construct("Resource type '$currentType' can't be accepted by the Hydrator!");
        $this->currentType = $currentType;
    }

    /**
     * @inheritDoc
     */
    public function getErrors()
    {
        return [
            Error::create()
                ->setStatus(400)
                ->setCode("RESOURCE_TYPE_UNACCEPTABLE")
                ->setTitle("Resource type is unacceptable")
                ->setDetail("Resource type '$this->currentType' is unacceptable!")
                ->setSource(ErrorSource::fromPointer("/data/type"))
        ];
    }

    /**
     * @return string
     */
    public function getCurrentType()
    {
        return $this->currentType;
    }
}
