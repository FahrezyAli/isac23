<div class="modal__container" id="modal-container{{ $loop->iteration }}">
    <div class="modal__content">
        <div class="modal__close close-modal" title="Close">
            <i class='bx bx-x'></i>
        </div>

        <h1 class="modal__title text-info">
            {{ $account->status_bayar }}
        </h1>
        <p class="modal__description mt-4">
            User belum mengirimkan bukti bayar. Mohon tunggu.
        </p>

    </div>
</div>
