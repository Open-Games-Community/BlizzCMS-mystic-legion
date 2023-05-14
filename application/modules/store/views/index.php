   <section class="uk-section uk-section-xsmall wrapper content">
      <div class="uk-container static-page">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-4@m">
            <div class="uk-card uk-card-default">
              <div class="uk-card-header">
                <h5 class="uk-h5 uk-text-bold"><i class="far fa-list-alt"></i> <?= $this->lang->line('store_categories'); ?></h5>
              </div>
              <ul class="uk-nav-default nav-store uk-nav-parent-icon" uk-nav>
                <li class="uk-active"><a href="<?= base_url('store'); ?>"><i class="fas fa-star"></i> <?= $this->lang->line('store_top_items'); ?></a></li>
                <?php foreach ($this->wowrealm->getRealms()->result() as $MultiRealm): ?>
                <li class="uk-parent">
                  <a href="javascript:void(0);"><i class="fas fa-server"></i> <?= $this->wowrealm->getRealmName($MultiRealm->realmID); ?></a>
                  <ul class="uk-nav-sub uk-nav-parent-icon" uk-nav>
                    <?php foreach($this->store_model->getCategories($MultiRealm->realmID)->result() as $menulist): ?>
                    <?php if($menulist->main == '2' && $menulist->father == '0'): ?>
                    <li class="uk-parent">
                      <a href="#"><?= $menulist->name ?></a>
                      <ul class="uk-nav-sub">
                        <?php foreach ($this->store_model->getChildStoreCategory($menulist->id)->result() as $menuchildlist): ?>
                        <li><a href="<?= base_url('store/'.$menuchildlist->route) ?>"><?= $menuchildlist->name ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                    <?php elseif($menulist->main == '1' && $menulist->father == '0'): ?>
                    <li><a href="<?= base_url('store/'.$menulist->route) ?>"><?= $menulist->name ?></a></li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="uk-width-3-4@m">
            <div class="uk-card uk-card-default uk-card-body">
              <h5 class="uk-h5 uk-text-bold uk-margin-remove-bottom"><i class="fas fa-star"></i> <?= $this->lang->line('store_top_items'); ?></h5>
              <hr class="uk-margin-small-top">
              <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
               <?php foreach($this->store_model->getStoreTop() as $top): ?>
                <div>
                  <div class="blizzcms-item-container">
                    <div class="blizzcms-item-header uk-text-truncate" uk-tooltip="<?= $this->store_model->getName($top->store_item); ?>" uk-toggle="target: #top-<?= $top->id ?>;animation: uk-animation-slide-top-small">
                      <div class="item-store-icon">
                        <img src="https://wow.zamimg.com/images/wow/icons/large/<?= $this->store_model->getIcon($top->store_item); ?>.jpg" alt="">
                      </div>
                      <!-- START TOOLTIPS WOWHEAD -->
                      <span class="uk-text-middle">
                        <?php if($this->store_model->getType($top->id) == 1): ?>
                        <!-- You can use 'es.wowhead' or any other as 'ru, fr, cn' -->
                        <a href="https://wowhead.com/item=<?= $this->store_model->getCommand($top->store_item); ?>"><?= $this->store_model->getName($top->store_item); ?></a>
                        <?php else: ?>
                        <a href="#"><?= $this->store_model->getName($top->store_item); ?></a>
                        <?php endif; ?>
                      </span>
                      <!-- END TOOLTIPS WOWHEAD -->
                    </div>
                    <div id="top-<?= $top->id ?>" class="blizzcms-item-body" hidden>
                      <p class="uk-text-break"><?= $this->store_model->getDescription($top->store_item); ?></p>
                      <hr class="uk-margin-small">
                      <div class="uk-grid uk-grid-small uk-flex uk-flex-center" data-uk-grid>
                        <div class="uk-width-auto">
                          <?php if($this->store_model->getPriceType($top->store_item) == 1): ?>
                          <span class="blizzcms-item-price"><span uk-tooltip="title: <?= $this->lang->line('panel_dp'); ?>"><i class="dp-icon"></i></span><?= $this->store_model->getPriceDP($top->store_item); ?></span>
                          <?php elseif($this->store_model->getPriceType($top->store_item) == 2): ?>
                          <span class="blizzcms-item-price"><span uk-tooltip="title: <?= $this->lang->line('panel_vp'); ?>"><i class="vp-icon"></i></span><?= $this->store_model->getPriceVP($top->store_item); ?></span>
                          <?php elseif($this->store_model->getPriceType($top->store_item) == 3): ?>
                          <span class="blizzcms-item-price"><span uk-tooltip="title: <?= $this->lang->line('panel_dp'); ?>"><i class="dp-icon"></i></span><?= $this->store_model->getPriceDP($top->store_item); ?> <span class="uk-badge">&amp;</span> <span uk-tooltip="title: <?= $this->lang->line('panel_vp'); ?>"><i class="vp-icon"></i></span><?= $this->store_model->getPriceVP($top->store_item); ?></span>
                          <?php endif; ?>
                        </div>
                        <div class="uk-width-auto">
                          <button class="uk-button uk-button-default uk-button-small" id="button_item<?= $top->store_item ?>" value="<?= $top->store_item ?>" onclick="AddItem(event, this.value)"><i class="fas fa-cart-plus"></i> <?= $this->lang->line('button_cart'); ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      function AddItem(e, value) {
        e.preventDefault();

        $.ajax({
          url:"<?= base_url($lang.'/cart/add'); ?>",
          method:"POST",
          data:{value},
          dataType:"text",
          success:function(response){
            if(!response)
              alert(response);

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= $this->lang->line('notification_title_success'); ?>',
                  message: '<?= $this->lang->line('notification_store_item_added'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            location.reload();
          }
        });
      }
    </script>
<script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script>
