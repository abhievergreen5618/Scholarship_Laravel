<li class="tab-content tab-content-2 typography">
    <form id="bankfrm" action="" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <h3><span>Step [3/6] :</span> Bank Details &nbsp;
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>
                <div class="box-body table-responsive">
                    <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="3"><b><u>Fields marked <span style="color: red">*</span> are mandatory.</u></b></td>
                            </tr>