
    '<tr>\n' +
    '    <td class="p-3">'+response.user.customer_name+'</td>\n' +
    '    <td class="p-3">'+response.user.company_name+'</td>\n' +
    '    <td class="p-3">'+response.services[i].service_type.replace("App\\Models\\","")+'</td>\n' +
    '    <td class="p-3">'+phone+'</td>\n' +
    '    <td class="p-3">'+email+'</td>\n' +
    '    <td class="p-3">'+subscription_name+'</td>\n' +
    '    <td class="p-3">'+price_incl+'</td>\n' +
    '    <td class="p-3">'+price_excl+'</td>\n' +
    '    <td class="p-3">'+response.services[i].created_at+'</td>\n' +
    '</tr>'
