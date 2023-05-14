    <header class="wrapperz"><div class="box">
	<div class="status">
                        <div class="item off">
                <div class="desc">
                    <div class="title">  <?= $this->lang->line('table_header_realm'); ?>   </div>
					<?php if($this->wowmodule->getRealmStatus()): ?>
					
                    <div class="online"><?php if ($this->wowrealm->RealmStatus($charsMultiRealm->realmID, $this->wowrealm->realmGetHostname($charsMultiRealm->realmID))): ?>
                        <div class="status-dot online" uk-tooltip="<?= $this->lang->line('online'); ?>"></div>
                      <?php else: ?>
                        <div class="status-dot offline" uk-tooltip="<?= $this->lang->line('offline'); ?>"></div>
                      <?php endif ?>  <?php endif ?> 
					 							
							</div>
                </div>
            </div>
                    </div></div></header>
	
	<section class="wrapper content">
	 <div class="main-content">
        <div class="news-block">
                        <div class="news">
                <div class="frame">
                    <img src="<?= $template['location'].'assets/images/thumb_1_760_0_0_0_auto.jpg'; ?>" alt="Server opening!">
                </div>
                <div class="date">21.03.2022</div>
                <div class="title">Server opening!</div>
                <div class="text"><p><strong>Opening date of game world and its features:</strong></p>

<ul>
	<li data-xf-list-type="ul">opening date: March 21, 2022 at 12.00 GMT;</li>
	<li data-xf-list-type="ul">rates: x3 for experience, everything else x1;</li>
</ul></div>
                <div class="desc">
                    <a target="_blank" href="<?= base_url('register'); ?>" class="all-button-2">Start Your Adventure</a>
                </div>
            </div>
			
			 <ul class="post-list">
			<?php if ($this->wowmodule->getNewsStatus()): ?>
			<?php foreach ($NewsList as $news): ?>
                       
                                <li>
                    <a target="_blank" href="<?= base_url('news/'.$news->id) ;?>">
                        <div class="img">
                            <img src="<?= base_url('assets/images/news/'.$news->image); ?>">
                        </div>
                        <div class="desc">
                            <div class="title">
                                <span><?= $news->title ?></span>
                            </div>
                            <div class="date">
                                <i class="far fa-comment-alt"></i>&nbsp;  <?= $this->news_model->getCommentCount($news->id); ?> <?= $this->lang->line('news_comments'); ?>
                            </div>
                        </div>
                    </a>
                </li>
				 <?php endforeach ?>
           
            <?php endif ?>
                           </ul>
        </div>
    </div></section>
	<section class="wrapper about">
	<div class="box">
        <div class="step-box">
            <div class="item">
                <div class="title">
                    <span>REGISTER</span>
                    <p>GAME ACCOUNT</p>
                </div>
                <div class="text">In order to start the game, you need to register a game account!
                </div>
                <a href="<?= base_url('register'); ?>" class="link all-button-1"><span>REGISTER ACCOUNT</span></a>
                <div class="wrapper-copy-message"></div>
            </div>
            <div class="item">
                <div class="title">
                    <span>DOWNLOAD</span>
                    <p>GAME FILES</p>
                </div>
                <div class="text">Download the file downloader and follow the instructions</div>
                <a href="<?= base_url('download'); ?>" class="link all-button-1"><span>DOWNLOAD UPDATER</span></a>
                <div class="wrapper-copy-message"></div>
            </div>
            <div class="item">
                <div class="title">
                    <span>SET</span>
                    <p>REALMIST</p>
                </div>
                <div class="text">Already have the game client?</div>
                <div class="text">For Legion: Set your WTF\Config.wtf (or WTF\*.wtf) file to:</div>
                <div>SET portal "login.myserver.com"</span></div>
            </div>
        </div>
        <div class="stream">
            <div class="frame">
                <a class="play" onclick="dataSRC('https://www.youtube.com/embed/eYNCCu0y-Is');"></a>
            </div>
        </div>
    </div>
