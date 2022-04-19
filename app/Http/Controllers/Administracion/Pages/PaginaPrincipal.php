<?php

namespace App\Http\Controllers\Administracion\Pages;

use App\Enum\CodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\ayudamos_crecer;
use App\Models\eq_human_items;
use App\Models\help_area;
use App\Models\items_nuestro_servicio;
use App\Models\second_block;
use App\Models\Slider_ayudamos_crecer;
use App\Models\slider_principal;
use App\Models\team_human;
use App\Models\third_block;
use App\Traits\Apitraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Exception;

class PaginaPrincipal extends Controller
{
    use Apitraits;

    //time open and close
    public function getTimeOpenClose(){
        return $this->apiReturn([DB::table('business_hours')->first()], CodeEnum::SUCCESS);
    }

    public function updateTimeOpenClose(Request $request){
        $request->validate([
            'time'=>'required'
        ]);
        if (is_null(DB::table('business_hours')->first())){
            $data=DB::table('business_hours')->insert([
                'time_open_and_close'=>$request->time
            ]);
            return $this->apiReturn([$data],CodeEnum::SUCCESS);
        }
    }

//Slider Principal //
    public function getSliderPrincipal()
    {
        $SliderPrincipal = slider_principal::all();
        return $this->apiReturn([$SliderPrincipal], CodeEnum::SUCCESS);
    }

//    public function storeSliderPrincipal(Request $request)
//    {
//        $request->validate([
//            'title_slider' => 'required',
//            'subtitle_slider' => 'required',
//            'link_button_slider' => 'required',
//            'Url_image' => 'image',
//        ]);
//
//        $url = Storage::put('Slider', $request->file('Url_image'));
//        $SliderPrincipal = slider_principal::create([
//            'title_slider' => $request->title_slider,
//            'subtitle_slider' => $request->subtitle_slider,
//            'link_button_slider' => $request->link_button_slider,
//            'Url_image' => 'storage/' . $url
//        ]);
//        return $this->apiReturn([$SliderPrincipal], CodeEnum::SUCCESS);
//    }

    public function updateSliderPrincipal(Request $request, $idSlider)
    {
        $SliderPrincipal = slider_principal::query()->findOrFail($idSlider);
        if (is_null($SliderPrincipal)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'title_slider' => 'required',
            'subtitle_slider' => 'required',
            'link_button_slider' => 'required',
//            'Url_image' => 'image',
        ]);

        if ($request->file('Url_image')) {
            $url = Storage::put('Slider', $request->file('Url_image'));
            Storage::delete($SliderPrincipal->Url_image);
            $SliderPrincipal->update([
                'Url_image' => 'storage/' . $url
            ]);
        }
        $SliderPrincipal->update([
            'title_slider' => $request->title_slider,
            'subtitle_slider' => $request->subtitle_slider,
            'link_button_slider' => $request->link_button_slider,
        ]);

        return $this->apiReturn([$SliderPrincipal], CodeEnum::SUCCESS);
    }

//    public function destroySliderPrincipal($idSlider)
//    {
//
//        $SliderPrincipal = slider_principal::query()->find($idSlider);
//        if ($SliderPrincipal) {
//            $SliderPrincipal->delete();
//            return $this->apiReturn([], CodeEnum::SUCCESS);
//        } else {
//            return $this->apiReturn([], CodeEnum::FAIL);
//        }
//    }
//END Slider Principal //

//Second Block //
    public function getSecondBlock()
    {
        $second_block = second_block::all();
        return $this->apiReturn([$second_block], CodeEnum::SUCCESS);
    }

    public function updateSecondBlock(Request $request)
    {
        $second_block = second_block::query()->find(1);
        $request->validate([
            'title_sb' => 'required',
            'subtitle_sb' => 'required',
            'content_sb' => 'required',
//            'url' => 'image',
        ]);
        if ($request->file('url')) {
            $url = Storage::put('image', $request->file('url'));
            Storage::delete($second_block->url);
            $second_block->update([
                'url' => 'storage/' . $url
            ]);
        }
        $second_block->update([
            'title_sb' => $request->title_sb,
            'subtitle_sb' => $request->subtitle_sb,
            'content_sb' => $request->content_sb,
        ]);

        return $this->apiReturn([$second_block], CodeEnum::SUCCESS);
    }
//END Second Block //

//Third Block //
    public function getThirdBlock()
    {
        $third_block = third_block::all();
        return $this->apiReturn([$third_block], CodeEnum::SUCCESS);
    }

    public function updateThirdBlock(Request $request)
    {
        $third_block = third_block::query()->find(1);

        $request->validate([
            'title_tb' => 'required',
            'subtitle_tb' => 'required',
            'content_tb' => 'required',
        ]);

        $third_block->update([
            'title_tb' => $request->title_tb,
            'subtitle_tb' => $request->subtitle_tb,
            'content_tb' => $request->content_tb,
        ]);

        return $this->apiReturn([$third_block], CodeEnum::SUCCESS);
    }
//END Third Block //



