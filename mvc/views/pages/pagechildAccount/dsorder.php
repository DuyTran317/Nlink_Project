<div id="don_hang">
    <h4 style="font-weight: bold">Thông Tin Đơn Hàng</h4>
    <div style="margin-top: 15px">
        <table border="1" class="col-md-12 col-sm-12 col-xs-12">
            <tbody id="dsOrder">

            </tbody>
        </table>
        <div style="text-align: right; margin:10px 0 20px 0">
            <ul id="paging" class="pagination">
                
            </ul>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        loadDsOrder();
    });
    function loadDsOrder(page = 1){
        var numOrder = 10;
        var begin = (page-1)*10;
        
        $.ajax({
            url:"<?=$_SESSION['projectName']?>/Ajax/loadDsOrderUser",
            type:"POST",
            data:{
                userId:<?=$_SESSION['UserId']?>,
                begin:begin,
                numOrder:numOrder,
            },
            success: function(data){
                if(data != "" && data != '[]')
                {
                    $("#dsOrder").html("");
                    var head = '<tr>';
                            head += '<td align="center" style="color:#972385"><strong>Mã đơn hàng</strong></td>';
                            head += '<td align="center" style="color:#972385"><strong>Ngày đặt</strong></td>';
                            head += '<td align="center" style="color:#972385"><strong>Người nhận</strong></td>';
                            head += '<td align="center" style="color:#972385"><strong>Tổng tiền</strong></td>';
                            head += '<td align="center" style="color:#972385"><strong>Trạng thái</strong></td>';
                        head += '</tr>';
                    $("#dsOrder").append(head);
                    var ds = JSON.parse(data);
                    for(var i = 0; i<ds.length; i++)
                    {
                        var row = '<tr>';
                                row += '<td align="center">'+ds[i].OrderCode+'</td>';
                                row += '<td align="center">'+ds[i].CrDateTime+'</td>';
                                row += '<td align="center">'+ds[i].FullName+'</td>';
                                debugger;
                                row += '<td align="center">'+new Intl.NumberFormat('de-DE').format(ds[i].PricePay)+' đ</td>';
                                row += '<td align="center" colspan="2"><span style="font-size: 14px">'+ds[i].OrderStatusName+'</span>';
                                row += '<div></div><a href="<?=$_SESSION['projectName']?>/Account/OrderDetail/'+ds[i].OrderCode+'" style="text-decoration:none">Xem</a>'; 
                                if(ds[i].OrderStatusId == 1) {row += '<a style="text-decoration:none" onclick=""> | Hủy</a></td>';}
                            row += '</tr>';
                        $("#dsOrder").append(row);
                    }
                    $.ajax({
                        url:"<?=$_SESSION['projectName']?>/Ajax/getSumOrderUser",
                        type:"POST",
                        data:{
                            userId:<?=$_SESSION['UserId']?>,
                        },
                        success: function(data){
                            $("#paging").html("");
                            var sumOrder = parseFloat(data);
                            var sumPage = Math.ceil(sumOrder/numOrder);
                            var first = page-2<=1 ? 1 : page-2;
                            var end = page+2>=sumPage ? sumPage : page+2;
                            $("#paging").append('<li><a onclick="loadDsOrder(1)">&lt;</a></li>');
                            for(var i = first; i<=end; i++)
                            {
                                if(i == page)
                                {
                                    $("#paging").append('<li class="active"><a onclick="loadDsOrder('+i+')">'+i+'</a></li>');
                                }
                                else
                                {
                                    $("#paging").append('<li><a onclick="loadDsOrder('+i+')">'+i+'</a></li>');
                                }
                            }
                            $("#paging").append('<li><a onclick="loadDsOrder('+sumPage+')">&gt;</a></li>');
                        }
                    });
                   
                }
                else
                {
                    $("#dsOrder").append('<tr><td><h1>Bạn chưa có đơn hàng nào</h1></td></tr>');
                }
            }
        });

    }
</script>