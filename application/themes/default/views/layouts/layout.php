<!DOCTYPE html>
<html>
  <head>
    <title><?= $this->config->item('website_name'); ?> - <?= $pagetitle ?></title>
    <?= $template['metadata']; ?>
    <link rel="icon" type="image/x-icon" href="<?= $template['location'].'assets/images/favicon.ico'; ?>" />
    <link rel="stylesheet" href="<?= $template['assets'].'core/uikit/css/uikit.min.css'; ?>" />
    <link rel="stylesheet" href="<?= $template['location'].'assets/css/main.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['location'].'assets/css/new.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['location'].'assets/font-awesome/css/all.css'; ?>" />
    <script src="<?= $template['assets'].'core/uikit/js/uikit.min.js'; ?>"></script>
    <script src="<?= $template['assets'].'core/uikit/js/uikit-icons.min.js'; ?>"></script>
	<style type="text/css">* {cursor: url(https://cur.cursors-4u.net/games/gam-4/gam372.cur), auto !important;}</style><a href="https://www.cursors-4u.com/cursor/2008/12/22/world-of-warcraft-wow-hand-armor.html" target="_blank" title="World Of Warcraft, WoW Hand Armor"><img src="https://cur.cursors-4u.net/cursor.png" border="0" alt="World Of Warcraft, WoW Hand Armor" style="position:absolute; top: 0px; right: 0px;" /></a>
  <style>
  video#bgvid { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 130%;
    min-height: 130%;
    width: auto;
    height: auto;
    z-index: -100;
    -ms-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
}
xvideo#bgvid {
    width: 100%;
    z-index: -100;
    margin-top: 100px;
    left: 0;
    position: absolute;
}
</style>
  </head>
  <body id="page">
    <div class="menu" style="background-color:rgb(16 20 29 / 60%)">
    <div class="wrapper">
	<ul class="navi">
              <?php foreach ($this->wowgeneral->getMenu()->result() as $menulist): ?>
              <?php if($menulist->main == '2'): ?>
              <li class="uk-visible@m">
                <a href="#" style="font-family:marcellus;text-transform:uppercase">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>&nbsp;<i class="fas fa-caret-down"></i>
                </a>
                <div class="uk-navbar-dropdown" uk-dropdown="boundary: .uk-container">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <?php foreach ($this->wowgeneral->getMenuChild($menulist->id)->result() as $menuchildlist): ?>
                     
                        <?php if($menuchildlist->type == '1'): ?>
                       &nbsp; <a href="<?= base_url($menuchildlist->url); ?>" style="font-family:marcellus;text-transform:uppercase">
                          <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php elseif($menuchildlist->type == '2'): ?>
                       &nbsp; <a target="_blank" href="<?= $menuchildlist->url ?>" style="font-family:marcellus;text-transform:uppercase">
                          <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php endif; ?>
                      
                    <?php endforeach; ?>
                  </ul>
                </div>
              </li>
              <?php elseif($menulist->main == '1' && $menulist->child == '0'): ?>
              <li class="uk-visible@m">
                <?php if($menulist->type == '1'): ?>
                <a href="<?= base_url($menulist->url); ?>" style="font-family:marcellus;text-transform:uppercase">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                </a>
                <?php elseif($menulist->type == '2'): ?>
                <a target="_blank" href="<?= $menulist->url ?>" style="font-family:marcellus;text-transform:uppercase">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                </a>
                <?php endif; ?>
              </li>
              <?php endif; ?>
              <?php endforeach; ?>
            </ul>
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#mobile" uk-toggle></a>
			<div class="uk-navbar-right">
            <?php if ($this->wowauth->isLogged()): ?>
            <div class="uk-navbar-item">
              <ul class="uk-subnav uk-subnav-divider subnav-points">
                <li><span uk-tooltip="title:<?=$this->lang->line('panel_dp'); ?>;pos: bottom"><i class="dp-icon"></i></span> <?= $this->wowgeneral->getCharDPTotal($this->session->userdata('wow_sess_id')); ?></li>
                <li><span uk-tooltip="title:<?=$this->lang->line('panel_vp'); ?>;pos: bottom"><i class="vp-icon"></i></span> <?= $this->wowgeneral->getCharVPTotal($this->session->userdata('wow_sess_id')); ?></li>
              </ul>
            </div>
            <?php endif; ?>
          </div>
		  <div id="mobile" data-uk-offcanvas="flip: true">
          <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <div class="uk-panel">
              <p class="uk-logo uk-text-center uk-margin-small" style="font-family:marcellus"><?= $this->config->item('website_name'); ?></p>
              <?php if ($this->wowauth->isLogged()): ?>
              <div class="uk-padding-small uk-padding-remove-vertical uk-margin-small uk-text-center">
                <?php if($this->wowgeneral->getUserInfoGeneral($this->session->userdata('wow_sess_id'))->num_rows()): ?>
                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/'.$this->wowauth->getNameAvatar($this->wowauth->getImageProfile($this->session->userdata('wow_sess_id')))); ?>" width="36" height="36" alt="Avatar">
                <?php else: ?>
                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="36" height="36" alt="Avatar">
                <?php endif; ?>
                <span class="uk-label"><?= $this->session->userdata('blizz_sess_username'); ?></span>
              </div>
              <?php endif; ?>
              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                <?php if (!$this->wowauth->isLogged()): ?>
                <?php if($this->wowmodule->getRegisterStatus() == '1'): ?>
                <li><a href="<?= base_url('register'); ?>"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_register'); ?></a></li>
                <?php endif; ?>
                <?php if($this->wowmodule->getLoginStatus() == '1'): ?>
                <li><a href="<?= base_url('login'); ?>"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></a></li>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->wowauth->isLogged()): ?>
                <?php if($this->wowmodule->getUCPStatus() == '1'): ?>
                <li><a href="<?= base_url('panel'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></a></li>
                <?php endif; ?>
                <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('mod_access_level')): ?>
                <li><a href="<?= base_url('mod'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="fas fa-gavel"></i>s <?= $this->lang->line('button_mod_panel'); ?></a></li>
                <?php endif; ?>
                <?php if($this->wowmodule->getACPStatus() == '1'): ?>
                <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('admin_access_level')): ?>
                <li><a href="<?= base_url('admin'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                <?php endif; ?>
                <?php endif; ?>
                <li><a href="<?= base_url('logout'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a></li>
                <?php endif; ?>
                <?php foreach ($this->wowgeneral->getMenu()->result() as $menulist): ?>
                <?php if($menulist->main == '2'): ?>
                <li class="uk-parent">
                  <a href="#" style="font-family:marcellus;text-transform:uppercase">
                    <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                  </a>
                  <ul class="uk-nav-sub">
                    <?php foreach ($this->wowgeneral->getMenuChild($menulist->id)->result() as $menuchildlist): ?>
                    <li>
                      <?php if($menuchildlist->type == '1'): ?>
                      <a href="<?= base_url($menuchildlist->url); ?>" style="font-family:marcellus;text-transform:uppercase">
                        <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                      </a>
                      <?php elseif($menuchildlist->type == '2'): ?>
                      <a target="_blank" href="<?= $menuchildlist->url ?>" style="font-family:marcellus;text-transform:uppercase">
                        <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                      </a>
                      <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </li>
                <?php elseif($menulist->main == '1' && $menulist->child == '0'): ?>
                <li>
                  <?php if($menulist->type == '1'): ?>
                  <a href="<?= base_url($menulist->url); ?>" style="font-family:marcellus;text-transform:uppercase">
                    <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                  </a>
                  <?php elseif($menulist->type == '2'): ?>
                  <a target="_blank" href="<?= $menulist->url ?>" style="font-family:marcellus;text-transform:uppercase">
                    <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                  </a>
                  <?php endif; ?>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
		<?php if (!$this->wowauth->isLogged()): ?>
              <?php if($this->wowmodule->getRegisterStatus() == '1'): ?>
		 <a target="_blank" href="<?= base_url('en/login'); ?>" class="link all-button-1">
            <div class="desc">
               <p></p>
                <p>Login / Register</p>
            </div>
        </a>
		
		 <?php endif; ?>
              <?php endif; ?>
              <?php if ($this->wowauth->isLogged()): ?>
			  <a href="#" style="font-family:marcellus;text-transform:uppercase">
                  <?php if($this->wowgeneral->getUserInfoGeneral($this->session->userdata('wow_sess_id'))->num_rows()): ?>
                  <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/'.$this->wowauth->getNameAvatar($this->wowauth->getImageProfile($this->session->userdata('wow_sess_id')))); ?>" width="30" height="30" alt="Avatar">
                  <?php else: ?>
                  <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="30" height="30" alt="Avatar">
                  <?php endif; ?>
                  <span class="uk-text-middle uk-text-bold">&nbsp;<?= $this->session->userdata('blizz_sess_username'); ?>&nbsp;<i class="fas fa-caret-down"></i></span>
                </a>
				<div class="uk-navbar-dropdown" uk-dropdown="boundary: .uk-container">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <?php if ($this->wowauth->isLogged()): ?>
                    <?php if($this->wowmodule->getUCPStatus() == '1'): ?>
                    <li><a href="<?= base_url('panel'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></a></li>
                    <?php endif; ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('mod_access_level')): ?>
                    <li><a href="<?= base_url('mod'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="fas fa-gavel"></i> <?= $this->lang->line('button_mod_panel'); ?></a></li>
                    <?php endif; ?>
                    <?php if($this->wowmodule->getACPStatus() == '1'): ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('admin_access_level')): ?>
                    <li><a href="<?= base_url('admin'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <li><a href="<?= base_url('logout'); ?>" style="font-family:marcellus;text-transform:uppercase"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a></li>
                    <?php endif; ?>
                  </ul>
				  <br>
				 <center>
                <a href="#"><i class="fas fa-shopping-cart"></i>&nbsp;<span class="uk-badge"><?= $this->cart->total_items() ?></span></a>
                <div class="uk-navbar-dropdown" uk-dropdown="boundary: .uk-container">
                  <div class="blizzcms-cart-dropdown">
                    <?php if($this->cart->total_items() > 0): ?>
                    <p class="uk-text-center uk-margin-small"><?= $this->lang->line('store_cart_added'); ?> <span class="uk-text-bold"><?= $this->cart->total_items() ?> <?= $this->lang->line('table_header_items'); ?></span> <?= $this->lang->line('store_cart_in_your'); ?></p>
                    <a href="<?= base_url('cart'); ?>" class="uk-button uk-button-default uk-button-small uk-width-1-1"><i class="fas fa-eye"></i> <?= $this->lang->line('button_view_cart'); ?></a>
                    <?php else: ?>
                    <p class="uk-text-center uk-margin-remove"><?= $this->lang->line('store_cart_no_items'); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
             </center>
              <?php endif; ?>
                </div>
			</div>
			</div>
	<div id="body-content">
	<div id="container" class="intro">

