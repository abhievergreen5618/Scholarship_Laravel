<li class="tab-content tab-content-first typography">
    <form id="frm" action="{{route('personalinfosubmit')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <h3><span>Step [1/6] :</span> Personal Information</span></h3>
            </div>
            <div class="box-body table-responsive">
                <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                    <tbody>
                        <tr>
                            <td colspan="3"><b><u>Fields marked <span style="color: red">*</span>are mandatory.</u></b></td>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Save</button>
    </form>
</li>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#state-dropdown').on('change', function() {
            let stateCode = this.value;
            console.log(stateCode);
            $.ajax({
                url: 'districtslist',
                type: 'POST',
                data: 'stateCode=' + stateCode +
                    '&_token={{csrf_token()}}',
                success: function(result) {
                    $('#district-dropdown').html(result)
                }
            });
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#subjects").select2({
            multiple: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('input[name="physicallychallenged"]').on('change', function() {
            var physicallyChallenged = $(this).val();
            if (physicallyChallenged === "yes") {
                updateFee(physicallyChallenged);
            } else {
                $('#fee').html('');
            }
        });

        $('#category').on('change', function() {
            var category = $(this).val();
            updateFee(category);
        });

        function updateFee(feetype) {
            $.ajax({
                url: 'get-fee/' + feetype,
                method: 'GET',
                success: function(response) {
                    if (response.fee) {
                        $('#fee').html('Rs.' + response.fee);
                    }
                },
                error: function() {
                    // Handle errors if needed
                }
            });
        }

        // Initialize the fee display when the page loads
        var selectedOption = $('input[name="physicallychallenged"]:checked').val();
        updateFee(selectedOption);
    });
</script>