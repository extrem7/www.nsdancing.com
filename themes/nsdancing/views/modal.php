<? global $NS ?>
<div class="modal fade" tabindex="-1" role="dialog" id="book-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
				<? $NS->views()->book(true) ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="thanks">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="title third-title text-center mb-4">Thank you for your message</div>
                <div class="text-center mb-4">
                    <a href="#" data-dismiss="modal" class="button btn-red-b btn-sm">Exit</a>
                </div>
                <div class="decorative-separator icon-circle mx-auto mw288"></div>
                <div class="title four-title text-center mt-4">
                    we will contact you <br> as soon as possible
                </div>
            </div>
        </div>
    </div>
</div>