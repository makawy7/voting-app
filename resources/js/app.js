import "./bootstrap";

Livewire.hook('request', ({ fail }) => { 
    fail(({ status, preventDefault }) => {
        if (status === 419) {
            preventDefault()
 
            console.log('page expired!')
        }
    })
})
