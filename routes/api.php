<?php

use App\Http\Controllers\Administracion\Pages\OtherPaginas;
use App\Http\Controllers\Administracion\Pages\PaginaPrincipal as PaginaPrincipalAlias;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogSection\Creation_Controll\CategoryControler;
use App\Http\Controllers\BlogSection\Creation_Controll\PostsController as PostsControllerAlias;
use App\Http\Controllers\BlogSection\Creation_Controll\TagControler;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Paginate\PrimaryPaginate as PrimaryPaginateAlias;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login',[AuthController::class, 'login'])->name('login');



Route::get('Homepage', [PrimaryPaginateAlias::class, 'index']);

Route::get('clausulaconosentimientoweb', [PrimaryPaginateAlias::class, 'clausulaConosentimientoWeb']); //nueva
Route::get('asesoriasadministrativas', [PrimaryPaginateAlias::class, 'asesoriasadministrativas']);
Route::get('asesoriasfinancieras', [PrimaryPaginateAlias::class, 'asesoriasfinancieras']);
Route::get('cartelerasdigitales', [PrimaryPaginateAlias::class, 'cartelerasdigitales']);
Route::get('normas-internacionales-niif', [PrimaryPaginateAlias::class, 'normasniff']);
Route::get('creaciondeempresas', [PrimaryPaginateAlias::class, 'creaciondeempresas']);
Route::get('nuestroservicio', [PrimaryPaginateAlias::class, 'nuestro_servicio']);
Route::get('avisoPrivacidad', [PrimaryPaginateAlias::class, 'avisoPrivacidad']); //nueva
Route::get('quienessomos', [PrimaryPaginateAlias::class, 'quienes_somos']);
Route::get('contactenos', [PrimaryPaginateAlias::class, 'contactenos']);


Route::get('descargas', [PrimaryPaginateAlias::class, 'descargas']);
Route::get('clientes', [PrimaryPaginateAlias::class, 'clientes']);

Route::get('getTimeOpenClose',[PaginaPrincipalAlias::class,'getTimeOpenClose']);

Route::post('/email',[MailController::class, 'MailSend']);
Route::get('getTeamHumano', [PaginaPrincipalAlias::class, 'getTeamHumano']);
Route::get('getItemsTeamHumano', [PaginaPrincipalAlias::class, 'getItemsTeamHumano']);

//endPoint


//blog
Route::get('blogHeader', [PrimaryPaginateAlias::class, 'blogHeader']);
Route::get('posts',[PostsControllerAlias::class, 'index']);
Route::get('showPost/{post}',[PostsControllerAlias::class, 'getOnePost']);







