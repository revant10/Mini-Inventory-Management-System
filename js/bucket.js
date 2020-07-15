//Options for Bucket Type Select Option
$(document).ready(function()
{
    $.ajax({
        type: 'POST',
        url: '../php/btype.php',
        data: {},
        success: function(response) {
            $('#btype').html(response);
        }
    });
});

function view()
{
    var ty = document.getElementById('type');
    ty.removeAttribute('disabled');
}

$('#btype').on('change',function() {
    var val1 = $('#btype').val();
    console.log(val1);
    $.ajax({
        type: 'POST',
        url: '../php/bucket.php',
        data: { bucket: val1 },
        success: function(response) {
            $('#type').html(response);
        }
    });
});

//Enable the 4 buttons
function enButton()
{
    var b1 = document.getElementById('b1');
    var b2 = document.getElementById('b2');
    var b3 = document.getElementById('b3');
    var e2E = document.getElementById('e2E');
    b1.removeAttribute('disabled');
    b2.removeAttribute('disabled');
    b3.removeAttribute('disabled');
    e2E.removeAttribute('disabled');
    var table = document.getElementById('buttons');
    table.style.opacity = "1";
    table.style.filter  = 'alpha(opacity=100)'; // IE fallback
}

//Display Table on View Table

function dispTable()
{
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    r1.style.display='block';
}

$('#b1').click(function() {
    var val1 = $('#btype').val();
    var val2 = $('#type').val();
    $('#r1').animate({height:'690px'}, 0);
    $('#r1').css({overflow:'hidden'});
    $.ajax({
        type: 'POST',
        url: '../php/table-v.php',
        data: { database: val1, table: val2 },
        success: function(response) {
            $('#r1').html(response);
        }
    });
});

//Displaying modal to add entry
function addEntry()
{
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    var f2 = document.getElementById('f2');
    f2.reset();
    r2.style.display = 'block';
}

$('#b2').click(function() {
    $('#entryB').attr('style','display: block');
});
$('#save-entry').click(function() {
    
    var val1 = $('#btype').val();
    var val2 = $('#type').val();
    var val3 = $('#date').val();
    var val4 = $('#order-q').val();
    var val5 = $('#challan-no').val();
    var val6 = $('#in-q').val();
    var val7 = $('#out-q').val();
    var val8 = $('#reject-q').val();
    
    if (val1 == '' || val2 == '' || val3 == '' || val4 == '' || val5 == '' || val6 == '' || val7 == '' || val8 == '')
    {
        alert('Please fill all the fields');
        return;
    }

    $.ajax({
        type: 'POST',
        url: '../php/entry.php',
        data: { database: val1, table: val2, date: val3, order: val4, challan: val5, in: val6, out: val7, reject: val8 },
        success: function(response) {
            $('#entryB').attr('style','display: none');
            $('#r3').attr('style','display: block');
            $('#r3').html(response);
        }
    });
});

//Modify Entry modal

function modifyEntry()
{
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    var f3 = document.getElementById('f3');
    f3.reset();
    r4.style.display = 'block';
}

$('#b3').click(function() {
    
    var val1 = $('#btype').val();
    var val2 = $('#type').val();
    $.ajax({
        type: 'POST',
        url: '../php/table-v.php',
        data: { database: val1, table: val2 },
        success: function(response) {
            
            $('#r1').html(response);
        }
    });
});

$('#search-entry').click(function() {
    var val1 = $('#btype').val();
    var val2 = $('#type').val();
    var val3 = $('#srno').val();
    if(val3 == '')
    {
        alert('Please fill all the fields');
        return false;
    }
    
    $.ajax({
        type: 'POST',
        url: '../php/search.php',
        data: { database: val1, table: val2, srno: val3 },
        success: function(response) {
            $('#modify-entry').removeAttr("hidden");
            $('#r5').attr('style','display: block');
            $('#r5').html(response);
        }
    });
});



$('#modify-entry').click(function() {
    
    var val1 = $('#btype').val();
    var val2 = $('#type').val();
    var val3 = $('#m-date').val();
    var val4 = $('#m-order-q').val();
    var val5 = $('#m-challan-no').val();
    var val6 = $('#m-in-q').val();
    var val7 = $('#m-out-q').val();
    var val8 = $('#m-reject-q').val();
    var val9 = $('#m-srno').val();
    
    if (val1 == '' || val2 == '' || val3 == '' || val4 == '' || val5 == '' || val6 == '' || val7 == '' || val8 == '')
    {
        alert('Please fill all the fields');
        return;
    }

    $.ajax({
        type: 'POST',
        url: '../php/modify.php',
        data: { database: val1, table: val2, date: val3, order: val4, challan: val5, in: val6, out: val7, reject: val8, srno: val9 },
        success: function(response) {
            $('#modify-entry').prop("hidden", true);
            // $('#r5').attr('style','display: block');
            // $('#r5').html("");
            $('#r5').html(response);
        }
    });
    //here it was for div r1
});

// //Export Entries
// $('#e2E').click(function() {
//     var val1 = $('#btype').val();
//     var val2 = $('#type').val();
//     $.ajax({
//         type: 'POST',
//         url: '../php/tableExcel.php',
//         data: { database: val1, table: val2 }
//     });
// });

function addBtype()
{
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    var f4 = document.getElementById('f4');
    f4.reset();
    r6.style.display = 'block';
}

