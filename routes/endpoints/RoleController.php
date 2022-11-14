<?php
$router->post("/api/v1/role/set", [
    "uses" => "RoleController@addRole",
]);
$router->post("/api/v1/role/unset", [
    "uses" => "RoleController@removeRole",
]);