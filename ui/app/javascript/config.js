
'use strict';

var AH = window.AH || {};

function byBehaviour(selector) {
  return $('[data-behaviour="' + selector + '"]');
}

function byElement(selector) {
  return $('[data-element="' + selector + '"]');
}

function dataString(attribute, selector) {
  return '[data-' + attribute + '="' + selector + '"]';
}