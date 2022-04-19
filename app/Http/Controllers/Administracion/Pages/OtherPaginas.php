<?php

namespace App\Http\Controllers\Administracion\Pages;

use App\Enum\CodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientesHeaderResource;
use App\Http\Resources\DataCollection;
use App\Http\Resources\Paginas\BlockResource;
use App\Http\Resources\Paginas\Pagina1Resource;
use App\Http\Resources\Quienessomosresource;
use App\Models\blocks;
use App\Models\Clientes;
use App\Models\Clientes_items;
use App\Models\contactos;
use App\Models\descargas;
use App\Models\descargas_items;
use App\Models\items_nuestro_servicio;
use App\Models\nuestro_servicio;
use App\Models\paginas;
use App\Models\Quienes_somos;
use App\Traits\Apitraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OtherPaginas extends Controller
{
    use Apitraits;

    public function updateHeaderPage(Request $request, $id)
    {
        $pagina = paginas::query()->find($id);
        if (is_null($pagina)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'titulo' =>'required',
            'titulo2' => 'required',
            'sub_titulo' => 'required',
//            'img_url' => 'image',
//            'img_url_2' => 'image'
        ]);
        if ($request->file('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($pagina->img_url);
            $pagina->update([
                'img_url' =>'storage/' .  $url
            ]);
        }

        $pagina->update([
            'titulo' => $request->titulo,
            'titulo2' => $request->titulo2,
            'titulo3' => $request->titulo3,
            'sub_titulo' => $request->sub_titulo,
        ]);
        return $this->apiReturn([new Pagina1Resource($pagina)], CodeEnum::SUCCESS);
    }

    public function updateImageCartera(Request $request){
        $pagina = paginas::query()->find(3);

        if (is_null($pagina)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'img_url_2' => 'required'
        ]);
        if ($request->file('img_url_2')) {

            $url = Storage::put('image', $request->file('img_url_2'));
            Storage::delete($pagina->img_url_2);
            $pagina->update([
                'img_url_2' => 'storage/' . $url
            ]);
        }
        return $this->apiReturn([$pagina->img_url_2], CodeEnum::SUCCESS);
    }
    public function updateBlockPage(Request $request, $id)
    {
        $block = blocks::query()->find($id);
        if (is_null($block)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            '_content'=>'required'
        ]);

        if ($request->hasFile('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($block->img_url);
            $block->update([
                'img_url' =>'storage/' .  $url
            ]);
        }
        $block->update([
            'content' => $request->_content,
        ]);
        return $this->apiReturn([new BlockResource($block)], CodeEnum::SUCCESS);
    }


    public function getItemsNuestroServicio(){
        $items_nuestro_servicio = items_nuestro_servicio::all();
        return $this->apiReturn([$items_nuestro_servicio], CodeEnum::SUCCESS);
    }

    // nuestro servicio
    public function updateHeaderNuestroServicio(Request $request)
    {

        $request->validate([
            'title_ns' => 'required',
            'subtitle_ns' => 'required',
        ]);
        $nuestro_servicio = nuestro_servicio::query()->first();

        if (is_null($nuestro_servicio)) return $this->apiReturn([], CodeEnum::FAIL);
        $nuestro_servicio->update([
            'title_ns' => $request->title_ns,
            'subtitle_ns' => $request->subtitle_ns,
        ]);
        return $this->apiReturn([$nuestro_servicio], CodeEnum::SUCCESS);
    }


    //Items nuestro servicio //
    public function updateItemsNuestroServicio(Request $request, $id)
    {
        $items_nuestro_servicio = items_nuestro_servicio::query()->find($id);
        if (is_null($items_nuestro_servicio)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'title_ins' => 'required',
            'description_ins' => 'required',
            'link_url' => 'required',
            'icon'=>'required'
        ]);

        $items_nuestro_servicio->update([
            'title_ins' => $request->title_ins,
            'description_ins' => $request->description_ins,
            'link_url' => $request->link_url,
            'icon'=>$request->icon
        ]);

        return $this->apiReturn([$items_nuestro_servicio], CodeEnum::SUCCESS);
    }
    //END Items nuestro servicio //

