<?php

namespace Admin\Controller;

class SettingController extends AdminController {

  public function general() {

    $this->load->model('Setting');

    $data['settings'] = $this->model->setting->getSettings();
    $data['languages'] = languages();


    $this->view->render('setting/general', $data);
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
}

?>
