$(function(){
    
    $('#dateFrom').on('change',function(e){
        let dateFrom = $(this).val()
        document.getElementById("dateTo").min = dateFrom
    });

    $(document).on('submit','#add-event',function(){
        submitEvent($(this).serialize())
        return false
    })
})


function submitEvent(data){
    $.ajax({
        url: '/appetiser-calendar/add-event',
        data: data,
        type: 'POST'
    }).done(result => {
        if(result.message == 'error'){
            toastr.error('Please fill-out all fields!', '', {
                progressBar: true,
                timeOut: 2000,
            })
            return false
        }
        toastr.success('Event successfully added!', '', {
            progressBar: true,
            timeOut: 2000,
        })

        setTimeout(() => {
            window.location.reload()
        },2000)
    })
}