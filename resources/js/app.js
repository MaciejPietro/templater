import Alpine from 'alpinejs';
import initCopyToClipboard from './components/copyToClipboard'
import initToasts from './components/toast'

import "toastify-js/src/toastify.css"


window.Alpine = Alpine;

Alpine.start();
initCopyToClipboard()
initToasts()