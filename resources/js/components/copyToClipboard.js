import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"


export default function() {
    const wrapper = document.querySelector('.classical-template')
    const btn = document.querySelector('.copy-to-clipboard')

    if(wrapper && btn) {
        btn.addEventListener('click', () => {
            navigator.clipboard.write([new ClipboardItem({
                'text/plain': new Blob([wrapper.innerText], {type: 'text/plain'}),
                'text/html': new Blob([wrapper.innerHTML], {type: 'text/html'})
              })])

              Toastify({
                text: "Copied to clipboard",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "top", 
                position: "right",
                stopOnFocus: true, 
                style: {
                  background: "#00b09b",
                },
                onClick: function(){} // Callback after click
              }).showToast();
        })
    }
}