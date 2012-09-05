/*
 * GlobalVision CMS
 * @author Budjak Orest
 * @copyright 2011 Budjak Orest
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 * @version 0.87
 */

jQuery.fn.GVTable = function(options){
    var options = jQuery.extend({
        sortable: false,
        buttons: [],
        columns: ['id'],
        colWidth: [],
        data: [],
        editLinks: [],
        viewLinks: [],
        msgShowTime: 3000,
        removeUrl: '',
        reloadUrl: '',
        sortUrl: '',
        startMsg: {
            type: '', 
            msg: ''
        },
        tranlation: {
            removeOne: '',
            removeOneConfirm: '',
            removeMany: '',
            removeManyConfirm: '',
            successRemoved: '',
            removeChecked: '',
            reload: '',
            saveChanges: '',
            viewTitle: '',
            editTitle: '',
            removeTitle: '',
            buttonYes: '',
            buttonNo: ''
        }
    },options);
    var main = this;
    var table;
    var load;

    // Построение таблицы
    function buildTable(){
        $(main).append('<table><thead></thead><tbody></tbody></table>');
        table = $(main).find('table');

        $(table).find('thead').append('<tr></tr>').find('tr').append('<th><input type="checkbox" class="checkall" /></th>').find('th:last').css('width', '20px');
        $(options.columns).each(function(indx, val) {
            if (options.colWidth[indx] != 0){
                $(table).find('thead tr').append('<th>'+val+'</th>').find('th:last').css('width',options.colWidth[indx]).css('text-align', 'center');
            } else {
                $(table).find('thead tr').append('<th>'+val+'</th>');
            }
        });
        var bpwidth = 0;
        if (options.sortable){
            bpwidth = (1 + options.buttons.length)*25;
        } else {
            bpwidth = options.buttons.length*25;
        }
        $(table).find('thead tr').append('<th>&nbsp</th>').find('th:last').css('width', bpwidth+'px');
    }

    // Заполнение таблицы
    function fillTable(){
        $(table).find('tbody').empty();

        $(options.data).each(function(index, line) {
            tr = $(table).find('tbody').append('<tr></tr>').find('tr:last');
            var id = 0;
            $(line).each(function(indx, item) {
                if (indx == 0){
                    id = item;
                }
                $(tr).append('<td>' + item + '</td>');
                
                if (options.colWidth[indx] != 0){
                    $(tr).find('td:last').css('text-align', 'center');
                }
            });
            $(tr).prepend('<td><input type="checkbox" elementid="'+id+'" /></td>');
            var buttonsBar = '';
            if (options.sortable){
                buttonsBar += '<img class="move" src="/design/cms/img/icons/move.png" alt="" />';
            }
            $(options.buttons).each(function(indx, button) {
                if (button == 'view'){
                    buttonsBar += '<a href="' + options.viewLinks[index] + '"><img src="/design/cms/img/icons/go.png" alt="'+options.translation.viewTitle+'" title="'+options.translation.viewTitle+'" /></a>'
                }
                if (button == 'edit'){
                    buttonsBar += '<a href="' + options.editLinks[index] + '"><img src="/design/cms/img/icons/edit.png" alt="'+options.translation.editTitle+'" title="'+options.translation.editTitle+'" /></a>'
                }
                if (button == 'remove'){
                    buttonsBar += '<a href="#" class="remove"><img src="/design/cms/img/icons/delete.png" alt="'+options.translation.removeTitle+'" title="'+options.translation.removeTitle+'" /></a>'
                }
            });
            $(tr).append('<td>' + buttonsBar + '</td>').find('.remove').click(function(){
                removeDialog(id);
                return false;
            });
        });

        $(table).find('.checkall').click(function(){
            if ($(this).is(':checked')){
                $(table).find('tbody :checkbox').attr('checked', true);
            } else {
                $(table).find('tbody :checkbox').attr('checked', false);
            }
        });
    }

    function reloadTable(){
        $(load).show();
        $.getJSON(options.reloadUrl, function(tabledata){
            options.data = tabledata.data;
            options.viewLinks = tabledata.viewLinks;
            options.editLinks = tabledata.editLinks;
            fillTable();
            $(load).hide();
        });
    };

    // Перемещение на верх документа
    function scrollTop(){
        $('html, body').animate({
            scrollTop:0
        }, 'slow');
    }

    // Отображение информационного сообщения
    function showMsg(msg, type){
        id = 0;
        do{
            id++;
        } while ($('#msg'+id).size() != 0);
        $(main).prepend('<div style="margin-bottom: 6px;" id="msg'+id+'" class="msg">'+msg+'</div>').find;
        $('#msg'+id).addClass(type).click(function() {
            $(this).fadeTo(350, 0);
            $(this).slideUp(350);   
        }).delay(options.msgShowTime).fadeTo(350, 0).slideUp(350);
        scrollTop();
    }

    // Отображение диалога удаления и удаление
    function removeDialog(values){
        if ($(values).size() > 1){
            $('#dialog').html(options.translation.removeManyConfirm);
            $('#dialog').attr('title', options.translation.removeMany);
        } else {
            $('#dialog').html(options.translation.removeOneConfirm);
            $('#dialog').attr('title', options.translation.removeOne);
        }
        $('#dialog').dialog({
            resizable: false,
            autoOpen: false,
            hide: 'fade',
            buttons: [
            {
                text: options.translation.buttonYes,
                click: function() {
                    showMsg(options.translation.successRemoved, 'success');
                    $.getJSON(options.removeUrl, {
                        'ids': values
                    }, function(data){
                        reloadTable();
                    });
                    $(this).dialog('close');
                }
            },   
            {
                text: options.translation.buttonNo,
                click: function() {
                    $(this).dialog("close");
                }
            }
            ]
        });
        $('#dialog').dialog('open');
    }

    // Построение нижней панели
    function buildFooter(){
        $(main).append('<div class="tablefooter"><div class="actions"><button class="button removeButton">'+options.translation.removeChecked+'</button>&nbsp;&nbsp;<button class="button reload">'+options.translation.reload+'</button></div><img src="/design/cms/img/loading.gif" class="load" alt="loading" /></div>');
        if (options.sortable){
            $(main).find('.tablefooter').append('<div class="actions right"><button class="button savechanges">'+options.translation.saveChanges+'</button></div>');
        }
        $(main).find('.button').button();
        $(main).find('.savechanges').button({
            disabled : true
        });

        $(main).find('.removeButton').click(function(){
            if ($(table).find('tbody').find(':checked').size() > 0){
                deleteData = Array();
                $(table).find('tbody').find(':checked').each(function(indx, el){
                    deleteData[indx] = $(el).attr('elementid');
                });
                removeDialog(deleteData);
            }
            return false;
        });

        load = $(main).find('.load');
        $(load).hide();
    }

    buildTable();
    buildFooter();
    reloadTable();

    if (options.sortable){
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };			

        $(this).find('tbody').sortable({
            handle: '.move',
            helper: fixHelper,
            change: function(event,ui){
                $(main).find('.savechanges').button('enable');
            }
        }).disableSelection();

        $(".savechanges").click(function() {
            sortData = Array();
            $(table).find('tbody').find('input[type=checkbox]').each(function(indx, el){
                sortData[indx] = $(el).attr('elementid');
            });
            $.getJSON(options.sortUrl, {
                'ids': sortData
            }, function(data){
                reloadTable();
                $(main).find('.savechanges').button('disable');
            });
        });
    }

    if (options.startMsg.msg.length){
        showMsg(options.startMsg.msg, options.startMsg.type);
    }

    $(".reload").click(function() {
        reloadTable();
        return false;
    });
};