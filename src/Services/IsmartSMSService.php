<?php

namespace S4D\Laravel\IsmartSMS\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class IsmartSMSService {
    public ?array $rawResults;
    private bool $isFlash = false;
    public function setFlashSMS(): static {
        $this->isFlash = true;
        return $this;
    }
    public function unsetFlashSMS(): static {
        $this->isFlash = false;
        return $this;
    }
    public function sendSMS($receiver, $message): bool {
        $result = false;
        $language = (int) preg_match("/\p{Arabic}/u", $receiver)? '64' : '0';
        $client = new Client();
        $response = $client->request('POST', config('ismartsms.service_url'), [
            'form_params' => [
                'UserID' => config('ismartsms.user_id'),
                'Password' => config('ismartsms.password'),
                'Message' => $message,
                'Language' => $language,
//                'ScheddateTime' => Carbon::now(),
                'MobileNo' => strlen($receiver) == 8? '968'.$receiver : $receiver,
                'RecipientType' => $this->isFlash == 1? 9 : 1
            ],
        ]);
        try {
            $body = json_decode($response->getBody()->getContents(), true);
            $this->rawResults = $body;
            if($body['Code'] == 1){
                $result = true;
            }
        } catch (\Exception $e) {
            throw new \Exception('Unable to send SMS, error: '.$e->getMessage());
        }
        return $result;
    }
    public function getRawResults(){
        return $this->rawResults;
    }
}
