<?php

/**
 * @OA\Schema(
 * title="BrandResource",
 * description="Brand resource",
 * @OA\Xml(
 * name="BrandResource"
 * )
 * )
 */
class BrandResource
{
    /**
     * @OA\Property(
     * title="Data",
     * description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Brand[]
     */
    private $Brand;
}