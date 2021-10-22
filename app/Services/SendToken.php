<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Postmark\PostmarkClient;
use \Illuminate\Support\Facades\URL;

class SendToken
{
    private $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function send(){
      $token = $this->generateToken();

      if ($this->updateUser($token)){
        $this->emailRender($token);
      }
    }
    private function generateToken(): string
    {
        return Str::random(18);
    }

    private function emailRender($token){
      try {
        $client = new PostmarkClient(env('POSTMARK_TOKEN'));
        $clientemail = $client->sendEmailWithTemplate(
          env('MAIL_FROM_ADDRESS'),
          $this->user->email,
          23525533,
          $this->getDataDefault([
            "name" => $this->user->name,
            "email" => $this->user->email,
            "token" => $token,
          ])
        );
      } catch (\Exception $e) {
          \Log::error($e->getMessage());
      }

    }
    private function updateUser($token){
        try {
            $this->user->password_reset()->create(["token"=> $token , "email" => $this->user->email  ]);
            return  true;
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return false;
        }
    }

    private function getDataDefault($data = []){

        $data['token'] = $data['token'] ?? '';
        $data['mail_for_support'] = env('MAIL_FOR_SUPPORT');
        $data['token'] = env('URL_REDIRECT_RECOVERTY_PASSWORD') . '/' . $data['token'];

        return $data;
    }

}
