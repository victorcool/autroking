<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\ClubsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OfficePositionsCOntroller;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PlayersController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\Admin\TeamCategoryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\NewsController as ControllersNewsController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\TeamController as ControllersTeamController;
use App\Models\Position;
use Illuminate\Support\Facades\Route;

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


Route::get('/privacy-policy', [App\Http\Controllers\GuestsController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/contact', [GuestsController::class,'contact'])->name('contact');
Route::get('/about', [GuestsController::class,'about'])->name('about');
Route::get('/gallery', [GuestsController::class,'gallery'])->name('gallery');
Route::get('/match', [GuestsController::class,'match'])->name('match');
Route::prefix('news')->group(function(){
    Route::get('post/{slug}', [ControllersNewsController::class,'show'])->name('news.show');
    Route::get('/', [ControllersNewsController::class,'index'])->name('news');
});

Route::get('/', [GuestsController::class,'index'])->name('welcome');



// ADMIN ROUTE------------------------------

Route::prefix('isonlyadmin')->group(function()
{
    Route::get('/checkpoint', [App\Http\Controllers\Auth\AdminLoginController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login/submit', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/profile', [App\Http\Controllers\Admin\AdminsController::class, 'profile'])->name('admin.profile');

    
    // -----------Everything Team  category-------------------------
    Route::get('team-category/create', [TeamCategoryController::class, 'create'])->name('admin.teamCateg.create');
    Route::post('team-category/store', [TeamCategoryController::class, 'store'])->name('admin.teamCateg.store');
    Route::get('team-category/remove/{id}', [TeamCategoryController::class, 'remove'])->name('admin.teamCateg.remove');
    Route::get('team-category/', [TeamCategoryController::class, 'index'])->name('admin.teamCateg.index');
    // -----------------------END--------------------------

    // -----------Everything Blog  category-------------------------
    Route::get('blog-category/create', [BlogCategoryController::class, 'create'])->name('admin.blogCateg.create');
    Route::post('blog-category/store', [BlogCategoryController::class, 'store'])->name('admin.blogCateg.store');
    Route::get('blog-category/remove/{id}', [BlogCategoryController::class, 'remove'])->name('admin.blogCateg.remove');
    Route::get('blog-category/', [BlogCategoryController::class, 'index'])->name('admin.blogCateg.index');
    // -----------------------END--------------------------

    // -----------Everything blog-------------------------
    Route::get('blog/create', [NewsController::class, 'create'])->name('admin.blog.create');
    Route::post('blog/store', [NewsController::class, 'store'])->name('admin.blog.store');
    // Route::get('blog/show', [NewsController::class, 'show'])->name('admin.blog.show');
    Route::get('blog/{id}/action', [NewsController::class, 'action'])->name('admin.blog.action');
    Route::post('blog/update_image/', [NewsController::class, 'update_image'])->name('admin.blog.update_image');
    Route::get('blog/fb_update/', [NewsController::class, 'update_with_facebook_latest_feed'])->name('admin.fb_update');
    Route::get('blog/', [NewsController::class, 'index'])->name('admin.blog.index');

    // -----------Everything Team-------------------------
    Route::get('team/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('team/store', [TeamController::class, 'store'])->name('admin.team.store');
    Route::get('team/show', [TeamController::class, 'show'])->name('admin.team.show');
    Route::get('team/{id}/action', [TeamController::class, 'action'])->name('admin.team.action');
    Route::get('load/team', [TeamController::class, 'load_team_options_for_category']);
    Route::get('team/', [TeamController::class, 'index'])->name('admin.team.index');
    // -----------------------END--------------------------

    // -----------Everything Player-------------------------
    Route::get('player/create', [PlayersController::class, 'create'])->name('admin.player.create');
    Route::post('player/store', [PlayersController::class, 'store'])->name('admin.player.store');
    Route::get('player/show', [PlayersController::class, 'show'])->name('admin.player.show');
    Route::get('player/{id}/action', [PlayersController::class, 'action'])->name('admin.player.action');
    Route::get('player/', [PlayersController::class, 'index'])->name('admin.player.index');
    // -----------------------END--------------------------

    // -----------Everything Gallery-------------------------
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('gallery/{id}/action', [GalleryController::class, 'action'])->name('admin.gallery.action');
    Route::get('gallery/', [GalleryController::class, 'index'])->name('admin.gallery.index');
    // -----------------------END--------------------------

    // -----------Everything ABout SUFC-------------------------
    Route::get('about/create', [AboutController::class, 'create'])->name('admin.about.create');
    Route::post('about/store', [AboutController::class, 'store'])->name('admin.about.store');
    Route::post('about-content/store', [AboutController::class, 'content_store'])->name('admin.aboutcontent.store');
    Route::get('about/{id}/action', [AboutController::class, 'action'])->name('admin.about.action');
    Route::get('about-content/{id}/action', [AboutController::class, 'content_action'])->name('admin.aboutContent.action');
    Route::post('update_image/', [AboutController::class, 'update_image'])->name('admin.about.update_image');
    Route::get('about/', [AboutController::class, 'index'])->name('admin.about.index');
    // -----------------------END--------------------------

    // -----------Everything Position-------------------------
    Route::post('ballposition_category/store', [PositionController::class, 'store_position_category'])->name('admin.store_position_category.store');
    Route::post('ballposition/store', [PositionController::class, 'store'])->name('admin.ballposition.store');
    Route::get('ballpositionCategory/{id}/action', [PositionController::class, 'position_category_action'])->name('admin.ballpositionCategory.action');
    Route::get('ballposition/{pid}/action', [PositionController::class, 'action'])->name('admin.ballposition.action');
    Route::get('load/position', [PositionController::class, 'load_position_options_for_category']);
    Route::get('ballposition/', [PositionController::class, 'index'])->name('admin.ballposition.index');
    // -----------------------END--------------------------

    // -----------Everything Office Position-------------------------
    Route::post('officeposition/store', [OfficePositionsCOntroller::class, 'store'])->name('admin.office_position.store');
    Route::get('officeposition/{id}/action', [OfficePositionsCOntroller::class, 'office_position_action'])->name('admin.office_position.action');
    Route::get('officeposition/', [OfficePositionsCOntroller::class, 'index'])->name('admin.officeposition.index');
    // -----------------------END--------------------------

    // -----------Everything Matches-------------------------
    Route::post('match/store', [MatchController::class, 'store'])->name('admin.match.store');
    Route::get('match/{type}', [MatchController::class, 'index'])->name('admin.match.index');

    // -----------Everything Club-------------------------
    Route::get('club/{id}/action', [ClubsController::class, 'action'])->name('admin.club.action');
    Route::post('club/store', [ClubsController::class, 'store'])->name('admin.club.store');
    Route::get('club/', [ClubsController::class, 'index'])->name('admin.club.index');

    // -----------Everything Other Content-------------------------
    // Route::get('content/{id}/action', [PagesController::class, 'action'])->name('admin.content.action');
    Route::post('content/store', [PagesController::class, 'content_store'])->name('admin.content.store');
    Route::post('page/store', [PagesController::class, 'store'])->name('admin.page.store');
    Route::get('page/{id}/action', [PagesController::class, 'action'])->name('admin.page.action');
    Route::get('content/', [PagesController::class, 'index'])->name('admin.content');
 

    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('isonlyadmin');
});


