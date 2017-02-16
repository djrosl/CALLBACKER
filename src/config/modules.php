<?php

return array_merge(require(__DIR__ . '/installed_modules.php'), [
   'core' => ['class' => 'nullref\core\Module'],
   'admin' => [
      'class' => 'app\modules\admin\Module',
       'controllerMap' => [  //controllers
          'main' => 'app\modules\admin\controllers\MainController',
       ],
    ],
]);