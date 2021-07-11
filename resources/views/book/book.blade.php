

@include('layouts.interface')
<body>
@include('layouts.header')
<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="product-view" xmlns="http://www.w3.org/1999/html">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{route('book.book')}}">Trang chủ</a></li>
                        <!--<li><a href="">Học viện Đa Minh</a></li>-->
                        <li><a href="">The Importance of Being Understood</a></li>
                    </ul>
                </div>
                <div class="image-main-info">
                    <div class="hatp">
                        <img src="http://thuviendaminh.net/skin//frontend/rwd/thuvien/images/demobooks/biamau.png" width="100%">
                    </div>
                    <div class="main-info">
                        <table class="tbl-book-info">
                            <tbody><tr>
                                <td class="tentp" q="2">The Importance of Being Understood</td>
                            </tr>
                            <tr>
                                <td class="reg-content">Tác giả: </td>
                                <td>Adam Morton</td>
                            </tr>
                            <tr class="reg-content">
                                <td>DDC: </td><td>100 - 100- Triết học-Tâm lý học</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Ngôn ngữ: </td>
                                <td>Anh</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Số cuốn: </td>
                                <td>1</td>
                            </tr>
                            </tbody></table>
                        <p class="banso-title">Hiện trạng các bản sách</p>
                        <table class="banso">
                            <tbody><tr class="reg-content">
                                <td class="each-tppop">
                                    <table>
                                        <tbody><tr>
                                            <td class="maso">Mã số: </td>
                                            <td><b>215OP0001295</b></td>

                                        </tr>
                                        <tr class="reg-content">
                                            <td>Nhà Xuất bản: </td>
                                            <td>Routledge</td>
                                        </tr>
                                        <tr class="reg-content">
                                            <td>Năm Xuất bản: </td>
                                            <td>2003</td>
                                        </tr>
                                        <tr class="reg-content">
                                            <td>Khổ sách: </td>
                                            <td>
                                                20                                                </td>
                                        </tr>
                                        <tr class="reg-content">
                                            <td>Số trang: </td>
                                            <td>
                                                225                                                </td>
                                        </tr>
                                        <tr class="reg-content">
                                        </tr>
                                        <tr class="reg-content">
                                            <td>Tình trạng: </td>
                                            <td class="tinhtrang ">
                                                <span class="avaiable">Hiện có</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <form action="http://thuviendaminh.net/index.php/thuvien/catalog_product/muonsach/id/215OP0001295/">
                                                    <button type="submit" value="Mược sách" class="btn-muonsach">Mượn sách</button>
                                                </form>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
                <div class="related-product">

                </div>
                
            </div>
            <div id="datmuonsach_form" style="display: none; background:white; border-radius: 10px; padding:15px;">
                <div class="borrower">
                    <div class="title">
                        Đăng Ký Đặt Mượn Sách        </div>
                    <div class="detail-information full">
                        <form action="" method="post" id="phieusach-form" onsubmit="return false;">
                            <div class="col2-set">
                                <div class="col-2">
                                    <div class="content">
                                        <h2 class="phieu-steps">Thông tin người đặt mượn</h2>
                                        <p class="form-alert">Vui lòng nhập đầy đủ các thông tin dưới đây:</p>
                                        <table class="form-list">
                                            <tbody><tr>
                                                <td><label for="matppop_dt_show" class="required"><em>*</em>Mã bản sách<label></label></label></td>
                                                <td class="input-box">
                                                    <input type="text" name="matppop_dt_show" readonly="true" value="0" id="matppop_dt_show" class="input-text required-entry" title="Mã bản sách">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="email" class="required"><em>*</em>Mã độc giả</label></td>
                                                <td class="input-box">
                                                    <input type="text" name="madocgia" value="" id="madocgia" class="input-text required-entry" title="Mã độc giả(nếu có)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="email" class="required"><em>*</em>Họ và tên</label></td>
                                                <td class="input-box">
                                                    <input type="text" name="hoten" value="" id="hoten" class="input-text required-entry" title="Họ và tên">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <label for="email" class="required"><em>*</em>Email</label></td>
                                                <td class="input-box">
                                                    <input type="text" name="email" value="" id="email" class="input-text required-entry validate-email" title="Địa chỉ email">
                                                </td>
                                            </tr>

                                            <input type="hidden" id="matppop_dattruoc" value="0">
                                            </tbody></table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 registered-users">
                                <div id="datmuon-message" class="start" style="margin-bottom: 20px">

                                </div>
                                <div class="buttons-set">
                                    <button type="submit" class="button" title="Đặt trước" name="send2" id="send2-dattruoc"><span><span>Gửi</span></span></button>
                                </div>

                            </div>
                            <script type="text/javascript">
                                //<![CDATA[
                                var phieusach = new VarienForm('phieusach-form', true);
                                //]]>
                            </script>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery(".tabs-menu a").click(function(event) {
                        event.preventDefault();
                        jQuery(this).parent().addClass("current");
                        jQuery(this).parent().siblings().removeClass("current");
                        var tab = jQuery(this).attr("href");
                        jQuery(".tab-content").not(tab).css("display", "none");
                        jQuery(tab).fadeIn();
                    });
                    jQuery(".btn-datmuonsach").click(function(event) {
                        var matpPop = jQuery(this).val();
                        jQuery("#matppop_dattruoc").val(matpPop);
                        jQuery("#matppop_dt_show").val(matpPop);
                        jQuery('#datmuonsach_form').bPopup();
                    });
                    jQuery("#send2-dattruoc").click(function()
                    {
                        jQuery("#datmuon-message").html("");
                        if( phieusach.validator && phieusach.validator.validate()) {
                            var dattruocUrl = "http://thuviendaminh.net/index.php/thuvien/phieusach/dattruoc/";
                            var matpPop = jQuery("#matppop_dattruoc").val();
                            var maDG = jQuery("#madocgia").val();
                            var hotenDG = jQuery("#hoten").val();
                            var emailDG = jQuery("#email").val();
                            jQuery("#datmuon-message").html("Vui lòng đợi trong giây lát...");
                            jQuery("#datmuon-message").attr("class","dt_success");

                            new Ajax.Request(dattruocUrl, {
                                method: 'post',
                                parameters: {
                                    "matpPop": matpPop,
                                    "maDG": maDG,
                                    "hotenDG": hotenDG,
                                    "emailDG": emailDG
                                },
                                onSuccess: function (data) {
                                    var dataArr = data.responseText.evalJSON();
                                    jQuery("#datmuon-message").attr("class","");
                                    jQuery("#datmuon-message").html(dataArr.message);
                                    if(dataArr.success == 1) {
                                        jQuery("#datmuon-message").attr("class","dt_success");
                                        setTimeout(function() {
                                            window.location.reload();
                                        }, 1000);
                                    }
                                    else{
                                        jQuery("#datmuon-message").attr("class","dt_fail");
                                    }
                                }
                            });
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
</table>
</body>
