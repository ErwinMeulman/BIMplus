jQuery(document).ready(function() {
    jQuery("#datagrid").jqGrid({
        datatype : 'json',
        type : "GET",
        ajaxGridOptions : {
            contentType : "application/json"
        },
        loadBeforeSend : function(xhr) {
            xhr.setRequestHeader('Authorization', 'BimPlus 199c55110e2044b88e21a0c1cbb02fe3')
        },
        url : 'http://api-dev.bimplus.net/v2/teams',
        colNames : ['ID', 'Name', 'Slug', 'Status'],
        colModel : [{
            name : 'id',
            width : 200,
            align : "center",
            sortable : true
        }, {
            name : 'name',
            width : 200,
            align : "center",
            sortable : true
        }, {
            name : 'slug',
            width : 200,
            align : "center",
            sortable : true
        }, {
            name : 'status',
            width : 200,
            align : "center",
            sortable : true
        }],
        jsonReader : {
            repeatitems : false,
            root : function(obj) {
                return obj;
            },
            page : function(obj) {
                return 1;
            },
            total : function(obj) {
                return 1;
            },
            records : function(obj) {
                return obj.length;
            }
        },
        rowNum : 10,
        rowList : [10, 20, 30],
        pager : '#pager10',
        viewrecords : true,
        caption : "Bimplus Team Details",
    }).navGrid('#navGrid');
})
window.setTimeout(refreshGrid, 5000);
function refreshGrid() {
    var grid = jQuery("#datagrid");
    grid.trigger("reloadGrid");
    window.setTimeout(refreshGrid, 5000);
}