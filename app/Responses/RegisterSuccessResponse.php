<?php
namespace App\Responses;

/**
 * @OA\Schema(
 *   schema="RegisterSuccessResponse",
 *   @OA\Property(property="message", type="string"),
 *   @OA\Property(property="user", type="object",
 *      @OA\Property(property="id", type="string", example="6f4d9b55-2a8e-4b99-b69e-84bfde0f86b4"),
 *      @OA\Property(property="display_name", type="string", example="John Doe"),
 *      @OA\Property(property="email", type="string" ,example= "johndoe@example.com"),
 *     @OA\Property(property="status_id", type="integer", example="1"),
 *   ),
 *   @OA\Property(property="authorisation", type="object",
 *      @OA\Property(property="token", type="string"),
 *      @OA\Property(property="type", type="string", example="bearer"),
 *   )
 * )
 */

class RegisterSuccessResponse
{

}
