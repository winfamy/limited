$(document).ready(function() {

    var html = '<div class="col-sm-6 col-md-3 col-lg-2">' +
                '<div class="thumbnail">' +
                    '<img src="%img%" style="height:100px" alt="">' +
                    '<div class="caption">' + 
                        '<div class="media-body" style="line-height:16px">' +
                            '<div class="list-group__heading">%name%<!--<span style="color:#666">(CF)</span>--></div>' + 
                            '<small class="list-group__text c-green" style="margin-top:none;margin-bottom:10px;color:#60ff5c;">%rap%R$ RAP</small>' +
                        '</div>' + 
                        '<button class="btn btn-default btn-block" style="background-color:#22313a;border:none;color:#8a9ba1">View Details</button>' +
                    '</div>' +
                '</div>' +
            '</div>';

    console.log(html.replace('%name%', 'name'));

    axios.get('/api/inventory/' + config.username)
        .then(function(response) {
            console.log(response.data);
            var html_strings = [];
            try {
                for (var i = 0; i < response.data.length; i++) {
                    var replaced = html;
                    for (var j = 0; j < Object.keys(response.data[i]).length; j++) {
                        console.log(`%${Object.keys(response.data[i])[j]}% ` + response.data[i][Object.keys(response.data[i])[j]]);
                        replaced = replaced.replace(`%${Object.keys(response.data[i])[j]}%`, response.data[i][Object.keys(response.data[i])[j]]);
                    }
                    html_strings.push(replaced);
                }
            } catch(err) {
                console.log(err);
            }

            for (var i = 0; i < html_strings.length; i++) {
                $('#inventory').first('.row').append(html_strings[i]);
            }
            $('.wrapper').fadeOut(400, function() {
                //$('#inventory').fadeIn(400, function() {
                    $('#inventory').toggleClass('active');
                //});
            });
        });
});