</section>
    <section class="uk-section uk-section-xsmall wrapper content">
      <div class="uk-container static-page">
        
          <div class="box">
        <div class="step-box">
            <?php if ($this->wowmodule->getNewsStatus()): ?>
            <center><h2 style="font-family:marcellus">Latests News </h4></center>
            <div class="uk-grid uk-grid-small uk-grid-match uk-child-width-1-1" data-uk-grid>
              <?php foreach ($NewsList as $news): ?>
              <div>
                <a href="<?= base_url('news/'.$news->id) ;?>" title="<?= $this->lang->line('button_read_more'); ?>">
                  <div class="uk-card uk-card-default news-card uk-card-hover uk-grid-collapse uk-margin" uk-grid>
                    <div class="uk-width-1-3@s uk-card-media-left uk-cover-container">
                      <img src="<?= base_url('assets/images/news/'.$news->image); ?>" alt="<?= $news->title ?>" uk-cover>
                      <canvas width="500" height="250"></canvas>
                    </div>
                    <div class="uk-width-2-3@s uk-card-body">
                      <h5 class="uk-h5 uk-text-bold uk-margin-small"><?= $news->title ?></h5>
                      <p class="uk-text-small uk-margin-small"><?= mb_substr(ucfirst(strtolower(strip_tags($news->description))), 0, 160, "UTF-8").' ...'; ?></p>
                      <p class="uk-text-small uk-margin-remove uk-text-right"><i class="far fa-comment-alt"></i> <?= $this->news_model->getCommentCount($news->id); ?> <?= $this->lang->line('news_comments'); ?></p>
                    </div>
                  </div>
                </a>
              </div>
              <?php endforeach ?>
            </div>
            <?php endif ?>
          </div></div>
          <div class="box">
        <div class="step-box">
		<center>
            <?php if($this->wowmodule->getRealmStatus()): ?>
            <h4 class="uk-h4 uk-text-bold"><i class="fas fa-server fa-sm"></i> <?= $this->lang->line('home_server_status'); ?></h4>
            <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-margin-small" data-uk-grid>
              <?php foreach ($realmsList as $charsMultiRealm): 
                $multiRealm = $this->wowrealm->getRealmConnectionData($charsMultiRealm->id);
              ?>
              <div>
                <div class="uk-card uk-card-default uk-card-body card-status">
                  <div class="uk-grid uk-grid-small" data-uk-grid>
                    <div class="uk-width-expand">
                      <h5 class="uk-h5 uk-text-bold uk-margin-small"><a href="<?= base_url('online'); ?>" class="uk-link-reset"><i class="fas fa-server"></i> <?= $this->lang->line('table_header_realm'); ?> <?= $this->wowrealm->getRealmName($charsMultiRealm->realmID); ?></a></h5>
                    </div>
                    <div class="uk-width-auto">
                      <?php if ($this->wowrealm->RealmStatus($charsMultiRealm->realmID, $this->wowrealm->realmGetHostname($charsMultiRealm->realmID))): ?>
                        <div class="status-dot online" uk-tooltip="<?= $this->lang->line('online'); ?>"><span><span></span></span></div>
                      <?php else: ?>
                        <div class="status-dot offline" uk-tooltip="<?= $this->lang->line('offline'); ?>"><span><span></span></span></div>
                      <?php endif ?>
                    </div>
                  </div>
                  <?php if ($this->wowrealm->RealmStatus($charsMultiRealm->realmID, $this->wowrealm->realmGetHostname($charsMultiRealm->realmID))): ?>
                  <div class="uk-grid uk-grid-collapse uk-margin-small" data-uk-grid>
                    <div class="uk-width-1-2">
                      <div class="uk-tile alliance-bar uk-text-center" uk-tooltip="<?= $this->lang->line('faction_alliance'); ?>">
                        <i class="fas fa-users"></i>
                        <?= $this->wowrealm->getCharactersOnlineAlliance($multiRealm); ?>
                      </div>
                    </div>
                    <div class="uk-width-1-2">
                      <div class="uk-tile horde-bar uk-text-center" uk-tooltip="<?= $this->lang->line('faction_horde'); ?>">
                        <i class="fas fa-users"></i>
                        <?= $this->wowrealm->getCharactersOnlineHorde($multiRealm); ?>
                      </div>
                    </div>
                  </div>
                  <?php else: ?>
                  <p class="uk-text-small uk-margin-small"><i class="fas fa-exclamation-circle"></i> <?= $this->lang->line('home_realm_info'); ?> <span class="uk-text-danger uk-text-bold uk-text-uppercase"><?= $this->lang->line('offline'); ?></span></p>
                  <?php endif ?>
                </div>
              </div>
              <?php endforeach ?>
            </div>
			
            <h5 class="uk-h5 uk-text-center uk-margin">
              <?php if ($this->wowgeneral->getExpansionAction() == 1): ?>
              <i class="fas fa-gamepad"></i> Set Realmlist <?= $this->config->item('realmlist'); ?>
              <?php else: ?>
              <i class="fas fa-gamepad"></i> Set Portal "<?= $this->config->item('realmlist'); ?>"
              <?php endif ?>
            </h5>
            <?php endif ?>
            <?php if ($this->wowmodule->getDiscordStatus() == '1' && $this->config->item('discord_type') == '1'): ?>
            <h4 class="uk-h4 uk-text-bold"><i class="fab fa-discord fa-sm"></i> <?= $this->lang->line('home_discord'); ?></h4>
            <div class="uk-text-center uk-margin-small">
              <a target="_blank" class="discord-widget" href="https://discord.gg/<?= $this->config->item('discord_invitation'); ?>" title="Join us on Discord">
                <img src="https://discord.com/api/guilds/<?= $discord_id ?>/widget.png?style=<?= $this->config->item('discord_style'); ?>">
              </a>
            </div>
            <?php endif ?>
            <?php if ($this->wowmodule->getDiscordStatus() == '1' && $this->config->item('discord_type') == '2'): ?>
            <h4 class="uk-h4 uk-text-bold"><i class="fab fa-discord fa-sm"></i> <?= $this->lang->line('home_discord'); ?></h4>
            <div class="uk-text-center uk-margin-small">
              <iframe src="https://discordapp.com/widget?id=<?= $discord_id ?>&theme=dark" width="300" height="300" allowtransparency="true" frameborder="0"></iframe>
            </div></center>
            <?php endif ?>
          </div>
       </div>
      </div>
    </section>
