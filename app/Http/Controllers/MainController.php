<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Biplane\YandexDirect\Api\V5\Contract\AdFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\AdsSelectionCriteria;
use Biplane\YandexDirect\Api\V5\Contract\GetAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\StateEnum;
use Biplane\YandexDirect\User;
use GuzzleHttp;
use Faker;
use App\ProjectData;

class MainController extends Controller
{
    public function test(){
//        phpinfo();
//
//        $user = new User([
//            'access_token' => 'AQAAAAATOmGgAAUSGLIB6Dx-e0pHhjffLz58qdU',
//            'login' => 'it-invest-ekb',
//            'locale' => User::LOCALE_RU,
//        ]);
//
//        $criteria = AdsSelectionCriteria::create()
//            ->setCampaignIds([123])
//            ->setStates([
//                StateEnum::ON,
//            ]);
//
//        $payload = GetAdsRequest::create()
//            ->setSelectionCriteria($criteria)
//            ->setFieldNames([
//                AdFieldEnum::AD_CATEGORIES,
//                AdFieldEnum::AGE_LABEL,
//                AdFieldEnum::AD_GROUP_ID,
//                AdFieldEnum::ID,
//                AdFieldEnum::STATUS,
//            ]);
//
//        $response = $user->getAdsService()->get($payload);
//        var_dump($response);
//        foreach ($response->getAds() as $ad) {
//
//            // here $ad is instance of Biplane\YandexDirect\Api\V5\Contract\AdGetItem
//        }
        session_start();

        $clientId     = '724eb7ef50cd454dbb4cd8e09ce6fbc6'; // ID приложения
        $clientSecret = '686ee18892854866a1b49608492d706d'; // Пароль приложения
        $redirectUri  = 'http://127.0.0.1:8000/token_test'; // Адрес, на который будет переадресован пользователь после прохождения авторизации

// Формируем ссылку для авторизации
        $params = array(
            'client_id'     => $clientId,
            'redirect_uri'  => $redirectUri,
            'response_type' => 'code',

            // Список необходимых приложению в данный момент прав доступа, разделенных пробелом.
            // Права должны запрашиваться из перечня, определенного при регистрации приложения.
            // Узнать допустимые права можно по ссылке https://oauth.yandex.ru/client/<client_id>/info, указав вместо <client_id> идентификатор приложения.
            // Если параметр scope не передан, то токен будет выдан с правами, указанными при регистрации приложения.
            // Параметр позволяет получить токен только с теми правами, которые нужны приложению в данный момент.
            'scope'         => 'direct:api metrika:read',
        );

        echo '<a href="https://oauth.yandex.ru/authorize?' . http_build_query( $params ) . '">Авторизация через Яндекс</a>';


        if ( isset( $_GET['code'] ) ) {

            // Формирование параметров (тела) POST-запроса с указанием кода подтверждения
            $query = array(
                'grant_type'    => 'authorization_code',
                'code'          => $_GET['code'],
                'client_id'     => $clientId,
                'client_secret' => $clientSecret
            );
            $query = http_build_query( $query );

            // Формирование заголовков POST-запроса
            $header = "Content-type: application/x-www-form-urlencoded";

            // Выполнение POST-запроса
            $opts    = array(
                'http' =>
                    array(
                        'method'  => 'POST',
                        'header'  => $header,
                        'content' => $query
                    )
            );
            $context = stream_context_create( $opts );

            if ( ! $content = @file_get_contents( 'https://oauth.yandex.ru/token', false, $context ) ) {
                $error = error_get_last();
                throw new Exception( 'HTTP request failed. Error: ' . $error['message'] );
            }

            $response = json_decode( $content );

            // Если при получении токена произошла ошибка
            if ( isset( $response->error ) ) {
                throw new Exception( 'При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description );
            }

            $accessToken = $response->access_token; // OAuth-токен с запрошенными правами или с правами, указанными при регистрации приложения.
            $expiresIn   = $response->expires_in; // Время жизни токена в секундах.

            // Токен, который можно использовать для продления срока жизни соответствующего OAuth-токена.
            // https://tech.yandex.ru/oauth/doc/dg/reference/refresh-client-docpage/#refresh-client
            $refreshToken = $response->refresh_token;

            // Сохраняем токен в сессии
            $_SESSION['yaToken'] = array( 'access_token' => $accessToken, 'refresh_token' => $refreshToken );


        } elseif ( isset( $_GET['error'] ) ) { // Если при авторизации произошла ошибка

            throw new Exception( 'При авторизации произошла ошибка. Error: ' . $_GET['error']
                . '. Error description: ' . $_GET['error_description'] );
        }
    }
    public function testApi(){
//        session_start();
//        var_dump($_SESSION['yaToken']);
//        session_start();

//        $user = new User([
//            'access_token' => 'AQAAAAATOmGgAAUSPpBa_v3CMEjngGizthHDKlI',
//            'login' => 'it-invest-ekb',
//            'locale' => User::LOCALE_RU,
//            'sandbox' =>true
//        ]);
//
//        $criteria = AdsSelectionCriteria::create()
//            ->setCampaignIds([272403,272404,272405])
//            ->setStates([
//                StateEnum::ON,
//            ]);
//
//        $payload = GetAdsRequest::create()
//            ->setSelectionCriteria($criteria)
//            ->setFieldNames([
//                AdFieldEnum::AD_CATEGORIES,
//                AdFieldEnum::AGE_LABEL,
//                AdFieldEnum::AD_GROUP_ID,
//                AdFieldEnum::ID,
//                AdFieldEnum::STATUS,
//            ]);
//
//        $response = $user->getAdsService()->get($payload);
//        var_dump($response);
//        foreach ($response->getAds() as $ad) {
//
//            // here $ad is instance of Biplane\YandexDirect\Api\V5\Contract\AdGetItem
//        }




        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://api-sandbox.direct.yandex.com/json/v5/campaigns');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'{"method":"get",
        "params":{"SelectionCriteria":{
            
        },
        "FieldNames": ["Id", "Name", "Status", "Type"]
            }
        }');  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $clientLogin = 'it-invest-ekb';
        $headers = [
            'POST /json/v5/campaigns/ HTTP/1.1',
            'Host: api-sandbox.direct.yandex.com',
            'Authorization: Bearer AQAAAAATOmGgAAUSPpBa_v3CMEjngGizthHDKlI',
            'Accept-Language: ru',
            'Client-Login:it-invest-ekb',
            'Content-Type: application/json; charset=utf-8',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec ($ch);
        curl_close ($ch);

        print  $server_output;


    }


}
