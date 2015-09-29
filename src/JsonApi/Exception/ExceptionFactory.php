<?php
namespace WoohooLabs\Yin\JsonApi\Exception;

use WoohooLabs\Yin\JsonApi\Request\RequestInterface;

class ExceptionFactory implements ExceptionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createClientGeneratedIdNotSupportedException(RequestInterface $request, $currentId)
    {
        return new ClientGeneratedIdNotSupported($currentId);
    }

    /**
     * @inheritDoc
     */
    public function createClientGeneratedIdAlreadyExistsException(RequestInterface $request, $currentId)
    {
        return new ClientGeneratedIdAlreadyExists($currentId);
    }

    /**
     * @inheritDoc
     */
    public function createFullReplacementProhibitedException($relationshipName)
    {
        return new FullReplacementProhibited($relationshipName);
    }

    /**
     * @inheritDoc
     */
    public function createInclusionUnsupportedException(RequestInterface $request)
    {
        return new InclusionUnsupported();
    }

    /**
     * @inheritDoc
     */
    public function createInclusionUnrecognizedException(RequestInterface $request, array $unrecognizedInclusions)
    {
        return new InclusionUnrecognized($unrecognizedInclusions);
    }

    /**
     * @inheritDoc
     */
    public function createMediaTypeUnacceptableException(RequestInterface $request, $mediaTypeName)
    {
        return new MediaTypeUnacceptable($mediaTypeName);
    }

    /**
     * @inheritDoc
     */
    public function createMediaTypeUnsupportedException(RequestInterface $request, $mediaTypeName)
    {
        return new MediaTypeUnsupported($mediaTypeName);
    }

    /**
     * @inheritDoc
     */
    public function createQueryParamUnrecognizedException(RequestInterface $request, $queryParamName)
    {
        return new QueryParamUnrecognized($queryParamName);
    }

    /**
     * @inheritDoc
     */
    public function createRelationshipTypeInappropriateException(
        $relationshipName,
        $currentRelationshipType,
        $expectedRelationshipType
    ) {
        return new RelationshipTypeInappropriate(
            $relationshipName,
            $currentRelationshipType,
            $expectedRelationshipType
        );
    }

    /**
     * @inheritDoc
     */
    public function createResourceIdMissingException()
    {
        return new ResourceIdMissing();
    }

    /**
     * @inheritDoc
     */
    public function createResourceTypeMissingException()
    {
        return new ResourceTypeMissing();
    }

    /**
     * @inheritDoc
     */
    public function createResourceTypeUnacceptableException($currentType, array $acceptedTypes)
    {
        return new ResourceTypeUnacceptable($currentType, $acceptedTypes);
    }

    /**
     * @inheritDoc
     */
    public function createSortingUnsupportedException(RequestInterface $request)
    {
        return new SortingUnsupported();
    }
}
