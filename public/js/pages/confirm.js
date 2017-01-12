$('#check').on('click', function() {
    axios.post('/check', {
        token: config.token
    }).then((response) => {
        if(!response.data.status)
            return $.notify({
                message: response.data.msg + ' '
            }, { 
                type: 'danger',
                allow_dismiss: false,
                delay: 2000
            });
        $.notify({
            message: 'Confirmation successful, redirecting you...',
            type: 'info'
        });
        setTimeout(() => {
            window.location.assign('/');
        }, 2000);
    }).catch((err) => {
        console.log(err);
    });
});