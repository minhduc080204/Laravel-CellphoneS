<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <center>
        <h2 style="color: red; ">HÓA ĐƠN BÁN HÀNG</h2>        
        <table style="font-size: 25px; width: 60%; border: black 2px solid;">
            @foreach ($order->orderDetails as $item)
            <tr>
                <td>
                    <table style="width: 99%; border: solid red 2px; margin: 5px; font-size: 20px;">                        
                        <tr>
                            <td style="width: 40%; padding: 3px;">Tên sản phẩm : </td>
                            <td style="width: 60%; padding: 3px; text-align: right;"><strong>{{ $item->product->Name }}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px;">Phiên bản : </td>
                            <td style="width: 60%; padding: 3px; text-align: right;"><strong>{{ $item->version->Version }}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px;">Màu sắc : </td>
                            <td style="width: 60%; padding: 3px; text-align: right;"><strong>{{ $item->color->Color }}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px;">Đơn giá : </td>
                            <td style="width: 60%; padding: 3px; text-align: right;"><strong class="price">{{ $item->product->Price }}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px;">Số lượng : </td>
                            <td style="width: 60%; padding: 3px; text-align: right;"><strong>{{ $item->Quantity }}</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach            
        </table>
        <div style="display: flex; justify-content: space-between; width: 60%; font-size: 20px; margin-top: 5px; color: black;">
            <strong>Tổng cộng:</strong>
            <strong>Số lượng: <strong style="color: red;">{{ $order->Quantity }}</strong></strong>
            <strong>Thành tiền: <strong class="price" style="color: red;">{{ $order->Price }}</strong></strong>
        </div>
        <h2 style="color: red; margin-top: 15px;">Thông tin khách hàng</h2>
        <div style="width: 60%; font-size: 20px; color: black;">
            <div>
                <strong>Tên khách hàng: <strong style="color: red;">{{ $order->customer->Name }}</strong></strong>
            </div>
            <div>
                <strong>Liên lạc: <strong style="color: red;">{{ $order->customer->Contact }}</strong></strong>
            </div>
            <div>
                <strong>Email: <strong style="color: red;">{{ $order->customer->Email }}</strong></strong>
            </div>
            <div>
                <strong>Địa chỉ: <strong style="color: red;">{{ $order->customer->Address }}</strong></strong>
            </div>
            <div>
                <strong>Ngày đặt hàng: <strong style="color: red;">{{ $order->OrderDate }}</strong></strong>
            </div>
        </div>
    </center>
</body>
</html>