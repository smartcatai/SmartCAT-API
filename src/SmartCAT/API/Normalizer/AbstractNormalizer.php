<?php

namespace SmartCat\Client\Normalizer;

use Symfony\Component\Serializer\SerializerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

abstract class AbstractNormalizer implements DenormalizerInterface, NormalizerInterface
{
    use SerializerAwareTrait;
}