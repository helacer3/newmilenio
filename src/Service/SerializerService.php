<?php
// src/Service/SerializerService.php
namespace App\Service;
// services
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Serializer Service
*/
class SerializerService
{
	/**
	* serializer Object To Json
	*/
	public function serializerObjectToJson(object $objUnserializer) {
		$encoders    = [new JsonEncoder()];
		$normalizers = [new ObjectNormalizer()];
		$serializer  = new Serializer($normalizers, $encoders);
		// default Return
		return $serializer->serialize($objUnserializer, 'json');
	}
}