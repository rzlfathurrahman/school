<style>/*
  Navigation Buttom
*/
#menu-bottom.nav {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: #ffffff;
    display: flex;
    overflow-x: auto;
}

#menu-bottom .nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 13px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
}

#menu-bottom .nav__link:hover {
    background-color: #eeeeee;
}

#menu-bottom .nav__link--active {
    color: #009578;
}

.nav__icon {
    font-size: 18px;
}</style>
<link rel="stylesheet" href="<?= base_url('assets/login/css/material-icons.css')  ?>">
  <nav id="menu-bottom" class="nav">
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">dashboard</i>
      <span class="nav__text">Dashboard</span>
    </a>
    <a href="#" class="nav__link nav__link--active">
      <i class="material-icons nav__icon">person</i>
      <span class="nav__text">Profile</span>
    </a>
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">devices</i>
      <span class="nav__text">Devices</span>
    </a>
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">lock</i>
      <span class="nav__text">Privacy</span>
    </a>
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">settings</i>
      <span class="nav__text">Settings</span>
    </a>
  </nav>