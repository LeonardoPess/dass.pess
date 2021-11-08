export default class Menu {
  constructor(openBtn, closeBtn, menuBox, activeState) {
    this.openBtn = document.querySelector(openBtn);
    this.closeBtn = document.querySelector(closeBtn);
    this.menuBox = document.querySelector(menuBox);
    this.activeState = activeState;

    this._expanded = this.expanded;

    this.toggle = this.toggle.bind(this);
    this.clickOutMenu = this.clickOutMenu.bind(this);
    this.keyPress = this.keyPress.bind(this);
  }

  get expanded() {
    if (this.menuBox) {
      return JSON.parse(this.menuBox.getAttribute('aria-expanded'));
    }
  }

  open() {
    this.openBtn.setAttribute('aria-expanded', true);
    this.closeBtn.setAttribute('aria-expanded', true);
    this.menuBox.setAttribute('aria-expanded', true);
    this.menuBox.classList.add(this.activeState);
  }

  close() {
      this.openBtn.setAttribute('aria-expanded', false);
      this.closeBtn.setAttribute('aria-expanded', false);
      this.menuBox.setAttribute('aria-expanded', false);
      this.menuBox.classList.remove(this.activeState);
  }

  toggle() {
    this.expanded ? this.close() : this.open();
  }

  clickOutMenu(event) {
    (event.target == this.menuBox) && this.close();
  }

  keyPress (e) {
    (e.key === "Escape") && this.close();
}

  handleEvents() {
    [this.openBtn, this.closeBtn].forEach((button) => {
      button.addEventListener('click', this.toggle);
    });

    this.menuBox.addEventListener('click', this.clickOutMenu);
    window.addEventListener('keydown', this.keyPress);
  }

  init() {
    if(this.openBtn, this.closeBtn, this.menuBox) {
        this.handleEvents();
    }
  }
}
