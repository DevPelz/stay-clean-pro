<html>
<head>
    <meta charset="ISO-8859-1">
    <style>

html, body {
    width: 7cm; /* was 907px */
    height: 13.5cm; /* was 529px */
    display: block;
    font-family: "Consolas";
    margin:0;
    /*font-size: auto; NOT A VALID PROPERTY */
}
table{
    width:100%;
    display:inline;
    font-size:13px;
}
.box-body{
    padding:10px;
    font-size:13px;
}
.box-head{
    display:block;
    font-size:13px;
    padding:10px;
    margin-left:30px;
    align-items: center;
}
.thanks{
    display:flex;
    justify-content: center;
    align-items: center;
    margin-left: 30px;
}
@media print {
    html, body {
        width: 7cm; /* was 8.5in */
        height: 13.5cm; /* was 5.5in */
        display: block;
        font-family: "Consolas";
        padding:0 10px;
        margin:0;
        /*font-size: auto; NOT A VALID PROPERTY */
    }
    table{
        width:100%;
        display:inline;
        font-size:13px;
    }
    .box-body{
        padding:10px;
        font-size:13px;
    }
    .box-head{
    display:block;
    font-size:13px;
    align-items: center;
    padding:10px;
}
.thanks{
    display:flex;
    justify-content: center;
    align-items: center;
    margin-left: 30px;
}

    @page {
        size: 2cm 5cm /* . Random dot? */;
    }
}
</style>
</head>
<body>
    <div class="box-head" style="center">
        <h2>StayClean Professionals</h2>
        <h3>Head Office:</h3>
        <p>Plot #1c Ibrahim Eletu Stret, Canal West Estate, Osapa London, Lekki, Lagos.</p>
        <h3>Yaba Office:</h3>
        <p>#6 Alaka Street, Abule Ijesha, Yaba, Lagos.</p>
        <p>Telephone: 014 537 309, 0706 137 1265, 0906 747 5919</p>
        <p>Email: staycleanprofessionals@gmail.com</p>
    </div>
    <div class="box-body">
        <table style="display:inline;">
            <thead>
                <tr>
                    <td style="width:350px;">Dear:</td>
                    <td style="width:200px;">Transaction Code</td>
                    <td style="width:200px;">: <?php echo $details[0]->id;?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $details[0]->customer_name;?></td>
                    <td>Date of Purchase</td>
                    <td>: <?php echo date("d-m-Y H:i:s",strtotime($details[0]->date));?></td>
                </tr>
                <tr>
                    <td><?php echo $details[0]->customer_address;?> </td>
                    <td valign="top">Payment</td>
                    <td valign="top">: <?php echo $details[0]->is_cash == 1 ? "Cash" : "Credit";?></td>
                </tr>
                <tr>
                    <td>Phone: <?php echo $details[0]->customer_phone;?></td>
                    <td valign="top">Due date</td>
                    <td valign="top">: <?php echo $details[0]->is_cash == 1 ? "-" : $details[0]->pay_deadline_date;?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <?php $line = "==========================================================";?>
        <?php echo $line;?>
        <table>
            <thead>
            <tr>
                <td style="width:160px;">Name</td>
                <td style="width:100px;">Category</td>
                <td style="width:100px;">Quantity</td>
                <td style="width:200px;">Price/item</td>
                <td style="width:100px;text-align: right;">Subtotal</td>
            </tr>
            </thead>
        </table>
        <?php echo $line;?>
        <table>
            <thead  style="height:270px;">
            <?php if(isset($details) && is_array($details)){ ?>
                <?php foreach($details as $key => $transaksi){?>
                    <tr valign="top" style="height:10px;font-size:14px;">
                        <td style="width:160px;"><?php echo $transaksi->product_name;?></td>
                        <td style="width:100px; text-align: left;"><?php echo $transaksi->category_name;?></td>
                        <td style="width:100px; text-align: left;"><?php echo $transaksi->quantity;?></td>
                        <td style="width:200px; text-align: left;"><?php echo number_format($transaksi->price_item);?></td>
                        <td style="width:100px; text-align: right;"><?php echo number_format($transaksi->subtotal);?></td>
                    </tr>
                <?php } ?>
                <?php $total = 10 - ($key + 1);
                for($a =1; $a <= $total; $a++){ ?>
                    <tr style="height:10px;font-size:14px;">
                        <td style="width:160px;">&nbsp;</td>
                        <td style="width:100px;"></td>
                        <td style="width:100px;"></td>
                        <td style="width:200px;"></td>
                        <td style="width:100px;"></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </thead>
        </table>
        <?php echo $line;?>
        <table>
            <thead>
            <tr>
                <td style="width:160px;"></td>
                <td style="width:100px;"></td>
                <td style="width:100px;"></td>
                <td style="width:200px;">Total</td>
                <td style="width:100px;text-align: right;"><?php echo number_format($transaksi->total_price);?></td>
            </tr>
            </thead>
        </table>
        <?php echo $line;?>
        <br />
        <thead>
            <tr>
            <td style="width:180px;text-align: center;">Thank You!</td>
            </tr>
        </thead>
        <!-- <table>
            <thead>
            <tr>
                <td style="width:180px;text-align: center;">Buyer</td>
                <td style="width:180px;text-align: center;">Introduction</td>
                <td style="width:180px;text-align: center;">Best Regards</td>
                <!--<td style="width:350px;text-align: center;">**Terimakasih**</td>-->
            <!-- </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td style="width:150px;text-align: center;">&nbsp;</td>
                <td style="width:342px;text-align: center;">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="width:342px;text-align: center;">&nbsp; </td>
            </tr>
            <tr>
                <td style="width:100px;text-align: center;">(.............)</td>
                <td style="width:120px;text-align: center;">(.............)</td>
                <td style="width:150px;text-align: center;">(.............)</td>
                <!--<td style="width:342px;text-align: center;">dan elektronik</td>-->
            <!-- </tr>
            </tbody> -->
                </table>
    </div>
</body>
</html>