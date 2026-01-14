<style>
    .alert-center-top {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        min-width: 320px;
        max-width: 600px;
        animation: slideDown 0.4s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translate(-50%, -20px);
        }
        to {
            opacity: 1;
            transform: translate(-50%, 0);
        }
    }
</style>

@if(session('success'))
    <div id="alert-success"
         class="alert-center-top p-4 rounded-lg bg-green-100 text-green-800 border border-green-300 text-center shadow-md">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="alert-error"
         class="alert-center-top p-4 rounded-lg bg-red-100 text-red-800 border border-red-300 text-center shadow-md">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div id="alert-validation"
         class="alert-center-top p-4 rounded-lg bg-orange-100 text-orange-800 border border-orange-300 shadow-md">
        <strong>Data tidak berhasil disimpan / diperbarui:</strong>
        <ul class="list-disc ml-6 mt-2 text-left">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    setTimeout(() => {
        ['alert-success', 'alert-error', 'alert-validation'].forEach(id => {
            let el = document.getElementById(id);
            if (el) el.style.display = 'none';
        });
    }, 3000);
</script>
