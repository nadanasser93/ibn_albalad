
    '<tr>\n' +
    '    <td class="p-3"><img style="width: 150px;height: 100px;" src="'+image+'"> </td>\n' +
    '    <td class="p-3">'+response.customer_name+'</td>\n' +
    '    <td class="p-3">'+response.company_name+'</td>\n' +
    '    <td class="p-3">'+response.order.services[i].service_type.replace("App\\Models\\","")+'</td>\n' +
    '    <td class="p-3">'+phone+'</td>\n' +
    '    <td class="p-3">'+email+'</td>\n' +
    '    <td class="p-3">'+subscription_name+'</td>\n' +
    '    <td class="p-3">'+response.order.services[i].created_at+'</td>\n' +
    '</tr>'
