<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="UserRole",
  *   @OA\Property(property="user_id", type="string", example="6f4d9b55-2a8e-4b99-b69e-84bfde0f86b4"),
 *   @OA\Property(property="role", type="string" ,example= "bookmanager"),
 * )
 */

class UserRole extends Model
{
    protected $fillable = [
        'user_id', 'role',
    ];

    protected $hidden =["created_at", "updated_at", "id"];

    public static function getDefaultValidator()
    {
        return [
            "user_id" => "required|string|max:100|exists:users,id",
            "role" => "required|string|max:100|in:administrator,book_manager,member_manager,front_desk",

        ];
    }
}
