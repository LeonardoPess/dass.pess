export default class HandleFeedbackBox {
  constructor(feedbackBox) {
  this.feedbackBox = document.querySelector(feedbackBox);
  this.activeState = 'active';

  this.handleClick = this.handleClick.bind(this);
  }

  handleClick() {
    this.feedbackBox.remove();
  }

  handleFeedbackBox() {
    this.feedbackBox.classList.add(this.activeState);
    this.feedbackBox.addEventListener('click', this.handleClick);
    setTimeout(() => this.feedbackBox.classList.remove(this.activeState), 3000);
    setTimeout(() => this.feedbackBox.remove(), 3100);
  }

  init() {
    if(this.feedbackBox) {
      this.handleFeedbackBox();
    }
  }
}
