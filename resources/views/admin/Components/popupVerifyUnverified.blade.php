<div class="modal__container" id="modal-container{{ $loop->iteration }}">
    <div class="modal__content">
        <div class="modal__close close-modal" title="Close">
            <i class='bx bx-x'></i>
        </div>

        <img src="{{ $account->bukti_bayar }}" alt="" class="modal__img">

        <h1 class="modal__title text-info">
            {{ $account->status_bayar }}
        </h1>
        <p class="modal__description">
            Klik tombol dibawah ini untuk melakukan atau menggagalkan verifikasi
        </p>

        <form method="post" action="{{ route('updateStatusBayar') }}">
            @csrf
            <input type="hidden" id="accountId" name="accountId" value="{{ $account->id }}">
            <input type="hidden" id="status_bayar" name="status_bayar" value="verified">
            <button class="modal__button modal__button-width" type="submit">
                Verifikasi Bukti
            </button>
        </form>

        <form method="post" action="{{ route('updateStatusBayar') }}">
            @csrf
            <input type="hidden" id="accountId" name="accountId" value="{{ $account->id }}">
            <input type="hidden" id="status_bayar" name="status_bayar" value="failed">
            <button class="modal__button modal__button-width mt-3 bg-danger" type="submit">
                Gagalkan Verifikasi
            </button>
        </form>
    </div>
</div>
