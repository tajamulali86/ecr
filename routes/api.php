<?php

use App\Http\Controllers\AreaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/areas',[AreaController::class,'index'])
// ->middleware('auth:sanctum')
;
Route::get('{regionId}/areas/',[AreaController::class,'areaByRegion']);



/*need to create employees logins
 employee self user name, email,


 only faizan bhai will see admin panel,
 emplyees will see custom pwa only.

MVP: employee login, create tours, create plans and create calls and customers.
employee can see all calls done by him, and wheter they were as per plans.

VIEWS:
login,
dashboard
customers
Tours
Calls.
Profile

FORMS
customers addition, edition
tours addition, edition
Calls adition, edition.
Profile name, pass change.

TABLES:
Calls, Customers

List:
Tours.

APis required:
Dashboard APIS: for all data, all calls, howmany planned and unplanend tours, upcoming plan, today plan, name, email, customers added by user.
Customer API: list all customers by user, add customer populate region id/ area id, update customer.
Calls API: all calls,
for add call: all areaa, all tours, all customers in that area, all products.
Tour API: get all months, get tours monthly , get area id with tour, get all plan.

*/