Route::middleware(['auth:api'])->group(function (){


    Route::post('storeimagepost', [PostsControllerAlias::class,'storeImagePost']);

        Route::get('/user', function (){
            return response()->json([auth()->user()]);
        });
        Route::post('/user/passwordreset',[AuthController::class,'reset_password']);


        Route::post('/logout',[AuthController::class,'logout']);


        //pagina principal
        Route::prefix('paginaPrincipal')->group(function () {
            //Slider
            Route::get('getSliderPrincipal', [PaginaPrincipalAlias::class, 'getSliderPrincipal']);
           // Route::post('storeSliderPrincipal', [PaginaPrincipalAlias::class, 'storeSliderPrincipal']);
            Route::post('updateSliderPrincipal/{id}', [PaginaPrincipalAlias::class, 'updateSliderPrincipal']);
           // Route::delete('destroySliderPrincipal/{id}', [PaginaPrincipalAlias::class, 'destroySliderPrincipal']);

            //secondBlock
            Route::get('getSecondBlock', [PaginaPrincipalAlias::class, 'getSecondBlock']);
            Route::post('updateSecondBlock', [PaginaPrincipalAlias::class, 'updateSecondBlock']);

            //third block
            Route::get('getThirdBlock', [PaginaPrincipalAlias::class, 'getThirdBlock']);
            Route::post('updateThirdBlock', [PaginaPrincipalAlias::class, 'updateThirdBlock']);

            //Ayudamos crecer empresa//
            Route::get('getAyudamosCrecer', [PaginaPrincipalAlias::class, 'getAyudamosCrecer']);
            Route::post('updateAyudamosCrecer', [PaginaPrincipalAlias::class, 'updateAyudamosCrecer']);
            // Slider ayudanos a crecer //
            Route::get('getSliderAyudanosCrecer', [PaginaPrincipalAlias::class, 'getSliderAyudanosCrecer']);
            Route::post('storeSliderAyudanosCrecer', [PaginaPrincipalAlias::class, 'storeSliderAyudanosCrecer']);
            Route::post('updateSliderAyudanosCrecer/{id}', [PaginaPrincipalAlias::class, 'updateSliderAyudanosCrecer']);
            Route::delete('destroySliderAyudanosCrecer/{id}', [PaginaPrincipalAlias::class, 'destroySliderAyudanosCrecer']);

            // Equipo humano //
            Route::get('getTeamHumano', [PaginaPrincipalAlias::class, 'getTeamHumano']);
            Route::post('updateTeamHumano', [PaginaPrincipalAlias::class, 'updateTeamHumano']);
            // item equipo humano///
            Route::get('getItemsTeamHumano', [PaginaPrincipalAlias::class, 'getItemsTeamHumano']);
            //Tambien sirve para actualizar los itemns de carteras digitales
            Route::post('updateItemsTeamHumano/{id}', [PaginaPrincipalAlias::class, 'updateItemsTeamHumano']);

            //Help area//
            Route::get('getHelpArea', [PaginaPrincipalAlias::class, 'getHelpArea']);
            Route::post('storeHelpArea', [PaginaPrincipalAlias::class, 'storeHelpArea']);
            Route::post('updateHelpArea/{id}', [PaginaPrincipalAlias::class, 'updateHelpArea']);
            Route::delete('destroyHelpArea/{id}', [PaginaPrincipalAlias::class, 'destroyHelpArea']);
        });

        Route::prefix('paginas')->group(function () {
            // Actualizacion de cualquier otra pagina...
            Route::post('updateHeaderPage/{id}', [OtherPaginas::class, 'updateHeaderPage']);
            Route::post('updateBlockPage/{id}', [OtherPaginas::class, 'updateBlockPage']);


            //Ruta de edicion de imagen de la pagina cartera digital
            Route::post('updateImageCartera', [OtherPaginas::class, 'updateImageCartera']);

            // Para actulizar quienes somos
            Route::post('updateQuienesSomos',[OtherPaginas::class,'updateQuienesSomos']);
            Route::post('updateHeaderQuienesSomos',[OtherPaginas::class,'updateHeaderQuienesSomos']);

            //clientes
            Route::get('getHeaderClientes',[OtherPaginas::class, 'getHeaderClientes']);
            Route::post('updateHeaderClientes',[OtherPaginas::class, 'updateHeaderClientes']);

            Route::get('getItemClientes',[OtherPaginas::class, 'getItemClientes']);
            Route::get('getOneItemCliente/{name}',[OtherPaginas::class, 'getOneItemCliente']);
            Route::post('storeItemCliente', [OtherPaginas::class, 'storeItemCliente']);
            Route::post('updateItemCliente/{id}', [OtherPaginas::class, 'updateItemCliente']);
            Route::delete('deleteItemCliente/{id}', [OtherPaginas::class, 'deleteItemCliente']);

            //descargas

            Route::get('getHeaderDescargas',[OtherPaginas::class, 'getHeaderDescargas']);
            Route::post( 'updateHeaderDescargas',[OtherPaginas::class, 'updateHeaderDescargas']);


            Route::get('getItemDescargas',[OtherPaginas::class, 'getItemDescargas']);
            Route::get('getOneItemDescarga/{name}',[OtherPaginas::class, 'getOneItemDescarga']);
            Route::post('storeItemDescarga', [OtherPaginas::class, 'storeItemDescarga']);
            Route::post('updateItemDescargas/{id}', [OtherPaginas::class, 'updateItemDescargas']);
            Route::delete('deleteItemDescarga/{id}', [OtherPaginas::class, 'deleteItemDescarga']);


        });

        Route::prefix('section')->group(function () {
            Route::post('updateHeaderNuestroServicio', [OtherPaginas::class, 'updateHeaderNuestroServicio']);
            // Items nuestro Servicio
            Route::post('updateItemsNuestroServicio/{id}', [OtherPaginas::class, 'updateItemsNuestroServicio']);
            Route::get('getItemsNuestroServicio', [OtherPaginas::class, 'getItemsNuestroServicio']);

            Route::post('updateTimeOpenClose', [OtherPaginas::class, 'updateTimeOpenClose']);


            // Informacion personal

            Route::get('getRedesSociales', [OtherPaginas::class, 'getRedesSociales']);
            Route::get('getDirrecion', [OtherPaginas::class, 'getDirrecion']);
            Route::get('getNumeros', [OtherPaginas::class, 'getNumeros']);
            Route::get('getCorreoDeContacto', [OtherPaginas::class, 'getCorreoDeContacto']);

            Route::post('updateRedesSociales', [OtherPaginas::class, 'updateRedesSociales']);
            Route::post('updateDirrecion', [OtherPaginas::class, 'updateDirrecion']);
            Route::post('updateNumeros', [OtherPaginas::class, 'updateNumeros']);
            Route::post('updateCorreoDeContacto', [OtherPaginas::class, 'updateCorreoDeContacto']);


            Route::post('updateHeaderContactanos', [OtherPaginas::class, 'updateHeaderContactanos']);
        });


        Route::prefix('AdminBlog')->group(function (){
            //category
            Route::get('getCategories',[CategoryControler::class, 'index']);
            Route::get('getAllCategories',[CategoryControler::class, 'allCategories']);
            Route::post('storeCategories',[CategoryControler::class, 'store']);
            Route::post('updateCategories/{id}',[CategoryControler::class, 'update']);
            Route::get('searchCategory/{name}',[CategoryControler::class, 'searchCategory']);
            Route::delete('deleteCategories/{id}',[CategoryControler::class, 'destroy']);

            //tags
            Route::get('getTags',[TagControler::class, 'index']);
            Route::get('getAllTags',[TagControler::class, 'getAllTags']);
            Route::post('storeTags',[TagControler::class, 'store']);
            Route::post('updateTags/{id}',[TagControler::class, 'update']);
            Route::get('searchTags/{name}',[TagControler::class, 'searchTags']);
            Route::delete('deleteTags/{id}',[TagControler::class, 'destroy']);

            //blog

            Route::post('storePosts',[PostsControllerAlias::class, 'store']);
            Route::get('searchPosts/{name}',[PostsControllerAlias::class, 'searchPosts']);
            Route::get('getPosts',[PostsControllerAlias::class, 'getPosts']);
            Route::post('updatePosts/{id}',[PostsControllerAlias::class, 'update']);
            Route::delete('deletePosts/{id}',[PostsControllerAlias::class, 'destroy']);

        });
        //sistema de Emails
        Route::prefix('AdminEmail')->group(function (){
            Route::get('getEmailOwn',[MailController::class,'getEmailOwn']);
            Route::post('storeEmailOwn',[MailController::class,'storeEmailOwn']);
            Route::post('updateEmailOwn/{id}',[MailController::class,'updateEmailOwn']);
            Route::post('deleteEmailOwm/{id}',[MailController::class,'deleteEmailOwm']);


            //Obtener todos los emails de contactos que se han realizado
            Route::get('getEmails',[MailController::class,'getEmails']);
            Route::get('searchEmail/{name}',[MailController::class,'searchEmail']);

        });



});
