import Menu from './modules/Menu.js';
import HandleFeedbackBox from './modules/feedback/HandleFeedbackBox.js';
import initChangePasswordVisibility from './modules/changePasswordVisibility.js';
import initAutoAdjustTextArea from './modules/autoAdjustTextArea.js';
import initActionBtn from './modules/actionButton.js';

initChangePasswordVisibility();
initAutoAdjustTextArea();
initActionBtn();

const menu = new Menu('[data-menubtn="open"]', '[data-menubtn="close"]', '[data-menu="overflow"]', 'actived');
menu.init();

const handleFeedbackBox = new HandleFeedbackBox('[data-response]');
handleFeedbackBox.init();
