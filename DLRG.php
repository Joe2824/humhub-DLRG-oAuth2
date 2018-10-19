<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.org/en/licences
 * @author Joel Klein || DLRG Ortsgruppe Dorheim e.V.
 */
namespace humhub\modules\user\authclient;
use Yii;
use yii\helpers\Url;
use yii\base\ErrorException;
use yii\authclient\OAuth2;

class DLRG extends OAuth2 {
    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-life-ring',
            'buttonBackgroundColor' => '#e30613',
        ];
    }
    /**
     * @inheritdoc
     */
    public $authUrl = 'https://www.dlrg.net/oauth2/authorize';
    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://www.dlrg.net/oauth2/token';
    /**
     * @inheritdoc
     */
    public $apiBaseUrl = 'https://www.dlrg.net/';
    /**
     * @inheritdoc
     */

    public function init(){
        parent::init();
        if ($this->scope === null) {
            $this->scope = implode(' ', [
                'profile',
                'email',
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    protected function initUserAttributes()
    {
        $userinfo = $this->api('oauth2/userinfo', 'GET', [], ['Accept' => 'application/json']);
        return [
            'id' => $userinfo['sub'],
            'email' => $userinfo['email'],
            'firstname' => $userinfo['given_name'],
            'lastname' => $userinfo['family_name'],
        ];        
    }
    /**
     * @inheritdoc
     */
    public function applyAccessTokenToRequest($request, $accessToken)
    {
        $request->getHeaders()->set('Authorization', 'Bearer '. $accessToken->getToken());
    }
    /**
     * @inheritdoc
     */
    protected function defaultName() {
        return 'DLRG';
    }
    /**
     * @inheritdoc
     */
    protected function defaultTitle() {
        return 'DLRG';
    }
}
