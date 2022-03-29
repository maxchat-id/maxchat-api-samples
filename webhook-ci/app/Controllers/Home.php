<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use Config\Services;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('welcome_message');
    }

    public function webhook()
    {
        if ($this->request->getMethod() !== 'post') {
            return $this->setResponseFormat('json')
                ->respond(['code' => 405, 'message' => 'method not allowed'], 405);
        }

        $request = $this->request->getJSON();
        if ($request === null) {
            return $this->setResponseFormat('json')
                ->respond(['code' => 401, 'message' => 'wrong format'], 401);
        }

        $data    = $request->data;
        $payload = ['to' => $data->sender, 'text' => $data->text];
        $options = [
            'json'    => $payload,
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer J3MEXfKs8SCtebhX6SyaXS',
            ],
        ];

        $client   = Services::curlrequest();
        $response = $client->request('POST', env('maxchat.apiUrl', 'http://localhost:10001') . '/messages', $options);

        $result = $response->getBody() ? ['message' => 'ok', 'send' => true] : ['message' => 'not ok', 'send' => false];

        return $this->setResponseFormat('json')->respond($result, 200);
    }
}
