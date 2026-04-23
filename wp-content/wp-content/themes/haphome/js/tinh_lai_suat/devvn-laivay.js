(function($){
    $(document).ready(function(){
        var GLOBAL_JS = {
            pad: function (num) {
                var str = num.toString().split('.');
                if (str[0].length >= 4) {
                    str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1 ');
                }
                return (str.join('.'));
            }
        };

        $('#devvn_pc_interest').click(function () {
            var money = $("#devvn_money").val();
            var i = 0, strLength = money.length;
            for (i; i < strLength; i++) {
                money = money.replace(' ', '');
            }
            var interest = $("#devvn_interest").val();
            var interest = interest / 100;
            var interest_type = $("#devvn_time").val();

            var deadline = $("#devvn_deadline").val();
            var deadline = deadline.replace(' ', '');
            var deadline_type = $("#devvn_time2").val();
            var type = $("#devvn_type").val();

            if (money == '' || interest == '' || deadline == '') {
                alert('Kiểm tra dữ liệu đầu vào!');
                return false;
            }
            if (isNaN(money) == true || isNaN(interest) == true || isNaN(deadline) == true) {
                alert('Kiểm tra dữ liệu đầu vào!');
                return false;
            }
            if (money < 0 || interest < 0 || deadline < 0) {
                alert('Kiểm tra dữ liệu đầu vào!');
                return false;
            }

            if (interest_type == 2) interest = interest / 12;
            if (deadline_type == 2) deadline = deadline * 12;

            var all_money_rest = money;
            var first_tr = '<tr class="number-total-money"><td>0</td><td>' + GLOBAL_JS.pad(Math.ceil(all_money_rest)) + '</td><td></td><td></td><td></td></tr>';
            $('#devvn_content_value').html(first_tr);

            if (type == 1) {
                //((A x (1+C/12)^B)-A)/B 1.1232016680838905  12.320166808389061
                var LVHT = ((money * Math.pow((1 + interest), deadline)) - money) / deadline; // lai vay hang thang
                var TGHT = money / deadline; //tien goc tra hang thang
                var TTHT = TGHT + LVHT; // tong tien hang thang
                for (i = 1; i <= deadline; i++) {
                    var tr_content = '<tr class="number-total-money"><td>' + i + '</td><td>' + GLOBAL_JS.pad(Math.ceil((all_money_rest - TGHT))) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TGHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(LVHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TTHT)) + '</td></tr>';
                    $('#devvn_content_value').append(tr_content);
                    all_money_rest = all_money_rest - TGHT;
                }
                var All = LVHT * deadline + parseInt(money);
                var TLV = LVHT * deadline;
            } else if (type == 2) {
                //A x C / 12
                var LVHT = money * interest; // lai vay hang thang
                var TGHT = money / deadline; //tien goc tra hang thang
                var TTHT = TGHT + LVHT; // tong tien hang thang
                for (i = 1; i <= deadline; i++) {
                    var tr_content = '<tr class="number-total-money"><td>' + i + '</td><td>' + GLOBAL_JS.pad(Math.ceil((all_money_rest - TGHT))) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TGHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(LVHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TTHT)) + '</td></tr>';
                    $('#devvn_content_value').append(tr_content);
                    all_money_rest = all_money_rest - TGHT;
                }
                var All = LVHT * deadline + parseInt(money);
                var TLV = LVHT * deadline;
            } else if (type == 3) {
                var TGHT = money / deadline; //tien goc tra hang thang
                var TLV = 0;
                for (i = 1; i <= deadline; i++) {
                    var LVHT = (money - TGHT * (i - 1)) * interest; // lai vay hang thang
                    var TTHT = TGHT + LVHT; // tong tien hang thang
                    TLV = TLV + LVHT;
                    var tr_content = '<tr class="number-total-money"><td>' + i + '</td><td>' + GLOBAL_JS.pad(Math.ceil((all_money_rest - TGHT))) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TGHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(LVHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TTHT)) + '</td></tr>';
                    $('#devvn_content_value').append(tr_content);
                    all_money_rest = all_money_rest - TGHT;
                }
                var All = TLV + parseInt(money);
            }

            $('.before-money').html(GLOBAL_JS.pad(Math.ceil(money)) + ' VNĐ');
            $('.all-money').html(GLOBAL_JS.pad(Math.ceil(All)) + ' VNĐ');
            $('.all-interest').html(GLOBAL_JS.pad(Math.ceil(TLV)) + ' VNĐ');
            $('#devvn_caculated').bPopup({
                speed: 450,
                transition: 'slideDown',
                zIndex: 9999999,
                closeClass: 'devvn_caculated_close',
            });
        });

        /////Định dạng ô money trong phần tính lãi vay////
        $("#devvn_money").keyup(function () {
            var num = $("#devvn_money").val();
            var i = 0, strLength = num.length;
            for (i; i < strLength; i++) {
                num = num.replace(' ', '');
            }
            $("#devvn_money").val(GLOBAL_JS.pad(num));
        });
    })
})(jQuery)