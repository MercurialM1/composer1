<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Письмо</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        .content {
            padding: 30px;
            color: #333333;
            font-size: 16px;
            line-height: 1.5;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .footer {
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #888888;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" background-color="#f4f4f4">
    <tr>
        <td align="center">
            <table class="container" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" style="padding: 20px 0; background-color: #007bff; color: #ffffff;">
                        <h2 style="margin: 0;">Ptichki</h2>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <h3 style="margin-top: 0; color: #111111;">Привет {{ $order->recipient_name }}!</h3>
                        <p>Ваш закакз был отменён<br>
                            @foreach($order->items as $item)
                                Вы заказывали:<br>{{$item->product->name}}: {{$item->quantity}}шт</p>
                        @endforeach
                        На сумму:{{ $order->total_price }}руб<br>
                        <table cellpadding="0" cellspacing="0" style="margin: 25px 0;">
                            <tr>
                                <td align="center">
                                    <a href="{{route('cabinet.cart.index')}}" class="button" target="_blank">К покупкам</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/photos/NBuOvvk1yxlPWSwfCDiBIKREwqXR4werW3KyxFNF.jpg') }}" alt="Photo" style="display: block; max-width: 100%; height: auto;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="footer">
                        <p style="margin: 0;">Вы получили это письмо,так как заказ был отменён Админом</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
