<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BikeBookingsController;
use App\Http\Controllers\Admin\BikesController;
use App\Http\Controllers\Admin\BikeServiceController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CarBookingsController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\CarServiceController;
use App\Http\Controllers\Admin\FundamentalController;
use App\Http\Controllers\Admin\KeyController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Customer\BikeNotificationsController;
use App\Http\Controllers\Customer\CarNotificationsController;
use App\Http\Controllers\customer\RoutesController;
use App\Http\Controllers\Customer\VisitedController;
use App\Models\BikeBookings;
use App\Models\BikeNotifications;
use App\Models\Bikes;
use App\Models\Blogs;
use App\Models\CarBookings;
use App\Models\CarNotifications;
use App\Models\Cars;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// ------------------------------------  CUSTOMER PAGE VIEWS   ------------------------------------------- //




Route::get('/', [RoutesController::class, 'welcome'])->name('welcome');
Route::get('/index', [RoutesController::class, 'index'])->name('index');
Route::get('/contact', [RoutesController::class, 'contact'])->name('contact');
Route::get('/blogs', [RoutesController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{id}', [RoutesController::class, 'showblog'])->name('blogsshow');
Route::get('/bikes', [RoutesController::class, 'bikes'])->name('bikes');
Route::get('/bikes/{id}', [RoutesController::class, 'showbike'])->name('bikeshow');
Route::get('/cars', [RoutesController::class, 'cars'])->name('cars');
Route::get('/cars/{id}', [RoutesController::class, 'showcar'])->name('carshow');
Route::get('/filter-cars', [RoutesController::class, 'filtercars'])->name('filtercars');
Route::get('/filter-bikes', [RoutesController::class, 'filterbikes'])->name('filterbikes');

Route::get('/carnotify/{car}', [CarNotificationsController::class, 'create'])->name('carnotify');
Route::get('/bikenotify/{bike}', [BikeNotificationsController::class, 'create'])->name('bikenotify');
Route::post('carnotifystore', [CarNotificationsController::class, 'store'])->name('carnotifystore');
Route::post('bikenotifystore', [BikeNotificationsController::class, 'store'])->name('bikenotifystore');

Route::get('/visited', function () {
    return view('visited');
})->name('visited');

Route::post('/visiteduserstore', [VisitedController::class, 'store'])->name('visiteduserstore');
Route::get('/visited', function () {
    return view('visited');
})->name('visited.show');



// ------------------------------------  ADMIN PAGE VIEWS   ------------------------------------------- //


Route::middleware(['auth', 'secure.auth'])->prefix('admin/112233')->group(function () {

    Route::resource('blogs', BlogsController::class)->names([
        'index' => 'adminblogs.index',
        'create' => 'adminblogs.create',
        'store' => 'adminblogs.store',
        'show' => 'adminblogs.show',
        'edit' => 'adminblogs.edit',
        'update' => 'adminblogs.update',
        'destroy' => 'adminblogs.destroy',
    ]);
    Route::resource('cars', CarsController::class)->names([
        'index' => 'admincars.index',
        'create' => 'admincars.create',
        'store' => 'admincars.store',
        'show' => 'admincars.show',
        'edit' => 'admincars.edit',
        'update' => 'admincars.update',
        'destroy' => 'admincars.destroy',
    ]);
    Route::resource('bikes', BikesController::class)->names([
        'index' => 'adminbikes.index',
        'create' => 'adminbikes.create',
        'store' => 'adminbikes.store',
        'show' => 'adminbikes.show',
        'edit' => 'adminbikes.edit',
        'update' => 'adminbikes.update',
        'destroy' => 'adminbikes.destroy',
    ]);
    Route::resource('carbookings', CarBookingsController::class)->names([
        'index' => 'admincarbooking.index',
        'create' => 'admincarbooking.create',
        'store' => 'admincarbooking.store',
        'show' => 'admincarbooking.show',
        'edit' => 'admincarbooking.edit',
        'update' => 'admincarbooking.update',
        'destroy' => 'admincarbooking.destroy',
    ]);
    Route::resource('bikebookings', BikeBookingsController::class)->names([
        'index' => 'adminbikebooking.index',
        'create' => 'adminbikebooking.create',
        'store' => 'adminbikebooking.store',
        'show' => 'adminbikebooking.show',
        'edit' => 'adminbikebooking.edit',
        'update' => 'adminbikebooking.update',
        'destroy' => 'adminbikebooking.destroy',
    ]);

    Route::resource('fundamentals', FundamentalController::class)->names([
        'index' => 'adminfundamentals.index',
        'create' => 'adminfundamentals.create',
        'store' => 'adminfundamentals.store',
        'show' => 'adminfundamentals.show',
        'edit' => 'adminfundamentals.edit',
        'update' => 'adminfundamentals.update',
    ]);


    Route::get('/carbookings', function () {
        $cars = Cars::all();
        return view('admin.cars.list', compact('cars'));
    })->name('carbooking');

    Route::get('/bikebookings', function () {
        $bikes = Bikes::all();
        return view('admin.bikes.list', compact('bikes'));
    })->name('bikebooking');

    Route::get('carbookingscreate/{id}', [CarBookingsController::class, 'create'])->name('carbookingcreate');
    Route::post('carbookingstore', [CarBookingsController::class, 'store'])->name('carbookingstore');

    Route::get('carservicecreate/{id}', [CarServiceController::class, 'create'])->name('carservicecreate');
    Route::post('carservicestore', [CarServiceController::class, 'store'])->name('carservicestore');

    Route::get('bikebookingscreate/{id}', [BikeBookingsController::class, 'create'])->name('bikebookingcreate');
    Route::post('bikebookingstore', [BikeBookingsController::class, 'store'])->name('bikebookingstore');

    Route::get('bikeservicecreate/{id}', [BikeServiceController::class, 'create'])->name('bikeservicecreate');
    Route::post('bikeservicestore', [BikeServiceController::class, 'store'])->name('bikeservicestore');

    Route::get('/getcarNotifications', function () {
        $notifications = CarNotifications::with('car')->get();
        return view('admin.cars.notification', compact('notifications'));
    })->name('getcarNotifications');

    Route::get('/getbikeNotifications', function () {
        $notifications = BikeNotifications::with('bike')->get();
        return view('admin.bikes.notification', compact('notifications'));
    })->name('getbikeNotifications');

    Route::get('/getbikebooked', function () {
        $bikes = Bikes::with('bookings')->get();
        return view('admin.bikes.booked', compact('bikes'));
    })->name('getbikebooked');

    Route::get('/getcarbooked', function () {
        $cars = Cars::with('bookings')->get();
        return view('admin.cars.booked', compact('cars'));
    })->name('getcarbooked');


    Route::get('/getcarchecklist', function (Request $request) {
        $month = $request->get('month', now()->format('Y-m'));
        $startDate = Carbon::parse("$month-01");
        $endDate = $startDate->copy()->endOfMonth();

        $cars = Cars::with([
            'bookings' => function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('pickup_date', [$startDate, $endDate])
                        ->orWhereBetween('drop_date', [$startDate, $endDate])
                        ->orWhere(function ($q2) use ($startDate, $endDate) {
                            $q2->where('pickup_date', '<=', $startDate)
                                ->where('drop_date', '>=', $endDate);
                        });
                });
            },
            'services' => function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('pickup_date', [$startDate, $endDate])
                        ->orWhereBetween('drop_date', [$startDate, $endDate])
                        ->orWhere(function ($q2) use ($startDate, $endDate) {
                            $q2->where('pickup_date', '<=', $startDate)
                                ->where('drop_date', '>=', $endDate);
                        });
                });
            }
        ])->get();

        return view('admin.cars.checklist', compact('cars', 'month'));
    })->name('getcarchecklist');

    Route::get('/getbikechecklist', function (Request $request) {
        $month = $request->get('month', now()->format('Y-m'));
        $startDate = Carbon::parse("$month-01");
        $endDate = $startDate->copy()->endOfMonth();

        $bikes = Bikes::with([
            'bookings' => function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('pickup_date', [$startDate, $endDate])
                        ->orWhereBetween('drop_date', [$startDate, $endDate])
                        ->orWhere(function ($q2) use ($startDate, $endDate) {
                            $q2->where('pickup_date', '<=', $startDate)
                                ->where('drop_date', '>=', $endDate);
                        });
                });
            },
            'services' => function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('pickup_date', [$startDate, $endDate])
                        ->orWhereBetween('drop_date', [$startDate, $endDate])
                        ->orWhere(function ($q2) use ($startDate, $endDate) {
                            $q2->where('pickup_date', '<=', $startDate)
                                ->where('drop_date', '>=', $endDate);
                        });
                });
            }
        ])->get();
        return view('admin.bikes.checklist', compact('bikes', 'month'));
    })->name('getbikechecklist');

    Route::get('/checkcar', [CarsController::class, 'check'])->name('checkcar.index');
    Route::get('/checkbike', [BikesController::class, 'check'])->name('checkbike.index');

    Route::delete('/deletebikenotification/{id}', [BikeNotificationsController::class, 'delete'])->name('deletebikenotification');
    Route::delete('/deletecarnotification/{id}', [carNotificationsController::class, 'delete'])->name('deletecarnotification');


    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/show-user', [UserController::class, 'index'])->name('users');
    Route::get('/create-user', [UserController::class, 'showCreateUserForm'])->name('createuser');
    Route::post('/create-user', [UserController::class, 'create'])->name('storeuser');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('updateuser');
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('deleteuser');
    Route::get('/password', [UserController::class, 'showChangePasswordForm'])->name('password');
    Route::put('/updatepassword', [UserController::class, 'updatePassword'])->name('updatepassword');
    Route::get('/filter-cars', [CarsController::class, 'filter'])->name('filter.cars');
    Route::get('/filter-bikes', [BikesController::class, 'filter'])->name('filter.bikes');

    Route::get('/getbikebooked', [BikesController::class, 'getBikeBooked'])->name('getbikebooked');
    Route::get('/getcarbooked', [CarsController::class, 'getCarBooked'])->name('getcarbooked');

    Route::get('/visted', [VisitedController::class, 'index'])->name('visited');
    Route::delete('/deletevisiteduser/{id}', [VisitedController::class, 'destroy'])->name('deletevisiteduser');
});

Route::get('admin/112233/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/112233/login', [AuthController::class, 'login']);
