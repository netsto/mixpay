// 读取支付信息
function getPayInfo(InvoiceId){
    $.post(location.href,{
        "action":"getPayInfo",
        "InvoiceId":InvoiceId
    },function(res){
        if(res.success === true){
            $("#titleI").removeClass("fa-exclamation-triangle fa-info-circle").addClass("fa-info-circle");
            $("#ModalTitle,#InvoiceId").show();
            $("#erroroccured").hide();
            var rows = [
                {label:LANG.InvoiceId, value:'<a href="invoices.php?action=edit&id='+InvoiceId+'" target="_blank" style="color:#0af">'+InvoiceId+'</a>', bg:'#f9f9f9', top:true},
                {label:LANG.PayDate, value:res.data.date, bg:'#ffffff'},
                {label:LANG.paymentAmount, value:res.data.paymentAmount, bg:'#f9f9f9'},
                {label:LANG.quoteSymbol, value:res.data.quoteSymbol, bg:'#ffffff'},
                {label:LANG.status, value:res.data.status, bg:'#f9f9f9'},
                {label:LANG.paymentAssetVersion, value:res.data.paymentAssetVersion, bg:'#ffffff'},
                {label:LANG.failureCode, value:res.data.failureCode, bg:'#f9f9f9'},
                {label:LANG.failureReason, value:res.data.failureReason, bg:'#ffffff'},
                {label:LANG.traceId, value:res.data.traceId, bg:'#f9f9f9'},
                {label:LANG.txid, value:'<a href="'+res.data.txidUrl+'" target="_blank" style="color:#0af">'+res.data.txid+'</a>', bg:'#ffffff', bottom:true}
            ];
            
            var text = '<table class="datatable" width="100%" border="0" cellspacing="1" cellpadding="3" style="border-collapse:collapse">';
            rows.forEach(function(row){
                var style = 'padding:12px;border-bottom:2px solid #d1d1d1';
                if(row.top) style += ';border-top:1px solid #d1d1d1';
                if(row.bottom) style += ';border-top:1px solid #d1d1d1';
                text += '<tr style="background-color:'+row.bg+'"><td style="'+style+'"><strong>'+row.label+'</strong> '+row.value+'</td></tr>';
            });
            text += '</table>';
        }else if(res.success === false){
            $("#titleI").removeClass("fa-exclamation-triangle fa-info-circle").addClass("fa-exclamation-triangle");
            $("#ModalTitle,#InvoiceId").hide();
            $("#erroroccured").show();
            var text = res.message;
        }
        $("#InvoiceId").html(InvoiceId);
        $("#tipsContent").html(text);
        jQuery("#modalTips").modal("show");
    },"json");
}