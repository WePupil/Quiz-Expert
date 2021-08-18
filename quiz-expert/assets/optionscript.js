function quexp_add_mcq_option_button()
{
    var checkboxes = document.getElementsByName('new_chk[]');
    
    var option=checkboxes.length;
    option=parseFloat(option)+1;
    
    

    var table=document.getElementById("add_mcq_table");
    var table_len=(table.rows.length)-3;
    if (option === 3 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option3'><th scope='row'><label for='c'>C</label></th><td><input type='text' class='regular-text' id='new_ansc'> <input type='checkbox' name='new_chk[]' value='C'>Correct </td></tr>";
    }

    else if (option === 4 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option4'><th scope='row'><label for='d'>D</label></th><td><input type='text' class='regular-text' id='new_ansd'> <input type='checkbox' name='new_chk[]' value='D'>Correct </td></tr>";
    }

    else if (option === 5 ){
    var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option5'><th scope='row'><label for='e'>E</label></th><td><input type='text' class='regular-text' id='new_anse'> <input type='checkbox' name='new_chk[]' value='E'>Correct </td></tr>";
    }

    else if (option === 6 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option6'><th scope='row'><label for='f'>F</label></th><td><input type='text' class='regular-text' id='new_ansf'> <input type='checkbox' name='new_chk[]' value='F'>Correct </td></tr>";
    }

    else if (option === 7 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option7'><th scope='row'><label for='g'>G</label></th><td><input type='text' class='regular-text' id='new_ansg'> <input type='checkbox' name='new_chk[]' value='G'>Correct </td></tr>";
    }

    else if (option === 8 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option8'><th scope='row'><label for='h'>H</label></th><td><input type='text' class='regular-text' id='new_ansh'> <input type='checkbox' name='new_chk[]' value='H'>Correct </td></tr>";
    }

    else if (option === 9 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option9'><th scope='row'><label for='i'>I</label></th><td><input type='text' class='regular-text' id='new_ansi'> <input type='checkbox' name='new_chk[]' value='I'>Correct </td></tr>";
    }
    
    else if (option === 10 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='add_mcq_option10'><th scope='row'><label for='j'>J</label></th><td><input type='text' class='regular-text' id='new_ansj'> <input type='checkbox' name='new_chk[]' value='J'>Correct </td></tr>";
    }
}

function quexp_delete_mcq_option_button()
{
    var checkboxes = document.getElementsByName('new_chk[]');
    
    var option=checkboxes.length;
    option=parseFloat(option);

    var row=document.getElementById("add_mcq_option"+option);
    row.parentNode.removeChild(row);
}

function quexp_add_mcq_edit_option_button(id)
{
    var checkboxes = document.getElementsByName('edit_chk[]');
    
    var option=checkboxes.length;
    option=parseFloat(option)+1;
    
    

    var table=document.getElementById("edit_mcq_table");
    var table_len=(table.rows.length)-3;
    if (option === 3 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option3'><th scope='row'><label for='c'>C</label></th><td><input type='text' class='regular-text' id='ansc_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='C'></td></tr>";
    }

    else if (option === 4 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option4'><th scope='row'><label for='d'>D</label></th><td><input type='text' class='regular-text' id='ansd_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='D'></td></tr>";
    }

    else if (option === 5 ){
    var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option5'><th scope='row'><label for='e'>E</label></th><td><input type='text' class='regular-text' id='anse_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='E'></td></tr>";
    }

    else if (option === 6 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option6'><th scope='row'><label for='f'>F</label></th><td><input type='text' class='regular-text' id='ansf_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='F'></td></tr>";
    }

    else if (option === 7 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option7'><th scope='row'><label for='g'>G</label></th><td><input type='text' class='regular-text' id='ansg_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='G'></td></tr>";
    }

    else if (option === 8 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option8'><th scope='row'><label for='h'>H</label></th><td><input type='text' class='regular-text' id='ansh_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='H'></td></tr>";
    }

    else if (option === 9 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option9'><th scope='row'><label for='i'>I</label></th><td><input type='text' class='regular-text' id='ansi_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='I'></td></tr>";
    }
    
    else if (option === 10 ){
        var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option10'><th scope='row'><label for='j'>J</label></th><td><input type='text' class='regular-text' id='ansj_text"+id+"'></td><td><input type='checkbox' name='edit_chk[]' value='J'></td></tr>";
    }
}

function quexp_delete_mcq_edit_option_button(id)
{
    var checkboxes = document.getElementsByName('edit_chk[]');
    
    var option=checkboxes.length;
    option=parseFloat(option);

    var row=document.getElementById("edit_mcq_option"+option);
    row.parentNode.removeChild(row);
}
