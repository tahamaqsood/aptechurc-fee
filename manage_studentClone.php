<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM student where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
}
?>
<style>
    img.aplogo {
    position: relative;
    width: 207px;
    float: left;
    left: -27px;

}
</style>

<!-- For Student ID -->
<?php
$query = "select MAX(id_no) from student";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
// echo $row['MAX(id_no)'];
?>


<div class="container-fluid">
    <form action="" id="manage-student">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class="form-group"></div>
        <div class="form-group">
            <label for="" class="control-label">Student Internal ID</label>
            <input type="text" class="form-control" name="id_no"  value="<?php echo $row['MAX(id_no)']+1 ?>" readonly required>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name"  value="" required>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Father Name</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter Father Name"  value="" required>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Contact</label>
            <input type="text" class="form-control" name="contact" placeholder="Enter Contact"  value="" required>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email"  value="" required pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
        </div>

        <div class="form-group">
            <label for="" class="control-label">Address</label>
            <textarea name="address" id="" cols="30" rows="3" placeholder="Enter Address" class="form-control" required=""></textarea>
        </div>

        <div class="form-group">
        <div class="col-xxl-12">
        <label for="" class="control-label">Timings</label>
                <input list="timings" id="stimings" placeholder="Select Timings" name="timings" class="form-control" required/>
                <datalist id="timings">
                    <!-- MWF -->
                <option value="9:00 TO 11:00 (MWF)">
                <option value="11:00 TO 1:00 (MWF)">
                <option value="1:00 TO 3:00 (MWF)">
                <option value="3:00 TO 5:00 (MWF)">
                <option value="5:00 TO 7:00 (MWF)">
                <option value="7:00 TO 9:00 (MWF)">
                    <!-- TTS -->
                <option value="9:00 TO 11:00 (TTS)">
                <option value="11:00 TO 1:00 (TTS)">
                <option value="1:00 TO 3:00 (TTS)">
                <option value="3:00 TO 5:00 (TTS)">
                <option value="5:00 TO 7:00 (TTS)">
                <option value="7:00 TO 9:00 (TTS)">
                </datalist>
                </div>
        </div>

        <div class="form-group">
        <div class="col-xxl-12">
        <label for="" class="control-label">Course</label>
        <input list="course" id="sfee_head" placeholder="Select Course" name="course" class="form-control" required/>
                <datalist id="course">
                <option value="ACCP REGISTRATION">
                <option value="ACCP TUITION FEE">
                <option value="DAE REGISTRATION">
                <option value="SMART PRO TUITION FEE">
                <option value="EXAM RESIT">
                <option value="BATCH TRANSFER">
                <option value="ONLINEVARSITY">
                <option value="PROSPECTUS">
                <option value="MS OFFICE">
                <option value="WEB DESIGNING">
                <option value="MICROSOFT.NET">
                <option value="ANDRIOD">
                <option value="C">
                <option value="AUTOCAD">
                <option value="PHP MYSQL">
                <option value="JAVA">
                <option value="C++">
                <option value="C#">
                <option value="ADV.EXCEL">
                <option value="PYTHON">
                <option value="AMAZON">
                <option value="ACNS REGISTRATION">
                <option value="ACNS TUITION FEE">
                <option value="ROUTING TECHNOLOGY">
                <option value="HARWARE PROFESSIONAL">
                <option value="SERVER ADMINISTRATOR">
                <option value="BEGINNERS ENGLISH">
                <option value="SPOKEN ENGLISH PRE. INT">
                <option value="SPOKEN ENGLISH INT">
                <option value="SPOKEN ENGLISH POST. INT">
                <option value="BUSINESS COMM.">
                <option value="OTHERS">
                </datalist>
                </div>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Admission Charges</label>
            <input type="number" class="form-control" name="admission_fee" placeholder="Enter Admission Charges"  value="" required>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Monthly Tution Charges</label>
            <input type="number" class="form-control" name="monthly_fee" onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'divDisplayWords');" placeholder="Enter Monthly Tution Charges" required>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Monthly Charges In Words</label>
            <input type="text" class="form-control"  id="divDisplayWords" name="amount_in_words" placeholder="Monthly Charges In Words" required>
        </div>

    </form>
