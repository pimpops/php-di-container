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
