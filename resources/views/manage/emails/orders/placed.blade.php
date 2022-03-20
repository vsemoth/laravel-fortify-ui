@component('mail::message')

# Order Received

Thank you for your order

**Order ID: ** {{$order->order_id}} 

**Order Name: ** {{$order->name}} 

**Order Email: ** {{$order->billing_email}}

**Contact Number: ** {{$order->phone}} 

**Order Total: ** R {{ round($order->order_totalPrice) }}

**Items Ordered**
<hr>
{!! $order->cart !!}<br>
<hr>


For more information about your order please visit our website and login to view your order profile.

@component('mail::button', ['url' => config('app.url'), 'color' => 'blue'])
Go to Website
@endcomponent

Thank you for making us your choice.

Regards,<br>
{{ config('app.name') }}
@endcomponent
