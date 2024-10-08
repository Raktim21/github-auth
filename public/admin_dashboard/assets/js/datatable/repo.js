



let customer_table = $('#customer_datatable').DataTable({

    'columnDefs': [
        { "width": "10%", "targets": 0, "searchable": true },
        { "width": "20%", "targets": 1, "searchable": false },
        { "width": "15%", "targets": 2, "searchable": false },
        { "width": "5%", "targets": 3, "searchable": false },
        { "width": "15%", "targets": 4, "searchable": false },
        { "width": "20%", "targets": 5, "searchable": false },
        { "width": "15%", "targets": 6, "searchable": false },
    ],
    'order': [[1, 'asc']],

    processing: true,
    
    serverSide: true,

    ajax: {
        url: domain + '/api/customer?sort=-id',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'bearer ' + getToken());
        },
        dataSrc: function(json) {
           
            if (json.hasOwnProperty('data')) {

                json.recordsTotal = json.data.visible
                json.recordsFiltered = json.data.total
                return json.data.items

            }else{
                json.recordsTotal = 1
                json.recordsFiltered = 1
                return [];
            }
            
        },
        data: function(params) {
            var custom = {
                page: !params.start ? 0 : Math.round(params.start / params.length),
                size: params.length
            }

            if (params.order.length > 0) {
                var sorts = []
                for (var o in params.order) {
                    var order = params.order[o]
                    if (params.columns[order.column].orderable != false) {
                        var sort = order.dir != 'desc' ? '' : '-'
                        sort += params.columns[order.column].data
                        sorts.push(sort)
                    }
                }
                custom.sort = sorts.join()
            }
            var logicalOperator = "OR";

            if (params.search.value) {
                var columns = []
                for (var c in params.columns) {

                    var col = params.columns[c]


                    if (col.searchable == false) {
                        continue
                    }
                    columns.push(JSON.stringify([col.data, "like", encodeURIComponent(params.search.value.toLowerCase())]))
                }
                custom.filters = '[' + columns.join(',["' + logicalOperator + '"],') + ']'
            }

            return custom
        },
    },
    dom: 'Blfrtip',
    oLanguage: {
        sLengthMenu: "Show _MENU_",
    },
    language: {
        search: "",
        searchPlaceholder: "Search..."
    },


    buttons: [
        {
            extend: 'print',
            title: 'Customer',
            orientation: 'landscape',
            exportOptions: {
                columns: [1, 2,3],
                modifier: {
                    page: 'current'
                }
            },
            pageSize: 'LEGAL',
            customize: function (win) {
                $(win.document.body)
                    .css('font-size', '15pt')
                $(win.document.body).find('th')
                    .css({
                        "font-size": 'inherit',
                        "text-align": 'center',
                    })
                    .addClass('compact')
                $(win.document.body).find('table')
                    .css('font-size', 'inherit')
                    .css('text-align', 'center')

            }
        },
        {
            extend: 'excelHtml5',
            title: 'Customer',
            exportOptions: {
                columns: [1,2,3]

            },

        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: [1, 2,3],
                modifier: {
                    page: 'current'
                }
            },
            pageSize: 'LEGAL',
            title: 'Customer',
            customize: function (doc) {
                doc.content[1].table.widths = [
                    '35%',
                    '35%',
                    '35%',
                ]
                let rowCount = doc.content[1].table.body.length;
                for (let i = 1; i < rowCount; i++) {
                    doc.content[1].table.body[i][0].alignment = 'center';
                    doc.content[1].table.body[i][1].alignment = 'center';
                    doc.content[1].table.body[i][2].alignment = 'center';

                }
            }
        },
    ],
    columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'phone_no',
            render: function (data) {
                if (data == '') {
                    return '<span class="text-danger">N/A</span>';
                }else {
                    return data;
                }
            }
        },
        {data: 'no_of_order',
            render: function (data) {
                if (data == '' || data == 0) {
                    return '<span class="badge badge-danger">0</span>';
                }else {
                    return '<span class="badge badge-success">' + data + '</span>';
                }
            }
        },
        {data: 'dob',
            render: function (data) {
                
                if (data == '') {
                    return '<span class="text-danger">N/A</span>';
                }else {
                    return '<span class="badge badge-success">' + moment(data).format('DD-MM-YYYY') + '</span>';
                }

            }
        },
        {data: 'remarks',
            render: function (data) {
                if (data == '') {
                    return '<span class="text-danger">N/A</span>';
                }else {
                    return data;
                }
            }
        },
        {
            render: function () {
                return '<button class="btn btn-warning" id="update_customer_btn"  toggle="tooltip" title="Edit" type="button" data-bs-toggle="modal"  data-bs-target="#update_customer_modal" ><i class="icon-pencil-alt"  style="font-size: 1.3em"></i></button> '
                    + ' <button class="btn btn-danger" id="delete_customer_btn"  toggle="tooltip" title="Delete" type="button" data-bs-toggle="modal" data-bs-target="#delete_customer_modal" ><i class="fa fa-trash-o" style="font-size: 1.45em"></i></button>'
            }
        },
    ]


});
