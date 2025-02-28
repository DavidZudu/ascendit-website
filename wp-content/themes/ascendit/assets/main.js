import 'vite/modulepreload-polyfill'
import FlyntComponent from './scripts/FlyntComponent'
import './scripts/swiper'
import './scripts/emoji-grow'
import './scripts/smooth-scroll'
import './scripts/background-colors'

import 'lazysizes'

if (import.meta.env.DEV) {
  import('@vite/client')
}

import.meta.glob([
  '../Components/**',
  '../assets/**',
  '!**/*.js',
  '!**/*.scss',
  '!**/*.php',
  '!**/*.twig',
  '!**/screenshot.png',
  '!**/*.md'
])

window.customElements.define(
  'flynt-component',
  FlyntComponent
)
