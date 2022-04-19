<?php

namespace App\Http\Controllers;

use App\Enum\CodeEnum;
use App\Http\Resources\EmailResource;
use App\Traits\Apitraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Util\Exception;


class MailController extends Controller
{
    use Apitraits;
    public function MailSend(Request $request){
        $request->validate([
            'name'=>'required',
            'correo'=>'required',
            'asunto'=>'required',
            'ciudad'=>'required',
            'body'=>'required',
        ]);
        $data=$request->all();
        $massage='';
        $email=DB::table('email_own')->first();
        if (!is_null($email)) {
            try {
                Mail::send("Mail.mail", $data, function ($message) use ($data,$email){
                    $message->from($data['correo'], $data['name'])
                        ->to($email->email, 'Admin')
                        ->subject('Has recibido un correo nuevo desde tu pagina web!');
                });
            }catch (Exception $exception){
                $massage="Los servicios de email no han sido completamente configurados";
            }
        }

        DB::table('emails')->insert([
            'correo_from'=>$request->correo,
            'correo_to'=>  is_null($email?->email) ? " 'Vacío' " : $email?->email,
            'name'=>$request->name,
            'asunto'=>$request->asunto,
            'ciudad'=>$request->ciudad,
            'body'=>$request->body,
            'created_at'=>now()
        ]);
        return $this->apiReturn(['Email enviado con exito!', $massage],CodeEnum::SUCCESS);
    }

    public function getEmails(){
        $data=DB::table('emails')-> paginate(8);
        return $this->apiReturn([EmailResource::collection($data)->response()->getData(true)],CodeEnum::SUCCESS);
    }

    public function searchEmail($name){
        $data=DB::table('emails')
            ->where('name', 'LIKE',"%".$name."%")
            ->orWhere('correo_from', 'LIKE',"%".$name."%")
            ->orWhere('asunto', 'LIKE',"%".$name."%")
            ->orWhere('ciudad', 'LIKE',"%".$name."%")
            ->orWhere('created_at', 'LIKE',"%".$name."%")
            ->paginate(8);
        return $this->apiReturn([EmailResource::collection($data)->response()->getData(true)],CodeEnum::SUCCESS);
    }



    public function getEmailOwn(){
        $email=DB::table('email_own')->first();
        if (is_null($email)) return $this->apiReturn([], CodeEnum::SUCCESS);
        return $this->apiReturn([
            'email'=>$email->email,
            'created_at'=>Carbon::parse($email->created_at)->diffForHumans(),
            'updated_at'=>Carbon::parse($email->updated_at)->diffForHumans()
        ],CodeEnum::SUCCESS);
    }

    public function updateEmailOwn(Request $request,$id){
        $request->validate([
            'email'=>'required'
        ]);
        DB::table('email_own')->whereId($id)->update([
                'email'=> $request->email,
                'updated_at'=> Carbon::now()
        ]);
        return $this->apiReturn(['Correo actualizado'],CodeEnum::SUCCESS);
    }

    public function storeEmailOwn(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        if (is_null(DB::table('email_own')->first())){
            $email=DB::table('email_own')->insert([
                'email'=>$request->email,
                'created_at'=> Carbon::now()
            ]);
            return $this->apiReturn(['Correo insertado!'],CodeEnum::SUCCESS);
        }

        return $this->apiReturn(['Ya exite un correo'],CodeEnum::FAIL);
    }
        public function deleteEmailOwm($id){
            $email=DB::table('email_own')->whereId($id)->delete();
            return $this->apiReturn([],CodeEnum::SUCCESS);
        }
}
