<?php
namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @OA\Post(
     *   tags={"Role"},
     *   path="/api/v1/role/set",
     *   summary="Summary",
     *    @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *       allOf={
     *          @OA\Schema(ref="#/components/schemas/UserRole")
     *       },
     *      )
     *    ),
     *   @OA\Response(response=200, description="OK"),
     * )
     */
    public function addRole(Request $request)
    {
        $this->validate($request, UserRole::getDefaultValidator());
        $data = $request->only(["user_id", "role"]);

        UserRole::updateOrCreate(
            $data, $data
        );
        return response()->json([
            "message" => "New role assigned",
        ], 201);
    }
    /**
     * @OA\Post(
     *   tags={"Role"},
     *   path="/api/v1/role/unset",
     *   summary="Summary",
     *    @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *       allOf={
     *          @OA\Schema(ref="#/components/schemas/UserRole")
     *       },
     *      )
     *    ),
     *   @OA\Response(response=200, description="OK"),
     * )
     */

    public function removeRole(Request $request)
    {
        $this->validate($request, UserRole::getDefaultValidator());
        $data = $request->only(["user_id", "role"]);

        $role = UserRole::where("user_id", $data["user_id"])
            ->where("role", $data["role"]);
        $role->delete();
        return response()->json([
            "message" => "Role removed",
        ], 201);
    }

}
