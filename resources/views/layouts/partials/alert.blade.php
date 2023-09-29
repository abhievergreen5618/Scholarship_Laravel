@if(session()->has('msg'))
<div id="toast-container" class="toast-top-right alert">
    <div class="toast toast-success" aria-live="polite">
        <div class="toast-message">{{ session()->get('msg') }}</div>
    </div>
</div>
@endif
@if(session()->has('error'))
<div id="toast-container" class="toast-top-right alert">
    <div class="toast toast-error" aria-live="assertive">
        <div class="toast-message">{{ session()->get('error') }}</div>
    </div>
</div>
@endif