//Ayudamos crecer empresa//
//Texto principal //
    public function getAyudamosCrecer()
    {
        $ayudamos_crece = ayudamos_crecer::all();
        return $this->apiReturn([$ayudamos_crece], CodeEnum::SUCCESS);
    }

    public function updateAyudamosCrecer(Request $request)
    {
        $ayudamos_crece = ayudamos_crecer::query()->find(1);
        $request->validate([
            'title_ac' => 'required',
            'description_ac' => 'required',
        ]);
        $ayudamos_crece->update([
            'title_ac' => $request->title_ac,
            'description_ac' => $request->description_ac,
        ]);

        return $this->apiReturn([$ayudamos_crece], CodeEnum::SUCCESS);
    }
//END Texto principal //
// Slider ayudanos a crecer //
    public function getSliderAyudanosCrecer()
    {
        $slider_ayudamos_crecer = Slider_ayudamos_crecer::all();
        return $this->apiReturn([$slider_ayudamos_crecer], CodeEnum::SUCCESS);
    }

    public function storeSliderAyudanosCrecer(Request $request)
    {
        $request->validate([
            'estrellas' => 'required',
            'author' => 'required',
            'profession' => 'required',
            'comment' => 'required',
        ]);

        $SliderPrincipal = Slider_ayudamos_crecer::create([
            'estrellas' => $request->estrellas,
            'author' => $request->author,
            'profession' => $request->profession,
            'comment' => $request->comment,
            'ayudC_id' => 1
        ]);
        return $this->apiReturn([$SliderPrincipal], CodeEnum::SUCCESS);
    }

    public function updateSliderAyudanosCrecer(Request $request, $id)
    {
        $slider_ayudamos_crecer = Slider_ayudamos_crecer::query()->find($id);
        if (is_null($slider_ayudamos_crecer)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'estrellas' => 'required',
            'author' => 'required',
            'profession' => 'required',
            'comment' => 'required',
        ]);
        $slider_ayudamos_crecer->update([
            'estrellas' => $request->estrellas,
            'author' => $request->author,
            'profession' => $request->profession,
            'comment' => $request->comment
        ]);

        return $this->apiReturn([$slider_ayudamos_crecer], CodeEnum::SUCCESS);
    }

    public function destroySliderAyudanosCrecer($id)
    {

        $slider_ayudamos_crecer = Slider_ayudamos_crecer::query()->find($id);
        if ($slider_ayudamos_crecer) {
            $slider_ayudamos_crecer->delete();
            return $this->apiReturn([], CodeEnum::SUCCESS);
        } else {
            return $this->apiReturn([], CodeEnum::FAIL);
        }
    }
    //END Slider ayudanos a crecer //

    // Equipo humano //
    public function getTeamHumano()
    {
        $team_human = team_human::all();
        return $this->apiReturn([$team_human], CodeEnum::SUCCESS);
    }

    public function updateTeamHumano(Request $request)
    {
        $team_human = team_human::query()->find(1);
        $request->validate([
            'title_team' => 'required',
            'subtitle_team' => 'required',
//            'url1' => 'image',
        ]);
        if ($request->file('url1')) {
            $url = Storage::put('image', $request->file('url1'));
            Storage::delete($team_human->url1);
            $team_human->update([
                'url1' => 'storage/' . $url
            ]);
        }
        $team_human->update([
            'title_team' => $request->title_team,
            'subtitle_team' => $request->subtitle_team,
        ]);

        return $this->apiReturn([$team_human], CodeEnum::SUCCESS);
    }

    public function getItemsTeamHumano()
    {
        $team_human = team_human::query()->first();
        $items_team_human = eq_human_items::query()->where('pertenece_id', $team_human->id)->get();
        return $this->apiReturn([$items_team_human], CodeEnum::SUCCESS);
    }

    public function updateItemsTeamHumano(Request $request, $id)
    {
        $items_team_human = eq_human_items::query()->find($id);
        if (is_null($items_team_human)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'title_eq' => 'required',
            '_content' => 'required',
        ]);
        $items_team_human->update([
            'title_eq' => $request->title_eq,
            'subtitle_eq' => $request->subtitle_eq,
            'content' => $request->_content,
        ]);

        return $this->apiReturn([$items_team_human], CodeEnum::SUCCESS);
    }

    //help_area //

    public function getHelpArea()
    {
        $help_area = help_area::all();
        return $this->apiReturn([$help_area], CodeEnum::SUCCESS);
    }

    public function updateHelpArea(Request $request, $id)
    {
        $help_area = help_area::query()->find($id);
        if (is_null($help_area)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'item' => 'required'
        ]);
        $help_area->update([
            'item' => $request->item
        ]);
        return $this->apiReturn([$help_area], CodeEnum::SUCCESS);
    }

    public function storeHelpArea(Request $request)
    {
        $request->validate([
            'item' => 'required'
        ]);
        $help_area = help_area::create([
            'item' => $request->item
        ]);
        return $this->apiReturn([$help_area], CodeEnum::SUCCESS);
    }

    public function destroyHelpArea($id)
    {
        $help_area = help_area::query()->find($id);
        if ($help_area) {
            $help_area->delete();
            return $this->apiReturn([], CodeEnum::SUCCESS);
        } else {
            return $this->apiReturn([], CodeEnum::FAIL);
        }
    }

}
