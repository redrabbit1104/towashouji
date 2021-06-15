'use strict';

const btn = document.querySelector('.menu_button');
const container = document.querySelector('.slide_container');
const eventCondition = window.ontouchstart ? 'touchstart' : 'click';

btn.addEventListener(
  eventCondition,
  (event) => {
    btn.classList.toggle('open');
    container.classList.toggle('slide');
    event.preventDefault();
  },
  { passive: false }
);