<video loop="" muted="" autoplay="" poster="images/illidan-still.html" id="bgvid">
        <source src="<?= $template['location'].'assets/images/illidan.webm'; ?>" type="video/webm">
    </source></video>
        <header class="wrapper">
    <div class="box">
        <a href="/" class="">
            <img src="<?= $template['location'].'assets/images/logo.png'; ?>" alt="logo" style="left:-550px;bottom:-150px">
            
        </a>
        
    </div>
</header>        

    
   


    <?= $template['body']; ?>

    <footer class="wrapper">
    <div class="box">
        <a href="/" class="logo"><img src="<?= $template['location'].'assets/images/logo.png'; ?>" alt="logo"></a>
		<div class="desc">
		<div class="text">
		 <p class="uk-text-center uk-margin-small">Copyright <i class="far fa-copyright"></i> <?= date('Y'); ?> <span class="uk-text-bold"><?= $this->config->item('website_name'); ?></span>. <?= $this->lang->line('footer_rights'); ?></p>
		 <p class="uk-text-small uk-margin-small uk-text-center">Layout created by <a href="https://opengamescommunity.com">Alex</a>.</p>
        <p class="uk-text-small uk-margin-small uk-text-center">World of Warcraft® and Blizzard Entertainment® are all trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries. <br>These terms and all related materials, logos, and images are copyright © Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment®.</p>
         <a target="_blank" href="<?= $this->config->item('social_facebook'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-facebook-f"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_twitter'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_youtube'); ?>" class="uk-icon-button"><i class="fab fa-youtube"></i></a>
		
         
       
       </div></div>
      </div>
    </footer>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>

  new Crate({

    server: '839220655321120808',

    channel: '839220655321120810',

  })

