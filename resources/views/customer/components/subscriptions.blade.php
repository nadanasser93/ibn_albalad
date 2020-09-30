
    '<div class="card-body shadow" style="margin: 1em">'+
    '        <div class="image-container">\n' +
    '            <div class="content">\n' +
    '               '+ response[i].image +'\n' +
    '            </div>\n' +
    '        </div>\n' +
    '        <div class="desc mx-auto" style="text-align: center;">\n' +
    '            <h2>'+response[i].price_incl+'</h2>\n' +
    '        </div>\n' +
    '        <div class="desc mx-auto" style="text-align: center;">\n' +
    '            <h2>'+response[i].most_chosen+'</h2>\n' +
    '        </div>\n' +
    '        <div class="desc mx-auto" style="text-align: center;">\n' +
    '            <h2 style="text-align: center;font-size: 24px!important;">'+response[i].name+'</h2>\n' +
    '            <div class="three-rows">\n' +
    '                <p >\n' +
    '                    '+response[i].description+'\n' +
    '                </p>\n' +
    '            </div>\n' +
    '        </div>\n' +
    '        <div class="link-custom" style="text-align: center;">\n' +
    '            <a href="#" class="btn btn-primary" onclick=orderNow('+response[i].id+',"'+response[i].subscription_for+'",event) data-dsn="parallax" data-dsn-ajax="slider" >\n' +
    '                <span>Order Now</span>\n' +
    '            </a>\n' +
    '        </div>\n'+
    '</div>'





