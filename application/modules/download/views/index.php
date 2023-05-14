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
            
               <img src="<?= $template['location'].'assets/images/launcher_by_alex.png'; ?>">
            
        </div>
    </div>
</section>

<section class="uk-section uk-section-xsmall wrapper content">
      <div class="uk-container static-page">
		<div class="uk-grid uk-grid-medium" data-uk-grid>
			<div class="uk-width-1-1">
				<div class="uk-width-auto">
					<h4 class="uk-h4 uk-text-uppercase uk-text-bold"><i class="fas fa-download"></i> Download</h4>
				</div>
				<div class="uk-width-expand@s">
					<div class="uk-child-width-1-1" uk-grid>
						<div>
							<div uk-grid>
								<div class="uk-width-auto@m">
									<ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
										<li><a href="#">Client</a></li>
										<li><a href="#">Addons</a></li>
									</ul>
								</div>
								<div class="uk-width-expand@m">
									<ul id="component-tab-left" class="uk-switcher">
										<li>
											<table class="uk-table uk-table-middle uk-table-divider">
												<thead>
													<tr>
														<th class="uk-width-small">Version</th>
														<th class="uk-width-medium">Name</th>
														<th>Size</th>
														<th>Type</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($this->download_model->getGame()->result() as $files): ?>
													<tr>
														<td><div style="background:url(<?=base_url('assets/images/forums/wow-icons/' . $files->image);?>); width: 50px; height: 50px;)"></div></td>
														<td><?=$files->fileName?></td>
														<td><?=$files->weight?></td>
														<td><?=$files->type?></td>
														<td><a class="uk-button uk-label-success link all-button-1" href="<?=$files->url?>" target="_blank"><i class="fas fa-download"></i> Download</a></td>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</li>
										<li>
											<table class="uk-table uk-table-middle uk-table-divider">
												<thead>
													<tr>
														<th class="uk-width-small">Version</th>
														<th class="uk-width-large">Name</th>
														<th>Size</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($this->download_model->getAddons()->result() as $files): ?>
													<tr>
														<td><div style="background:url(<?=base_url('assets/images/forums/wow-icons/' . $files->image);?>); width: 50px; height: 50px;)"></div></td>
														<td><?=$files->fileName?></td>
														<td><?=$files->weight?></td>
														<td><a class="uk-button uk-label-success link all-button-1" href="<?=$files->url?>" target="_blank"><i class="fas fa-download"></i> Download</a></td>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>