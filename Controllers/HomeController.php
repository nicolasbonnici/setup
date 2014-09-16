<?php
namespace bundles\setup\Controllers;

/**
 * Manage Core Setup HomeController
 *
 * @author info
 */
class HomeController extends \Library\Core\Auth
{

    public function __preDispatch()
    {}

    public function __postDispatch()
    {}

    public function indexAction()
    {
        $this->aView['core_version'] = \Library\Core\App::APP_VERSION;
        $this->aView['core_release_name'] = \Library\Core\App::APP_RELEASE_NAME;
        $this->aView['php_version'] = \Library\Core\App::getPhpVersion();
        $this->oView->render($this->aView, 'setup/index.tpl');
    }

    public function usersAction()
    {
        $oUsers = new \bundles\user\Entities\Collection\UserCollection();
        $oUsers->load();
        $this->aView['oUsers'] = $oUsers;

        $this->oView->render($this->aView, 'setup/users.tpl');
    }

    public function entitiesAction()
    {
        $aDatabaseEntitiesClass = array();
        $aDatabaseEntities = \Library\Core\Tools::getDatabaseEntities();
        foreach ($aDatabaseEntities as $aEntity) {
            $sDatabaseEntityName = $aEntity['TABLE_NAME'];
            $aDatabaseEntitiesClass[] = \Library\Core\Scaffold::generateEntity($sDatabaseEntityName);
        }

        $this->aView['aDatabaseEntitiesClass'] = $aDatabaseEntitiesClass;
        $this->oView->render($this->aView, 'setup/entities.tpl');
    }

    public function aclAction()
    {
        $this->oView->render($this->aView, 'setup/acl.tpl');
    }
}

?>
