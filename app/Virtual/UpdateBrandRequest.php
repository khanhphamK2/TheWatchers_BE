<?php

/**
 * @OA\Schema(
 *      title="Update Brand request",
 *      description="Update Brand request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateBrandRequest
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