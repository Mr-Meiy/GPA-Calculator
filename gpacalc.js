$(document).ready(
    function()
    {
        $('.add').attr('disabled',true);
        $('#credit').keyup(function(){
                                if($(this).val().length !=0)
                                {
                                    $('.add').attr('disabled', false);
                                }
                                else
                                {
                                    $('.add').attr('disabled',true);
                                }
                        })
    });

var gsum=Number(0);
var csum=Number(0);
function delete_row(no)
{
    var credit=document.getElementById("credit_row"+no).innerHTML;
    csum=csum-Number(credit);
    var grade=document.getElementById("grade_row"+no).innerHTML;
    if(grade=='O') { var grd=10; }
    else if (grade=='A+') { var grd=9; }
    else if (grade==+'A') { var grd=8; }
    else if (grade=='B+') { var grd=7; }
    else if (grade=='B') { var grd=6; }
    else if (grade=='C') { var grd=5; }
    else { var grd=0; }

    gsum=gsum-(Number(grd)*Number(credit));
    
    document.getElementById('gpa').innerHTML=(gsum/csum).toFixed(3);

    document.getElementById("row"+no+"").outerHTML="";
}

var rowcount=0;
function add_row()
{
    rowcount++;
    var subject=document.getElementById("subject").value;
    var credit=document.getElementById("credit").value;
    csum=csum+Number(credit);
    var grade=document.getElementById("grade").value;
    gsum=gsum+(Number(grade)*Number(credit));
    var grd='F';
    if(grade==10) { grd='O'; }
    else if (grade==9) { grd='A+'; }
    else if (grade==8) { grd='A'; }
    else if (grade==7) { grd='B+'; }
    else if (grade==6) { grd='B'; }
    else if (grade==5) { grd='C'; }
    else if (grade==0) { grd='F'; }

    var table=document.getElementById("data_table");
    var table_len=(table.rows.length)-1;
    if(subject!='') var sub=subject;
    else var sub='Subject '+rowcount;

    var row = table.insertRow(table_len+1).outerHTML="<form><tr id='row"+table_len+"'><td id='sub_row"+table_len+"'>"+sub+"</td><td id='credit_row"+table_len+"'>"+credit+"</td><td id='grade_row"+table_len+"'>"+grd+"</td><td><input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr></form>";

    document.getElementById("subject").value="";
    document.getElementById("credit").value="";
    document.getElementById("grade").value="";

    document.getElementById('gpa').innerHTML=(gsum/csum).toFixed(3);

}

