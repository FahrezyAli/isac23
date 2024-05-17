<div class="modal__container" id="modal-container{{ $loop->iteration }}">
    <div class="modal__content">
        <div class="modal__close close-modal" title="Close">
            <i class='bx bx-x'></i>
        </div>

        <img src="{{ $account->bukti_bayar }}" alt="" class="modal__img">

        <h1 class="modal__title text-danger">
            {{ $account->status_bayar }}
        </h1>
        <p class="modal__description">
            Verifikasi digagalkan. User akan diarahkan untuk upload ulang.
        </p>

        <form method="post" action="{{ route('updateStatusBayar') }}">
            @csrf
            <input type="hidden" id="accountId" name="accountId" value="{{ $account->id }}">
            <input type="hidden" id="status_bayar" name="status_bayar" value="unverified">
            <button class="modal__button modal__button-width mt-3 bg-danger" type="submit">
                Ubah ke Unverified
            </button>
        </form>
    </div>
</div>
