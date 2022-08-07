function sweetToast(mensaje, icon = 'success') {
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 4500,
        timerProgressBar: true,
        iconColor: '#1e293b',
        customClass: {
            popup: 'colored-toast'
        },
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: icon,
        title: `${mensaje}`
    })
}

function errorAlert(mensaje, titulo = null) {
    Swal.fire({
        icon: 'error',
        title: titulo,
        html: mensaje
    })
}
