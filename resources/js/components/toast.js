
import Toastify from 'toastify-js';

const toast = {
    showSuccess: (msg) => {
        Toastify({
            text:  msg,
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
    },
}


export default function() {
    window.livewire.on('userAdded', function () {
        toast.showSuccess("User added successfully")
    });

    window.livewire.on('userDeleted', function () {
        toast.showSuccess("User deleted successfully")
    });
    
    window.livewire.on('userUpdated', function () {
        toast.showSuccess("User updated successfully")
    });
}