//Quienes somos
    public function updateQuienesSomos(Request $request){
        $request->validate([
            'titulo3'=>'required',
            'sub_titulo2'=>'required',
            '_content'=>'required',
//            'img_url'=>'image'
        ]);
        $quienes_somo = Quienes_somos::query()->first();
        if ($request->file('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($quienes_somo->img_url);
            $quienes_somo->update([
                'img_url' =>'storage/' .  $url
            ]);
        }

        $quienes_somo->update([
            'title3'=>$request->titulo3,
            'sub_title2'=>$request->sub_titulo2,
            'content1'=>$request->_content
        ]);

        return $this->apiReturn([new Quienessomosresource($quienes_somo)], CodeEnum::SUCCESS);
    }

    public function updateHeaderQuienesSomos(Request $request){
        $request->validate([
            'titulo'=>'required',
            'titulo2'=>'required',
            'sub_titulo'=>'required',
//            'img_url'=>'image',
        ]);
        $quienes_somo = Quienes_somos::query()->first();
        if ($request->file('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($quienes_somo->img_url_fondo);
            $quienes_somo->update([
                'img_url_fondo' =>'storage/' .  $url
            ]);
        }
        $quienes_somo->update([
            'title1'=>$request->titulo,
            'title2'=>$request->titulo2,
            'sub_title'=>$request->sub_titulo,
        ]);

        return $this->apiReturn([new Quienessomosresource($quienes_somo)], CodeEnum::SUCCESS);
    }
//End quienes somos

//clientes
    public function getHeaderClientes(){
        $clientes=Clientes::query()->first();
        return $this->apiReturn([new ClientesHeaderResource($clientes)],CodeEnum::SUCCESS);
    }
    public function updateHeaderClientes(Request $request){
        $request->validate([
            'titulo'=>'required',
            'titulo2'=>'required',
            'sub_titulo'=>'required',
            '_content'=>'required',
//            'img_url'=>'image'
        ]);
        $clientes=Clientes::query()->first();

        if ($request->file('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($clientes->img_url_fondo);
            $clientes->update([
                'img_url_fondo' =>'storage/' .  $url
            ]);
        }
        $clientes->update([
            'title1'=>$request->titulo,
            'title2'=>$request->titulo2,
            'sub_title'=>$request->sub_titulo,
            'content'=>$request->_content,
            ]);
        return $this->apiReturn([new ClientesHeaderResource($clientes)],CodeEnum::SUCCESS);
    }


    public function getItemClientes(){
        $items_clientes=Clientes_items::latest('id')->paginate(6);
        return $this->apiReturn([$items_clientes],CodeEnum::SUCCESS);
    }
    public function getOneItemCliente($name){
        $items_clientes=Clientes_items::query()->where('title1', 'LIKE','%'.$name.'%')
            ->latest('id')->paginate(6);;
        return $this->apiReturn([$items_clientes],CodeEnum::SUCCESS);
    }

    public function updateItemCliente(Request $request, $id){
        $request->validate([
            'titulo'=>'required',
//            'img_url'=>'image'
        ]);
        $items_clientes=Clientes_items::query()->find($id);
        if (is_null($items_clientes)) return $this->apiReturn([], CodeEnum::FAIL);

        if ($request->file('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($items_clientes->img_url);
            $items_clientes->update([
                'img_url' =>'storage/' .  $url
            ]);
        }
        $items_clientes->update([
            'title1'=>$request->titulo
        ]);
        return $this->apiReturn([$items_clientes],CodeEnum::SUCCESS);
    }

    public function storeItemCliente(Request $request){
        $request->validate([
            'titulo'=>'required',
            'img_url'=>'required'
        ]);
        $url = Storage::put('image', $request->file('img_url'));
        $items_clientes=Clientes_items::create([
            'title1'=>$request->titulo,
            'img_url' => 'storage/' .  $url
        ]);
        return $this->apiReturn([$items_clientes],CodeEnum::SUCCESS);
    }


    public function deleteItemCliente($id){
        $items_clientes=Clientes_items::query()->find($id);
        if ($items_clientes) {
            $items_clientes->delete();
            return $this->apiReturn([], CodeEnum::SUCCESS);
        } else {
            return $this->apiReturn([], CodeEnum::FAIL);
        }
    }

    //end Clientes

    //Descargas

    public function getHeaderDescargas(){
        $descargas = descargas::query()->first();
        return $this->apiReturn(
            [   "titulo"=>$descargas->title1,
                "titulo2"=>$descargas->title2,
                "sub_titulo"=>$descargas->sub_title,
                "img_url"=>$descargas->img_url_fondo],CodeEnum::SUCCESS);
    }

    public function updateHeaderDescargas(Request $request){

        $request->validate([
            'titulo'=>'required',
            'titulo2'=>'required',
            'sub_titulo'=>'required',
//            'img_url'=>'image'

        ]);
        $descargas = descargas::query()->first();
        if ($request->file('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($descargas->img_url_fondo);
            $descargas->update([
                'img_url_fondo' =>'storage/' .  $url
            ]);
        }
        $descargas->update([
            'title1'=>$request->titulo,
            'title2'=>$request->titulo2,
            'sub_title'=>$request->sub_titulo,
        ]);

        return $this->apiReturn(
            [   "titulo"=>$descargas->title1,
                "titulo2"=>$descargas->title2,
                "sub_titulo"=>$descargas->sub_title,
                "img_url"=>$descargas->img_url_fondo],CodeEnum::SUCCESS);
    }


    public function getItemDescargas(){
        $descargas_items = descargas_items::latest('id')->paginate(6);
        return $this->apiReturn([$descargas_items],CodeEnum::SUCCESS);
    }
    public function getOneItemDescarga($name){
        $descargas_items = descargas_items::query()->where('title1', 'LIKE','%'.$name.'%')
            ->latest('id')->paginate(6);;
        return $this->apiReturn([$descargas_items],CodeEnum::SUCCESS);
    }

    public function updateItemDescargas(Request $request, $id){
        $request->validate([
            'titulo'=>'required',
            'description'=>'required',
            'url_archivo'=>'file'
        ]);
        $descargas_items = descargas_items::query()->find($id);
        if (is_null($descargas_items)) return $this->apiReturn([], CodeEnum::FAIL);
        if ($request->file('url_archivo')) {
            $url = Storage::put('files', $request->file('url_archivo'));
            Storage::delete($descargas_items->url_archivo);
            $descargas_items->update([
                'url_archivo' =>'storage/' .  $url
            ]);
        }
        $descargas_items->update([
            'title1'=>$request->titulo,
            'description'=>$request->description
        ]);
        return $this->apiReturn([$descargas_items],CodeEnum::SUCCESS);
    }

    public function storeItemDescarga(Request $request){
        $request->validate([
            'titulo'=>'required',
            'description'=>'required',
            'url_archivo'=>'required'
        ]);
        $url = Storage::put('files', $request->file('url_archivo'));
        $descargas_items = descargas_items::create([
            'title1'=>$request->titulo,
            'description'=>$request->description,
            'url_archivo' => 'storage/' .  $url
        ]);
        return $this->apiReturn([$descargas_items],CodeEnum::SUCCESS);
    }


    public function deleteItemDescarga($id){
        $descargas_items = descargas_items::query()->find($id);
        if ($descargas_items) {
            $descargas_items->delete();
            return $this->apiReturn([], CodeEnum::SUCCESS);
        } else {
            return $this->apiReturn([], CodeEnum::FAIL);
        }
    }

    //End descargas


    ///Hora de cierra y apertura

    public function updateTimeOpenClose(Request $request){
        $request->validate([
            'time_open_and_close'=>'required'
        ]);
        DB::table('business_hours')->update([
            'time_open_and_close'=>$request->time_open_and_close
        ]);
        return $this->apiReturn([], CodeEnum::SUCCESS);
    }

    /// Informacion


    public function getRedesSociales(){
        $redes_sociales=contactos::query()->first();
        return $this->apiReturn([
            'facebook'=>$redes_sociales->link_facebook,
            'twitter'=>$redes_sociales->link_twitter,
            'instagram'=>$redes_sociales->link_instagram,
        ], CodeEnum::SUCCESS);
    }

    public function updateRedesSociales(Request $request){
        $request->validate([
            'facebook'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
        ]);
        $redes_sociales=contactos::query()->first();
        $redes_sociales->update([
            'link_facebook'=>$request->facebook,
            'link_twitter'=>$request->twitter,
            'link_instagram'=>$request->instagram,
        ]);
        return $this->apiReturn([
            'facebook'=>$redes_sociales->link_facebook,
            'twitter'=>$redes_sociales->link_twitter,
            'instagram'=>$redes_sociales->link_instagram,
        ], CodeEnum::SUCCESS);
    }


    public function getDirrecion(){
        $redes_sociales=contactos::query()->first();
        return $this->apiReturn([
            'dirrecion'=>$redes_sociales->dirrecion,
        ], CodeEnum::SUCCESS);
    }


    public function updateDirrecion(Request $request){
        $request->validate([
            'dirrecion'=>'required',
        ]);
        $redes_sociales=contactos::query()->first();
        $redes_sociales->update([
            'dirrecion'=>$request->dirrecion,
        ]);
        return $this->apiReturn([
            'dirrecion'=>$redes_sociales->dirrecion,
        ], CodeEnum::SUCCESS);
    }


    public function getNumeros(){
        $redes_sociales=contactos::query()->first();
        return $this->apiReturn([
            'Numero_1'=>$redes_sociales->numerotelefono1,
            'Numero_2'=>$redes_sociales->numerotelefono2,
        ], CodeEnum::SUCCESS);
    }

    public function updateNumeros(Request $request){
        $request->validate([
            'Numero_1'=>'required',
            'Numero_2'=>'required',
        ]);
        $redes_sociales=contactos::query()->first();
        $redes_sociales->update([
            'numerotelefono1'=>$request->Numero_1,
            'numerotelefono2'=>$request->Numero_2,
        ]);
        return $this->apiReturn([
            'Numero_1'=>$redes_sociales->numerotelefono1,
            'Numero_2'=>$redes_sociales->numerotelefono2,
        ], CodeEnum::SUCCESS);
    }


    public function getCorreoDeContacto(){
        $redes_sociales=contactos::query()->first();
        return $this->apiReturn([
            'correo_electronico'=>$redes_sociales->correo_electronico,
        ], CodeEnum::SUCCESS);
    }

    public function updateCorreoDeContacto(Request $request){
        $request->validate([
            'correo_electronico'=>'required',
        ]);
        $redes_sociales=contactos::query()->first();
        $redes_sociales->update([
            'correo_electronico'=>$request->correo_electronico,
        ]);
        return $this->apiReturn([
            'correo_electronico'=>$redes_sociales->correo_electronico,
        ], CodeEnum::SUCCESS);
    }

    public function updateHeaderContactanos(Request $request){
        $request->validate([
            'titulo'=>'required',
            //'img_url'=>'image'
        ]);
        $header=contactos::query()->first();

        if ($request->file('img_url')) {
            $url = Storage::put('image', $request->file('img_url'));
            Storage::delete($header->img_url_fondo);
            $header->update([
                'img_url_fondo' =>'storage/' .  $url
            ]);
        }
        $header->update([
            'title1'=>$request->titulo
        ]);
        return $this->apiReturn([
            $header
        ], CodeEnum::SUCCESS);

    }

}
