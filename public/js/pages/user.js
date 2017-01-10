$(document).ready(function() {

    var html = '<div class="col-sm-6 col-md-3 col-lg-3">' +
                '<div class="thumbnail">' +
                    '<img src="%img%" style="height:100px" alt="">' +
                    '<div class="caption">' + 
                        '<div class="media-body" style="line-height:16px">' +
                            '<div class="list-group__heading">%name%</div>' + 
                            '<small class="list-group__text" style="margin-top:none;margin-bottom:5px;color:#b4bfc3;">Count: %count%</small>' +
                            '<small class="list-group__text c-green" style="margin-bottom:10px;color:#60ff5c;">%rap% R$ RAP</small>' +
                        '</div>' + 
                        '<button class="btn btn-default btn-block" style="background-color:#22313a;border:none;color:#8a9ba1">View Details</button>' +
                    '</div>' +
                '</div>' +
            '</div>';

    axios.get('/api/inventory/' + config.username)
        .then(function(response) {
            var html_strings = [];
            console.log(response.data);
            for (var i = 0; i < response.data.length; i++) {
                var element = response.data[i];
                var replaced = html;
                for (var j = 0; j < Object.keys(element).length; j++) {
                    replaced = replaced.replace(`%${Object.keys(element)[j]}%`, element[Object.keys(element)[j]]);
                }
                html_strings.push(replaced);
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