</div>

<script>
    $('#manage-student').on('reset',function(){
        $('#msg').html('')
        $('input:hidden').val('')
    })
    $('#manage-student').submit(function(e){
        e.preventDefault()
        start_load()
        $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=save_student',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully saved.",'success')
                        setTimeout(function(){
                            location.reload()
                        },1000)
                }else if(resp == 2){
                $('#msg').html('<div class="alert alert-danger mx-2">ID # already exist.</div>')
                end_load()
                }   
            }
        })
    })

    $('.select2').select2({
        placeholder:"Please Select here",
        width:'100%'
    })
</script>

<script  type="text/javascript">
    	function onlyNumbers(evt) {
    var e = event || evt; // For trans-browser compatibility
    var charCode = e.which || e.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function NumToWord(inputNumber, outputControl) {
    var str = new String(inputNumber)
    var splt = str.split("");
    var rev = splt.reverse();
    var once = ['Zero', ' One', ' Two', ' Three', ' Four', ' Five', ' Six', ' Seven', ' Eight', ' Nine'];
    var twos = ['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
    var tens = ['', 'Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety'];

    numLength = rev.length;
    var word = new Array();
    var j = 0;

    for (i = 0; i < numLength; i++) {
        switch (i) {

            case 0:
                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                    word[j] = '';
                }
                else {
                    word[j] = '' + once[rev[i]];
                }
                word[j] = word[j];
                break;

            case 1:
                aboveTens();
                break;

            case 2:
                if (rev[i] == 0) {
                    word[j] = '';
                }
                else if ((rev[i - 1] == 0) || (rev[i - 2] == 0)) {
                    word[j] = once[rev[i]] + " Hundred ";
                }
                else {
                    word[j] = once[rev[i]] + " Hundred and";
                }
                break;

            case 3:
                if (rev[i] == 0 || rev[i + 1] == 1) {
                    word[j] = '';
                }
                else {
                    word[j] = once[rev[i]];
                }
                if ((rev[i + 1] != 0) || (rev[i] > 0)) {
                    word[j] = word[j] + " Thousand";
                }
                break;

                
            case 4:
                aboveTens();
                break;

            case 5:
                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                    word[j] = '';
                }
                else {
                    word[j] = once[rev[i]];
                }
                if (rev[i + 1] !== '0' || rev[i] > '0') {
                    word[j] = word[j] + " Lakh";
                }
                 
                break;

            case 6:
                aboveTens();
                break;

            case 7:
                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                    word[j] = '';
                }
                else {
                    word[j] = once[rev[i]];
                }
                if (rev[i + 1] !== '0' || rev[i] > '0') {
                    word[j] = word[j] + " Crore";
                }                
                break;

            case 8:
                aboveTens();
                break;

            //            This is optional. 

            //            case 9:
            //                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
            //                    word[j] = '';
            //                }
            //                else {
            //                    word[j] = once[rev[i]];
            //                }
            //                if (rev[i + 1] !== '0' || rev[i] > '0') {
            //                    word[j] = word[j] + " Arab";
            //                }
            //                break;

            //            case 10:
            //                aboveTens();
            //                break;

            default: break;
        }
        j++;
    }

    function aboveTens() {
        if (rev[i] == 0) { word[j] = ''; }
        else if (rev[i] == 1) { word[j] = twos[rev[i - 1]]; }
        else { word[j] = tens[rev[i]]; }
    }

    word.reverse();
    var finalOutput = '';
    for (i = 0; i < numLength; i++) {
        finalOutput = finalOutput + word[i];
    }
    document.getElementById(outputControl).innerHTML = finalOutput;
}
    </script>