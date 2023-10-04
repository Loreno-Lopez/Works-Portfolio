<!-- Modal per il logout nella versione mobile-->
<div class="modal fade" id="logoutModal" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content mx-auto">
             <div class="modal-header navbar-custom">
                 <h5 class="modal-title text-light">{{ __('ui.doyou')}} </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p>Click the button to <strong>Log out</strong>.</p>
             </div>
             <div class="modal-footer d-flex justify-content-end align-items-center">
                 <button type="button" class="btn-custom-orange me-2" data-bs-dismiss="modal">{{ __('ui.cancel')}}</button>
                 <form class="m-0" action="/logout" method="POST">
                     @csrf
                     <button type="submit" class="btn-custom-greenwater">Logout</button>
                 </form>
             </div>
         </div>
     </div>
 </div>