setInterval(function(){
    $.ajax({
        type: 'GET',
        url: '/getNotification',
        success: function(data){
            var params = JSON.parse(data);
            if (params['incendie'] == 1) {
                $('#alerttext').html("Alert incendie");
                $('#alert_danger').addClass('show');

            }
            if (params['reservoirevide'] == 1) {
                $('#alerttext').html("Alert reservoir");
                $('#alert_danger').addClass('show');

            }
        }
    });
    } ,3000); 

