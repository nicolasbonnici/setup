<?php

namespace modules\setup\Controllers;

/**
 * Manage Core Setup HomeController
 *
 * @author info
 */
class HomeController extends \Library\Core\Auth {

    public function __preDispatch() {}

    public function __postDispatch() {}

    public function indexAction()
    {
        $oApp = new \Library\Core\App();
        $this->_view['core_version'] = \Library\Core\App::APP_VERSION;
        $this->_view['core_release_name'] = \Library\Core\App::APP_RELEASE_NAME;
        $this->_view['php_version'] = $oApp->getPhpVersion();
        $this->render('setup/index.tpl');
    }

    public function usersAction()
    {
        $oUsers = new \app\Entities\Collection\UserCollection();
        $oUsers->load();
        $this->_view['oUsers'] = $oUsers;

        $this->render('setup/users.tpl');
    }

    public function entitiesAction() {

        $aDatabaseEntitiesClass = array();
        $aDatabaseEntities = \Library\Core\Tools::getDatabaseEntities();
        foreach ($aDatabaseEntities as $aEntity) {
            $sDatabaseEntityName = $aEntity['TABLE_NAME'];
            $aDatabaseEntitiesClass[] = \Library\Core\Scaffold::generateEntity($sDatabaseEntityName);
        }

        $this->_view['aDatabaseEntitiesClass'] = $aDatabaseEntitiesClass;
        $this->render('setup/entities.tpl');
    }

    public function aclAction() {


        $this->render('setup/acl.tpl');
    }
}

?>
