<?php

namespace Roseffendi\Notes\Http\Controllers\Backend;

use Increative\Foundation\Http\Controllers\AdminController;
use Roseffendi\Notes\Repositories\NotnotTokenRepository;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class NotesController extends AdminController
{
    protected $notnotTokenRepository;

    protected $config;

    protected $auth;

    public function __construct(NotnotTokenRepository $notnotTokenRepository, Config $config, Guard $auth)
    {
        $this->notnotTokenRepository = $notnotTokenRepository;
        $this->config = $config;
        $this->auth = $auth;
    }

    public function getIndex()
    {
        $token = $this->getToken();

        if(!$token) {
            return view('notes::backend.notes.authorize', $this->getNotnotParams());
        }
    }

    public function getAccessCode(Request $request)
    {
        $code = $request->input('code');

        if($code) {
            $params = $this->getNotnotParams();

            $client = new \GuzzleHttp\Client();
            try{
                $res = $client->request('POST', $params['urlAccessToken'], [
                    'grant_type' => 'authorization_code',
                    'client_id' => $params['clientId'],
                    'client_secret' => $params['clientSecret'],
                    'redirect_uri' => $params['redirectUri'],
                    'code' => $code
                ]);

                dd($res);
            }catch(RequestException $e) {
                dd( $e->getRequest() );
                dd( get_class_methods($e) );
            }

        }else{
            return redirect(route('admin.notes.note.index.get'));
        }
    }

    protected function getToken()
    {
        $userId = $this->auth->user()->id;

        return $this->notnotTokenRepository->findByUserId($userId);
    }

    protected function getNotnotParams()
    {
        $clientId = $this->config->get('notes.notnot.client_id');
        $clientSecret = $this->config->get('notes.notnot.client_secret');
        $redirectUri = $this->config->get('notes.notnot.redirect_uri');
        $responseType = $this->config->get('notes.notnot.response_type');
        $authorizeUrl = $this->config->get('notes.notnot.url_authorize');
        $urlAccessToken = $this->config->get('notes.notnot.url_access_token');

        return compact('clientId', 'clientSecret', 'redirectUri', 'responseType', 'authorizeUrl', 'urlAccessToken');
    }
}