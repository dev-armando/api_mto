<?php

namespace App\Services;

use Postmark\PostmarkClient;

class SendContact
{

    public function send($data){
      try {
        $client = new PostmarkClient(env('POSTMARK_TOKEN'));
        $emails=env('MAIL_TO_ADMIN');
        $clientemail = $client->sendEmailWithTemplate(
          env('MAIL_FROM_ADDRESS'),
          $emails,
          23721950,
          $this->getDataDefault($data)
        );
        return true;
      } catch (\Exception $e) {
          \Log::error($e->getMessage());
        return false;
      }

    }

    private function getDataDefault($data = []){
        $data['mail_for_support'] = env('MAIL_FOR_SUPPORT');
        return $data;
    }

}
