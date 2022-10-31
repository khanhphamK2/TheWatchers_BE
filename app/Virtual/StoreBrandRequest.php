<?php

/**
 * @OA\Schema(
 *      title="Store Brand request",
 *      description="Store Brand request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreBrandRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new Brand",
     *      example="A nice Brand"
     * )
     *
     * @var string
     */
    public $name;
}