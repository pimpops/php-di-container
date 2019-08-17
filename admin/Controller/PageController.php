<?php

namespace Admin\Controller;

class PageController extends AdminController {

  public function listing() {

    $this->load->model('Page');
    $data['pages'] = $this->model->page->getPages();

    $this->view->render('pages/list', $data);
  }

  public function create() {
    $this->view->render('pages/create');
  }

  public function edit($id) {
    $this->load->model('Page');

    $data['baseUrl'] = \Core\Worker\Config\Config::item('baseUrl');
    $data['page'] = $this->model->page->getPageData($id);

    $this->view->render('pages/edit', $data);
  }


  public function update() {

    $params = $this->request->post;

    $this->load->model('Page');

    if (isset($params['title'])) {
      $pageId = $this->model->page->updatePage($params);
      echo $pageId;
    }
  }

  public function ajaxUpdateSegment() {

    $this->load->model('Page');

    $params = $this->request->post;
    $pages = $this->model->page->getPages();

    if ($params['segment'] == '') {
      echo json_encode([
        'success' => 'false',
        'message' => 'Segment can not be empty'
      ]);
      exit;
    }

    foreach ($pages as $page) {
      if ($page->segment == $params['segment']) {
        echo json_encode([
          'success' => 'false',
          'message' => 'This segment already in use'
        ]);
        exit;
      }
    }

    $this->model->page->updateSegment($params);
  }

  public function add() {
    $params = $this->request->post;
    $this->load->model('Page');
    if (isset($params['title'])) {
      $pageId = $this->model->page->createPage($params);
      echo $pageId;
    }
  }

}

?>
