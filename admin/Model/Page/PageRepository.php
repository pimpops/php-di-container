<?php

namespace Admin\Model\Page;

use Core\Model;

class PageRepository extends Model {

    public function getPages() {
        $sql = $this->queryBuilder->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->sql();
        return $this->db->query($sql);
    }

    public function getPageData($id) {
        $page = new Page($id);
        return $page->findOne();
    }

    public function getPageBySegment($segment, $status = null)
    {
      if ($status === null) {
        $sql = $this
            ->queryBuilder
            ->select()
            ->from('page')
            ->where('segment', $segment)
            ->limit(1)
            ->sql()
        ;
      } else {
        $sql = $this
            ->queryBuilder
            ->select()
            ->from('page')
            ->where('segment', $segment)
            ->where('status', $status)
            ->limit(1)
            ->sql()
        ;
      }
        $result = $this->db->query($sql, $this->queryBuilder->values);
        return isset($result[0]) ? $result[0] : false;
    }

    public function createPage($params) {
        $page = new Page;
        $page->setTitle($params['title']);
        $page->setContent($params['content']);
        $page->setSegment(\Core\Helper\Text::transliteration($params['title']));
        $pageId = $page->save();
        return $pageId;
    }

    public function updateSegment($params) {
        if (isset($params['page_id'])) {
            $page = new Page($params['page_id']);
            $page->setSegment($params['segment']);
            $page->save();
        }
    }

    public function updatePage($params) {
        if (isset($params['page_id'])) {
            $page = new Page($params['page_id']);
            $page->setTitle($params['title']);
            $page->setContent($params['content']);
            $page->setStatus($params['status']);
            $page->setType($params['type']);
            $page->save();
        }
    }
}
