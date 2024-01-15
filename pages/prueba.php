$(document).ready(function() {
$('#facebookRadio1').change(function(e) {
if ($(this).val() === "1") {
$('#dis_1_input').prop("disabled", false);
} else {
$('#dis_1_input').prop("disabled", true);
}
})

<div class="form-check mt-3">
    <input name="facebook-radio-1" class="form-check-input" type="radio" value="1" id="facebookRadio1" />
    <label class="form-check-label" for="facebookRadio1"> Si </label>
</div>
<div class="form-check">
    <input name="facebook-radio-2" class="form-check-input" type="radio" value="2" id="facebookRadio2" />
    <label class="form-check-label" for="facebookRadio1"> No </label>
</div>

$('#facebookRadio2').change(function(){
    if(this.checked)
        $('#dis_1_input').val('False');
   else
        $('#dis_1_input').val('True');
});