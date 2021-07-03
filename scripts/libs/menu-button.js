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

const target = document.querySelector('.target');
const links06 = document.getElementById('links06');
target.addEventListener('click', () => {
  if (
    links07.classList.contains('open') == true ||
    links08.classList.contains('open') == true ||
    links09.classList.contains('open') == true ||
    links10.classList.contains('open') == true
  ) {
    links07.classList.remove('open');
    links08.classList.remove('open');
    links09.classList.remove('open');
    links10.classList.remove('open');
  }
  links06.classList.toggle('open');
});

const target2 = document.querySelector('.target2');
const links07 = document.getElementById('links07');
target2.addEventListener('click', () => {
  if (
    links06.classList.contains('open') == true ||
    links08.classList.contains('open') == true ||
    links09.classList.contains('open') == true ||
    links10.classList.contains('open') == true
  ) {
    links06.classList.remove('open');
    links08.classList.remove('open');
    links09.classList.remove('open');
    links10.classList.remove('open');
  }
  links07.classList.toggle('open');
});

const target3 = document.querySelector('.target3');
const links08 = document.getElementById('links08');
target3.addEventListener('click', () => {
  if (
    links06.classList.contains('open') == true ||
    links07.classList.contains('open') == true ||
    links09.classList.contains('open') == true ||
    links10.classList.contains('open') == true
  ) {
    links06.classList.remove('open');
    links07.classList.remove('open');
    links09.classList.remove('open');
    links10.classList.remove('open');
  }
  links08.classList.toggle('open');
});

const target4 = document.querySelector('.target4');
const links09 = document.getElementById('links09');
target4.addEventListener('click', () => {
  if (
    links06.classList.contains('open') == true ||
    links07.classList.contains('open') == true ||
    links08.classList.contains('open') == true ||
    links10.classList.contains('open') == true
  ) {
    links06.classList.remove('open');
    links07.classList.remove('open');
    links08.classList.remove('open');
    links10.classList.remove('open');
  }
  links09.classList.toggle('open');
});

const target5 = document.querySelector('.target5');
const links10 = document.getElementById('links10');
target5.addEventListener('click', () => {
  if (
    links06.classList.contains('open') == true ||
    links07.classList.contains('open') == true ||
    links08.classList.contains('open') == true ||
    links09.classList.contains('open') == true
  ) {
    links06.classList.remove('open');
    links07.classList.remove('open');
    links08.classList.remove('open');
    links09.classList.remove('open');
  }
  links10.classList.toggle('open');
});