</script>
	<style>
	.back-to-top {
  position: fixed;
  right: 5rem;
  bottom: 1.1rem;
  padding: 0.5rem;
  background:transparent;
  border: none;
  cursor: pointer;
  opacity: 100%;
  transition: opacity 0.5s;
}

.back-to-top:hover {
  opacity: 60%;
}

.hidden {
  opacity: 0%;
}

.back-to-top-icon {
  width: 1rem;
  height: 1rem;
  color: #7ac9f9;
}

.progress-bar {
  height: 0.3rem;
  background: orange;
  position: fixed;
  top: 0;
  left: 0;
}
</style>
<div class="progress-bar" />
<button class="back-to-top hidden">
  <img src="<?= $template['location'].'assets/images/upper.png'; ?>" style="width:50px"></img>
</button>
<div class="progress-bar" />

<script>
const showOnPx = 100;
const backToTopButton = document.querySelector(".back-to-top");
const pageProgressBar = document.querySelector(".progress-bar");

const scrollContainer = () => {
  return document.documentElement || document.body;
};

const goToTop = () => {
  document.body.scrollIntoView({
    behavior: "smooth"
  });
};

document.addEventListener("scroll", () => {
  console.log("Scroll Height: ", scrollContainer().scrollHeight);
  console.log("Client Height: ", scrollContainer().clientHeight);

  const scrolledPercentage =
    (scrollContainer().scrollTop /
      (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
    100;

  pageProgressBar.style.width = `${scrolledPercentage}%`;

  if (scrollContainer().scrollTop > showOnPx) {
    backToTopButton.classList.remove("hidden");
  } else {
    backToTopButton.classList.add("hidden");
  }
});

backToTopButton.addEventListener("click", goToTop);
</script>
	<script src="<?= $template['location'].'assets/js/clipboard.min.js'; ?>"></script>
	<script src="<?= $template['location'].'assets/js/jquery.js'; ?>"></script>
	<script src="<?= $template['location'].'assets/js/new.js'; ?>"></script>
  </body>
</html>
