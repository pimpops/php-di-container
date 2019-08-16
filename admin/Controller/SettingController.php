<?php

namespace Admin\Controller;

use Site\Model\MenuItem\MenuItemRepository;
use Core\Worker\Template\Theme;

class SettingController extends AdminController {

  public function general() {

    $this->load->model('Setting');

    $data['settings'] = $this->model->setting->getSettings();
    $data['languages'] = languages();

    $this->view->render('setting/general', $data);
  }

  public function menus() {
    $this->load->model('Menu', false, 'Site');
    $this->load->model('MenuItem', false, 'Site');

    $menuId = isset($this->request->get['menu_id']) ? $this->request->get['menu_id'] : null;
    
    $data['menuId']   = $menuId; 
    $data['menus']    = $this->model->menu->getList();
    $data['editMenu'] = $this->model->menuItem->getItems($data['menuId']);
    $this->view->render('setting/menus', $data);
  }

  public function ajaxMenuAdd() {
    $params = $this->request->post;
    $this->load->model('Menu', false, 'Site');
    if (isset($params['name']) && strlen($params['name']) > 0) {
        $addMenu = $this->model->menu->add($params);
        echo $addMenu;
    }
  }
  public function ajaxMenuAddItem() {

      $params = $this->request->post;

      $this->load->model('MenuItem', false, 'Site');

      if (isset($params['menu_id']) && strlen($params['menu_id']) > 0) {
      
          $id = $this->model->menuItem->add($params);
          $item = new \stdClass;
          $item->id   = $id;
          $item->name = MenuItemRepository::NEW_MENU_ITEM_NAME;
          $item->link = '#';
          Theme::block('setting/menu_item', [
              'item' => $item
          ]);
      }
  }

  public function ajaxMenuSortItems()
    {
        $params = $this->request->post;
        $this->load->model('MenuItem', false, 'Site');
        if (isset($params['data']) && !empty($params['data'])) {
            $sortItem = $this->model->menuItem->sort($params);
        }
    }
    public function ajaxMenuRemoveItem()
    {
        $params = $this->request->post;
        $this->load->model('MenuItem', false, 'Site');
        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->menuItem->remove($params['item_id']);
            echo $removeItem;
        }
    }

    public function ajaxMenuUpdateItem() {

      $params = $this->request->post;

      $this->load->model('MenuItem', false, 'Site');
      if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
          $this->model->menuItem->update($params);
      }
  }

  public function updateSetting() {

    $this->load->model('Setting');
    $this->load->model('User');

    $params = $this->request->post;

    if (isset($params['admin_email'])) {
      $user['id'] = $this->data['user']->id;
      $user['email'] = $params['admin_email'];

      $this->model->user->updateEmail($user);
    }

    $this->model->setting->update($params);
  }

  public function themes() {
    $this->data['themes'] = getThemes();
    $this->data['activeTheme'] = \Setting::get('active_theme');
    $this->view->render('setting/themes', $this->data);
  }

  public function activateTheme()
    {
        $params = $this->request->post;
        $this->load->model('Setting');
        $this->model->setting->updateActiveTheme($params['theme']);
    }
}

?>
