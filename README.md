# humhub-DLRG-oAuth2

## Anleitung:

- Beantrage beim  AKI einen oAuth2 Zugang [DLRG WIKI](https://atlas.dlrg.de/confluence/pages/viewpage.action?pageId=53641306)
  - Die URI die der AKI hinterlegen muss lautet  https://DOMAIN.de/user/auth/external?authclient=DLRG

- Lade die Datei DLRG.php in folgenden Ordner: /protected/humhub/modules/user/authclient/

- füge folgende Code in folgende Datei ein: /protected/config/common.php

```
'DLRG' => [
                    'class' => 'humhub\modules\user\authclient\DLRG',
                    'clientId' => 'xxx',
                    'clientSecret' => 'xxx',
             	],
```      
> Du musst die xxx durch die Client-Id und den Client-Secret den der AKI dir zuschickt ersetzen



#### Ein Beispiel wie eure common.php am Ende aussehen könnte
##### Weitere Informatioen findet ihr im Installation and Setup Space auf [community.humhub.com](https://community.humhub.com/s/installation-and-setup/wiki/page/view?title=Install+%26+Setup+Wiki+Home)
```
<?php

return [
    'components' => [
    // ...
        'authClientCollection' => [
            'clients' => [

            	'DLRG' => [
                    'class' => 'humhub\modules\user\authclient\DLRG',
                    'clientId' => 'xxx',
                    'clientSecret' => 'xxx',
             	],
                // ...
                'facebook' => [
                    'class' => 'humhub\modules\user\authclient\Facebook',
                    'clientId' => 'xxx',
                    'clientSecret' => 'xxx',
               ],
               'google' => [
                    'class' => 'humhub\modules\user\authclient\Google',
                    'clientId' => 'xxx',
                    'clientSecret' => 'xxx',
               ],
               'live' => [
                    'class' => 'humhub\modules\user\authclient\Live',
                    'clientId' => 'xxx',
                    'clientSecret' => 'xxx',
                ],
              ],
             ],
       //...
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
        ],

        //...

    ]


];
```
