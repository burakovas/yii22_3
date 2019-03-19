<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-29
 * Time: 18:41
 */

namespace console\controllers;

use yii\console\Controller;
use yii\rbac\DbManager;

class RbacController extends Controller
{
    public function actionIndex(){

        $authManager = \Yii::$app->authManager;

        $admin = $authManager->createRole('admin');
        $user = $authManager->createRole('user');

        $authManager->add($admin);
        $authManager->add($user);

        $permissionAdminPermissions = $authManager->createPermission('AdminPermissions');
        $permissionUserPermissions = $authManager->createPermission('UserPermissions');

        $authManager->add($permissionAdminPermissions);
        $authManager->add($permissionUserPermissions);

        $authManager->addChild($admin, $permissionAdminPermissions);
        $authManager->addChild($user, $permissionUserPermissions);

        $authManager->assign($admin, 1);
        $authManager->assign($user, 2);

    }


}