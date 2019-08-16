<ul class="nav nav-tabs">
    <?php foreach (Customize::getInstance()->getAdminSettingItems() as $key => $item): ?>
      <li class="nav-item">
          <a class="nav-link <?php if (\Core\Helper\Common::isLinkActive($key)) echo 'active';?>" href="<?= $item['urlPath'] ?>">
            <?= $item['title'] ?>
          </a>
      </li>
    <?php endforeach; ?>
</ul>