"use strict";

$(function () {

    try{
        var plan = $('#datatable-buttons1').DataTable({
            processing: true,
            serverSide: true,
            ajax: planfetch,
            language: {
                searchPlaceholder: "Search in plans..."
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'seller_plans.id',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'seller_plans.name'
                },
                {
                    data: 'price',
                    name: 'seller_plans.price'
                },
                {
                    data: 'period',
                    name: 'seller_plans.validity'
                },
                {
                    data: 'features',
                    name: 'features',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'status',
                    name: 'seller_plans.status',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false
                },
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            order: [
                [0, 'DESC']
            ]
        });
    }catch(err){
        // no code
    }

    try{
        var voucherlist = $('#voucher_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: subscriptionfetch,
            language: {
                searchPlaceholder: "Search in list..."
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable : false
                },
                {
                    data: 'code',
                    name: 'subscription_vouchers.code'
                },
                {
                    data: 'link_by',
                    name: 'subscription_vouchers.link_by'
                },
                {
                    data: 'amount',
                    name: 'subscription_vouchers.amount'
                },
                {
                    data: 'dis_applytype',
                    name: 'subscription_vouchers.dis_applytype'
                },
                {
                    data: 'maxusage',
                    name: 'subscription_vouchers.maxusage'
                },
                {
                    data: 'status',
                    name: 'seller_subscriptions.status',
                    searchable: false,
                    orderable : false
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable : false
                },
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            order: [
                [7, 'DESC']
            ]
        });
    }catch(err){
        // no code
    }

    try{
        var subs_list = $('#listofsubs').DataTable({
            processing: true,
            serverSide: true,
            ajax: listofsubs,
            language: {
                searchPlaceholder: "Search in list..."
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'plan_name',
                    name: 'plan.name'
                },
                {
                    data: 'txn_id',
                    name: 'seller_subscriptions.txn_id'
                },
                {
                    data: 'method',
                    name: 'seller_subscriptions.method'
                },
                {
                    data: 'amount',
                    name: 'seller_subscriptions.paid_amount'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: 'start_date',
                    name: 'seller_subscriptions.start_date'
                },
                {
                    data: 'end_date',
                    name: 'seller_subscriptions.end_date'
                },
                {
                    data: 'status',
                    name: 'seller_subscriptions.status',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false
                },
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            order: [
                [7, 'DESC']
            ]
        });
    }catch(err){

    }

    try{
        var sellersubscription = $('#sellersubscription').DataTable({
            processing: true,
            serverSide: true,
            ajax: mysubs,
            language: {
                searchPlaceholder: "Search in list..."
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'plan.name'
                },
                {
                    data: 'amount',
                    name: 'seller_subscriptions.paid_amount'
                },
                {
                    data: 'txn_id',
                    name: 'seller_subscriptions.txn_id'
                },
                {
                    data: 'start_date',
                    name: 'seller_subscriptions.start_date'
                },
                {
                    data: 'end_date',
                    name: 'seller_subscriptions.end_date'
                },
                {
                    data: 'status',
                    name: 'seller_subscriptions.status',
                    searchable: false,
                    orderable: false
                },
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            order: [
                [4, 'DESC']
            ]
        });
    }catch(err){

    }

    $("#link_by").on('change', function () {

        var val = $("#link_by").val();
    
        if (val == 'linktoplan') {
    
          $('#plans').show();
    
        } else {
    
          $('#plans').hide();
    
        }

    });

});