$('#create-btype').click(function() {

    var val1 = $('#schema').val();
    if(val1 == '')
    {
        alert('Please fill all the fields');
        return false;
    }
    $.ajax({
        type: 'POST',
        url: '../php/addSchema.php',
        data: { schema: val1},
        success: function(response) {
            $('#r7').attr('style','display: block');
            $('#r7').html(response);
        }
    });
});

function addBucket()
{
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    var f5 = document.getElementById('f5');
    f5.reset();
    r8.style.display = 'block';
}

$('#b5').click(function()
{
    $.ajax({
        type: 'POST',
        url: '../php/btype.php',
        data: {},
        success: function(response) {
            $('#schema2').html(response);
        }
    });
});

$('#create-bucket').click(function() {

    var val1 = $('#schema2').val();
    var val2 = $('#table').val();
    var val3 = $('#o-balance').val();
    if(val1 == '' || val2 == '')
    {
        alert('Please fill all the fields');
        return false;
    }
    $.ajax({
        type: 'POST',
        url: '../php/addTable.php',
        data: { schema: val1, table: val2, ob: val3},
        success: function(response) {
            $('#r9').attr('style','display: block');
            $('#r9').html(response);
        }
    });
});

function vTrans()
{
    
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    var f6 = document.getElementById('f6');
    f6.reset();
    var r13 = document.getElementById('r13');
    r13.innerHTML='';
    r10.style.display = 'block';
    
}



$('#sTran').click(function() {
    var val1 = $('#sDate').val();
    var val2 = $('#eDate').val();
    if(val1 == '' || val2 == '')
    {
        alert('Please fill all the fields');
        location.reload();
    }
    $.ajax({
        type: 'POST',
        url: '../php/tView.php',
        data: { sDate: val1, eDate: val2 },
        success: function(response) {
            $('#r13').html(response);
        }
    });
});

function enDate()
{
    var td = document.getElementById('eDate');
    td.removeAttribute('disabled');
}

function enGo()
{
    var button = document.getElementById('sTran');
    button.removeAttribute('disabled');
}

function vStock()
{
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    var f7 = document.getElementById('f7');
    f7.reset();
    r11.style.display = 'block';
}

$('#b7').click(function()
{
    $('#r12').html('');
    $.ajax({
        type: 'POST',
        url: '../php/btype.php',
        data: {},
        success: function(response) {
            $('#btype1').html(response);
            
        }
    });
});
$('#btype1').on('change',function() {
    var val1 = $('#btype1').val();
    $.ajax({
        type: 'POST',
        url: '../php/stock.php',
        data: { btype: val1 },
        success: function(response) {
            $('#r12').html(response);
        }
    });
});

function dView()
{
    var r1 = document.getElementById('r1');
    r1.style.display = 'none';
    var r2 = document.getElementById('r2');
    r2.style.display = 'none';
    var r3 = document.getElementById('r3');
    r3.style.display = 'none';
    var r4 = document.getElementById('r4');
    r4.style.display = 'none';
    var r5 = document.getElementById('r5');
    r5.style.display = 'none';
    var r6 = document.getElementById('r6');
    r6.style.display = 'none';
    var r7 = document.getElementById('r7');
    r7.style.display = 'none';
    var r8 = document.getElementById('r8');
    r8.style.display = 'none';
    var r9 = document.getElementById('r9');
    r9.style.display = 'none';
    var r10 = document.getElementById('r10');
    r10.style.display = 'none';
    var r11 = document.getElementById('r11');
    r11.style.display = 'none';
    var r14 = document.getElementById('r14');
    r14.style.display = 'none';
    var f8 = document.getElementById('f8');
    f8.reset();
    r14.style.display = 'block';
}

$('#STran').click(function() {
    var val1 = $('#btype').val();
    var val2 = $('#type').val();
    var val3 = $('#SDate').val();
    var val4 = $('#EDate').val();
    if(val1 == '' || val2 == '')
    {
        alert('Please fill all the fields');
        location.reload();
    }
    $.ajax({
        type: 'POST',
        url: '../php/dView.php',
        data: { database: val1, table: val2, sDate: val3, eDate: val4 },
        success: function(response) {
            $('#r15').html(response);
        }
    });
});

function endate()
{
    var td = document.getElementById('EDate');
    td.removeAttribute('disabled');
}

function engo()
{
    var button = document.getElementById('STran');
    button.removeAttribute('disabled');
}


// function display()
// {
//     a = document.getElementById('btype');
//     var opt = a.options[a.selectedIndex];
//     b = opt.value;
//     console.log( opt.value );
//     // b = type.selectedIndex.value;
//     c = document.getElementById('l1');
//     //
//     d = document.getElementById('type');
//     var opt = d.options[d.selectedIndex];
//     e = opt.value;
//     console.log( opt.value );
//     // b = type.selectedIndex.value;
//     f = document.getElementById('l1');
//     f.innerHTML = b + e;
// }


// $('#r1').attr('style','display: block');
    // $('#r1').animate({height:'300px'}, 0);
    // $('#r1').css({overflow:'scroll'});
    // $.ajax({
    //     type: 'POST',
    //     url: '../php/table-v.php',
    //     data: { database: val1, table: val2 },
    //     success: function(response) {
            
    //         $('#r1').html(response);
    //     }
    // });