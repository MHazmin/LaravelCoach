@extends('master2')
@section('content')
<h2>Basic DataGrid</h2>
<p>The DataGrid is created from markup, no JavaScript code needed.</p>
<div style="margin:20px 0;"></div>

<div id="tb" style="padding:3px">
    <span>Title:</span>
    <input id="title" style="line-height:26px;border:1px solid #ccc">
    <span>Author:</span>
    <input id="author" style="line-height:26px;border:1px solid #ccc">
    <a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
</div>

<table id="dg" toolbar="#tb" iconCls="icon-save" rownumbers="true" pagination="true"></table>


<script>
    $(function () {
        $('#dg').datagrid({
            url: '/book/data',
            method: 'get',
            pageSize:5,
            pageList:[5,10,15,20],
            columns: [[
                    {field: 'title', title: 'Title', width: 100},
                    {field: 'author', title: 'Author', width: 100},
                    {field: 'pg_count', title: 'Page Count', width: 100, align: 'right'},
                    {field: 'purchase_at', title: 'Purchase Date', width: 100}
                ]]
        });
        $('#dg').datagrid('getPaper').pagination({
            layout: ['list', 'sep', 'first', 'prev', 'sep', $('#p-style').val(), 'sep', 'next', 'last', 'sep', 'refresh']
        });


        
    });
    
    function doSearch() {
            $('#dg').datagrid('load', {
                title: $('#title').val(),
                author: $('#author').val()
            });
        }


</script>

@endsection