<?php

/**
 * @OA\Schema(
 *      title="Register User request",
 *      description="Register User request body data",
 *      type="object",
 *      required={"name", "email", "password"}
 * )
 */


class RegisterUserRequest
{
  /**
   * @OA\Property(
   *      property="name",
   *      type="string",
   *      description="Name of the new user",
   *      example="John Doe"
   * )
   *
   * @var string
   */
  public $name;

  /**
   * @OA\Property(
   *     property="email",
   *     type="string",
   *     format="email",
   *     description="Email of the new user",
   *     example="example@example.com"
   * )
   * @var string
   */
  public $email;

  /**
   * @OA\Property(
   *      property="password",
   *      type="string",
   *      description="Password of the new user",
   *      example="123456"
   * )
   *    * 
   * @access
   * @var string
   */
  public $password;
}
