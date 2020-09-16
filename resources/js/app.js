require('./bootstrap');

$(".user-link").click(function(e) {
    // store the visit async 
    let linkId = $(this).data('link-id')
    let linkUrl = $(this).attr('href')

    axios.post('/visit/' + linkId, { 
        link: linkUrl 
    })
    .then(res => console.log('res: ', res))
    .catch(err => console.log(err))
})