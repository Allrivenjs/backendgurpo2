<?php

namespace App\Http\Controllers\Paginate;

use App\Enum\CodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientesHeaderResource;
use App\Http\Resources\Paginas\cartelerasDResource;
use App\Http\Resources\Paginas\Pagina1Resource;
use App\Http\Resources\Quienessomosresource;
use App\Http\Resources\TeamHumanResource;
use App\Models\ayudamos_crecer;
use App\Models\Clientes;
use App\Models\Clientes_items;
use App\Models\contactos;
use App\Models\descargas;
use App\Models\descargas_items;
use App\Models\help_area;
use App\Models\items_nuestro_servicio;
use App\Models\nuestro_servicio;
use App\Models\paginas;
use App\Models\Quienes_somos;
use App\Models\second_block;
use App\Models\Slider_ayudamos_crecer;
use App\Models\slider_principal;
use App\Models\team_human;
use App\Models\third_block;
use App\Traits\Apitraits;
use App\Http\Resources\DataCollection;
use Illuminate\Support\Facades\DB;


class PrimaryPaginate extends Controller
{
    use Apitraits;
    /**Homepage
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SliderPrincipal=slider_principal::all();
        $second_block=second_block::all();
        $third_block=third_block::all();
        $items_nuestro_servicio= items_nuestro_servicio::all();
        $ayudamos_crece=ayudamos_crecer::all();
        $slider_ayudamos_crecer=Slider_ayudamos_crecer::all();
        $team_human=team_human::query()->first();
        $help_area=help_area::all();

        return $this->apiReturn([
            'sliderP'=>  new DataCollection($SliderPrincipal),
            'help_area'=>new DataCollection($help_area),
            'second_block'=> new DataCollection($second_block),
            'third_block' => new DataCollection($third_block),
            'items_nuestro_servicio'=> new DataCollection($items_nuestro_servicio),
            'ayudamos_a_crecer'=>[
                new DataCollection($ayudamos_crece),
                'items'=>new DataCollection($slider_ayudamos_crecer)
            ],
            'team_human'=>[
                new TeamHumanResource($team_human),
            ]

        ],CodeEnum::SUCCESS);
    }



    public function asesoriasadministrativas(){
        $pagina1 =  paginas::first();
        return $this->apiReturn([new Pagina1Resource($pagina1)],CodeEnum::SUCCESS);
    }

    public function asesoriasfinancieras(){
        $pagina2 =  paginas::query()->where('id',2)->get();

        return $this->apiReturn([new Pagina1Resource($pagina2[0])],CodeEnum::SUCCESS);
    }

    public function cartelerasdigitales(){
        $pagina2=  paginas::query()->where('id',3)->get();
        return $this->apiReturn([new cartelerasDResource($pagina2[0])],CodeEnum::SUCCESS);
    }

    public function creaciondeempresas(){
        $pagina2=  paginas::query()->where('id',4)->get();
        return $this->apiReturn([new Pagina1Resource($pagina2[0])],CodeEnum::SUCCESS);
    }
    public function normasniff(){
        $pagina2=  paginas::query()->where('id',5)->get();
        return $this->apiReturn([new Pagina1Resource($pagina2[0])],CodeEnum::SUCCESS);
    }
    public function blogHeader(){
        $pagina2=  paginas::query()->where('id',6)->get();
        return $this->apiReturn([new Pagina1Resource($pagina2[0])],CodeEnum::SUCCESS);
    }
    public function avisoPrivacidad(){
        $pagina2=  paginas::query()->where('id',7)->get();
        return $this->apiReturn([new Pagina1Resource($pagina2[0])],CodeEnum::SUCCESS);
    }
    public function clausulaConosentimientoWeb(){
        $pagina2=  paginas::query()->where('id',8)->get();
        return $this->apiReturn([new Pagina1Resource($pagina2[0])],CodeEnum::SUCCESS);
    }

    public function nuestro_servicio(){
        $nuestro_servicio = nuestro_servicio::all();
        $items_nuestor_servicio = items_nuestro_servicio::all();
        return $this->apiReturn([
            'nuestro_servicio'=>$nuestro_servicio,
            'items_nuestro_servicio'=>$items_nuestor_servicio

        ],CodeEnum::SUCCESS);
    }

    public function quienes_somos(){
        $quienes_somos=Quienes_somos::query()->first();
        $team_human=team_human::query()->first();
        return $this->apiReturn([
            new Quienessomosresource($quienes_somos),
            'team_human'=> new TeamHumanResource($team_human),
            ],CodeEnum::SUCCESS);
    }

    public function clientes(){
        $clientes=Clientes::query()->first();
        $items_clientes=Clientes_items::latest('id')->paginate(12);
        return $this->apiReturn([new ClientesHeaderResource($clientes),
            'items'=> $items_clientes],CodeEnum::SUCCESS);
    }

    public function descargas(){
        $descargas= descargas::all();
        $descargas_items = descargas_items::latest('id')->paginate(7);

        return $this->apiReturn([$descargas,
            'items'=> $descargas_items
            ],CodeEnum::SUCCESS);
    }

    public function contactenos(){
        $contactenos=contactos::all();
        $data=DB::table('business_hours')->get();

        return $this->apiReturn([$contactenos,
            'time'=>$data],CodeEnum::SUCCESS);
    }


}
